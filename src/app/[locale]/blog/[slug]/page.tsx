import { notFound } from "next/navigation";
import { MDXRemote } from "next-mdx-remote/rsc";
import { isLocale, locales, type Locale } from "@/lib/i18n/config";
import { getAllPosts, getPost } from "@/lib/posts";

export function generateStaticParams() {
  return locales.flatMap((locale) =>
    getAllPosts(locale, { includeDrafts: process.env.NODE_ENV !== "production" }).map(
      (post) => ({ locale, slug: post.slug }),
    ),
  );
}

export default async function BlogPostPage({
  params,
}: {
  params: Promise<{ locale: string; slug: string }>;
}) {
  const { locale: raw, slug } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const includeDrafts = process.env.NODE_ENV !== "production";
  const post = getPost(locale, slug, { includeDrafts });
  if (!post || (post.draft && !includeDrafts)) notFound();

  return (
    <article>
      <p className="mono mb-3 text-[var(--fg-faint)]">
        <time dateTime={post.date}>{post.date}</time>
        {" · "}
        {post.readingTime}
        {post.draft ? " · draft" : null}
      </p>
      <h1 className="mb-6 text-[clamp(1.8rem,4vw,2.5rem)] font-bold tracking-[-0.02em]">
        {post.title}
      </h1>
      <div className="measure prose-site [&_a]:text-[var(--accent)] [&_code]:rounded [&_code]:bg-[var(--bg-elevated)] [&_code]:px-1 [&_code]:font-mono [&_code]:text-[0.9em] [&_h2]:mt-8 [&_h2]:text-[1.25rem] [&_h2]:font-bold [&_p]:mb-4 [&_pre]:overflow-x-auto [&_pre]:rounded-none [&_pre]:bg-[var(--bg-elevated)] [&_pre]:p-4 [&_pre]:font-mono [&_pre]:text-[0.85rem]">
        <MDXRemote source={post.content} />
      </div>
    </article>
  );
}
