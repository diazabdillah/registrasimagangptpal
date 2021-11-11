<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
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
use App\models\Interview;
use App\Models\Absenmhs;
use App\Models\AbsenIndivsTabel;
use App\Models\DataMhsKelompoks;
use App\Models\InterviewSmk;
use App\Models\LaporanSmk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MagangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Individu Mahasiswa
    public function data_mhs()
    {
        if (auth()->user()->role_id == 8) {

            $ti = 'Data Mahasiswa';

            $id = Auth::user()->id;
            $data = DB::table('data_mhs_indivs')->where('user_id', '=', $id)->get();
            $files = DB::table('file_mhs_indivs')->where('user_id', '=', $id)->get();

            return view('magang.data-mhs', [
                'ti' => $ti,
                'data' => $data,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function input_data_mhs()
    {
        if (auth()->user()->role_id == 8) {

            $ti = 'Data Mahasiswa';

            return view('magang.input-data-mhs', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_data_mhs(Request $request)
    {
        $request->validate([
            'univ' => 'required',
            'strata' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
        ]);

        DataMhsIndiv::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'univ' => $request->univ,
            'strata' => $request->strata,
            'jurusan' => $request->jurusan,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nim' => $request->nim,
        ]);

        session()->flash('succes', 'Terima kasih telah mengirimkan data Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi data magang. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
        return redirect('/data-mhs');
    }

    public function edit_data_mhs($id)
    {
        if (auth()->user()->role_id == 8) {

            $ti = 'Data Mahasiswa';
            $data = DB::table('data_mhs_indivs')
                ->where('id', $id)
                ->first();

            return view('magang.edit-data-mhs', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_mhs(Request $request, $id)
    {
        DB::table('data_mhs_indivs')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'univ' => $request->univ,
                'strata' => $request->strata,
                'jurusan' => $request->jurusan,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'nim' => $request->nim,
            ]);

        session()->flash('succes', 'Data Anda berhasil diperbarui');
        return redirect('data-mhs');
    }

    public function berkas_mhs()
    {
        if (auth()->user()->role_id == 8) {
            $ti = 'Data Mahasiswa';

            return view('magang.berkas-mhs', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_berkas_mhs(Request $request)
    {
        $request->validate([
            'berkas' => 'required',
            'berkas.*' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/file/berkas-mahasiswa/
                $tujuan_upload = 'file/berkas-mahasiswa';
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

                FileMhsIndiv::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size
                ]);
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan berkas magang Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi data magang. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('/data-mhs');
        }
        return redirect()->back();
    }

    public function proses_hapus_berkas($id, $path)
    {
        // Hapus di local storage
        File::delete('file/berkas-mahasiswa/' . $path);
        // Hapus di database
        DB::table('file_mhs_indivs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Berkas berhasil dihapus');
        return redirect('data-mhs');
    }

    public function berkas_mhs_semua()
    {
        if (auth()->user()->role_id == 8) {
            $ti = 'Data Mahasiswa';
            $id = Auth::user()->id;
            $files = DB::table('file_mhs_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.berkas-mhs-semua', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function interview_mhs()
    {
        if (auth()->user()->role_id == 16) {
            $id = Auth::user()->id;
            $users = DB::table('data_mhs_indivs')
                ->leftjoin('interview', 'data_mhs_indivs.id', '=', 'interview.user_id')
                ->leftJoin('users', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->select('users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.id', 'data_mhs_indivs.nim', 'data_mhs_indivs.univ', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'interview.fileinterview')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            $ti = 'Interview';
            return view('magang.interview-mhs', [
                'ti' => $ti,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function interview_mhs_upload($id)
    {
        if (auth()->user()->role_id == 16) {

            $user = DataMhsIndiv::find($id);
            $ti = 'Upload Hasil Interview';
            return view('magang.interview-mhs-upload', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_interview_mhs_upload($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $request->validate([
            'tipe_kepribadian' => 'required',
            'introvet' => 'required',
            'ekstrovet' => 'required',
            'visioner' => 'required',
            'realistik' => 'required',
            'emosional' => 'required',
            'rasional' => 'required',
            'perencanaan' => 'required',
            'improvisasi' => 'required',
            'tegas' => 'required',
            'waspada' => 'required',
            'fileinterview' => 'required',
        ]);

        $file = $request->file('fileinterview');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/interview-mhs/';
        $file->move($tujuan_upload, $nama_file);

        Interview::create([
            'user_id' => $user->id,
            'tipe_kepribadian' => $request->tipe_kepribadian,
            'ekstrovet' => $request->ekstrovet,
            'introvet' => $request->introvet,
            'visioner' => $request->visioner,
            'realistik' => $request->realistik,
            'emosional' => $request->emosional,
            'rasional' => $request->rasional,
            'perencanaan' => $request->perencanaan,
            'improvisasi' => $request->improvisasi,
            'tegas' => $request->tegas,
            'waspada' => $request->waspada,
            'fileinterview' => $nama_file,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan hasil tes kepribadian anda selanjutnya akan kami proses');
        return redirect('/interview-mhs');
    }

    public function dokumen_mhs()
    {
        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $users = DB::table('data_mhs_indivs')
                ->leftJoin('users', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->select('data_mhs_indivs.id', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.univ', 'users.status_user')
                ->where('user_id', '=', $id)
                ->get();

            $showImage = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_i_d_mhs', 'foto_i_d_mhs.user_id', '=', 'data_mhs_indivs.id')
                ->select('foto_i_d_mhs.fotoID', 'foto_i_d_mhs.id', 'data_mhs_indivs.nama')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();

            $showImage1 = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_mhs_models', 'foto_mhs_models.user_id', '=', 'data_mhs_indivs.id')
                ->select('foto_mhs_models.foto', 'foto_mhs_models.id', 'data_mhs_indivs.nama')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();

            return view('magang.dokumen-mhs', [
                'ti' => $ti,
                'showImage' => $showImage,
                'showImage1' => $showImage1,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function show_mhs_foto($id)
    {
        $user = DataMhsIndiv::find($id);

        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_mhs_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.dokumen-mhs-upload-foto', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function show_mhs_dokumen($id)
    {
        $user = DataMhsIndiv::find($id);

        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_mhs_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.dokumen-mhs-upload', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_mhs_foto($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $request->validate([
            'fotoid' => 'required',
            'fotoid.*' => 'mimes:jpeg,jpg,png,pdf|max:2048'
        ]);

        if ($request->hasFile('fotoid')) {

            $files = $request->file('fotoid');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file/foto-mhs/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDMhs::create([
                    'user_id' => $user->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload foto berhasil');
            return redirect('dokumen-mhs');
        }
        return redirect()->back();
    }

    public function hapus_mhs_foto($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/foto-mhs/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_mhs')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Foto berhasil dihapus');
        return redirect('dokumen-mhs');
    }

    public function upload_mhs($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $request->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:jpeg,jpg,png,pdf|max:2048'
        ]);

        if ($request->hasFile('foto')) {

            $files = $request->file('foto');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file/dokumen-mhs/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoMhsModels::create([
                    'user_id' => $user->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload dokumen berhasil');
            return redirect('dokumen-mhs');
        }
        return redirect()->back();
    }

    public function hapus_mhs_dokumen($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/dokumen-mhs/' . $foto);
        // Hapus di database
        DB::table('foto_mhs_models')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Dokumen berhasil dihapus');
        return redirect('dokumen-mhs');
    }

    public function profil_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $ti = 'Profil Mahasiswa';
            $id = Auth::user()->id;

            $data = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.user_id')
                ->select('foto_i_d_mhs.fotoID', 'users.id', 'users.status_user', 'users.role_id', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.univ', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.divisi', 'data_mhs_indivs.user_id', 'data_mhs_indivs.departemen')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            return view('magang.profil-mhs', [
                'ti' => $ti,
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function absen_mhs()
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

        return view('magang.absen-mhs', [
            'ti' => $ti,
            'absenmhs' => $absenmhss,
        ]);
    }

    public function proses_absen_mhs($absenid, $individ)
    {

        // AbsenIndivsTabel::create([
        //     'id_absen' => $idabsen,
        //     'id_individu' => $idindividu,
        //     'waktu_absen' => date('Y-m-d H:i:s', strtotime(now())),
        //     'status_absen' => 'Sudah Absensi'
        // ]);

        DB::table('absen_indivs_tabel')
            ->where('id_absen', '=', $absenid)
            ->where('id_individu', '=', $individ)
            ->update([
                'waktu_absen' => date('Y-m-d H:i', strtotime(now())),
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
                ->select('foto_i_d_mhs.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'data_mhs_indivs.nim', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'user_role.role')
                ->where('users.id', '=', $id)
                ->get();

            return view('magang.id-card-mhs', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function id_card_mhs_pdf()
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
                ->select('foto_i_d_mhs.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'user_role.role', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nim')
                ->where('users.id', '=', $id)
                ->get();

            return view('magang.id-card-mhs-pdf', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function id_card_mhs_pdf_save()
    {
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
            ->select('foto_i_d_mhs.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nim', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'user_role.role')
            ->where('users.id', '=', $id)
            ->get();
        // $pdf = PDF::make('dompdf');
        $pdf = PDF::loadview('magang.id-card-mhs-pdf-save', [
            'ti' => $ti,
            'datas' => $datas,
            'dates' => $dates
        ]);
        return $pdf->stream();
    }

    public function laporan_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $nama = Auth::user()->name;
            $users = DB::table('laporans')
                ->where('laporans.nama', '=', $nama)
                ->get();
            $user = DB::table('laporans')
                ->get();
            $ti = 'Laporan Akhir';
            return view('magang.laporan-mhs', [
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
            return view('magang.upload-laporan', ['ti' => $ti]);
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
        $tujuan_upload = 'file/laporan-mhs/cover/';
        $file->move($tujuan_upload, $nama_file);
        $file1 = $request->file('path');
        $namafile = $file1->getClientOriginalName();
        $tujuan_upload = 'file/laporan-mhs/isi/';
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
        return redirect('/laporan-mhs');
    }

    public function lihat_laporan_mhs($id)
    {
        if (auth()->user()->role_id == 3) {
            $user = Laporan::find($id);
            $ti = 'Liat Laporan Akhir';
            return view('magang.lihat-laporan-mhs', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_laporan_mhs($id)
    {
        $ti = 'Edit Laporan';
        $data = DB::table('laporans')
            ->where('id', $id)
            ->first();

        return view('magang.edit-laporan-mhs', [
            'ti' => $ti,
            'data' => $data
        ]);
    }

    public function proses_edit_laporan_mhs($id, Request $request)
    {
        $lama = Laporan::find($id);
        File::delete('file/laporan-mhs/isi/' . $lama->path);

        $file = $request->file('path');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-mhs/isi/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('laporans')
            ->where('id', $id)
            ->update([
                'path' => $nama_file
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/laporan-mhs');
    }

    public function penilaian_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $id = Auth::user()->id;
            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('data_mhs_indivs.user_id', 'users.role_id', 'penilaians.laporankerja', 'penilaians.sopansantun', 'penilaians.kehadiran', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifKerja', 'penilaians.Loyalitas', 'penilaians.motivasi', 'penilaians.etika', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin', 'penilaians.PercayaDiri', 'penilaians.TanggungJawab', 'penilaians.PemahamanKemampuan', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'data_mhs_indivs.status_idcard', 'data_mhs_indivs.departemen', 'users.id', 'users.role_id', 'data_mhs_indivs.created_at', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            $ti = 'Penilaian Mahasiswa';
            return view('magang.penilaian-mhs', [
                'ti' => $ti,
                'users' => $users

            ]);
        } else {
            return redirect()->back();
        }
    }
    // Individu Mahasiswa


    // Kelompok Mahasiswa
    public function data_mhs_kelompok()
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Data Mahasiswa Kelompok';

            $id = Auth::user()->id;
            $data = DB::table('data_mhs_indivs')
                ->where('user_id', '=', $id)
                ->get();
            $files = DB::table('file_mhs_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.data-mhs-kelompok', [
                'ti' => $ti,
                'data' => $data,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function input_mhs_kelompok()
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Form Data Mahasiswa Kelompok';
            return view('magang.input-data-mhs-kelompok', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_data_mhs_kelompok(Request $request)
    {
        $request->validate([
            'univ' => 'required',
            'strata' => 'required',
            'jurusan' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
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
            'jurusan' => $request->jurusan,
        ]);
        session()->flash('succes', 'Terimakasih telah mengirimkan data anggota kelompok anda, selanjutnya mohon klik upload file calon magang');
        return redirect('/data-mhs-kelompok');
    }

    public function edit_data_mhs_kelompok($id)
    {
        if (auth()->user()->role_id == 6) {

            $ti = 'Data Mahasiswa';
            $data = DB::table('data_mhs_indivs')
                ->where('id', $id)
                ->first();

            return view('magang.edit-data-mhs-kelompok', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_mhs_kelompok(Request $request, $id)
    {
        DB::table('data_mhs_indivs')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'univ' => $request->univ,
                'strata' => $request->strata,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
            ]);

        session()->flash('succes', 'Data Mahasiswa berhasil diperbarui');
        return redirect('/data-mhs-kelompok');
    }

    public function proses_hapus_mhs_kelompok($id)
    {
        DB::table('data_mhs_indivs')
            ->where('id', $id)
            ->delete();

        return redirect('/data-mhs-kelompok')
            ->with('succes', 'Data Mahasiswa Berhasil Dihapus');
    }

    public function berkas_mhs_kelompok()
    {

        if (auth()->user()->role_id == 6) {

            $ti = 'Data File Mahasiswa Kelompok';

            return view('magang.berkas-mhs-kelompok', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_berkas_mhs_kelompok(Request $request)
    {
        $request->validate([
            'berkas' => 'required',
            'berkas.*' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/fileMhs
                $tujuan_upload = 'file/berkas-mhs-kel/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

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

    public function berkas_mhs_kelompok_semua()
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Data Mahasiswa';
            $id = Auth::user()->id;
            $files = DB::table('file_mhs_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.berkas-mhs-kelompok-semua', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function berkas_mhs_kelompok_lihat($id)
    {
        if (auth()->user()->role_id == 6) {
            $ti = 'Data Mahasiswa';

            $files = FileMhsIndiv::find($id);

            return view('magang.berkas-mhs-kelompok-lihat', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_hapus_berkas_kelompok($id, $path)
    {
        // Hapus di local storage
        File::delete('file/berkas-mhs-kel/' . $path);
        // Hapus di database
        DB::table('file_mhs_indivs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Berkas berhasil dihapus');
        return redirect('/data-mhs-kelompok');
    }

    public function interview_mhs_kel_upload($id)
    {
        if (auth()->user()->role_id == 16) {

            $user = DataMhsIndiv::find($id);
            $ti = 'Upload Hasil Interview';
            return view('magang.interview-mhs-kel-upload', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_interview_mhs_kel_upload($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $request->validate([
            'tipe_kepribadian' => 'required',
            'introvet' => 'required',
            'ekstrovet' => 'required',
            'visioner' => 'required',
            'realistik' => 'required',
            'emosional' => 'required',
            'rasional' => 'required',
            'perencanaan' => 'required',
            'improvisasi' => 'required',
            'tegas' => 'required',
            'waspada' => 'required',
            'fileinterview' => 'required',
        ]);

        $file = $request->file('fileinterview');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/interview-mhs-kel/';
        $file->move($tujuan_upload, $nama_file);

        Interview::create([
            'user_id' => $user->id,
            'tipe_kepribadian' => $request->tipe_kepribadian,
            'ekstrovet' => $request->ekstrovet,
            'introvet' => $request->introvet,
            'visioner' => $request->visioner,
            'realistik' => $request->realistik,
            'emosional' => $request->emosional,
            'rasional' => $request->rasional,
            'perencanaan' => $request->perencanaan,
            'improvisasi' => $request->improvisasi,
            'tegas' => $request->tegas,
            'waspada' => $request->waspada,
            'fileinterview' => $nama_file,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan hasil tes kepribadian anda selanjutnya akan kami proses');
        return redirect('/interview-mhs');
    }

    public function show_mhs_kel_foto($id)
    {
        $user = DataMhsIndiv::find($id);

        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_mhs_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.dokumen-mhs-kel-upload-foto', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function show_mhs_kel_dokumen($id)
    {
        $user = DataMhsIndiv::find($id);

        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_mhs_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.dokumen-mhs-kel-upload', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_mhs_kel_foto($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $request->validate([
            'fotoid' => 'required',
            'fotoid.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('fotoid')) {

            $files = $request->file('fotoid');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file/foto-mhs-kel/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDMhs::create([
                    'user_id' => $user->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload foto berhasil');
            return redirect('dokumen-mhs');
        }
        return redirect()->back();
    }

    public function upload_mhs_kel($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $request->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {

            $files = $request->file('foto');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file/dokumen-mhs-kel/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoMhsModels::create([
                    'user_id' => $user->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload dokumen berhasil');
            return redirect('dokumen-mhs');
        }
        return redirect()->back();
    }

    public function hapus_mhs_kel_foto($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/foto-mhs-kel/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_mhs')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Foto berhasil dihapus');
        return redirect('dokumen-mhs');
    }

    public function hapus_mhs_kel_dokumen($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/dokumen-mhs-kel/' . $foto);
        // Hapus di database
        DB::table('foto_mhs_models')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Dokumen berhasil dihapus');
        return redirect('dokumen-mhs');
    }
    // Kelompok Mahasiswa


    // Individu SMK
    public function data_smk()
    {
        if (auth()->user()->role_id == 9) {
            $ti = 'Data SMK';

            $id = Auth::user()->id;
            $data = DB::table('data_smk_indivs')
                ->where('user_id', '=', $id)
                ->get();
            $files = DB::table('file_smk_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.data-smk', [
                'ti' => $ti,
                'data' => $data,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function input_data_smk()
    {
        if (auth()->user()->role_id == 9) {

            $ti = 'Data SMK';

            return view('magang.input-data-smk', ['ti' => $ti]);
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
            'nis' => 'required',
        ]);

        DataSmkIndivs::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'sekolah' => $request->sekolah,
            'jurusan' => $request->jurusan,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nis' => $request->nis,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan data anda selanjutnya akan kami proses');
        return redirect('/data-smk');
    }

    public function dokumen_smk()
    {
        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen SMK';

            $id = Auth::user()->id;
            $users = DB::table('data_smk_indivs')
                ->leftJoin('users', 'data_smk_indivs.user_id', '=', 'users.id')
                ->select('data_smk_indivs.id', 'data_smk_indivs.nama', 'data_smk_indivs.nis', 'data_smk_indivs.sekolah', 'users.status_user')
                ->where('user_id', '=', $id)
                ->get();

            $showImage = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_i_d_smks', 'foto_i_d_smks.user_id', '=', 'data_smk_indivs.id')
                ->select('foto_i_d_smks.fotoID', 'foto_i_d_smks.id', 'data_smk_indivs.nama')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();

            $showImage1 = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_smk_models', 'foto_smk_models.user_id', '=', 'data_smk_indivs.id')
                ->select('foto_smk_models.foto', 'foto_smk_models.id', 'data_smk_indivs.nama')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();

            return view('magang.dokumen-smk', [
                'ti' => $ti,
                'showImage' => $showImage,
                'showImage1' => $showImage1,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function show_smk_foto($id)
    {
        $user = DataSmkIndivs::find($id);

        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen SMK';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_smk_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.dokumen-smk-upload-foto', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function show_smk_dokumen($id)
    {
        $user = DataSmkIndivs::find($id);

        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_smk_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.dokumen-smk-upload', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_smk_foto($id, Request $request)
    {
        $user = DataSmkIndivs::find($id);
        $request->validate([
            'fotoid' => 'required',
            'fotoid.*' => 'mimes:jpeg,jpg,png,pdf|max:2048'
        ]);

        if ($request->hasFile('fotoid')) {

            $files = $request->file('fotoid');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file/foto-smk/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDSmks::create([
                    'user_id' => $user->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload foto berhasil');
            return redirect('dokumen-smk');
        }
        return redirect()->back();
    }

    public function hapus_smk_foto($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/foto-smk/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_smks')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Foto berhasil dihapus');
        return redirect('dokumen-smk');
    }

    public function upload_smk($id, Request $request)
    {
        $user = DataSmkIndivs::find($id);
        $request->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:jpeg,jpg,png,pdf|max:2048'
        ]);

        if ($request->hasFile('foto')) {

            $files = $request->file('foto');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file/dokumen-smk/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoSmkModels::create([
                    'user_id' => $user->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload dokumen berhasil');
            return redirect('dokumen-smk');
        }
        return redirect()->back();
    }

    public function hapus_smk_dokumen($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/dokumen-smk/' . $foto);
        // Hapus di database
        DB::table('foto_smk_models')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Dokumen berhasil dihapus');
        return redirect('dokumen-mhs');
    }

    public function profil_smk()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'Profil SMK';

            $id = Auth::user()->id;

            $data = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.user_id')
                ->select('foto_i_d_smks.fotoID', 'users.id', 'users.status_user', 'users.role_id', 'data_smk_indivs.nama', 'data_smk_indivs.nis', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.sekolah', 'data_smk_indivs.no_hp', 'data_smk_indivs.divisi', 'data_smk_indivs.user_id', 'data_smk_indivs.departemen')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();
            return view('magang.profil-smk', [
                'ti' => $ti,
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function absen_smk()
    {
        if (auth()->user()->role_id == 4) {

            $id = Auth::user()->id;
            $absensmk = DB::table('absen_smks_tabel')
                ->leftJoin('data_smk_indivs', 'data_smk_indivs.id', '=', 'absen_smks_tabel.id_individu')
                ->leftJoin('absensmk', 'absensmk.id', '=', 'absen_smks_tabel.id_absen')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->select('absen_smks_tabel.status_absen', 'absen_smks_tabel.id_absen', 'absensmk.waktu_awal', 'absensmk.waktu_akhir', 'data_smk_indivs.id', 'data_smk_indivs.nama')
                ->get();

            $ti = 'Absen SMK';
            return view('magang.absen-smk', [
                'ti' => $ti,
                'absensmk' => $absensmk,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_absen_smk($absenid, $individ)
    {

        // AbsenIndivsTabel::create([
        //     'id_absen' => $idabsen,
        //     'id_individu' => $idindividu,
        //     'waktu_absen' => date('Y-m-d H:i:s', strtotime(now())),
        //     'status_absen' => 'Sudah Absensi'
        // ]);

        DB::table('absen_smks_tabel')
            ->where('id_absen', '=', $absenid)
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

    public function id_card_smk()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'ID Card SMK';
            $id = Auth::user()->id;

            $dates = DB::table('mulai_dan_selesai_smk')
                ->where('user_id', '=', $id)
                ->get();
            $datas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('foto_i_d_smks.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'data_smk_indivs.nis', 'data_smk_indivs.departemen', 'users.role_id', 'data_smk_indivs.divisi', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'user_role.role')
                ->where('users.id', '=', $id)
                ->get();

            return view('magang.id-card-smk', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function id_card_smk_pdf()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'ID Card SMK';
            $id = Auth::user()->id;
            $dates = DB::table('mulai_dan_selesai_smk')
                ->where('user_id', '=', $id)
                ->get();
            $datas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('foto_i_d_smks.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_smk_indivs.divisi', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'user_role.role', 'data_smk_indivs.departemen', 'data_smk_indivs.nis')
                ->where('users.id', '=', $id)
                ->get();

            return view('magang.id-card-smk-pdf', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function id_card_smk_pdf_save()
    {
        $ti = 'ID Card SMK';
        $id = Auth::user()->id;
        $dates = DB::table('mulai_dan_selesai_smk')
            ->where('user_id', '=', $id)
            ->get();
        $datas = DB::table('users')
            ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
            ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.user_id')
            ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
            ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
            ->select('foto_i_d_smks.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_smk_indivs.divisi', 'data_smk_indivs.nis', 'data_smk_indivs.departemen', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'user_role.role')
            ->where('users.id', '=', $id)
            ->get();
        // $pdf = PDF::make('dompdf');
        $pdf = PDF::loadview('magang.id-card-smk-pdf-save', [
            'ti' => $ti,
            'datas' => $datas,
            'dates' => $dates
        ]);
        return $pdf->stream();
    }

    public function laporan_smk()
    {
        if (auth()->user()->role_id == 4) {
            $nama = Auth::user()->name;
            $users = DB::table('laporans_smk')
                ->where('laporans_smk.nama', '=', $nama)
                ->get();
            $userSmk = DB::table('laporans_smk')
                ->get();
            $ti = 'Laporan Akhir';
            return view('magang.laporan-smk', [
                'ti' => $ti,
                'userSmk' => $userSmk,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_laporan_smk()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'Upload Laporan';
            return view('magang.upload-laporan-smk', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_laporan_smk(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal_kumpul' => 'required',
        ]);

        $file = $request->file('cover');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-smk/cover/';
        $file->move($tujuan_upload, $nama_file);
        $file1 = $request->file('path');
        $namafile = $file1->getClientOriginalName();
        $tujuan_upload = 'file/laporan-smk/isi/';
        $file1->move($tujuan_upload, $namafile);
        LaporanSmk::create([
            'nama' => Auth::user()->name,
            'sinopsis' => $request->sinopsis,
            'judul' => $request->judul,
            'tanggal_kumpul' => $request->tanggal_kumpul,
            'divisi' => $request->divisi,
            'cover' => $nama_file,
            'path' => $namafile
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan data anda selanjutnya akan kami proses');
        return redirect('/laporan-smk');
    }

    public function lihat_laporan_smk($id)
    {
        if (auth()->user()->role_id == 4) {
            $user = LaporanSmk::find($id);
            $ti = 'Liat Laporan Akhir';
            return view('magang.lihat-laporan-smk', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_laporan_smk($id)
    {
        $ti = 'Edit Laporan';
        $data = DB::table('laporans_smk')
            ->where('id', $id)
            ->first();

        return view('magang.edit-laporan-smk', [
            'ti' => $ti,
            'data' => $data
        ]);
    }

    public function proses_edit_laporan_smk($id, Request $request)
    {
        $lama = LaporanSmk::find($id);
        File::delete('file/laporan-smk/isi/' . $lama->path);

        $file = $request->file('path');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-smk/isi/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('laporans_smk')
            ->where('id', $id)
            ->update([
                'path' => $nama_file
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/laporan-smk');
    }

    public function penilaian_smk()
    {
        if (auth()->user()->role_id == 4) {
            $id = Auth::user()->id;
            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('penilaians_smk', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('data_smk_indivs.user_id', 'users.role_id', 'penilaians_smk.pembimbing', 'penilaians_smk.nilai_huruf', 'penilaians_smk.average', 'penilaians_smk.kerjasama', 'penilaians_smk.InisiatifKerja', 'penilaians_smk.Loyalitas', 'penilaians_smk.motivasi', 'penilaians_smk.etika', 'penilaians_smk.KesehatanKeselamatanKerja', 'penilaians_smk.disiplin', 'penilaians_smk.PercayaDiri', 'penilaians_smk.TanggungJawab', 'penilaians_smk.PemahamanKemampuan', 'penilaians_smk.laporankerja', 'penilaians_smk.sopansantun', 'penilaians_smk.kehadiran', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'data_smk_indivs.status_idcard', 'data_smk_indivs.departemen', 'users.id', 'users.role_id', 'data_smk_indivs.created_at', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.nis')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();
            $ti = 'Penilaian SMK';
            return view('magang.penilaian-smk', [
                'ti' => $ti,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }
    // Individu SMK


    // Kelompok SMK
    public function data_smk_kelompok()
    {
        if (auth()->user()->role_id == 7) {
            $ti = 'Data SMK Kelompok';

            $id = Auth::user()->id;
            $data = DB::table('data_smk_indivs')
                ->where('user_id', '=', $id)
                ->get();
            $files = DB::table('file_smk_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.data-smk-kelompok', [
                'ti' => $ti,
                'data' => $data,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function input_smk_kelompok()
    {
        if (auth()->user()->role_id == 7) {
            $ti = 'Form Data SMK Kelompok';
            return view('magang.input-data-smk-kelompok', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_data_smk_kelompok(Request $request)
    {
        $request->validate([
            'sekolah' => 'required',
            'jurusan' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
            'nis' => 'required'
        ]);

        DataSmkIndivs::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'sekolah' => $request->sekolah,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
        ]);
        session()->flash('succes', 'Terimakasih telah mengirimkan data anggota kelompok anda, selanjutnya mohon klik upload file calon magang');
        return redirect('/data-smk-kelompok');
    }

    public function edit_data_smk_kelompok($id)
    {
        if (auth()->user()->role_id == 7) {

            $ti = 'Data SMK';
            $data = DB::table('data_smk_indivs')
                ->where('id', $id)
                ->first();

            return view('magang.edit-data-smk-kelompok', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_smk_kelompok(Request $request, $id)
    {
        DB::table('data_smk_indivs')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'sekolah' => $request->sekolah,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'nis' => $request->nis,
                'jurusan' => $request->jurusan,
            ]);

        session()->flash('succes', 'Data SMK berhasil diperbarui');
        return redirect('/data-smk-kelompok');
    }

    public function proses_hapus_smk_kelompok($id)
    {
        DB::table('data_smk_indivs')
            ->where('id', $id)
            ->delete();

        return redirect('/data-smk-kelompok')
            ->with('succes', 'Data SMK Berhasil Dihapus');
    }

    public function berkas_smk_kelompok()
    {

        if (auth()->user()->role_id == 7) {

            $ti = 'Data File SMK Kelompok';

            return view('magang.berkas-smk-kelompok', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_berkas_smk_kelompok(Request $request)
    {
        $request->validate([
            'berkas' => 'required',
            'berkas.*' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/fileMhs
                $tujuan_upload = 'file/berkas-smk-kel/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

                FileSmkIndivs::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size
                ]);
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan file magang dan mengisi data kelompok anda. Selanjutnya akan kami proses telebih dahulu, mohon tunggu selama 5 hari kerja. Kalian akan dipindahkan ke halaman selanjutnya secara otomatis jika terkonfirmasi lolos. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('/data-smk-kelompok');
        }
        return redirect()->back();
    }

    public function berkas_smk_kelompok_semua()
    {
        if (auth()->user()->role_id == 7) {
            $ti = 'Data SMK';
            $id = Auth::user()->id;
            $files = DB::table('file_smk_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.berkas-smk-kelompok-semua', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function berkas_smk_kelompok_lihat($id)
    {
        if (auth()->user()->role_id == 7) {
            $ti = 'Data Mahasiswa';

            $files = FileSmkIndivs::find($id);

            return view('magang.berkas-smk-kelompok-lihat', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_hapus_berkas_kelompok_smk($id, $path)
    {
        // Hapus di local storage
        File::delete('file/berkas-smk-kel/' . $path);
        // Hapus di database
        DB::table('file_smk_indivs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Berkas berhasil dihapus');
        return redirect('/data-smk-kelompok');
    }

    public function interview_smk_kel_upload($id)
    {
        if (auth()->user()->role_id == 17) {
 
            $user = DataSmkIndivs::find($id);
            $ti = 'Upload Hasil Interview';
            return view('magang.interview-smk-kel-upload', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_interview_smk_kel_upload($id, Request $request)
    {
        $user = DataSmkIndivs::find($id);
        $request->validate([
            'tipe_kepribadian' => 'required',
            'introvet' => 'required',
            'ekstrovet' => 'required',
            'visioner' => 'required',
            'realistik' => 'required',
            'emosional' => 'required',
            'rasional' => 'required',
            'perencanaan' => 'required',
            'improvisasi' => 'required',
            'tegas' => 'required',
            'waspada' => 'required',
            'fileinterview' => 'required',
        ]);

        $file = $request->file('fileinterview');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/interview-smk-kel/';
        $file->move($tujuan_upload, $nama_file);

        InterviewSmk::create([
            'user_id' => $user->id,
            'tipe_kepribadian' => $request->tipe_kepribadian,
            'ekstrovet' => $request->ekstrovet,
            'introvet' => $request->introvet,
            'visioner' => $request->visioner,
            'realistik' => $request->realistik,
            'emosional' => $request->emosional,
            'rasional' => $request->rasional,
            'perencanaan' => $request->perencanaan,
            'improvisasi' => $request->improvisasi,
            'tegas' => $request->tegas,
            'waspada' => $request->waspada,
            'fileinterview' => $nama_file,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan hasil tes kepribadian anda selanjutnya akan kami proses');
        return redirect('/interview-smk');
    }

    public function show_smk_kel_foto($id)
    {
        $user = DataSmkIndivs::find($id);

        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen SMK';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_smk_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.dokumen-smk-kel-upload-foto', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function show_smk_kel_dokumen($id)
    {
        $user = DataSmkIndivs::find($id);

        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen SMK';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_smk_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.dokumen-smk-kel-upload', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_smk_kel_foto($id, Request $request)
    {
        $user = DataSmkIndivs::find($id);
        $request->validate([
            'fotoid' => 'required',
            'fotoid.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('fotoid')) {

            $files = $request->file('fotoid');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file/foto-smk-kel/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDSmks::create([
                    'user_id' => $user->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload foto berhasil');
            return redirect('dokumen-smk');
        }
        return redirect()->back();
    }

    public function upload_smk_kel($id, Request $request)
    {
        $user = DataSmkIndivs::find($id);
        $request->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {

            $files = $request->file('foto');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = $file->getClientOriginalName();
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file/dokumen-smk-kel/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoSmkModels::create([
                    'user_id' => $user->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload dokumen berhasil');
            return redirect('dokumen-smk');
        }
        return redirect()->back();
    }

    public function hapus_smk_kel_foto($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/foto-smk-kel/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_smks')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Foto berhasil dihapus');
        return redirect('dokumen-smk');
    }

    public function hapus_smk_kel_dokumen($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/dokumen-smk-kel/' . $foto);
        // Hapus di database
        DB::table('foto_smk_models')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Dokumen berhasil dihapus');
        return redirect('dokumen-smk');
    }

    // Kelompok SMK

    public function Kuota()
    {
        $ti = 'Kuota Magang';
        $users = DB::table('kuota')->get();
        return view('magang.Kuota', [
            'ti' => $ti,
            'users' => $users
        ]);
    }



    public function liat_file_smk_kel($id)
    {
        if (auth()->user()->role_id == 7) {
            $ti = 'Data Mahasiswa';

            $files = FileSmkIndivs::find($id);

            return view('magang.open-pdf-smk-kel', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function OpenPDF()
    {
        if (auth()->user()->role_id == 8) {
            $ti = 'Data Mahasiswa';
            $id = Auth::user()->id;
            $files = DB::table('file_mhs_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.openpdf', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function OpenPDFSMKKel()
    {
        if (auth()->user()->role_id == 7) {
            $ti = 'Data Siswa';
            $id = Auth::user()->id;
            $files = DB::table('file_smk_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.openpdf', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }





    public function proses_hapus_file_smk_kel($id, $path)
    {
        // Hapus di local storage
        File::delete('file/' . $path);
        // Hapus di database
        DB::table('file_smk_indivs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect('/data-mhs-kelompok');
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


    public function edit_data_smk($id)
    {
        if (auth()->user()->role_id == 9) {

            $ti = 'Data SMK';
            $data = DB::table('data_smk_indivs')
                ->where('id', $id)
                ->first();

            return view('magang.edit-data-smk', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_smk(Request $request, $id)
    {
        DB::table('data_smk_indivs')
            ->where('id', $id)
            ->update([
                'user_id' => Auth::user()->id,
                'sekolah' => $request->sekolah,
                'jurusan' => $request->jurusan,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'nis' => $request->nis,
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('data-smk');
    }

    public function berkas_smk()
    {

        if (auth()->user()->role_id == 9) {

            $ti = 'Data SMK';

            return view('magang.berkas-smk', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_berkas_smk(Request $request)
    {
        $request->validate([
            'berkas' => 'required',
            'berkas.*' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/file/berkas-smk/
                $tujuan_upload = 'file/berkas-smk/';
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

                FileSmkIndivs::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size
                ]);
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan file anda selanjutnya akan kami proses');
            return redirect('/data-smk');
        }
        return redirect()->back();
    }

    public function proses_hapus_berkas_smk($id, $path)
    {
        // Hapus di file storage
        File::delete('file/berkas-smk/' . $path);
        // Hapus di database
        DB::table('file_smk_indivs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect('/data-smk');
    }

    public function berkas_smk_semua()
    {
        if (auth()->user()->role_id == 9) {
            $ti = 'Data SMK';
            $id = Auth::user()->id;
            $files = DB::table('file_smk_indivs')
                ->where('user_id', '=', $id)
                ->get();

            return view('magang.berkas-smk-semua', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function interview_smk()
    {
        if (auth()->user()->role_id == 17) {
            $id = Auth::user()->id;
            $users = DB::table('data_smk_indivs')
                ->leftjoin('interview_smk', 'data_smk_indivs.id', '=', 'interview_smk.user_id')
                ->leftJoin('users', 'data_smk_indivs.user_id', '=', 'users.id')
                ->select('users.status_user', 'data_smk_indivs.nama', 'data_smk_indivs.id', 'data_smk_indivs.nis', 'data_smk_indivs.sekolah', 'interview_smk.fileinterview')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();
            $ti = 'Interview';
            return view('magang.interview-smk', [
                'ti' => $ti,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function interview_smk_upload($id)
    {
        if (auth()->user()->role_id == 17) {

            $user = DataSmkIndivs::find($id);
            $ti = 'Upload Hasil Interview';
            return view('magang.interview-smk-upload', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_interview_smk_upload($id, Request $request)
    {
        $user = DataSmkIndivs::find($id);
        $request->validate([
            'tipe_kepribadian' => 'required',
            'introvet' => 'required',
            'ekstrovet' => 'required',
            'visioner' => 'required',
            'realistik' => 'required',
            'emosional' => 'required',
            'rasional' => 'required',
            'perencanaan' => 'required',
            'improvisasi' => 'required',
            'tegas' => 'required',
            'waspada' => 'required',
            'fileinterview' => 'required',
        ]);

        $file = $request->file('fileinterview');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/interview-smk/';
        $file->move($tujuan_upload, $nama_file);

        InterviewSmk::create([
            'user_id' => $user->id,
            'tipe_kepribadian' => $request->tipe_kepribadian,
            'ekstrovet' => $request->ekstrovet,
            'introvet' => $request->introvet,
            'visioner' => $request->visioner,
            'realistik' => $request->realistik,
            'emosional' => $request->emosional,
            'rasional' => $request->rasional,
            'perencanaan' => $request->perencanaan,
            'improvisasi' => $request->improvisasi,
            'tegas' => $request->tegas,
            'waspada' => $request->waspada,
            'fileinterview' => $nama_file,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan hasil tes kepribadian anda selanjutnya akan kami proses');
        return redirect('/interview-smk');
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
                // Upload ke public/fotoMhs
                $tujuan_upload = 'file';
                $file->move($tujuan_upload, $Namafoto);

                FotoIDSmks::create([
                    'user_id' => Auth::user()->id,
                    'fotoID' => $Namafoto,
                ]);
            }

            session()->flash('success', 'Upload foto berhasil');
            return redirect('/Dokumen_smk');
        }
        return redirect()->back();
    }

    public function hapusFotoSmk($id, $fotoID)
    {
        // Hapus di file storage
        File::delete('file/' . $fotoID);
        // Hapus di database
        DB::table('foto_i_d_smks')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect('/Dokumen_smk');
    }

    public function showUploadSmk()
    {
        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen SMK';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_smk_models')
                ->where('user_id', '=', $id)
                ->get();
            $fotoID = DB::table('foto_i_d_smks')
                ->where('user_id', '=', $id)
                ->get();

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
                $tujuan_upload = 'file';
                $file->move($tujuan_upload, $Namafoto);

                FotoSmkModels::create([
                    'user_id' => Auth::user()->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('success', 'Upload foto berhasil');
            return redirect('/Dokumen_smk');
        }
        return redirect()->back();
    }

    public function hapus_dok_smk($id, $foto)
    {
        // Hapus di file storage
        File::delete('file/' . $foto);
        // Hapus di database
        DB::table('foto_smk_models')
            ->where('id', '=', $id)
            ->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect('/Dokumen_smk');
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




}
