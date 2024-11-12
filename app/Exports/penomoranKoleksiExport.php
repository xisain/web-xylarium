<?php

namespace App\Exports;

use App\Models\penomoranKoleksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class penomoranKoleksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return penomoranKoleksi::all();
    }
}
