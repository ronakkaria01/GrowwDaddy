#!/usr/bin/env bash
#
# Deploys GrowwDaddy over ssh with rsync.
#
#   cp deploy.env.example deploy.env   # fill in, it is gitignored
#   ./deploy.sh --dry-run              # rsync -n, changes nothing
#   ./deploy.sh
#
# Needs rsync and ssh locally, and rsync on the server. Both ship with macOS.

set -euo pipefail
cd "$(dirname "${BASH_SOURCE[0]}")"

DRY_RUN=0
SKIP_BUILD=0
for arg in "$@"; do
  case "$arg" in
    --dry-run)    DRY_RUN=1 ;;
    --skip-build) SKIP_BUILD=1 ;;
    -h|--help)    sed -n '3,9p' "$0" | sed 's/^# \{0,1\}//'; exit 0 ;;
    *) echo "unknown flag: $arg (try --help)" >&2; exit 2 ;;
  esac
done

# index.php goes in a second pass, after everything else. The page derives its
# ?v= hash from output.css on the server, so the stylesheet must already be
# there or a visitor mid-deploy gets markup pointing at a file that is missing.
# vendor/ and smtp.php are gitignored (library code, and SMTP credentials) but
# the site needs both to send mail, so rsync pushes them from the working copy.
# ponytail: no CI, no composer on the server — the local vendor/ IS the artifact.
ASSETS=(
  assets/output.css
  assets/og-image.png
  assets/favicon.svg
  assets/favicon.ico
  assets/favicon-16x16.png
  assets/favicon-32x32.png
  assets/favicon-48x48.png
  assets/favicon-96x96.png
  assets/apple-touch-icon.png
  assets/android-chrome-192x192.png
  assets/android-chrome-512x512.png
  assets/maskable-512x512.png
  assets/site.webmanifest
  favicon.ico
  .htaccess
  robots.txt
  sitemap.xml
  smtp.php
  vendor
)
ENTRY=index.php

# ---- config -----------------------------------------------------------------

# Values already in the environment win over deploy.env, so a one-off
# `REMOTE_DIR=... ./deploy.sh` works without editing the file.
_VARS="SSH_HOST SSH_USER SSH_PORT SSH_KEY REMOTE_DIR SITE_URL"
for _v in $_VARS; do eval "_env_$_v=\${$_v-}"; done

# shellcheck source=/dev/null
[[ -f deploy.env ]] && { set -a; . ./deploy.env; set +a; }

for _v in $_VARS; do
  eval "_pre=\$_env_$_v"
  [[ -n "${_pre:-}" ]] && eval "$_v=\$_pre"
done

: "${SSH_HOST:?set SSH_HOST in deploy.env (an ~/.ssh/config alias is easiest)}"
: "${REMOTE_DIR:?set REMOTE_DIR in deploy.env, e.g. domains/growwdaddy.com/public_html}"
SSH_USER="${SSH_USER:-}"
SSH_PORT="${SSH_PORT:-}"
SSH_KEY="${SSH_KEY:-}"
SITE_URL="${SITE_URL:-}"

# An ~/.ssh/config alias already carries user, port and key, so these stay
# empty in that case and ssh resolves them itself.
ssh_cmd="ssh"
[[ -n "$SSH_PORT" ]] && ssh_cmd+=" -p $SSH_PORT"
[[ -n "$SSH_KEY" ]]  && ssh_cmd+=" -i $SSH_KEY"
target="${SSH_USER:+${SSH_USER}@}${SSH_HOST}"
remote="${REMOTE_DIR%/}"

# ---- preflight --------------------------------------------------------------

if [[ "$SKIP_BUILD" == "0" ]]; then
  echo "==> building css"
  npm run build >/dev/null
fi

echo "==> checking index.php"
php -l "$ENTRY" >/dev/null || { echo "$ENTRY has a syntax error, refusing to deploy" >&2; exit 1; }

missing=0
for f in "${ASSETS[@]}" "$ENTRY"; do
  [[ -e "$f" ]] || { echo "missing: $f" >&2; missing=1; }
done
if [[ "$missing" == "1" ]]; then
  [[ -e vendor ]]   || echo "    vendor/ comes from: composer install --no-dev" >&2
  [[ -e smtp.php ]] || echo "    smtp.php holds the SMTP credentials — see the Contact form section of the README" >&2
  exit 1
fi

# An empty password means index.php silently falls back to mail(), which on
# shared hosting usually lands in spam or nowhere at all.
if ! grep -qE '"password"[[:space:]]*=>[[:space:]]*"[^"]+"' smtp.php; then
  echo "!! smtp.php has no password, so the form will fall back to PHP mail()."
fi

# shellcheck disable=SC2016  # the literal $ctaUrl is the point
if grep -qE '\$ctaUrl[[:space:]]*=[[:space:]]*"#' "$ENTRY"; then
  echo "!! \$ctaUrl is still #contact, so the buttons scroll instead of booking."
fi

echo "==> testing ssh to ${target}"
if ! $ssh_cmd -o BatchMode=yes -o ConnectTimeout=12 "$target" true 2>/tmp/gd_ssh_err; then
  echo "ssh failed:" >&2; sed 's/^/    /' /tmp/gd_ssh_err >&2
  echo "    Shared hosting rarely uses port 22. Hostinger is 65002, so either add" >&2
  echo "    'Port 65002' under 'Host $SSH_HOST' in ~/.ssh/config, or set SSH_PORT." >&2
  exit 1
fi

$ssh_cmd "$target" 'command -v rsync >/dev/null' \
  || { echo "no rsync on the server. Tell me and I will switch this to an sftp batch." >&2; exit 1; }

# ---- upload -----------------------------------------------------------------

# --files-from implies --relative, so assets/output.css lands under assets/.
# --chmod normalises permissions: PHP must be able to read output.css to hash it.
# shellcheck disable=SC2054  # the commas belong to rsync's --chmod value
RSYNC=(rsync -rlptz --chmod=F644,D755 --itemize-changes)
[[ "$DRY_RUN" == "1" ]] && RSYNC+=(--dry-run)

push() {
  printf '%s\n' "$@" \
    | "${RSYNC[@]}" --files-from=- -e "$ssh_cmd" \
        --rsync-path="mkdir -p '$remote' && rsync" \
        ./ "${target}:${remote}/"
}

echo "==> rsync ${#ASSETS[@]} assets to ${target}:${remote}/"
push "${ASSETS[@]}"
echo "==> rsync ${ENTRY}"
push "$ENTRY"

if [[ "$DRY_RUN" == "1" ]]; then
  echo "==> dry run, nothing was written"
  exit 0
fi

# ---- verify -----------------------------------------------------------------

md5_10() {
  if command -v md5 >/dev/null; then md5 -q "$1" | cut -c1-10
  else md5sum "$1" | cut -c1-10; fi
}
local_hash="$(md5_10 assets/output.css)"

# Checked over ssh rather than HTTP, so DNS, Cloudflare and its cache cannot
# give a false result. This is the authoritative check that the build landed.
echo "==> verifying on the server"
remote_hash="$($ssh_cmd "$target" "md5sum '$remote/assets/output.css' 2>/dev/null | cut -c1-10" || true)"
if [[ "$remote_hash" != "$local_hash" ]]; then
  echo "!!  output.css on the server does not match this build" >&2
  echo "    local $local_hash, server '${remote_hash:-not found}'" >&2
  exit 1
fi
echo "    output.css matches ($local_hash)"

$ssh_cmd "$target" "test -r '$remote/assets/output.css'" \
  || { echo "!!  output.css is not readable, so PHP cannot hash it" >&2; exit 1; }

# HTTP is advisory: the domain may be proxied elsewhere, or Cloudflare may be
# serving a cached copy. A mismatch here is a routing or caching issue, not a
# failed upload, so it warns instead of failing.
if [[ -n "$SITE_URL" ]]; then
  echo "==> checking ${SITE_URL}"
  if html="$(curl -fsS --max-time 20 "$SITE_URL" 2>/dev/null)"; then
    served="$(printf '%s' "$html" | sed -n 's/.*output\.css?v=\([a-f0-9]*\).*/\1/p' | head -1)"
    if [[ "$served" == "$local_hash" ]]; then
      echo "    live page is serving this build"
    else
      echo "!!  live page shows '${served:-no stylesheet hash}', expected $local_hash."
      echo "    The files are correct on the server. Check the domain points at this"
      echo "    host and purge the Cloudflare cache."
    fi
    printf '%s' "$html" | grep -q '<h1' || echo "!!  no <h1> in the response, PHP may not be executing."
  else
    echo "!!  ${SITE_URL} did not respond. Files are on the server regardless."
  fi
fi

echo "==> deployed"
