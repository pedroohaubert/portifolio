import Image from "next/image";
import { ColumnSection } from "@/components/column-section";
import { getColumnItems, sectionIds } from "@/lib/column";
import { resolveLocale } from "@/lib/i18n/params";

export default async function HomePage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale, dict } = await resolveLocale(params);
  const items = getColumnItems(locale);

  const sections = sectionIds.map((id) => ({
    id,
    label: dict.sections[id],
    items:
      id === "writing" && items.writing.length === 0
        ? [{ title: dict.blog.empty, detail: "" }]
        : items[id],
    more:
      id === "writing"
        ? { href: `/${locale}/blog`, label: dict.footer.allPosts }
        : undefined,
  }));

  return (
    <div>
      <Image
        src="/images/mood/balloon-grassfield.png"
        alt={dict.home.photoAlt}
        width={1677}
        height={938}
        priority
        sizes="(min-width: 900px) 608px, 100vw"
        className="column-photo"
      />
      <h1 className="column-name">{dict.home.name}</h1>
      <p className="column-support">{dict.home.support}</p>
      <nav className="section-nav" aria-label={dict.sections.label}>
        {sections.map((section) => (
          <a key={section.id} href={`#${section.id}`}>
            {section.label}
          </a>
        ))}
      </nav>
      {sections.map((section) => (
        <ColumnSection key={section.id} {...section} />
      ))}
    </div>
  );
}
