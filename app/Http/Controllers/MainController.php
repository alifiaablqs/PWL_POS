<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main'); // Mengarah ke view 'main.blade.php'
    }
}
