<?php

namespace App\Http\Livewire\Admin;

use App\Models\Competetion;
use App\Models\CompetetionTest;
use App\Models\CommonTest;
use App\Models\Test;
use App\Models\User;
use App\Models\UserTests;
use Livewire\Component;

class NaznachitTest extends Component
{
    public $competetion;
    public $competetions = [];
    public $users;
    public $searchTerm = '';
    public $forSubdivision;
    public $forUser = true;
    public $subdivisions = [];
    public $usertTests;
    protected $listeners = [
        'searchUser',
        'forSubdivision',
        'forUser'
    ];
    public function mount($competetion){
        if(strpos(request('competetions_for_publishing'), ",")){
            
            $competetions = explode(",",request('competetions_for_publishing'));
            foreach($competetions as $competetion_id){
                if(request('created_type') == 'auto_create') {
                    $competetion = CommonTest::find($competetion_id);
                } else {
                    $competetion = CompetetionTest::find($competetion_id);
                }
                
                $competetion = Competetion::find($competetion->competetion->id);
                if(!in_array($competetion, $this->competetions) && $competetion != null){
                    $this->competetions[] = $competetion;
                }
            }
            // dd($this->competetions[0]->positions);
            $this->competetion = null;
        }else{
            if(request('created_type') == 'auto_create') {
                    $competetion = CommonTest::find(request('competetions_for_publishing'));
                } else {
                    $competetion =  CompetetionTest::find(request('competetions_for_publishing'));
                }
            
            $this->competetion = Competetion::find($competetion->competetion->id);

            $this->competetions = null;
        }
    }

    public function forSubdivision(){
        if($this->competetion != null){
            foreach($this->competetion->positions as $position){
                foreach($position->users as $user){
                    foreach($user->subdivisions as $subdivision){
                        if(!in_array($subdivision->id,$this->subdivisions)){
                            $this->subdivisions[] = $subdivision->id;
    
    
                        }
                    }
                }
            }
        }elseif($this->competetions != null){
            foreach($this->competetions as $competetion){
                $competetion = Competetion::find($competetion['id']);
                foreach($competetion->positions as $position){
                    foreach($position->users as $user){
                        foreach($user->subdivisions as $subdivision){
                            if(!in_array($subdivision->id,$this->subdivisions)){
                                $this->subdivisions[] = $subdivision->id;
        
        
                            }
                        }
                    }
                }
            }
    }
    $this->forSubdivision = true;
    $this->forUser = false;
}
    public function forUser(){
        $this->forSubdivision = false;
    $this->forUser = true;
}
    public function searchUser($val){
        $this->searchTerm = $val;
        $this->usertTests = UserTests::all();
    }

    public function render()
    {
        $searchUserr = User::where('first_name' , 'like', '%' . $this->searchTerm . '%')
                            ->orWhere('last_name' , 'like', '%' . $this->searchTerm . '%')
                            ->orWhere('fathers_name' , 'like', '%' . $this->searchTerm . '%')->get();
        return view('livewire.admin.naznachit-test', compact('searchUserr'));
    }
}
