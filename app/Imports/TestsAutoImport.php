<?php

namespace App\Imports;


use App\Imports\TestsAutoFirstSheetImport;
use App\Imports\TestsAutoSecondSheetImport;
use App\Imports\TestsAutoThirdSheetImport;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class TestsAutoImport implements WithMultipleSheets, SkipsUnknownSheets
{
 use WithConditionalSheets;
    public function conditionalSheets(): array
    {
        return [
            'База СМТК' => new TestsAutoFirstSheetImport(),
            'Рис.' => new TestsAutoSecondSheetImport(),
            'Профиль' => new TestsAutoThirdSheetImport(),
        ];
    }
    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
   
}