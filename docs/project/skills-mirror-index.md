---
title: Skills mirror index
generated: 2026-10-27
count: 42
---

# Skills mirror index

**42 skills** mirrored for this portfolio.

**Repo (cloud VMs):** `.cursor/skills-mirror.tgz` — extracted by `.cursor/environment.json` `install` into `~/.cursor/skills`.

**Project Context (when mounted):** `/cursor/stores/self/skills-mirror/` or `/cursor/stores/bc-9644d405-17f4-415e-ba94-6cebedda0b97/skills-mirror/`.

## Cloud agent kickoff (one-liner)

> Read and follow skills under `~/.cursor/skills/` (from `.cursor/skills-mirror.tgz`) or `/cursor/stores/self/skills-mirror/`, especially design skills: `design-taste-frontend`, `emil-design-eng`, `high-end-visual-design`, `animate`, `brandkit`. Always run poteto-mode.

## Environment `install`

Canonical install lives in `.cursor/environment.json` (tar extract + optional Project Context rsync). Manual equivalent:

```bash
mkdir -p "$HOME/.cursor/skills"
tar -xzf .cursor/skills-mirror.tgz --strip-components=1 -C "$HOME/.cursor/skills"
SRC="${CURSOR_SKILLS_MIRROR:-/cursor/stores/self/skills-mirror}"
if [ ! -d "$SRC" ]; then
  SRC="/cursor/stores/bc-9644d405-17f4-415e-ba94-6cebedda0b97/skills-mirror"
fi
if [ -d "$SRC" ]; then
  rsync -a "$SRC/" "$HOME/.cursor/skills/" || true
fi
```

## Design-related (highlighted)

- `animate`
- `animate-expo`
- `animation-performance`
- `animation-vocabulary`
- `apple-design`
- `ask-sonner`
- `brandkit`
- `break-ui`
- `design-taste-frontend`
- `design-taste-frontend-v1`
- `design-taste-frontend-v2-experimental`
- `emil-design-eng`
- `find-animation-opportunities`
- `frontend-design`
- `gpt-taste`
- `high-end-visual-design`
- `humanizer`
- `image-to-code`
- `imagegen-frontend-mobile`
- `imagegen-frontend-web`
- `improve-animations`
- `industrial-brutalist-ui`
- `minimalist-ui`
- `mobile-native`
- `pick-ui-library`
- `prototype`
- `redesign-existing-projects`
- `review-animations`
- `stitch-design-taste`
- `web-design-guidelines`

## Full index

| Skill | Description | Source | Mirrored path |
|-------|-------------|--------|---------------|
| `animate` ★ | Build an animation from scratch, making the decisions in the order that determines whether it feels right — should it animate at all, wha... | `/Users/pedrohaubert/.claude/skills/animate → ~/.agents/skills/animate` | `skills-mirror/animate/` |
| `animate-expo` ★ | Build animations in React Native and Expo, making the decisions in the order that determines whether they feel right — should it animate,... | `/Users/pedrohaubert/.claude/skills/animate-expo → ~/.agents/skills/animate-expo` | `skills-mirror/animate-expo/` |
| `animation-performance` ★ | Keep web animations inside the frame budget — animate composite-only properties, keep motion off the main thread when the page is busy, a... | `/Users/pedrohaubert/.claude/skills/animation-performance → ~/.agents/skills/animation-performance` | `skills-mirror/animation-performance/` |
| `animation-vocabulary` ★ | Reverse-lookup glossary that turns a vague description of a web animation or motion effect into its exact term ("the bouncy thing when a ... | `/Users/pedrohaubert/.claude/skills/animation-vocabulary → ~/.agents/skills/animation-vocabulary` | `skills-mirror/animation-vocabulary/` |
| `apontamento-horas` | Monta os apontamentos diários de tarefas para o lançamento de horas, um parágrafo por dia útil escrito a partir dos commits e PRs do próp... | `/Users/pedrohaubert/.claude/skills/apontamento-horas → ~/.agents/skills/apontamento-horas` | `skills-mirror/apontamento-horas/` |
| `apple-design` ★ | Apple's approach to interface design and fluid, physical motion, translated for the web. Use when building or reviewing gesture-driven UI... | `/Users/pedrohaubert/.claude/skills/apple-design → ~/.agents/skills/apple-design` | `skills-mirror/apple-design/` |
| `ask-sonner` ★ | Guide to Sonner, the React toast library — install and wire up the Toaster, pick the right toast() call, promise and loading toasts, upda... | `/Users/pedrohaubert/.claude/skills/ask-sonner → ~/.agents/skills/ask-sonner` | `skills-mirror/ask-sonner/` |
| `be-ambitious` | > | `/Users/pedrohaubert/.claude/skills/be-ambitious → ~/.agents/skills/be-ambitious` | `skills-mirror/be-ambitious/` |
| `brandkit` ★ | Premium brand-kit image generation skill for creating high-end brand-guidelines boards, logo systems, identity decks, and visual-world pr... | `/Users/pedrohaubert/.claude/skills/brandkit → ~/.agents/skills/brandkit` | `skills-mirror/brandkit/` |
| `break-ui` ★ | Try to break a piece of UI by feeding it worst-case data — long names, unbreakable emails, one-letter names, missing fields, huge counts,... | `/Users/pedrohaubert/.claude/skills/break-ui → ~/.agents/skills/break-ui` | `skills-mirror/break-ui/` |
| `business-decision-questionnaire` | Turns decisions already made or implemented into a concise, humanized questionnaire for a business expert. Use when explicitly invoked to... | `/Users/pedrohaubert/.claude/skills/business-decision-questionnaire → ~/.agents/skills/business-decision-questionnaire` | `skills-mirror/business-decision-questionnaire/` |
| `canvas` | A Cursor Canvas is a live React app that the user can open beside the chat. You MUST use a canvas when the agent produces a durable stand... | `/Users/pedrohaubert/.cursor/skills-cursor/canvas` | `skills-mirror/canvas/` |
| `create-skill` | >- | `/Users/pedrohaubert/.cursor/skills-cursor/create-skill` | `skills-mirror/create-skill/` |
| `design-taste-frontend` ★ | tasteskill v2, the anti-slop frontend skill. Art direction for websites, distilled from a study of 247 curated gallery sites (One Page Lo... | `/Users/pedrohaubert/.claude/skills/design-taste-frontend → ~/.agents/skills/design-taste-frontend` | `skills-mirror/design-taste-frontend/` |
| `design-taste-frontend-v1` ★ | The original v1 taste-skill, preserved for projects depending on its exact behavior. The current default is `design-taste-frontend` (v2),... | `/Users/pedrohaubert/.claude/skills/design-taste-frontend-v1 → ~/.agents/skills/design-taste-frontend-v1` | `skills-mirror/design-taste-frontend-v1/` |
| `design-taste-frontend-v2-experimental` ★ | Old v2 (experimental) of taste-skill, the single-file dial-driven version, preserved for projects depending on its exact behavior. The cu... | `/Users/pedrohaubert/.claude/skills/design-taste-frontend-v2-experimental → ~/.agents/skills/design-taste-frontend-v2-experimental` | `skills-mirror/design-taste-frontend-v2-experimental/` |
| `emil-design-eng` ★ | This skill encodes Emil Kowalski's philosophy on UI polish, component design, animation decisions, and the invisible details that make so... | `/Users/pedrohaubert/.claude/skills/emil-design-eng → ~/.agents/skills/emil-design-eng` | `skills-mirror/emil-design-eng/` |
| `find-animation-opportunities` ★ | Search a codebase or UI for places that don't animate but should, and reject everything that shouldn't. Read-only; it proposes motion wit... | `/Users/pedrohaubert/.claude/skills/find-animation-opportunities → ~/.agents/skills/find-animation-opportunities` | `skills-mirror/find-animation-opportunities/` |
| `frontend-design` ★ | Create distinctive, production-grade frontend interfaces with high design quality. Use this skill when the user asks to build web compone... | `/Users/pedrohaubert/.cursor/plugins/cache/claude-code-plugins/frontend-design/2194e8e0904087b9f2afce41a2ec083cc71c0653/skills/frontend-design` | `skills-mirror/frontend-design/` |
| `full-output-enforcement` | Overrides default LLM truncation behavior. Enforces complete code generation, bans placeholder patterns, and handles token-limit splits c... | `/Users/pedrohaubert/.claude/skills/full-output-enforcement → ~/.agents/skills/full-output-enforcement` | `skills-mirror/full-output-enforcement/` |
| `gpt-taste` ★ | Elite UX/UI & Advanced GSAP Motion Engineer. Enforces Python-driven true randomization for layout variance, strict AIDA page structure, w... | `/Users/pedrohaubert/.claude/skills/gpt-taste → ~/.agents/skills/gpt-taste` | `skills-mirror/gpt-taste/` |
| `handoff` | Compact the current conversation into a handoff document for another agent to pick up. | `/Users/pedrohaubert/.claude/skills/handoff → ~/.agents/skills/handoff` | `skills-mirror/handoff/` |
| `high-end-visual-design` ★ | Teaches the AI to design like a high-end agency. Defines the exact fonts, spacing, shadows, card structures, and animations that make a w... | `/Users/pedrohaubert/.claude/skills/high-end-visual-design → ~/.agents/skills/high-end-visual-design` | `skills-mirror/high-end-visual-design/` |
| `humanizer` ★ | \| | `/Users/pedrohaubert/.claude/skills/humanizer → ~/.agents/skills/humanizer` | `skills-mirror/humanizer/` |
| `image-to-code` ★ | Elite website image-to-code skill for Codex. For visually important web tasks, it must first generate the design image(s) itself, deeply ... | `/Users/pedrohaubert/.claude/skills/image-to-code → ~/.agents/skills/image-to-code` | `skills-mirror/image-to-code/` |
| `imagegen-frontend-mobile` ★ | Elite mobile app image-generation skill for creating premium, app-native screen concepts and flows. Designed for iOS, Android, and cross-... | `/Users/pedrohaubert/.claude/skills/imagegen-frontend-mobile → ~/.agents/skills/imagegen-frontend-mobile` | `skills-mirror/imagegen-frontend-mobile/` |
| `imagegen-frontend-web` ★ | Elite frontend image-direction skill for generating premium, conversion-aware website design references. CRITICAL OUTPUT RULE — generate ... | `/Users/pedrohaubert/.claude/skills/imagegen-frontend-web → ~/.agents/skills/imagegen-frontend-web` | `skills-mirror/imagegen-frontend-web/` |
| `improve-animations` ★ | Survey a codebase's animation and motion code as a senior motion advisor, then produce a prioritized audit and self-contained implementat... | `/Users/pedrohaubert/.claude/skills/improve-animations → ~/.agents/skills/improve-animations` | `skills-mirror/improve-animations/` |
| `improve-codebase-architecture` | Scan a codebase for deepening opportunities, present them as a visual HTML report, then grill through whichever one you pick. | `/Users/pedrohaubert/.claude/skills/improve-codebase-architecture → ~/.agents/skills/improve-codebase-architecture` | `skills-mirror/improve-codebase-architecture/` |
| `industrial-brutalist-ui` ★ | Raw mechanical interfaces fusing Swiss typographic print with military terminal aesthetics. Rigid grids, extreme type scale contrast, uti... | `/Users/pedrohaubert/.claude/skills/industrial-brutalist-ui → ~/.agents/skills/industrial-brutalist-ui` | `skills-mirror/industrial-brutalist-ui/` |
| `limpeza-mac` | Libera espaço em disco no macOS pelo terminal, sem interface. Mapeia onde o armazenamento está (inclusive o que o painel de Armazenamento... | `/Users/pedrohaubert/.claude/skills/limpeza-mac → ~/.agents/skills/limpeza-mac` | `skills-mirror/limpeza-mac/` |
| `minimalist-ui` ★ | Clean editorial-style interfaces. Warm monochrome palette, typographic contrast, flat bento grids, muted pastels. No gradients, no heavy ... | `/Users/pedrohaubert/.claude/skills/minimalist-ui → ~/.agents/skills/minimalist-ui` | `skills-mirror/minimalist-ui/` |
| `mobile-native` ★ | Make a web app feel native on a phone — the small CSS and meta-tag fixes that separate "a website in a browser" from something that feels... | `/Users/pedrohaubert/.claude/skills/mobile-native → ~/.agents/skills/mobile-native` | `skills-mirror/mobile-native/` |
| `pick-ui-library` ★ | Pick the right library for a given frontend task from a curated, opinionated list — numbers, OTP inputs, charts, command menus, virtualiz... | `/Users/pedrohaubert/.claude/skills/pick-ui-library → ~/.agents/skills/pick-ui-library` | `skills-mirror/pick-ui-library/` |
| `prototype` ★ | Build multiple genuinely different versions of a UI piece you describe, rendered behind a visual picker so you can flip through them live... | `/Users/pedrohaubert/.claude/skills/prototype → ~/.agents/skills/prototype` | `skills-mirror/prototype/` |
| `recado-teams` | Escreve a mensagem que o usuário vai colar no Teams para o negócio ou para um colega, em parágrafos curtos e naturais. Use quando pedirem... | `/Users/pedrohaubert/.claude/skills/recado-teams → ~/.agents/skills/recado-teams` | `skills-mirror/recado-teams/` |
| `redesign-existing-projects` ★ | Upgrades existing websites and apps to premium quality. Audits current design, identifies generic AI patterns, and applies high-end desig... | `/Users/pedrohaubert/.claude/skills/redesign-existing-projects → ~/.agents/skills/redesign-existing-projects` | `skills-mirror/redesign-existing-projects/` |
| `review-animations` ★ | Reviews animation and motion code against a high craft bar derived from Emil Kowalski's design engineering philosophy. Default to flaggin... | `/Users/pedrohaubert/.claude/skills/review-animations → ~/.agents/skills/review-animations` | `skills-mirror/review-animations/` |
| `stitch-design-taste` ★ | Semantic Design System Skill for Google Stitch. Generates agent-friendly DESIGN.md files that enforce premium, anti-generic UI standards ... | `/Users/pedrohaubert/.claude/skills/stitch-design-taste → ~/.agents/skills/stitch-design-taste` | `skills-mirror/stitch-design-taste/` |
| `web-design-guidelines` ★ | Review UI code for Web Interface Guidelines compliance. Use when asked to "review my UI", "check accessibility", "audit design", "review ... | `/Users/pedrohaubert/.claude/skills/web-design-guidelines → ~/.agents/skills/web-design-guidelines` | `skills-mirror/web-design-guidelines/` |
| `write-swift` | How to write modern Swift well — modeling with value types, Swift 6 data-race safety and approachable concurrency (@concurrent, main-acto... | `/Users/pedrohaubert/.claude/skills/write-swift → ~/.agents/skills/write-swift` | `skills-mirror/write-swift/` |
| `writing-for-agents` | Writing documents for agents. Use when creating or editing skills, or modifying AGENTS.md or CLAUDE.md. | `/Users/pedrohaubert/.claude/skills/writing-for-agents → ~/.agents/skills/writing-for-agents` | `skills-mirror/writing-for-agents/` |

★ = design-related priority skill.

## Dedup notes

- Canonical bodies for Pedro’s design library live in `~/.agents/skills/`; `~/.claude/skills/*` and some `~/.cursor/skills/*` are symlinks to those.
- Mirrored once per skill name from that canonical tree.
- Added plugin skill `frontend-design` and Cursor product extras `canvas`, `create-skill`.
- Skipped `.trash`, unrelated large plugin caches, and bulk `skills-cursor` product builtins.
