<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\DataPenelitian;
use App\Models\FilePenelitian;
use App\Models\FotoPenelitianModels;
use App\Models\FotoIDPenelitian;
use App\Models\AbsenPenelitian;
use App\Models\LaporanPenelitian;
use App\Models\RekapAbsenpenelitian;
use App\Models\Rekappenelitian;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PenelitianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function data_penelitian()
    {
        if (auth()->user()->role_id == 21) {
            $id = Auth::user()->id;
            $data = DB::table('data_penelitian')->where('user_id', '=', $id)->get();
            $files = DB::table('file_penelitian')->where('user_id', '=', $id)->get();

            $ti = 'Data Penelitian';
            return view('penelitian.data-penelitian', [
                'ti' => $ti,
                'data' => $data,
                'files' => $files
            ]);
        } else {
        }
    }

    public function input_data_penelitian()
    {
        if (auth()->user()->role_id == 21) {
            $ti = 'Tambah Data Penelitian';

            return view(
                'penelitian.tambah_data_penelitian',
                [
                    'ti' => $ti,

                ]
            );
        } else {
        }
    }

    public function proses_data_penelitian(Request $request)
    {
        $request->validate([
            'judul_penelitian' => 'required',
            'asal_instansi' => 'required',
            'alamat_rumah' => 'required',
            'no_hp' => 'required|max:14',
        ]);

        DataPenelitian::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'jurusan' => $request->jurusan,
            'strata' => $request->strata,
            'judul_penelitian' => $request->judul_penelitian,
            'asal_instansi' => $request->asal_instansi,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
        ]);

        Rekappenelitian::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'jurusan' => $request->jurusan,
            'strata' => $request->strata,
            'judul_penelitian' => $request->judul_penelitian,
            'asal_instansi' => $request->asal_instansi,
            'alamat_rumah' => $request->alamat_rumah,
            'no_hp' => $request->no_hp,
            'status_user' => Auth::user()->status_user,
        ]);

        session()->flash('succes', 'Terima kasih telah mengirimkan data Anda. Selanjutnya kirim berkas praktikan proposal, surat pengantar dan CV.');
        return redirect('/data-penelitian');
    }

    public function berkas_penelitian()
    {
        if (auth()->user()->role_id == 21) {
            $ti = 'Tambah Berkas Penelitian';

            return view(
                'penelitian.berkas_penelitian',
                [
                    'ti' => $ti,
                ]
            );
        } else {
        }
    }

    public function proses_berkas_penelitian(Request $request)
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
                $tujuan_upload = 'file/berkas-penelitian/' . Auth::user()->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $NamaFile);

                FilePenelitian::create([
                    'user_id' => Auth::user()->id,
                    'path' => $NamaFile,
                    'size' => $size,
                    'nomorsurat' => $request->nomorsurat,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan
                ]);

                $id = Auth::user()->id;
                $exist = DB::table('mulai_dan_selesai_penelitian')->where('user_id', $id)->first();
                if ($exist) {
                    DB::table('mulai_dan_selesai_penelitian')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekappenelitian')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                } else {
                    DB::table('mulai_dan_selesai_penelitian')->insert([
                        'user_id' => $id,
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                    DB::table('rekappenelitian')->where('user_id', $id)->update([
                        'mulai' => $request->mulai,
                        'selesai' => $request->selesai
                    ]);
                }
            }

            session()->flash('succes', 'Terimakasih telah mengirimkan berkas Penelitian Anda. Selanjutnya akan kami proses terlebih dahulu, Mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi data magang. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('/data-penelitian');
        }
        return redirect()->back();
    }

    public function edit_data_penelitian($id)
    {
        if (auth()->user()->role_id == 21) {
            $ti = 'Data Penelitian';
            $data = DB::table('data_penelitian')
                ->leftJoin('rekappenelitian', 'rekappenelitian.nama', '=', 'data_penelitian.nama')
                ->select('rekappenelitian.id as id_rekap', 'data_penelitian.id', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'data_penelitian.judul_penelitian', 'data_penelitian.strata', 'data_penelitian.jurusan', 'data_penelitian.alamat_rumah', 'data_penelitian.no_hp')
                ->where('data_penelitian.id', $id)
                ->first();

            return view('penelitian.edit-data-penelitian', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_data_penelitian($id, $id_rekap, Request $request)
    {
        DB::table('data_penelitian')
            ->where('id', $id)
            ->update([
                'asal_instansi' => $request->asal_instansi,
                'strata' => $request->strata,
                'jurusan' => $request->jurusan,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'judul_penelitian' => $request->judul_penelitian
            ]);
        DB::table('rekappenelitian')
            ->where('id', $id_rekap)
            ->update([
                'asal_instansi' => $request->asal_instansi,
                'strata' => $request->strata,
                'jurusan' => $request->jurusan,
                'alamat_rumah' => $request->alamat_rumah,
                'no_hp' => $request->no_hp,
                'judul_penelitian' => $request->judul_penelitian
            ]);

        session()->flash('succes', 'Terima kasih telah mengirimkan data Anda. Selanjutnya kirim berkas praktikan proposal,surat pengantar,dan CV.');
        return redirect('/data-penelitian');
    }

    public function berkas_penelitian_semua()
    {
        if (auth()->user()->role_id == 21) {
            $ti = 'Data Penelitian';
            $id = Auth::user()->id;
            $files = DB::table('file_penelitian')
                ->where('user_id', '=', $id)
                ->get();

            return view('penelitian.berkas-penelitian-semua', [
                'ti' => $ti,
                'files' => $files
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_hapus_berkas_penelitian($id, $path)
    {
        $mhs = FilePenelitian::find($id);
        // Hapus di local storage
        File::delete('file/berkas-penelitian/' . $mhs->user_id . '/' . $path);
        // Hapus di database
        DB::table('file_penelitian')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Berkas berhasil dihapus');
        return redirect('data-penelitian');
    }

    public function dokumen_penelitian()
    {
        if (auth()->user()->role_id == 22) {
            $ti = 'Dokumen Penelitian';

            $id = Auth::user()->id;
            $users = DB::table('data_penelitian')
                ->leftJoin('users', 'data_penelitian.user_id', '=', 'users.id')
                ->select('data_penelitian.id', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'data_penelitian.jurusan', 'users.status_user')
                ->where('user_id', '=', $id)
                ->get();

            $showImage = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'foto_i_d_penelitian.user_id', '=', 'data_penelitian.user_id')
                ->select('foto_i_d_penelitian.user_id', 'foto_i_d_penelitian.fotoID', 'foto_i_d_penelitian.id', 'data_penelitian.nama')
                ->where('data_penelitian.user_id', '=', $id)
                ->get();

            $showImage1 = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_penelitian_models', 'foto_penelitian_models.user_id', '=', 'data_penelitian.user_id')
                ->select('foto_penelitian_models.user_id AS berkas_user', 'foto_penelitian_models.foto', 'foto_penelitian_models.id', 'data_penelitian.nama')
                ->where('data_penelitian.user_id', '=', $id)
                ->get();
            return view(
                'penelitian.dokumen_penelitian',
                [
                    'ti' => $ti,
                    'showImage' => $showImage,
                    'showImage1' => $showImage1,
                    'users' => $users
                ]
            );
        } else {
            return redirect()->back();
        }
    }

    public function dokumen_penelitian_upload_foto($id)
    {
        $user = DataPenelitian::find($id);

        if (auth()->user()->role_id == 22) {
            $ti = 'Dokumen Penelitian';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_penelitian_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('penelitian.dokumen-penelitian-upload-foto', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function dokumen_penelitian_upload($id)
    {
        $user = DataPenelitian::find($id);

        if (auth()->user()->role_id == 22) {
            $ti = 'Dokumen Penelitian';

            $id = Auth::user()->id;
            $showImage = DB::table('foto_penelitian_models')
                ->where('user_id', '=', $id)
                ->get();

            return view('penelitian.dokumen_penelitian_upload', [
                'ti' => $ti,
                'showImage' => $showImage,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_penelitian_foto($id, Request $request)
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
                $tujuan_upload = 'file/foto-penelitian/' . Auth::user()->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoIDPenelitian::create([
                    'user_id' => Auth::user()->id,
                    'fotoID' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan foto anda, selanjutnya mohon klik Berkas Lainnya');
            return redirect('dokumen-penelitian');
        }
        return redirect()->back();
    }

    public function upload_penelitian($id, Request $request)
    {
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
                $tujuan_upload = 'file/dokumen-penelitian/' . Auth::user()->id;
                $size = $file->getSize();
                $file->move($tujuan_upload, $Namafoto);
                FotoPenelitianModels::create([
                    'user_id' => Auth::user()->id,
                    'foto' => $Namafoto,
                ]);
            }
            session()->flash('succes', 'Terimakasih telah mengirimkan dokumen penelitian Anda. Selanjutnya akan kami proses terlebih dahulu, mohon tunggu selama 5 hari kerja. Anda akan dipindahkan ke halaman selanjutnya secara otomatis apabila telah lolos verifikasi dokumen penelitian. Jika dalam 5 hari kerja belum di proses mohon konfirmasi kepada Admin divisi HCM Pak Iwan (088226199728)');
            return redirect('dokumen-penelitian');
        }
        return redirect()->back();
    }

    public function hapus_penelitian_foto($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/foto-penelitian/' . Auth::user()->id . '/' . $foto);
        // Hapus di database
        DB::table('foto_i_d_penelitian')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Foto berhasil dihapus');
        return redirect('dokumen-penelitian');
    }

    public function hapus_penelitian_dokumenlain($id, $foto)
    {
        // Hapus di local storage
        File::delete('file/dokumen-penelitian/' . Auth::user()->id . '/' . $foto);
        // Hapus di database
        DB::table('foto_penelitian_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Dokumen berhasil dihapus');
        return redirect('dokumen-penelitian');
    }

    public function profil_penelitian()
    {
        if (auth()->user()->role_id == 23) {
            $ti = 'Profil Penelitian';
            $id = Auth::user()->id;

            $data = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.user_id', '=', 'foto_i_d_penelitian.user_id')
                ->select('foto_i_d_penelitian.fotoID', 'foto_i_d_penelitian.user_id', 'users.status_user', 'users.role_id', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'data_penelitian.strata', 'data_penelitian.jurusan', 'data_penelitian.alamat_rumah', 'data_penelitian.judul_penelitian', 'data_penelitian.no_hp', 'data_penelitian.divisi', 'data_penelitian.user_id', 'data_penelitian.departemen')
                ->where('data_penelitian.user_id', '=', $id)
                ->get();
            return view('penelitian.profil-penelitian', [
                'ti' => $ti,
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function surat_penerimaan_penelitian()
    {
        if (auth()->user()->role_id == 23) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('file_penelitian', 'data_penelitian.user_id', '=', 'file_penelitian.user_id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
                ->select('users.id', 'file_penelitian.nomorsurat', 'file_penelitian.jabatan', 'mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai', 'mulai_dan_selesai_penelitian.created_at', 'data_penelitian.departemen', 'data_penelitian.jurusan',  'data_penelitian.divisi',  'data_penelitian.nama', 'data_penelitian.asal_instansi')
                ->where('users.id', '=', $id)
                ->get();

            $mahasiswas = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
                ->select('mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai', 'mulai_dan_selesai_penelitian.created_at',  'data_penelitian.departemen', 'data_penelitian.judul_penelitian', 'data_penelitian.jurusan',  'data_penelitian.divisi',  'data_penelitian.nama', 'data_penelitian.asal_instansi')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Surat Penerimaan Penelitian';
            return view('penelitian.surat-penerimaan-penelitian', [
                'ti' => $ti,
                'datas' => $datas,
                'mahasiswas' => $mahasiswas
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function balasan_penelitian_cetak()
    {
        if (auth()->user()->role_id == 23) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('file_penelitian', 'data_penelitian.user_id', '=', 'file_penelitian.user_id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
                ->select('users.id', 'file_penelitian.nomorsurat', 'file_penelitian.jabatan', 'mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai', 'mulai_dan_selesai_penelitian.created_at', 'data_penelitian.departemen', 'data_penelitian.jurusan',  'data_penelitian.divisi',  'data_penelitian.nama', 'data_penelitian.asal_instansi')
                ->where('users.id', '=', $id)
                ->get();

            $mahasiswas = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
                ->select('mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai', 'mulai_dan_selesai_penelitian.created_at',  'data_penelitian.departemen', 'data_penelitian.judul_penelitian', 'data_penelitian.jurusan',  'data_penelitian.divisi',  'data_penelitian.nama', 'data_penelitian.asal_instansi')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Surat Penerimaan Penelitian';
            $pdf = PDF::loadview('penelitian.cetak-surat-penerimaan-penelitian', [
                'ti' => $ti,
                'datas' => $datas,
                'mahasiswas' => $mahasiswas
            ]);

            return $pdf->download('surat-balasan-penelitian.pdf');
        } else {
            return redirect()->back();
        }
    }

    public function absen_penelitian()
    {
        if (auth()->user()->role_id == 23) {
            $absenpenelitian = DB::table('users')
                ->leftJoin('data_penelitian', 'data_penelitian.user_id', '=', 'users.id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'mulai_dan_selesai_penelitian.user_id', '=', 'data_penelitian.user_id')
                ->where('data_penelitian.user_id', '=', Auth::user()->id)
                ->select('mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai', 'data_penelitian.id', 'data_penelitian.nama', 'data_penelitian.created_at')
                ->get();

            $absenpenelitians = DB::table('absenpenelitian')
                ->leftJoin('data_penelitian', 'data_penelitian.id', '=', 'absenpenelitian.id_individu')
                ->select('data_penelitian.nama', 'absenpenelitian.waktu_absen', 'absenpenelitian.id', 'absenpenelitian.jenis_absen', 'absenpenelitian.keterangan')
                ->where('data_penelitian.user_id', '=', Auth::user()->id)
                ->simplePaginate(4);

            $ti = 'Absensi';
            return view('penelitian.absen-penelitian', [
                'ti' => $ti,
                'absenpenelitian' => $absenpenelitian,
                'absenpenelitians' => $absenpenelitians,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_absen_masuk_penelitian($individ)
    {
        if (date('H:i', strtotime(now())) > '07:30') {
            AbsenPenelitian::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Telat",
            ]);
            RekapAbsenpenelitian::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Telat",
            ]);
        } elseif (date('H:i', strtotime(now())) <= '07:30') {
            AbsenPenelitian::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Tepat Waktu",
            ]);
            RekapAbsenpenelitian::create([
                'id_individu' => $individ,
                'waktu_absen' => Carbon::now(),
                'jenis_absen' => "Datang",
                'keterangan' => "Tepat Waktu",
            ]);
        }

        return redirect()->back();
    }

    public function proses_absen_pulang_penelitian($individ)
    {
        AbsenPenelitian::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Pulang",
            'keterangan' => "Tepat Waktu",
        ]);
        RekapAbsenpenelitian::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Pulang",
            'keterangan' => "Tepat Waktu",
        ]);

        return redirect()->back();
    }
    public function proses_absen_izin_penelitian($individ, Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'file_absen' => 'required|mimes:jpg,bmp,png|max:2048',
        ]);
        $file = $request->file('file_absen');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/absen';
        $file->move($tujuan_upload, $nama_file);
        AbsenPenelitian::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Izin",
            'keterangan' => $request->keterangan,
            'file_absen' => $nama_file
        ]);
        RekapAbsenpenelitian::create([
            'id_individu' => $individ,
            'waktu_absen' => Carbon::now(),
            'jenis_absen' => "Izin",
            'keterangan' => $request->keterangan,
            'file_absen' => $nama_file
        ]);
        return redirect()->back();
    }
    public function cetak_absenpenelitian_pdf()
    {
        if (auth()->user()->role_id == 23) {

            $absenpenelitian = DB::table('absenpenelitian')
                ->leftJoin('data_penelitian', 'data_penelitian.id', '=', 'absenpenelitian.id_individu')
                ->leftJoin('mulai_dan_selesai_penelitian', 'mulai_dan_selesai_penelitian.user_id', '=', 'data_penelitian.user_id')
                ->select('data_penelitian.nama', 'absenpenelitian.waktu_absen', 'absenpenelitian.jenis_absen', 'absenpenelitian.keterangan', 'data_penelitian.jurusan', 'data_penelitian.divisi', 'data_penelitian.asal_instansi', 'mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai')
                ->where('data_penelitian.user_id', '=', Auth::user()->id)
                ->simplePaginate(4);


            $i = 1;
            $ti = 'DAFTAR HADIR';
            $pdf = PDF::loadview('penelitian.absen-penelitian-pdf', [
                'ti' => $ti,
                'absenpenelitian' =>  $absenpenelitian,
                'i' => $i,
            ]);

            return $pdf->download('Absen Penelitian.pdf');
        } else {
            return redirect()->back();
        }
    }
    // public function proses_absen_penelitian($absenid, $individ)
    // {

    //     // AbsenIndivsTabel::create([
    //     //     'id_absen' => $idabsen,
    //     //     'id_individu' => $idindividu,
    //     //     'waktu_absen' => date('Y-m-d H:i:s', strtotime(now())),
    //     //     'status_absen' => 'Sudah Absensi'
    //     // ]);

    //     DB::table('absen_penelitians_tabel')
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

    public function id_card_penelitian()
    {
        if (auth()->user()->role_id == 23) {
            $ti = 'ID Card Penelitian';
            $id = Auth::user()->id;

            $dates = DB::table('mulai_dan_selesai_penelitian')
                ->where('user_id', '=', $id)
                ->get();
            $datas = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.user_id', '=', 'foto_i_d_penelitian.user_id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
                ->select('foto_i_d_penelitian.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'data_penelitian.departemen', 'users.role_id', 'data_penelitian.divisi', 'data_penelitian.nama', 'data_penelitian.asal_instansi')
                ->where('users.id', '=', $id)
                ->get();

            return view('penelitian.id-card-penelitian', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function id_card_penelitian_pdf()
    {
        if (auth()->user()->role_id == 23) {
            $ti = 'ID Card Penelitian';
            $id = Auth::user()->id;
            $dates = DB::table('mulai_dan_selesai_penelitian')->where('user_id', '=', $id)->get();
            $datas = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.user_id', '=', 'foto_i_d_penelitian.user_id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
                ->select('foto_i_d_penelitian.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_penelitian.divisi', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'data_penelitian.departemen')
                ->where('users.id', '=', $id)
                ->get();

            $pdf = PDF::loadview('penelitian.id-card-penelitian-pdf', [
                'ti' => $ti,
                'datas' => $datas,
                'dates' => $dates
            ]);

            return $pdf->download('id-card-penelitian.pdf');
        } else {
            return redirect()->back();
        }
    }

    public function laporan_penelitian(Request $request)
    {
        if (auth()->user()->role_id == 23) {
            $nama = Auth::user()->name;
            $users = DB::table('laporan_penelitian')
                ->where('laporan_penelitian.nama', '=', $nama)
                ->get();
            $cari = $request->cari;
            $kategori = $request->kategori;
            $user = DB::table('laporan_penelitian')
                ->leftJoin('users', 'users.name', 'laporan_penelitian.nama')
                ->where('judul', 'like', "%" . $cari . "%")
                ->where('jurusan', 'like', "%" . $kategori . "%")
                ->get();
            $ti = 'Laporan Akhir Penelitian';
            return view('penelitian.laporan-penelitian', [
                'ti' => $ti,
                'user' => $user,
                'users' => $users,

            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload_laporan_penelitian()
    {
        if (auth()->user()->role_id == 23) {
            $user = DB::table('data_penelitian')
                ->where('user_id', Auth::user()->id)
                ->first();
            $ti = 'Form Laporan Penelitian';
            return view('penelitian.upload-laporan-penelitian', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_laporan_penelitian(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal_kumpul' => 'required',
            'path' => 'required|mimes:pdf',
            'jurusan' => 'required'
        ]);

        $file1 = $request->file('path');
        $namafile = $file1->getClientOriginalName();
        $tujuan_upload = 'file/laporan-penelitian/';
        $file1->move($tujuan_upload, $namafile);
        LaporanPenelitian::create([
            'nama' => Auth::user()->name,
            'sinopsis' => $request->sinopsis,
            'judul' => $request->judul,
            'tanggal_kumpul' => $request->tanggal_kumpul,
            'jurusan' => $request->jurusan,
            'divisi' => $request->divisi,
            'path' => $namafile
        ]);

        session()->flash('succes', 'Terimakasih telah mengirimkan Laporan anda');
        return redirect('/laporan-penelitian');
    }

    public function lihat_laporan_penelitian($id)
    {
        if (auth()->user()->role_id == 23) {
            $user = LaporanPenelitian::find($id);
            $ti = 'Liat Laporan Akhir Penelitian';
            return view('penelitian.lihat-laporan-penlitian', [
                'ti' => $ti,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function surat_penelitian()
    {
        if (auth()->user()->role_id == 24) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.id', '=', 'foto_i_d_penelitian.user_id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
                ->select('foto_i_d_penelitian.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_penelitian.divisi', 'data_penelitian.jurusan', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'data_penelitian.strata', 'data_penelitian.judul_penelitian', 'data_penelitian.departemen', 'mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Surat Keterangan Penelitian';
            return view('penelitian.surat-penelitian', [
                'ti' => $ti,
                'datas' => $datas
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function sertif_penelitian_cetak()
    {
        if (auth()->user()->role_id == 24) {
            $id = Auth::user()->id;
            $datas = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.id', '=', 'foto_i_d_penelitian.user_id')
                ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
                ->select('foto_i_d_penelitian.fotoID', 'users.name', 'users.status_user', 'users.created_at', 'users.id', 'users.role_id', 'data_penelitian.divisi', 'data_penelitian.jurusan', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'data_penelitian.strata', 'data_penelitian.judul_penelitian', 'data_penelitian.departemen', 'mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai')
                ->where('users.id', '=', $id)
                ->get();
            $ti = 'Surat Keterangan Penelitian';
            // return view('penelitian.surat-penelitian-cetak', [
            //     'ti' => $ti,
            //     'datas' => $datas
            // ]);
            $pdf = PDF::loadview('penelitian.surat-penelitian-cetak', [
                'ti' => $ti,
                'datas' => $datas,

            ]);

            return $pdf->download('surat-balasan-penelitian.pdf');
        } else {
            return redirect()->back();
        }
    }
    public function penelitian_selesai()
    {
        $ti = 'Penelitian Selesai';
        return view('penelitian.penelitian-selesai', [
            'ti' => $ti,

        ]);
    }
    public function penelitian_kuota_penuh()
    {
        $ti = 'Penelitian Kuota Penuh';
        return view('penelitian.penelitian_kuota_penuh', ['ti' => $ti]);
    }
}