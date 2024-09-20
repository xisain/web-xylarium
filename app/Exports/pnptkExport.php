<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class pnptkExport implements FromCollection, WithHeadings, WithStyles
{
    protected $pnptk;

    public function __construct($pnptk)
    {
        $this->pnptk = $pnptk;
    }

    public function collection()
    {
       return $this->pnptk->map(function($pnptk, $index) {
           return [
               $index + 1,  // Urut
               $pnptk->tanaman->no_ketukan,  // Koleksi
               $pnptk->tanaman->jenis,  // Nama Jenis
               $pnptk->tanaman->famili,  // Suku
               $pnptk->xylarium_trapesium,  // Trapesium
               $pnptk->xylarium_utuh,  // Utuh
               $pnptk->xylarium_dekatKulit,  // Dekat Kulit
               $pnptk->xylarium_serbuk,  // Serbuk
               $pnptk->xylarium_prepat_sayatan,  // Sayatan
               $pnptk->xylarium_prepat_serat,  // Serat
               $pnptk->xylarium_potongan,  // Potongan
               $pnptk->keterangan,  // Keterangan
               $pnptk->user->name,  // Pelaksana
           ];
       });
    }

    public function headings(): array {
        return [
            ['Nomor', '', 'Nama Jenis', 'Suku', 'Xylarium Terketok', '', '', '', '', '', '', 'Keterangan', 'Pelaksana',],
            ['', '', '', '', '', '', '', '', 'Preparat', '', '', '', ''],
            ['Urut', 'Koleksi', '', '', 'Trapesium', 'Utuh', 'Dekat Kulit', 'Serbuk', 'Sayatan', 'Serat', 'Potongan', '', '', '']
        ];
    }
    
    

    public function styles(Worksheet $sheet)
    {
        // Merge cells according to the headings
        $sheet->mergeCells('A1:A3'); // Urut
        $sheet->mergeCells('B1:B3'); // Koleksi
        $sheet->mergeCells('C1:C3'); // Nama Jenis
        $sheet->mergeCells('D1:D3'); // Suku
        $sheet->mergeCells('E1:K1'); // Xylarium Terketok
        $sheet->mergeCells('I2:K2'); // Preparat
        $sheet->mergeCells('L1:L3'); // Keterangan
        $sheet->mergeCells('M1:M3'); // Pelaksana
    
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
