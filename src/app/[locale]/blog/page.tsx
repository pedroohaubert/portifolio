import type { Metadata } from "next";
import Link from "next/link";
import { HomeMark } from "@/components/home-mark";
import { resolveLocale } from "@/lib/i18n/params";
import { getAllPosts } from "@/lib/posts";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { dict } = await resolveLocale(params);
  return { title: dict.blog.title };
}

export default async function BlogIndexPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale, dict } = await resolveLocale(params);
  const posts = getAllPosts(locale);

  return (
    <div>
      <HomeMark locale={locale} />
      <h1 className="page-title">{dict.blog.title}</h1>
      <p className="column-support">{dict.blog.intro}</p>
      {posts.length === 0 ? (
        <p>{dict.blog.empty}</p>
      ) : (
        <ul className="column-list column-section">
          {posts.map((post) => (
            <li key={post.slug}>
              <Link href={`/${locale}/blog/${post.slug}`}>{post.title}</Link>
              <p>
                <time dateTime={post.date}>{post.date}</time>
                {post.description ? `. ${post.description}` : null}
              </p>
            </li>
          ))}
        </ul>
      )}
    </div>
  );
}
