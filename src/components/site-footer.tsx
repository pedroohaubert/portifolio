import Link from "next/link";
import { LocaleSwitch } from "@/components/locale-switch";
import { ThemeToggle } from "@/components/theme-toggle";
import type { Locale } from "@/lib/i18n/config";
import type { Dictionary } from "@/lib/i18n/dictionaries";
import { profiles } from "@/lib/profiles";

export function SiteFooter({
  locale,
  dict,
}: {
  locale: Locale;
  dict: Dictionary;
}) {
  return (
    <footer className="site-footer">
      <nav aria-label="Footer" className="site-footer-links">
        <Link href={`/${locale}/blog`}>{dict.footer.allPosts}</Link>
        <Link href={`/${locale}/setup`}>{dict.footer.setup}</Link>
        <a href={profiles.github} rel="noopener noreferrer" target="_blank">
          {dict.footer.github}
        </a>
        <a href={profiles.linkedin} rel="noopener noreferrer" target="_blank">
          {dict.footer.linkedin}
        </a>
      </nav>
      <div className="site-footer-meta">
        <ThemeToggle label={dict.footer.theme} />
        <LocaleSwitch locale={locale} label={dict.footer.language} />
        <Link href="/feed.xml">{dict.footer.rss}</Link>
      </div>
    </footer>
  );
}
