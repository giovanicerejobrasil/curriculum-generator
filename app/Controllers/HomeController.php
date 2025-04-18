<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => PROJECT_NAME,
            'mensagem' => 'Bem-vindo ao sistema MVC com PHP!'
        ];
        $this->loadView('home', $data);
    }

    public function author() {
        $data = [
            'title' => PROJECT_NAME . ' - Author',
            'mensagem' => "Olá, meu nome é Giovani! Essa é a página sobre mim."
        ];
        $this->loadView('author', $data);
    }
}