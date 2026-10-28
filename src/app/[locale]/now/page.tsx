import { notFound } from "next/navigation";
import { isLocale, type Locale } from "@/lib/i18n/config";
import { getDictionary } from "@/lib/i18n/dictionaries";

export default async function NowPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const dict = getDictionary(locale);

  const items =
    locale === "pt"
      ? [
          "Construindo este portfólio (Mechanical Pastoral).",
          "Placeholder — o que está em foco esta semana.",
        ]
      : [
          "Building this portfolio (Mechanical Pastoral).",
          "Placeholder — what’s in focus this week.",
        ];

  return (
    <div>
      <h1 className="mb-3 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        {dict.now.title}
      </h1>
      <p className="measure mb-8 text-[var(--fg-muted)]">{dict.now.intro}</p>
      <ul className="measure list-disc pl-5 text-[var(--fg)]">
        {items.map((item) => (
          <li key={item} className="mb-2">
            {item}
          </li>
        ))}
      </ul>
    </div>
  );
}
