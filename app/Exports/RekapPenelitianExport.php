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
        return DB::table('users')
            ->leftJoin('data_penelitian', 'users.id', '=', 'data_penelitian.user_id')
            ->leftJoin('mulai_dan_selesai_penelitian', 'users.id', '=', 'mulai_dan_selesai_penelitian.user_id')
            ->select('data_penelitian.nama','data_penelitian.asal_instansi','data_penelitian.strata', 'data_penelitian.no_hp', 'data_penelitian.alamat_rumah', 'data_penelitian.divisi', 'data_penelitian.departemen','data_penelitian.created_at', 'mulai_dan_selesai_penelitian.mulai', 'mulai_dan_selesai_penelitian.selesai')
            ->where('users.status_user', '=', 'Penelitian')
            ->where('users.role_id', '!=', 1)
            ->get();
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Nis',
            'Sekolah',
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