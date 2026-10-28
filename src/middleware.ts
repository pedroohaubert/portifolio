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

  const segment = pathname.split("/")[1];
  if (isLocale(segment)) {
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
  url.pathname = `/${locale}${pathname === "/" ? "" : pathname}`;
  return NextResponse.redirect(url);
}

export const config = {
  matcher: ["/((?!_next/static|_next/image).*)"],
};
