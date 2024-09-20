<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\pengeringan;

class pengeringanExport implements FromCollection, WithHeadings
{
    protected $pengeringan;

    public function __construct($pengeringan)
    {
        $this->pengeringan = $pengeringan;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Transform the pengeringan collection to include tanaman jenis and famili
        return $this->pengeringan->map(function($item) {
            return [
                'Nomor Urut' => $item->id,
                'Nomor Koleksi' => $item->tanaman->no_ketukan,
                'Nama Tanaman' => $item->tanaman->jenis, // tanaman jenis
                'Suku' =>$item->tanaman->famili, // famili name
                'Habitus' => $item->tanaman->lokasi,
                'Lokasi' => $item->tanaman->lokasi,
                'Tanggal Masuk' => $item->tanggal_masuk,
                'Tanggal Keluar' => $item->tanggal_keluar,
                'Pelaksana' => $item->user->name,
            ];
        });
    }

    /**
     * Add headers to the export
     */
    public function headings(): array
    {
        return [
            'Nomor Urut',
            'Nomor Koleksi',
            'Nama Tanaman',
            'Suku',
            'Habitus',
            'Lokasi',
            'Tanggal Masuk',
            'Tanggal Keluar',
            'Pelaksana',
        ];
    }
}
