<?php
// Habilita a exibição de erros (em ambiente de desenvolvimento)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Carrega o autoloader (você pode usar o Composer ou fazer um autoloader simples)
require_once __DIR__ . '/../vendor/autoload.php';

// Carrega as configurações
require_once __DIR__ . '/../config/config.php';

// inicializa o router
require_once __DIR__ . '/route.php';