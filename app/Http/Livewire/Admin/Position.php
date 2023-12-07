<?php

namespace App\Http\Livewire\Admin;

use App\Models\Competetion;
use App\Models\CompetetionLevel;
use App\Models\Indicator;
use App\Models\IndicatorGroup;
use App\Models\Position as ModelsPosition;
use App\Models\PositionCompetetion;
use App\Models\Subdivision;
use App\Models\Test;
use App\Models\UserCompetetion;
use App\Models\UserTests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Position extends Component
{
    use WithPagination;

    public $competetion;
    public $position;
    protected $positions;
    public $addCompetationPositions = [];
    public $addLevelCompetations = [];
    protected $filterPositions;
    public $subdivision;
    public $deleteIndicator;
    public $addedCompetetions = [];
    protected $listeners = [
        'getIndicators',
        'getPosition',
        'getCompetation',
        'addCompetetionToPosition',
        'addPosition',
        'deleteCompetetionFromPosition',
        'addCompetetion',
        'addLevelToAddCompetations',
        'addPositionToCompetetion',
        'deletePositionFromCompetetion',
        'addIndicator',
        'editPosition',
        'deleteIndicator',
        'filteSubdivision',
        'filterCompetetion',
    ];
          public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => 'positions']);
    }
    public function filterCompetetion($id){
        $competation=Competetion::find($id);
        if($id==="Все"){
            $this->filterPositions = null;
        }else{
            $this->filterPositions = $this->paginate($competation->positions, 10, request("page"));
        }
    }
    public function filteSubdivision($id){
        $this->filterPositions =ModelsPosition::where("subdivision_id",$id)->orderBy("created_at", "DESC")->get();
        if($id==="Все"){
            $this->filterPositions = null;
        }
    }
    public function deleteIndicator($id)
    {
        $indicator = Indicator::find($id);
        $competation = Competetion::find($indicator->competetion_id);
        $user_competetions = UserCompetetion::where("competetion_id", $competation->id)->get();
        foreach ($user_competetions as $user_competetion) {
            if($user_competetion->progress !== 0 ){
                $user_competetion->progress--;
                $user_competetion->save();
            }
        }
        $indicator->delete();
        session(['success' => "Индикатор был успешно удален"]);
        $this->position = '';
        $this->competetion = '';
    }
    public function editPosition($name, $values, $competationName)
    {
        if ($name !== $this->position->name) {
            $this->position->name = $name;
            $this->position->save();
        }
        if ($this->competetion) {
            $competetion = Competetion::find($this->competetion->id);
            if($competetion->name !== $competationName){
                $competetion->name = $competationName;
                $competetion->save();
            }
            for ($i = 0; $i < count($competetion->indicators); $i++) {
                if ($competetion->indicators[$i]->name !== $values[$i]) {
                    $competetion->indicators[$i]->name = $values[$i];

                    $competetion->indicators[$i]->save();
                }
            }
        }
        session(['success' => " Должность был успешно изменен"]);
        $this->position = '';
        $this->competetion = '';
        
         $positions = ModelsPosition::orderBy("created_at", "DESC")->paginate(10);
        if( $this->filterPositions){
             $positions = $this->filterPositions;
        }
        $this->positions = $positions;
           
           
        $this->positions = $this->paginate($this->positions);
       
    }
    public function addIndicator($addIndicatorName,$addCompetetionForIndicator, $level)
    {
        Indicator::create([
            "name" => $addIndicatorName,
            "competetion_id" => $addCompetetionForIndicator,
            "indicators_group_id"=>$level,
            "level"=>$level
        ]);
        session(['success' => "Индикатор был успешно создан"]);
    }
    public function addCompetetion($addCompetationName)
    {
        
      $createdCompetetion = Competetion::where(
            'name', 'like', '%' . $addCompetationName . '%')->first();
            if(!$createdCompetetion) {
            $createdCompetetion = Competetion::create([
            'name' => $addCompetationName
            ]);
            } else {
                session(['nameExists' => "Компетенция с таким названием уже существует"]);
            }
        try {
            foreach ($this->addCompetationPositions as $position) {
            foreach($this->addLevelCompetations as $level) {
                $competetion_position = PositionCompetetion::where(
                "competetion_id", $createdCompetetion->id)->where("position_id", $position['id'])->first();
                if(!$competetion_position) {
                    $competetion_position = PositionCompetetion::create([
                "competetion_id" => $createdCompetetion->id,
                "position_id" => $position['id']
            ]);
                }
               
            $competetion_level = CompetetionLevel::where(
                "competetion_id",$createdCompetetion->id)->where("position_id",$position['id'])->where("level", $level)->first();
                
             if(!$competetion_level) {
                $competetion_level = CompetetionLevel::create([
                "competetion_id" => $createdCompetetion->id,
                "position_id" => $position['id'],
                "level" => $level
            ]);
             }
           
            
            }
            
        }
        session(['success' => "Компетенция была успешно создана"]);
        $this->addCompetationPositions = [];
        $this->addLevelCompetations = [];
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }
    public function deletePositionFromCompetetion($id)
    {
        for ($i = 0; $i < count($this->addCompetationPositions); $i++) {
            if ($this->addCompetationPositions[$i]['id'] == $id) {
                unset($this->addCompetationPositions[$i]);
            }
        }
    }
    public function addPositionToCompetetion($id)
    {
        $position = ModelsPosition::find($id);
        if (in_array($position, $this->addCompetationPositions)) {
            array_pop($this->addCompetationPositions);
        }

        array_push($this->addCompetationPositions, $position);
    }
    public function addLevelToAddCompetations($id)
    {
        $level = $id;//IndicatorGroup::find($id);
       // $this->addLevelCompetations = $id;
        if (in_array($level, $this->addLevelCompetations)) {
            array_pop($this->addLevelCompetations);
        }

          array_push($this->addLevelCompetations, $level);
      //dd($this->addLevelCompetations);
    }
    public function deleteCompetetionFromPosition($id)
    {
        foreach($this->addedCompetetions as $key => $competetion) {
 if ($competetion['id'] == $id) {

    unset($this->addedCompetetions[$key]);
            }
        }
     //   for ($i = 0; $i < count($this->addedCompetetions); $i++) {
      //      if (isset($this->addedCompetetions[$i]['id']) && $this->addedCompetetions[$i]['id'] == $id) {
      //          unset($this->addedCompetetions[$i]);
      //      }
      //  }
    }
    public function addPosition($positionName)
    {
        $createdPosition = ModelsPosition::create([
            "name" => $positionName
        ]);
        foreach ($this->addedCompetetions as $competetion) {
            DB::table('competetion_position')->insert([
                "competetion_id" => $competetion['id'],
                "position_id" => $createdPosition->id
            ]);
        }
        $this->addedCompetetions = [];
        $this->subdivision = '';
        session(['success' => "Должность была успешно создана"]);
    }
    public function addCompetetionToPosition($id)
    {
        $competetion = Competetion::find($id);
        if (in_array($competetion, $this->addedCompetetions)) {
            array_pop($this->addedCompetetions);
        }

        array_push($this->addedCompetetions, $competetion);
    }
    public function getPosition($position)
    {
        $this->position = ModelsPosition::find($position);
    }

    public function getCompetation($competetion)
    {
        $this->competetion = Competetion::find($competetion);
    }
    public function getIndicators($id)
    {
        $this->competetion = $id;
    }
    public function render()
    {
        $positions = ModelsPosition::orderBy("created_at", "DESC")->paginate(10);
        if( $this->filterPositions){
             $positions = $this->filterPositions;
        }
        $this->positions = $positions;
         $positions->withPath('/admin/positions');
        $filterPositions = $this->filterPositions;
        $all_competetions = Competetion::all();
        $subdivisions = Subdivision::all();
        $all_positions = ModelsPosition::all();
        $all_indicators = Indicator::all();
        $competetionLevels = CompetetionLevel::all();
        //$all_levels = IndicatorGroup::all();
        return view('livewire.admin.position', compact('positions', 'all_competetions', 'subdivisions', 'all_positions', 'all_indicators', //'all_levels',
        'competetionLevels'));
    }
}
