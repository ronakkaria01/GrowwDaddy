# GrowwDaddy

One-page site. PHP for a handful of variables, Tailwind v4 for the styling, ~120 lines of vanilla JS. No framework, no database, no build step on the server. The contact form posts to itself and sends over SMTP with PHPMailer.

## Run it

```bash
composer install --no-dev --optimize-autoloader   # PHPMailer, for the contact form
# smtp.php is gitignored — see "Contact form" below for what goes in it
php -S localhost:8000
```

`assets/output.css` is committed, so the styling works on a fresh clone with no npm install.

## Contact form

`index.php` handles its own POST. Validates, sends, then 303-redirects to `?sent=1`
so a refresh can't send the same enquiry twice. Spam protection is an off-screen
honeypot field — bots fill it, the submission is dropped, and they get the same
thank-you page so they don't learn anything.

Mail goes out through Hostinger SMTP with PHPMailer. Credentials live in
`smtp.php`, which is gitignored — it's the only copy of the credentials, so don't
delete it without noting them down first. It returns a plain array:

```php
<?php
return [
    "host"       => "smtp.hostinger.com",
    "port"       => 465,          // 587 with "tls" if 465 is blocked
    "encryption" => "ssl",
    "username"   => "hello@growwdaddy.com",
    "password"   => "the mailbox password, not the hPanel login",
    "from"       => "hello@growwdaddy.com",
    "from_name"  => "GrowwDaddy site",
    "to"         => ["hello@growwdaddy.com"],
];
```

The values come from hPanel → Emails → Email Accounts → the mailbox →
Configuration settings:

|          |                                                       |
| -------- | ----------------------------------------------------- |
| host     | `smtp.hostinger.com`                                  |
| port     | `465` with `ssl`, or `587` with `tls`                 |
| username | the full mailbox address, e.g. `hello@growwdaddy.com` |
| password | that **mailbox's** password, not the hPanel login     |

`From` has to be a mailbox on the domain or Hostinger refuses to relay; the
enquirer goes on `Reply-To`, so hitting reply in the inbox works. If `smtp.php`
is missing or has an empty password, the handler falls back to PHP `mail()` rather
than losing the enquiry — deliverable enough for a test, not for production.
SMTP errors go to the PHP error log; the visitor just gets the `mailto:` fallback.

`vendor/` and `smtp.php` are both gitignored but both get rsynced by `deploy.sh`,
because the server has no composer and this site doesn't need a pipeline. Run
`composer install --no-dev` locally before deploying and the working copy is the
artifact.

## Deploying

```bash
cp deploy.env.example deploy.env   # gitignored, set SSH_HOST and REMOTE_DIR
./deploy.sh --dry-run              # rsync -n, writes nothing
./deploy.sh
```

Builds the CSS, runs `php -l`, then rsyncs the deploy files over ssh — assets,
`smtp.php`, `vendor/` and `index.php`.
`src/`, `node_modules` and the tooling never go up, because rsync is given an
explicit file list rather than the directory. Assets go first and `index.php`
second, so the markup never references a stylesheet that has not landed yet.

Verification is done over ssh, not HTTP, comparing the md5 of `output.css` on
the server against the local build. Cloudflare sits in front of the domain and
caches, so an HTTP check can pass or fail for reasons that have nothing to do
with the upload. `SITE_URL` adds an HTTP check on top, but it only warns.

## Formatting

```bash
npm run format   # rustywind (class order) + html-beautify (index.php) + prettier (css, md, json)
npm run lint     # check-only, plus php -l
```

`index.php` is in `.prettierignore` on purpose. Prettier's PHP plugin reflows the
inside of `<?php ?>` tags — it split `htmlspecialchars($ctaUrl)` over three lines
— so the template goes through `html-beautify` with `templating: php` instead,
which treats PHP tags as opaque. Settings live in `.jsbeautifyrc`.

One quirk: rustywind doesn't read the v4 `@theme`, so custom colour classes
(`bg-surface`, `text-accent`, `border-line`) sort to the front of the attribute
rather than into their proper group. Class order has no effect on the cascade,
so it's cosmetic.

## Editing styles

All Tailwind config lives in `src/input.css` (`@theme` for colours/fonts, `@source` for the scanner). There is no `tailwind.config.js` — v4 doesn't need one.

```bash
npm install
npm run dev     # watch
npm run build   # minified, commit the result
```

Colour tokens: `bg`, `surface`, `surface2`, `line`, `accent`, `accent-hover`.

## Favicons

The mark is the navbar wordmark cut down to `G.` — the Bricolage Grotesque glyph
converted to SVG paths, so nothing depends on the webfont loading. The lime square
is full-bleed on the apple-touch and android icons because iOS and Android apply
their own corner masking; only the browser-tab versions carry the 8px radius.

Everything was generated from `assets/favicon.svg`, so to change the mark: edit the
SVG, render it large in a browser, and downsample. Rare enough that there is no
script for it — the twelve files are the artifact.

## Link preview image

`src/og-image.html` is the source for `assets/og-image.png` (1200×630) — plain HTML
using the same fonts and palette as the site. Edit it, then screenshot it:

```bash
npm run og
```

That drives headless Chrome, so nothing else needs installing. Twitter and
Facebook cache aggressively — the ?v= trick doesn't apply to `og:image`, so if the
old card is still showing, run it through their card debuggers to force a refetch.

## Cache busting

`index.php` appends `?v=<md5 of output.css>` to the stylesheet, so `.htaccess` can cache it for a year and visitors still get the new file the moment it changes. Rebuild the CSS and the hash moves on its own — nothing to remember.

## Things to change before it goes live

- `$ctaUrl` in `index.php` — currently `#contact`, which now scrolls to the contact form. Point it at Cal.com / Calendly if you'd rather have bookings than enquiries.
- The contact form posts to `index.php` itself and sends with PHP `mail()` to `$email`. Check it actually arrives on the live host — shared hosts often need an SMTP relay, in which case swap `mail()` for PHPMailer. Spam protection is a honeypot field, no captcha.
- `$email` — `hello@growwdaddy.com` needs to exist and be monitored
- `$siteUrl` — used for the canonical and OG tags, change if the domain isn't `growwdaddy.com`
- The footer says there's no analytics on the page. If you add any, change that line.
- `assets/site.webmanifest` has the app name and colours, worth a look if the domain changes

## Files

```
index.php           the whole site, contact handler included
smtp.php            SMTP credentials, gitignored, deployed by rsync
vendor/             PHPMailer, gitignored, deployed by rsync
src/input.css       Tailwind entry + theme
assets/output.css   compiled, committed
assets/favicon.svg   the mark: Bricolage "G" + full stop, as outlines
assets/favicon.ico   16/32/48, also copied to /favicon.ico
assets/*.png         16/32/48/96, apple-touch 180, android 192/512, maskable 512
assets/site.webmanifest
assets/og-image.png
.htaccess           gzip, cache headers, https + www redirect (Apache only)
robots.txt
sitemap.xml
```
