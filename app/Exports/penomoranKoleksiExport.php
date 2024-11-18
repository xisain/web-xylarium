<?php

namespace App\Exports;

use App\Models\penomoranKoleksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class penomoranKoleksiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $penomoran;
    public function __construct($penomoran)
    {
        $this->penomoran = $penomoran;
    }
    public function collection(){
        return $this->penomoran->map(function($item){
            return [
                'Nomor' => $item->id,
                'Tanggal' => $item->date,
                'Nama Tanaman' => $item->penerimaan->nama_tanaman,
                'Suku' => $item->penerimaan->suku,
                'Tempat Asal ' => $item->penerimaan->habitus,
                'Nomor Koleksi'=> $item->nomor_koleksi,
                'Keterangan' => $item->keterangan,
                'Pelaksana' => $item->user->name,

            ];
        });
    }
    public function headings(): array {
        return [
            'Nomor',
            'Tanggal',
            'Nama Tanaman',
            'Suku',
            'Tempat Asal',
            'Nomor Koleksi',
            'Keterangan',
            'Pelaksana'
        ];
    }
}
