<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        echo view('header.header');
        echo view('dashboard.dashboard');
        echo view('footer.footer');
    }
}
