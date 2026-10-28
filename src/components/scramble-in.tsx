"use client";

import { useEffect, useState } from "react";

const GLYPHS = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789·—";

export function ScrambleIn({
  text,
  className,
}: {
  text: string;
  className?: string;
}) {
  const [display, setDisplay] = useState(text);
  const [done, setDone] = useState(false);

  useEffect(() => {
    let frame = 0;
    const total = Math.max(18, text.length + 8);
    const id = window.setInterval(() => {
      frame += 1;
      const progress = Math.min(1, frame / total);
      const reveal = Math.floor(progress * text.length);
      const next = text
        .split("")
        .map((ch, i) => {
          if (ch === " ") return " ";
          if (i < reveal) return text[i];
          return GLYPHS[Math.floor(Math.random() * GLYPHS.length)];
        })
        .join("");
      setDisplay(next);
      if (frame >= total) {
        setDisplay(text);
        setDone(true);
        window.clearInterval(id);
      }
    }, 28);
    return () => window.clearInterval(id);
  }, [text]);

  return (
    <span className={className} aria-label={text} data-ready={done || undefined}>
      {display}
    </span>
  );
}
