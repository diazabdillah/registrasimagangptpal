<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $ti = 'Welcome';
        return view('hcm-welcome', ['ti' => $ti]);
    }

    public function home()
    {
        $ti = 'Welcome';
        return view('home', ['ti' => $ti]);
    }
}
