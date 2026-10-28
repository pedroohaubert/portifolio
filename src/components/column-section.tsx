import Link from "next/link";
import type { ColumnItem, SectionId } from "@/lib/column";

export function ColumnSection({
  id,
  label,
  items,
  more,
}: {
  id: SectionId;
  label: string;
  items: ColumnItem[];
  more?: { href: string; label: string };
}) {
  return (
    <section id={id} className="column-section">
      <h2>{label}</h2>
      <ul className="column-list">
        {items.map((item) => {
          const external = item.href?.startsWith("http");
          return (
            <li key={`${item.title}-${item.detail}`}>
              {item.href ? (
                external ? (
                  <a href={item.href} rel="noopener noreferrer" target="_blank">
                    {item.title}
                  </a>
                ) : (
                  <Link href={item.href}>{item.title}</Link>
                )
              ) : (
                <span className="column-title">{item.title}</span>
              )}
              {item.detail ? <p>{item.detail}</p> : null}
            </li>
          );
        })}
      </ul>
      {more ? (
        <p className="column-more">
          <Link href={more.href}>{more.label}</Link>
        </p>
      ) : null}
    </section>
  );
}
