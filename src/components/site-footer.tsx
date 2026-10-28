import Link from "next/link";
import type { Locale } from "@/lib/i18n/config";
import type { Dictionary } from "@/lib/i18n/dictionaries";
import { ThemeToggle } from "@/components/theme-toggle";
import { LocaleSwitch } from "@/components/locale-switch";

export function SiteFooter({
  locale,
  dict,
}: {
  locale: Locale;
  dict: Dictionary;
}) {
  return (
    <footer className="mt-20 flex flex-wrap items-center gap-x-5 gap-y-2 border-t border-[var(--rule)] pt-6 text-[var(--fg-muted)]">
      <ThemeToggle label={dict.footer.theme} />
      <LocaleSwitch locale={locale} label={dict.footer.language} />
      <Link href="/feed.xml" className="mono no-underline hover:text-[var(--fg)]">
        {dict.footer.rss}
      </Link>
    </footer>
  );
}
