import type { Locale } from "./config";

const pt = {
  meta: {
    title: "Pedro Haubert",
    description:
      "Software engineer no Brasil — TypeScript, Python, Java, agentes de IA. Portfólio Mechanical Pastoral.",
  },
  nav: {
    home: "home",
    experience: "experience",
    blog: "blog",
    projects: "projects",
    about: "about",
    now: "now",
    uses: "uses",
    github: "github",
  },
  home: {
    name: "Pedro Haubert",
    headline: "Software engineer. Constrói com tipo, textura e agentes.",
    support:
      "Brasil · Unisinos CS · TypeScript, Python, Java. Este site é Mechanical Pastoral.",
    ctaBlog: "ler o blog",
    ctaGithub: "código no github",
    ctaExperience: "experience",
  },
  experience: {
    title: "Experience",
    intro: "Linha do tempo compacta. Datas e empregador ainda abertos a correção.",
  },
  blog: {
    title: "Blog",
    intro: "Notas curtas sobre craft, agentes e builds. Rascunhos ficam fora do índice.",
    empty: "Nenhum post publicado ainda.",
    draftBadge: "draft",
  },
  projects: {
    title: "Projects",
    intro: "Builds públicos no GitHub — pesquisa, craft e experimentos.",
  },
  about: {
    title: "About",
    intro: "Versão longa — além da frase da home.",
  },
  now: {
    title: "Now",
    intro: "O que está em foco agora. Atualizo quando a semana muda.",
  },
  uses: {
    title: "Uses",
    intro: "Ferramentas e setup que uso de verdade.",
  },
  footer: {
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
      "Software engineer in Brazil — TypeScript, Python, Java, AI agents. Mechanical Pastoral portfolio.",
  },
  nav: {
    home: "home",
    experience: "experience",
    blog: "blog",
    projects: "projects",
    about: "about",
    now: "now",
    uses: "uses",
    github: "github",
  },
  home: {
    name: "Pedro Haubert",
    headline: "Software engineer. Builds with type, texture, and agents.",
    support:
      "Brazil · Unisinos CS · TypeScript, Python, Java. This site is Mechanical Pastoral.",
    ctaBlog: "read the blog",
    ctaGithub: "code on github",
    ctaExperience: "experience",
  },
  experience: {
    title: "Experience",
    intro: "Compact timeline. Dates and employer still open to correction.",
  },
  blog: {
    title: "Blog",
    intro: "Short notes on craft, agents, and builds. Drafts stay out of the index.",
    empty: "No published posts yet.",
    draftBadge: "draft",
  },
  projects: {
    title: "Projects",
    intro: "Public builds on GitHub — research, craft, and experiments.",
  },
  about: {
    title: "About",
    intro: "Long form — beyond the home line.",
  },
  now: {
    title: "Now",
    intro: "What is in focus now. I update when the week changes.",
  },
  uses: {
    title: "Uses",
    intro: "Tools and setup I actually use.",
  },
  footer: {
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
