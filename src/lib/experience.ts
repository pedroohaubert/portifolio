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
      org: "Placeholder Co.",
      title: "Software engineer",
      start: "2024",
      end: "agora",
      summary: "Substituir por cargo real, stack e impacto.",
    },
    {
      org: "Unisinos",
      title: "Ciência da Computação",
      start: "—",
      end: "—",
      summary: "Formação — ajustar datas e detalhes.",
    },
  ],
  en: [
    {
      org: "Placeholder Co.",
      title: "Software engineer",
      start: "2024",
      end: "present",
      summary: "Replace with real role, stack, and impact.",
    },
    {
      org: "Unisinos",
      title: "Computer Science",
      start: "—",
      end: "—",
      summary: "Education — fill in dates and details.",
    },
  ],
};

export function getExperience(locale: Locale) {
  return data[locale];
}
