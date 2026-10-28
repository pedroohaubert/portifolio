import type { Locale } from "@/lib/i18n/config";

export type Role = {
  org: string;
  title: string;
  start: string;
  end: string;
  summary: string;
};

const data: Record<Locale, Role[]> = {
  pt: [
    {
      org: "Independente",
      title: "Software engineer",
      start: "2024",
      end: "agora",
      summary:
        "Full-time em TypeScript, Python e Java. Constrói produtos web, integrações e fluxos com agentes de IA (Cursor, evals, automações). Empregador e datas exatas ficam para Pedro confirmar.",
    },
    {
      org: "Unisinos",
      title: "Ciência da Computação",
      start: "—",
      end: "cursando",
      summary:
        "Formação em andamento no Brasil. Pesquisa e builds acadêmicos cruzam com trabalho em IA educacional (ver projeto Sophia).",
    },
    {
      org: "Pesquisa / Sophia",
      title: "Assistente educacional com IA",
      start: "2024",
      end: "2025",
      summary:
        "Plataforma de pesquisa com a IA Sophia como assistente para docentes e discentes. Código em TypeScript no GitHub.",
    },
  ],
  en: [
    {
      org: "Independent",
      title: "Software engineer",
      start: "2024",
      end: "present",
      summary:
        "Full-time work in TypeScript, Python, and Java. Ships web products, integrations, and AI-agent workflows (Cursor, evals, automation). Employer and exact dates are for Pedro to confirm.",
    },
    {
      org: "Unisinos",
      title: "Computer Science",
      start: "—",
      end: "in progress",
      summary:
        "Degree in progress in Brazil. Academic research and builds overlap with educational AI work (see the Sophia project).",
    },
    {
      org: "Research / Sophia",
      title: "Educational AI assistant",
      start: "2024",
      end: "2025",
      summary:
        "Research platform where Sophia acts as an AI assistant for teachers and students. TypeScript on GitHub.",
    },
  ],
};

export function getExperience(locale: Locale) {
  return data[locale];
}
