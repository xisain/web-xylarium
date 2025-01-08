<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class inspeksiExport implements FromCollection, WithHeadings, WithStyles
{
   protected $inspeksi;
   public function __construct($inspeksi)
   {
    $this->inspeksi = $inspeksi;
   }

    public function collection()
    {
       return $this->inspeksi->map(function($inspeksi,$index){
        return [
            $index + 1,
            $inspeksi->tanaman->no_ketukan,
            $inspeksi->created_at->format('d-m-Y'),
            $inspeksi->tanaman->jenis,
            $inspeksi->tanaman->famili,
            $inspeksi->identifikasi_koleksi,
            $inspeksi->kondisi_koleksi,
            $inspeksi->trapesium_koleksi,
            $inspeksi->trapesium_duplikat,
            $inspeksi->duplikasi_no_koleksi,
            $inspeksi->koleksi_serbuk,
            $inspeksi->preparat_koleksi_sayatan,
            $inspeksi->preparat_koleksi_serat,
            $inspeksi->kubus,
            $inspeksi->keterangan,
            $inspeksi->user->name,

        ];
    });
    }
    public function headings(): array {
        return [
            ['Nomor', '', 'Tanggal', 'Nama Jenis','Suku','Kegiatan','','','','','','','','','Keterangan', 'Pelaksana'],
            ['Urut','Koleksi','','','','Indentifikasi Koleksi','Kondisi Koleksi','Trapesium','','Duplikasi No. Koleksi','Koleksi Serbuk','Preparat','','kubus'],
            ['','','','','','','','Koleksi','Duplikat','','','Koleksi Sayatan','Koleksi Serat']
        ];
    }
    public function styles(Worksheet $sheet){
        $sheet->mergecells('A1:B1'); // Nomor
        $sheet->mergecells('A2:A3'); // Urut
        $sheet->mergecells('B2:B3'); // Koleksi
        $sheet->mergecells('C1:C3'); // Tanggal
        $sheet->mergecells('D1:D3'); // Nama Jenis
        $sheet->mergecells('E1:E3'); // Suku
        $sheet->mergecells('F1:N1'); // Kegiatan
        $sheet->mergecells('F2:F3'); // Indentifikasi Koleksi
        $sheet->mergecells('G2:G3'); // Kondisi Koleksi
        $sheet->mergecells('L2:M2'); // Preparat
        $sheet->mergecells('J2:J3'); //  Dupe No Koleksi
        $sheet->mergecells('K2:K3'); //  Koleksi Serbuk
        $sheet->mergecells('N2:N3'); // Kubus
        $sheet->mergecells('O1:O3'); // Keterangan
        $sheet->mergecells('P1:P3'); // Penlaksana
        $sheet->getStyle('A1:P3')->applyFromArray([
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
