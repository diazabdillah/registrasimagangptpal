<?php

namespace App\Http\Controllers;

use App\Models\AbsenIndivsTabel;
use Illuminate\Http\Request;
use App\Models\MulaiDanSelesaiMhs;
use App\Models\DataMhsIndiv;
use App\Models\DataSmkIndivs;
use App\Models\Absenmhs;
use App\Models\Kuota;
use App\Models\Penilaian;
use App\Models\User;
use App\Models\FileMhsIndiv;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan';
            $pagination = 5;

            $users = DB::table('users')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'user_role.role', 'users.name', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 6)
                ->orWhere('users.role_id', '=', 8)
                ->get();

            $usersSmk = DB::table('users')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'user_role.role', 'users.name', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 7)
                ->orWhere('users.role_id', '=', 9)
                ->get();

            return view('divisi.Penerimaan', [
                'ti' => $ti,
                'users' => $users,
                'usersSmk' => $usersSmk,

            ])->with('i', ($request->input('page', 1) - 1) * $pagination);
        } else {
            return redirect()->back();
        }
    }

    public function proses_penerimaan($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan';
            $filepdf = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'users.name', 'user_role.role', 'users.email', 'users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.strata', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.nim')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.proses_penerimaan', [
                'ti' => $ti,
                'users' => $users,
                'filepdf' => $filepdf
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updatePenerimaan(Request $request, $id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Status penerimaan berhasil diproses');
        return redirect('/magang-interview');
    }

    public function showMagangAktif(Request $request)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Aktif';
            $pagination = 5;
            $data = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->select('users.id', 'users.name', 'users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.strata', 'data_mhs_indivs.user_id')
                ->where('users.role_id', '=', 3)
                ->orderBy('users.created_at', 'asc')
                ->get();

            $dataSmk = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->select('users.id', 'users.name', 'users.status_user', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.user_id')
                ->where('users.role_id', '=', 4)
                ->orderBy('users.created_at', 'asc')
                ->get();

            return view('divisi.magang-aktif', [
                'ti' => $ti,
                'data' => $data,
                'dataSmk' => $dataSmk,

            ])->with('i', ($request->input('page', 1) - 1) * $pagination);
        } else {
            return redirect()->back();
        }
    }



    public function proses_penerimaan_smk($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan';
            $filepdf = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'user_role.role', 'users.email', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.jurusan', 'data_smk_indivs.no_hp', 'data_smk_indivs.user_id', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.proses-penerimaan-smk', [
                'ti' => $ti,
                'users' => $users,
                'filepdf' => $filepdf
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function upPenerimaanSmk(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Status penerimaan berhasil di proses');
        return redirect('/Penerimaan');
    }

    public function updateDiterima(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/diterima');
    }

    public function mulaiSelesai(Request $request, $id)
    {
        MulaiDanSelesaiMhs::create([
            'user_id' => $id,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai
        ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/magang-aktif');
    }

    public function showPdfMhs($id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan';
            $users = DB::table('users')
                ->where('id', '=', $id)
                ->get();
            $files = FileMhsIndiv::find($id);

            return view('divisi.pdf-mhs', [
                'ti' => $ti,
                'files' => $files,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function showPdfMhsKel($id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan';
            $users = DB::table('users')
                ->where('id', '=', $id)
                ->get();
            $files = FileMhsIndiv::find($id);

            return view('divisi.pdf-mhs-kel', [
                'ti' => $ti,
                'files' => $files,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function showPdfSmk($id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan';
            $users = DB::table('users')
                ->where('id', '=', $id)
                ->get();
            $files = DB::table('file_smk_indivs')
                ->where('id', '=', $id)
                ->get();

            return view('divisi.pdf-smk', [
                'ti' => $ti,
                'files' => $files,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function showDiterima()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Diterima';

            $users = DB::table('users')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'user_role.role', 'users.name', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 11)
                ->get();

            $usersSmk = DB::table('users')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'user_role.role', 'users.name', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 12)
                ->get();

            return view('divisi.diterima', [
                'ti' => $ti,
                'users' => $users,
                'usersSmk' => $usersSmk,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function finalMhs($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Diterima';
            $userid = DB::table('users')->where('users.id', '=', $user_id)->get()->first();

            $fileFoto = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_mhs_models', 'data_mhs_indivs.id', '=', 'foto_mhs_models.user_id')
                ->select('foto_mhs_models.id', 'foto_mhs_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();
            $filepdf = DB::table('file_mhs_indivs')->where('file_mhs_indivs.user_id', '=', $user_id)->get();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->leftJoin('interview', 'data_mhs_indivs.id', '=', 'interview.user_id')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.user_id')
                ->select('interview.fileinterview', 'interview.id', 'users.name', 'users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'user_role.role', 'users.email', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.user_id', 'foto_i_d_mhs.fotoID')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.final-penerimaan-mhs', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepdf' => $filepdf,
                'fileFoto' => $fileFoto
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function finalSmk($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Diterima';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();
            $fileFoto = DB::table('foto_smk_models')
                ->where('foto_smk_models.user_id', '=', $user_id)
                ->get();
            $filepdf = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $user_id)
                ->get();
            $file3x4 = DB::table('foto_i_d_smks')
                ->where('foto_i_d_smks.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.name', 'user_role.role', 'users.email', 'data_smk_indivs.sekolah', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.jurusan', 'data_smk_indivs.no_hp', 'data_smk_indivs.user_id')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.final-penerimaan-smk', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepdf' => $filepdf,
                'fileFoto' => $fileFoto,
                'file3x4' => $file3x4,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function magangAktMhs($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Aktif';
            $userid = DB::table('users')->where('users.id', '=', $user_id)->get()->first();
            $fileFoto = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_mhs_models', 'data_mhs_indivs.id', '=', 'foto_mhs_models.user_id')
                ->select('foto_mhs_models.id', 'foto_mhs_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();
            $filepdf = DB::table('file_mhs_indivs')->where('file_mhs_indivs.user_id', '=', $user_id)->get();
            $tgl = DB::table('mulai_dan_selesai_mhs')->where('mulai_dan_selesai_mhs.user_id', '=', $user_id)->get();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.user_id')
                ->select('users.name', 'data_mhs_indivs.nama', 'user_role.role', 'users.email', 'data_mhs_indivs.univ', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.user_id', 'foto_i_d_mhs.fotoID')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.proses-magang-aktmhs', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'tgl' => $tgl,
                'filepdf' => $filepdf,
                'fileFoto' => $fileFoto
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updatemagangdivisi($user_id, Request $request)
    {
        DB::table('data_mhs_indivs')->where('user_id', $user_id)
            ->update([
                'divisi' => $request->divisi,
                'departemen' => $request->departemen
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/diterima');
    }

    public function magangAktSmk($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Aktif';
            $userid = DB::table('users')->where('users.id', '=', $user_id)->get()->first();
            $fileFoto = DB::table('foto_smk_models')->where('foto_smk_models.user_id', '=', $user_id)->get();
            $filepdf = DB::table('file_smk_indivs')->where('file_smk_indivs.user_id', '=', $user_id)->get();
            $tgl = DB::table('mulai_dan_selesai_mhs')->where('mulai_dan_selesai_mhs.user_id', '=', $user_id)->get();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->leftJoin('foto_i_d_smks', 'users.id', '=', 'foto_i_d_smks.user_id')
                ->select('users.name', 'user_role.role', 'users.email', 'data_smk_indivs.sekolah', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.jurusan', 'data_smk_indivs.no_hp', 'data_smk_indivs.user_id', 'foto_i_d_smks.fotoID')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.proses-magang-aktsmk', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'tgl' => $tgl,
                'filepdf' => $filepdf,
                'fileFoto' => $fileFoto
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function hapusfileMhs($id, $foto)
    {
        // Hapus di file storage
        File::delete('file/dokumen-mhs/' . $foto);
        // Hapus di database
        DB::table('foto_mhs_models')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapusfileMhsKel($id, $foto)
    {
        // Hapus di file storage
        File::delete('file/dokumen-mhs-kel/' . $foto);
        // Hapus di database
        DB::table('foto_mhs_models')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapus_interview_mhs($id, $foto)
    {
        // Hapus di file storage
        File::delete('file/interview-mhs/' . $foto);
        // Hapus di database
        DB::table('interview')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapus_interview_mhs_kel($id, $foto)
    {
        // Hapus di file storage
        File::delete('file/interview-mhs-kel/' . $foto);
        // Hapus di database
        DB::table('interview')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapusfileSmk($id, $foto)
    {
        // Hapus di file storage
        File::delete('file/' . $foto);
        // Hapus di database
        DB::table('foto_smk_models')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapusfotoSmk($id, $fotoID)
    {
        // Hapus di file storage
        File::delete('file/' . $fotoID);
        // Hapus di database
        DB::table('foto_i_d_smks')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function Kuota()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {

            $ti = 'Kuota';
            $users = DB::table('kuota')->get();
            return view('divisi.Kuota', [
                'ti' => $ti,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function tambah_kuota()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Kuota';
            return view('divisi.tambah_kuota', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_kuota(Request $request)
    {

        $request->validate([
            'bagian' => 'required',
            'kuota' => 'required',
            'divisi' => 'required',
            'departemen' => 'required',
            'tanggal_buka' => 'required',
            'tanggal_tutup' => 'required',
        ]);

        Kuota::create([
            'bagian' => $request->bagian,
            'tanggal_buka' => $request->tanggal_buka,
            'tanggal_tutup' => $request->tanggal_tutup,
            'kuota' => $request->kuota,
            'divisi' => $request->divisi,
            'departemen' => $request->departemen,
            'status_kuota' => 'Dibuka'

        ]);
        return redirect('/kuota');
    }

    public function edit_kuota()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $data = DB::table('kuota')->get();
            $ti = 'Kuota';
            return view('divisi.edit_kuota', ['ti' => $ti, 'data' => $data]);
        } else {
            return redirect()->back();
        }
    }

    public function rekam_jejak_magang()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Rekam Jejak Magang';
            return view('divisi.rekam-jejak-magang', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function rekam_jejak()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Rekam Jejak Magang';
            return view('divisi.rekam-jejak', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }
    public function laporan()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $user = DB::table('laporans')->get();
            $id = 1;
            $ti = 'Laporan Akhir';
            return view('divisi.laporan', [
                'ti' => $ti,
                'id' => $id,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function editlaporan($id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $data = DB::table('laporans')->where('id', $id)->first();
            $ti = 'Edit Laporan';
            return view('divisi.editlaporan', ['ti' => $ti, 'data' => $data]);
        } else {
            return redirect()->back();
        }
    }

    public function proseseditlaporan($id, Request $request)
    {
        DB::table('laporans')->where('id', $id)
            ->update([
                'revisi' => $request->revisi
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/laporan');
    }

    public function penilaian()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $id = Auth::user()->id;
            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'users.id', '=', 'penilaians.user_id')
                ->select('penilaians.status_penilaian', 'penilaians.pembimbing', 'data_mhs_indivs.id', 'users.role_id', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.univ', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen')
                ->get();

            $id = 1;
            $ti = 'Penilaian';
            return view('divisi.penilaian', [
                'ti' => $ti,
                'id' => $id,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function isi_penilaian($id)
    {
        $user = User::find($id);

        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Form Penilaian';
            return view('divisi.penilaian_mhs', ['ti' => $ti, 'user' => $user]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_penilaian($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);

        $avgStar = 0;
        $nilaihuruf = "";

        $penilaians = new Penilaian;
        $penilaians->user_id = $user->id;
        $penilaians->pembimbing = Auth::user()->name;
        $penilaians->Kerjasama = $request->Kerjasama;
        $penilaians->Motivasi = $request->Motivasi;
        $penilaians->InisiatifKerja = $request->InisiatifKerja;
        $penilaians->Loyalitas = $request->Loyalitas;
        $penilaians->etika = $request->etika;
        $penilaians->Disiplin = $request->Disiplin;
        $penilaians->PercayaDiri = $request->PercayaDiri;
        $penilaians->TanggungJawab = $request->TanggungJawab;
        $penilaians->PemahamanKemampuan = $request->PemahamanKemampuan;
        $penilaians->KesehatanKeselamatanKerja = $request->KesehatanKeselamatanKerja;
        $penilaians->laporankerja = $request->laporankerja;
        $penilaians->sopansantun = $request->sopansantun;
        $penilaians->kehadiran = $request->kehadiran;

        $avgStar = ($penilaians->Kerjasama +  $penilaians->Motivasi + $penilaians->InisiatifKerja + $penilaians->Loyalitas + $penilaians->etika + $penilaians->Disiplin + $penilaians->PercayaDiri + $penilaians->TanggungJawab + $penilaians->PemahamanKemampuan + $penilaians->KesehatanKeselamatanKerja + $penilaians->laporankerja + $penilaians->sopansantun + $penilaians->kehadiran) / 13;
        if ($avgStar >= 81 && $avgStar <= 100) {
            $nilaihuruf = "A";
        } else if ($avgStar >= 71  && $avgStar <= 80) {
            $nilaihuruf = "AB";
        } else if ($avgStar >= 67  && $avgStar <= 70) {
            $nilaihuruf = "B";
        } else if ($avgStar >= 61  && $avgStar <= 66) {
            $nilaihuruf = "BC";
        } else if ($avgStar >= 56  && $avgStar <= 60) {
            $nilaihuruf = "C";
        } else if ($avgStar >= 41  && $avgStar <= 55) {
            $nilaihuruf = "D";
        } else if ($avgStar >= 0  && $avgStar <= 55) {
            $nilaihuruf = "E";
        }
        $penilaians->average = $avgStar;
        $penilaians->nilai_huruf = $nilaihuruf;
        $penilaians->status_penilaian = 'Sudah di nilai';
        $penilaians->save();

        return redirect('/penilaian');
    }

    public function Absen()
    {
        $mahasiswa = DB::table('users')
            ->where('role_id', '=', 3)
            ->get();

        $smk = DB::table('users')
            ->where('role_id', '=', 4)
            ->get();

        $ti = 'Absensi';
        return view('divisi.absen', [
            'ti' => $ti,
            'mahasiswa' => $mahasiswa,
            'smk' => $smk,

        ]);
    }

    public function tambah_absenmhs($id)
    {
        $user = User::find($id);
        $ti = 'Tambah Absensi';
        return view('divisi.tambah_absenmhs', [
            'ti' => $ti,
            'user' => $user,
        ]);
    }

    public function tambah_absensmk($id)
    {
        $user = User::find($id);
        $ti = 'Tambah Absensi';
        return view('divisi.tambah_absensmk', [
            'ti' => $ti,
            'user' => $user,
        ]);
    }

    public function proses_absenmhs($id, Request $request)
    {
        $user = DataMhsIndiv::where('user_id', '=', $id)->get();

        $absen = new Absenmhs;
        $absen->user_id = $id;
        $absen->waktu_awal = $request->waktu_awal;
        $absen->waktu_akhir = $request->waktu_akhir;
        $absen->save();

        foreach ($user as $u) {
            $absen_indiv = new AbsenIndivsTabel;
            $absen_indiv->id_absen = $absen->id;
            $absen_indiv->id_individu = $u->id;
            $absen_indiv->status_absen = "Belum Absen";
            $absen_indiv->save();
        }

        return redirect('/absen');
    }

    public function proses_absensmk($id, Request $request)
    {
        $user = DataSmkIndivs::where('user_id', '=', $id)->get();

        $absen = new Absenmhs;
        $absen->user_id = $id;
        $absen->waktu_awal = $request->waktu_awal;
        $absen->waktu_akhir = $request->waktu_akhir;
        $absen->save();

        foreach ($user as $u) {
            $absen_indiv = new AbsenIndivsTabel;
            $absen_indiv->id_absen = $absen->id;
            $absen_indiv->id_individu = $u->id;
            $absen_indiv->status_absen = "Belum Absen";
            $absen_indiv->save();
        }

        return redirect('/absen');
    }

    public function selesaiMhs()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Selesai';

            $users = DB::table('users')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'users.name', 'user_role.role')
                ->where('users.role_id', '=', 14)
                ->get();

            return view('divisi.selesai', [
                'ti' => $ti,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function deleteselesaimhs($id)
    {
        DB::table('users')->where('id', $id)->delete();

        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function interview()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Interview';

            $users = DB::table('users')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'users.name', 'users.status_user', 'user_role.role')
                ->where('users.role_id', '=', 16)
                ->get();

            $usersSmk = DB::table('users')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->select('users.id', 'users.name', 'users.status_user', 'user_role.role')
                ->where('users.role_id', '=', 18)
                ->get();

            return view('divisi.magang_interview', [
                'ti' => $ti,
                'users' => $users,
                'usersSmk' => $usersSmk,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function terimainterviewmhs($user_id)
    {

        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Hasil Interview';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();
            $filepengajuan = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('user_role', 'users.role_id', '=', 'user_role.id')
                ->leftJoin('interview', 'data_mhs_indivs.id', '=', 'interview.user_id')
                ->select('interview.id', 'interview.fileinterview', 'users.name', 'data_mhs_indivs.nama', 'user_role.role', 'users.email', 'users.status_user', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.user_id')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.terima-interview-mhs', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepengajuan' => $filepengajuan
            ]);
        } else {
            return redirect()->back();
        }
    }
}
