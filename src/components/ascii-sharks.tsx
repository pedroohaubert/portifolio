"use client";

import { useEffect, useRef } from "react";

const DARK = ["#8fb4ff", "#9dcaa8", "#e7c2a0"];
const LIGHT = ["#1e4bff", "#2d6a45", "#a85a32"];
const GLYPHS = "#%@#+";

function inShark(x: number, y: number) {
  const cy = 0.52;
  if (x < 0.16) {
    const t = x / 0.16;
    const gap = 0.035 + (1 - t) * 0.14;
    const outer = 0.07 + (1 - t) * 0.2;
    const dy = Math.abs(y - cy);
    return dy >= gap && dy <= outer;
  }

  let half = 0;
  if (x < 0.26) half = 0.045 + ((x - 0.16) / 0.1) * 0.03;
  else if (x < 0.8) {
    const t = (x - 0.26) / 0.54;
    half = 0.075 + Math.sin(t * Math.PI) * 0.07;
  } else if (x < 0.97) {
    const t = (x - 0.8) / 0.17;
    half = 0.075 * (1 - t);
  } else {
    return false;
  }

  const eyeX = (x - 0.84) / 0.018;
  const eyeY = (y - (cy - 0.02)) / 0.028;
  if (eyeX * eyeX + eyeY * eyeY <= 1) return false;
  if (Math.abs(y - cy) <= half) return true;

  if (x > 0.38 && x < 0.58) {
    const along = 1 - Math.abs(x - 0.48) / 0.1;
    const finTop = cy - half - Math.max(0, along) * 0.16;
    if (along > 0 && y < cy - half + 0.01 && y >= finTop) return true;
  }
  if (x > 0.52 && x < 0.7) {
    const finBot = cy + half + (0.7 - x) * 0.85;
    if (y > cy + half - 0.01 && y <= finBot) return true;
  }
  return false;
}

function buildShark(cols: number, rows: number) {
  const lines: string[] = [];
  for (let row = 0; row < rows; row += 1) {
    let line = "";
    for (let col = 0; col < cols; col += 1) {
      const on = inShark((col + 0.5) / cols, (row + 0.5) / rows);
      line += on ? GLYPHS[(col * 3 + row * 5) % GLYPHS.length] : " ";
    }
    lines.push(line.replace(/\s+$/, ""));
  }
  const first = lines.findIndex((line) => line.trim().length > 0);
  let last = lines.length - 1;
  while (last > first && lines[last].trim().length === 0) last -= 1;
  return lines.slice(first, last + 1);
}

const SHARK = buildShark(72, 22);

type Swimmer = {
  x: number;
  yRatio: number;
  speed: number;
  fontSize: number;
  colorIndex: number;
};

export function AsciiSharks() {
  const ref = useRef<HTMLCanvasElement>(null);

  useEffect(() => {
    const canvas = ref.current;
    if (!canvas) return;
    const ctx = canvas.getContext("2d");
    if (!ctx) return;

    const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    const swimmers: Swimmer[] = [
      { x: 0, yRatio: 0.08, speed: 18, fontSize: 10, colorIndex: 0 },
      { x: 0, yRatio: 0.42, speed: -24, fontSize: 9, colorIndex: 1 },
      { x: 0, yRatio: 0.7, speed: 14, fontSize: 11, colorIndex: 2 },
    ];

    let colors = DARK;
    let width = 0;
    let height = 0;
    let raf = 0;
    let running = false;
    let last = performance.now();
    let placed = false;
    const widths = new Map<number, number>();

    const readTheme = () => {
      colors = document.documentElement.dataset.theme === "light" ? LIGHT : DARK;
    };

    const resize = () => {
      const rect = canvas.getBoundingClientRect();
      width = rect.width;
      height = rect.height;
      canvas.width = Math.floor(width * dpr);
      canvas.height = Math.floor(height * dpr);
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      if (!placed && width > 0) {
        swimmers[0].x = width * 0.62;
        swimmers[1].x = width * 0.78;
        swimmers[2].x = width * 0.5;
        placed = true;
      }
    };

    const spriteWidth = (fontSize: number) => {
      const cached = widths.get(fontSize);
      if (cached) return cached;
      ctx.font = `${fontSize}px ui-monospace, SFMono-Regular, Menlo, monospace`;
      const measured = Math.max(...SHARK.map((line) => ctx.measureText(line).width));
      widths.set(fontSize, measured);
      return measured;
    };

    const paint = (dt: number) => {
      ctx.clearRect(0, 0, width, height);
      const narrow = width < 900;
      const alpha = colors === LIGHT ? 0.36 : narrow ? 0.16 : 0.62;
      const lane = narrow ? 0 : Math.min(560, width * 0.4);
      for (const fish of swimmers) {
        const box = spriteWidth(fish.fontSize);
        const minX = narrow ? -box : lane - box * 0.2;
        if (!reduce) {
          fish.x += fish.speed * dt;
          if (fish.speed > 0 && fish.x > width + 24) fish.x = minX;
          if (fish.speed < 0 && fish.x < minX) fish.x = width + 24;
        }
        ctx.save();
        ctx.globalAlpha = alpha;
        ctx.fillStyle = colors[fish.colorIndex] ?? colors[0];
        ctx.font = `${fish.fontSize}px ui-monospace, SFMono-Regular, Menlo, monospace`;
        ctx.textBaseline = "top";
        ctx.translate(fish.x, fish.yRatio * height);
        if (fish.speed < 0) {
          ctx.translate(box, 0);
          ctx.scale(-1, 1);
        }
        SHARK.forEach((line, index) => {
          ctx.fillText(line, 0, index * (fish.fontSize + 1));
        });
        ctx.restore();
      }
    };

    const tick = (now: number) => {
      const dt = Math.min(0.05, (now - last) / 1000);
      last = now;
      paint(dt);
      if (running) raf = requestAnimationFrame(tick);
    };

    const start = () => {
      if (reduce || running || document.hidden) return;
      running = true;
      last = performance.now();
      raf = requestAnimationFrame(tick);
    };

    const stop = () => {
      running = false;
      cancelAnimationFrame(raf);
    };

    const onVisibility = () => {
      if (document.hidden) stop();
      else start();
    };

    const onResize = () => {
      resize();
      if (reduce) paint(0);
    };

    readTheme();
    resize();
    paint(0);

    const observer = new MutationObserver(() => {
      readTheme();
      if (reduce) paint(0);
    });
    observer.observe(document.documentElement, {
      attributes: true,
      attributeFilter: ["data-theme"],
    });
    window.addEventListener("resize", onResize);
    document.addEventListener("visibilitychange", onVisibility);
    start();

    return () => {
      stop();
      observer.disconnect();
      window.removeEventListener("resize", onResize);
      document.removeEventListener("visibilitychange", onVisibility);
    };
  }, []);

  return <canvas ref={ref} className="ascii-sharks" aria-hidden="true" />;
}
