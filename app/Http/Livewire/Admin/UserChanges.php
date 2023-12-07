<?php

namespace App\Http\Livewire\Admin;

use App\Models\Objects;
use App\Models\Position;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Subdivision;
use App\Models\SubdivisionUser;
use App\Models\User;
use App\Models\UserSubdivision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UserChanges extends Component
{
    use WithPagination;
    protected $users;
    public $searchTerm = '';
    public $locations;
    public $editUser;
    protected $listeners = [
        "changePass",
        "editUser"
    ];
    
    public function editUser($id){
        $user = User::find($id);
        $this->editUser = $user;
    }
    public function mount($locations) { 
        $this->locations = $locations;
     }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        // dd(request()->all());
        if(request('ended')){
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => 'users?ended=завершили']);

        }
        if(request('didntstart')){
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => 'users?didntstart=не+приступили']);

        }
        if(request('process')){
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => 'users?process=в+работе']);

        }
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => 'users']);
    }
    public function changePass($pass,$user){
        $user = User::find($user);
        $user->password = Hash::make($pass);
        $user->save();
        return redirect('/admin/users')->with('success', 'Пароль успешно был обновлен');
    }
    public function render(Request $request)
    {  
        $user = Auth::user();
        $users_all = User::all();
        $user_pag = User::orderBy("created_at","DESC")->get();
        if($user->role_id == 4){
            $users = $this->paginate($user_pag->where("admin_user_id", $user->id));
        }else{
            $users = $this->paginate($user_pag);
        }
        
        if($request->show_sub == "true"){
            $users = User::where("admin_user_id", $user->id)->paginate(8);
        }
        if($request->ended){
           $users = [];
            foreach($users_all as $user){
                if(count($user->competetions) == count($user->competetions->where("is_done", 1))  && count($user->competetions) != 0){
                  
                  if(auth()->user()->role_id == 4){
                        // dd($user->admin_user_id == auth()->id());
                        if($user->admin_user_id == auth()->id()){
                        
                            $users[] = $user;
                        }
                    }else{
                        $users[] = $user;
                    }
                
                }
            }
            $users = $this->paginate($users);
    // dd($users);
        }elseif($request->process){
            $users = [];
            foreach($users_all as $user){
                if(count($user->competetions) > count($user->competetions->where("is_done", 1))  && count($user->competetions->where("is_done", 1)) != 0){
                   if(auth()->user()->role_id == 4){
                        if($user->admin_user_id == auth()->id()){
                        
                            $users[] = $user;
                        }
                    }else{
                        $users[] = $user;
                    }
                }
            }
            $users = $this->paginate($users);
        }elseif($request->didntstart){
            $users = [];
            foreach($users_all as $user){
                if(count($user->competetions) - count($user->competetions->where("is_done", 0)) == 0){
                   if(auth()->user()->role_id == 4){
                        if($user->admin_user_id == auth()->id()){
                        
                            $users[] = $user;
                        }
                    }else{
                        $users[] = $user;
                    }
                }
            }
            $users = $this->paginate($users);
        }

    
       
        if($this->searchTerm){
            $users =  User::where('first_name' , 'like', '%' . $this->searchTerm . '%')
                            ->orWhere('last_name' , 'like', '%' . $this->searchTerm . '%')
                            ->orWhere('fathers_name' , 'like', '%' . $this->searchTerm . '%')->get();
        }
        $subdivisions = Subdivision::all();
        $objects = Objects::all();
        $positions = Position::all();
        // $positions = [];
        // foreach ($all_positions as $position) {
        //     if(!in_array($position,$positions)){
        //         $positions[] = $position;
        //     }
        // }
        $subdivisions = Subdivision::all();
        
        return view('livewire.admin.user-changes',compact('subdivisions','objects', 'user','users', 'positions'));
    }


}