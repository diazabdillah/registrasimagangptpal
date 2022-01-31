<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\DataMhsIndiv;
use App\Models\Laporan;
use App\Models\DataSmkIndivs;
use App\Models\Rekapmhs;
use App\Models\FotoMhsModels;
use App\Models\FotoSmkModels;
use Illuminate\Support\Facades\DB;
use App\Models\FileMhsIndiv;
use App\Models\Penilaian;
use App\Models\PenilaianSmk;
use App\Models\FileSmkIndivs;
use App\Models\FotoIDMhs;
use App\Models\FotoIDSmks;
use App\Models\Absenmhs;
use App\Models\RekapAbsenmhs;
use App\Models\AbsenSmk;
use App\Models\LaporanSmk;
use App\Models\RekapAbsensmk;
use App\Models\Rekapsmk;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

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
            $data = DB::table('data_mhs_indivs')
                ->leftJoin('rekapmhs', 'rekapmhs.nama', '=', 'data_mhs_indivs.nama')
                ->select('rekapmhs.id as id_rekap', 'data_mhs_indivs.user_id', 'data_mhs_indivs.id', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.strata', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.no_hp')
                ->where('data_mhs_indivs.user_id', $id)
                ->where('rekapmhs.user_id', $id)
                ->get();
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

        $user = DataMhsIndiv::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'univ' => $request->univ,
            'strata' => $request->strata,
            'jurusan' => $request->jurusan,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nim' => $request->nim,
        ]);

        Rekapmhs::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'univ' => $request->univ,
            'strata' => $request->strata,
            'jurusan' => $request->jurusan,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nim' => $request->nim,
            'status_user' => Auth::user()->status_user,
        ]);

        Penilaian::create([
            'user_id' => $user->id,
            'pembimbing' => null,
            'Kerjasama' => 0,
            'MotivasiPercayaDiri' => 0,
            'InisiatifTanggungJawabKerja' => 0,
            'Loyalitas' => 0,
            'EtikaSopanSantun' => 0,
            'Disiplin' => 0,
            'PemahamanKemampuan' => 0,
            'KesehatanKeselamatanKerja' => 0,
            'Laporankerja' => 0,
            'kehadiran' => 0,
            'average' => 0,
            'nilai_huruf' => null,
            'status_penilaian' => null,
            'keterangan' => null,
        ]);

        session()->flash('succes', 'Terima kasih telah mengirimkan data Anda. Selanjutnya kirim berkas praktikan proposal,surat pengantar,dan CV.');
        return redirect('/data-mhs');
    }

    public function edit_data_mhs($id)
    {
        if (auth()->user()->role_id == 8) {

            $ti = 'Data Mahasiswa';
            $data = DB::table('data_mhs_indivs')
                ->leftJoin('rekapmhs', 'rekapmhs.nama', '=', 'data_mhs_indivs.nama')
                ->select('rekapmhs.id as id_rekap', 'data_mhs_indivs.id', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.no_hp')
                ->where('data_mhs_indivs.id', $id)
                ->first();

            return view('magang.edit-data-mhs', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_mhs(Request $request, $id, $id_rekap)
    {
        DB::table('data_mhs_indivs')
            ->where('id', $id)
            ->update([
                'univ' => $request->univ,
                'strata' => $request->strata,
                'jurusan' => $request->jurusan,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'nim' => $request->nim,
            ]);

        DB::table('rekapmhs')
            ->where('id', $id_rekap)
            ->update([
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
            'mulai' => 'required',
            'selesai' => 'required',
            'berkas' => 'required',
            'berkas.*' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/file/berkas-mahasiswa/
                $tujuan_upload = 'file/berkas-mahasiswa/' . Auth::user()->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

                FileMhsIndiv::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size,
                    'nomorsurat' => $request->nomorsurat,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan
                ]);

                $id = Auth::user()->id;
                $exist = DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->first();
                if ($exist) {
                    DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekapmhs')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                } else {
                    DB::table('mulai_dan_selesai_mhs')->insert([
                        'user_id' => $id,
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekapmhs')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                }
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan berkas magang Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi data magang. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('/data-mhs');
        }
        return redirect()->back();
    }

    public function proses_hapus_berkas($id, $path)
    {
        $mhs = FileMhsIndiv::find($id);
        // Hapus di local storage
        File::delete('file/berkas-mahasiswa/' . $mhs->user_id . '/' . $path);
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
                ->leftjoin('interview', 'data_mhs_indivs.id', '=', 'interview.id_individu')
                ->leftJoin('users', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->select('users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.id', 'data_mhs_indivs.nim', 'data_mhs_indivs.univ', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'interview.fileinterview')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            $ti = 'Tes Kepribadian Mahasiswa';
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
            $ti = 'Upload Hasil Tes';
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
        $individu = DataMhsIndiv::find($id);
        $request->validate([
            'fileinterview' => 'required|mimes:jpg,bmp,png|max:2048',
        ]);

        $file = $request->file('fileinterview');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/interview-mhs/' . $individu->id;
        $file->move($tujuan_upload, $nama_file);

        DB::table('interview')->insert([
            'id_individu' => $individu->id,
            'fileinterview' => $nama_file,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan berkas interview Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi Berkas Interview. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
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
                ->leftJoin('foto_i_d_mhs', 'foto_i_d_mhs.id_individu', '=', 'data_mhs_indivs.id')
                ->select('foto_i_d_mhs.id_individu', 'foto_i_d_mhs.fotoID', 'foto_i_d_mhs.id', 'data_mhs_indivs.nama')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();

            $showImage1 = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_mhs_models', 'foto_mhs_models.id_individu', '=', 'data_mhs_indivs.id')
                ->select('foto_mhs_models.id_individu', 'foto_mhs_models.foto', 'foto_mhs_models.id', 'data_mhs_indivs.nama')
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
                ->where('id_individu', '=', $id)
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
                ->where('id_individu', '=', $id)
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
        $individu = DataMhsIndiv::find($id);
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
                $tujuan_upload = 'file/foto-mhs/' . $individu->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDMhs::create([
                    'id_individu' => $individu->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan foto anda, selanjutnya mohon klik Berkas Lainnya');
            return redirect('dokumen-mhs');
        }
        return redirect()->back();
    }

    public function hapus_mhs_foto($id, $foto)
    {
        $foto3x4 = FotoIDMhs::find($id);
        // Hapus di local storage
        File::delete('file/foto-mhs/' . $foto3x4->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_mhs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Foto berhasil dihapus');
        return redirect('dokumen-mhs');
    }

    public function upload_mhs($id, Request $request)
    {
        $individu = DataMhsIndiv::find($id);
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
                $tujuan_upload = 'file/dokumen-mhs/' . $individu->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoMhsModels::create([
                    'id_individu' => $individu->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan dokumen magang Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi dokumen magang. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('dokumen-mhs');
        }
        return redirect()->back();
    }

    public function hapus_mhs_dokumen($id, $foto)
    {
        $dokumen = FotoMhsModels::find($id);
        // Hapus di local storage
        File::delete('file/dokumen-mhs/' . $dokumen->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_mhs_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Dokumen berhasil dihapus');
        return redirect('dokumen-mhs');
    }

    public function profil_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $ti = 'Profil Mahasiswa';
            $id = Auth::user()->id;

            $data = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.id_individu')
                ->select('foto_i_d_mhs.id_individu', 'foto_i_d_mhs.fotoID', 'users.id', 'users.status_user', 'users.role_id', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.univ', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.divisi', 'data_mhs_indivs.user_id', 'data_mhs_indivs.departemen')
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
        if (auth()->user()->role_id == 3) {
            $absenmhs = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->leftJoin('mulai_dan_selesai_mhs', 'mulai_dan_selesai_mhs.user_id', '=', 'data_mhs_indivs.user_id')
                ->where('data_mhs_indivs.user_id', '=', Auth::user()->id)
                ->select('data_mhs_indivs.id', 'data_mhs_indivs.nama', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai')
                ->get();

            $absenmhss = DB::table('absenmhs')
                ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.id', '=', 'absenmhs.id_individu')
                ->select('data_mhs_indivs.nama', 'absenmhs.waktu_absen', 'absenmhs.id', 'absenmhs.jenis_absen', 'absenmhs.keterangan')
                ->where('data_mhs_indivs.user_id', '=', Auth::user()->id)
                ->get();

            $ti = 'Absensi';
            return view('magang.absen-mhs', [
                'ti' => $ti,
                'absenmhs' => $absenmhs,
                'absenmhss' => $absenmhss,
            ]);
        } else {
            return redirect()->back();
        }
    }

    // public function absen_mhs()
    // {
    //     $id = Auth::user()->id;

    //     $absenmhss = DB::table('absen_indivs_tabel')
    //         ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.id', '=', 'absen_indivs_tabel.id_individu')
    //         ->leftJoin('absenmhs', 'absenmhs.id', '=', 'absen_indivs_tabel.id_absen')
    //         ->where('data_mhs_indivs.user_id', '=', $id)
    //         ->select('absen_indivs_tabel.status_absen', 'absen_indivs_tabel.id_absen', 'absenmhs.waktu_awal', 'absenmhs.keterangan', 'absenmhs.waktu_akhir', 'data_mhs_indivs.id', 'data_mhs_indivs.nama')
    //         ->get();

    //     // $absenmhs = DB::table('absenmhs')
    //     //     ->LeftJoin('data_mhs_indivs', 'absenmhs.user_id', '=', 'data_mhs_indivs.user_id')
    //     //     ->LeftJoin('absen_indivs_tabel', 'data_mhs_indivs.id', '=', 'absen_indivs_tabel.id_individu')
    //     //     ->where('absenmhs.user_id', '=', $id)
    //     //     ->where('data_mhs_indivs.user_id', '=', $id)
    //     //     ->select('absen_indivs_tabel.status_absen', 'absenmhs.id AS absenID', 'absenmhs.waktu_awal', 'absenmhs.waktu_akhir', 'data_mhs_indivs.id', 'data_mhs_indivs.nama')
    //     //     ->get();

    //     // dd($absenmhss);

    //     $ti = 'Absensi';

    //     return view('magang.absen-mhs', [
    //         'ti' => $ti,
    //         'absenmhs' => $absenmhss,
    //     ]);
    // }

    public function proses_absen_masuk_mhs($individ)
    {
        if (date('H:i', strtotime(now())) > '07:30') {
            Absenmhs::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Telat",
            ]);
            RekapAbsenmhs::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Telat",
            ]);
        } elseif (date('H:i', strtotime(now())) <= '07:30') {
            Absenmhs::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Tepat Waktu",
            ]);
            RekapAbsenmhs::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Tepat Waktu",
            ]);
        }

        return redirect()->back();
    }


    public function proses_absen_pulang_mhs($individ)
    {
        Absenmhs::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Pulang",
            'keterangan' => "Tepat Waktu",
        ]);
        RekapAbsenmhs::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Pulang",
            'keterangan' => "Tepat Waktu",
        ]);

        return redirect()->back();
    }
    public function proses_absen_izin_mhs($individ, Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'file_absen' => 'required|mimes:jpg,bmp,png|max:2048',
        ]);
        $file = $request->file('file_absen');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/absen';
        $file->move($tujuan_upload, $nama_file);
        Absenmhs::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Izin",
            'keterangan' => $request->keterangan,
            'file_absen' => $nama_file
        ]);
        RekapAbsenmhs::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Izin",
            'keterangan' => $request->keterangan,
            'file_absen' => $nama_file
        ]);
        return redirect()->back();
    }
    // public function proses_absen_mhs($absenid, $individ)
    // {

    //     // AbsenIndivsTabel::create([
    //     //     'id_absen' => $idabsen,
    //     //     'id_individu' => $idindividu,
    //     //     'waktu_absen' => date('Y-m-d H:i:s', strtotime(now())),
    //     //     'status_absen' => 'Sudah Absensi'
    //     // ]);

    //     DB::table('absen_indivs_tabel')
    //         ->where('id_absen', '=', $absenid)
    //         ->where('id_individu', '=', $individ)
    //         ->update([
    //             'waktu_absen' => date('Y-m-d H:i', strtotime(now())),
    //             'status_absen' => "Sudah Absen",
    //         ]);

    //     // $absenindividu->waktu_absen = date('Y-m-d H:i:s', strtotime(now()));
    //     // $absenindividu->status_absen = "Sudah Absen";
    //     // $absenindividu->save();

    //     return redirect()->back();
    // }
    public function cetak_absenmhs_pdf()
    {
        if (auth()->user()->role_id == 3) {

            $absenmhss = DB::table('absenmhs')
                ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.id', '=', 'absenmhs.id_individu')
                ->leftJoin('mulai_dan_selesai_mhs', 'mulai_dan_selesai_mhs.user_id', '=', 'data_mhs_indivs.user_id')
                ->select('data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.univ', 'data_mhs_indivs.divisi', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'absenmhs.waktu_absen', 'absenmhs.jenis_absen', 'absenmhs.keterangan')
                ->where('data_mhs_indivs.user_id', '=', Auth::user()->id)
                ->get();
            $i = 1;
            $ti = 'DAFTAR HADIR';
            $pdf = PDF::loadview('magang.absen-mhs-pdf', [
                'ti' => $ti,
                'absenmhss' =>  $absenmhss,
                'i' => $i,
            ]);

            return $pdf->download('Absen Mahasiswa.pdf');
        } else {
            return redirect()->back();
        }
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
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.id_individu')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('foto_i_d_mhs.id_individu', 'foto_i_d_mhs.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'data_mhs_indivs.nim', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ')
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
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.id_individu')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('foto_i_d_mhs.id_individu', 'foto_i_d_mhs.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nim')
                ->where('users.id', '=', $id)
                ->get();

            // return view('magang.id-card-mhs-pdf', [
            //     'ti' => $ti,
            //     'datas' => $datas,
            //     'dates' => $dates
            // ]);
            $pdf = PDF::loadview('magang.id-card-mhs-pdf', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);

            return $pdf->download('id-card-mhs.pdf');
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
            ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.id_individu')
            ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
            ->select('foto_i_d_mhs.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nim', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ')
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

    public function laporan_mhs(Request $request)
    {
        if (auth()->user()->role_id == 3) {
            $nama = Auth::user()->name;
            $status_user = Auth::user()->status_user;
            $users = DB::table('laporans')
                ->where('laporans.nama', '=', $nama)
                ->get();
            $cari = $request->cari;
            $user = DB::table('laporans')
                ->where('judul', 'like', "%" . $cari . "%")
                ->orWhere('jurusan', 'like', "%" . $cari . "%")
                ->orWhere('divisi', 'like', "%" . $cari . "%")
                ->get();

            $ti = 'Laporan Akhir';
            return view('magang.laporan-mhs', [
                'ti' => $ti,
                'user' => $user,
                'users' => $users,
                'status_user' => $status_user,

            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_laporan()
    {
        if (auth()->user()->role_id == 3) {
            $ti = 'Upload Laporan';
            $user = DB::table('data_mhs_indivs')
                ->where('user_id', Auth::user()->id)
                ->first();
            return view('magang.upload-laporan', [
                'ti' => $ti,
                'user' => $user,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_laporan(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'path' => 'required|mimes:pdf',
            'jurusan' => 'required'
        ]);

        $file = $request->file('path');
        $namafile = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-mhs/';
        $file->move($tujuan_upload, $namafile);

        Laporan::create([
            'nama' => Auth::user()->name,
            'judul' => $request->judul,
            'divisi' => $request->divisi,
            'jurusan' => $request->jurusan,
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

    public function lihat_laporan_mhs_revisi($id)
    {
        if (auth()->user()->role_id == 3) {
            $user = Laporan::find($id);
            $ti = 'Liat Laporan Akhir Revisi';
            return view('magang.lihat-laporan-mhs-revisi', [
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
        File::delete('file/laporan-mhs/' . $lama->path);
        $file = $request->file('path');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-mhs/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('laporans')
            ->where('id', $id)
            ->update([
                'judul' => $request->judul,
                'path' => $nama_file,
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
                ->leftJoin('mulai_dan_selesai_mhs', 'data_mhs_indivs.user_id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('data_mhs_indivs.user_id', 'users.role_id', 'penilaians.laporankerja', 'penilaians.kehadiran', 'penilaians.keterangan', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifTanggungJawabKerja', 'penilaians.Loyalitas', 'penilaians.MotivasiPercayaDiri', 'penilaians.EtikaSopanSantun', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin',  'penilaians.PemahamanKemampuan', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'data_mhs_indivs.departemen', 'users.id', 'users.role_id', 'data_mhs_indivs.created_at', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim')
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
                ->leftJoin('rekapmhs', 'rekapmhs.nama', '=', 'data_mhs_indivs.nama')
                ->select('rekapmhs.id as id_rekap', 'data_mhs_indivs.id', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.strata', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.no_hp')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->where('rekapmhs.user_id', '=', $id)
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

        $user = DataMhsIndiv::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'univ' => $request->univ,
            'alamat_rumah' => $request->alamat_rumah,
            'strata' => $request->strata,
            'no_hp' => $request->no_hp,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
        ]);

        Rekapmhs::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'univ' => $request->univ,
            'alamat_rumah' => $request->alamat_rumah,
            'strata' => $request->strata,
            'no_hp' => $request->no_hp,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'status_user' => Auth::user()->status_user,
        ]);

        Penilaian::create([
            'user_id' => $user->id,
            'pembimbing' => null,
            'Kerjasama' => 0,
            'MotivasiPercayaDiri' => 0,
            'InisiatifTanggungJawabKerja' => 0,
            'Loyalitas' => 0,
            'EtikaSopanSantun' => 0,
            'Disiplin' => 0,
            'PemahamanKemampuan' => 0,
            'KesehatanKeselamatanKerja' => 0,
            'Laporankerja' => 0,
            'kehadiran' => 0,
            'average' => 0,
            'nilai_huruf' => null,
            'status_penilaian' => null,
            'keterangan' => null,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan data anggota kelompok anda, selanjutnya mohon klik upload file calon magang');
        return redirect('/data-mhs-kelompok');
    }

    public function edit_data_mhs_kelompok($id)
    {
        if (auth()->user()->role_id == 6) {

            $ti = 'Data Mahasiswa';
            $data = DB::table('data_mhs_indivs')
                ->leftJoin('rekapmhs', 'rekapmhs.nama', '=', 'data_mhs_indivs.nama')
                ->select('rekapmhs.id as id_rekap', 'data_mhs_indivs.id', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.strata', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.nim')
                ->where('data_mhs_indivs.id', $id)
                ->first();

            return view('magang.edit-data-mhs-kelompok', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_mhs_kelompok(Request $request, $id, $id_rekap)
    {
        DB::table('data_mhs_indivs')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'univ' => $request->univ,
                'strata' => $request->strata,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'nim' => $request->nim,
            ]);

        DB::table('rekapmhs')
            ->where('id', $id_rekap)
            ->update([
                'nama' => $request->nama,
                'univ' => $request->univ,
                'strata' => $request->strata,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'nim' => $request->nim,
            ]);
        session()->flash('succes', 'Data Mahasiswa berhasil diperbarui');
        return redirect('/data-mhs-kelompok');
    }

    public function proses_hapus_mhs_kelompok($id, $id_rekap)
    {
        DB::table('data_mhs_indivs')
            ->where('id', $id)
            ->delete();

        DB::table('rekapmhs')
            ->where('id', $id_rekap)
            ->delete();

        DB::table('penilaians')
            ->where('user_id', $id)
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
            'mulai' => 'required',
            'selesai' => 'required',
            'berkas' => 'required',
            'berkas.*' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/fileMhs
                $tujuan_upload = 'file/berkas-mhs-kel/' . Auth::user()->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

                FileMhsIndiv::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size,
                    'nomorsurat' => $request->nomorsurat,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan
                ]);

                $id = Auth::user()->id;
                $exist = DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->first();
                if ($exist) {
                    DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekapmhs')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                } else {
                    DB::table('mulai_dan_selesai_mhs')->insert([
                        'user_id' => $id,
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekapmhs')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                }
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
        $mhs = FileMhsIndiv::find($id);
        // Hapus di local storage
        File::delete('file/berkas-mhs-kel/' . $mhs->user_id . '/' . $path);
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
            $ti = 'Upload Hasil Tes';
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
        $individu = DataMhsIndiv::find($id);
        $request->validate([
            'fileinterview' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('fileinterview');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/interview-mhs-kel/' . $individu->id;
        $file->move($tujuan_upload, $nama_file);

        DB::table('interview')->insert([
            'id_individu' => $individu->id,
            'fileinterview' => $nama_file,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan berkas interview Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi berkas interview. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
        return redirect('/interview-mhs');
    }

    public function show_mhs_kel_foto($id)
    {
        $user = DataMhsIndiv::find($id);

        if (auth()->user()->role_id == 11) {
            $ti = 'Dokumen Mahasiswa';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_mhs_models')
                ->where('id_individu', '=', $id)
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
                ->where('id_individu', '=', $id)
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
        $individu = DataMhsIndiv::find($id);
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
                $tujuan_upload = 'file/foto-mhs-kel/' . $individu->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDMhs::create([
                    'id_individu' => $individu->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengupload foto anda, selanjutnya mohon klik berkas lainnya');
            return redirect('dokumen-mhs');
        }
        return redirect()->back();
    }

    public function upload_mhs_kel($id, Request $request)
    {
        $individu = DataMhsIndiv::find($id);
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
                $tujuan_upload = 'file/dokumen-mhs-kel/' . $individu->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoMhsModels::create([
                    'id_individu' => $individu->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan Dokumen Magang. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi Dokumen Magang. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('dokumen-mhs');
        }
        return redirect()->back();
    }

    public function hapus_mhs_kel_foto($id, $foto)
    {
        $foto3x4 = FotoIDMhs::find($id);
        // Hapus di local storage
        File::delete('file/foto-mhs-kel/' . $foto3x4->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_mhs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Foto berhasil dihapus');
        return redirect('dokumen-mhs');
    }

    public function hapus_mhs_kel_dokumen($id, $foto)
    {
        $dokumen = FotoMhsModels::find($id);
        // Hapus di local storage
        File::delete('file/dokumen-mhs-kel/' . $dokumen->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_mhs_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Dokumen berhasil dihapus');
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
                ->leftJoin('rekapsmk', 'rekapsmk.nama', '=', 'data_smk_indivs.nama')
                ->select('rekapsmk.id as id_rekap', 'data_smk_indivs.id', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.no_hp', 'data_smk_indivs.nis')
                ->where('data_smk_indivs.user_id', $id)
                ->where('rekapsmk.user_id', $id)
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
        $id = Auth::user()->id;
        $request->validate([
            'sekolah' => 'required',
            'jurusan' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
            'nis' => 'required',
        ]);

        $smk = DataSmkIndivs::create([
            'user_id' => $id,
            'nama' => Auth::user()->name,
            'sekolah' => $request->sekolah,
            'jurusan' => $request->jurusan,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nis' => $request->nis,
        ]);

        Rekapsmk::create([
            'user_id' => $id,
            'nama' => Auth::user()->name,
            'sekolah' => $request->sekolah,
            'jurusan' => $request->jurusan,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nis' => $request->nis,
            'status_user' => Auth::user()->status_user,
        ]);

        PenilaianSmk::create([
            'user_id' => $smk->id,
            'pembimbing' => null,
            'Kerjasama' => 0,
            'MotivasiPercayaDiri' => 0,
            'InisiatifTanggungJawabKerja' => 0,
            'Loyalitas' => 0,
            'EtikaSopanSantun' => 0,
            'Disiplin' => 0,
            'PemahamanKemampuan' => 0,
            'KesehatanKeselamatanKerja' => 0,
            'Laporankerja' => 0,
            'kehadiran' => 0,
            'average' => 0,
            'nilai_huruf' => null,
            'status_penilaian' => null,
            'keterangan' => null,
        ]);

        session()->flash('succes', 'Terima kasih telah mengirimkan data Anda. Selanjutnya kirim berkas praktikan proposal,surat pengantar,dan CV.');
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
                ->leftJoin('foto_i_d_smks', 'foto_i_d_smks.id_individu', '=', 'data_smk_indivs.id')
                ->select('foto_i_d_smks.id_individu', 'foto_i_d_smks.fotoID', 'foto_i_d_smks.id', 'data_smk_indivs.nama')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();

            $showImage1 = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_smk_models', 'foto_smk_models.id_individu', '=', 'data_smk_indivs.id')
                ->select('foto_smk_models.id_individu', 'foto_smk_models.foto', 'foto_smk_models.id', 'data_smk_indivs.nama')
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
                ->where('id_individu', '=', $id)
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
                ->where('id_individu', '=', $id)
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
        $individusmk = DataSmkIndivs::find($id);
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
                $tujuan_upload = 'file/foto-smk/' . $individusmk->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDSmks::create([
                    'id_individu' => $individusmk->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan foto anda, selanjutnya mohon klik berkas lainnya');
            return redirect('dokumen-smk');
        }
        return redirect()->back();
    }

    public function hapus_smk_foto($id, $foto)
    {
        $foto3x4 = FotoIDSmks::find($id);
        // Hapus di local storage
        File::delete('file/foto-smk/' . $foto3x4->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_smks')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Foto berhasil dihapus');
        return redirect('dokumen-smk');
    }

    public function upload_smk($id, Request $request)
    {
        $individusmk = DataSmkIndivs::find($id);
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
                $tujuan_upload = 'file/dokumen-smk/' . $individusmk->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoSmkModels::create([
                    'id_individu' => $individusmk->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan dokumen magang Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi dokumen magang. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('dokumen-smk');
        }
        return redirect()->back();
    }

    public function hapus_smk_dokumen($id, $foto)
    {
        $dokumensmk = FotoSmkModels::find($id);
        // Hapus di local storage
        File::delete('file/dokumen-smk/' . $dokumensmk->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_smk_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Dokumen berhasil dihapus');
        return redirect('dokumen-mhs');
    }

    public function profil_smk()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'Profil SMK';

            $id = Auth::user()->id;

            $data = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.id_individu')
                ->select('foto_i_d_smks.id_individu', 'foto_i_d_smks.fotoID', 'users.id', 'users.status_user', 'users.role_id', 'data_smk_indivs.nama', 'data_smk_indivs.nis', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.sekolah', 'data_smk_indivs.no_hp', 'data_smk_indivs.divisi', 'data_smk_indivs.user_id', 'data_smk_indivs.departemen')
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
            $absensmk = DB::table('users')
                ->leftJoin('data_smk_indivs', 'data_smk_indivs.user_id', '=', 'users.id')
                ->leftJoin('absensmk', 'absensmk.id_individu', '=', 'data_smk_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'mulai_dan_selesai_smk.user_id', '=', 'data_smk_indivs.user_id')
                ->where('data_smk_indivs.user_id', '=', Auth::user()->id)
                ->select('absensmk.jenis_absen','data_smk_indivs.id', 'data_smk_indivs.nama', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai')
                ->get();

            $absensmkk = DB::table('absensmk')
                ->leftJoin('data_smk_indivs', 'data_smk_indivs.id', '=', 'absensmk.id_individu')
                ->select('data_smk_indivs.nama', 'absensmk.waktu_absen', 'absensmk.id', 'absensmk.jenis_absen', 'absensmk.keterangan')
                ->where('data_smk_indivs.user_id', '=', Auth::user()->id)
                ->get();

            $ti = 'Absensi';
            return view('magang.absen-smk', [
                'ti' => $ti,
                'absensmk' => $absensmk,
                'absensmkk' => $absensmkk,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_absen_masuk_smk($individ)
    {
        if (date('H:i', strtotime(now())) > '07:30') {
            AbsenSmk::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Telat",
            ]);
            RekapAbsensmk::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Telat",
            ]);
        } elseif (date('H:i', strtotime(now())) <= '07:30') {
            AbsenSmk::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Tepat Waktu",
            ]);
            RekapAbsensmk::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Tepat Waktu",
            ]);
        }

        return redirect()->back();
    }

    public function proses_absen_pulang_smk($individ)
    {
        AbsenSmk::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Pulang",
            'keterangan' => "Tepat Waktu",
        ]);
        RekapAbsenSmk::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Pulang",
            'keterangan' => "Tepat Waktu",
        ]);

        return redirect()->back();
    }
    public function proses_absen_izin_smk($individ, Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'file_absen' => 'required|mimes:jpg,bmp,png|max:2048',
        ]);
        $file = $request->file('file_absen');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/absen';
        $file->move($tujuan_upload, $nama_file);
        AbsenSmk::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Izin",
            'keterangan' => $request->keterangan,
            'file_absen' => $nama_file
        ]);
        RekapAbsensmk::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Izin",
            'keterangan' => $request->keterangan,
            'file_absen' => $nama_file
        ]);
        return redirect()->back();
    }
    public function cetak_absensmk_pdf()
    {
        if (auth()->user()->role_id == 4) {

            $absensmk = DB::table('absensmk')
                ->leftJoin('data_smk_indivs', 'data_smk_indivs.id', '=', 'absensmk.id_individu')
                ->leftJoin('mulai_dan_selesai_smk', 'mulai_dan_selesai_smk.user_id', '=', 'data_smk_indivs.user_id')
                ->select('data_smk_indivs.nama', 'data_smk_indivs.nis', 'data_smk_indivs.jurusan', 'data_smk_indivs.sekolah', 'data_smk_indivs.divisi', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'absensmk.waktu_absen', 'absensmk.jenis_absen', 'absensmk.keterangan')
                ->where('data_smk_indivs.user_id', '=', Auth::user()->id)
                ->get();
            $i = 1;
            $ti = 'DAFTAR HADIR';
            $pdf = PDF::loadview('magang.absen-smk-pdf', [
                'ti' => $ti,
                'absensmk' =>  $absensmk,
                'i' => $i,
            ]);

            return $pdf->download('Absen SMK.pdf');
        } else {
            return redirect()->back();
        }
    }
    // public function proses_absen_smk($absenid, $individ)
    // {

    //     // AbsenIndivsTabel::create([
    //     //     'id_absen' => $idabsen,
    //     //     'id_individu' => $idindividu,
    //     //     'waktu_absen' => date('Y-m-d H:i:s', strtotime(now())),
    //     //     'status_absen' => 'Sudah Absensi'
    //     // ]);

    //     DB::table('absen_smks_tabel')
    //         ->where('id_absen', '=', $absenid)
    //         ->where('id_individu', '=', $individ)
    //         ->update([
    //             'waktu_absen' => date('Y-m-d H:i:s', strtotime(now())),
    //             'status_absen' => "Sudah Absen",
    //         ]);

    //     // $absenindividu->waktu_absen = date('Y-m-d H:i:s', strtotime(now()));
    //     // $absenindividu->status_absen = "Sudah Absen";
    //     // $absenindividu->save();

    //     return redirect()->back();
    // }
    public function surat_penerimaan_smk()
    {
        if (auth()->user()->role_id == 4) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('file_smk_indivs', 'data_smk_indivs.user_id', '=', 'file_smk_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('users.id', 'file_smk_indivs.nomorsurat', 'file_smk_indivs.jabatan', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'mulai_dan_selesai_smk.created_at', 'data_smk_indivs.nis', 'data_smk_indivs.departemen',  'data_smk_indivs.divisi',  'data_smk_indivs.nama', 'data_smk_indivs.sekolah')
                ->where('users.id', '=', $id)
                ->get();

            $mahasiswas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'mulai_dan_selesai_smk.created_at', 'data_smk_indivs.nis', 'data_smk_indivs.departemen',  'data_smk_indivs.divisi',  'data_smk_indivs.nama', 'data_smk_indivs.sekolah')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Surat Penerimaan SMK';
            return view('magang.surat-penerimaan-smk', [
                'ti' => $ti,
                'datas' => $datas,
                'mahasiswas' => $mahasiswas
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function balasan_smk_cetak()
    {
        if (auth()->user()->role_id == 4) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('file_smk_indivs', 'data_smk_indivs.user_id', '=', 'file_smk_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('users.id', 'file_smk_indivs.nomorsurat', 'file_smk_indivs.jabatan', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'mulai_dan_selesai_smk.created_at', 'data_smk_indivs.nis', 'data_smk_indivs.divisi',  'data_smk_indivs.nama', 'data_smk_indivs.sekolah')
                ->where('users.id', '=', $id)
                ->get();

            $mahasiswas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'mulai_dan_selesai_smk.created_at', 'data_smk_indivs.departemen', 'data_smk_indivs.nis',   'data_smk_indivs.divisi',  'data_smk_indivs.nama', 'data_smk_indivs.sekolah')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Surat Penerimaan SMK';
            $pdf = PDF::loadview('magang.cetak-surat-penerimaan-smk', [
                'ti' => $ti,
                'datas' => $datas,
                'mahasiswas' => $mahasiswas
            ]);

            return $pdf->download('surat-balasan-smk.pdf');
        } else {
            return redirect()->back();
        }
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
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.id_individu')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('foto_i_d_smks.id_individu', 'foto_i_d_smks.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'data_smk_indivs.nis', 'data_smk_indivs.departemen', 'users.role_id', 'data_smk_indivs.divisi', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah')
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
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.id_individu')
                ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('foto_i_d_smks.id_individu', 'foto_i_d_smks.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_smk_indivs.divisi', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.departemen', 'data_smk_indivs.nis')
                ->where('users.id', '=', $id)
                ->get();

            $pdf = PDF::loadview('magang.id-card-smk-pdf', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);

            return $pdf->download('id-card-smk.pdf');
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
            ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.id_individu')
            ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
            ->select('foto_i_d_smks.id_individu', 'foto_i_d_smks.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_smk_indivs.divisi', 'data_smk_indivs.nis', 'data_smk_indivs.departemen', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah')
            ->where('users.id', '=', $id)
            ->get();
        // $pdf = PDF::make('dompdf');
        $pdf = PDF::loadview('magang.id-card-smk-pdf-save', [
            'ti' => $ti,
            'datas' => $datas,
            'dates' => $dates
        ]);
        return $pdf->download('id-card.pdf');
    }

    public function laporan_smk(Request $request)
    {
        if (auth()->user()->role_id == 4) {
            $nama = Auth::user()->name;
            $status_user = Auth::user()->status_user;
            $users = DB::table('laporans_smk')
                ->where('laporans_smk.nama', '=', $nama)
                ->get();
            $cari = $request->cari;
            $kategori = $request->kategori;
            $user = DB::table('laporans_smk')
                ->where('judul', 'like', "%" . $cari . "%")
                ->orWhere('jurusan', 'like', "%" . $cari . "%")
                ->orWhere('divisi', 'like', "%" . $cari . "%")
                ->get();
         

            $ti = 'Laporan Akhir SMK';
            return view('magang.laporan-smk', [
                'ti' => $ti,
                'user' => $user,
                'users' => $users,
                'status_user' => $status_user,

            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_laporan_smk()
    {
        if (auth()->user()->role_id == 4) {
            $ti = 'Upload Laporan';

            $user = DB::table('data_smk_indivs')
                ->where('user_id', Auth::user()->id)
                ->first();
            return view('magang.upload-laporan-smk', [
                'ti' => $ti,
                'user' => $user,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_laporan_smk(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'path' => 'required|mimes:pdf',
            'jurusan' => 'required'
        ]);

        $file1 = $request->file('path');
        $namafile = $file1->getClientOriginalName();
        $tujuan_upload = 'file/laporan-smk/';
        $file1->move($tujuan_upload, $namafile);
        LaporanSmk::create([
            'nama' => Auth::user()->name,
            'jurusan' => $request->jurusan,
            'judul' => $request->judul,
            'divisi' => $request->divisi,
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
    public function lihat_laporan_smk_revisi($id){
        if (auth()->user()->role_id == 4) {
            $user = LaporanSmk::find($id);
            $ti = 'Liat Laporan Akhir Revisi';
            return view('magang.lihat-laporan-smk-revisi', [
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
        File::delete('file/laporan-smk/' . $lama->path);

        $file = $request->file('path');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-smk/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('laporans_smk')
            ->where('id', $id)
            ->update([
                'judul'=> $request->judul,
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
                ->select('data_smk_indivs.user_id', 'users.role_id', 'penilaians_smk.pembimbing', 'penilaians_smk.nilai_huruf', 'penilaians_smk.average', 'penilaians_smk.kerjasama', 'penilaians_smk.InisiatifTanggungJawabKerja', 'penilaians_smk.Loyalitas', 'penilaians_smk.MotivasiPercayaDiri', 'penilaians_smk.EtikaSopanSantun', 'penilaians_smk.KesehatanKeselamatanKerja', 'penilaians_smk.disiplin', 'penilaians_smk.PemahamanKemampuan', 'penilaians_smk.laporankerja', 'penilaians_smk.kehadiran', 'penilaians_smk.keterangan', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'data_smk_indivs.departemen', 'users.id', 'users.role_id', 'data_smk_indivs.created_at', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.nis')
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
                ->leftJoin('rekapsmk', 'rekapsmk.nama', '=', 'data_smk_indivs.nama')
                ->select('rekapsmk.id as id_rekap', 'data_smk_indivs.id', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.no_hp', 'data_smk_indivs.nis')
                ->where('data_smk_indivs.user_id', $id)
                ->where('rekapsmk.user_id', $id)
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

        $smk = DataSmkIndivs::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'sekolah' => $request->sekolah,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
        ]);

        Rekapsmk::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'sekolah' => $request->sekolah,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
            'status_user' => Auth::user()->status_user,
        ]);

        PenilaianSmk::create([
            'user_id' => $smk->id,
            'pembimbing' => null,
            'Kerjasama' => 0,
            'MotivasiPercayaDiri' => 0,
            'InisiatifTanggungJawabKerja' => 0,
            'Loyalitas' => 0,
            'EtikaSopanSantun' => 0,
            'Disiplin' => 0,
            'PemahamanKemampuan' => 0,
            'KesehatanKeselamatanKerja' => 0,
            'Laporankerja' => 0,
            'kehadiran' => 0,
            'average' => 0,
            'nilai_huruf' => null,
            'status_penilaian' => null,
            'keterangan' => null,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan data anggota kelompok anda, selanjutnya mohon klik upload file calon magang');
        return redirect('/data-smk-kelompok');
    }

    public function edit_data_smk_kelompok($id)
    {
        if (auth()->user()->role_id == 7) {

            $ti = 'Data SMK';
            $data = DB::table('data_smk_indivs')
                ->leftJoin('rekapsmk', 'rekapsmk.nama', '=', 'data_smk_indivs.nama')
                ->select('rekapsmk.id as id_rekap', 'data_smk_indivs.id', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.no_hp', 'data_smk_indivs.nis')
                ->where('data_smk_indivs.id', $id)
                ->first();

            return view('magang.edit-data-smk-kelompok', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_smk_kelompok(Request $request, $id, $id_rekap)
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
        DB::table('rekapsmk')
            ->where('id', $id_rekap)
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

    public function proses_hapus_smk_kelompok($id, $id_rekap)
    {
        DB::table('data_smk_indivs')
            ->where('id', $id)
            ->delete();

        DB::table('rekapsmk')
            ->where('id', $id_rekap)
            ->delete();

        DB::table('penilaians_smk')
            ->where('user_id', $id)
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
            'mulai' => 'required',
            'selesai' => 'required',
            'berkas' => 'required',
            'berkas.*' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/fileMhs
                $tujuan_upload = 'file/berkas-smk-kel/' . Auth::user()->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

                FileSmkIndivs::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size,
                    'nomorsurat' => $request->nomorsurat,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan
                ]);

                $id = Auth::user()->id;
                $exist = DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->first();
                if ($exist) {
                    DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekapsmk')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                } else {
                    DB::table('mulai_dan_selesai_smk')->insert([
                        'user_id' => $id,
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekapsmk')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                }
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
        $smk = FileSmkIndivs::find($id);
        // Hapus di local storage
        File::delete('file/berkas-smk-kel/' . $smk->user_id . '/' . $path);
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
            $ti = 'Upload Hasil Tes';
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
        $interviewsmk = DataSmkIndivs::find($id);
        $request->validate([

            'fileinterview' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('fileinterview');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/interview-smk-kel/' . $interviewsmk->id;
        $file->move($tujuan_upload, $nama_file);

        DB::table('interview_smk')->insert([
            'id_individu' => $interviewsmk->id,
            'fileinterview' => $nama_file,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan berkas interview Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi berkas interview. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
        return redirect('/interview-smk');
    }

    public function show_smk_kel_foto($id)
    {
        $user = DataSmkIndivs::find($id);

        if (auth()->user()->role_id == 12) {
            $ti = 'Dokumen SMK';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_smk_models')
                ->where('id_individu', '=', $id)
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
                ->where('id_individu', '=', $id)
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
        $individusmk = DataSmkIndivs::find($id);
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
                $tujuan_upload = 'file/foto-smk-kel/' . $individusmk->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDSmks::create([
                    'id_individu' => $individusmk->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan foto anda, selanjutnya mohon klik berkas lainnya');
            return redirect('dokumen-smk');
        }
        return redirect()->back();
    }

    public function upload_smk_kel($id, Request $request)
    {
        $individusmk = DataSmkIndivs::find($id);
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
                $tujuan_upload = 'file/dokumen-smk-kel/' . $individusmk->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoSmkModels::create([
                    'id_individu' => $individusmk->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan Dokumen Magang Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi Dokumen Magang. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('dokumen-smk');
        }
        return redirect()->back();
    }

    public function hapus_smk_kel_foto($id, $foto)
    {
        $foto3x4 = FotoIDSmks::find($id);
        // Hapus di local storage
        File::delete('file/foto-smk-kel/' . $foto3x4->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_smks')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Foto berhasil dihapus');
        return redirect('dokumen-smk');
    }

    public function hapus_smk_kel_dokumen($id, $foto)
    {
        $dokumensmk = FotoSmkModels::find($id);
        // Hapus di local storage
        File::delete('file/dokumen-smk-kel/' . $dokumensmk->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_smk_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Dokumen berhasil dihapus');
        return redirect('dokumen-smk');
    }

    // Kelompok SMK

    // public function Kuota()
    // {
    //     $ti = 'Kuota Magang';
    //     $users = DB::table('kuota')->get();
    //     return view('magang.Kuota', [
    //         'ti' => $ti,
    //         'users' => $users
    //     ]);
    // }



    // public function liat_file_smk_kel($id)
    // {
    //     if (auth()->user()->role_id == 7) {
    //         $ti = 'Data SMK';

    //         $files = FileSmkIndivs::find($id);

    //         return view('magang.open-pdf-smk-kel', [
    //             'ti' => $ti,
    //             'files' => $files
    //         ]);
    //     } else {
    //         return redirect()->back();
    //     }
    // }

    // public function OpenPDF()
    // {
    //     if (auth()->user()->role_id == 8) {
    //         $ti = 'Data Mahasiswa';
    //         $id = Auth::user()->id;
    //         $files = DB::table('file_mhs_indivs')
    //             ->where('user_id', '=', $id)
    //             ->get();

    //         return view('magang.openpdf', [
    //             'ti' => $ti,
    //             'files' => $files
    //         ]);
    //     } else {
    //         return redirect()->back();
    //     }
    // }



    // public function OpenPDFSMKKel()
    // {
    //     if (auth()->user()->role_id == 7) {
    //         $ti = 'Data Siswa';
    //         $id = Auth::user()->id;
    //         $files = DB::table('file_smk_indivs')
    //             ->where('user_id', '=', $id)
    //             ->get();

    //         return view('magang.openpdf', [
    //             'ti' => $ti,
    //             'files' => $files
    //         ]);
    //     } else {
    //         return redirect()->back();
    //     }
    // }





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
        if (auth()->user()->role_id == 14) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'data_mhs_indivs.user_id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('penilaians.nilai_huruf', 'penilaians.keterangan', 'penilaians.laporankerja', 'penilaians.kehadiran', 'penilaians.keterangan', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifTanggungJawabKerja', 'penilaians.Loyalitas', 'penilaians.MotivasiPercayaDiri', 'penilaians.EtikaSopanSantun', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin',  'penilaians.PemahamanKemampuan', 'users.name', 'users.id', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();

            // $users = DB::table('users')
            //     ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
            //     ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.user_id')
            //     ->leftJoin('mulai_dan_selesai_mhs', 'data_mhs_indivs.user_id', '=', 'mulai_dan_selesai_mhs.user_id')
            //     ->select('data_mhs_indivs.user_id', 'users.role_id',  'penilaians.laporankerja', 'penilaians.kehadiran', 'penilaians.keterangan', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifTanggungJawabKerja', 'penilaians.Loyalitas', 'penilaians.MotivasiPercayaDiri', 'penilaians.EtikaSopanSantun', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin',  'penilaians.PemahamanKemampuan', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'data_mhs_indivs.departemen', 'users.id', 'users.role_id', 'data_mhs_indivs.created_at', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim')
            //     ->where('data_mhs_indivs.user_id', '=', $id)
            //     ->get();
            $ti = 'Sertifikat Mahasiswa';
            $pdf = PDF::loadview('magang.sertifikat_mhs_pdf', [
                'ti' => $ti,
                'datas' => $datas,
                // 'users' => $users
            ])->setPaper('a4', 'landscape');

            return $pdf->download('sertifikat Mahasiswa.pdf');
        } else {
            return redirect()->back();
        }
    }

    public function sertifikat_mhs()
    {
        if (auth()->user()->role_id == 14) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'data_mhs_indivs.user_id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('penilaians.nilai_huruf', 'penilaians.keterangan', 'penilaians.laporankerja', 'penilaians.kehadiran', 'penilaians.keterangan', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifTanggungJawabKerja', 'penilaians.Loyalitas', 'penilaians.MotivasiPercayaDiri', 'penilaians.EtikaSopanSantun', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin',  'penilaians.PemahamanKemampuan', 'users.name', 'users.id', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            // $users = DB::table('users')
            //     ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
            //     ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.user_id')
            //     ->leftJoin('mulai_dan_selesai_mhs', 'data_mhs_indivs.user_id', '=', 'mulai_dan_selesai_mhs.user_id')
            //     ->select('data_mhs_indivs.user_id', 'users.role_id',  'penilaians.laporankerja', 'penilaians.kehadiran', 'penilaians.keterangan', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifTanggungJawabKerja', 'penilaians.Loyalitas', 'penilaians.MotivasiPercayaDiri', 'penilaians.EtikaSopanSantun', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin',  'penilaians.PemahamanKemampuan', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'data_mhs_indivs.departemen', 'users.id', 'users.role_id', 'data_mhs_indivs.created_at', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim')
            //     ->where('data_mhs_indivs.user_id', '=', $id)
            //     ->get();
            $ti = 'Sertifikat Mahasiswa';
            return view('magang.sertifikat_mhs', [
                'ti' => $ti,
                'datas' => $datas,
                // 'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function surat_keterangan_mhs()
    {
        if (auth()->user()->role_id == 14) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'data_mhs_indivs.user_id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('penilaians.nilai_huruf', 'penilaians.keterangan', 'penilaians.laporankerja', 'penilaians.kehadiran', 'penilaians.keterangan', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifTanggungJawabKerja', 'penilaians.Loyalitas', 'penilaians.MotivasiPercayaDiri', 'penilaians.EtikaSopanSantun', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin',  'penilaians.PemahamanKemampuan', 'users.name', 'users.id', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.jurusan')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            $ti = 'Surat Keterangan Mahasiswa';
            return view('magang.surat-keterangan-mhs', [
                'ti' => $ti,
                'datas' => $datas,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function surat_keterangan_mhs_pdf()
    {
        if (auth()->user()->role_id == 14) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'data_mhs_indivs.id', '=', 'penilaians.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'data_mhs_indivs.user_id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('penilaians.nilai_huruf', 'penilaians.keterangan', 'penilaians.laporankerja', 'penilaians.kehadiran', 'penilaians.keterangan', 'penilaians.pembimbing', 'penilaians.nilai_huruf', 'penilaians.average', 'penilaians.kerjasama', 'penilaians.InisiatifTanggungJawabKerja', 'penilaians.Loyalitas', 'penilaians.MotivasiPercayaDiri', 'penilaians.EtikaSopanSantun', 'penilaians.KesehatanKeselamatanKerja', 'penilaians.disiplin',  'penilaians.PemahamanKemampuan', 'users.name', 'users.id', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.strata', 'data_mhs_indivs.departemen', 'users.role_id', 'data_mhs_indivs.divisi', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.jurusan')
                ->where('data_mhs_indivs.user_id', '=', $id)
                ->get();
            $ti = 'Surat Keterangan Mahasiswa';
            $pdf = PDF::loadview('magang.surat-keterangan-mhs-pdf', [
                'ti' => $ti,
                'datas' => $datas,
            ])->setPaper('a4', 'portrait');

            return $pdf->download('Surat Keterangan Mahasiswa.pdf');
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
                ->leftJoin('rekapsmk', 'rekapsmk.nama', '=', 'data_smk_indivs.nama')
                ->select('rekapsmk.id as id_rekap', 'data_smk_indivs.id', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.no_hp', 'data_smk_indivs.nis')
                ->where('data_smk_indivs.id', $id)
                ->first();

            return view('magang.edit-data-smk', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_smk(Request $request, $id, $id_rekap)
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
        DB::table('rekapsmk')
            ->where('id', $id_rekap)
            ->update([
                'sekolah' => $request->sekolah,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'nis' => $request->nis,
                'jurusan' => $request->jurusan,
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
            'mulai' => 'required',
            'selesai' => 'required',
            'berkas' => 'required',
            'berkas.*' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('berkas')) {

            $files = $request->file('berkas');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $NamaFile = $file->getClientOriginalName();
                // Upload ke public/file/berkas-smk/
                $tujuan_upload = 'file/berkas-smk/' . Auth::user()->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

                FileSmkIndivs::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size,
                    'nomorsurat' => $request->nomorsurat,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan
                ]);

                $id = Auth::user()->id;
                $exist = DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->first();
                if ($exist) {
                    DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekapsmk')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                } else {
                    DB::table('mulai_dan_selesai_smk')->insert([
                        'user_id' => $id,
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekapsmk')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                }
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan file magang dan mengisi data anda. Selanjutnya akan kami proses telebih dahulu, mohon tunggu selama 5 hari kerja. Kalian akan dipindahkan ke halaman selanjutnya secara otomatis jika terkonfirmasi lolos. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('/data-smk');
        }
        return redirect()->back();
    }

    public function proses_hapus_berkas_smk($id, $path)
    {
        $smk = FileSmkIndivs::find($id);
        // Hapus di file storage
        File::delete('file/berkas-smk/' . $smk->user_id . '/' . $path);
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
                ->leftjoin('interview_smk', 'data_smk_indivs.id', '=', 'interview_smk.id_individu')
                ->leftJoin('users', 'data_smk_indivs.user_id', '=', 'users.id')
                ->select('users.status_user', 'data_smk_indivs.nama', 'data_smk_indivs.id', 'data_smk_indivs.nis', 'data_smk_indivs.sekolah', 'interview_smk.fileinterview')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();
            $ti = 'Tes Kepribadian SMK';
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
            $ti = 'Upload Hasil Tes Kepribadian';
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
        $individusmk = DataSmkIndivs::find($id);
        $request->validate([
            'fileinterview' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('fileinterview');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/interview-smk/' . $individusmk->id;
        $file->move($tujuan_upload, $nama_file);

        DB::table('interview_smk')->insert([
            'id_individu' => $individusmk->id,
            'fileinterview' => $nama_file,
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan berkas interview. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi berkas interview. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728).');
        return redirect('/interview-smk');
    }

    public function upFotoSmk(Request $request)
    {
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
                $tujuan_upload = 'file';
                $file->move($tujuan_upload, $Namafoto);

                FotoIDSmks::create([
                    'user_id' => Auth::user()->id,
                    'fotoID' => $Namafoto,
                ]);
            }

            session()->flash('succes', 'Upload foto berhasil');
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

        session()->flash('succes', 'File berhasil dihapus');
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
            'foto.*' => 'mimes:jpeg,jpg,png,pdf|max:2048'
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
            session()->flash('succes', 'Upload foto berhasil');
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

        session()->flash('succes', 'File berhasil dihapus');
        return redirect('/Dokumen_smk');
    }



    public function sertifikat_smk()
    {
        if (auth()->user()->role_id == 15) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('penilaians_smk', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'data_smk_indivs.user_id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('penilaians_smk.nilai_huruf', 'penilaians_smk.laporankerja', 'penilaians_smk.kehadiran', 'penilaians_smk.keterangan', 'penilaians_smk.pembimbing', 'penilaians_smk.nilai_huruf', 'penilaians_smk.average', 'penilaians_smk.kerjasama', 'penilaians_smk.InisiatifTanggungJawabKerja', 'penilaians_smk.Loyalitas', 'penilaians_smk.MotivasiPercayaDiri', 'penilaians_smk.EtikaSopanSantun', 'penilaians_smk.KesehatanKeselamatanKerja', 'penilaians_smk.disiplin',  'penilaians_smk.PemahamanKemampuan', 'penilaians_smk.keterangan', 'users.name', 'users.id', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'mulai_dan_selesai_smk.created_at', 'data_smk_indivs.nis',  'data_smk_indivs.departemen', 'data_smk_indivs.divisi', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();

            // $users = DB::table('users')
            //     ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
            //     ->leftJoin('penilaians_smk', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
            //     ->leftJoin('mulai_dan_selesai_smk', 'data_smk_indivs.user_id', '=', 'mulai_dan_selesai_smk.user_id')
            //     ->select('data_smk_indivs.user_id', 'users.role_id',  'penilaians_smk.laporankerja', 'penilaians_smk.kehadiran', 'penilaians_smk.keterangan', 'penilaians_smk.pembimbing', 'penilaians_smk.nilai_huruf', 'penilaians_smk.average', 'penilaians_smk.kerjasama', 'penilaians_smk.InisiatifTanggungJawabKerja', 'penilaians_smk.Loyalitas', 'penilaians_smk.MotivasiPercayaDiri', 'penilaians_smk.EtikaSopanSantun', 'penilaians_smk.KesehatanKeselamatanKerja', 'penilaians_smk.disiplin',  'penilaians_smk.PemahamanKemampuan', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'data_smk_indivs.departemen', 'users.id', 'users.role_id', 'data_smk_indivs.created_at', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.nis')
            //     ->where('data_smk_indivs.user_id', '=', $id)
            //     ->get();
            $ti = 'Sertifikat SMK';
            return view('magang.sertifikat_smk', [
                'ti' => $ti,
                'datas' => $datas,
                // 'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function sertif_smk_pdf()
    {
        if (auth()->user()->role_id == 15) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('penilaians_smk', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'data_smk_indivs.user_id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('penilaians_smk.nilai_huruf', 'penilaians_smk.laporankerja', 'penilaians_smk.kehadiran', 'penilaians_smk.keterangan', 'penilaians_smk.pembimbing', 'penilaians_smk.nilai_huruf', 'penilaians_smk.average', 'penilaians_smk.kerjasama', 'penilaians_smk.InisiatifTanggungJawabKerja', 'penilaians_smk.Loyalitas', 'penilaians_smk.MotivasiPercayaDiri', 'penilaians_smk.EtikaSopanSantun', 'penilaians_smk.KesehatanKeselamatanKerja', 'penilaians_smk.disiplin',  'penilaians_smk.PemahamanKemampuan', 'penilaians_smk.keterangan', 'users.name', 'users.id', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'mulai_dan_selesai_smk.created_at', 'data_smk_indivs.nis',  'data_smk_indivs.departemen', 'data_smk_indivs.divisi', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();


            // $users = DB::table('users')
            //     ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
            //     ->leftJoin('penilaians_smk', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
            //     ->leftJoin('mulai_dan_selesai_smk', 'data_smk_indivs.user_id', '=', 'mulai_dan_selesai_smk.user_id')
            //     ->select('data_smk_indivs.user_id', 'users.role_id',  'penilaians_smk.laporankerja', 'penilaians_smk.kehadiran', 'penilaians_smk.keterangan', 'penilaians_smk.pembimbing', 'penilaians_smk.nilai_huruf', 'penilaians_smk.average', 'penilaians_smk.kerjasama', 'penilaians_smk.InisiatifTanggungJawabKerja', 'penilaians_smk.Loyalitas', 'penilaians_smk.MotivasiPercayaDiri', 'penilaians_smk.EtikaSopanSantun', 'penilaians_smk.KesehatanKeselamatanKerja', 'penilaians_smk.disiplin',  'penilaians_smk.PemahamanKemampuan', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'data_smk_indivs.departemen', 'users.id', 'users.role_id', 'data_smk_indivs.created_at', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.nis')
            //     ->where('data_smk_indivs.user_id', '=', $id)
            //     ->get();
            $ti = 'Sertifikat SMK';
            $pdf = PDF::loadview('magang.sertifikat_smk_pdf', [
                'ti' => $ti,
                'datas' => $datas,
                // 'users' => $users
            ])->setPaper('a4', 'landscape');

            return $pdf->download('sertifikat SMK.pdf');
        } else {
            return redirect()->back();
        }
    }

    public function surat_keterangan_smk()
    {
        if (auth()->user()->role_id == 15) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('penilaians_smk', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'data_smk_indivs.user_id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('penilaians_smk.nilai_huruf', 'penilaians_smk.laporankerja', 'penilaians_smk.kehadiran', 'penilaians_smk.keterangan', 'penilaians_smk.pembimbing', 'penilaians_smk.nilai_huruf', 'penilaians_smk.average', 'penilaians_smk.kerjasama', 'penilaians_smk.InisiatifTanggungJawabKerja', 'penilaians_smk.Loyalitas', 'penilaians_smk.MotivasiPercayaDiri', 'penilaians_smk.EtikaSopanSantun', 'penilaians_smk.KesehatanKeselamatanKerja', 'penilaians_smk.disiplin',  'penilaians_smk.PemahamanKemampuan', 'penilaians_smk.keterangan', 'users.name', 'users.id', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'mulai_dan_selesai_smk.created_at', 'data_smk_indivs.nis',  'data_smk_indivs.departemen', 'data_smk_indivs.divisi', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();

            $ti = 'Surat Keterangan SMK';
            return view('magang.surat-keterangan-smk', [
                'ti' => $ti,
                'datas' => $datas,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function surat_keterangan_smk_pdf()
    {
        if (auth()->user()->role_id == 15) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('penilaians_smk', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
                ->leftJoin('mulai_dan_selesai_smk', 'data_smk_indivs.user_id', '=', 'mulai_dan_selesai_smk.user_id')
                ->select('penilaians_smk.nilai_huruf', 'penilaians_smk.laporankerja', 'penilaians_smk.kehadiran', 'penilaians_smk.keterangan', 'penilaians_smk.pembimbing', 'penilaians_smk.nilai_huruf', 'penilaians_smk.average', 'penilaians_smk.kerjasama', 'penilaians_smk.InisiatifTanggungJawabKerja', 'penilaians_smk.Loyalitas', 'penilaians_smk.MotivasiPercayaDiri', 'penilaians_smk.EtikaSopanSantun', 'penilaians_smk.KesehatanKeselamatanKerja', 'penilaians_smk.disiplin',  'penilaians_smk.PemahamanKemampuan', 'penilaians_smk.keterangan', 'users.name', 'users.id', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai', 'mulai_dan_selesai_smk.created_at', 'data_smk_indivs.nis',  'data_smk_indivs.departemen', 'data_smk_indivs.divisi', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan')
                ->where('data_smk_indivs.user_id', '=', $id)
                ->get();

            $ti = 'Surat Keterangan SMK';
            $pdf = PDF::loadview('magang.surat-keterangan-smk-pdf', [
                'ti' => $ti,
                'datas' => $datas,
            ])->setPaper('a4', 'portrait');

            return $pdf->download('Surat Keterangan SMK.pdf');
        } else {
            return redirect()->back();
        }
    }
    // Menu Magang SMK ===================

    public function surat_penerimaan_mhs()
    {
        if (auth()->user()->role_id == 3) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('file_mhs_indivs', 'data_mhs_indivs.user_id', '=', 'file_mhs_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('users.id', 'file_mhs_indivs.nomorsurat', 'file_mhs_indivs.jabatan', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.departemen', 'data_mhs_indivs.jurusan',  'data_mhs_indivs.divisi',  'data_mhs_indivs.nama', 'data_mhs_indivs.univ')
                ->where('users.id', '=', $id)
                ->get();

            $mahasiswas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.departemen', 'data_mhs_indivs.jurusan',  'data_mhs_indivs.divisi',  'data_mhs_indivs.nama', 'data_mhs_indivs.univ')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Surat Penerimaan Mahasiswa';
            return view('magang.surat-penerimaan-mhs', [
                'ti' => $ti,
                'datas' => $datas,
                'mahasiswas' => $mahasiswas
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function balasan_mhs_cetak()
    {
        if (auth()->user()->role_id == 3) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('file_mhs_indivs', 'data_mhs_indivs.user_id', '=', 'file_mhs_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('users.id', 'file_mhs_indivs.nomorsurat', 'file_mhs_indivs.jabatan', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan',  'data_mhs_indivs.divisi',  'data_mhs_indivs.nama', 'data_mhs_indivs.univ')
                ->where('users.id', '=', $id)
                ->get();

            $mahasiswas = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai', 'mulai_dan_selesai_mhs.created_at', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan',  'data_mhs_indivs.divisi',  'data_mhs_indivs.nama', 'data_mhs_indivs.univ')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Surat Penerimaan Mahasiswa';
            $pdf = PDF::loadview('magang.cetak-surat-penerimaan-mhs', [
                'ti' => $ti,
                'datas' => $datas,
                'mahasiswas' => $mahasiswas
            ]);

            return $pdf->download('surat-balasan-mhs.pdf');
        } else {
            return redirect()->back();
        }
    }
    public function kuotapenuh()
    {
        $ti = 'Kuota Penuh';
        return view('magang.kuotapenuh', ['ti' => $ti]);
    }
    public function selesai_mhs()
    {
        $ti = 'Selesai';
        return view('magang.selesai', ['ti' => $ti]);
    }
}
