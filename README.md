# portifolio

Personal site for **Pedro Haubert** — **Mechanical Pastoral** (EfT Mecanical, dither hero, subtle ASCII, dark-first + light toggle, PT/EN).

## Run

```bash
pnpm install
pnpm dev
```

Open [http://localhost:3000](http://localhost:3000) → redirects to `/pt`.

```bash
pnpm build && pnpm start
```

## Stack

- Next.js (App Router) + TypeScript + Tailwind CSS v4
- MDX in `content/blog/` — `draft: true` stays out of the public index / RSS in production
- Fonts: `public/fonts/EFT_Mecanical/` (SIL OFL)
- Mood: `public/images/mood/`

## Routes (v1)

| Path | Notes |
|------|--------|
| `/[locale]` | Home — dither + ASCII + scramble name |
| `/[locale]/experience` | Timeline (placeholder) |
| `/[locale]/blog` | Published index |
| `/[locale]/blog/[slug]` | MDX post |
| `/[locale]/projects` | Named work list |
| `/[locale]/about` | Long about |
| `/[locale]/now` | Now |
| `/[locale]/uses` | Tools / setup |
| `/feed.xml` | RSS |

Locales: `pt` (default), `en`. Theme toggle in the footer.

## Pedro should fill

- Real experience, about, now, uses, projects copy
- More posts (`draft: true` for unpublished)
- `NEXT_PUBLIC_SITE_URL` for production RSS absolute links
- Deploy (Vercel recommended) when ready

## Out of v1

Newsletter, talks, press kit, colophon.
