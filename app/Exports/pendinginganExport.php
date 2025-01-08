<?php

namespace App\Exports;

use App\Models\pendinginan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class pendinginganExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize

{
   protected $pendinginan;
   public function __construct($pendinginan)
   {
    $this->pendinginan = $pendinginan;
   }
   public function collection()
   {
    return $this->pendinginan->map(function($pendinginan, $index){
        return [
            $index + 1,
            $pendinginan->tanaman->no_ketukan,
            $pendinginan->tanaman->jenis,
            $pendinginan->tanaman->famili,
            $pendinginan->tanaman->habitus ?: 'Tree',
            $pendinginan->tanaman->habitus,
            $pendinginan->xylarium_bahan,
            $pendinginan->xylarium_koleksi,
            $pendinginan->xylarium_duplikat,
            $pendinginan->tanggal_masuk,
            $pendinginan->tanggal_keluar
        ];
    });
   }
   public function headings(): array
   {
    return [
        ['Nomor','', 'Jenis','Suku','Habitus', 'Tempat Asal', 'Xylarium','','','Tanggal Perlakukan Pendinginan', '','Keterangan'],
        ['Urut', 'Koleksi','','','','','Bahan','Koleksi','Duplikat','Masuk','Keluar','','']
    ];
   }
   public function styles(Worksheet $sheet){
    // $sheet->setAutoSize(true);
    $sheet->mergeCells('A1:B1'); // Nomor
    $sheet->mergeCells('C1:C2'); // Jenis
    $sheet->mergeCells('D1:D2'); // Suku
    $sheet->mergeCells('E1:E2'); // Habitus
    $sheet->mergeCells('F1:F2'); // Habitus
    $sheet->mergeCells('G1:I1'); // Xylarium
    $sheet->mergeCells('J1:K1'); // Xylarium
    $sheet->mergeCells('L1:L2'); // Xylarium
    $sheet->getStyle('A1:L2')->applyFromArray([
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
