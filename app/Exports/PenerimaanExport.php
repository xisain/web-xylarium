<?php

namespace App\Exports;

use App\Models\penerimaan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;
use Carbon\Carbon;

class PenerimaanExport implements FromQuery, WithHeadings, WithStyles, WithEvents
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

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 20]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $lastColumn = 'J'; // Adjusted to A1:J1
                $headerRange = 'A1:' . $lastColumn . '1';

                // Style the header row
                $event->sheet->getDelegate()->getStyle($headerRange)->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                        'size' => 13,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '4472C4'],
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(30);

                // Style the data rows
                $dataRange = 'A2:' . $lastColumn . $event->sheet->getHighestRow();
                $event->sheet->getDelegate()->getStyle($dataRange)->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_TOP,
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => 'CCCCCC'],
                        ],
                    ],
                ]);

                // Wrap text for specific columns
                $wrapColumns = ['D', 'E', 'I', 'J'];
                foreach ($wrapColumns as $column) {
                    $columnRange = $column . '2:' . $column . $event->sheet->getHighestRow();
                    $event->sheet->getDelegate()->getStyle($columnRange)->getAlignment()->setWrapText(true);
                }

                // Adjust row heights dynamically
                for ($i = 2; $i <= $event->sheet->getHighestRow(); $i++) {
                    $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(-1);
                }

                // Set columns to auto-size
                foreach (range('A', $lastColumn) as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
