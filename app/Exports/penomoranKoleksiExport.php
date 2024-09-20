<?php

namespace App\Exports;

use App\Models\penomoranKoleksi;
use Maatwebsite\Excel\Concerns\FromCollection;

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
