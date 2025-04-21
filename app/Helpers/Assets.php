<?php

namespace App\Helpers;

class Assets
{
    private static function asset(string $path): string
    {
        $baseUrl = defined('BASE_URL') ? BASE_URL : '';
        return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    }

    /**
     * Gera a tag HTML para incluir o arquivo css
     * 
     * @param string $file
     * @param mixed $version
     * @return string
     */
    public static function css(string $file, ?string $version = null): string
    {
        $url = self::asset("/public/assets/css/{$file}.css");

        if ($version !== null) {
            $url .= "?v=" . $version;
        }

        return '<link rel="stylesheet" href="' . $url . '">';
    }

    /**
     * Gera a tag HTML para incluir o arquivo javascript
     * 
     * @param string $file
     * @param string|null $version
     * @return string
     */
    public static function js(string $file, ?string $version = null): string
    {
        $url = self::asset("/public/assets/js/{$file}.js");

        if ($version !== null) {
            $url .= "?v=" . $version;
        }
        return '<script src="' . $url . '"></script>';
    }

    /**
     * Chama o arquivo de banco de dados do sqlite
     * 
     * @param string $file
     * @param mixed $version
     * @return string
     */
    public static function db(string $file, ?string $version = null): string
    {
        $url = self::asset("/database/{$file}.db");

        if ($version !== null) {
            $url .= "?v=" . $version;
        }
        return $url;
    }

    public static function img(string $file, ?string $version = null): string
    {
        $url = self::asset("/public/assets/img/{$file}");

        if ($version !== null) {
            $url .= "?v=" . $version;
        }

        return $url;
    }
}
