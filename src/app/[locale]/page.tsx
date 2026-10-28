import Link from "next/link";
import { notFound } from "next/navigation";
import { DitherHero } from "@/components/dither-hero";
import { ScrambleIn } from "@/components/scramble-in";
import { isLocale, type Locale } from "@/lib/i18n/config";
import { getDictionary } from "@/lib/i18n/dictionaries";

export default async function HomePage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const dict = getDictionary(locale);
  const base = `/${locale}`;

  return (
    <div>
      <DitherHero />
      <h1 className="mb-4 text-[clamp(2.4rem,7vw,3.75rem)] font-bold leading-[1.05] tracking-[-0.03em]">
        <ScrambleIn text={dict.home.name} />
      </h1>
      <p className="measure mb-3 text-[1.2rem] leading-snug text-[var(--fg)]">
        {dict.home.headline}
      </p>
      <p className="measure mb-8 text-[var(--fg-muted)]">{dict.home.support}</p>
      <div className="flex flex-wrap gap-x-5 gap-y-2 text-[var(--fg-muted)]">
        <Link href={`${base}/blog`} className="no-underline hover:text-[var(--accent)]">
          {dict.home.ctaBlog}
        </Link>
        <a
          href="https://github.com/pedroohaubert/portifolio"
          className="no-underline hover:text-[var(--accent)]"
          rel="noopener noreferrer"
          target="_blank"
        >
          {dict.home.ctaGithub}
        </a>
        <Link
          href={`${base}/experience`}
          className="no-underline hover:text-[var(--accent)]"
        >
          {dict.home.ctaExperience}
        </Link>
      </div>
    </div>
  );
}
