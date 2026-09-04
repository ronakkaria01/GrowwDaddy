# GrowwDaddy — Reddit Marketing Agency

One-page marketing site for **GrowwDaddy**. Built with PHP + Tailwind CSS (CDN) + minimal vanilla JS. Lightweight, fast, and deployable on any standard PHP host.

## Quick start

No build step required — Tailwind is loaded via CDN in `index.php`.

```bash
# Local PHP server
php -S localhost:8000
# then open http://localhost:8000
```

## Deploy

Upload the contents of this folder to your hosting root. That's it.

- `index.php` is the entire site
- `assets/favicon.svg` is the favicon
- No database needed

## Edit the CTA

In `index.php` at the top:

```php
$ctaUrl = "#contact"; // <- replace with Calendly / Cal.com link
$email = "hello@growwdaddy.com";
```

All primary buttons use `$ctaUrl`, so one edit updates every CTA.

## Optional: compile Tailwind locally (instead of CDN)

If you prefer a compiled CSS file for production:

```bash
npm install
npm run build   # creates assets/output.css
```

Then in `index.php` replace the CDN `<script src="https://cdn.tailwindcss.com">` block with:

```html
<link rel="stylesheet" href="/assets/output.css">
```

`tailwind.config.js` and `src/input.css` are already set up.

## Where to add real case studies

Search for `CASE_STUDY_START` in `index.php`. Replace the placeholder metrics in the "Built for Measurable Growth" section with real numbers. The section intentionally ships without fake testimonials or inflated stats.

## Structure

```
/index.php          — single page site
/assets/favicon.svg — favicon
/src/input.css      — Tailwind input (optional build)
/tailwind.config.js — Tailwind config
/package.json       — optional build tooling
```

## Checklist before launch

- [ ] Replace `$ctaUrl` with your scheduling link
- [ ] Verify `hello@growwdaddy.com` or update `$email`
- [ ] Add real `og-image.png` to `/assets/` (1200×630)
- [ ] Update Privacy/Terms links in footer if needed
- [ ] Replace placeholder metrics when you have data

## License

© 2026 GrowwDaddy
