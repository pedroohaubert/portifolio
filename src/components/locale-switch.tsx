"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import type { Locale } from "@/lib/i18n/config";

export function LocaleSwitch({
  locale,
  label,
}: {
  locale: Locale;
  label: string;
}) {
  const pathname = usePathname() || "/";
  const rest = pathname.replace(/^\/(pt|en)/, "") || "";
  const other: Locale = locale === "pt" ? "en" : "pt";

  return (
    <span className="mono text-[var(--fg-muted)]">
      {label}:{" "}
      <Link
        href={`/${other}${rest}`}
        className="text-[var(--fg)] no-underline hover:text-[var(--accent)]"
        hrefLang={other}
        onClick={() => {
          document.cookie = `NEXT_LOCALE=${other};path=/;max-age=31536000`;
        }}
      >
        {other}
      </Link>
    </span>
  );
}
