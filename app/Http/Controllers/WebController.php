<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Beasiswa;
use App\Models\Training;
use App\Models\DaftarRuangan;
use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\UnitKerja;
use App\Models\SkemaBNSP;
use App\Models\JumlahAsesor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index(){
        $getNews = News::orderBy('id','DESC')->paginate(3);
        $getGalleries = Gallery::orderBy('id','DESC')->paginate(3);
        
        return view('frontend.home', ['news' => $getNews, 'gallery' => $getGalleries]);
    }
    
    public function toMateri(){
        return view('/internship');
    }

    public function toProsedur(){
        return redirect('/internship');
    }

    public function toFormatLaporan(){
        return redirect('/internship');
    }

    public function toShipBuilding(){
        return view('info_kapal/ship_building');
    }

    public function toNavalShipbuilding(){
        return view('info_kapal/naval_shipbuilding');
    }

    public function toSubmarine(){
        return view('info_kapal/submarine');
    }

    public function toMerchantShipbuilding(){
        return view('info_kapal/merchant_shipbuilding');
    }

    public function toRekayasaUmum(){
        return view('info_kapal/rekayasa_umum');
    }

    public function toEnergy(){
        return view('info_kapal/energy');
    }

    public function toOffShore(){
        return view('info_kapal/off_shore');
    }

    public function toMaintenanceRepairOverhaul(){
        return view('info_kapal/maintenance_repair_overhaul');
    }

    public function toKRI(){
        return view('info_kapal/kri');
    }

    public function toNonKRI(){
        return view('info_kapal/non_kri');
    }

    public function toFasilitas(){
        return view('info_kapal/fasilitas');
    }

    public function toPenyediaSolusi(){
        return view('info_kapal/penyedia_solusi');
    }

    public function showNews(){
        $getNews = News::orderBy('id','DESC')->simplePaginate(6);

        return view('frontend.news', ['news' => $getNews]);
    }

    public function detailNews($id){
        $detailNews = DB::table('news')->where('id', $id)->get();
        $getNews = News::orderBy('id','DESC')->simplePaginate(6);

        return view('frontend.detail_news', ['detail' => $detailNews, 'news' => $getNews]);
    }


    public function showGalleries(){
        $getGalleries = Gallery::orderBy('id','DESC')->simplePaginate(6);

        return view('frontend.gallery', ['gallery' => $getGalleries]);
    }

    public function showInfoBeasiswa(){
        $getBeasiswa = Beasiswa::orderBy('id','DESC')->simplePaginate(6);

        return view('frontend.info_beasiswa', ['beasiswa' => $getBeasiswa]);
    }

    public function showMekanismeLayanan(){
        return view('frontend.mekanisme_layanan');
    }

    public function showTraining(){
        $getTraining = Training::orderBy('id','DESC')->simplePaginate(6);

        return view('frontend.training', ['training' => $getTraining]);
    }

    public function showDaftarRuangan(){
        $ti = 'Form Peminjaman Ruangan';
        $getDaftarRuangan = DaftarRuangan::orderBy('id','DESC')->simplePaginate(6);
        $ruangan = DaftarRuangan::all();
        $divisi = Divisi::all();
        $departemen = Departemen::all();

        return view('frontend.peminjaman_ruangan', [
            'ti' => $ti,
            'dataRuangan' => $getDaftarRuangan,
            'ruangan' => $ruangan,
            'divisi' => $divisi,
            'departemen' => $departemen
        ])->with('i');
    }

    public function showUnitKerja(){
        $getUnitKerja = UnitKerja::orderBy('id','DESC')->simplePaginate(10);

        return view('frontend.unit_kerja', ['unitKerja' => $getUnitKerja])->with('i');
    }

    public function showInformasiLSP(){
        $getTraining = Training::orderBy('id','DESC')->simplePaginate(10);
        $getSkema = SkemaBNSP::orderBy('id','DESC')->simplePaginate(10);
        $getAsesor = JumlahAsesor::orderBy('id','DESC')->simplePaginate(10);

        return view('frontend.informasi_lsp',[
            'training' => $getTraining,
            'skema' => $getSkema,
            'asesor' => $getAsesor
        ]);
    }
}
