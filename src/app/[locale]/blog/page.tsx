import Link from "next/link";
import { notFound } from "next/navigation";
import { isLocale, type Locale } from "@/lib/i18n/config";
import { getDictionary } from "@/lib/i18n/dictionaries";
import { getAllPosts } from "@/lib/posts";

export default async function BlogIndexPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const dict = getDictionary(locale);
  const posts = getAllPosts(locale);

  return (
    <div>
      <h1 className="mb-3 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        {dict.blog.title}
      </h1>
      <p className="measure mb-10 text-[var(--fg-muted)]">{dict.blog.intro}</p>
      {posts.length === 0 ? (
        <p className="text-[var(--fg-muted)]">{dict.blog.empty}</p>
      ) : (
        <ul className="list-none p-0">
          {posts.map((post) => (
            <li key={post.slug} className="border-t border-[var(--rule)] py-4">
              <div className="flex flex-wrap items-baseline justify-between gap-2">
                <Link
                  href={`/${locale}/blog/${post.slug}`}
                  className="text-[1.1rem] no-underline hover:text-[var(--accent)]"
                >
                  {post.title}
                </Link>
                <time className="mono text-[var(--fg-faint)]" dateTime={post.date}>
                  {post.date}
                </time>
              </div>
              {post.description ? (
                <p className="measure mt-1 mb-0 text-[0.95rem] text-[var(--fg-muted)]">
                  {post.description}
                </p>
              ) : null}
            </li>
          ))}
        </ul>
      )}
    </div>
  );
}
