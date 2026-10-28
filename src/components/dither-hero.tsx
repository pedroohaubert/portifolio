import Image from "next/image";
import { AsciiField } from "@/components/ascii-field";

export function DitherHero() {
  return (
    <div className="dither-hero relative mb-10 h-[min(48vh,26rem)] overflow-hidden">
      <Image
        src="/images/mood/sfcompute-pastoral.png"
        alt=""
        fill
        priority
        sizes="100vw"
        className="object-cover object-[50%_40%] opacity-90"
      />
      <div
        aria-hidden
        className="pointer-events-none absolute inset-0"
        style={{
          background:
            "linear-gradient(to top, var(--bg) 0%, transparent 48%), linear-gradient(to right, var(--bg) 0%, transparent 32%)",
        }}
      />
      <div
        aria-hidden
        className="pointer-events-none absolute inset-x-0 bottom-0 h-8 opacity-40"
        style={{
          backgroundImage:
            "repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.35) 2px, rgba(0,0,0,0.35) 3px)",
        }}
      />
      <AsciiField />
    </div>
  );
}
