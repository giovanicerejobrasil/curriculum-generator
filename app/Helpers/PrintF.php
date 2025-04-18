<?php
namespace App\Helpers;

class PrintF {
    public static function format($data) {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }

    /**
     * Imprime um texto com uma quantidade específica de caracteres
     * 
     * @param string $text
     * @param int $size | se usar o $size=0 todo o conteúdo será mostrado
     * @return string
     */
    public static function withSize(string $text, int $size): string {
        if (empty($text)) return '';
        
        if ($size == 0) return $text;

        return trim(mb_substr($text,0, $size)) . '...';
    }

    public static function dateFormat($date, string $format): string {
        if (empty($date)) return '';

        return date($format, strtotime($date));
    }
}