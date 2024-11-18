<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PbtkExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $pbtk;

    public function __construct($pbtk)
    {
        $this->pbtk = $pbtk;
    }

    public function collection()
    {
        return $this->pbtk->map(function ($pbtk, $index) {
            return [
                $index + 1,
                $pbtk->tanaman->no_ketukan,
                $pbtk->created_at->format('d-m-Y'),
                $pbtk->tanaman->jenis,
                $pbtk->tanaman->famili,
                $pbtk->tanaman->habitus ?: 'Tree',
                $pbtk->kegiatan_gergaji_trapesium,
                $pbtk->kegiatan_gergaji_utuh,
                $pbtk->kegiatan_hamplas_trapesium,
                $pbtk->kegiatan_hamplas_utuh,
                $pbtk->kegiatan_kubus,
                $pbtk->jumlah_potongan,
                $pbtk->keterangan,
                $pbtk->user->name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            ['Nomor', '', 'Tanggal', 'Nama Jenis', 'Suku', 'Habitus', 'Kegiatan', '', '', '', 'Kubus', 'Jumlah Potongan', 'Keterangan', 'Pelaksana'],
            ['Urut', 'Koleksi', '', '', '', '', 'Gergaji', 'Gergaji', 'Hamplas', 'Hamplas', '', '', '', ''],
            ['Urut', 'Koleksi', 'Tanggal', 'Nama Jenis', 'Suku', 'Habitus', 'Trapesium', 'Utuh', 'Trapesium', 'Utuh', 'Kubus', 'Jumlah Potongan', 'Keterangan', 'Pelaksana'],
        ];
    }




    public function styles(Worksheet $sheet)
    {
        // Merge cells for headers
        $sheet->mergeCells('A1:B1'); // Nomor (above Urut and Koleksi)
        $sheet->mergeCells('A2:A3'); // Urut
        $sheet->mergeCells('B2:B3'); // Koleksi
        $sheet->mergeCells('C1:C3'); // Tanggal
        $sheet->mergeCells('D1:D3'); // Nama Jenis
        $sheet->mergeCells('E1:E3'); // Suku
        $sheet->mergeCells('F1:F3'); // Habitus
        $sheet->mergeCells('G1:J1'); // Kegiatan (header)
        $sheet->mergeCells('G2:H2'); // Gergaji
        $sheet->mergeCells('I2:J2'); // Hamplas
        $sheet->mergeCells('K1:K3'); // Kubus
        $sheet->mergeCells('L1:L3'); // Jumlah Potongan
        $sheet->mergeCells('M1:M3'); // Keterangan
        $sheet->mergeCells('N1:N3'); // Pelaksana

        // Apply styles for headers
        $sheet->getStyle('A1:N3')->applyFromArray([
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
