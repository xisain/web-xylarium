<?php

namespace App\Exports;

use App\Models\penomoranKoleksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class penomoranKoleksiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents
{
    protected $penomoran;

    public function __construct($penomoran)
    {
        $this->penomoran = $penomoran;
    }

    public function collection()
    {
        return $this->penomoran->map(function ($item) {
            return [
                'Nomor' => $item->id,
                'Tanggal' => $item->date,
                'Nama Tanaman' => $item->penerimaan->nama_tanaman,
                'Suku' => $item->penerimaan->suku,
                'Tempat Asal ' => $item->penerimaan->habitus,
                'Nomor Koleksi' => $item->nomor_koleksi,
                'Keterangan' => $item->keterangan,
                'Pelaksana' => $item->user->name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nomor',
            'Tanggal',
            'Nama Tanaman',
            'Suku',
            'Tempat Asal',
            'Nomor Koleksi',
            'Keterangan',
            'Pelaksana'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'size' => 13,'color'=>['rgb' => 'FFFFFF']],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4472C4'],
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $lastColumn = $sheet->getHighestColumn();
                $lastRow = $sheet->getHighestRow();

                // Apply border to all cells
                $sheet->getStyle("A1:$lastColumn$lastRow")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => 'CCCCCC'],
                        ],
                    ],
                ]);

                // Wrap text for all columns
                foreach (range('A', $lastColumn) as $column) {
                    $sheet->getStyle("$column" . "1:$column$lastRow")->getAlignment()->setWrapText(true);
                }

                // Auto-size columns
                foreach (range('A', $lastColumn) as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }

                // Adjust header row height
                $sheet->getRowDimension(1)->setRowHeight(25);
            },
        ];
    }
}
