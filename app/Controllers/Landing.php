<?php

namespace App\Controllers;

class Landing extends BaseController
{
  public function index()
  {
    return view('landing/index');
  }

  public function tentangKami()
  {
    return view('landing/tentang-kami');
  }
}
