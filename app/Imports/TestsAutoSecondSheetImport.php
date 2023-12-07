<?php 
namespace App\Imports;
use App\Models\Competetion;
use App\Models\CompetetionLevel;
use App\Models\Indicator;
use App\Models\Position;
use App\Models\PositionCompetetion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TestsAutoSecondSheetImport implements ToCollection
{
    public $competetionId;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
     //   dd($collection);
//for ($a=1; $a < count($collection[1]); $a++) {
 //   
 //       }
    }
}