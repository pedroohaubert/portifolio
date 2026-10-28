# portifolio

Personal site for **Pedro Haubert** — Mechanical Pastoral direction (EfT Mecanical, dither hero, subtle ASCII, dark-first + light toggle, PT/EN).

## Stack

- Next.js (App Router) + TypeScript + Tailwind CSS v4
- MDX posts in `content/blog/` (`draft: true` = unpublished in production)
- Local fonts: `public/fonts/EFT_Mecanical/` (SIL OFL)

## Run locally

```bash
pnpm install
pnpm dev
```

Open [http://localhost:3000](http://localhost:3000) (redirects to `/pt`).

```bash
pnpm build && pnpm start
```

## Routes (v1)

| Path | Notes |
|------|--------|
| `/[locale]` | Home — dither + ASCII |
| `/[locale]/experience` | Timeline stub |
| `/[locale]/blog` | Index (published only in prod) |
| `/[locale]/blog/[slug]` | MDX post |
| `/[locale]/projects` | List stub |
| `/[locale]/about` | Long about stub |
| `/[locale]/now` | Now page stub |
| `/[locale]/uses` | Tools / setup stub |
| `/feed.xml` | RSS |

Locales: `pt` (default), `en`.

## Fill in

- Real experience, about, now, uses, projects copy
- More posts; keep drafts with `draft: true`
- RSS `SITE` URL in `src/app/feed.xml/route.ts` when domain is final
- Deploy to Vercel when ready (no auto-deploy wired yet)

## Out of v1

Newsletter, talks, press kit, colophon.
