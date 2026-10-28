# portifolio

Personal site for Pedro Haubert. Mechanical Pastoral. One dark column, EfT Mecanical, ASCII sharks, PT/EN.

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
| `/[locale]` | One column. Writing, projects, studies, beyond work |
| `/[locale]/blog` | All posts |
| `/[locale]/blog/[slug]` | MDX post |
| `/[locale]/setup` | Coding setup |
| `/feed.xml` | RSS |

`/experience`, `/about`, `/now`, `/projects`, and `/uses` redirect into that column or to setup.

Locales: `pt` (default), `en`. Theme toggle in the footer.

## Pedro should fill

- Real studies, projects, and beyond-work copy
- The LinkedIn URL in `src/lib/profiles.ts`
- More posts (`draft: true` for unpublished)
- `NEXT_PUBLIC_SITE_URL` for production RSS absolute links
- Deploy (Vercel recommended) when ready

## Out of v1

Newsletter, talks, press kit, colophon.
