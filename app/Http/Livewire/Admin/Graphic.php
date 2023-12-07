<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\UserCompetetion;
use Carbon\Carbon;
use Livewire\Component;

class Graphic extends Component
{
    public $user_competetions;
    public $month;
    public $monthCount;
    protected $listeners = [
        'filterGraphick'
    ];
    public function mount(){
        $this->user_competetions = UserCompetetion::where("is_done", 1)->whereMonth("updated_at",Carbon::now()->month)->orderBy("updated_at","ASC")->get();
        $this->user_competetions = $this->user_competetions->groupBy(function($date){
            return Carbon::parse($date->updated_at)->format('d');
        })->all();
    }
    public function filterGraphick($locationName, $dateFrom,$dateTo){
        $users = User::where("location", "=", $locationName)->get();
        $arr = [];
        foreach($users as $user){
            if(UserCompetetion::where("is_done", 1)->where("user_id", $user->id)->whereMonth("updated_at",Carbon::now()->month)){
                $this->user_competetions =  UserCompetetion::where("is_done", 1)->where("user_id", $user->id)->whereMonth("updated_at",Carbon::now()->month)->orderBy("updated_at","ASC")->get();
                $this->user_competetions = $this->user_competetions->groupBy(function($date){
                        return Carbon::parse($date->updated_at)->format('d');
                    })->all();
                    if($this->user_competetions !== []){
                        $arr[] = $this->user_competetions;
                    }
                    // dump($this->user_competetions);
            }
           
    }
    $this->user_competetions = $arr;
    $this->month = [];
    $this->monthCount = [];
    foreach($this->user_competetions as $key => $user_competetion){
            $this->month[] = $key;
            $this->monthCount[] = count($user_competetion);

}
$this->dispatchBrowserEvent('contentChanged', $this->month,$this->monthCount);

}
    public function render()
    {
        $users = User::all();
        $locations = [];
        foreach($users as $user){
            if(!in_array($user->location, $locations)){
                $locations[] = $user->location;

            }
        }
        $month = [];
        $monthCount = [];
        foreach($this->user_competetions as $key => $user_competetion){
            $this->month[] = $key;
            $this->monthCount[] = count($user_competetion);
    
    }
        // dd($month);
        // dd($monthCount);
        return view('livewire.admin.graphic', compact('month', 'monthCount', 'locations'));
    }
}
