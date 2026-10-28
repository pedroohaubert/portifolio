import Link from "next/link";
import { defaultLocale } from "@/lib/i18n/config";

export default function LocaleNotFound() {
  return (
    <div>
      <p className="mono mb-3 text-[var(--fg-faint)]">404</p>
      <h1 className="mb-4 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        Not found
      </h1>
      <p className="measure mb-8 text-[var(--fg-muted)]">
        This page does not exist — or the draft is unpublished.
      </p>
      <Link href={`/${defaultLocale}`} className="text-[var(--accent)] no-underline">
        ← home
      </Link>
    </div>
  );
}
