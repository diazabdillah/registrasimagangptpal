<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\DataMhsIndiv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // cek role_id user untuk akses menu
        if (auth()->user()->role_id == 1) {
            $ti = 'Dashboard';
            return view('admin.admin_dash', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function Rekap()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Rekap Individu';
            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('users.created_at', 'users.role_id', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'mulai_dan_selesai_mhs.mulai', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'mulai_dan_selesai_mhs.selesai')
                ->where('users.status_user', '=', 'individu')
                ->get();

            return view('admin.Rekap', [
                'ti' => $ti,
                'users' => $users
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function Rekapkelompok()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Rekap Kelompok';
            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('users.created_at', 'users.role_id', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'mulai_dan_selesai_mhs.mulai', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'mulai_dan_selesai_mhs.selesai')
                ->where('users.status_user', '=', 'kelompok')
                ->get();
            return view('admin.Rekapkelompok', [
                'ti' => $ti,
                'users' => $users
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function cetak_rekappdf()
    {
        $ti = 'Rekap Individu';
        $users = DB::table('users')
            ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
            ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
            ->select('users.created_at', 'users.role_id', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'mulai_dan_selesai_mhs.mulai', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'mulai_dan_selesai_mhs.selesai')
            ->where('users.status_user', '=', 'individu')
            ->get();

        $pdf = PDF::loadview('admin.RekapPDF', [
            'ti' => $ti,
            'users' => $users
        ]);
        return $pdf->stream();
    }

    public function cetak_rekap_kelompokpdf()
    {
        $ti = 'Rekap Kelompok';
            $users = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
                ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
                ->select('users.created_at', 'users.role_id', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'mulai_dan_selesai_mhs.mulai', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'mulai_dan_selesai_mhs.selesai')
                ->where('users.status_user', '=', 'kelompok')
                ->get();

        $pdf = PDF::loadview('admin.RekapKelompokPDF', [
            'ti' => $ti,
            'users' => $users
        ]);
        return $pdf->stream();
    }
}
