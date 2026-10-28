import type { Locale } from "@/lib/i18n/config";

export type AboutContent = {
  paragraphs: string[];
};

const data: Record<Locale, AboutContent> = {
  pt: {
    paragraphs: [
      "Sou Pedro Haubert, software engineer no Brasil. Trabalho full-time com TypeScript, Python e Java — produtos web, integrações e, cada vez mais, agentes de IA no loop de build.",
      "Estudo Ciência da Computação na Unisinos. Em pesquisa, ajudei a construir a Sophia, uma assistente educacional para docentes e discentes. Em público, mantenho experimentos no GitHub: skills de agente, convites com estética retro, players, bots e Advent of Code.",
      "Este site é Mechanical Pastoral: serif mecânico (EfT Mecanical), uma superfície dithered e ASCII quieto. Quero que a página diga quem eu sou sem parecer landing de produto.",
      "Detalhes de emprego, datas exatas de curso e links sociais ainda podem mudar — prefiro texto curto e honesto a inventar CV corporativo. Se algo estiver impreciso, o repo é o lugar certo para corrigir.",
    ],
  },
  en: {
    paragraphs: [
      "I'm Pedro Haubert, a software engineer in Brazil. Full-time work in TypeScript, Python, and Java — web products, integrations, and increasingly AI agents in the build loop.",
      "I study Computer Science at Unisinos. In research I helped build Sophia, an educational AI assistant for teachers and students. In public I keep experiments on GitHub: agent skills, retro event invites, players, bots, and Advent of Code.",
      "This site is Mechanical Pastoral: mechanical serif (EfT Mecanical), one dithered surface, and quiet ASCII. I want the page to say who I am without looking like a product landing.",
      "Employer detail, exact degree dates, and social links may still change — short honest copy beats invented corporate CV. If something is off, the repo is the right place to fix it.",
    ],
  },
};

export function getAbout(locale: Locale) {
  return data[locale];
}
