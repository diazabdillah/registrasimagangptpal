<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MenuModel extends Model
{
    use HasFactory;
    public function allData()
    {
        $role_id = Auth::user()->role_id;

        return DB::table('user_menu')
            ->leftjoin('user_access_menu', 'user_menu.id', '=', 'user_access_menu.menu_id')
            // ->leftjoin('user_sub_menu', 'user_menu.id', '=', 'user_sub_menu.menu_id')
            ->select('user_menu.id', 'menu')
            ->where('user_access_menu.role_id', '=', $role_id)
            ->get();
    }

    public function dataMenu()
    {
        $role_id = Auth::user()->role_id;

        return DB::table('user_sub_menu')
            ->leftjoin('user_menu', 'user_sub_menu.menu_id', '=', 'user_menu.id')
            ->select('user_sub_menu.menu_id', 'title')
            ->where('user_access_menu.role_id', '=', $role_id)
            ->get();
    }
}
