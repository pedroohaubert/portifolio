import type { Locale } from "./config";

const pt = {
  meta: {
    title: "Pedro Haubert",
    description:
      "Portfólio pessoal — craft, escrita e builds. Mechanical Pastoral.",
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
    headline: "Constrói interfaces com tipo, textura e intenção.",
    support:
      "Portfólio pessoal em Mechanical Pastoral — serif mecânico, dither e ASCII sutil.",
    ctaBlog: "ler o blog",
    ctaGithub: "código no github",
    ctaExperience: "experience",
  },
  experience: {
    title: "Experience",
    intro: "Linha do tempo compacta. Conteúdo placeholder — preencher com papéis reais.",
  },
  blog: {
    title: "Blog",
    intro: "Notas e ensaios. Rascunhos ficam fora do índice público.",
    empty: "Nenhum post publicado ainda.",
    draftBadge: "draft",
  },
  projects: {
    title: "Projects",
    intro: "Trabalhos nomeados. Links e descrições placeholder.",
  },
  about: {
    title: "About",
    intro: "Versão longa — além do intro da home. Substituir pelo texto de Pedro.",
  },
  now: {
    title: "Now",
    intro: "O que estou fazendo agora. Atualizar com regularidade.",
  },
  uses: {
    title: "Uses",
    intro: "Ferramentas e setup. Lista inicial para editar.",
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
      "Personal portfolio — craft, writing, and builds. Mechanical Pastoral.",
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
    headline: "Builds interfaces with type, texture, and intent.",
    support:
      "Personal portfolio in Mechanical Pastoral — mechanical serif, dither, and quiet ASCII.",
    ctaBlog: "read the blog",
    ctaGithub: "code on github",
    ctaExperience: "experience",
  },
  experience: {
    title: "Experience",
    intro: "Compact timeline. Placeholder copy — replace with real roles.",
  },
  blog: {
    title: "Blog",
    intro: "Notes and essays. Drafts stay out of the public index.",
    empty: "No published posts yet.",
    draftBadge: "draft",
  },
  projects: {
    title: "Projects",
    intro: "Named work. Placeholder links and descriptions.",
  },
  about: {
    title: "About",
    intro: "Long form — beyond the home intro. Replace with Pedro’s text.",
  },
  now: {
    title: "Now",
    intro: "What I’m doing now. Keep this fresh.",
  },
  uses: {
    title: "Uses",
    intro: "Tools and setup. Starter list to edit.",
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
