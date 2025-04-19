<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthorController extends Controller
{
  public function index()
  {
    $data['title'] =  PROJECT_NAME . " - Autor";
    return $this->loadView("author", $data);
  }
}
