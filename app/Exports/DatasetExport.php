<?php

namespace App\Exports;

use App\Models\DatasetTickets;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DatasetExport implements FromQuery, WithMapping, WithHeadings, WithColumnWidths, ShouldAutoSize, WithEvents
{
    use Exportable;
    protected $datasets;

    public function __construct($datasets)
    {
        $this->datasets = $datasets;
    }

    // public function collection()
    // {
    //     return DatasetTickets::all();
    // }

    public function query()
    {
        return DatasetTickets::query()->whereIn('id', $this->datasets->pluck('id'));
    }

    public function map($datasets): array {
        // Ambil nama department sesuai dengan data yang ada di tabel DatasetTickets
        $department = $datasets->department ? $datasets->department->name : '';

        // Ambil nama category sesuai dengan data yang ada di tabel DatasetTickets
        $category = $datasets->category ? $datasets->category->name : '';

        // Ambil nama priority sesuai dengan data yang ada di tabel DatasetTickets
        $priority = $datasets->priority ? $datasets->priority->name : '';

        return [
            $datasets->subject,
            $datasets->details,
            $department,
            $category,
            $priority,
        ];
    }

    public function headings(): array
    {
        return [
            'Subject',
            'Details',
            'Department',
            'Category',
            'Priority',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'O' => 35,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Set the default font size to 12 and font type to Times New Roman
                $event->sheet->getStyle('A1:E1')->getFont()->setSize(12);
                $event->sheet->getStyle('A1:E1')->getFont()->setName('Times New Roman');

                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font'  => ['bold' => true],
                ]);

                // Set custom height for the heading row (row 1)
                $event->sheet->getRowDimension(1)->setRowHeight(25); // Set the height to 30 units (adjust as needed)

                // Set middle alignment for all cells (columns A to Q)
                $event->sheet->getStyle('A1:E1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                // Center the table horizontally (columns A to Q)
                $event->sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

}
