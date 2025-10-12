
# Pulley Excavating – Starter (Netlify-ready)

This is a small, static site starter for **Pulley Excavating & Land Service LLC**.

## What’s inside
- `index.html` – one-page site wired for **Netlify Forms** (no server needed).
- `css/site.css` – design tokens (colors/typography) and layout.
- `assets/pulley_header_1920x400.png` – header image.
- `netlify.toml` – build + headers + asset caching.
- `robots.txt`, `sitemap.xml` – basic SEO files.
- `server-examples/contact.php` – **optional** SMTP example for non-Netlify hosts (e.g., Bluehost). Not used on Netlify.

## Quick start (Netlify)
1. Create a new private repo on GitHub and push this folder’s contents.
2. In Netlify, **New site from Git**, pick your repo, build command: _none_, publish directory: `.`
3. Under **Site settings → Forms**, you should see a form named **quote** after your first submission.
4. (Optional) Add notifications under **Forms → Notifications** to forward submissions to your email.
5. Add your custom domain under **Domain settings** and update DNS per Netlify’s instructions.

## Updating content
- Edit copy directly in `index.html`.
- Replace Unsplash image URLs with your own hosted images.
- Swap the header image in `/assets` if you revise it (keep the same filename or update CSS).

## Before & After gallery
- Drop finished photos in `assets/before-after/<project-name>/` (e.g., `assets/before-after/demolition-01/before.jpg`). Netlify will serve these files via its global CDN once deployed.
- Export images around 1600 px wide, compress to ~250 KB if possible, and prefer **WebP** with JPEG fallbacks to keep load times quick.
- Update the image `src` values inside the `#portfolio` section of `index.html` and swap the placeholder alt text with project-specific descriptions.
- Need more sets? Duplicate one of the `<article class="before-after">` blocks and adjust the heading, description, and sources.
- Avoid checking in multi-megabyte photos; for very large libraries consider Netlify Large Media (Git LFS) or an external image CDN like **Cloudinary** (generous free tier) and paste the delivered URLs into the gallery.

## Email options
- **Netlify Forms (default)**: works out-of-the-box, stores submissions in Netlify.
- **SMTP (Bluehost, etc.)**: If you host elsewhere, you can replace the form with `action="server-examples/contact.php"` and use the PHP example. Set SPF/DKIM/DMARC accordingly.

## SEO checklist
- Update the title/description in `<head>`.
- Replace `https://www.pulleyexcavating.com/` in `sitemap.xml` with your final domain.
- Add OpenGraph/Twitter tags if desired.
- Fill alt text on images when swapping from Unsplash.

## Accessibility & performance
- Contrast meets WCAG for body text.
- Responsive layout (3→2→1 columns).
- Long-lived caching for assets in `netlify.toml`.
- Consider converting images to **WebP** and compressing originals.
