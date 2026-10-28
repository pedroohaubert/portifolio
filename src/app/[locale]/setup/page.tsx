import type { Metadata } from "next";
import { HomeMark } from "@/components/home-mark";
import { resolveLocale } from "@/lib/i18n/params";
import { getUses } from "@/lib/uses";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { dict } = await resolveLocale(params);
  return { title: dict.setup.title };
}

export default async function SetupPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale, dict } = await resolveLocale(params);
  const groups = getUses(locale);

  return (
    <div>
      <HomeMark locale={locale} />
      <h1 className="page-title">{dict.setup.title}</h1>
      <p className="column-support">{dict.setup.intro}</p>
      {groups.map((group) => (
        <section key={group.title} className="column-section">
          <h2>{group.title}</h2>
          <ul className="column-list">
            {group.items.map((item) => (
              <li key={item}>
                <span className="column-title">{item}</span>
              </li>
            ))}
          </ul>
        </section>
      ))}
    </div>
  );
}
