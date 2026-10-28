import { notFound } from "next/navigation";
import { MDXRemote } from "next-mdx-remote/rsc";
import { HomeMark } from "@/components/home-mark";
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
      <HomeMark locale={locale} />
      <p className="post-meta">
        <time dateTime={post.date}>{post.date}</time>
        {". "}
        {post.readingTime}
        {post.draft ? ". draft" : null}
      </p>
      <h1 className="page-title">{post.title}</h1>
      <div className="post-body">
        <MDXRemote source={post.content} />
      </div>
    </article>
  );
}
