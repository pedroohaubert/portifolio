import { getAllPosts } from "@/lib/posts";
import { locales } from "@/lib/i18n/config";

const SITE = "https://pedrohaubert.fly.dev"; // placeholder until custom domain

export async function GET() {
  const posts = locales.flatMap((locale) =>
    getAllPosts(locale).map((post) => ({ ...post, locale })),
  );

  const items = posts
    .sort((a, b) => (a.date < b.date ? 1 : -1))
    .map(
      (post) => `
    <item>
      <title><![CDATA[${post.title}]]></title>
      <link>${SITE}/${post.locale}/blog/${post.slug}</link>
      <guid>${SITE}/${post.locale}/blog/${post.slug}</guid>
      <pubDate>${new Date(post.date).toUTCString()}</pubDate>
      <description><![CDATA[${post.description}]]></description>
    </item>`,
    )
    .join("");

  const xml = `<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
  <channel>
    <title>Pedro Haubert</title>
    <link>${SITE}</link>
    <description>Writing from Pedro Haubert</description>
    ${items}
  </channel>
</rss>`;

  return new Response(xml, {
    headers: {
      "Content-Type": "application/rss+xml; charset=utf-8",
      "Cache-Control": "s-maxage=3600, stale-while-revalidate",
    },
  });
}
