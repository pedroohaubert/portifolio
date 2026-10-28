# Definição estética — Portfólio Pedro Haubert

Brief durável para orientar design e implementação. Não copiar nenhum site de referência; adaptar princípios.

**Referências inspecionadas:** daoho.dev, jwahn.com, mattpalmer.io, sahillavingia.com, ascii-sharks, leerob.com, emilkowal.ski, fancycomponents.dev, sfcompute.com (+ mood images dithered).  
**Tipografia do projeto:** família `EfT Mecanical` (OFL) em `docs/project/media/fonts/EFT_Mecanical/`.  
**Screenshots:** `docs/project/media/research/`.

---

## 1. Nome da direção visual

**Mechanical Pastoral (dithered neoclassical)**

Uma página pessoal escura e tipográfica, com **textura digital lo-fi** (dither / ASCII / pixel grid) e um ar **neoclássico-pastoral** à la SF Compute — sem parecer landing de cloud nem clone de nenhum portfolio da lista.

Em uma frase: *serif mecânico + espaço generoso + uma superfície dithered como âncora visual + motion com intenção, não ruído.*

---

## 2. Palette

Tokens em inglês (CSS variables sugeridas). Preferir **dark-first**; light mode opcional e secundário.

| Token | Hex (aprox.) | Uso |
|-------|----------------|-----|
| `--bg` | `#0A0A0A` / `#0D0D0C` | Fundo principal (quase preto, levemente quente) |
| `--bg-elevated` | `#141413` | Superfícies levemente elevadas, code blocks |
| `--fg` | `#E8E4DC` | Texto principal (off-white quente, não `#fff` puro) |
| `--fg-muted` | `#9A958C` | Meta, datas, secondary copy |
| `--fg-faint` | `#5C574F` | ASCII de fundo, rules, placeholders |
| `--accent` | `#2F5BFF` → `#1E4BFF` | Azul “capitol sky” — CTAs raros, links ativos, status |
| `--accent-soft` | `#3D6B4F` | Verde oliva / pastoral — ASCII accents, hover suave |
| `--warn-art` | `#C45A2C` | Só em arte dithered (koi/orange/earth) — **não** como cor de UI |
| `--rule` | `rgba(232,228,220,0.12)` | Separadores hairline |
| `--dither-sky` | `#0B3D8C` / `#0047AB` | Planos de imagem mood (sky), não fills grandes de UI |

**Regras de cor**
- UI quase monocromática; cor vive nas **imagens dithered** e em **1 accent** funcional.
- Evitar purple/indigo gradients, glow neon, cream+#terracotta “AI default”, e flat purple-on-white.
- Contraste de leitura: corpo ≥ AA em `--fg` sobre `--bg`.

---

## 3. Tipografia

### Família do projeto — EfT Mecanical (OFL)

| Arquivo | Role sugerido | `font-weight` CSS |
|---------|---------------|-------------------|
| `EfTMecanical-Light.otf/.woff` | Soft display, section titles grandes | `300` |
| `EfTMecanical-Book.otf/.woff` | Corpo editorial / ensaios | `350`–`400` (mapear `@font-face`) |
| `EfTMecanical-Regular.otf/.woff` | Body UI, nav, listas | `400` |
| `EfTMecanical-Bold.otf/.woff` | Nome, H1, ênfase | `700` |

- **Licença:** SIL Open Font License (OFL) — OK para web embedding; manter notice OFL no pacote da fonte; não vender a fonte sozinha.
- **Caráter:** serif de alto contraste, proporção variável (não mono), ar “mecânico-clássico” — casa com neoclassicismo dithered e com portfolios serif (leerob, jwahn) sem imitar Playfair/Times genéricos.
- **Nota técnica:** cada weight vem com `family` name distinto no arquivo (`EfT Mecanical Light`, `… Book`, etc.). Na implementação, unificar via `@font-face` sob um único `font-family: "EfT Mecanical"` com `font-weight` corretos.
- Specimen visual: `docs/project/media/research/eft-mecanical-specimen.png`.

### Papéis (display / body / mono)

| Role | Fonte | Notas |
|------|--------|------|
| **Display** | **EfT Mecanical Bold / Light** | Nome no hero, títulos de página. Tracking levemente negativo em sizes grandes (`-0.02em`). |
| **Body** | **EfT Mecanical Regular ou Book** | Intro, experience, posts curtos. Measure ~55–65ch; line-height ~1.55–1.65. |
| **Mono** | System stack ou Geist Mono / UI Mono | Código, ASCII, timestamps, labels técnicos. **Não** forçar Mecanical em code. |

**Decisão de 1 vs 2 famílias**
- **Default recomendado:** EfT Mecanical como **única** família de UI + leitura curta/média; mono só para code/ASCII.
- **Opcional (se posts longos cansarem):** body de blog em um serif de leitura neutro (ex. Source Serif / Newsreader) **ou** manter Book com measure mais estreito e leading maior — testar com 800+ palavras antes de adicionar segunda família.

### Pairing vs referências (não copiar stacks)

| Referência | Stack observado | Como Pedro diverge |
|------------|-----------------|--------------------|
| daoho | Inter + Playfair + Geist Mono; mono-feel no “pond” | Sem Playfair/Inter; Mecanical no display/body; mono só no ASCII |
| jwahn | Serif clássico + ASCII faint | Mesma tensão serif+ASCII, mas Mecanical no lugar do Times genérico |
| mattpalmer | Sans + script accent + foto | Sem script handwritten; sem hero foto stock; lowercase nav ok |
| sahil | Sans bold + lista + pinturas | Lista de writing ok; arte = dither pastoral, não óleo realista |
| leerob | Serif escuro + ilustração lateral | Serif = Mecanical; arte = dither/ASCII, não painting panorâmica |
| emil | Sans único, coluna estreita, zero chrome | **Herdar spacing e hierarquia**; trocar sans por Mecanical |
| sfcompute | Serif headline + sans body + azul + light | Pegar mood dither + azul accent; **não** sidebar marketing / logos strip |
| fancycomponents | Playful motion kit | Usar 1–2 efeitos (scramble / pixel) com parcimônia |

---

## 4. Texture / treatment

**Assinatura visual:** dither + ASCII + scanline **como craft**, não como skin genérica “glitch”.

1. **Dithered stills** (mood refs em `docs/project/media/references/`): pastoral, capitol, garden — usar como âncora de página (hero full-bleed **ou** um frame editorial), nunca como mosaic de cards.
2. **ASCII / pixel organisms** (daoho pond, ascii-sharks): um canvas ou bloco vivo no home — peixes/formas em grid de caracteres ou pixels; baixa saturação no fundo, accent só nos “seres”.
3. **Scanline / glitch edge:** permitido na **borda de imagens** (como garden ref), não em todo o layout.
4. **Grain:** noise CSS/SVG muito sutil no `--bg` (opacidade baixa); se competir com dither da arte, desligar.

**Não:** pixelate em texto corrido; CRT overlay em full-page; VHS everywhere; multi-layer neon glow.

---

## 5. Layout principles

- **Uma composição no first viewport:** marca/nome (hero-level), uma headline, uma frase de apoio, um grupo de links/CTA, **uma** âncora visual (dither ou ASCII). Sem stats, chips, cards no hero.
- **Coluna editorial** (~max 40–42rem conteúdo): ritmo de emil/sahil/jwahn — esquerda-alinhado, não dashboard.
- **Densidade:** home respirada; listagens (posts, jobs) compactas com hairlines (leerob/sahil).
- **Nav:** texto lowercase ou Title Case só no nome; poucos itens (`home`, `experience`, `blog`, `github`); sem mega-menu.
- **Brand test:** sem a nav, o first viewport ainda deve “parecer Pedro” via tipo Mecanical + textura dither/ASCII.
- **Mobile:** mesma hierarquia; ASCII pode reduzir partículas; dither image vira full-bleed atrás ou acima do texto, sem overlay de badges.

---

## 6. Motion rules

Filosofia (emil): *animar só o que esclarece; preferir transform/opacity; ease-out; nada que nasça do scale 0.*

**Permitido (2–3 intenções no site todo)**
1. **Entrada tipográfica:** reveal vertical ou scramble-in leve no nome/headline (Fancy: Scramble In / Vertical Cut Reveal) — uma vez no load.
2. **ASCII/pond:** drift lento ou reação suave ao ponteiro (daoho / ascii-sharks) — loop calmo, sem particle storm.
3. **Hover de links:** underline → background ou letter-swap mínimo; duration ~150–220ms.

**Fancy Components — usar como biblioteca de craft, não como feira:** Pixel Trail ou Scramble só se reforçarem a direção Mechanical Pastoral; evitar Float/Gooey/3D carousel no portfolio pessoal.

**Proibido:** autoplaying marquees, stacking cards de marketing, parallax agressivo, cursor trails em todas as páginas.

---

## 7. Do / Don’t

**Do**
- Nome em EfT Mecanical Bold como sinal de marca.
- Off-white quente em fundo quase preto.
- Uma textura signature (dither **ou** ASCII hero) + mono para código.
- Experience como lista cronológica clara (jwahn bullets / emil sections).
- Blog como índice tipográfico (título + data + hairline).
- Código e demos apontando para GitHub.

**Don’t**
- Copiar koi pond, ASCII sharks, ou neoclassical SF Compute 1:1.
- Cards com shadow/radius no hero; pill clusters; stat strips.
- Inter/Roboto/Arial como display; purple glow; cream editorial clichê.
- Dark mode “só inverter cores” sem recalibrar muted/accent.
- Sobrecarregar Fancy Components.

---

## 8. Como adaptar as referências sem copiar

| Pegar | Deixar |
|-------|--------|
| Sparsity + hierarquia (emil, jwahn) | Layout/copy exatos |
| Lista de writing + arte contrastante (sahil) | Pinturas e tom de voz dele |
| Bio toggle / notes grid (leerob) | Ilustração e @handle branding |
| Interactive computational art (daoho) | Tema “pond/koi” e copy |
| Dither neoclassical mood (sfcompute images) | Product UI, sidebar, pricing CLI |
| Motion craft vocabulary (fancy + emil essays) | Demo zoo de componentes |
| Lowercase casual nav (matt) | Script yellow + hero photo formula |

**Ideia própria de Pedro:** o “sujeito” é a pessoa + o craft (tipo mecânico + pastoral digital). Inventário curto para conteúdo: nome, cidade/contexto, stack/craft, 3–5 experiências, posts que ele realmente escreveria — a estética carrega isso, não o contrário.

---

## 9. Como isso serve intro + experience + blog

| Superfície | Tratamento |
|------------|------------|
| **Intro (home)** | Nome Mecanical Bold; uma frase; ASCII/dither como presença; links sociais + atalho para blog/GitHub. First viewport = brand + proof of taste. |
| **Experience** | Seção ou página: lista densa, datas em mono muted, cargos em Regular/Bold; sem cards; opcional ASCII faint de fundo. |
| **Blog** | Índice estilo sahil/leerob; post em Book/Regular, measure estreito, zero chrome; code blocks em mono sobre `--bg-elevated`; imagens de post podem herdar dither se fizer sentido editorial. |
| **GitHub-hosted code** | Links externos claros; embeds leves (gist/readme) sem tentar recriar UI do GitHub. |

---

## 10. Inventário de features (para yes/no com Pedro)

Ver também resumo no relatório do agente. Marcado **pedido** = já pedido por Pedro.

| Feature | Por que é comum | Status |
|---------|-----------------|--------|
| Intro + bio curta | Primeira impressão e posicionamento | **pedido** |
| Experience / CV list | Prova trajetória sem PDF | **pedido** |
| Blog / writing index | Pensamento público; SEO leve | **pedido** |
| Código no GitHub | Credibilidade de builder; source of truth | **pedido** |
| Página About longa | Contexto humano além do CV | perguntar |
| Projects grid/list | Mostra builds nomeados | perguntar |
| Now page | “O que estou fazendo agora” (status vivo) | perguntar |
| Newsletter / email capture | Retorno de leitores | perguntar |
| Dark/light toggle | Preferência; vários refs têm | perguntar (default dark) |
| Interactive ASCII/canvas | Diferenciação visual (daoho/sharks) | perguntar |
| Dither hero art | Assinatura Mechanical Pastoral | perguntar (recomendado) |
| Talks / decks | Se houver speaking | perguntar |
| Uses /setup page | Geek cred; matt tem | perguntar |
| Press kit / logo pack | Útil se aparecer em mídia | perguntar |
| Colophon / stack page | Transparência craft | perguntar |
| RSS | Higiene de blog | perguntar |
| i18n PT/EN | Audiência BR + global | perguntar |
| Password / draft posts | Blog antes de publicar | perguntar |

---

## 11. Artefatos de pesquisa

- Mood: `docs/project/media/references/sfcompute-{pastoral,capitol,garden}.png`
- Fontes: `docs/project/media/fonts/EFT_Mecanical/` (+ zip original)
- Screens: `docs/project/media/research/*-home.png`, specimen, about/essay samples
- Refs list: `docs/project/design-references.md`
