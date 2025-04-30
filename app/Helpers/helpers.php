<?php

declare(strict_types=1);

if (!function_exists('darken_color')) {
    /**
     * Escurece uma cor hexadecimal por uma porcentagem.
     *
     * @param string|null $hex A cor hexadecimal (ex: #RRGGBB ou #RGB).
     * @param float $percent A porcentagem para escurecer (0-100).
     * @return string A cor hexadecimal escurecida ou uma cor fallback.
     */
    function darken_color(?string $hex, float $percent): string
    {
        $fallback_color = '#333333'; // Cor fallback mais escura
        if (empty($hex)) {
            return $fallback_color;
        }

        $hex = ltrim($hex, '#');

        if (strlen($hex) == 3) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }

        if (strlen($hex) !== 6) {
            return $fallback_color; // Retorna fallback se o hex for inválido após tratamento
        }

        $rgb = array_map('hexdec', str_split($hex, 2));

        foreach ($rgb as &$color) {
            $color = max(0, min(255, (int)($color * (1 - ($percent / 100)))));
        }
        unset($color); // Desfaz a referência

        return '#' . implode('', array_map(function($c) {
             return str_pad(dechex($c), 2, '0', STR_PAD_LEFT);
        }, $rgb));
    }
} 