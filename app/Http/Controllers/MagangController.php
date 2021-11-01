<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\DataMhsIndiv;
use App\Models\Laporan;
use App\Models\DataSmkIndivs;
use App\Models\FotoMhsModels;
use App\Models\FotoSmkModels;
use Illuminate\Support\Facades\DB;
use App\Models\FileMhsIndiv;
use App\Models\FileMhskel;
use App\Models\FileSmkIndivs;
use App\Models\FotoIDMhs;
use App\Models\FotoIDSmks;
use App\Models\Absenmhs;
use App\Models\AbsenIndivsTabel;
use App\Models\DataMhsKelompoks;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;
// use PDF;


// use Illuminate\Validation\ValidationException;

class MagangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menu Magang Mahasiswa =============
    public function Profil_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $ti = 'Profil Mahasiswa';
            $id = Auth::user()->id;

            $data = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.user_id')
                ->select('foto_i_d_mhs.fotoID', 'users.id', 'users.role_id', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.univ', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.divisi', 'data_mhs_indivs.user_id', 'data_mhs_indivs.strata')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            return view('magang.Profil_mhs', [
                'ti' => $ti,
                'data' => $data,

            ]);
        } else {
            return redirect()->back();
        }
    }

    public function Data_mhs()
    {

        if (auth()->user()->role_id == 8) {

            $ti = 'Data Mahasiswa';

            $id = Auth::user()->id;
            $data = DB::table('data_mhs_indivs')->where('user_id', '=', $id)->get();
            $files = DB::table('file_mhs_indivs')->where('user_id', '=', $id)->get();

            return view('magang.Data_mhs', [
                'ti' => $ti,
                'data' => $data,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function liat_file($id)
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Data Mahasiswa';

            $files = FileMhsIndiv::find($id);

            return view('magang.openpdfkel', ['ti' => $ti, 'files' => $files]);
        } else {
            return redirect()->back();
        }
    }
    public function OpenPDF()
    {
        if (auth()->user()->role_id == 8) {
            $ti = 'Data Mahasiswa';
            $id = Auth::user()->id;
            $files = DB::table('file_mhs_indivs')->where('user_id', '=', $id)->get();

            return view('magang.openpdf', ['ti' => $ti, 'files' => $files]);
        } else {
            return redirect()->back();
        }
    }
    public function OpenPDFkel()
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Data Mahasiswa';
            $id = Auth::user()->id;
            $files = DB::table('file_mhs_indivs')->where('user_id', '=', $id)->get();

            return view('magang.openpdf', ['ti' => $ti, 'files' => $files]);
        } else {
            return redirect()->back();
        }
    }

    public function inputDataMhs()
    {
        if (auth()->user()->role_id == 8) {

            $ti = 'Data Mahasiswa';

            return view('magang.input-data-mhsInd', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function editDataMhs($id)
    {
        if (auth()->user()->role_id == 8) {

            $ti = 'Data Mahasiswa';
            $data = DB::table('data_mhs_indivs')->where('id', $id)->first();

            return view('magang.edit-data-mhsInd', ['ti' => $ti, 'data' => $data]);
        } else {
            return redirect()->back();
        }
    }

    public function updateDataMhs(Request $request, $id)
    {
        DB::table('data_mhs_indivs')->where('id', $id)
            ->update([
                'user_id' => Auth::user()->id,
                'nama' => Auth::user()->name,
                'univ' => $request->univ,
                'strata' => $request->strata,
                'alamat_rumah' => $request->alamat_rumah,

                'no_hp' => $request->no_hp,
                'divisi' => $request->divisi,
                'departemen' => $request->departemen
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('Data_mhs');
    }


    public function proses_data_mhs(Request $request)
    {
        $request->validate([
            'univ' => 'required',
            'strata' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
            'divisi' => 'required',
            'departemen' => 'required',
        ]);

        DataMhsIndiv::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'univ' => $request->univ,
            'strata' => $request->strata,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nim' => $request->nim,
            'divisi' => $request->divisi,
            'departemen' => $request->departemen,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan data anda selanjutnya akan kami proses');
        return redirect('/Data_mhs');
    }

    public function file_mhs()
    {

        if (auth()->user()->role_id == 8) {

            $ti = 'Data Mahasiswa';

            return view('magang.berkas-mhs-indiv', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_file_mhs(Request $request)
    {
        $request->validate([
            'berkas' => 'required',
            'berkas.*' => 'mimes:jpeg,jpg,pdf|max:1048'
        ]);


        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/fileMhs
                $tujuan_upload = 'file';
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile, $size);

                FileMhsIndiv::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size
                ]);
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan file anda selanjutnya akan kami proses');
            return redirect('/Data_mhs');
        }
        return redirect()->back();
    }

    public function proses_hapus_file($id, $path)
    {
        // Hapus di file storage
        if (Storage::exists('public/file' . $path)) {
            Storage::delete('public/file' . $path);
        }
        // Hapus di database
        DB::table('file_mhs_indivs')->where('id', $id)->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect('Data_mhs');
    }

    //mhs kelompok
    public function data_mhs_kelompok()
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Data Mahasiswa Kelompok';

            $id = Auth::user()->id;
            $data = DB::table('data_mhs_indivs')->where('user_id', '=', $id)->get();
            $files = DB::table('file_mhs_indivs')->where('user_id', '=', $id)->get();

            return view('magang.data-mhs-kelompok', [
                'ti' => $ti,
                'data' => $data,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function inputDataMhsKel()
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Form Data Mahasiswa Kelompok';
            return view('magang.input-data-mhskel', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_data_mhsKelompok(Request $request)
    {
        $request->validate([
            'univ' => 'required',
            'strata' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
            'divisi' => 'required',
            'departemen' => 'required',
            'nim' => 'required'

        ]);

        DataMhsIndiv::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'univ' => $request->univ,
            'alamat_rumah' => $request->alamat_rumah,
            'strata' => $request->strata,
            'no_hp' => $request->no_hp,
            'nim' => $request->nim,
            'divisi' => $request->divisi,
            'departemen' => $request->departemen
        ]);
        session()->flash('succes', 'Terimakasih telah mengirimkan data anggota kelompok anda, selanjutnya mohon klik upload file calon magang');
        return redirect('/data-mhs-kelompok');
    }

    public function file_mhs_kelompok()
    {

        if (auth()->user()->role_id == 6) {

            $ti = 'Data File Mahasiswa Kelompok';

            return view('magang.berkas-mhs-kel', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_file_mhs_kelompok(Request $request)
    {
        $request->validate([
            'berkas' => 'required',
            'berkas.*' => 'mimes:jpeg,jpg,pdf|max:1048'
        ]);


        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/fileMhs
                $tujuan_upload = 'file';
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile, $size);

                FileMhsIndiv::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size
                ]);
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan file magang dan mengisi data kelompok anda. Selanjutnya akan kami proses telebih dahulu, mohon tunggu selama 5 hari kerja. Kalian akan dipindahkan ke halaman selanjutnya secara otomatis jika terkonfirmasi lolos. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('/data-mhs-kelompok');
        }
        return redirect()->back();
    }
    public function inputDatatambahMhsKel()
    {
        if (auth()->user()->role_id == 6) {

            $ti = 'Form Tambah Mahasiswa Kelompok';

            return view('magang.input-data-tambahmhskel', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_data_tambahmhsKelompok(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'univ' => 'required',
            'strata' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
            'divisi' => 'required'
        ]);

        DataMhsKelompoks::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'univ' => $request->univ,
            'alamat_rumah' => $request->alamat_rumah,
            'strata' => $request->strata,
            'no_hp' => $request->no_hp,
            'divisi' => $request->divisi,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan data anda selanjutnya akan kami proses');
        return redirect('/data-mhs-kelompok');
    }
    public function editDataMhskel($id)
    {
        if (auth()->user()->role_id == 6) {

            $ti = 'Data Mahasiswa';
            $data = DB::table('data_mhs_indivs')->where('id', $id)->first();

            return view('magang.edit-data-mhskel', ['ti' => $ti, 'data' => $data]);
        } else {
            return redirect()->back();
        }
    }

    public function updateDataMhskel(Request $request, $id)
    {
        DB::table('data_mhs_indivs')->where('id', $id)
            ->update([
                'user_id' => Auth::user()->id,
                'nama' => $request->nama,
                'univ' => $request->univ,
                'strata' => $request->strata,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'divisi' => $request->divisi,
                'departemen' => $request->departemen

            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/data-mhs-kelompok');
    }
    public function proses_hapus_mhskelompok($id)
    {
        DB::table('data_mhs_indivs')->where('id', $id)->delete();
        return redirect('/data-mhs-kelompok')->with('succes', 'Data Mahasiswa Berhasil DiHapus');
    }
    //end mhs kelompok
    public function Dokumen_mhs()
    {
        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $users = DB::table('data_mhs_indivs')->where('user_id', '=', $id)->get();
            $showImage = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_i_d_mhs', 'foto_i_d_mhs.user_id', '=', 'data_mhs_indivs.id')

                ->select('foto_i_d_mhs.fotoID', 'data_mhs_indivs.id', 'data_mhs_indivs.nama')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            $showImage1 = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_mhs_models', 'foto_mhs_models.user_id', '=', 'data_mhs_indivs.id')

                ->select('foto_mhs_models.foto', 'data_mhs_indivs.id', 'data_mhs_indivs.nama')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();

            return view('magang.Dokumen_mhs', [
                'ti' => $ti,
                'showImage' => $showImage,
                'fotoID' => $showImage1,
                'users' => $users

            ]);
        } else {
            return redirect()->back();
        }
    }

    public function showUploadMhs3x4($id)
    {
        $user = DataMhsIndiv::find($id);

        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_mhs_models')->where('user_id', '=', $id)->get();

            return view('magang.Dokumen_mhs_uploadfoto', [
                'ti' => $ti,
                'showImage' => $showImage,

                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function showUploadMhs($id)
    {
        $user = DataMhsIndiv::find($id);

        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_mhs_models')->where('user_id', '=', $id)->get();
            $fotoID = DB::table('foto_i_d_mhs')->where('user_id', '=', $id)->get();

            return view('magang.Dokumen_mhs_upload', [
                'ti' => $ti,
                'showImage' => $showImage,
                'fotoID' => $fotoID,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function uploadDocFotoMhs($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $request->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:jpeg,jpg,png,pdf|max:1048'
        ]);

        if ($request->hasFile('foto')) {

            $files = $request->file('foto');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto, $size);
                FotoMhsModels::create([
                    'user_id' => $user->id,
                    'foto' => $Namafoto,
                ]);
            }

            session()->flash('success', 'Upload foto berhasil');
            return redirect('Dokumen_mhs');
        }
        return redirect()->back();
    }

    public function hapus_dok_mhs($id, $foto)
    {
        if (Storage::exists('public/file' . $foto)) {
            Storage::delete('public/file' . $foto);
        }
        DB::table('foto_mhs_models')->where('id', $id)->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect('Dokumen_mhs');
    }

    public function upFotoMhs($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $request->validate([
            'fotoid' => 'required',
            'fotoid.*' => 'mimes:jpeg,jpg,png|max:1048'
        ]);

        if ($request->hasFile('fotoid')) {

            $files = $request->file('fotoid');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto, $size);
                FotoIDMhs::create([
                    'user_id' => $user->id,
                    'fotoID' => $Namafoto,
                ]);
            }

            session()->flash('success', 'Upload foto berhasil');
            return redirect('Dokumen_mhs');
        }
        return redirect()->back();
    }

    public function hapusFotoMhs($id, $fotoID)
    {
        if (Storage::exists('public/file' . $fotoID)) {
            Storage::delete('public/file' . $fotoID);
        }
        DB::table('foto_i_d_mhs')->where('id', $id)->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect('Dokumen_mhs');
    }

    public function tableabsen_mhs()
    {
        $id = Auth::user()->id;

        $absenmhss = DB::table('absen_indivs_tabel')
            ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.id', '=', 'absen_indivs_tabel.id_individu')
            ->leftJoin('absenmhs', 'absenmhs.id', '=', 'absen_indivs_tabel.id_absen')
            ->where('data_mhs_indivs.user_id', '=', $id)
            ->select('absen_indivs_tabel.status_absen', 'absen_indivs_tabel.id_absen', 'absenmhs.waktu_awal', 'absenmhs.waktu_akhir', 'data_mhs_indivs.id', 'data_mhs_indivs.nama')
            ->get();

        // $absenmhs = DB::table('absenmhs')
        //     ->LeftJoin('data_mhs_indivs', 'absenmhs.user_id', '=', 'data_mhs_indivs.user_id')
        //     ->LeftJoin('absen_indivs_tabel', 'data_mhs_indivs.id', '=', 'absen_indivs_tabel.id_individu')
        //     ->where('absenmhs.user_id', '=', $id)
        //     ->where('data_mhs_indivs.user_id', '=', $id)
        //     ->select('absen_indivs_tabel.status_absen', 'absenmhs.id AS absenID', 'absenmhs.waktu_awal', 'absenmhs.waktu_akhir', 'data_mhs_indivs.id', 'data_mhs_indivs.nama')
        //     ->get();

        // dd($absenmhss);

        $ti = 'Absensi';

        return view('magang.tableabsen_mhs', [
            'ti' => $ti,
            'absenmhs' => $absenmhss,
        ]);
    }

    public function proses_absenmhs($absenid, $individ)
    {

        // AbsenIndivsTabel::create([
        //     'id_absen' => $idabsen,
        //     'id_individu' => $idindividu,
        //     'waktu_absen' => date('Y-m-d H:i:s', strtotime(now())),
        //     'status_absen' => 'Sudah Absensi'
        // ]);

        DB::table('absen_indivs_tabel')->where('id_absen', '=', $absenid)
            ->where('id_individu', '=', $individ)
            ->update([
                'waktu_absen' => date('Y-m-d H:i:s', strtotime(now())),
                'status_absen' => "Sudah Absen",
            ]);

        // $absenindividu->waktu_absen = date('Y-m-d H:i:s', strtotime(now()));
        // $absenindividu->status_absen = "Sudah Absen";
        // $absenindividu->save();

        return redirect()->back();
    }

    public function id_card_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $ti = 'ID Card Mahasiswa';
            $id = Auth::user()->id;
            $dates = DB::table('mulai_dan_selesai_mhs')
                ->where('user_id', '=', $id)
                ->get();
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('foto_i_d_mhs.fotoID', 'users.name', 'users.created_at', 'users.id', 'data_mhs_indivs.nim', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'user_role.role')
                ->where('users.id', '=', $id)
                ->get();

            return view('magang.id_card_mhs', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function idCardMhsPdf()
    {
        if (auth()->user()->role_id == 3) {
            $ti = 'ID Card Mahasiswa';
            $id = Auth::user()->id;
            $dates = DB::table('mulai_dan_selesai_mhs')->where('user_id', '=', $id)->get();
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('foto_i_d_mhs.fotoID', 'users.name', 'users.created_at', 'users.id', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'user_role.role')
                ->where('users.id', '=', $id)
                ->get();

            return view('magang.idcard-mhs-pdf', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function sertifikatmhspdf()
    {
        if (auth()->user()->role_id == 3) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('penilaians.nilai_huruf', 'users.name', 'users.id', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'user_role.role')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Sertifikat Mahasiswa';
            return view('magang.sertifikat_mhs_pdf', [
                'ti' => $ti,
                'datas' => $datas
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function sertifikat_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('penilaians.nilai_huruf', 'users.name', 'users.id', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'user_role.role')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Sertifikat Mahasiswa';
            return view('magang.sertifikat_mhs', [
                'ti' => $ti,
                'datas' => $datas
            ]);
        } else {
            return redirect()->back();
        }
    }

    // Menu Magang Mahasiswa =============


    // Menu Magang SMK ===================
    public function Profil_smk()
    {
        if (auth()->user()->role_id == 4 or auth()->user()->role_id == 9) {
            $ti = 'Profil SMK';
            return view('magang.Profil_smk', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function Data_smk()
    {
        if (auth()->user()->role_id == 9) {
            $ti = 'Data SMK';

            $id = Auth::user()->id;
            $data = DB::table('data_smk_indivs')->where('user_id', '=', $id)->get();
            $files = DB::table('file_smk_indivs')->where('user_id', '=', $id)->get();

            return view('magang.Data_smk', [
                'ti' => $ti,
                'data' => $data,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function inputDataSmk()
    {
        if (auth()->user()->role_id == 9) {

            $ti = 'Data SMK';

            return view('magang.input-data-smkInd', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function file_smk()
    {

        if (auth()->user()->role_id == 9) {

            $ti = 'Data SMK';

            return view('magang.berkas-smk-indiv', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_data_smk(Request $request)
    {
        $request->validate([
            'sekolah' => 'required',
            'jurusan' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
            'divisi' => 'required',
            'departemen' => 'required',
        ]);

        DataSmkIndivs::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'sekolah' => $request->sekolah,
            'jurusan' => $request->jurusan,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'divisi' => $request->divisi,
            'departemen' => $request->departemen,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan data anda selanjutnya akan kami proses');
        return redirect('/Data_smk');
    }

    public function proses_file_smk(Request $request)
    {
        $request->validate([
            'berkas' => 'required',
            'berkas.*' => 'mimes:jpeg,jpg,pdf|max:1048'
        ]);


        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/fileMhs
                $file->storeAs('public/file', $NamaFile);
                $size = $file->getSize();

                FileSmkIndivs::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size
                ]);
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan file anda selanjutnya akan kami proses');
            return redirect('/Data_smk');
        }
        return redirect()->back();
    }

    public function proses_hapus_fileSmk($id, $path)
    {
        // Hapus di file storage
        if (Storage::exists('public/file/' . $path)) {
            Storage::delete('public/files/' . $path);
        }
        // Hapus di database
        DB::table('file_smk_indivs')->where('id', $id)->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect('/Data_smk');
    }

    public function openpdf_smk()
    {
        if (auth()->user()->role_id == 9) {
            $ti = 'Data SMK';
            $id = Auth::user()->id;
            $files = DB::table('file_smk_indivs')->where('user_id', '=', $id)->get();

            return view('magang.openpdf-smk', ['ti' => $ti, 'files' => $files]);
        } else {
            return redirect()->back();
        }
    }

    public function upFotoSmk(Request $request)
    {
        $request->validate([
            'fotoid' => 'required',
            'fotoid.*' => 'mimes:jpeg,jpg,png|max:1048'
        ]);

        if ($request->hasFile('fotoid')) {

            $files = $request->file('fotoid');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                $file->storeAs('public/file', $Namafoto);

                FotoIDSmks::create([
                    'user_id' => Auth::user()->id,
                    'fotoID' => $Namafoto,
                ]);
            }

            session()->flash('success', 'Upload foto berhasil');
            return redirect('/Dokumen_smk_upload');
        }
        return redirect()->back();
    }

    public function hapusFotoSmk($id, $fotoID)
    {
        if (Storage::exists('public/file' . $fotoID)) {
            Storage::delete('public/file' . $fotoID);
        }
        DB::table('foto_i_d_smks')->where('id', $id)->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect('/Dokumen_smk_upload');
    }

    public function Data_smk_kelompok()
    {
        if (auth()->user()->role_id == 7) {
            $ti = 'Data Pendaftaran Kelompok';
            return view('magang.data-smk-kelompok', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function Dokumen_smk()
    {
        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen SMK';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_smk_models')->where('user_id', '=', $id)->get();

            return view('magang.Dokumen_smk', [
                'ti' => $ti,
                'showImage' => $showImage
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function showUploadSmk()
    {
        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen SMK';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_smk_models')->where('user_id', '=', $id)->get();
            $fotoID = DB::table('foto_i_d_smks')->where('user_id', '=', $id)->get();

            return view('magang.Dokumen_smk_upload', [
                'ti' => $ti,
                'showImage' => $showImage,
                'fotoID' => $fotoID
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function uploadDocFotoSmk(Request $request)
    {
        $request->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:jpeg,jpg,png,pdf|max:1048'
        ]);

        if ($request->hasFile('foto')) {

            $files = $request->file('foto');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $file->storeAs('public/file', $Namafoto);

                FotoSmkModels::create([
                    'user_id' => Auth::user()->id,
                    'foto' => $Namafoto,
                ]);
            }

            session()->flash('success', 'Upload foto berhasil');
            return redirect('/Dokumen_smk_upload');
        }
        return redirect()->back();
    }

    public function hapus_dok_smk($id, $foto)
    {
        if (Storage::exists('public/file' . $foto)) {
            Storage::delete('public/file' . $foto);
        }
        DB::table('foto_smk_models')->where('id', $id)->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect('/Dokumen_smk');
    }

    public function Absen_smk()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'Absen SMK';
            return view('magang.Absen_smk', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function id_card_smk()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'ID Card SMK';
            return view('magang.id_card_smk', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function sertifikat_smk()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'Sertifikat SMK';
            return view('magang.sertifikat_smk', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }
    // Menu Magang SMK ===================
    public function laporan()
    {
        if (auth()->user()->role_id == 3) {
            $id = Auth::user()->id;
            $users = DB::table('laporans')->where('laporans.id', '=', $id)->get();
            $user = DB::table('laporans')->get();
            $ti = 'Laporan Akhir';
            return view('magang.laporan_mhs', [
                'ti' => $ti,
                'user' => $user,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function upload_laporan()
    {
        if (auth()->user()->role_id == 3) {
            $ti = 'Upload Laporan';
            return view('magang.upload_laporan', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }
    public function Kuota()
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Kuota Magang';
            $users = DB::table('kuota')->get();
            return view('magang.Kuota', [
                'ti' => $ti,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_laporan(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal_kumpul' => 'required',


        ]);

        $file = $request->file('cover');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file';
        $file->move($tujuan_upload, $nama_file);
        $file1 = $request->file('path');
        $namafile = $file1->getClientOriginalName();
        $tujuan_upload = 'file';
        $file1->move($tujuan_upload, $namafile);
        Laporan::create([

            'nama' => Auth::user()->name,
            'sinopsis' => $request->sinopsis,
            'judul' => $request->judul,
            'tanggal_kumpul' => $request->tanggal_kumpul,
            'divisi' => $request->divisi,
            'cover' => $nama_file,
            'path' => $namafile
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan data anda selanjutnya akan kami proses');
        return redirect('/laporan_mhs');
    }
    public function lihatlaporanmhs($id)
    {
        if (auth()->user()->role_id == 3) {
            $user = Laporan::find($id);
            $ti = 'Liat Laporan Akhir';
            return view('magang.lihat_laporan_mhs', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function penilaian_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $id = Auth::user()->id;
            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'users.id', '=', 'penilaians.user_id')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('data_mhs_indivs.user_id', 'users.role_id', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifKerja', 'penilaians.Loyalitas', 'penilaians.motivasi', 'penilaians.etika', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin', 'penilaians.PercayaDiri', 'penilaians.TanggungJawab', 'penilaians.PemahamanKemampuan', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'data_mhs_indivs.status_idcard', 'data_mhs_indivs.departemen', 'users.id', 'users.role_id', 'data_mhs_indivs.created_at', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim')
                ->where('penilaians.user_id', '=', $id)
                ->get();
            $ti = 'Penilaian Mahasiswa';
            return view('magang.penilaian_mhs', [
                'ti' => $ti,
                'users' => $users

            ]);
        } else {
            return redirect()->back();
        }
    }
}
