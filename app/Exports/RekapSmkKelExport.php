<?php

namespace App\Exports;

use App\Models\DataSmkIndivs;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class RekapSmkKelExport implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('rekapsmk')
            ->select('rekapsmk.nama', 'rekapsmk.nis', 'rekapsmk.sekolah', 'rekapsmk.jurusan', 'rekapsmk.alamat_rumah', 'rekapsmk.no_hp', 'rekapsmk.divisi', 'rekapsmk.departemen', 'rekapsmk.created_at', 'rekapsmk.mulai', 'rekapsmk.selesai')
            ->where('status_user', "SMK Kelompok")
            ->get();
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Nis',
            'Sekolah',
            'Jurusan',
            'Alamat Rumah',
            'No Hp',
            'Divisi',
            'Departemen',
            'Tanggal Daftar',
            'Tanggal Masuk',
            'Tanggal Selesai',
        ];
    }
}