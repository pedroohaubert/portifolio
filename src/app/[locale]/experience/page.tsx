import type { Metadata } from "next";
import { getExperience } from "@/lib/experience";
import { resolveLocale } from "@/lib/i18n/params";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { dict } = await resolveLocale(params);
  return { title: dict.experience.title };
}

export default async function ExperiencePage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale, dict } = await resolveLocale(params);
  const roles = getExperience(locale);

  return (
    <div>
      <h1 className="mb-3 text-[clamp(1.8rem,4vw,2.4rem)] font-bold tracking-[-0.02em]">
        {dict.experience.title}
      </h1>
      <p className="measure mb-10 text-[var(--fg-muted)]">{dict.experience.intro}</p>
      <ul className="list-none p-0">
        {roles.map((role) => (
          <li key={`${role.org}-${role.title}`} className="border-t border-[var(--rule)] py-5">
            <div className="flex flex-wrap items-baseline justify-between gap-2">
              <h2 className="m-0 text-[1.15rem] font-bold">{role.title}</h2>
              <span className="mono text-[var(--fg-faint)]">
                {role.start} — {role.end}
              </span>
            </div>
            <p className="mt-1 mb-2 text-[var(--fg-muted)]">{role.org}</p>
            <p className="measure m-0 text-[0.98rem]">{role.summary}</p>
          </li>
        ))}
      </ul>
    </div>
  );
}
