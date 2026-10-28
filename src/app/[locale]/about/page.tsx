import { notFound } from "next/navigation";
import { isLocale, type Locale } from "@/lib/i18n/config";
import { getDictionary } from "@/lib/i18n/dictionaries";

export default async function AboutPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const dict = getDictionary(locale);

  const body =
    locale === "pt"
      ? [
          "Este é o about longo — espaço para biografia, valores e o que Pedro quer que o visitante entenda além do CV.",
          "Substitua este parágrafo por texto real. Tom: direto, tipográfico, sem marketing fluff.",
          "Cidade, formação, craft, e como você trabalha cabem aqui.",
        ]
      : [
          "This is the long about — room for biography, values, and what Pedro wants a visitor to understand beyond the CV.",
          "Replace this paragraph with real copy. Tone: direct, typographic, no marketing fluff.",
          "City, education, craft, and how you work belong here.",
        ];

  return (
    <div>
      <h1 className="mb-3 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        {dict.about.title}
      </h1>
      <p className="measure mb-8 text-[var(--fg-muted)]">{dict.about.intro}</p>
      {body.map((p) => (
        <p key={p} className="measure mb-4">
          {p}
        </p>
      ))}
    </div>
  );
}
