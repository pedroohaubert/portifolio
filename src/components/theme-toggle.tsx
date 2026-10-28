"use client";

import { useTheme } from "@/components/theme-provider";

export function ThemeToggle({ label }: { label: string }) {
  const { theme, toggle } = useTheme();
  return (
    <button
      type="button"
      onClick={toggle}
      className="mono cursor-pointer border-0 bg-transparent p-0 text-[var(--fg-muted)] hover:text-[var(--fg)]"
      aria-label={`${label}: ${theme}`}
    >
      {label}: {theme === "dark" ? "dark" : "light"}
    </button>
  );
}
