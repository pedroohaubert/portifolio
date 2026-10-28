import Image from "next/image";
import { AsciiField } from "@/components/ascii-field";

export function DitherHero() {
  return (
    <div className="relative -mx-[1.25rem] mb-10 h-[min(52vh,28rem)] overflow-hidden md:-mx-8">
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
        className="absolute inset-0"
        style={{
          background:
            "linear-gradient(to top, var(--bg) 0%, transparent 42%), linear-gradient(to right, var(--bg) 0%, transparent 28%)",
        }}
      />
      <AsciiField />
    </div>
  );
}
