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
      blurb: "Este site — Mechanical Pastoral em Next.js.",
      year: "2026",
    },
    {
      name: "Projeto exemplo",
      href: "#",
      blurb: "Placeholder — nome, link e uma linha.",
      year: "—",
    },
  ],
  en: [
    {
      name: "portifolio",
      href: "https://github.com/pedroohaubert/portifolio",
      blurb: "This site — Mechanical Pastoral on Next.js.",
      year: "2026",
    },
    {
      name: "Sample project",
      href: "#",
      blurb: "Placeholder — name, link, and one line.",
      year: "—",
    },
  ],
};

export function getProjects(locale: Locale) {
  return data[locale];
}
