<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\dokumentasiKoleksi;

class DokumentasiKoleksiExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    public function collection()
    {
        // Fetch the data including image paths
        return dokumentasiKoleksi::all(['tanaman_id', 'foto_pola', 'foto_trapesium', 'keterangan', 'author_id']);
    }

    public function headings(): array
    {
        return [
            'Urutan',
            'Nomor Ketukan',
            'Jenis',
            'Foto Pola',
            'Foto Trapesium',
            'Keterangan',
            'Pelaksana',
        ];
    }

    public function map($dokumentasiKoleksi): array
    {
        return [
            $dokumentasiKoleksi->id,
            $dokumentasiKoleksi->tanaman->no_ketukan,
            $dokumentasiKoleksi->tanaman->jenis,
            json_decode($dokumentasiKoleksi->foto_pola),
            json_decode($dokumentasiKoleksi->foto_trapesium),
            $dokumentasiKoleksi->keterangan,

            $dokumentasiKoleksi->user->name,
        ];
    }

    private function getImagePath($path)
    {
        return storage_path('app/public/' . json_decode($path));
    }

    private function getImageDimensions($path)
    {
        if (file_exists($path)) {
            list($width, $height) = getimagesize($path);
            return ['width' => $width, 'height' => $height];
        }
        return ['width' => 0, 'height' => 0];
    }

    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            $sheet = $event->sheet->getDelegate();
            
            foreach ($this->collection() as $rowIndex => $dokumentasiKoleksi) {
                $rowNumber = $rowIndex + 2; // Row number starts from 2 to account for header row
                
                // Embed Foto Pola
                $polaPath = $this->getImagePath($dokumentasiKoleksi->foto_pola);
                if (file_exists($polaPath)) {
                    $drawing = new Drawing();
                    $drawing->setPath($polaPath);
                    $drawing->setCoordinates('D' . $rowNumber);
                    $drawing->setWorksheet($sheet);
                    $drawing->setResizeProportional(false);
                    $drawing->setWidthAndHeight(300, 300);

                    // Adjust cell size based on image dimensions
                    $sheet->getColumnDimension('D')->setWidth(50); // Example width
                    $sheet->getRowDimension($rowNumber)->setRowHeight(200); // Example height
                }
                
                // Embed Foto Trapesium
                $trapesiumPath = $this->getImagePath($dokumentasiKoleksi->foto_trapesium);
                if (file_exists($trapesiumPath)) {
                    $drawing = new Drawing();
                    $drawing->setPath($trapesiumPath);
                    $drawing->setCoordinates('E' . $rowNumber);
                    $drawing->setWorksheet($sheet);
                    $drawing->setResizeProportional(false);
                    $drawing->setWidthAndHeight(300, 300);
                    
                    // Adjust cell size based on image dimensions
                    $sheet->getColumnDimension('E')->setWidth(50); // Example width
                    $sheet->getRowDimension($rowNumber)->setRowHeight(200); // Example height
                }
            }
        },
    ];
}

}
