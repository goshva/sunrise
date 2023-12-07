<?php

namespace App\Http\Livewire\Admin;

use App\Models\CompetetionLevel;
use App\Models\Position;
use App\Models\Subdivision;
use App\Models\SubdivisionUser;
use App\Models\User;
use App\Models\UserSubdivision;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChanges extends Component
{
    protected $users;
    public $searchUser;
    public $competetionLevels;
    public $indicators;
    public $competetions;
    protected $listeners = [
        "changePass","searchUser", "getCompetetionLevels"
    ];
    
    public function mount($users, $competetionLevels, $indicators){
        $this->users = $users;
        $this->competetionLevels = $competetionLevels;
        $this->indicators = $indicators;
    }
   public function searchUser($val){
        $this->searchUser = $val;
                             dd($this->searchUser);
    }
    public function changePass($pass,$user){
        $user = User::find($user);
        $user->password = Hash::make($pass);
        $user->save();
        return redirect('/admin/users')->with('success', 'Пароль успешно был обновлен');
    }
    public function getCompetetionLevels($user) {
        $competetionLevel = CompetetionLevel::where("position_id",$user->position_id)->first();
return $competetionLevel;
    }
    public function render()
    {
        $user = Auth::user();
        $users = User::orderBy("created_at","DESC")->paginate(8);
        $positions = Position::all();
        $subdivisions = Subdivision::all();
         $users = $this->users;
         $competetionLevels = $this->competetionLevels;
         $indicators = $this->indicators;
        if($this->searchUser) {
            $users = User::where('first_name' , 'like', '%' . $this->searchUser . '%')
                            ->orWhere('last_name' , 'like', '%' . $this->searchUser . '%')
                            ->orWhere('fathers_name' , 'like', '%' . $this->searchUser . '%')->get();
                            
        }
        return view('livewire.admin.user-changes',compact('subdivisions', 'user', 'positions', 'competetionLevels', 'indicators'));
    }
}
