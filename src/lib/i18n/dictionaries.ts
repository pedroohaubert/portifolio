import type { Locale } from "./config";

const pt = {
  meta: {
    title: "Pedro Haubert",
    description:
      "Software engineer no Brasil. TypeScript, Python, Java e agentes de IA.",
  },
  home: {
    name: "Pedro Haubert",
    support:
      "Software engineer no Brasil. Estudo Ciência da Computação na Unisinos e construo com TypeScript, Python e Java, com agentes no ciclo de build.",
    photoAlt:
      "Balões de ar quente sobre um mosaico de campos verdes, vistos de cima.",
  },
  sections: {
    label: "Seções",
    writing: "escrita",
    projects: "projetos",
    studies: "estudos",
    beyond: "além do trabalho",
  },
  blog: {
    title: "Blog",
    intro: "Notas curtas sobre craft, agentes e builds. Rascunhos ficam fora do índice.",
    empty: "Nenhum post publicado ainda.",
    draftBadge: "draft",
  },
  setup: {
    title: "Setup",
    intro: "Ferramentas e o setup de código que eu uso de verdade.",
  },
  footer: {
    allPosts: "todos os posts",
    setup: "setup",
    github: "GitHub",
    linkedin: "LinkedIn",
    theme: "tema",
    language: "idioma",
    rss: "rss",
  },
};

type DeepString<T> = {
  [K in keyof T]: T[K] extends string ? string : DeepString<T[K]>;
};

const en: DeepString<typeof pt> = {
  meta: {
    title: "Pedro Haubert",
    description:
      "Software engineer in Brazil. TypeScript, Python, Java, and AI agents.",
  },
  home: {
    name: "Pedro Haubert",
    support:
      "Software engineer in Brazil. I study computer science at Unisinos and build with TypeScript, Python, and Java, with agents in the build loop.",
    photoAlt: "Hot air balloons over a patchwork of green fields, seen from above.",
  },
  sections: {
    label: "Sections",
    writing: "writing",
    projects: "projects",
    studies: "studies",
    beyond: "beyond work",
  },
  blog: {
    title: "Blog",
    intro: "Short notes on craft, agents, and builds. Drafts stay out of the index.",
    empty: "No published posts yet.",
    draftBadge: "draft",
  },
  setup: {
    title: "Setup",
    intro: "Tools and the coding setup I actually use.",
  },
  footer: {
    allPosts: "all posts",
    setup: "setup",
    github: "GitHub",
    linkedin: "LinkedIn",
    theme: "theme",
    language: "language",
    rss: "rss",
  },
};

export type Dictionary = typeof pt;

export const dictionaries: Record<Locale, Dictionary> = { pt, en };

export function getDictionary(locale: Locale): Dictionary {
  return dictionaries[locale];
}
