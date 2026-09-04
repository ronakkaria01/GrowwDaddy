#!/usr/bin/env bash
#
# Deploys GrowwDaddy to an FTP host.
#
#   cp deploy.env.example deploy.env   # fill in, it is gitignored
#   ./deploy.sh --dry-run              # see what would happen
#   ./deploy.sh
#
# Only curl is required, which macOS already has. No lftp, no npm globals.

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

# assets before index.php: the page derives its ?v= hash from output.css on the
# server, so the stylesheet has to be in place before the markup referencing it.
FILES=(
  assets/output.css
  assets/favicon.svg
  assets/og-image.png
  .htaccess
  robots.txt
  sitemap.xml
  index.php
)

# ---- config -----------------------------------------------------------------

# shellcheck source=/dev/null
[[ -f deploy.env ]] && { set -a; . ./deploy.env; set +a; }

: "${FTP_HOST:?set FTP_HOST in deploy.env}"
: "${FTP_USER:?set FTP_USER in deploy.env}"
: "${FTP_PASS:?set FTP_PASS in deploy.env}"
FTP_DIR="${FTP_DIR:-}"          # relative to the login dir, e.g. public_html
FTP_PORT="${FTP_PORT:-21}"
FTP_INSECURE="${FTP_INSECURE:-0}"
SITE_URL="${SITE_URL:-}"

# Plain FTP sends the password in clear text. Require TLS unless explicitly
# overridden, and say so loudly when it is.
if [[ "$FTP_INSECURE" == "1" ]]; then
  echo "!! FTP_INSECURE=1: password and files go over the wire unencrypted."
  TLS_OPT=""
else
  TLS_OPT="ssl-reqd"
fi

base="ftp://${FTP_HOST}:${FTP_PORT}/"
[[ -n "$FTP_DIR" ]] && base="${base}${FTP_DIR%/}/"

# ---- preflight --------------------------------------------------------------

if [[ "$SKIP_BUILD" == "0" ]]; then
  echo "==> building css"
  npm run build >/dev/null
fi

echo "==> checking index.php"
php -l index.php >/dev/null || { echo "index.php has a syntax error, refusing to deploy" >&2; exit 1; }

missing=0
for f in "${FILES[@]}"; do
  [[ -f "$f" ]] || { echo "missing: $f" >&2; missing=1; }
done
[[ "$missing" == "0" ]] || exit 1

# Whitespace-tolerant: the assignments in index.php are space-aligned.
# shellcheck disable=SC2016  # the literal $ctaUrl is the point
if grep -qE '\$ctaUrl[[:space:]]*=[[:space:]]*"#' index.php; then
  echo "!! \$ctaUrl is still #contact, so the buttons scroll instead of booking."
fi

# ---- upload -----------------------------------------------------------------

# Credentials go to curl on stdin, not argv, so they stay out of ps output.
escape() { printf '%s' "$1" | sed 's/[\\"]/\\&/g'; }
cred="$(escape "$FTP_USER"):$(escape "$FTP_PASS")"

put() {
  local local_path="$1" remote="${base}$1"
  if [[ "$DRY_RUN" == "1" ]]; then
    printf '   would put  %-24s -> %s\n' "$local_path" "$remote"
    return
  fi
  printf 'user = "%s"\nurl = "%s"\nupload-file = "%s"\nftp-create-dirs\nfail\nsilent\nshow-error\n%s\n' \
    "$cred" "$remote" "$local_path" "$TLS_OPT" | curl -K -
  printf '   sent  %-24s %6s bytes\n' "$local_path" "$(wc -c <"$local_path" | tr -d ' ')"
}

echo "==> uploading ${#FILES[@]} files to ${base}"
for f in "${FILES[@]}"; do put "$f"; done

[[ "$DRY_RUN" == "1" ]] && { echo "==> dry run, nothing was uploaded"; exit 0; }

# ---- verify -----------------------------------------------------------------

if [[ -z "$SITE_URL" ]]; then
  echo "==> done. Set SITE_URL in deploy.env to have this script verify the deploy."
  exit 0
fi

echo "==> verifying ${SITE_URL}"
html="$(curl -fsS --max-time 20 "$SITE_URL")" || { echo "site did not respond" >&2; exit 1; }

served_hash="$(printf '%s' "$html" | sed -n 's/.*output\.css?v=\([a-f0-9]*\).*/\1/p' | head -1)"
if command -v md5 >/dev/null; then
  local_hash="$(md5 -q assets/output.css | cut -c1-10)"
else
  local_hash="$(md5sum assets/output.css | cut -c1-10)"
fi

if [[ "$served_hash" == "$local_hash" ]]; then
  echo "    css hash matches ($local_hash), the live page is serving this build"
else
  echo "!!  css hash mismatch: served '$served_hash', local '$local_hash'" >&2
  echo "    Either output.css did not upload, or PHP cannot read it (falls back to the year)." >&2
  exit 1
fi

printf '%s' "$html" | grep -q '<h1' || { echo "!!  no <h1> in the response, PHP may not be executing" >&2; exit 1; }
echo "==> deployed"
