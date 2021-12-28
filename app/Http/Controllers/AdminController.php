<?php

namespace App\Http\Controllers;

use Excel;
use PDF;
use App\Models\Divisi;
use App\Exports\RekapExport;
use App\Exports\RekapKelompokExport;
use App\Exports\RekapSmkExport;
use App\Exports\RekapSmkKelExport;
use App\Exports\RekapPenelitianExport;
use Illuminate\Support\Facades\DB;

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
            $datamhs = DB::table('data_mhs_indivs')->count();
            $forum = DB::table('forum')->count();
            $datasmk = DB::table('data_smk_indivs')->count();
            $datapenelitian = DB::table('data_penelitian')->count();
            $datamhsaktif = DB::table('users')
                ->leftJoin('data_mhs_indivs', 'data_mhs_indivs.user_id', '=', 'users.id')
                ->select('users.role_id')
                ->where('users.role_id', '=', 3)
                ->count();
            $datasmkaktif = DB::table('users')
                ->leftJoin('data_smk_indivs', 'data_smk_indivs.user_id', '=', 'users.id')
                ->select('users.role_id')
                ->where('users.role_id', '=', 4)
                ->count();
            $datapenelitianaktif = DB::table('users')
                ->leftJoin('data_penelitian', 'data_penelitian.user_id', '=', 'users.id')
                ->select('users.role_id')
                ->where('users.role_id', '=', 23)
                ->count();
            $i = 1;
            $data = [$datamhsaktif, $datasmkaktif, $datapenelitianaktif];

            $sekpermhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Sekretaris Perusahaan')->count();
            $sekpersmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Sekretaris Perusahaan')->count();
            $sekperpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Sekretaris Perusahaan')->count();
            $sekpertotal = $sekpermhs + $sekpersmk + $sekperpenelitian;
            $spimhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Satuan Pengawasan Intern')->count();
            $spismk = DB::table('data_smk_indivs')->where('divisi', '=', 'Satuan Pengawasan Intern')->count();
            $spipenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Satuan Pengawasan Intern')->count();
            $spitotal = $spimhs + $spismk + $spipenelitian;
            $ntmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Naval Technology')->count();
            $ntsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Naval Technology')->count();
            $ntpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Naval Technology')->count();
            $nttotal = $ntmhs + $ntsmk + $ntpenelitian;
            $ppkmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Pemasaran dan Penjualan Kapal')->count();
            $ppksmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Pemasaran dan Penjualan Kapal')->count();
            $ppkpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Pemasaran dan Penjualan Kapal')->count();
            $ppktotal = $ppkmhs + $ppksmk + $ppkpenelitian;
            $prekumharmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Penjualan REKUMHAR')->count();
            $prekumharsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Penjualan REKUMHAR')->count();
            $prekumharpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Penjualan REKUMHAR')->count();
            $prekumhartotal = $prekumharmhs + $prekumharsmk + $prekumharpenelitian;
            $desainmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Desain')->count();
            $desainsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Desain')->count();
            $desainpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Desain')->count();
            $desaintotal = $desainmhs + $desainsmk + $desainpenelitian;
            $jkmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Jaminan Kualitas')->count();
            $jksmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Jaminan Kualitas')->count();
            $jkpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Jaminan Kualitas')->count();
            $jktotal = $jkmhs + $jksmk + $jkpenelitian;
            $scmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Supply Chain')->count();
            $scsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Supply Chain')->count();
            $scpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Supply Chain')->count();
            $sctotal = $scmhs + $scsmk + $scpenelitian;
            $kpmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Kapal Perang')->count();
            $kpsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Kapal Perang')->count();
            $kppenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Kapal Perang')->count();
            $kptotal = $kpmhs + $kpsmk = $kppenelitian;
            $ksmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Kapal Selam')->count();
            $kssmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Kapal Selam')->count();
            $kspenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Kapal Selam')->count();
            $kstotal = $ksmhs + $kssmk + $kspenelitian;
            $knmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Kapal Niaga')->count();
            $knsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Kapal Niaga')->count();
            $knpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Kapal Niaga')->count();
            $kntotal = $knmhs + $knsmk + $knpenelitian;
            $rumhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Rekayasa Umum')->count();
            $rusmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Rekayasa Umum')->count();
            $rupenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Rekayasa Umum')->count();
            $rutotal = $rumhs + $rusmk + $rupenelitian;
            $pnpmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Pemeliharaan dan Perbaikan')->count();
            $pnpsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Pemeliharaan dan Perbaikan')->count();
            $pnppenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Pemeliharaan dan Perbaikan')->count();
            $pnptotal = $pnpmhs + $pnpsmk + $pnppenelitian;
            $amhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Akuntansi')->count();
            $asmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Akuntansi')->count();
            $apenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Akuntansi')->count();
            $atotal = $amhs + $asmk + $apenelitian;
            $pspmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Perencanaan Strategis Perusahaan & Manajemen Risiko')->count();
            $pspsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Perencanaan Strategis Perusahaan & Manajemen Risiko')->count();
            $psppenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Perencanaan Strategis Perusahaan & Manajemen Risiko')->count();
            $psptotal = $pspmhs + $pspsmk + $psppenelitian;
            $pbmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Perbendaharaan')->count();
            $pbsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Perbendaharaan')->count();
            $pbpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Perbendaharaan')->count();
            $pbtotal = $pbmhs + $pbsmk + $pbpenelitian;
            $timhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Teknologi Informasi')->count();
            $tismk = DB::table('data_smk_indivs')->where('divisi', '=', 'Teknologi Informasi')->count();
            $tipenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Teknologi Informasi')->count();
            $titotal = $timhs + $tismk + $tipenelitian;
            $hcmmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Human Capital Management')->count();
            $hcmsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Human Capital Management')->count();
            $hcmpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Human Capital Management')->count();
            $hcmtotal = $hcmmhs + $hcmsmk + $hcmpenelitian;
            $kmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Kawasan')->count();
            $ksmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Kawasan')->count();
            $kpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Kawasan')->count();
            $ktotal = $kmhs + $ksmk + $kpenelitian;
            $kkmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Keamanan & K3LH')->count();
            $kksmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Keamanan & K3LH')->count();
            $kkpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Keamanan & K3LH')->count();
            $kktotal = $kkmhs + $kksmk + $kkpenelitian;
            $tjlmhs = DB::table('data_mhs_indivs')->where('divisi', '=', 'Unit Tanggung Jawab Sosial & Lingkungan')->count();
            $tjlsmk = DB::table('data_smk_indivs')->where('divisi', '=', 'Unit Tanggung Jawab Sosial & Lingkungan')->count();
            $tjlpenelitian = DB::table('data_penelitian')->where('divisi', '=', 'Unit Tanggung Jawab Sosial & Lingkungan')->count();
            $tjltotal = $tjlmhs + $tjlsmk + $tjlpenelitian;

            return view('admin.admin_dash', [
                'ti' => $ti,
                'i' => $i,
                'data' => $data,
                'datamhs' => $datamhs,
                'datasmk' => $datasmk,
                'forum' => $forum,
                'datapenelitian' => $datapenelitian,
                'sekpermhs' => $sekpermhs,
                'sekpersmk' => $sekpersmk,
                'sekperpenelitian' => $sekperpenelitian,
                'sekpertotal' => $sekpertotal,
                'spimhs' => $spimhs,
                'spismk' => $spismk,
                'spipenelitian' => $spipenelitian,
                'spitotal' => $spitotal,
                'ntmhs' => $ntmhs,
                'ntsmk' => $ntsmk,
                'ntpenelitian' => $ntpenelitian,
                'nttotal' => $nttotal,
                'ppkmhs' => $ppkmhs,
                'ppksmk' => $ppksmk,
                'ppkpenelitian' => $ppkpenelitian,
                'ppktotal' => $ppktotal,
                'prekumharmhs' => $prekumharmhs,
                'prekumharsmk' => $prekumharsmk,
                'prekumharpenelitian' => $prekumharpenelitian,
                'prekumhartotal' => $prekumhartotal,
                'desainmhs' => $desainmhs,
                'desainsmk' => $desainsmk,
                'desainpenelitian' => $desainpenelitian,
                'desaintotal' => $desaintotal,
                'jkmhs' => $jkmhs,
                'jksmk' => $jksmk,
                'jkpenelitian' => $jkpenelitian,
                'jktotal' => $jktotal,
                'scmhs' => $scmhs,
                'scsmk' => $scsmk,
                'scpenelitian' => $scpenelitian,
                'sctotal' => $sctotal,
                'kpmhs' => $kpmhs,
                'kpsmk' => $kpsmk,
                'kppenelitian' => $kppenelitian,
                'kptotal' => $kptotal,
                'ksmhs' => $ksmhs,
                'kssmk' => $kssmk,
                'kspenelitian' => $kspenelitian,
                'kstotal' => $kstotal,
                'knmhs' => $knmhs,
                'knsmk' => $knsmk,
                'knpenelitian' => $knpenelitian,
                'kntotal' => $kntotal,
                'rumhs' => $rumhs,
                'rusmk' => $rusmk,
                'rupenelitian' => $rupenelitian,
                'rutotal' => $rutotal,
                'pnpmhs' => $pnpmhs,
                'pnpsmk' => $pnpsmk,
                'pnppenelitian' => $pnppenelitian,
                'pnptotal' => $pnptotal,
                'amhs' => $amhs,
                'asmk' => $asmk,
                'apenelitian' => $apenelitian,
                'atotal' => $atotal,
                'pspmhs' => $pspmhs,
                'pspsmk' => $pspsmk,
                'psppenelitian' => $psppenelitian,
                'psptotal' => $psptotal,
                'pbmhs' => $pbmhs,
                'pbsmk' => $pbsmk,
                'pbpenelitian' => $pbpenelitian,
                'pbtotal' => $pbtotal,
                'timhs' => $timhs,
                'tismk' => $tismk,
                'tipenelitian' => $tipenelitian,
                'titotal' => $titotal,
                'hcmmhs' => $hcmmhs,
                'hcmsmk' => $hcmsmk,
                'hcmpenelitian' => $hcmpenelitian,
                'hcmtotal' => $hcmtotal,
                'kmhs' => $kmhs,
                'ksmk' => $ksmk,
                'kpenelitian' => $kpenelitian,
                'ktotal' => $ktotal,
                'kkmhs' => $kkmhs,
                'kksmk' => $kksmk,
                'kkpenelitian' => $kkpenelitian,
                'kktotal' => $kktotal,
                'tjlmhs' => $tjlmhs,
                'tjlsmk' => $tjlsmk,
                'tjlpenelitian' => $tjlpenelitian,
                'tjltotal' => $tjltotal,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function Rekapmhs()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Rekap Mahasiswa';
            $users = DB::table('rekapmhs')->get();

            return view('admin.Rekap', [
                'ti' => $ti,
                'users' => $users
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }
    public function Rekapmhskel()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Rekap Mahasiswa Kelompok';
            $users = DB::table('rekapmhs')->get();

            return view('admin.Rekapmhskel', [
                'ti' => $ti,
                'users' => $users
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }
    public function Rekapsmk()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Rekap SMK';
            $users = DB::table('rekapsmk')->get();
            return view('admin.Rekapsmk', [
                'ti' => $ti,
                'users' => $users
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }
    public function Rekapsmkkel()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Rekap Smk Kelompok';
            $users = DB::table('rekapsmk')->get();
            return view('admin.Rekapsmkkel', [
                'ti' => $ti,
                'users' => $users
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }
    public function Rekappenelitian()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Rekap Penelitian';
            $users = DB::table('rekappenelitian')->get();
            return view('admin.Rekappenelitian', [
                'ti' => $ti,
                'users' => $users
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }
    public function cetak_rekapmhspdf()
    {
        $ti = 'Rekap Mahasiswa Magang';
        $users = DB::table('users')
            ->leftJoin('rekapmhs', 'users.id', '=', 'rekapmhs.user_id')
            ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
            ->select('users.created_at', 'users.role_id', 'users.status_user', 'rekapmhs.strata', 'rekapmhs.nim', 'rekapmhs.no_hp', 'mulai_dan_selesai_mhs.mulai', 'rekapmhs.divisi', 'rekapmhs.departemen', 'rekapmhs.nama', 'rekapmhs.univ', 'mulai_dan_selesai_mhs.selesai')
            ->where('users.status_user', '=', 'Mahasiswa')
            ->get();

        $pdf = PDF::loadview('admin.RekapPDF', [
            'ti' => $ti,
            'users' => $users
        ]);

        return $pdf->stream();
    }

    public function cetak_rekapmhsexcel()
    {
        return Excel::download(new RekapExport, 'Rekap Magang Mahasiswa PT PAL INDONESIA.xlsx');
    }
    public function cetak_rekapsmkexcel()
    {
        return Excel::download(new RekapSmkExport, 'Rekap Magang Smk PT PAL INDONESIA.xlsx');
    }
    public function cetak_rekapsmkkelexcel()
    {
        return Excel::download(new RekapSmkKelExport, 'Rekap Magang Smk Kelompok PT PAL INDONESIA.xlsx');
    }
    public function cetak_rekappenelitianexcel()
    {
        return Excel::download(new RekapPenelitianExport, 'Rekap Magang Penelitian PT PAL INDONESIA.xlsx');
    }
    public function cetak_rekapsmkpdf()
    {
        $ti = 'Rekap Smk';
        $users = DB::table('users')
            ->leftJoin('rekapsmk', 'users.id', '=', 'rekapsmk.user_id')
            ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
            ->select('users.created_at', 'users.role_id', 'rekapsmk.nis', 'rekapsmk.no_hp', 'mulai_dan_selesai_smk.mulai', 'rekapsmk.divisi', 'rekapsmk.departemen', 'rekapsmk.nama', 'rekapsmk.sekolah', 'mulai_dan_selesai_smk.selesai')
            ->where('users.status_user', '=', 'Smk')
            ->get();

        $pdf = PDF::loadview('admin.RekapSmkPDF', [
            'ti' => $ti,
            'users' => $users
        ]);
        return $pdf->stream();
    }
    public function cetak_rekapmhskelpdf()
    {
        $ti = 'Rekap Mahasiswa Kelompok';
        $users = DB::table('users')
            ->leftJoin('rekapmhs', 'users.id', '=', 'rekapmhs.user_id')
            ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
            ->select('users.created_at', 'users.role_id', 'users.status_user', 'rekapmhs.strata', 'rekapmhs.nim', 'rekapmhs.no_hp', 'mulai_dan_selesai_mhs.mulai', 'rekapmhs.divisi', 'rekapmhs.departemen', 'rekapmhs.nama', 'rekapmhs.univ', 'mulai_dan_selesai_mhs.selesai')
            ->where('users.status_user', '=', 'Mahasiswa kelompok')
            ->get();

        $pdf = PDF::loadview('admin.RekapMhsKelPDF', [
            'ti' => $ti,
            'users' => $users
        ]);

        return $pdf->stream();
    }
    public function cetak_rekapsmkkelpdf()
    {
        $ti = 'Rekap Smk';
        $users = DB::table('users')
            ->leftJoin('rekapsmk', 'users.id', '=', 'rekapsmk.user_id')
            ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
            ->select('users.created_at', 'users.role_id', 'rekapsmk.nis', 'rekapsmk.no_hp', 'mulai_dan_selesai_smk.mulai', 'rekapsmk.divisi', 'rekapsmk.departemen', 'rekapsmk.nama', 'rekapsmk.sekolah', 'mulai_dan_selesai_smk.selesai')
            ->where('users.status_user', '=', 'Smk Kelompok')
            ->get();

        $pdf = PDF::loadview('admin.RekapSmkKelPDF', [
            'ti' => $ti,
            'users' => $users
        ]);
        return $pdf->stream();
    }
    public function cetak_rekappenelitianpdf()
    {
        $ti = 'Rekap Smk';
        $users = DB::table('users')
            ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
            ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
            ->select('users.created_at', 'users.role_id', 'data_penelitian.strata', 'data_penelitian.no_hp', 'mulai_dan_selesai_penelitian.mulai', 'data_penelitian.divisi', 'data_penelitian.departemen', 'data_penelitian.nama', 'data_penelitian.asal_instansi', 'mulai_dan_selesai_penelitian.selesai')
            ->where('users.status_user', '=', 'Penelitian')
            ->get();

        $pdf = PDF::loadview('admin.RekapPenelitianPDF', [
            'ti' => $ti,
            'users' => $users
        ]);
        return $pdf->stream();
    }
    public function cetak_rekapmhskelexcel()
    {
        return Excel::download(new RekapKelompokExport, 'Rekap Magang Mahasiswa Kelompok PT PAL INDONESIA.xlsx');
    }
}