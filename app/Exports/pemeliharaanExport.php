<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class pemeliharaanExport implements FromCollection, WithHeadings, WithStyles
{
    protected $pemeliharaan;
    public function __construct($pemeliharaan)
    {
        $this->pemeliharaan = $pemeliharaan;
    }
    public function collection()
    {
        return $this->pemeliharaan->map(function($pemeliharaan, $index) {
            return [
                $index + 1,
                $pemeliharaan->tanaman->no_ketukan,
                $pemeliharaan->tanaman->jenis,
                $pemeliharaan->tanaman->famili,
                $pemeliharaan->pengeringan->tanggal_masuk . ' s.d. ' . $pemeliharaan->pengeringan->tanggal_keluar,
                $pemeliharaan->pendinginan->tanggal_masuk . ' s.d. ' . $pemeliharaan->pendinginan->tanggal_keluar,
                $pemeliharaan->tanggal_pest_control,
                $pemeliharaan->tanggal_vacuum,
                $pemeliharaan->tanggal_fumigasi,
                $pemeliharaan->keterangan,
                $pemeliharaan->user->name,
            ];
        });
    }
    public function headings(): array {
        return [
            ['Nomor', '', 'Nama Jenis', 'Suku', 'Tanggal Pelaksanaan','','','','','Keterangan','Pelaksana'],
            ['Urut', 'Koleksi', '','','Pengeringan','Pendinginan','Pest Control', 'Vacuum','Fumigasi','','']
        ];
    }
    public function styles(Worksheet $sheet){
        $sheet->mergeCells('A1:B1');
        $sheet->mergeCells('C1:C2');
        $sheet->mergeCells('D1:D2');
        $sheet->mergeCells('E1:I1');
        $sheet->mergeCells('J1:J2');
        $sheet->mergecells('K1:K2');
        $sheet->getStyle('A1:K2')->applyFromArray([
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
