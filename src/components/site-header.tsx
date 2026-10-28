import Link from "next/link";
import type { Locale } from "@/lib/i18n/config";
import type { Dictionary } from "@/lib/i18n/dictionaries";

const GITHUB = "https://github.com/pedroohaubert/portifolio";

export function SiteHeader({
  locale,
  dict,
}: {
  locale: Locale;
  dict: Dictionary;
}) {
  const base = `/${locale}`;
  const items = [
    { href: base, label: dict.nav.home },
    { href: `${base}/experience`, label: dict.nav.experience },
    { href: `${base}/blog`, label: dict.nav.blog },
    { href: `${base}/projects`, label: dict.nav.projects },
    { href: `${base}/about`, label: dict.nav.about },
    { href: `${base}/now`, label: dict.nav.now },
    { href: `${base}/uses`, label: dict.nav.uses },
  ] as const;

  return (
    <header className="mb-12 flex flex-wrap items-baseline justify-between gap-x-6 gap-y-3">
      <Link
        href={base}
        className="font-[family-name:var(--font-display)] text-[1.05rem] font-bold tracking-[-0.02em] no-underline hover:text-[var(--fg)]"
      >
        Pedro Haubert
      </Link>
      <nav
        aria-label="Primary"
        className="flex flex-wrap gap-x-4 gap-y-2 text-[0.95rem] text-[var(--fg-muted)]"
      >
        {items.map((item) => (
          <Link key={item.href} href={item.href} className="no-underline hover:text-[var(--fg)]">
            {item.label}
          </Link>
        ))}
        <a
          href={GITHUB}
          className="no-underline hover:text-[var(--fg)]"
          rel="noopener noreferrer"
          target="_blank"
        >
          {dict.nav.github}
        </a>
      </nav>
    </header>
  );
}
