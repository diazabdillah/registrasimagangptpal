<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Beasiswa;
use App\Models\Training;
use App\Models\DaftarRuangan;
use App\Models\UnitKerja;
use App\Models\SkemaBNSP;
use App\Models\JumlahAsesor;
use App\Models\Kuota;
use App\Models\ContactUs;
use App\Models\JadwalSertifikasi;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index(){
        $getNews = News::orderBy('id','DESC')->paginate(3);
        $getGalleries = Gallery::orderBy('id','DESC')->paginate(6);

        $training = DB::table('training')->get();

        foreach ($training as $t){
            if (now() < $t->tanggal_mulai){
                $status = "Segera Akan Datang";
                DB::table('training')->where('id', $t->id)->update([
                    'status' => $status
                ]);
            } else if ((now() >= $t->tanggal_mulai) && (now() < $t->tanggal_selesai)) {
                $status = "Sedang Berlangsung";
                DB::table('training')->where('id', $t->id)->update([
                    'status' => $status
                ]);
            } else {
                $status = "Selesai";
                DB::table('training')->where('id', $t->id)->update([
                    'status' => $status
                ]);
            }
        }
        
        return view('frontend.home', ['news' => $getNews, 'gallery' => $getGalleries]);
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
        $gallery = Gallery::orderBy('id','DESC')->simplePaginate(6);

        return view('frontend.gallery', ['gallery' => $gallery]);
    }

    public function showInternshipProsedure(){
        $getKuota = Kuota::orderBy('id','DESC')->simplePaginate(15);
        
        return view('frontend.internship_prosedure', ['kuota' => $getKuota])->with('i');
    }

    public function showInternshipFormatLaporan(){
        $getKuota = Kuota::orderBy('id','DESC')->simplePaginate(15);
        
        return view('frontend.internship_format_laporan', ['kuota' => $getKuota])->with('i');
    }


    public function showInternshipKuota(){
        $getKuota = Kuota::orderBy('id','DESC')->simplePaginate(15);
        
        return view('frontend.internship_kuota', ['kuota' => $getKuota])->with('i');
    }


    public function uploadContactUs(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        session()->flash('succes', 'Pesan berhasil dikirim!');
        return redirect('/contact');
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

        $ruangan = DB::table('daftar_ruangan')->select('nama_ruangan')->get();
        $divisi = DB::table('divisi')->select('nama_divisi')->get();
        $departemen = DB::table('departemen')->select('nama_departemen')->get();

        return view('frontend.peminjaman_ruangan', [
            'ti' => $ti,
            'dataRuangan' => $getDaftarRuangan,
            'ruangan' => $ruangan,
            'divisi' => $divisi,
            'departemen' => $departemen,
        ])->with('i');
    }

    public function showUnitKerja(){
        $getUnitKerja = UnitKerja::orderBy('id','DESC')->simplePaginate(10);

        return view('frontend.unit_kerja', ['unitKerja' => $getUnitKerja])->with('i');
    }

    public function showInformasiLSP(){
        $getSertifikasi = JadwalSertifikasi::orderBy('id','DESC')->simplePaginate(10);
        $getSkema = SkemaBNSP::orderBy('id','DESC')->simplePaginate(10);
        $getAsesor = JumlahAsesor::orderBy('id','DESC')->simplePaginate(10);

        return view('frontend.informasi_lsp',[
            'sertifikasi' => $getSertifikasi,
            'skema' => $getSkema,
            'asesor' => $getAsesor
        ]);
    }
}
