<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class tersimpanExport implements FromCollection, WithHeadings, WithStyles
{
    protected $tersimpan;

    public function __construct($tersimpan)
    {
        $this->tersimpan = $tersimpan;
    }

    public function collection()
    {
        return $this->tersimpan->map(function ($tersimpan, $index) {
            return [
                $index + 1,
                $tersimpan->tanaman->no_ketukan,
                $tersimpan->tanaman->jenis,
                $tersimpan->tanaman->famili,
                $tersimpan->tersimpan_koleksi_trapesium,
                $tersimpan->tersimpan_koleksi_utuh,
                $tersimpan->tersimpan_koleksi_dekatKulit,
                $tersimpan->tersimpan_koleksi_potongan,
                $tersimpan->tersimpan_koleksi_preparat_sayatan ? "✓":"✗",
                $tersimpan->tersimpan_koleksi_preparat_serat ? "✓":"✗",
                $tersimpan->tersimpan_koleksi_kubus,
                $tersimpan->tersimpan_koleksi_serbuk ? "✓":"✗",
                $tersimpan->tersimpan_duplikat_trapesium,
                $tersimpan->tersimpan_duplikat_utuh,
                $tersimpan->tersimpan_duplikat_dekatKulit,
                $tersimpan->tersimpan_duplikat_potongan,
                $tersimpan->keterangan,
                $tersimpan->user->name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            [
                'Nomor', '', 'Nama Jenis', 'Suku',
                'Kegiatan', '', '', '', '', '', '', '', '', '', '', '',  'Keterangan', 'Pelaksana'
            ],
            [
                '', '', '', '',
                'Koleksi', '', '', '', '', '', '', '', 'Duplikat', '', '', '', '', '', ''
            ],
            [
                'Urut', 'Koleksi', '', '',
                'Trapesium', 'Utuh', 'Dekat Kulit', 'Potongan', 'Sayatan', 'Serat', 'Kubus', 'Serbuk',
                'Trapesium', 'Utuh', 'Dekat Kulit', 'Potongan', '', '', ''
            ],
            [
                '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''
            ],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('E1:P1');// Kegiatan
        $sheet->mergeCells('A1:B2'); // Nomor
        $sheet->mergeCells('C1:C3'); // Nama Jenis
        $sheet->mergeCells('D1:D3'); // Suku
        $sheet->mergecells('E2:L2'); // Koleksi
        $sheet->mergecells('M2:P2'); // Duplikat
        $sheet->mergecells('Q1:Q3'); // Keterangan
        $sheet->mergecells('R1:R3'); // Pelaksana
        $sheet->getStyle('A1:R3')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);
    }
}
