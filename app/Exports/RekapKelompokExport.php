<?php

namespace App\Exports;

use App\Models\DataMhsIndiv;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapKelompokExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataMhsIndiv::all();
    }
}
