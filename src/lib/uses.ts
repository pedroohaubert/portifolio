import type { Locale } from "@/lib/i18n/config";

export type UsesGroup = {
  title: string;
  items: string[];
};

const data: Record<Locale, UsesGroup[]> = {
  pt: [
    {
      title: "Hardware",
      items: ["Mac", "Nintendo Switch Pro Controller"],
    },
    {
      title: "Software",
      items: ["Cursor", "Next.js", "pnpm", "TypeScript", "Python", "Java"],
    },
    {
      title: "Craft neste site",
      items: ["EfT Mecanical (OFL)", "Tailwind CSS v4", "MDX + gray-matter", "RSS"],
    },
  ],
  en: [
    {
      title: "Hardware",
      items: ["Mac", "Nintendo Switch Pro Controller"],
    },
    {
      title: "Software",
      items: ["Cursor", "Next.js", "pnpm", "TypeScript", "Python", "Java"],
    },
    {
      title: "Craft on this site",
      items: ["EfT Mecanical (OFL)", "Tailwind CSS v4", "MDX + gray-matter", "RSS"],
    },
  ],
};

export function getUses(locale: Locale) {
  return data[locale];
}
