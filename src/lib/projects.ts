import type { Locale } from "@/lib/i18n/config";

export type Project = {
  name: string;
  href: string;
  blurb: string;
  year: string;
};

const data: Record<Locale, Project[]> = {
  pt: [
    {
      name: "portifolio",
      href: "https://github.com/pedroohaubert/portifolio",
      blurb: "Este site — Mechanical Pastoral em Next.js, PT/EN, dither e ASCII.",
      year: "2026",
    },
    {
      name: "skills",
      href: "https://github.com/pedroohaubert/skills",
      blurb: "Skills de agente que uso no dia a dia de desenvolvimento e craft pessoal.",
      year: "2026",
    },
    {
      name: "hallsversario",
      href: "https://github.com/pedroohaubert/hallsversario",
      blurb: "Convite de evento com estética retro Windows.",
      year: "2026",
    },
    {
      name: "sophia",
      href: "https://github.com/pedroohaubert/sophia",
      blurb: "Pesquisa: assistente de IA educacional para docentes e alunos.",
      year: "2025",
    },
    {
      name: "Apollo",
      href: "https://github.com/pedroohaubert/Apollo",
      blurb: "Player de música desktop com cara retro.",
      year: "2025",
    },
    {
      name: "tictactoe-unbeatable-bot",
      href: "https://github.com/pedroohaubert/tictactoe-unbeatable-bot",
      blurb: "Minimax imbatível — terminal ou servidor web.",
      year: "2025",
    },
  ],
  en: [
    {
      name: "portifolio",
      href: "https://github.com/pedroohaubert/portifolio",
      blurb: "This site — Mechanical Pastoral on Next.js, PT/EN, dither and ASCII.",
      year: "2026",
    },
    {
      name: "skills",
      href: "https://github.com/pedroohaubert/skills",
      blurb: "Agent skills I use day to day for software work and personal craft.",
      year: "2026",
    },
    {
      name: "hallsversario",
      href: "https://github.com/pedroohaubert/hallsversario",
      blurb: "Event invite site with a retro Windows look.",
      year: "2026",
    },
    {
      name: "sophia",
      href: "https://github.com/pedroohaubert/sophia",
      blurb: "Research: educational AI assistant for teachers and students.",
      year: "2025",
    },
    {
      name: "Apollo",
      href: "https://github.com/pedroohaubert/Apollo",
      blurb: "Desktop music player with a retro feel.",
      year: "2025",
    },
    {
      name: "tictactoe-unbeatable-bot",
      href: "https://github.com/pedroohaubert/tictactoe-unbeatable-bot",
      blurb: "Unbeatable minimax — terminal or web server.",
      year: "2025",
    },
  ],
};

export function getProjects(locale: Locale) {
  return data[locale];
}
