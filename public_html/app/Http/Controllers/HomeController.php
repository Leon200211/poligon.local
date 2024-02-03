<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Blog\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}
