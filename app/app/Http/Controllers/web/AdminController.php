<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        echo view('header.header');
        echo view('admin.admin');
        echo view('footer.footer');
    }
}
