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

class TestsAutoThirdSheetImport implements ToCollection
{
    public $competetionId;
    /**
    * @param Collection $collection
    */
    
    public function collection(Collection $collection)
    {
        //парсер заголовков компетенций (строка 2) {
for ($a=1; $a < count($collection[1]); $a++) {
    $competetionName = (string)$collection[1][$a];
   // dd($collection[1]);
    if($competetionName != null ) {
         $competetion = Competetion::where('name', 'like', '%' . $competetionName . '%')->first();
                if(!$competetion){
                    $competetion = Competetion::create([
                       // "id"=>(int) $collection[$i][0],
                        "name"=>$competetionName
                    ]);   
                }
                $this->competetionId = $competetion->id;
                //session(['competetion_id'=>$competetion->id]);
    
        //парсер по строкам должностей
        for ($i=3; $i < count($collection); $i++) {
            //$position = Position::find((int) $collection[$i][0]);

          /*  if($collection[$i][0]){
                if(!$position){
                    $position = Position::create([
                        "id"=>(int) $collection[$i][0],
                        "name"=>$collection[$i][1]
                    ]);
                }
                session(['position_id'=>$position->id]);
            }
            */
            if( $collection[$i][0] != null){
                $position = Position::where('name', 'like', '%' . (string) $collection[$i][0] . '%')->first();
                if(!$position){
                    $position = Position::create([
                       // "id"=>(int) $collection[$i][0],
                        "name"=>(string) $collection[$i][0]
                    ]);
                    
                }
                
              //  session(['position_id'=>$position->id]);
              //dd($this->competetionId);
                $competetion_position = PositionCompetetion::where("competetion_id",$competetion->id)->where("position_id",$position->id)->first();
                
               if(!$competetion_position){
                PositionCompetetion::create([
                    "position_id"=>$position->id,
                    "competetion_id"=>$competetion->id
                ]);
               }
               $competetion_level = CompetetionLevel::where("competetion_id",$competetion->id)->where("position_id",$position->id)->first();
               if(!$competetion_level ){
                CompetetionLevel::create([
                    "competetion_id"=>$competetion->id,
                    "position_id"=>$position->id,
                    "level"=> (int) $collection[$i][$a]
                ]);
               }
                
            }
        }
        }
        }
    }
}