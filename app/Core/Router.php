<?php

namespace App\Core;

use App\Helpers\PrintF;

class Router
{
    private $routes = [];

    // Método para registrar uma rota
    public function add($route, $callback)
    {
        $this->routes[$route] = $callback;
    }

    // Processa a URL atual e executa a rota correspondente
    public function dispatch()
    {
        $url = $this->parseUrl();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $queryParamsStart = strpos($url, '?');

            if ($queryParamsStart) {
                $newUrl = substr($url, strpos($url, '?'));
                $url = str_replace($newUrl, '', $url);
            }
        }

        foreach ($this->routes as $route => $callback) {
            // Verifica se a URL corresponde à rota definida (pode-se utilizar expressões regulares para maior flexibilidade)
            if (str_contains($route, '{:')) {
                $itemRoute = explode('/', ltrim($route, '/'))[1] ?? '';
                $itemUrl = explode('/', ltrim($url, '/'))[1] ?? '';

                $route = str_replace($itemRoute, $itemUrl, $route);

                if ($route == $url) {
                    return call_user_func($callback, $itemUrl);
                }
            }

            if ($route == $url) {
                return call_user_func($callback);
            }
        }

        // Se nenhuma rota for encontrada, exibe uma página 404
        header("HTTP/1.0 404 Not Found");
        echo 'Página não encontrada';
    }

    private function parseUrl()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = ltrim($url, '?');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return $url;
        }
        return '';
    }
}
