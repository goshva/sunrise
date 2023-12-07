<?php

namespace App\Imports;


use App\Imports\PositionFirstSheetImport;
use App\Imports\PositionSecondSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PositionImport implements WithMultipleSheets 
{

    public function sheets(): array
    {
        return [
            'База СМТК' => new PositionFirstSheetImport(),
            'Профиль' => new PositionSecondSheetImport(),
        ];
    }
   
}
