<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function showContactUs()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Contact Us Managemen';
            $data = DB::table('contact_us')->orderByDesc('id')->simplePaginate(10);

            return view('menu.contact_us', [
                'ti' => $ti,
                'data' => $data
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function deleteContactUs($id)
    {
        DB::table('contact_us')->where('id', $id)->delete();
        return redirect('/show-contact-us')->with('succes', 'Pesan Berhasil DiHapus');
    }
}
