<?php

namespace App\Exports;

use App\Models\DataPenelitian;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class RekapPenelitianExport implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('rekappenelitian')
            ->select('rekappenelitian.nama', 'rekappenelitian.asal_instansi', 'rekappenelitian.strata', 'rekappenelitian.jurusan', 'rekappenelitian.no_hp', 'rekappenelitian.alamat_rumah', 'rekappenelitian.divisi', 'rekappenelitian.departemen', 'rekappenelitian.created_at', 'rekappenelitian.mulai', 'rekappenelitian.selesai')
            ->where('status_user', "Penelitian")
            ->get();
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Asal Instansi',
            'Strata',
            'Jurusan',
            'No Hp',
            'Alamat Rumah',
            'Divisi',
            'Departemen',
            'Tanggal Daftar',
            'Tanggal Masuk',
            'Tanggal Selesai',
        ];
    }
}