<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthorController extends Controller
{
  public function index()
  {
    return $this->loadView("author");
  }
}
