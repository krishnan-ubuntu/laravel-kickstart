<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        echo view('header.header');
        echo view('home.home');
        echo view('footer.footer');
    }
}
