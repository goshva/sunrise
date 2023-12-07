<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Style\Font;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class RepostsExport implements ShouldAutoSize, WithHeadings, FromArray, WithStyles
{
    protected $users;
    protected $competetions;
        protected $maxSubdivisions;
    protected $objects;
    protected $subdivisions; 
    protected $exportData;

    function __construct($users, int $maxSubdivisions) {
        $this->users = $users;
           $this->maxSubdivisions = $maxSubdivisions;
 }
    public function headings(): array
    {
        $headings = [
            'ФИО',
            'Email',
            'Должность',
            'Блок',
            // ... other headings before subdivisions
        ];

       for ($i = 1; $i <= $this->maxSubdivisions; $i++) {
            $headings[] = "Подразделение$i";
        }

        // Add other headings after subdivisions
        $headings[] = 'Компетенции';
        $headings[] = 'Индикатор';
        $headings[] = 'Статус';
        $headings[] = 'Профиль (максимальное значение)';
        
         $headings[] ='Баллы';
        $headings[] = 'Результат';
        $headings[] = 'Дата';

        return $headings;
    }

    public function array(): array
    {
        return $this->users;
    }
 public function styles(Worksheet $sheet)
    {
 $activeElements = count($this->users) + 1;
                $sheet->getStyle('A')->getFont()->setBold(true);
                $sheet->getStyle('B1:J1')->getFont()->setBold(true);
$sheet->getStyle("A1:A$activeElements")->getFill()
	->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
	->getStartColor()
	->setARGB('D3D3D3');
    $sheet->getStyle('B1:J1')->getFill()
	->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
	->getStartColor()
	->setARGB('D3D3D3');
    }
}
