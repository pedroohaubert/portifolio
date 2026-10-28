"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";

type Item = { href: string; label: string };

export function NavLinks({ items }: { items: Item[] }) {
  const pathname = usePathname() || "";

  return (
    <>
      {items.map((item) => {
        const depth = item.href.split("/").filter(Boolean).length;
        const isHome = depth === 1;
        const isActive = isHome
          ? pathname === item.href
          : pathname === item.href || pathname.startsWith(`${item.href}/`);

        return (
          <Link
            key={item.href}
            href={item.href}
            aria-current={isActive ? "page" : undefined}
            className={
              isActive
                ? "text-[var(--fg)] no-underline"
                : "text-[var(--fg-muted)] no-underline hover:text-[var(--fg)]"
            }
          >
            {item.label}
          </Link>
        );
      })}
    </>
  );
}
