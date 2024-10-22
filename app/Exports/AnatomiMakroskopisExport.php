<?php

namespace App\Exports;

use App\Models\anatomiMakroskopis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class AnatomiMakroskopisExport implements FromView, WithDrawings, WithEvents
{
    private $amakro;

    public function __construct($amakro)
    {
        $this->amakro = $amakro;
    }

    public function view(): View
    {
        return view('exports.anatomiMakroskopis', [
            'amakro' => $this->amakro
        ]);
    }

    public function drawings()
    {
        $drawings = [];
        
        foreach ($this->amakro as $rowIndex => $item) {
            // Images are added to rows sequentially, if multiple, they will occupy the following rows
            $maxImages = max(
                count(json_decode($item->radial_images, true) ?? []),
                count(json_decode($item->tangen_images, true) ?? []),
                count(json_decode($item->transversal_images, true) ?? [])
            );

            for ($imageIndex = 0; $imageIndex < $maxImages; $imageIndex++) {
                // Add radial images (in column E)
                $radialImages = json_decode($item->radial_images, true);
                if (isset($radialImages[$imageIndex])) {
                    $drawings[] = $this->createDrawing($radialImages[$imageIndex], $rowIndex + 2 + $imageIndex, 'E');
                }

                // Add tangen images (in column F)
                $tangenImages = json_decode($item->tangen_images, true);
                if (isset($tangenImages[$imageIndex])) {
                    $drawings[] = $this->createDrawing($tangenImages[$imageIndex], $rowIndex + 2 + $imageIndex, 'F');
                }

                // Add transversal images (in column G)
                $transversalImages = json_decode($item->transversal_images, true);
                if (isset($transversalImages[$imageIndex])) {
                    $drawings[] = $this->createDrawing($transversalImages[$imageIndex], $rowIndex + 2 + $imageIndex, 'G');
                }
            }
        }

        return $drawings;
    }

    private function createDrawing($imagePath, $rowIndex, $column)
    {
        $drawing = new Drawing();
        $drawing->setName('Image');
        $drawing->setDescription('Image');
        $drawing->setPath(public_path('storage/' . $imagePath));
        $drawing->setCoordinates($column . $rowIndex); // Place image in the given column and row
        $drawing->setWidth(100); // Adjust the image size
        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Adjust column widths to fit the images
                $sheet->getColumnDimension('E')->setWidth(20); // Adjust as necessary
                $sheet->getColumnDimension('F')->setWidth(20);
                $sheet->getColumnDimension('G')->setWidth(20);

                // Dynamically adjust row height based on number of images
                foreach ($this->amakro as $rowIndex => $item) {
                    $maxImages = max(
                        count(json_decode($item->radial_images, true) ?? []),
                        count(json_decode($item->tangen_images, true) ?? []),
                        count(json_decode($item->transversal_images, true) ?? [])
                    );

                    for ($imageIndex = 0; $imageIndex < $maxImages; $imageIndex++) {
                        $sheet->getRowDimension($rowIndex + 2 + $imageIndex)->setRowHeight(100); // Adjust row height to fit images
                    }
                }
            },
        ];
    }
}

