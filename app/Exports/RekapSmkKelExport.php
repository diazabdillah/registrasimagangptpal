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
        return DB::table('users')
            ->leftJoin('data_smk_indivs', 'users.id', '=', 'data_smk_indivs.user_id')
            ->leftJoin('mulai_dan_selesai_smk', 'users.id', '=', 'mulai_dan_selesai_smk.user_id')
            ->select('data_smk_indivs.nama','data_smk_indivs.nis','data_smk_indivs.sekolah', 'data_smk_indivs.jurusan', 'data_smk_indivs.alamat_rumah', 'data_smk_indivs.no_hp', 'data_smk_indivs.divisi', 'data_smk_indivs.departemen','users.created_at', 'mulai_dan_selesai_smk.mulai', 'mulai_dan_selesai_smk.selesai')
            ->where('users.status_user', '=', 'SMK Kelompok')
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