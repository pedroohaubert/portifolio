import Link from "next/link";
import { NavLinks } from "@/components/nav-links";
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
  ];

  return (
    <header className="mb-12 flex flex-wrap items-baseline justify-between gap-x-6 gap-y-3">
      <Link
        href={base}
        className="text-[1.05rem] font-bold tracking-[-0.02em] text-[var(--fg)] no-underline hover:text-[var(--fg)]"
      >
        Pedro Haubert
      </Link>
      <nav
        aria-label="Primary"
        className="flex flex-wrap gap-x-4 gap-y-2 text-[0.95rem]"
      >
        <NavLinks items={items} />
        <a
          href={GITHUB}
          className="text-[var(--fg-muted)] no-underline hover:text-[var(--fg)]"
          rel="noopener noreferrer"
          target="_blank"
        >
          {dict.nav.github}
        </a>
      </nav>
    </header>
  );
}
