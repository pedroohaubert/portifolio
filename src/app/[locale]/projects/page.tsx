import { notFound } from "next/navigation";
import { isLocale, type Locale } from "@/lib/i18n/config";
import { getDictionary } from "@/lib/i18n/dictionaries";
import { getProjects } from "@/lib/projects";

export default async function ProjectsPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const dict = getDictionary(locale);
  const projects = getProjects(locale);

  return (
    <div>
      <h1 className="mb-3 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        {dict.projects.title}
      </h1>
      <p className="measure mb-10 text-[var(--fg-muted)]">{dict.projects.intro}</p>
      <ul className="list-none p-0">
        {projects.map((project) => (
          <li key={project.name} className="border-t border-[var(--rule)] py-4">
            <div className="flex flex-wrap items-baseline justify-between gap-2">
              <a
                href={project.href}
                className="text-[1.1rem] no-underline hover:text-[var(--accent)]"
                rel={project.href.startsWith("http") ? "noopener noreferrer" : undefined}
                target={project.href.startsWith("http") ? "_blank" : undefined}
              >
                {project.name}
              </a>
              <span className="mono text-[var(--fg-faint)]">{project.year}</span>
            </div>
            <p className="measure mt-1 mb-0 text-[0.95rem] text-[var(--fg-muted)]">
              {project.blurb}
            </p>
          </li>
        ))}
      </ul>
    </div>
  );
}
