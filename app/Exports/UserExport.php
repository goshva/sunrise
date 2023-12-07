<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UserExport implements FromCollection, ShouldAutoSize,WithEvents
{
    protected $users;
    function __construct($users) {
        $this->users = $users;
 }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // dd($this->users);
        // return $users;
        return new Collection($this->users);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getStyle('A')->applyFromArray([
                    'font'=>[
                        'bold'=>true
                    ]
                ]);
            },
        ];
    }
}
