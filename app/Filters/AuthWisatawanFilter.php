<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthWisatawanFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!session()->get('is_login_wisatawan')) {

      return redirect()->to('/wisatawan/login')->with('error', "Silahkan login terlebih dahulu");
    }
    // Do something here
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
