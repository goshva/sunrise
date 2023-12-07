<?php

namespace App\Imports;


use App\Imports\UserFirstSheetImport;
use App\Imports\UserSecondSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserImport implements WithMultipleSheets 
{

    public function sheets(): array
    {
        return [
            'Пользователи' => new UserFirstSheetImport(),
            'Руководители и подчиненные' => new UserSecondSheetImport(),
        ];
    }
   
}
