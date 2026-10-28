import Link from "next/link";
import { defaultLocale } from "@/lib/i18n/config";

export default function LocaleNotFound() {
  return (
    <div>
      <h1 className="page-title">Not found</h1>
      <p className="column-support">
        This page does not exist, or the draft is unpublished.
      </p>
      <p className="column-more">
        <Link href={`/${defaultLocale}`}>Pedro Haubert</Link>
      </p>
    </div>
  );
}
