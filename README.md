# GrowwDaddy

One-page site. PHP for a handful of variables, Tailwind v4 for the styling, ~120 lines of vanilla JS. No framework, no database, no build step on the server.

## Run it

```bash
php -S localhost:8000
```

`assets/output.css` is committed, so the site works on a fresh clone with no npm install.

## Editing styles

All Tailwind config lives in `src/input.css` (`@theme` for colours/fonts, `@source` for the scanner). There is no `tailwind.config.js` — v4 doesn't need one.

```bash
npm install
npm run dev     # watch
npm run build   # minified, commit the result
```

Colour tokens: `bg`, `surface`, `surface2`, `line`, `accent`, `accent-hover`.

## Cache busting

`index.php` appends `?v=<md5 of output.css>` to the stylesheet, so `.htaccess` can cache it for a year and visitors still get the new file the moment it changes. Rebuild the CSS and the hash moves on its own — nothing to remember.

## Things to change before it goes live

- `$ctaUrl` in `index.php` — currently `#contact`, wants the Cal.com / Calendly link
- `$email` — `hello@growwdaddy.com` needs to exist and be monitored
- `$siteUrl` — used for the canonical and OG tags, change if the domain isn't `growwdaddy.com`
- `assets/og-image.png` (1200×630) still carries the old headline, so regenerate it
- The footer says there's no analytics on the page. If you add any, change that line.

## Files

```
index.php           the whole site
src/input.css       Tailwind entry + theme
assets/output.css   compiled, committed
assets/favicon.svg
assets/og-image.png
.htaccess           gzip, cache headers, https + www redirect (Apache only)
robots.txt
sitemap.xml
```
