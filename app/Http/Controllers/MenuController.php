<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\MenuModel;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function News()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Berita Managemen';
            $data = DB::table('news')->get();
    
            return view('menu.news', [
                'ti' => $ti,
                'data' => $data
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function inputBerita()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Berita';

            return view('menu.input-berita', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputBerita(Request $request)
    {
        $request->validate([
            'judul' =>'required',
            'konten' => 'required',
            'foto' => 'required'
        ]);

        $file = $request->file('foto');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'berita';
        $file->move($tujuan_upload, $nama_file);

        News::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'foto' => $nama_file,
        ]);

        session()->flash('succes', 'Berita sudah di upload!');
        return redirect('/show-berita');
    }

    public function editBerita($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Berita';
            $data = DB::table('news')->where('id', $id)->first();

            return view('menu.edit-berita', [
                'ti' => $ti, 
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateBerita(Request $request, $id)
    {
        DB::table('news')->where('id', $id)
            ->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'foto' => $request->foto
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/show-berita');
    }

    public function deleteBerita($id)
    {
        DB::table('news')->where('id', $id)->delete();
         return redirect('/show-berita')->with('succes', 'Berita Anda Berhasil DiHapus');
    }

    public function Gallery()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Galeri Managemen';
            $data = DB::table('gallery')->get();
    
            return view('menu.gallery', [
                'ti' => $ti,
                'data' => $data
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function inputGaleri()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Galeri';

            return view('menu.input-galeri', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputGaleri(Request $request)
    {
        $request->validate([
            'judul' =>'required',
            'foto' => 'required'
        ]);

        Gallery::create([
            'judul' => $request->judul,
            'foto' => $request->foto
        ]);

        session()->flash('succes', 'galeri sudah di upload!');
        return redirect('/galeri');
    }

    public function editGaleri($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Galeri';
            $data = DB::table('gallery')->where('id', $id)->first();

            return view('menu.edit-galeri', [
                'ti' => $ti, 
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateGaleri(Request $request, $id)
    {
        DB::table('gallery')->where('id', $id)
            ->update([
                'judul' => $request->judul,
                'foto' => $request->foto
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/galeri');
    }

    public function deleteGaleri($id)
    {
        DB::table('gallery')->where('id', $id)->delete();
         return redirect('/galeri')->with('succes', 'Galeri Anda Berhasil DiHapus');
    }
}
