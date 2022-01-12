<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function index()
    {
        $ti = 'Menu Managemet';
        return view('menu.menu', ['ti' => $ti]);
    }

    public function News()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Berita Managemen';
            $data = DB::table('news')->orderByDesc('id')->simplePaginate(10);
    
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
            'headline' =>'required',
            'konten' => 'required',
            'foto' => 'required'
        ]);

        if ($request->file('foto') != null){
            $file = $request->file('foto');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'berita';
            $file->move($tujuan_upload, $nama_file);
        } else {
            $nama_file = null;
        }

        News::create([
            'judul' => $request->judul,
            'headline' => $request->headline,
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
        if ($request->file('foto') == null){
            $fotoLama = News::find($id)->select('foto')->first();
            $nama_file = $fotoLama->foto;
        } else {
            $fotoLama = News::find($id)->select('foto')->first();
            File::delete('news/' . $fotoLama->foto);

            $file = $request->file('foto');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'berita';
            $file->move($tujuan_upload, $nama_file);
        }

        DB::table('news')->where('id', $id)->update([
            'judul' => $request->judul,
            'headline' => $request->headline,
            'konten' => $request->konten,
            'foto' => $nama_file
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
            $data = DB::table('gallery')->orderByDesc('id')->simplePaginate(10);
    
            return view('menu.gallery', [
                'ti' => $ti,
                'data' => $data
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function inputGaleriFoto()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Galeri';

            return view('menu.input-galeri_foto', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function inputGaleriVideo()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Galeri';

            return view('menu.input-galeri_video', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputGaleriFoto(Request $request)
    {
        $request->validate([
            'judul' =>'required'
        ]);

        $file = $request->file('foto');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'galeri';
        $file->move($tujuan_upload, $nama_file);
        $url = 0;

        Gallery::create([
            'judul' => $request->judul,
            'foto' => $nama_file,
            'url' => $url,
        ]);

        session()->flash('succes', 'galeri foto sudah di upload!');
        return redirect('/show-galeri');
    }

    public function prosesInputGaleriVideo(Request $request)
    {
        $request->validate([
            'judul' =>'required'
        ]);

        $foto = 0;
        $videoURL = $request->url;
        $convertedURL = str_replace("watch?v=", "embed/", $videoURL);

        Gallery::create([
            'judul' => $request->judul,
            'foto' => $foto,
            'url' => $convertedURL,
        ]);

        session()->flash('succes', 'galeri video sudah di upload!');
        return redirect('/show-galeri');
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
        if ($request->file('foto') != null) {
            $fotoLama = Gallery::find($id)->first();
            File::delete('galeri/' . $fotoLama->foto);

            $file = $request->file('foto');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'galeri';
            $file->move($tujuan_upload, $nama_file);
            $url = 0;
    
            DB::table('gallery')->where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'foto' => $nama_file,
                    'url' => $url,
                ]);
        } else if ($request->url != null) {
            $nama_file = 0;
            $videoURL = $request->url;
            $convertedURL = str_replace("watch?v=", "embed/", $videoURL);

            DB::table('gallery')->where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'foto' => $nama_file,
                    'url' => $convertedURL,
                ]);
        }

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/show-galeri');
    }

    public function deleteGaleri($id)
    {
        $fotoLama = Gallery::find($id)->first();
        File::delete('galeri/' . $fotoLama->foto);
        
        DB::table('gallery')->where('id', $id)->delete();
         return redirect('/show-galeri')->with('succes', 'Galeri Anda Berhasil DiHapus');
    }
}
