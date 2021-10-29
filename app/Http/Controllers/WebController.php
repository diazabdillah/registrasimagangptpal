<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function showNews(){
        $getNews = News::all();

        return view('frontend.news', ['news' => $getNews]);
    }
}
