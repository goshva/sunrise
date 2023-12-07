<?php 
namespace App\Imports;
use App\Models\Competetion;
use App\Models\CompetetionLevel;
use App\Models\Indicator;
use App\Models\IndicatorGroup;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PositionFirstSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
       // dd($collection);
        for ($i=1; $i < count($collection); $i++) {
            if( $collection[$i][3] != null){
                $competetion = Competetion::where('name', 'like', '%' . (string) $collection[$i][3] . '%')->first();
                if(!$competetion){
                    $competetion = Competetion::create([
                        "name"=>(string) $collection[$i][3]
                    ]);   
                }
               // session(['competetion_id'=>$competetion->id]);
                 if( $collection[$i][5] != null) {
               $indicator_group_name = (string)$collection[$i][5];
                
               //  $secondSymbol = mb_substr($indicator_group_name, 1, 1);
                 
               // if($secondSymbol == '.') {
               //     $indicator_group_name = mb_substr($indicator_group_name, 0,1);
               //  }
                 
                $indicator_group = IndicatorGroup::where('group_name', 'like', '%' . $indicator_group_name . '%');
                if(!$indicator_group){
                    $indicator_group = IndicatorGroup::create([
                        "group_name"=>$indicator_group_name
                    ]);   
                }
            }
             //   $competetion_position = DB::table('competetion_position')->where("competetion_id",$competetion->id)->where("position_id",//////session('position_id'))->first();
                
               /*if(!$competetion_position){
                DB::table('competetion_position')->insert([
                    "position_id"=>session('position_id'),
                    "competetion_id"=>$competetion->id
                ]);
               }
                session(['competetion_id'=>$competetion->id]);
                CompetetionLevel::create([
                    "competetion_id"=>$competetion->id,
                    "position_id"=>session('position_id'),
                    "level"=> (int) $collection[$i][4]
                ]);
            }*/
//indicators_group
switch ($indicator_group_name) {
    case 'a.':
        $indicator_group_id = 1;
        break;
    case 'b.':
        $indicator_group_id = 2;
        break;
        case 'c.':
        $indicator_group_id = 3;
        break;
        case 'd.':
        $indicator_group_id = 4;
        break;
        case 'e.':
        $indicator_group_id = 5;
        break;
    default:
          $indicator_group_id = 1;
        break;
}

            if($collection[$i][8] != null){

                $indicator = Indicator::where('name', 'like', '%' . (string)$collection[$i][8] . '%')->first();
                if(!$indicator){
                    $indicator = Indicator::create([
                        "competetion_id"=>$competetion->id,
                        "name"=>(string)$collection[$i][8],
                        "level"=>$indicator_group_id,
                        "indicators_group_id"=>$indicator_group_id
                    ]);
                }
            }
        }
    }
}
}