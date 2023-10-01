<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        echo view('header.header');
        echo view('reports.reports');
        echo view('footer.footer');
    }
}
