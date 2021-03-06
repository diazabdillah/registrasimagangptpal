<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\MulaiDanSelesaiMhs;
use App\Models\MulaiDanSelesaiSmk;
use App\Models\DataMhsIndiv;
use App\Models\DataSmkIndivs;
use App\Models\Absenmhs;
use App\Models\AbsenSmk;
use App\Models\Kuota;
use App\Models\User;
use App\Models\FileMhsIndiv;
use App\Models\FileSmkIndivs;
use App\Models\DataPenelitian;
use App\Models\FilePenelitian;
use App\Models\AbsenPenelitian;
use App\Models\MulaiDanSelesaiPenelitian;
use App\Models\Divisi;
use App\Models\Departemen;
use App\Models\FotoMhsModels;
use App\Models\FotoPenelitianModels;
use App\Models\FotoSmkModels;
use App\Models\Interview;
use App\Models\Laporan;
use App\Models\InterviewSmk;
use App\Models\LaporanSmk;
use App\Models\RekapAbsenmhs;
use App\Models\RekapAbsenpenelitian;
use App\Models\RekapAbsensmk;
use App\Models\RekapKegiatanMhs;
use App\Models\Tugasmhs;
use App\Models\Tugassmk;
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
            $ti = 'Penerimaan Magang';
            $pagination = 5;
            $cari = $request->cari;
          
            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.email', 'users.role_id', 'users.status_user','users.status_penerimaan')
                ->orWhere('users.name', 'like', "%" . $cari . "%")
                // ->where('users.role_id', '=', 6)
                // ->orWhere('users.role_id', '=', 8)
                // ->orWhere('users.role_id','!=', 18)
                // ->orWhere('users.role_id','!=', 1)
                ->orderBy('users.created_at', 'desc')
                ->get();
        
            $usersSmk = DB::table('users')
                ->select('users.id',  'users.name', 'users.email', 'users.role_id', 'users.status_user','users.status_penerimaan')
                // ->where('users.role_id', '=', 7)
                // ->orWhere('users.role_id', '=', 9)
                // ->orWhere('users.role_id','!=', 18)
                // ->orWhere('users.role_id','!=', 1)
                ->orWhere('name', 'like', "%" . $cari . "%")
                ->orderBy('users.created_at', 'desc')
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
            $ti = 'Penerimaan Magang';
            $filepdf = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $user_id)
                ->get();
            $divisi = Divisi::all();
            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.status_user', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'users.status_penerimaan', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.strata', 'data_mhs_indivs.departemen', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.nim')
                ->where('users.id', '=', $user_id)
                ->get();

            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_mhs')
                ->where('mulai_dan_selesai_mhs.user_id', '=', $user_id)
                ->get();
            return view('divisi.proses_penerimaan', [
                'ti' => $ti,
                'users' => $users,
                'filepdf' => $filepdf,
                'divisi' => $divisi,
                'departemen' => $departemen,
                'tgl'=> $tgl
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
            ->leftJoin('mulai_dan_selesai_mhs','mulai_dan_selesai_mhs.user_id','=','users.id')
                ->select('users.id', 'users.name', 'users.status_user','mulai_dan_selesai_mhs.selesai','mulai_dan_selesai_mhs.mulai')
                ->where('users.role_id', '=', 3)
                ->orderBy('users.created_at', 'desc')
                ->get();

            $dataSmk = DB::table('users')
            ->leftJoin('mulai_dan_selesai_smk','mulai_dan_selesai_smk.user_id','=','users.id')
                ->select('users.id', 'users.name', 'users.status_user','mulai_dan_selesai_smk.selesai','mulai_dan_selesai_smk.mulai')
                ->where('users.role_id', '=', 4)
                ->orderBy('users.created_at', 'desc')
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

    public function showMagangAktifDivisi(Request $request)
    {
        if (auth()->user()->role_id == 18) {
            $ti = 'Magang Aktif';
            $pagination = 5;
            $data = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->select('users.id', 'users.name', 'users.status_user', 'data_mhs_indivs.divisi')
                ->where('users.role_id', '=', 3)
                ->where('data_mhs_indivs.divisi', Auth::user()->status_user)
                ->distinct()
                ->get();

            $dataSmk = DB::table('users')
                ->leftJoin('data_smk_indivs', 'data_smk_indivs.user_id', '=', 'users.id')
                ->select('users.id', 'users.name', 'users.status_user', 'data_smk_indivs.divisi')
                ->where('users.role_id', '=', 4)
                ->where('data_smk_indivs.divisi', Auth::user()->status_user)
                ->distinct()
                ->get();

            return view('divisi.magang-aktif-divisi', [
                'ti' => $ti,
                'data' => $data,
                'dataSmk' => $dataSmk,

            ])->with('i', ($request->input('page', 1) - 1) * $pagination);
        } else {
            return redirect()->back();
        }
    }

    public function showPenelitianAktifDivisi()
    {
        if (auth()->user()->role_id == 18) {
            $ti = 'Penelitian Aktif';

            $data = DB::table('users')
                ->leftJoin('data_penelitian', 'data_penelitian.user_id', '=', 'users.id')
                ->select('users.id', 'users.name', 'users.status_user', 'data_penelitian.divisi')
                ->where('users.role_id', '=', 23)
                ->where('data_penelitian.divisi', Auth::user()->status_user)
                ->distinct()
                ->get();
            return view('divisi.penelitian-aktif-divisi', [
                'ti' => $ti,
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_penerimaan_smk($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan Magang';
            $filepdf = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $user_id)
                ->get();
            $divisi = Divisi::all();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->select('users.id', 'users.status_user',  'users.email', 'data_smk_indivs.nama', 'data_smk_indivs.nis', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'users.status_penerimaan', 'data_smk_indivs.no_hp', 'data_smk_indivs.user_id', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen')
                ->where('users.id', '=', $user_id)
                ->get();

            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_smk')
                ->where('mulai_dan_selesai_smk.user_id', '=', $user_id)
                ->get();
            return view('divisi.proses-penerimaan-smk', [
                'ti' => $ti,
                'users' => $users,
                'filepdf' => $filepdf,
                'divisi' => $divisi,
                'departemen' => $departemen,
                'tgl'=> $tgl
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

    public function update_terima_interview(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/diterima');
    }

    public function update_terima_interview_smk(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/diterima');
    }

    public function updateDiterima(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/magang-selesai-mhs');
    }

    public function updateDiterimaSmk(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/magang-selesai-mhs');
    }

    public function mulaiSelesai(Request $request, $id)
    {
        $exist = DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->first();
        if ($exist) {
            MulaiDanSelesaiMhs::where('user_id', $id)
                ->update([
                    'mulai' => $request->mulai,
                    'selesai' => $request->selesai
                ]);
            DB::table('rekapmhs')->where('user_id', $id)->update([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
        } else {
            MulaiDanSelesaiMhs::create([
                'user_id' => $id,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
            DB::table('rekapmhs')->where('user_id', $id)->update([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
        }
        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect()->back();
    }
    public function mulaiSelesaismk(Request $request, $id)
    {
        $exist = DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->first();
        if ($exist) {
            MulaiDanSelesaiSmk::where('user_id', $id)
                ->update([
                    'mulai' => $request->mulai,
                    'selesai' => $request->selesai
                ]);
            DB::table('rekapsmk')->where('user_id', $id)->update([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
        } else {
            MulaiDanSelesaiSmk::create([
                'user_id' => $id,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
            DB::table('rekapsmk')->where('user_id', $id)->update([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
        }
        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect()->back();
    }


    public function showPdfMhs($id)
    {
        if (auth()->user()->role_id == 1 or auth()->user()->role_id == 18) {
            $ti = 'Penerimaan Magang';
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
        if (auth()->user()->role_id == 1 or auth()->user()->role_id == 18) {
            $ti = 'Penerimaan Magang';
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
        if (auth()->user()->role_id == 1 or auth()->user()->role_id == 18) {
            $ti = 'Penerimaan Magang';
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

    public function showPdfSmkKel($id)
    {
        if (auth()->user()->role_id == 1 or auth()->user()->role_id == 18) {
            $ti = 'Penerimaan Magang';
            $users = DB::table('users')
                ->where('id', '=', $id)
                ->get();
            $files = FileSmkIndivs::find($id);

            return view('divisi.pdf-smk-kel', [
                'ti' => $ti,
                'files' => $files,
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function showPdfPenelitian($id)
    {
        if (auth()->user()->role_id == 1 or auth()->user()->role_id == 18) {
            $ti = 'Penerimaan Magang';
            $users = DB::table('users')
                ->where('id', '=', $id)
                ->get();
            $files = FilePenelitian::find($id);

            return view('divisi.pdf-penelitian', [
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
            $ti = 'Magang Dokumen';

            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 11)
                ->orderBy('users.created_at', 'desc')
                ->get();

            $usersSmk = DB::table('users')
                ->select('users.id', 'users.name', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 12)
                ->orderBy('users.created_at', 'desc')
                ->get();

            return view('divisi.diterima', [
                'ti' => $ti,
                'users' => $users,
                'usersSmk' => $usersSmk,

            ]);
        } else {
            return redirect()->back();
        }
    }

    public function finalMhs($user_id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Magang Dokumen';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $fileFoto = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_mhs_models', 'data_mhs_indivs.id', '=', 'foto_mhs_models.id_individu')
                ->select('foto_mhs_models.id', 'foto_mhs_models.id_individu', 'foto_mhs_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();

            $filepdf = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('interview', 'data_mhs_indivs.id', '=', 'interview.id_individu')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.id_individu')
                ->select('interview.id_individu', 'interview.fileinterview', 'interview.id', 'users.name', 'users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.status_penerimaan', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'users.email', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.strata', 'users.status_user', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.user_id', 'foto_i_d_mhs.fotoID', 'foto_i_d_mhs.id_individu')
                ->where('users.id', '=', $user_id)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_mhs')
                ->where('mulai_dan_selesai_mhs.user_id', '=', $user_id)
                ->get();
            return view('divisi.final-penerimaan-mhs', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepdf' => $filepdf,
                'fileFoto' => $fileFoto,
                'tgl' => $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function finalSmk($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Dokumen';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $fileFoto = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_smk_models', 'data_smk_indivs.id', '=', 'foto_smk_models.id_individu')
                ->select('foto_smk_models.id_individu', 'foto_smk_models.id', 'foto_smk_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();

            $filepdf = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('interview_smk', 'data_smk_indivs.id', '=', 'interview_smk.id_individu')
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.id_individu')
                ->select('interview_smk.id_individu AS interview_individu', 'interview_smk.fileinterview', 'interview_smk.id', 'users.name', 'users.status_user', 'data_smk_indivs.nama', 'data_smk_indivs.status_penerimaan', 'data_smk_indivs.nis', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'users.email', 'data_smk_indivs.sekolah', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.no_hp', 'data_smk_indivs.user_id', 'foto_i_d_smks.fotoID', 'foto_i_d_smks.id_individu')
                ->where('users.id', '=', $user_id)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_smk')
                ->where('mulai_dan_selesai_smk.user_id', '=', $user_id)
                ->get();
            return view('divisi.final-penerimaan-smk', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepdf' => $filepdf,
                'fileFoto' => $fileFoto,
                'tgl'=> $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function updateFinalPenerimaan(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/magang-aktif');
    }
    public function updateFinalPenerimaanSmk(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/magang-aktif');
    }
    public function magangAktMhs($user_id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Magang Aktif';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();
            $fileFoto = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_mhs_models', 'data_mhs_indivs.id', '=', 'foto_mhs_models.id_individu')
                ->select('foto_mhs_models.id_individu', 'foto_mhs_models.id', 'foto_mhs_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();
            $filepdf = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $user_id)
                ->get();
            $tgl = DB::table('mulai_dan_selesai_mhs')
                ->where('mulai_dan_selesai_mhs.user_id', '=', $user_id)
                ->get();
            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.id_individu')
                ->select('foto_i_d_mhs.id_individu', 'users.name', 'users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'users.email', 'data_mhs_indivs.univ', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.strata', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.user_id', 'foto_i_d_mhs.fotoID')
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
        DB::table('data_mhs_indivs')
            ->where('user_id', $user_id)
            ->update([
                'divisi' => $request->divisi,

            ]);
        DB::table('rekapmhs')
            ->where('user_id', $user_id)
            ->update([
                'divisi' => $request->divisi,

            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }

    public function updatemagangdivisismk($user_id, Request $request)
    {
        DB::table('data_smk_indivs')
            ->where('user_id', $user_id)
            ->update([
                'divisi' => $request->divisi,

            ]);
        DB::table('rekapsmk')
            ->where('user_id', $user_id)
            ->update([
                'divisi' => $request->divisi,

            ]);
        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }

    public function magangAktSmk($user_id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Magang Aktif';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();
            $fileFoto = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_smk_models', 'data_smk_indivs.id', '=', 'foto_smk_models.id_individu')
                ->select('foto_smk_models.id_individu', 'foto_smk_models.id', 'foto_smk_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();
            $filepdf = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $user_id)
                ->get();
            $tgl = DB::table('mulai_dan_selesai_smk')
                ->where('mulai_dan_selesai_smk.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.id_individu')
                ->select('foto_i_d_smks.id_individu', 'users.name', 'users.status_user', 'users.email', 'data_smk_indivs.nama', 'data_smk_indivs.nis', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.sekolah', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.jurusan', 'data_smk_indivs.no_hp', 'data_smk_indivs.user_id', 'data_smk_indivs.status_penerimaan', 'foto_i_d_smks.fotoID')
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
        $dokumen = FotoMhsModels::find($id);
        // Hapus di file storage
        File::delete('file/dokumen-mhs/' . $dokumen->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_mhs_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapusfileMhsKel($id, $foto)
    {
        $dokumen = FotoMhsModels::find($id);
        // Hapus di file storage
        File::delete('file/dokumen-mhs-kel/' . $dokumen->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_mhs_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapus_interview_mhs($id, $foto)
    {
        $interview = Interview::find($id);
        // Hapus di file storage
        File::delete('file/interview-mhs/' . $interview->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('interview')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapus_interview_smk($id, $foto)
    {
        $interviewsmk = InterviewSmk::find($id);
        // Hapus di file storage
        File::delete('file/interview-smk/' . $interviewsmk->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('interview_smk')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapus_interview_mhs_kel($id, $foto)
    {
        $interview = Interview::find($id);
        // Hapus di file storage
        File::delete('file/interview-mhs-kel/' . $interview->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('interview')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapus_interview_smk_kel($id, $foto)
    {
        $interviewsmk = InterviewSmk::find($id);
        // Hapus di file storage
        File::delete('file/interview-smk-kel/' . $interviewsmk->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('interview_smk')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapusfileSmk($id, $foto)
    {
        $dokumensmk = FotoSmkModels::find($id);
        // Hapus di file storage
        File::delete('file/dokumen-smk/' . $dokumensmk->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_smk_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function hapusfileSmkKel($id, $foto)
    {
        $dokumensmk = FotoSmkModels::find($id);
        // Hapus di file storage
        File::delete('file/dokumen-smk-kel/' . $dokumensmk->id_individu . '/' . $foto);
        // Hapus di database
        DB::table('foto_smk_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }

    public function Kuota()
    {
        if (auth()->user()->role_id == 18) {

            $ti = 'Kuota';
            $users = DB::table('kuota')->get();
            return view('divisi.Kuota', [
                'ti' => $ti,
                'users' => $users,

            ]);
        } else {
            return redirect()->back();
        }
    }

    public function tambah_kuota()
    {
        if (auth()->user()->role_id == 18) {
            $ti = 'Kuota';
            // $users= DB::table('users')->first();
            $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
            return view('divisi.tambah_kuota', ['ti' => $ti,'user'=> $user]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_kuota(Request $request,$id)
    {

        $request->validate([
            'divisi' => 'required',
            'tanggal_buka' => 'required',
            'tanggal_tutup' => 'required',
            'jenis_kuota' => 'required',
          
        ]);

        Kuota::create([
            'user_id' => $id,
            'tanggal_buka' => $request->tanggal_buka,
            'tanggal_tutup' => $request->tanggal_tutup,
            'rekrutmen' => $request->rekrutmen,
            'divisi' => $request->divisi,
            'jenis_kuota'=>$request->jenis_kuota,
            'tw1'=>$request->tw1,
            'tw2'=> $request->tw2,
            'tw3'=> $request->tw3,
            'tw4'=>$request->tw4,
        ]);
        return redirect('/kuota');
    }

    public function edit_kuota($id)
    {
        if (auth()->user()->role_id == 18) {
            $divisi = Divisi::all();
            $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
            $data = DB::table('kuota')->where('id', $id)->first();
            $ti = 'Kuota';
            return view('divisi.edit_kuota', ['ti' => $ti, 'data' => $data, 'divisi' => $divisi, 'user' => $user]);
        } else {
            return redirect()->back();
        }
    }
    public function hapus_kuota($id){
        $kuota = DB::table('kuota')->find($id);
      
        DB::table('kuota')
            ->where('id', $kuota->id)
            ->delete();
        return redirect()->back();
    }

    public function laporan()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $user = DB::table('laporans')->get();
            $userSmk = DB::table('laporans_smk')->get();

            $id = 1;
            $ti = 'Laporan Akhir';
            return view('divisi.laporan', [
                'ti' => $ti,
                'id' => $id,
                'user' => $user,
                'userSmk' => $userSmk,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function laporan_revisi()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $user = DB::table('laporans')->get();
            $userSmk = DB::table('laporans_smk')->get();
            $id = 1;
            $ti = 'Laporan Akhir Revisi';
            return view('divisi.laporan_revisi', [
                'ti' => $ti,
                'id' => $id,
                'user' => $user,
                'userSmk' => $userSmk,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function editlaporan($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $data = DB::table('laporans')->where('id', $id)->first();
            $ti = 'Edit Laporan';
            return view('divisi.editlaporan', ['ti' => $ti, 'data' => $data]);
        } else {
            return redirect()->back();
        }
    }

    public function proseseditlaporan($id, Request $request)
    {
        if ($request->file('path') != null){
        $lama = Laporan::find($id);
        File::delete('file/laporan-mhs/' . $lama->path);
        $file = $request->file('path');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-mhs/';
        $file->move($tujuan_upload, $nama_file);
        }else{
            $nama_file = null;
        }
        DB::table('laporans')->where('id', $id)
            ->update([
                'nama_pembimbing_hcd'=> $request->nama_pembimbing_hcd,
                'path'=> $nama_file,
                'revisi' => $request->revisi
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/laporan-revisi');
    }
    public function delete_laporan_mhs($id)
    {
        $laporanmhs = DB::table('laporans')->find($id);
        // Hapus di file storage
        File::delete('file/laporan-mhs/' . $laporanmhs->path);
        // Hapus di database
        DB::table('laporans')
            ->where('id', $laporanmhs->id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }
    public function editlaporansmk($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $data = DB::table('laporans_smk')->where('id', $id)->first();
            $ti = 'Edit Laporan';
            return view('divisi.editlaporansmk', ['ti' => $ti, 'data' => $data]);
        } else {
            return redirect()->back();
        }
    }
    public function proseseditlaporansmk($id, Request $request)
    {
        if ($request->file('path') != null){
        $lama = LaporanSmk::find($id);
        File::delete('file/laporan-smk-revisi/' . $lama->path);
        $file = $request->file('path');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-smk/';
        $file->move($tujuan_upload, $nama_file);
        }else{
            $nama_file = null;
        }
        DB::table('laporans_smk')->where('id', $id)
            ->update([
                'nama_pembimbing_hcd'=> $request->nama_pembimbing_hcd,
                'path'=> $nama_file,
                'revisi' => $request->revisi
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/laporan-revisi');
    }
    public function delete_laporan_smk($id)
    {
        $laporansmk = DB::table('laporans_smk')->find($id);
        // Hapus di file storage
        File::delete('file/laporan-smk/' . $laporansmk->path);
        // Hapus di database
        DB::table('laporans_smk')
            ->where('id', $laporansmk->id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }
    public function delete_laporan_penelitian($id)
    {
        $laporanpenelitian = DB::table('laporan_penelitian')->find($id);
        // Hapus di file storage
        File::delete('file/laporan-penelitian/' . $laporanpenelitian->path);
        // Hapus di database
        DB::table('laporan_penelitian')
            ->where('id', $laporanpenelitian->id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }
    public function penilaian()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $id = Auth::user()->id;
            $users = DB::table('penilaians')
                ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.id', '=', 'penilaians.user_id')
                ->leftJoin('users', 'users.id', 'data_mhs_indivs.user_id')
                ->select('data_mhs_indivs.id', 'data_mhs_indivs.nama', 'users.role_id', 'penilaians.status_penilaian', 'penilaians.user_id')
                ->where('users.role_id', '=', 3)
                ->get();

            $usersSmk = DB::table('penilaians_smk')
                ->leftJoin('data_smk_indivs', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
                ->leftJoin('users', 'users.id', '=', 'data_smk_indivs.user_id')
                ->select('data_smk_indivs.id', 'data_smk_indivs.nama', 'users.role_id', 'penilaians_smk.status_penilaian')
                ->where('users.role_id', '=', 4)
                ->get();

            $id = 1;
            $ti = 'Penilaian';
            return view('divisi.penilaian', [
                'ti' => $ti,
                'id' => $id,
                'users' => $users,
                'usersSmk' => $usersSmk,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function isi_penilaian($id)
    {
        $user = DataMhsIndiv::find($id);
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Form Penilaian';
            return view('divisi.penilaian_mhs', ['ti' => $ti, 'user' => $user]);
        } else {
            return redirect()->back();
        }
    }

    public function isi_penilaian_smk($id)
    {
        $user = DataSmkIndivs::find($id);

        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Form Penilaian';
            return view('divisi.penilaian_smk', ['ti' => $ti, 'user' => $user]);
        } else {
            return redirect()->back();
        }
    }

    public function proses_penilaian($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $avgStar = 0;
        $nilaihuruf = "";
        $keterangan = "";

        $avgStar = ($request->Kerjasama +  $request->MotivasiPercayaDiri + $request->InisiatifTanggungJawabKerja + $request->Loyalitas + $request->EtikaSopanSantun + $request->Disiplin + $request->PemahamanKemampuan + $request->KesehatanKeselamatanKerja + $request->laporankerja + $request->kehadiran) / 10;
        if ($avgStar >= 81 && $avgStar <= 100) {
            $nilaihuruf = "A";
            $keterangan = "Istimewa";
        } else if ($avgStar >= 71  && $avgStar <= 80) {
            $nilaihuruf = "AB";
            $keterangan = "Sangat Baik";
        } else if ($avgStar >= 67  && $avgStar <= 70) {
            $nilaihuruf = "B";
            $keterangan = "Baik";
        } else if ($avgStar >= 61  && $avgStar <= 66) {
            $nilaihuruf = "BC";
            $keterangan = "Cukuo Baik";
        } else if ($avgStar >= 56  && $avgStar <= 60) {
            $nilaihuruf = "C";
            $keterangan = "Cukup";
        } else if ($avgStar >= 41  && $avgStar <= 55) {
            $nilaihuruf = "D";
            $keterangan = "Kurang";
        } else if ($avgStar >= 0  && $avgStar <= 55) {
            $nilaihuruf = "E";
            $keterangan = "Gagal";
        }

        DB::table('penilaians')->where('user_id', $id)
            ->update([
                'pembimbing' => $request->pembimbing,
                'Kerjasama' => $request->Kerjasama,
                'MotivasiPercayaDiri' => $request->MotivasiPercayaDiri,
                'InisiatifTanggungJawabKerja' => $request->InisiatifTanggungJawabKerja,
                'Loyalitas' => $request->Loyalitas,
                'EtikaSopanSantun' => $request->EtikaSopanSantun,
                'Disiplin' => $request->Disiplin,
                'PemahamanKemampuan' => $request->PemahamanKemampuan,
                'KesehatanKeselamatanKerja' => $request->KesehatanKeselamatanKerja,
                'laporankerja' => $request->laporankerja,
                'kehadiran' => $request->kehadiran,
                'average' => $avgStar,
                'nilai_huruf' => $nilaihuruf,
                'status_penilaian' => 'Sudah di nilai',
                'keterangan' => $keterangan,
            ]);

        return redirect('/penilaian-magang');
    }

    public function proses_penilaian_smk($id, Request $request)
    {
        $user = DataSmkIndivs::find($id);
        $avgStar = 0;
        $nilaihuruf = "";
        $keterangan = "";

        $avgStar = ($request->Kerjasama +  $request->MotivasiPercayaDiri + $request->InisiatifTanggungJawabKerja + $request->Loyalitas + $request->EtikaSopanSantun + $request->Disiplin + $request->PemahamanKemampuan + $request->KesehatanKeselamatanKerja + $request->laporankerja + $request->kehadiran) / 10;
        if ($avgStar >= 81 && $avgStar <= 100) {
            $nilaihuruf = "A";
            $keterangan = "Istimewa";
        } else if ($avgStar >= 71  && $avgStar <= 80) {
            $nilaihuruf = "AB";
            $keterangan = "Sangat Baik";
        } else if ($avgStar >= 67  && $avgStar <= 70) {
            $nilaihuruf = "B";
            $keterangan = "Baik";
        } else if ($avgStar >= 61  && $avgStar <= 66) {
            $nilaihuruf = "BC";
            $keterangan = "Cukuo Baik";
        } else if ($avgStar >= 56  && $avgStar <= 60) {
            $nilaihuruf = "C";
            $keterangan = "Cukup";
        } else if ($avgStar >= 41  && $avgStar <= 55) {
            $nilaihuruf = "D";
            $keterangan = "Kurang";
        } else if ($avgStar >= 0  && $avgStar <= 55) {
            $nilaihuruf = "E";
            $keterangan = "Gagal";
        }

        DB::table('penilaians_smk')->where('user_id', $id)
            ->update([
                'pembimbing' => $request->pembimbing,
                'Kerjasama' => $request->Kerjasama,
                'MotivasiPercayaDiri' => $request->MotivasiPercayaDiri,
                'InisiatifTanggungJawabKerja' => $request->InisiatifTanggungJawabKerja,
                'Loyalitas' => $request->Loyalitas,
                'EtikaSopanSantun' => $request->EtikaSopanSantun,
                'Disiplin' => $request->Disiplin,
                'PemahamanKemampuan' => $request->PemahamanKemampuan,
                'KesehatanKeselamatanKerja' => $request->KesehatanKeselamatanKerja,
                'laporankerja' => $request->laporankerja,
                'kehadiran' => $request->kehadiran,
                'average' => $avgStar,
                'nilai_huruf' => $nilaihuruf,
                'status_penilaian' => 'Sudah di nilai',
                'keterangan' => $keterangan,
            ]);

        return redirect('/penilaian-magang');
    }

    public function Absen()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $mahasiswa = DB::table('data_mhs_indivs')
                ->leftJoin('users', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->select('data_mhs_indivs.id', 'users.role_id', 'data_mhs_indivs.nama')
                ->where('role_id', '=', 3)
                ->get();

            $smk =  DB::table('data_smk_indivs')
                ->leftJoin('users', 'data_smk_indivs.user_id', '=', 'users.id')
                ->select('data_smk_indivs.id', 'users.role_id', 'data_smk_indivs.nama')
                ->where('role_id', '=', 4)
                ->get();

            $ti = 'Absensi';
            return view('divisi.absen', [
                'ti' => $ti,
                'mahasiswa' => $mahasiswa,
                'smk' => $smk,

            ]);
        } else {
            return redirect()->back();
        }
    }

    public function lihat_absenmhs($id)
    {
        $user = DB::table('rekapabsenmhs')
            ->leftjoin('data_mhs_indivs', 'data_mhs_indivs.id', '=', 'rekapabsenmhs.id_individu')
            ->select('data_mhs_indivs.nama','rekapabsenmhs.id', 'rekapabsenmhs.id_individu', 'rekapabsenmhs.id', 'rekapabsenmhs.waktu_absen', 'rekapabsenmhs.latitude','rekapabsenmhs.longitude','rekapabsenmhs.jenis_absen', 'rekapabsenmhs.keterangan', 'rekapabsenmhs.file_absen')
            ->where('rekapabsenmhs.id_individu', '=', $id)
            ->get();
        $ti = 'Lihat Absensi';
        return view('divisi.lihat_absenmhs', [
            'ti' => $ti,
            'user' => $user,
        ]);
    }
    public function rekap_absenmhs()
    {
        $user = DB::table('rekapabsenmhs')
            ->leftjoin('data_mhs_indivs', 'data_mhs_indivs.id', '=', 'rekapabsenmhs.id_individu')
            ->select('data_mhs_indivs.nama', 'rekapabsenmhs.file_absen', 'rekapabsenmhs.id', 'rekapabsenmhs.waktu_absen','rekapabsenmhs.latitude','rekapabsenmhs.longitude', 'rekapabsenmhs.jenis_absen', 'rekapabsenmhs.keterangan')
            ->get();
        $ti = 'Rekap Absensi Mahasiswa';
        return view('divisi.rekap_absenmhs', [
            'ti' => $ti,
            'user' => $user,
        ]);
    }
    public function delete_lihatabsen_mhs($id_individu, $id)
    {
        $mhs = Absenmhs::find($id);
        $mhs = RekapAbsenmhs::find($id);

        // Hapus di local storage
        File::delete('file/absen/' . $mhs->file_absen);
        // Hapus di database
        DB::table('absenmhs')
            ->where('id', $id)
            ->delete();
        DB::table('rekapabsenmhs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }
    public function delete_rekapabsen_mhs($id)
    {
        $mhs = RekapAbsenmhs::find($id);
        // Hapus di local storage
        File::delete('file/absen/' . $mhs->file_absen);
        // Hapus di database
        DB::table('absenmhs')
            ->where('id', $id)
            ->delete();
        DB::table('rekapabsenmhs')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }
    public function rekap_absensmk()
    {
        $user = DB::table('rekapabsensmk')
            ->leftjoin('data_smk_indivs', 'data_smk_indivs.id', '=', 'rekapabsensmk.id_individu')
            ->select('data_smk_indivs.nama', 'rekapabsensmk.file_absen', 'rekapabsensmk.waktu_absen', 'rekapabsensmk.id', 'rekapabsensmk.jenis_absen', 'rekapabsensmk.keterangan')
            ->get();
        $ti = 'Rekap Absensi SMK';
        return view('divisi.rekap_absensmk', [
            'ti' => $ti,
            'user' => $user,
        ]);
    }
    public function delete_rekapabsen_smk($id)
    {
        $smk = RekapAbsensmk::find($id);
        // Hapus di local storage
        File::delete('file/absen/' . $smk->file_absen);
        // Hapus di database
        DB::table('absensmk')
            ->where('id', $id)
            ->delete();

        DB::table('rekapabsensmk')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }
    public function lihat_absensmk($id)
    {
        $user = DB::table('rekapabsensmk')
            ->leftjoin('data_smk_indivs', 'data_smk_indivs.id', '=', 'rekapabsensmk.id_individu')
            ->select('data_smk_indivs.nama', 'rekapabsensmk.waktu_absen', 'rekapabsensmk.id_individu', 'rekapabsensmk.id', 'rekapabsensmk.file_absen','rekapabsensmk.longitude','rekapabsensmk.latitude', 'rekapabsensmk.jenis_absen', 'rekapabsensmk.keterangan')
            ->where('data_smk_indivs.id', '=', $id)
            ->get();
        $ti = 'Lihat Absensi SMK';
        return view('divisi.lihat_absensmk', [
            'ti' => $ti,
            'user' => $user,
        ]);
    }
    public function delete_lihatabsen_smk($id_individu, $id)
    {
        $smk = AbsenSmk::find($id);
        $smk = RekapAbsensmk::find($id);

        // Hapus di local storage
        File::delete('file/absen/' . $smk->file_absen);
        // Hapus di database
        DB::table('absensmk')
            ->where('id', $id)
            ->delete();
        DB::table('rekapabsensmk')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }
    public function delete_lihatabsen_penelitian($id_individu, $id)
    {
        $penelitian = AbsenPenelitian::find($id);
        $penelitian = RekapAbsenpenelitian::find($id);

        // Hapus di local storage
        File::delete('file/absen/' . $penelitian->file_absen);
        // Hapus di database
        DB::table('absenpenelitian')
            ->where('id', $id)
            ->delete();
        DB::table('rekapabsenpenelitian')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Dat a berhasil dihapus');
        return redirect()->back();
    }
    public function cetak_absen_pdf($id)
    {
        $i = 1;
        $ti = 'Form Absen Praktikan';
        $users = DB::table('rekapabsenmhs')
            ->leftjoin('data_mhs_indivs', 'data_mhs_indivs.id', '=', 'rekapabsenmhs.id_individu')
            ->select('data_mhs_indivs.nama','rekapabsenmhs.id_individu','rekapabsenmhs.file_absen','rekapabsenmhs.latitude','rekapabsenmhs.longitude', 'rekapabsenmhs.waktu_absen', 'rekapabsenmhs.jenis_absen', 'rekapabsenmhs.keterangan')
            ->where('rekapabsenmhs.id_individu','=',$id)
            ->get();

        $pdf = PDF::loadview('divisi.CetakAbsenPdf', [
            'ti' => $ti,
            'users' => $users,
            'i' => $i

        ]);

        return $pdf->download('Rekap Absen MHS.pdf');
    }
    public function cetak_absen_smk_pdf($id)
    {
        $users = DB::table('rekapabsensmk')
            ->leftjoin('data_smk_indivs', 'data_smk_indivs.id', '=', 'rekapabsensmk.id_individu')
            ->select('data_smk_indivs.nama', 'rekapabsensmk.waktu_absen','rekapabsensmk.id_individu','rekapabsensmk.file_absen', 'rekapabsensmk.jenis_absen', 'rekapabsensmk.keterangan')
           ->where('rekapabsensmk.id_individu',$id)
            ->get();
        $ti = 'Form Absensi SMK';
        $i = 1;
        $pdf = PDF::loadview('divisi.CetakAbsenSmkPdf', [
            'ti' => $ti,
            'users' => $users,
            'i' => $i

        ]);

        return $pdf->download('Rekap Absen SMK.pdf');
    }
    public function rekap_absenpenelitian()
    {
        $user = DB::table('rekapabsenpenelitian')
            ->leftjoin('data_penelitian', 'data_penelitian.id', '=', 'rekapabsenpenelitian.id_individu')
            ->select('data_penelitian.nama', 'rekapabsenpenelitian.file_absen', 'rekapabsenpenelitian.id', 'rekapabsenpenelitian.waktu_absen', 'rekapabsenpenelitian.jenis_absen', 'rekapabsenpenelitian.keterangan')
            ->get();
        $ti = 'Rekap Absensi Penelitian';
        return view('divisi.rekap_absenpenelitian', [
            'ti' => $ti,
            'user' => $user,
        ]);
    }
    public function delete_rekapabsen_penelitian($id)
    {
        $penelitian = RekapAbsenpenelitian::find($id);
        // Hapus di local storage
        File::delete('file/absen/' . $penelitian->file_absen);
        // Hapus di database
        DB::table('absenpenelitian')
            ->where('id', $id)
            ->delete();
        DB::table('rekapabsenpenelitian')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }
    public function cetak_absen_penelitian_pdf($id)
    {
        $users = DB::table('rekapabsenpenelitian')
            ->leftjoin('data_penelitian', 'data_penelitian.id', '=', 'rekapabsenpenelitian.id_individu')
            ->select('data_penelitian.nama', 'rekapabsenpenelitian.waktu_absen','rekapabsenpenelitian.id_individu', 'rekapabsenpenelitian.file_absen', 'rekapabsenpenelitian.jenis_absen', 'rekapabsenpenelitian.keterangan')
            ->where('rekapabsenpenelitian.id_individu','=',$id)
            ->get();
        $ti = 'Form Absensi Penelitian';
        $i = 1;
        $pdf = PDF::loadview('divisi.CetakAbsenPenelitianPdf', [
            'ti' => $ti,
            'users' => $users,
            'i' => $i

        ]);

        return $pdf->download('Rekap Absen Penelitian.pdf');
    }
    // public function proses_absenmhs($id, Request $request)
    // {
    //     $user = DataMhsIndiv::where('user_id', '=', $id)->get();

    //     $absen = new Absenmhs;
    //     $absen->user_id = $id;
    //     $absen->waktu_awal = $request->waktu_awal;
    //     $absen->waktu_akhir = $request->waktu_akhir;
    //     $absen->keterangan = $request->keterangan;
    //     $absen->save();

    //     foreach ($user as $u) {
    //         $absen_indiv = new AbsenIndivsTabel;
    //         $absen_indiv->id_absen = $absen->id;
    //         $absen_indiv->id_individu = $u->id;
    //         $absen_indiv->status_absen = "Belum Absen";
    //         $absen_indiv->save();
    //     }

    //     return redirect('/absen');
    // }

    // public function proses_absensmk($id, Request $request)
    // {
    //     $user = DataSmkIndivs::where('user_id', '=', $id)->get();

    //     $absen = new AbsenSmk;
    //     $absen->user_id = $id;
    //     $absen->waktu_awal = $request->waktu_awal;
    //     $absen->waktu_akhir = $request->waktu_akhir;
    //     $absen->keterangan = $request->keterangan;
    //     $absen->save();

    //     foreach ($user as $u) {
    //         $absen_indiv = new AbsenSmksTabel;
    //         $absen_indiv->id_absen = $absen->id;
    //         $absen_indiv->id_individu = $u->id;
    //         $absen_indiv->status_absen = "Belum Absen";
    //         $absen_indiv->save();
    //     }

    //     return redirect('/absen');
    // }

    public function selesaiMhs()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Selesai';

            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.status_user', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 14)
                ->orWhere('users.role_id', '=', 15)
                ->orWhere('users.role_id', '=', 19)
                ->orWhere('users.role_id', '=', 20)
                ->orderBy('users.created_at', 'desc')
                ->get();

            return view('divisi.selesai', [
                'ti' => $ti,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_mhs_selesai($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Selesai';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $fileFoto = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('foto_mhs_models', 'data_mhs_indivs.id', '=', 'foto_mhs_models.id_individu')
                ->select('foto_mhs_models.id_individu', 'foto_mhs_models.id', 'foto_mhs_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();

            $filepdf = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('interview', 'data_mhs_indivs.id', '=', 'interview.id_individu')
                ->leftJoin('foto_i_d_mhs', 'data_mhs_indivs.id', '=', 'foto_i_d_mhs.id_individu')
                ->select('interview.fileinterview', 'interview.id', 'users.name', 'users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'users.email', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.user_id', 'foto_i_d_mhs.fotoID', 'foto_i_d_mhs.id_individu AS foto_individu', 'interview.id_individu AS interview_individu')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.proses-selesai-mhs', [
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
    public function update_selesai_mhs($id, Request $request)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Status Mahasiswa telah selesai');
        return redirect('/magang-selesai-mhs');
    }

    public function deleteselesaimhs($id)
    {
        $data = DB::table('data_mhs_indivs')->where('user_id', $id)->first();
        //delete user
        DB::table('users')->where('id', $id)->delete();
        //delete file
        DB::table('file_mhs_indivs')->where('user_id', $id)->delete();
        File::deleteDirectory('file/berkas-mahasiswa/' . $data->user_id);
        //delete interview
        DB::table('interview')->where('id_individu', $data->id)->delete();
        File::deleteDirectory('file/interview-mhs/' . $data->id);
        //delete foto
        DB::table('foto_i_d_mhs')->where('id_individu', $data->id)->delete();
        File::deleteDirectory('file/foto-mhs/' . $data->id);
        //delete dokumen
        DB::table('foto_mhs_models')->where('id_individu', $data->id)->delete();
        File::deleteDirectory('file/dokumen-mhs/' . $data->id);
        //absen mhs
        DB::table('tugasmhs')->where('user_id', $data->id)->delete();


        DB::table('rekap_kegiatan_mhs')->where('user_id', $data->id)->delete();
        File::deleteDirectory('file/foto-kegiatan-mhs/' . $data->user_id);

        DB::table('absenmhs')->where('id_individu', $data->id)->delete();
        File::deleteDirectory('file/absen/' . $data->user_id);
        //penilaian mhs
        DB::table('penilaians')->where('user_id', $data->id)->delete();
        DB::table('barangmhs')->where('user_id', $data->id)->delete();
        //mulai dan selesai
        DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->delete();
        //delete individu
        DB::table('data_mhs_indivs')->where('user_id', $id)->delete();
        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function deleteselesaimhskel($id)
    {
        $data = DB::table('data_mhs_indivs')->where('user_id', $id)->select('data_mhs_indivs.id', 'data_mhs_indivs.user_id')->get();
        //delete user
        DB::table('users')->where('id', $id)->delete();
        //delete file
        DB::table('file_mhs_indivs')->where('user_id', $id)->delete();
        //mulai dan selesai
        DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->delete();
        foreach ($data as $d) {
            File::deleteDirectory('file/berkas-mhs-kel/' . $d->user_id);
            DB::table('interview')->where('id_individu', $d->id)->delete();
            File::deleteDirectory('file/interview-mhs-kel/' . $d->id);
            DB::table('foto_i_d_mhs')->where('id_individu', $d->id)->delete();
            File::deleteDirectory('file/foto-mhs-kel/' . $d->id);
            DB::table('foto_mhs_models')->where('id_individu', $d->id)->delete();
            File::deleteDirectory('file/dokumen-mhs-kel/' . $d->id);
            DB::table('absenmhs')->where('id_individu', $d->id)->delete();
            DB::table('penilaians')->where('user_id', $d->id)->delete();
            DB::table('barangmhs')->where('user_id', $d->id)->delete();
            DB::table('tugasmhs')->where('user_id', $d->id)->delete();
    
            DB::table('rekap_kegiatan_mhs')->where('user_id', $d->id)->delete();
 
            File::deleteDirectory('file/foto-kegiatan-mhs/' . $d->user_id);
        }

        DB::table('data_mhs_indivs')->where('user_id', $id)->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function deleteselesaismk($id)
    {
        $data = DB::table('data_smk_indivs')->where('user_id', $id)->first();
        //delete user
        DB::table('users')->where('id', $id)->delete();
        //delete file
        DB::table('file_smk_indivs')->where('user_id', $id)->delete();
        File::deleteDirectory('file/berkas-smk/' . $data->user_id);
        //delete interview
        DB::table('interview_smk')->where('id_individu', $data->id)->delete();
        File::deleteDirectory('file/interview-smk/' . $data->id);
        //delete foto
        DB::table('foto_i_d_smks')->where('id_individu', $data->id)->delete();
        File::deleteDirectory('file/foto-smk/' . $data->id);
        //delete dokumen
        DB::table('foto_smk_models')->where('id_individu', $data->id)->delete();
        File::deleteDirectory('file/dokumen-smk/' . $data->id);
        //delete absen
        DB::table('absensmk')->where('id_individu', $data->id)->delete();
        File::deleteDirectory('file/absen/' . $data->user_id);
        //penilaian
        DB::table('penilaians_smk')->where('user_id', $data->id)->delete();
        //mulai dan selesai
        DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->delete();
        //delete individu
        DB::table('tugassmk')->where('user_id', $data->id)->delete();

        DB::table('rekap_kegiatan_smk')->where('user_id', $data->id)->delete();
        File::deleteDirectory('file/foto-kegiatan-smk/' . $data->user_id);

        DB::table('barangsmk')->where('user_id', $data->id)->delete();
        
        DB::table('data_smk_indivs')->where('user_id', $id)->delete();
        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function deleteselesaismkkel($id)
    {
        $data = DB::table('data_smk_indivs')->where('user_id', $id)->select('data_smk_indivs.id', 'data_smk_indivs.user_id')->get();
        //delete user
        DB::table('users')->where('id', $id)->delete();
        //delete file
        DB::table('file_smk_indivs')->where('user_id', $id)->delete();
        //mulai dan selesai
        DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->delete();
        foreach ($data as $d) {
            DB::table('tugassmk')->where('user_id', $d->id)->delete();
            DB::table('rekap_kegiatan_smk')->where('user_id', $d->id)->delete();
            File::deleteDirectory('file/foto-kegiatan-smk/' . $d->user_id);
            File::deleteDirectory('file/berkas-smk-kel/' . $d->user_id);
            DB::table('interview_smk')->where('id_individu', $d->id)->delete();
            DB::table('interview_smk')->where('id_individu', $d->id)->delete();
            File::deleteDirectory('file/interview-smk-kel/' . $d->id);
            File::deleteDirectory('file/foto-smk-kel/' . $d->id);
            DB::table('foto_smk_models')->where('id_individu', $d->id)->delete();
            File::deleteDirectory('file/dokumen-smk-kel/' . $d->id);
            DB::table('absensmk')->where('id_individu', $d->id)->delete();
            File::deleteDirectory('file/absen/' . $d->user_id);
            DB::table('penilaians_smk')->where('user_id', $d->id)->delete();
            DB::table('barangsmk')->where('user_id', $d->id)->delete();

        }
        DB::table('data_smk_indivs')->where('user_id', $id)->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function proses_smk_selesai($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Selesai';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $fileFoto = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('foto_smk_models', 'data_smk_indivs.id', '=', 'foto_smk_models.id_individu')
                ->select('foto_smk_models.id_individu', 'foto_smk_models.id', 'foto_smk_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();

            $filepdf = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('interview_smk', 'data_smk_indivs.id', '=', 'interview_smk.id_individu')
                ->leftJoin('foto_i_d_smks', 'data_smk_indivs.id', '=', 'foto_i_d_smks.id_individu')
                ->select('interview_smk.fileinterview', 'interview_smk.id', 'users.name', 'users.status_user', 'data_smk_indivs.nama', 'data_smk_indivs.nis',  'data_smk_indivs.alamat_rumah', 'users.email', 'data_smk_indivs.sekolah', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen',  'data_smk_indivs.no_hp', 'data_smk_indivs.user_id', 'foto_i_d_smks.fotoID', 'foto_i_d_smks.id_individu AS foto_individu', 'interview_smk.id_individu AS interview_individu')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.proses-selesai-smk', [
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
    public function update_selesai_smk($id, Request $request)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Status SMk telah selesai');
        return redirect('/magang-selesai-mhs');
    }
    public function hapus_penelitian_selesai($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        //delete file
        DB::table('file_penelitian')->where('user_id', $id)->delete();
        File::deleteDirectory('file/berkas-penelitian/' . $data->id);
        //delete foto
        DB::table('foto_i_d_penelitian')->where('user_id', $data->id)->delete();
        File::deleteDirectory('file/foto-penelitian/' . $data->id);
        //delete dokumen
        DB::table('foto_penelitian_models')->where('user_id', $data->id)->delete();
        File::deleteDirectory('file/dokumen-penelitian/' . $data->id);
        //absen
        DB::table('absenpenelitian')->where('id_individu', $data->id)->delete();
        //delete individu
        DB::table('data_penelitian')->where('user_id', $id)->delete();
        //mulai dan selesai
        DB::table('mulai_dan_selesai_penelitian')->where('user_id', $id)->delete();
        //delete user
        DB::table('users')->where('id', $id)->delete();
        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function interview()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Magang Interview';

            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.status_user',)
                ->where('users.role_id', '=', 16)
                ->orderBy('users.created_at', 'desc')
                ->get();

            $usersSmk = DB::table('users')
                ->select('users.id', 'users.name', 'users.status_user')
                ->where('users.role_id', '=', 17)
                ->orderBy('users.created_at', 'desc')
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
            $ti = 'Magang Interview';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $filepengajuan = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('interview', 'data_mhs_indivs.id', '=', 'interview.id_individu')
                ->select('interview.id_individu', 'interview.id', 'interview.fileinterview', 'users.name', 'data_mhs_indivs.nama', 'users.email', 'users.status_user', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.status_penerimaan', 'data_mhs_indivs.user_id')
                ->where('users.id', '=', $user_id)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_mhs')
                ->where('mulai_dan_selesai_mhs.user_id', '=', $user_id)
                ->get();

            return view('divisi.terima-interview-mhs', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepengajuan' => $filepengajuan,
                'tgl'=> $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function terimainterviewsmk($user_id)
    {

        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Hasil Interview';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $filepengajuan = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('interview_smk', 'data_smk_indivs.id', '=', 'interview_smk.id_individu')
                ->select('interview_smk.id_individu', 'interview_smk.id', 'interview_smk.fileinterview', 'users.name', 'data_smk_indivs.nama', 'users.email', 'users.status_user', 'data_smk_indivs.sekolah', 'data_smk_indivs.nis', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.no_hp', 'data_smk_indivs.user_id', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.status_penerimaan')
                ->where('users.id', '=', $user_id)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_smk')
                ->where('mulai_dan_selesai_smk.user_id', '=', $user_id)
                ->get();
            return view('divisi.terima-interview-smk', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepengajuan' => $filepengajuan,
                'tgl' => $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function kelola_jurusan()
    {
        if (auth()->user()->role_id == 18) {

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->select('users.id', 'users.name','data_mhs_indivs.divisi', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 6)
                ->orWhere('users.role_id', '=', 8)
                ->distinct()
                ->get();

            $usersSmk = DB::table('users')
                ->leftJoin('data_smk_indivs', 'data_smk_indivs.user_id', '=', 'users.id')
                ->select('users.id', 'users.name','data_smk_indivs.divisi', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 7)
                ->orWhere('users.role_id', '=', 9)
                ->distinct()
                ->get();

            $userspenelitian = DB::table('users')
                ->leftJoin('data_penelitian', 'data_penelitian.user_id', '=', 'users.id')
                ->select('users.id', 'users.name', 'users.email', 'data_penelitian.divisi','users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 21)
                ->get();

            $ti = 'Kelola Jurusan Magang';
            return view('divisi.kelolajurusan', [
                'ti' => $ti,
                'users' => $users,
                'usersSmk' => $usersSmk,
                'userspenelitian' => $userspenelitian
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }
    public function proses_kelola_mhs($user_id)
    {
        if (auth()->user()->role_id == 18) {
            $ti = 'Data Mahasiswa';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $filepdf = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->select('users.name', 'users.id', 'users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'users.email', 'data_mhs_indivs.univ', 'data_mhs_indivs.nim', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.user_id', 'data_mhs_indivs.status_penerimaan')
                ->where('users.id', '=', $user_id)
                ->get();

            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_mhs')
                ->where('mulai_dan_selesai_mhs.user_id', '=', $user_id)
                ->get();

            return view('divisi.proses-kelola-mhs', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepdf' => $filepdf,
                'departemen' => $departemen,
                'tgl' => $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_magang_departemen_mhs($user_id, Request $request)
    {
        DB::table('data_mhs_indivs')
            ->where('user_id', $user_id)
            ->update([
                'departemen' => $request->departemen,
        
            ]);
            DB::table('users')
            ->where('id', $user_id)
            ->update([
         
                'status_penerimaan' => $request->status_penerimaan
            ]);
        DB::table('rekapmhs')
            ->where('user_id', $user_id)
            ->update([
                'departemen' => $request->departemen,
                'status_penerimaan' => $request->status_penerimaan
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }
    public function update_departemen_mhs($user_id, Request $request)
    {
        DB::table('data_mhs_indivs')
        ->where('user_id', $user_id)
        ->update([
            'departemen' => $request->departemen,
    
        ]);
        DB::table('users')
        ->where('id', $user_id)
        ->update([
     
            'status_penerimaan' => $request->status_penerimaan
        ]);
    DB::table('rekapmhs')
        ->where('user_id', $user_id)
        ->update([
            'departemen' => $request->departemen,
            'status_penerimaan' => $request->status_penerimaan
        ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }
    public function update_magang_departemen_smk($user_id, Request $request)
    {
        DB::table('data_smk_indivs')
            ->where('user_id', $user_id)
            ->update([
                'departemen' => $request->departemen,

            ]);
            DB::table('users')
            ->where('id', $user_id)
            ->update([
         
                'status_penerimaan' => $request->status_penerimaan
            ]);
        DB::table('rekapsmk')
            ->where('user_id', $user_id)
            ->update([
                'departemen' => $request->departemen,
                'status_penerimaan' => $request->status_penerimaan
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }
    public function update_departemen_penelitian($user_id, Request $request)
    {
        DB::table('data_penelitian')
        ->where('user_id', $user_id)
        ->update([
            'departemen' => $request->departemen,

        ]);
        DB::table('users')
        ->where('id', $user_id)
        ->update([
     
            'status_penerimaan' => $request->status_penerimaan
        ]);
    DB::table('rekappenelitian')
        ->where('user_id', $user_id)
        ->update([
            'departemen' => $request->departemen,
            'status_penerimaan' => $request->status_penerimaan
        ]);



        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }

    public function update_departemen_smk($user_id, Request $request)
    {
        DB::table('data_smk_indivs')
        ->where('user_id', $user_id)
        ->update([
            'departemen' => $request->departemen,

        ]);
        DB::table('users')
        ->where('id', $user_id)
        ->update([
     
            'status_penerimaan' => $request->status_penerimaan
        ]);
    DB::table('rekapsmk')
        ->where('user_id', $user_id)
        ->update([
            'departemen' => $request->departemen,
            'status_penerimaan' => $request->status_penerimaan
        ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }

    public function update_magang_departemen_penelitian($user_id, Request $request)
    {
        DB::table('data_penelitian')
            ->where('user_id', $user_id)
            ->update([
                'departemen' => $request->departemen,

            ]);
            DB::table('users')
            ->where('id', $user_id)
            ->update([
         
                'status_penerimaan' => $request->status_penerimaan
            ]);
        DB::table('rekappenelitian')
            ->where('user_id', $user_id)
            ->update([
                'departemen' => $request->departemen,
                'status_penerimaan' => $request->status_penerimaan
            ]);


        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }

    public function proses_kelola_smk($user_id)
    {
        if (auth()->user()->role_id == 18) {
            $ti = 'Data Smk';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $filepdf = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->select('users.name', 'users.id', 'users.status_user', 'data_smk_indivs.nama', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'users.email', 'data_smk_indivs.sekolah', 'data_smk_indivs.nis', 'data_smk_indivs.jurusan', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.no_hp', 'data_smk_indivs.user_id')
                ->where('users.id', '=', $user_id)
                ->get();
            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_smk')
                ->where('mulai_dan_selesai_smk.user_id', '=', $user_id)
                ->get();
            return view('divisi.proses-kelola-smk', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepdf' => $filepdf,
                'departemen' => $departemen,
                'tgl' => $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_kelola_penelitian($user_id)
    {
        if (auth()->user()->role_id == 18) {
            $ti = 'Data penelitian';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();


            $fileFoto = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_penelitian_models', 'data_penelitian.id', '=', 'foto_penelitian_models.user_id')
                ->select('foto_penelitian_models.id', 'foto_penelitian_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();

            $filepdf = DB::table('file_penelitian')
                ->where('file_penelitian.user_id', '=', $user_id)
                ->get();

            $users = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.id', '=', 'foto_i_d_penelitian.user_id')
                ->select('users.name', 'users.id', 'users.status_user', 'data_penelitian.nama', 'data_penelitian.strata', 'data_penelitian.asal_instansi', 'data_penelitian.jurusan', 'data_penelitian.alamat_rumah', 'users.email', 'data_penelitian.judul_penelitian', 'data_penelitian.divisi', 'data_penelitian.departemen', 'data_penelitian.no_hp', 'data_penelitian.user_id', 'foto_i_d_penelitian.fotoID')
                ->where('users.id', '=', $user_id)
                ->get();
            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_penelitian')
                ->where('mulai_dan_selesai_penelitian.user_id', '=', $user_id)
                ->get();
            return view('divisi.proses-kelola-penelitian', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepdf' => $filepdf,
                'fileFoto' => $fileFoto,
                'departemen' => $departemen,
                'tgl' => $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_kuota($id, Request $request)
    {
        DB::table('kuota')
            ->where('id', $id)
            ->update([
                'tanggal_buka' => $request->tanggal_buka,
                'tanggal_tutup' => $request->tanggal_tutup,
                'divisi' => $request->divisi,
                'jenis_kuota' => $request->jenis_kuota,
                'tw1' => $request->tw1,
                'tw2' => $request->tw2,
                'tw3' => $request->tw3,
                'tw4' => $request->tw4,
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/kuota');
    }
    public function penerimaan_penelitian(Request $request)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan Penelitian';
            $cari = $request->cari;
            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.email', 'users.role_id', 'users.status_user','users.status_penerimaan')
                ->orderBy('users.created_at', 'desc')
                ->orWhere('users.name', 'like', "%" . $cari . "%")
                ->get();
            return view('divisi.penerimaan_penelitian', [
                'ti' => $ti,
                'users' => $users,
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }
    public function proses_penerimaan_penelitian($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penerimaan Penelitian';
            $filepdf = DB::table('file_penelitian')
                ->where('file_penelitian.user_id', '=', $user_id)
                ->get();
            $divisi = Divisi::all();
            $users = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.status_user', 'data_penelitian.divisi', 'users.status_penerimaan', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'data_penelitian.strata', 'data_penelitian.departemen', 'data_penelitian.jurusan', 'data_penelitian.alamat_rumah', 'data_penelitian.no_hp', 'data_penelitian.judul_penelitian')
                ->where('users.id', '=', $user_id)
                ->get();
            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_penelitian')
                ->where('mulai_dan_selesai_penelitian.user_id', '=', $user_id)
                ->get();
            return view('divisi.proses_penerimaan_penelitian', [
                'ti' => $ti,
                'users' => $users,
                'filepdf' => $filepdf,
                'divisi' => $divisi,
                'departemen' => $departemen,
                'tgl' => $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function berkas_penelitian($id)
    {
        $ti = 'Lihat Pdf';
        $users = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        $files = FilePenelitian::find($id);

        return view('divisi.pdf-penelitian', [
            'ti' => $ti,
            'files' => $files,
            'users' => $users
        ]);
    }
    public function update_penerimaan_penelitian($id, Request $request)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Status penerimaan berhasil diproses');
        return redirect('/diterima-penelitian');
    }
    public function update_penelitian_divisi($user_id, Request $request)
    {
        DB::table('data_penelitian')
            ->where('user_id', $user_id)
            ->update([
                'divisi' => $request->divisi,
            ]);
        DB::table('rekappenelitian')
            ->where('user_id', $user_id)
            ->update([
                'divisi' => $request->divisi,
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect()->back();
    }
    public function diterima_penelitian()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penelitian Dokumen';
            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.email', 'users.role_id', 'users.status_user')
                ->where('users.role_id', '=', 22)
                ->orderBy('users.created_at', 'desc')
                ->get();

            return view('divisi.diterima-penelitian', [
                'ti' => $ti,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function final_penerimaan_penelitian($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Peneletian Dokumen';
            $userid = DB::table('users')
                ->where('users.id', '=', $user_id)
                ->first();

            $fileFoto = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_penelitian_models', 'data_penelitian.user_id', '=', 'foto_penelitian_models.user_id')
                ->select('users.id AS user_id', 'foto_penelitian_models.id', 'foto_penelitian_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();

            $filepdf = DB::table('file_penelitian')
                ->where('file_penelitian.user_id', '=', $user_id)
                ->get();
               
            $users = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.user_id', '=', 'foto_i_d_penelitian.user_id')
                ->select('users.id AS user_id', 'users.name', 'users.status_user', 'data_penelitian.nama', 'data_penelitian.jurusan', 'data_penelitian.alamat_rumah', 'users.email', 'data_penelitian.asal_instansi', 'data_penelitian.jurusan', 'data_penelitian.judul_penelitian',  'data_penelitian.divisi', 'data_penelitian.departemen', 'data_penelitian.strata', 'data_penelitian.no_hp', 'data_penelitian.user_id', 'foto_i_d_penelitian.fotoID')
                ->where('users.id', '=', $user_id)
                ->get();
                $tgl = DB::table('mulai_dan_selesai_penelitian')
                ->where('mulai_dan_selesai_penelitian.user_id', '=', $user_id)
                ->get();
            return view('divisi.final-penerimaan-penelitian', [
                'ti' => $ti,
                'users' => $users,
                'userid' => $userid,
                'filepdf' => $filepdf,
                'fileFoto' => $fileFoto,
                'tgl'=> $tgl
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_final_penerimaan_penelitian($id, Request $request)
    {

        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect('/penelitian-aktif');
    }
    public function hapus_final_penerimaan_penelitian($id, $foto)
    {
        $dokumen = FotoPenelitianModels::find($id);
        // Hapus di file storage
        File::delete('file/dokumen-penelitian/' . $dokumen->user_id . '/' . $foto);
        // Hapus di database
        DB::table('foto_penelitian_models')
            ->where('id', $id)
            ->delete();

        session()->flash('succes', 'File berhasil dihapus');
        return redirect()->back();
    }
    public function penelitian_aktif()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penelitian Aktif';

            $data = DB::table('users')
            ->leftJoin('mulai_dan_selesai_penelitian','mulai_dan_selesai_penelitian.user_id','=','users.id')
                ->select('users.id', 'users.name', 'users.status_user','mulai_dan_selesai_penelitian.mulai','mulai_dan_selesai_penelitian.selesai')
                ->where('users.role_id', '=', 23)
                ->orderBy('users.created_at', 'asc')
                ->get();
            return view('divisi.penelitian-aktif', [
                'ti' => $ti,
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_penelitian_aktif($user_id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Penelitian Aktif';
            $userid = DB::table('users')->where('users.id', '=', $user_id)->get()->first();
            $fileFoto = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_penelitian_models', 'data_penelitian.user_id', '=', 'foto_penelitian_models.user_id')
                ->select('users.id AS user_id', 'foto_penelitian_models.id', 'foto_penelitian_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();
            $filepdf = DB::table('file_penelitian')->where('file_penelitian.user_id', '=', $user_id)->get();
            $tgl = DB::table('mulai_dan_selesai_penelitian')->where('mulai_dan_selesai_penelitian.user_id', '=', $user_id)->get();

            $users = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.user_id', '=', 'foto_i_d_penelitian.user_id')
                ->select('users.name', 'users.status_user', 'data_penelitian.nama', 'users.email', 'data_penelitian.asal_instansi', 'data_penelitian.divisi', 'data_penelitian.departemen', 'data_penelitian.strata', 'data_penelitian.alamat_rumah', 'data_penelitian.no_hp', 'data_penelitian.jurusan', 'data_penelitian.user_id', 'foto_i_d_penelitian.fotoID')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.proses-penelitian-aktif', [
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
    public function update_penelitian_aktif($id, Request $request)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Status penerimaan berhasil diproses');
        return redirect('/pnltn-selesai');
    }
    public function penelitian_aktif_waktu($id, Request $request)
    {
        $exist = DB::table('mulai_dan_selesai_penelitian')->where('user_id', $id)->first();
        if ($exist) {
            MulaiDanSelesaiPenelitian::where('user_id', $id)
                ->update([
                    'mulai' => $request->mulai,
                    'selesai' => $request->selesai
                ]);
            DB::table('rekappenelitian')->where('user_id', $id)->update([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
        } else {
            MulaiDanSelesaiPenelitian::create([
                'user_id' => $id,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
            DB::table('rekappenelitian')->where('user_id', $id)->update([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai
            ]);
        }

        session()->flash('succes', 'Setatus berhasil di proses');
        return redirect()->back();
    }

    public function absen_pnltn()
    {
        if (auth()->user()->role_id == 23 or auth()->user()->role_id == 1) {
            $penelitian = DB::table('data_penelitian')
                ->leftJoin('users', 'data_penelitian.user_id', '=', 'users.id')
                ->select('data_penelitian.id', 'users.role_id', 'data_penelitian.nama')
                ->where('role_id', '=', 23)
                ->get();
            $ti = 'Absen Penelitian';
            return view('divisi.absen-penelitian', [
                'ti' => $ti,
                'penelitian' => $penelitian,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function lihat_absenpenelitian($id)
    {
        $user = DB::table('absenpenelitian')
            ->leftjoin('data_penelitian', 'data_penelitian.id', '=', 'absenpenelitian.id_individu')
            ->select('data_penelitian.nama', 'absenpenelitian.id_individu', 'absenpenelitian.id', 'absenpenelitian.waktu_absen', 'absenpenelitian.file_absen', 'absenpenelitian.jenis_absen', 'absenpenelitian.keterangan')
            ->where('data_penelitian.id', '=', $id)
            ->get();
        $ti = 'Lihat Absensi Penelitian';
        return view('divisi.lihat_absenpenelitian', [
            'ti' => $ti,
            'user' => $user,
        ]);
    }

    // public function proses_absenpenelitian($id, Request $request)
    // {
    //     $user = DataPenelitian::where('user_id', '=', $id)->get();

    //     $absen = new AbsenPenelitian;
    //     $absen->user_id = $id;
    //     $absen->waktu_awal = $request->waktu_awal;
    //     $absen->waktu_akhir = $request->waktu_akhir;
    //     $absen->keterangan = $request->keterangan;
    //     $absen->save();

    //     foreach ($user as $u) {
    //         $absen_indiv = new AbsenPenelitian();
    //         $absen_indiv->id_absen = $absen->id;
    //         $absen_indiv->id_individu = $u->id;
    //         $absen_indiv->status_absen = "Belum Absen";
    //         $absen_indiv->save();
    //     }

    //     return redirect('/absen-pnltn');
    // }
    public function laporan_penelitian()
    {
        if (auth()->user()->role_id == 23 or auth()->user()->role_id == 1) {
            $user = DB::table('laporan_penelitian')->get();
            $id = 1;
            $ti = 'Laporan Penelitian';
            return view('divisi.laporan-penelitian', [
                'ti' => $ti,
                'id' => $id,
                'user' => $user,

            ]);
        } else {
            return redirect()->back();
        }
    }
    public function penelitian_selesai()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penelitian Selesai';

            $data = DB::table('users')
                ->select('users.id', 'users.name', 'users.status_user', 'users.role_id')
                ->where('users.role_id', '=', 24)
                ->orWhere('users.role_id', '=', 25)
                ->orderBy('users.created_at', 'asc')
                ->get();
            return view('divisi.penelitian-selesai', [
                'ti' => $ti,
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_penelitian_selesai($user_id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Penelitian Selesai';
            $userid = DB::table('users')->where('users.id', '=', $user_id)->get()->first();
            $fileFoto = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_penelitian_models', 'data_penelitian.user_id', '=', 'foto_penelitian_models.user_id')
                ->select('users.id AS user_id', 'foto_penelitian_models.id', 'foto_penelitian_models.foto')
                ->where('users.id', '=', $user_id)
                ->get();
            $filepdf = DB::table('file_penelitian')->where('file_penelitian.user_id', '=', $user_id)->get();
            $tgl = DB::table('mulai_dan_selesai_penelitian')->where('mulai_dan_selesai_penelitian.user_id', '=', $user_id)->get();

            $users = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->leftJoin('foto_i_d_penelitian', 'data_penelitian.user_id', '=', 'foto_i_d_penelitian.user_id')
                ->select('users.name', 'users.status_user', 'data_penelitian.nama', 'users.email', 'data_penelitian.asal_instansi', 'data_penelitian.divisi', 'data_penelitian.departemen', 'data_penelitian.strata', 'data_penelitian.alamat_rumah', 'data_penelitian.no_hp', 'data_penelitian.jurusan', 'data_penelitian.user_id', 'foto_i_d_penelitian.fotoID')
                ->where('users.id', '=', $user_id)
                ->get();

            return view('divisi.proses-penelitian-selesai', [
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
    public function update_penelitian_selesai($id, Request $request)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Status Penelitian telah selesai');
        return redirect('/pnltn-selesai');
    }
    public function divisi()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Divisi';
            $divisi = Divisi::all();

            return view('divisi.divisi', [
                'ti' => $ti,
                'divisi' => $divisi
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function tambah_divisi()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Tambah Divisi';

            return view('divisi.tambah-divisi', [
                'ti' => $ti,

            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_divisi(Request $request)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            Divisi::create([
                'nama_divisi' => $request->nama_divisi
            ]);
            return redirect('/divisi');
        } else {
            return redirect()->back();
        }
    }
    public function edit_divisi($id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Edit Divisi';
            $data = DB::table('divisi')->where('id', $id)->first();
            return view('divisi.edit-divisi', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_edit_divisi($id, Request $request)
    {
        DB::table('divisi')->where('id', $id)
            ->update([
                'nama_divisi' => $request->nama_divisi
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/divisi');
    }
    public function delete_divisi($id)
    {
        Divisi::find($id)->delete();

        session()->flash('succes', 'Divisi berhasil dihapus');
        return redirect()->back();
    }

    public function departemen()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Departemen';
            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'divisi.id', 'departemen.id_divisi')
                ->select('divisi.nama_divisi', 'departemen.id', 'departemen.nama_departemen')
                ->get();

            return view('divisi.departemen', [
                'ti' => $ti,
                'departemen' => $departemen
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function tambah_departemen()
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Tambah Departemen';
            $divisi = Divisi::all();

            return view('divisi.tambah-departemen', [
                'ti' => $ti,
                'divisi' => $divisi,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_departemen(Request $request)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            Departemen::create([
                'id_divisi' => $request->id_divisi,
                'nama_departemen' => $request->nama_departemen,
            ]);
            return redirect('/departemen');
        } else {
            return redirect()->back();
        }
    }
    public function edit_departemen($id)
    {
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Edit Departemen';
            $data = Departemen::find($id);
            $divisi = Divisi::all();
            return view('divisi.edit-departemen', [
                'ti' => $ti,
                'data' => $data,
                'divisi' => $divisi,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_edit_departemen($id, Request $request)
    {
        DB::table('departemen')->where('id', '=', $id)
            ->update([
                'id_divisi' => $request->id_divisi,
                'nama_departemen' => $request->nama_departemen,
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/departemen');
    }
    public function delete_departemen($id)
    {
        Departemen::find($id)->delete();

        session()->flash('succes', 'Departemen berhasil dihapus');
        return redirect()->back();
    }

    public function magang_kuota_penuh()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Magang Kuota Penuh';

            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.status_user', 'users.role_id')
                ->where('users.role_id', '=', 0)
                ->orderBy('users.created_at', 'desc')
                ->get();

            return view('divisi.magang-kuota-penuh', [
                'ti' => $ti,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function penelitian_kuota_penuh()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Penelitian Judul Ditolak';

            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.status_user', 'users.role_id')
                ->where('users.role_id', '=', 26)
                ->get();

            return view('divisi.penelitian-kuota-penuh', [
                'ti' => $ti,
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function ubah_magang_penuh_mhs($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Ubah Detail';
            $filepdf = DB::table('file_mhs_indivs')
                ->where('file_mhs_indivs.user_id', '=', $id)
                ->get();
            $divisi = Divisi::all();

            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.status_user', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.status_penerimaan', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.strata', 'data_mhs_indivs.jurusan', 'data_mhs_indivs.alamat_rumah', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.nim')
                ->where('users.id', '=', $id)
                ->get();

            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
            return view('divisi.ubah_magang_penuh_mhs', [
                'ti' => $ti,
                'users' => $users,
                'filepdf' => $filepdf,
                'divisi' => $divisi,
                'departemen' => $departemen,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function hapus_magang_penuh_mhs($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {

            $user = DB::table('users')->where('id', $id)->first();

            if ($user->status_user == "Mahasiswa") {
                $data = DB::table('data_mhs_indivs')->where('user_id', $id)->first();

                if (DB::table('file_mhs_indivs')->where('user_id', $id)->first()) {
                    File::deleteDirectory('file/berkas-mahasiswa/' . $id);
                    DB::table('file_mhs_indivs')->where('user_id', $id)->delete();
                }

                if ($data){
                    DB::table('penilaians')->where('user_id', $data->id)->delete();
                }

                DB::table('data_mhs_indivs')->where('user_id', $id)->delete();

                DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->delete();

                DB::table('rekapmhs')->where('user_id', $id)->delete();

                DB::table('users')->where('users.id', '=', $id)->delete();

            } else {
                $data = DB::table('data_mhs_indivs')->where('user_id', $id)->get();

                if (DB::table('file_mhs_indivs')->where('user_id', $id)->first()) {
                    File::deleteDirectory('file/berkas-mhs-kel/' . $id);
                }

                DB::table('file_mhs_indivs')->where('user_id', '=', $id)->delete();

                DB::table('data_mhs_indivs')->where('user_id', $id)->delete();

                DB::table('mulai_dan_selesai_mhs')->where('user_id', $id)->delete();

                DB::table('users')->where('users.id', '=', $id)->delete();

                foreach ($data as $d) {
                    DB::table('penilaians')->where('user_id', $d->id)->delete();
                    DB::table('rekapmhs')->where('user_id', $d->id)->delete();
                }
            }           

            session()->flash('succes', 'Akun Praktikan berhasil dihapus');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function ubah_magang_penuh_smk($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Ubah Detail';
            $filepdf = DB::table('file_smk_indivs')
                ->where('file_smk_indivs.user_id', '=', $id)
                ->get();
            $divisi = Divisi::all();
            $users = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.status_user', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen', 'data_smk_indivs.status_penerimaan', 'data_smk_indivs.nama', 'data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.no_hp', 'data_smk_indivs.nis')
                ->where('users.id', '=', $id)
                ->get();

            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
            return view('divisi.ubah_magang_penuh_smk', [
                'ti' => $ti,
                'users' => $users,
                'filepdf' => $filepdf,
                'divisi' => $divisi,
                'departemen' => $departemen,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function hapus_magang_penuh_smk($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {

            $user = DB::table('users')->where('id', $id)->first();

            if ($user->status_user == "SMK") {
                $data = DB::table('data_smk_indivs')->where('user_id', $id)->first();

                if (DB::table('file_smk_indivs')->where('user_id', $id)->first()) {
                    File::deleteDirectory('file/berkas-smk/' . $id);
                }

                DB::table('file_smk_indivs')->where('user_id', '=', $id)->delete();

                DB::table('data_smk_indivs')->where('user_id', $id)->delete();

                if ($data){
                    DB::table('penilaians_smk')->where('user_id', $data->id)->delete();
                }

                DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->delete();

                DB::table('rekapsmk')->where('user_id', $id)->delete();

                DB::table('users')->where('users.id', '=', $id)->delete();

            } else {
                $data = DB::table('data_smk_indivs')->where('user_id', $id)->get();

                if (DB::table('file_smk_indivs')->where('user_id', $id)->first()) {
                    File::deleteDirectory('file/berkas-smk-kel/' . $id);
                }

                DB::table('file_smk_indivs')->where('user_id', '=', $id)->delete();

                DB::table('data_smk_indivs')->where('user_id', $id)->delete();

                DB::table('mulai_dan_selesai_smk')->where('user_id', $id)->delete();

                DB::table('users')->where('users.id', '=', $id)->delete();

                foreach ($data as $d) {
                    DB::table('penilaians_smk')->where('user_id', $d->id)->delete();
                    DB::table('rekapsmk')->where('user_id', $d->id)->delete();
                }
            }

            session()->flash('succes', 'Akun Praktikan berhasil dihapus');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function ubah_magang_penuh_penelitian($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Ubah Detail';
            $filepdf = DB::table('file_penelitian')
                ->where('file_penelitian.user_id', '=', $id)
                ->get();
            $divisi = Divisi::all();
            $users = DB::table('users')
                ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.status_user', 'data_penelitian.divisi', 'data_penelitian.departemen', 'data_penelitian.status_penerimaan', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'data_penelitian.strata', 'data_penelitian.jurusan', 'data_penelitian.alamat_rumah', 'data_penelitian.no_hp', 'data_penelitian.judul_penelitian')
                ->where('users.id', '=', $id)
                ->get();

            $departemen = DB::table('departemen')
                ->leftJoin('divisi', 'departemen.id_divisi', '=', 'divisi.id')
                ->where('divisi.nama_divisi', '=', $users[0]->divisi)
                ->get();
            return view('divisi.ubah_magang_penuh_penelitian', [
                'ti' => $ti,
                'users' => $users,
                'filepdf' => $filepdf,
                'divisi' => $divisi,
                'departemen' => $departemen,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function hapus_magang_penuh_penelitian($id) 
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            if (DB::table('file_penelitian')->where('user_id', $id)->first()) {
                File::deleteDirectory('file/berkas-penelitian/' . $id);
            }

            DB::table('file_penelitian')->where('user_id', '=', $id)->delete();

            DB::table('data_penelitian')->where('user_id', $id)->delete();

            DB::table('mulai_dan_selesai_penelitian')->where('user_id', $id)->delete();

            DB::table('rekappenelitian')->where('user_id', $id)->delete();

            DB::table('users')->where('users.id', '=', $id)->delete();

            session()->flash('succes', 'Akun Praktikan berhasil dihapus');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function absen_divisi()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $mahasiswa = DB::table('data_mhs_indivs')
                ->leftJoin('users', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->select('data_mhs_indivs.id', 'users.role_id', 'users.status_user', 'data_mhs_indivs.nama', 'data_mhs_indivs.divisi')
                ->where('role_id', '=', 3)
                ->get();

            $smk =  DB::table('data_smk_indivs')
                ->leftJoin('users', 'data_smk_indivs.user_id', '=', 'users.id')
                ->select('data_smk_indivs.id', 'users.role_id',  'users.status_user', 'data_smk_indivs.nama', 'data_smk_indivs.divisi')
                ->where('role_id', '=', 4)
                ->get();

            $ti = 'Absen';
            return view('divisi.absen-divisi', [
                'ti' => $ti,
                'mahasiswa' => $mahasiswa,
                'smk' => $smk,

            ]);
        } else {
            return redirect()->back();
        }
    }
    public function kegiatan_magang(){
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $id = Auth::user()->id;
            $users = DB::table('users')
            ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.status_user', 'data_mhs_indivs.divisi')
            ->where('users.role_id', '=', 3)
            ->where('data_mhs_indivs.divisi', Auth::user()->status_user)
            ->distinct()
            ->get();

        $usersSmk = DB::table('users')
            ->leftJoin('data_smk_indivs', 'data_smk_indivs.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.status_user', 'data_smk_indivs.divisi')
            ->where('users.role_id', '=', 4)
            ->where('data_smk_indivs.divisi', Auth::user()->status_user)
            ->distinct()
            ->get();

            $i= 1;
            $ti = 'Kegiatan Magang';
            return view('divisi.kegiatan-magang-divisi', [
                'ti' => $ti,
                'i' => $i,
                'users' => $users,
                'usersSmk' => $usersSmk,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function kegiatan_magang_mhs($id){
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $users = DB::table('tugasmhs')->get();
            $mahasiswa = DB::table('rekap_kegiatan_mhs')
            ->where('rekap_kegiatan_mhs.user_id','=', $id)
            ->get();
            $user = User::find($id);
            $ti = 'Kegiatan Magang Mahasiswa';
            $i = 0;
            return view('divisi.kegiatan-magang-divisi-mhs', [
                'ti' => $ti,
                'user'=> $user,
                'users'=> $users,
                'mahasiswa'=> $mahasiswa,
                'i'=> $i
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function kegiatan_magang_smk($id){
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $users = DB::table('tugassmk')->get();
            $mahasiswa = DB::table('rekap_kegiatan_smk')
            ->where('rekap_kegiatan_smk.user_id','=', $id)
            ->get();
            $user = User::find($id);
            $ti = 'Kegiatan Magang SMK';
            $i = 0;
            return view('divisi.kegiatan-magang-divisi-smk', [
                'ti' => $ti,
                'user'=> $user,
                'users'=> $users,
                'mahasiswa' => $mahasiswa,
                'i'=> $i
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_kegiatan_magang_mhs($id, Request $request){
       
        if($request->file('file_tugas') != null){
        $file = $request->file('file_tugas');
        $namafile = $file->getClientOriginalName();
        $tujuan_upload = 'file/kegiatan-mhs/';
        $file->move($tujuan_upload, $namafile);
        Tugasmhs::create([
           'user_id' => $id,
           'nama_pembimbing'=> $request->nama_pembimbing,
           'judul'=> $request->judul,
           'deskripsi_tugas'=> $request->deskripsi_tugas,
           'jenis_tugas'=> $request->jenis_tugas,
           'tanggal_mulai'=> $request->tanggal_mulai,
           'tanggal_selesai'=> $request->tanggal_selesai,
           'status_kegiatan' => 'Belum Selesai',
           'file_tugas'=> $namafile,
        ]);
       
    }
    else{
        Tugasmhs::create([
            'user_id' => $id,
            'nama_pembimbing'=> $request->nama_pembimbing,
            'judul'=> $request->judul,
            'deskripsi_tugas'=> $request->deskripsi_tugas,
            'jenis_tugas'=> $request->jenis_tugas,
           'tanggal_mulai'=> $request->tanggal_mulai,
           'tanggal_selesai'=> $request->tanggal_selesai,
           'status_kegiatan' => 'Belum Selesai',
        ]);
       
    }
        return redirect()->back();
    }
    public function delete_kegiatan_magang_mhs($id){
        $kegiatanmagang = DB::table('tugasmhs')->find($id);
        // Hapus di file storage
        File::delete('file/kegiatan-mhs/' . $kegiatanmagang->file_tugas);
        // Hapus di database
        DB::table('tugasmhs')
            ->where('id', $kegiatanmagang->id)
            ->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function proses_kegiatan_magang_smk($id, Request $request){
       
        if($request->file('file_tugas') != null){
        $file = $request->file('file_tugas');
        $namafile = $file->getClientOriginalName();
        $tujuan_upload = 'file/kegiatan-smk/';
        $file->move($tujuan_upload, $namafile);
        Tugassmk::create([
           'user_id' => $id,
           'nama_pembimbing'=> $request->nama_pembimbing,
           'judul'=> $request->judul,
           'deskripsi_tugas'=> $request->deskripsi_tugas,
           'jenis_tugas'=> $request->jenis_tugas,
           'tanggal_mulai'=> $request->tanggal_mulai,
           'tanggal_selesai'=> $request->tanggal_selesai,
           'status_kegiatan' => 'Belum Selesai',
           'file_tugas'=> $namafile,
        ]);
       
    }
    else{
        Tugassmk::create([
            'user_id' => $id,
            'nama_pembimbing'=> $request->nama_pembimbing,
            'judul'=> $request->judul,
            'deskripsi_tugas'=> $request->deskripsi_tugas,
            'jenis_tugas'=> $request->jenis_tugas,
           'tanggal_mulai'=> $request->tanggal_mulai,
           'tanggal_selesai'=> $request->tanggal_selesai,
           'status_kegiatan' => 'Belum Selesai',
        ]);
       
    }
        return redirect()->back();
    }
    public function delete_kegiatan_magang_smk($id){
        $kegiatanmagang = DB::table('tugassmk')->find($id);
        // Hapus di file storage
        File::delete('file/kegiatan-smk/' . $kegiatanmagang->file_tugas);
        // Hapus di database
        DB::table('tugassmk')
            ->where('id', $kegiatanmagang->id)
            ->delete();

        session()->flash('succes', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function laporan_divisi()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $user = DB::table('laporans')->get();
            $userSmk = DB::table('laporans_smk')->get();

            $id = 1;
            $ti = 'Laporan Akhir';
            return view('divisi.laporan-divisi', [
                'ti' => $ti,
                'id' => $id,
                'user' => $user,
                'userSmk' => $userSmk,
            ]);
        } else {
            return redirect()->back();
        }
    }
   

    public function editlaporan_divisi($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $data = DB::table('laporans')->where('id', $id)->first();
            $ti = 'Edit Laporan';
            return view('divisi.editlaporandivisi', ['ti' => $ti, 'data' => $data]);
        } else {
            return redirect()->back();
        }
    }

    public function proseseditlaporan_divisi($id, Request $request)
    {
        if ($request->file('path') != null){
        $lama = Laporan::find($id);
        File::delete('file/laporan-mhs/' . $lama->path);
        $file = $request->file('path');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-mhs/';
        $file->move($tujuan_upload, $nama_file);
        }else{
        $nama_file = null;
        }
        DB::table('laporans')->where('id', $id)
            ->update([
                'nama_pembimbing_lapangan'=> $request->nama_pembimbing_lapangan,
                'path'=> $nama_file,
                'revisi_divisi' => $request->revisi_divisi
            ]);
       
        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/laporan-divisi');
    }
    public function editlaporansmk_divisi($id)
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $data = DB::table('laporans_smk')->where('id', $id)->first();
            $ti = 'Edit Laporan';
            return view('divisi.editlaporansmkdivisi', ['ti' => $ti, 'data' => $data]);
        } else {
            return redirect()->back();
        }
    }
    public function proseseditlaporansmk_divisi($id, Request $request)
    {
        if ($request->file('path') != null){
        $lama = LaporanSmk::find($id);
        File::delete('file/laporan-smk/' . $lama->path);
        $file = $request->file('path');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file/laporan-smk';
        $file->move($tujuan_upload, $nama_file);
        }else{
            $nama_file = null;
        }
        DB::table('laporans_smk')->where('id', $id)
            ->update([
                'nama_pembimbing_lapangan'=> $request->nama_pembimbing_lapangan,
                'path'=> $nama_file,
                'revisi_divisi' => $request->revisi_divisi
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/laporan-divisi');
    }
    public function penilaian_divisi()
    {

        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $id = Auth::user()->id;
            $users = DB::table('data_mhs_indivs')
                ->leftJoin('users', 'users.id', 'data_mhs_indivs.user_id')
                ->leftJoin('penilaians', 'penilaians.user_id', '=', 'data_mhs_indivs.id')
                ->select('data_mhs_indivs.id', 'data_mhs_indivs.nama', 'data_mhs_indivs.divisi', 'users.role_id', 'penilaians.status_penilaian', 'penilaians.user_id')
                ->where('role_id', '=', 3)
                ->get();

            $usersSmk = DB::table('users')
                ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
                ->leftJoin('penilaians_smk', 'data_smk_indivs.id', '=', 'penilaians_smk.user_id')
                ->select('data_smk_indivs.id', 'data_smk_indivs.user_id', 'data_smk_indivs.nama', 'data_smk_indivs.divisi', 'users.role_id', 'penilaians_smk.status_penilaian')
                ->where('users.role_id', '=', 4)
                ->get();

            $id = 1;
            $ti = 'Penilaian';
            return view('divisi.penilaian-divisi', [
                'ti' => $ti,
                'id' => $id,
                'users' => $users,
                'usersSmk' => $usersSmk,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function isi_penilaian_divisi($id)
    {
        $user = DataMhsIndiv::find($id);
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Form Penilaian';
            return view('divisi.penilaian_mhs_divisi', ['ti' => $ti, 'user' => $user]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_penilaian_divisi($id, Request $request)
    {
        $user = DataMhsIndiv::find($id);
        $avgStar = 0;
        $nilaihuruf = "";
        $keterangan = "";

        $avgStar = ($request->Kerjasama +  $request->MotivasiPercayaDiri + $request->InisiatifTanggungJawabKerja + $request->Loyalitas + $request->EtikaSopanSantun + $request->Disiplin + $request->PemahamanKemampuan + $request->KesehatanKeselamatanKerja + $request->laporankerja + $request->kehadiran) / 10;
        if ($avgStar >= 81 && $avgStar <= 100) {
            $nilaihuruf = "A";
            $keterangan = "Istimewa";
        } else if ($avgStar >= 71  && $avgStar <= 80) {
            $nilaihuruf = "AB";
            $keterangan = "Sangat Baik";
        } else if ($avgStar >= 67  && $avgStar <= 70) {
            $nilaihuruf = "B";
            $keterangan = "Baik";
        } else if ($avgStar >= 61  && $avgStar <= 66) {
            $nilaihuruf = "BC";
            $keterangan = "Cukuo Baik";
        } else if ($avgStar >= 56  && $avgStar <= 60) {
            $nilaihuruf = "C";
            $keterangan = "Cukup";
        } else if ($avgStar >= 41  && $avgStar <= 55) {
            $nilaihuruf = "D";
            $keterangan = "Kurang";
        } else if ($avgStar >= 0  && $avgStar <= 55) {
            $nilaihuruf = "E";
            $keterangan = "Gagal";
        }

        DB::table('penilaians')->where('user_id', $id)
            ->update([
                'pembimbing' => $request->pembimbing,
                'Kerjasama' => $request->Kerjasama,
                'MotivasiPercayaDiri' => $request->MotivasiPercayaDiri,
                'InisiatifTanggungJawabKerja' => $request->InisiatifTanggungJawabKerja,
                'Loyalitas' => $request->Loyalitas,
                'EtikaSopanSantun' => $request->EtikaSopanSantun,
                'Disiplin' => $request->Disiplin,
                'PemahamanKemampuan' => $request->PemahamanKemampuan,
                'KesehatanKeselamatanKerja' => $request->KesehatanKeselamatanKerja,
                'laporankerja' => $request->laporankerja,
                'kehadiran' => $request->kehadiran,
                'average' => $avgStar,
                'nilai_huruf' => $nilaihuruf,
                'status_penilaian' => 'Sudah di nilai',
                'keterangan' => $keterangan,
            ]);

        return redirect('/penilaian-divisi');
    }

    public function isi_penilaian_smk_divisi($id)
    {
        $user = DataSmkIndivs::find($id);
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $ti = 'Form Penilaian';
            return view('divisi.penilaian_smk_divisi', ['ti' => $ti, 'user' => $user]);
        } else {
            return redirect()->back();
        }
    }
    public function proses_penilaian_smk_divisi($id, Request $request)
    {
        $user = DataSmkIndivs::find($id);
        $avgStar = 0;
        $nilaihuruf = "";
        $keterangan = "";

        $avgStar = ($request->Kerjasama +  $request->MotivasiPercayaDiri + $request->InisiatifTanggungJawabKerja + $request->Loyalitas + $request->EtikaSopanSantun + $request->Disiplin + $request->PemahamanKemampuan + $request->KesehatanKeselamatanKerja + $request->laporankerja + $request->kehadiran) / 10;
        if ($avgStar >= 81 && $avgStar <= 100) {
            $nilaihuruf = "A";
            $keterangan = "Istimewa";
        } else if ($avgStar >= 71  && $avgStar <= 80) {
            $nilaihuruf = "AB";
            $keterangan = "Sangat Baik";
        } else if ($avgStar >= 67  && $avgStar <= 70) {
            $nilaihuruf = "B";
            $keterangan = "Baik";
        } else if ($avgStar >= 61  && $avgStar <= 66) {
            $nilaihuruf = "BC";
            $keterangan = "Cukuo Baik";
        } else if ($avgStar >= 56  && $avgStar <= 60) {
            $nilaihuruf = "C";
            $keterangan = "Cukup";
        } else if ($avgStar >= 41  && $avgStar <= 55) {
            $nilaihuruf = "D";
            $keterangan = "Kurang";
        } else if ($avgStar >= 0  && $avgStar <= 55) {
            $nilaihuruf = "E";
            $keterangan = "Gagal";
        }

        DB::table('penilaians_smk')->where('user_id', $id)
            ->update([
                'pembimbing' => $request->pembimbing,
                'Kerjasama' => $request->Kerjasama,
                'MotivasiPercayaDiri' => $request->MotivasiPercayaDiri,
                'InisiatifTanggungJawabKerja' => $request->InisiatifTanggungJawabKerja,
                'Loyalitas' => $request->Loyalitas,
                'EtikaSopanSantun' => $request->EtikaSopanSantun,
                'Disiplin' => $request->Disiplin,
                'PemahamanKemampuan' => $request->PemahamanKemampuan,
                'KesehatanKeselamatanKerja' => $request->KesehatanKeselamatanKerja,
                'laporankerja' => $request->laporankerja,
                'kehadiran' => $request->kehadiran,
                'average' => $avgStar,
                'nilai_huruf' => $nilaihuruf,
                'status_penilaian' => 'Sudah di nilai',
                'keterangan' => $keterangan,
            ]);

        return redirect('/penilaian-divisi');
    }
    public function absen_penelitian_divisi()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $penelitian = DB::table('data_penelitian')
                ->leftJoin('users', 'data_penelitian.user_id', '=', 'users.id')
                ->select('data_penelitian.id', 'users.role_id', 'users.status_user', 'data_penelitian.nama', 'data_penelitian.divisi')
                ->where('role_id', '=', 23)
                ->get();

            $ti = 'Absen Penelitian';
            return view('divisi.absen-penelitian-divisi', [
                'ti' => $ti,
                'penelitian' => $penelitian,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function laporan_penelitian_divisi()
    {
        if (auth()->user()->role_id == 18 or auth()->user()->role_id == 1) {
            $user = DB::table('laporan_penelitian')->get();
            $id = 1;
            $ti = 'Laporan Akhir';
            return view('divisi.laporan-penelitian-divisi', [
                'ti' => $ti,
                'id' => $id,
                'user' => $user,

            ]);
        } else {
            return redirect()->back();
        }
    }
    public function konfirmasi_akun_admin(Request $request){
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            $ti = 'Konfirmasi Akun Pendaftar';
          
            $users = DB::table('users')
                ->select('users.id', 'users.name', 'users.email', 'users.role_id', 'users.status_user')
                ->orderBy('users.created_at', 'desc')
                ->get();


            return view('divisi.konfirmasi-akun-admin', [
                'ti' => $ti,
                'users' => $users,
           

            ])->with('i');
        } else {
            return redirect()->back();
        }
    }
    public function proses_konfirmasi_akun_admin($id,Request $request){
        DB::table('users')->where('id', $id)
            ->update([
                'role_id' => $request->role_id
            ]);

        session()->flash('succes', 'Konfirmasi Akun berhasil di proses');
        return redirect()->back();
    }
}