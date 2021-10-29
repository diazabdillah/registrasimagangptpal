<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

class MenuController extends Controller
{

    // public function __construct()
    // {
    //     $this->MenuModel = new MenuModel();
    // }

    // public function menu()
    // {
    //     $data = [
    //         'menu' => $this->MenuModel->allData(),
    //     ];
    //     $ti = 'Welcome';
    //     return view('home', $data, ['ti' => $ti]);
    // }

    // public function menuM()
    // {
    //     $data = [
    //         'menu' => $this->MenuModel->allData(),
    //     ];

    //     return view('layouts.webBack', $data);
    // }

    // public function dataSubmenu()
    // {
    //     $data = [
    //         'datamenu' => $this->MenuModel->dataMenu(),
    //     ];

    //     return view('layouts.webBack', $data);
    // }


    public function index()
    {
        $ti = 'Menu Managemet';
        return view('menu.menu', ['ti' => $ti]);
    }

    public function Submenu()
    {
        $ti = 'Submenu Managemet';
        return view('menu.sub-menu', ['ti' => $ti]);
    }
}
