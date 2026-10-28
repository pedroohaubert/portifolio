import type { Metadata } from "next";
import { resolveLocale } from "@/lib/i18n/params";
import { getNow } from "@/lib/now";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { dict } = await resolveLocale(params);
  return { title: dict.now.title };
}

export default async function NowPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale, dict } = await resolveLocale(params);
  const now = getNow(locale);

  return (
    <div>
      <h1 className="mb-3 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        {dict.now.title}
      </h1>
      <p className="measure mb-2 text-[var(--fg-muted)]">{dict.now.intro}</p>
      <p className="mono mb-8 text-[var(--fg-faint)]">{now.updated}</p>
      <ul className="measure list-disc pl-5 text-[var(--fg)]">
        {now.items.map((item) => (
          <li key={item} className="mb-2">
            {item}
          </li>
        ))}
      </ul>
    </div>
  );
}
