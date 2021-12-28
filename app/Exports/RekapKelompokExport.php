<?php

namespace App\Exports;

use App\Models\DataMhsIndiv;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class RekapKelompokExport implements FromCollection,WithHeadings,WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $datamhs=DB::table('users')
            ->leftJoin('data_mhs_indivs', 'users.id', '=', 'data_mhs_indivs.user_id')
            ->leftJoin('mulai_dan_selesai_mhs', 'users.id', '=', 'mulai_dan_selesai_mhs.user_id')
            ->select('data_mhs_indivs.nama', 'data_mhs_indivs.univ', 'data_mhs_indivs.strata', 'data_mhs_indivs.no_hp', 'data_mhs_indivs.divisi', 'data_mhs_indivs.departemen', 'users.role_id', 'users.created_at', 'mulai_dan_selesai_mhs.mulai', 'mulai_dan_selesai_mhs.selesai')
            ->where('users.status_user', '=', 'Mahasiswa Kelompok')
            ->get();
    }
    public function map($datamhs): array
    {
        return [
            $datamhs->nama,
            $datamhs->nim,
            $datamhs->univ,
            $datamhs->strata,
            $datamhs->no_hp,
            $datamhs->divisi,
            $datamhs->departemen,
            $datamhs->created_at,
            $datamhs->tanggal_masuk,
            $datamhs->mulai,
            $datamhs->selesai,
        ];
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Nim',
            'Universitas',
            'Strata',
            'No_Hp',
            'Divisi',
            'Departemen',
            'Tanggal Daftar',
            'Tanggal Masuk',
            'Tanggal Selesai',
        ];
    }
}