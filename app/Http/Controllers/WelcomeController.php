<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $ti = 'Welcome';
        return view('home', ['ti' => $ti]);
    }

}