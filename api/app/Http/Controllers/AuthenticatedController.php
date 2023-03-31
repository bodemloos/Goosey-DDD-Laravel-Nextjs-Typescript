<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthenticatedController extends Controller
{
  /**
   * AuthenticatedController constructor.
   */
  public function __construct()
  {
    $this->middleware('auth');
  }
}