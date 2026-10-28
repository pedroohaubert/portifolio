import fs from "node:fs";
import path from "node:path";
import matter from "gray-matter";
import readingTime from "reading-time";
import type { Locale } from "@/lib/i18n/config";

const contentDir = path.join(process.cwd(), "content/blog");

export type PostMeta = {
  slug: string;
  title: string;
  date: string;
  description: string;
  locale: Locale;
  draft: boolean;
  readingTime: string;
};

export type Post = PostMeta & {
  content: string;
};

function parseFile(filename: string): Post | null {
  const full = path.join(contentDir, filename);
  const raw = fs.readFileSync(full, "utf8");
  const { data, content } = matter(raw);
  const locale = (data.locale as Locale) || "en";
  const slug = (data.slug as string) || filename.replace(/\.(md|mdx)$/, "");

  return {
    slug,
    title: String(data.title ?? slug),
    date: String(data.date ?? ""),
    description: String(data.description ?? ""),
    locale,
    draft: Boolean(data.draft),
    readingTime: readingTime(content).text,
    content,
  };
}

export function getAllPosts(locale: Locale, opts?: { includeDrafts?: boolean }) {
  if (!fs.existsSync(contentDir)) return [];
  const files = fs.readdirSync(contentDir).filter((f) => /\.(md|mdx)$/.test(f));
  return files
    .map(parseFile)
    .filter((p): p is Post => Boolean(p))
    .filter((p) => p.locale === locale)
    .filter((p) => (opts?.includeDrafts ? true : !p.draft))
    .sort((a, b) => (a.date < b.date ? 1 : -1));
}

export function getPost(locale: Locale, slug: string, opts?: { includeDrafts?: boolean }) {
  return (
    getAllPosts(locale, { includeDrafts: true }).find((p) => {
      if (p.slug !== slug) return false;
      if (p.draft && !opts?.includeDrafts && process.env.NODE_ENV === "production") {
        return false;
      }
      return true;
    }) ?? null
  );
}
