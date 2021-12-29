<?php

namespace App\Exports;

use App\Models\DataMhsIndiv;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class RekapKelompokExport implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('rekapmhs')
            ->select('rekapmhs.nama','rekapmhs.nim', 'rekapmhs.univ', 'rekapmhs.strata', 'rekapmhs.jurusan', 'rekapmhs.no_hp', 'rekapmhs.divisi', 'rekapmhs.departemen', 'rekapmhs.created_at', 'rekapmhs.mulai', 'rekapmhs.selesai')
            ->where('status_user', "Mahasiswa Kelompok")
            ->get();
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Nim',
            'Universitas',
            'Strata',
            'Jurusan',
            'No_Hp',
            'Divisi',
            'Departemen',
            'Tanggal Daftar',
            'Tanggal Masuk',
            'Tanggal Selesai',
        ];
    }
}