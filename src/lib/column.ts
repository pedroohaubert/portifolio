import type { Locale } from "@/lib/i18n/config";
import { getAllPosts } from "@/lib/posts";
import { getProjects } from "@/lib/projects";

export const sectionIds = ["writing", "projects", "studies", "beyond"] as const;

export type SectionId = (typeof sectionIds)[number];

export type ColumnItem = {
  title: string;
  detail: string;
  href?: string;
};

const studies: Record<Locale, ColumnItem[]> = {
  pt: [
    {
      title: "Ciência da Computação, Unisinos",
      detail: "Curso em andamento no Brasil. A pesquisa cruza com IA educacional.",
    },
    {
      title: "IA educacional",
      detail:
        "Pesquisa com uma assistente para docentes e discentes, de 2024 a 2025. O código é o projeto Sophia.",
    },
  ],
  en: [
    {
      title: "Computer Science, Unisinos",
      detail: "Degree in progress in Brazil. The research overlaps educational AI.",
    },
    {
      title: "Educational AI",
      detail:
        "Research on an assistant for teachers and students, 2024 to 2025. The code is the Sophia project.",
    },
  ],
};

const beyond: Record<Locale, ColumnItem[]> = {
  pt: [
    {
      title: "Este site",
      detail: "Mechanical Pastoral. Uma coluna, o campo no topo, o tipo EfT Mecanical.",
    },
    {
      title: "Agentes no dia a dia",
      detail: "Skills e fluxos no Cursor, dentro do trabalho de engenharia.",
    },
    {
      title: "Fora da tela",
      detail: "Um Mac e um Nintendo Switch Pro Controller.",
    },
  ],
  en: [
    {
      title: "This site",
      detail: "Mechanical Pastoral. One column, the field at the top, EfT Mecanical.",
    },
    {
      title: "Agents day to day",
      detail: "Cursor skills and workflows inside the engineering work.",
    },
    {
      title: "Off the screen",
      detail: "A Mac and a Nintendo Switch Pro Controller.",
    },
  ],
};

export function getColumnItems(locale: Locale): Record<SectionId, ColumnItem[]> {
  const posts = getAllPosts(locale).slice(0, 4);

  return {
    writing: posts.map((post) => ({
      title: post.title,
      detail: post.description,
      href: `/${locale}/blog/${post.slug}`,
    })),
    projects: getProjects(locale).map((project) => ({
      title: project.name,
      detail: project.blurb,
      href: project.href,
    })),
    studies: studies[locale],
    beyond: beyond[locale],
  };
}
