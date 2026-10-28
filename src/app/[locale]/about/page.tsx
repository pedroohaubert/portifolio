import type { Metadata } from "next";
import { getAbout } from "@/lib/about";
import { resolveLocale } from "@/lib/i18n/params";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { dict } = await resolveLocale(params);
  return { title: dict.about.title };
}

export default async function AboutPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale, dict } = await resolveLocale(params);
  const { paragraphs } = getAbout(locale);

  return (
    <div>
      <h1 className="mb-3 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        {dict.about.title}
      </h1>
      <p className="measure mb-8 text-[var(--fg-muted)]">{dict.about.intro}</p>
      {paragraphs.map((p) => (
        <p key={p.slice(0, 48)} className="measure mb-4">
          {p}
        </p>
      ))}
    </div>
  );
}
