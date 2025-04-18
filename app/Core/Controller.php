<?php
namespace App\Core;
class Controller {
    public function loadView($view, $data = []) {
        // Extraí as variáveis do array para uso na view
        extract($data);
        require_once __DIR__ . '/../Views/' . $view . '.php';
    }
}