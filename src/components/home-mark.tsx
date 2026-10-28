import Link from "next/link";
import type { Locale } from "@/lib/i18n/config";

export function HomeMark({ locale }: { locale: Locale }) {
  return (
    <p className="home-mark">
      <Link href={`/${locale}`}>Pedro Haubert</Link>
    </p>
  );
}
