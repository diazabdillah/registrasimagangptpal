<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->role_id == 10) {
            $ti = 'Registrasi Pengajuan';
            return view('penelitian.regis-step2', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }
    public function idCard()
    {
        if (auth()->user()->role_id == 5) {
            $ti = 'ID Card Penelitian';
            return view('penelitian.id-card', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }
}
