"use client";

import { useEffect, useRef } from "react";

const CHARS = "·:;+=xX%#@";

export function AsciiField() {
  const ref = useRef<HTMLCanvasElement>(null);

  useEffect(() => {
    const canvas = ref.current;
    if (!canvas) return;
    const ctx = canvas.getContext("2d");
    if (!ctx) return;

    let raf = 0;
    let pointer = { x: 0.5, y: 0.5 };
    const dpr = Math.min(window.devicePixelRatio || 1, 2);

    const resize = () => {
      const { width, height } = canvas.getBoundingClientRect();
      canvas.width = Math.floor(width * dpr);
      canvas.height = Math.floor(height * dpr);
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    };

    const onMove = (e: PointerEvent) => {
      const rect = canvas.getBoundingClientRect();
      pointer = {
        x: (e.clientX - rect.left) / rect.width,
        y: (e.clientY - rect.top) / rect.height,
      };
    };

    resize();
    window.addEventListener("resize", resize);
    canvas.addEventListener("pointermove", onMove);

    const cell = 10;
    const draw = (t: number) => {
      const { width, height } = canvas.getBoundingClientRect();
      ctx.clearRect(0, 0, width, height);
      const cols = Math.ceil(width / cell);
      const rows = Math.ceil(height / cell);
      ctx.font = `10px ui-monospace, SF Mono, Menlo, monospace`;
      ctx.textBaseline = "top";

      for (let y = 0; y < rows; y++) {
        for (let x = 0; x < cols; x++) {
          const nx = x / cols;
          const ny = y / rows;
          const dx = nx - pointer.x;
          const dy = ny - pointer.y;
          const dist = Math.sqrt(dx * dx + dy * dy);
          const wave =
            Math.sin(nx * 8 + t * 0.0012) * 0.5 +
            Math.cos(ny * 6 - t * 0.0009) * 0.5;
          const v = Math.max(0, 1 - dist * 2.2) * 0.55 + (wave + 1) * 0.12;
          if (v < 0.18) continue;
          const idx = Math.min(CHARS.length - 1, Math.floor(v * CHARS.length));
          const soft = getComputedStyle(document.documentElement)
            .getPropertyValue("--accent-soft")
            .trim();
          const faint = getComputedStyle(document.documentElement)
            .getPropertyValue("--fg-faint")
            .trim();
          ctx.fillStyle = v > 0.55 ? soft || "#3d6b4f" : faint || "#5c574f";
          ctx.globalAlpha = 0.35 + v * 0.45;
          ctx.fillText(CHARS[idx], x * cell, y * cell);
        }
      }
      ctx.globalAlpha = 1;
      raf = requestAnimationFrame(draw);
    };

    raf = requestAnimationFrame(draw);
    return () => {
      cancelAnimationFrame(raf);
      window.removeEventListener("resize", resize);
      canvas.removeEventListener("pointermove", onMove);
    };
  }, []);

  return (
    <canvas
      ref={ref}
      aria-hidden
      className="pointer-events-auto absolute inset-0 h-full w-full opacity-70"
    />
  );
}
