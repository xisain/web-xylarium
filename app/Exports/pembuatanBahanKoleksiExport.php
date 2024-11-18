<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class pembuatanBahanKoleksiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $pembuatanBahanKoleksi;

    public function __construct($pembuatanBahanKoleksi)
    {
        $this->pembuatanBahanKoleksi = $pembuatanBahanKoleksi;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->pembuatanBahanKoleksi->map(function ($item) {
            return [
                'Nomor Urut' => $item->id,
                'Nomor Koleksi' => $item->tanaman->no_ketukan,
                'Tanggal'=>$item->tanggal,
                'Nama Jenis' => $item->tanaman->jenis,
                'Suku' => $item->tanaman->famili,
                'Tempat Asal' => $item->tanaman->lokasi,
                'Kegiatan Gergaji' => $item->kegiatan_gergaji,
                'Kegiatan Hamplas' => $item->kegiatan_hamplas,
                'Jumlah Potongan' => $item->jumlah_potongan,
                'Keterangan' => $item->keterangan,
                'Pelaksana' => $item->user->name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nomor Urut',
            'Nomor Koleksi',
            'Tanggal',
            'Nama Jenis',
            'Suku',
            'Tempat Asal',
            'kegiatan gergaji',
            'kegiatan hamplas',
            'Jumlah Potongan',
            'Keterangan',
            'Pelaksana'
        ];
    }
}
