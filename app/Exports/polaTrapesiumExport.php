<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class polaTrapesiumExport implements FromCollection, WithHeadings
{
    protected $polaTrapesium;

    public function __construct($polaTrapesium)
    {
        $this->polaTrapesium = $polaTrapesium;

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->polaTrapesium->map(function($item){
            return [
                'Nomor Urut' => $item->id,
                'Nomor Koleksi' => $item -> tanaman->no_ketukan,
                'Nama Tanaman' => $item->tanaman->jenis,
                'Terpola Trapesium' => $item->terpola_trapesium,
                'Terpola Utuh' => $item->terpola_utuh,
                'Terpola Kubus' => $item->terpola_kubus,
                'Terpola Jumlah' => $item->terpola_jumlah,
            ];

        });

    }
    public function headings(): array {
        return [
            'Nomor Urut',
            'Nomor Koleksi',
            'Nama Tanaman',
            "terpola_trapesium",
            "terpola_utuh",
            "terpola_kubus",
            "terpola_jumlah",
        ];
    }
}
