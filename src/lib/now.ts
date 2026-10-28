import type { Locale } from "@/lib/i18n/config";

export type NowContent = {
  updated: string;
  items: string[];
};

const data: Record<Locale, NowContent> = {
  pt: {
    updated: "2026-10-28",
    items: [
      "Finalizando este portfólio Mechanical Pastoral para deploy.",
      "Afinando skills de agente e fluxos no Cursor no dia a dia de engenharia.",
      "Ciência da Computação na Unisinos — curso em andamento.",
      "Escrevendo a primeira nota pública do blog (PT e EN).",
    ],
  },
  en: {
    updated: "2026-10-28",
    items: [
      "Finishing this Mechanical Pastoral portfolio for deploy.",
      "Tuning agent skills and Cursor workflows in day-to-day engineering.",
      "Computer Science at Unisinos — degree in progress.",
      "Writing the first public blog note (PT and EN).",
    ],
  },
};

export function getNow(locale: Locale) {
  return data[locale];
}
