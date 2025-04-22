<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthorController extends Controller
{
  public function index()
  {
    $data = [
      "title" => PROJECT_NAME . " - Autor",
      "project" => (object) [
        "name" => PROJECT_NAME,
        "link" => PROJECT_LINK_GITHUB
      ]
    ];

    return $this->loadView("author", $data);
  }
}
