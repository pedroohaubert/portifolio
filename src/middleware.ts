import { NextResponse } from "next/server";
import type { NextRequest } from "next/server";
import { defaultLocale, isLocale } from "@/lib/i18n/config";

export function middleware(request: NextRequest) {
  const { pathname } = request.nextUrl;

  if (
    pathname.startsWith("/_next") ||
    pathname.startsWith("/api") ||
    pathname.startsWith("/fonts") ||
    pathname.startsWith("/images") ||
    pathname === "/feed.xml" ||
    pathname === "/favicon.ico" ||
    pathname.includes(".")
  ) {
    return NextResponse.next();
  }

  const retired = new Set(["experience", "about", "now", "projects"]);
  const segment = pathname.split("/")[1];
  const second = pathname.split("/")[2];

  if (isLocale(segment)) {
    if (second && retired.has(second)) {
      const url = request.nextUrl.clone();
      url.pathname = `/${segment}`;
      return NextResponse.redirect(url);
    }
    if (second === "uses") {
      const url = request.nextUrl.clone();
      url.pathname = `/${segment}/setup`;
      return NextResponse.redirect(url);
    }
    return NextResponse.next();
  }

  const cookieLocale = request.cookies.get("NEXT_LOCALE")?.value;
  const header = (request.headers.get("accept-language") ?? "").toLowerCase();
  const fromHeader = header.startsWith("pt")
    ? "pt"
    : header.startsWith("en")
      ? "en"
      : defaultLocale;
  const locale =
    cookieLocale && isLocale(cookieLocale) ? cookieLocale : fromHeader;

  const url = request.nextUrl.clone();
  if (retired.has(segment)) {
    url.pathname = `/${locale}`;
    return NextResponse.redirect(url);
  }
  if (segment === "uses") {
    url.pathname = `/${locale}/setup`;
    return NextResponse.redirect(url);
  }
  url.pathname = `/${locale}${pathname === "/" ? "" : pathname}`;
  return NextResponse.redirect(url);
}

export const config = {
  matcher: ["/((?!_next/static|_next/image).*)"],
};
