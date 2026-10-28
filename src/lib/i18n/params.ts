import { notFound } from "next/navigation";
import { isLocale, type Locale } from "@/lib/i18n/config";
import { getDictionary, type Dictionary } from "@/lib/i18n/dictionaries";

export async function resolveLocale(
  params: Promise<{ locale: string }>,
): Promise<{ locale: Locale; dict: Dictionary }> {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  return { locale: raw, dict: getDictionary(raw) };
}
