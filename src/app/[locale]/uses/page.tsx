import { notFound } from "next/navigation";
import { isLocale, type Locale } from "@/lib/i18n/config";
import { getDictionary } from "@/lib/i18n/dictionaries";

export default async function UsesPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const dict = getDictionary(locale);

  const groups =
    locale === "pt"
      ? [
          { title: "Hardware", items: ["Mac", "Nintendo Switch Pro Controller"] },
          { title: "Software", items: ["Cursor", "Next.js", "pnpm"] },
        ]
      : [
          { title: "Hardware", items: ["Mac", "Nintendo Switch Pro Controller"] },
          { title: "Software", items: ["Cursor", "Next.js", "pnpm"] },
        ];

  return (
    <div>
      <h1 className="mb-3 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        {dict.uses.title}
      </h1>
      <p className="measure mb-10 text-[var(--fg-muted)]">{dict.uses.intro}</p>
      {groups.map((group) => (
        <section key={group.title} className="mb-8">
          <h2 className="mb-3 text-[1.1rem] font-bold">{group.title}</h2>
          <ul className="list-none border-t border-[var(--rule)] p-0">
            {group.items.map((item) => (
              <li key={item} className="border-b border-[var(--rule)] py-2 text-[var(--fg)]">
                {item}
              </li>
            ))}
          </ul>
        </section>
      ))}
    </div>
  );
}
