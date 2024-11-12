<?php

namespace App\Exports;

use App\Models\penerimaan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class PenerimaanExport implements FromQuery, WithHeadings
{
    protected $withStatus;

    public function __construct($withStatus = false)
    {
        $this->withStatus = $withStatus;
    }

    public function query()
    {
        $query = penerimaan::query();

        // Get current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Apply the filter for the current month and year based on tanggal_terima
        $query->whereMonth('tanggal_terima', $currentMonth)
              ->whereYear('tanggal_terima', $currentYear);

        if (!$this->withStatus) {
            $query->select('nama_tanaman', 'suku', 'habitus', 'tempat_asal', 'tanggal_terima', 'xylarium_log', 'xylarium_lempeng', 'jumlah_material', 'Koordinat', 'keterangan');
        } else {
            $query->select('nama_tanaman', 'suku', 'habitus', 'tempat_asal', 'tanggal_terima', 'xylarium_log', 'xylarium_lempeng', 'jumlah_material', 'Koordinat', 'keterangan', 'status');
        }

        return $query;
    }

    public function headings(): array
    {
        $headings = [
            'Nama Tanaman',
            'Suku',
            'Habitus',
            'Tempat Asal',
            'Tanggal Terima',
            'Xylarium Log',
            'Xylarium Lempengan',
            'Jumlah Material',
            'Koordinat',
            'Keterangan'
        ];

        if ($this->withStatus) {
            $headings[] = 'Status';
        }

        return $headings;
    }
}
