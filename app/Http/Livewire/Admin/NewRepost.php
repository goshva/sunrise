<?php

namespace App\Http\Livewire\Admin;

use App\Models\Competetion;
use App\Models\Objects;
use App\Models\Position;
use App\Models\Subdivision;
use App\Models\User;
use App\Models\UserRepost;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class NewRepost extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $users;   
    public $newReposts;
    public $oldReposts;
    public $searchTerm;
    protected $usersFilter = [];
    protected $usersFilters = false;
    public $searchTermOldReposts;
    protected $listeners = [
        'oldReposts',
        'newReposts',
        'filterRepost'
    ];
    public function mount(){
        $this->newReposts = true;
    }

    public function filterRepost($competetion, $position, $subdivision, $object, $time,$level){
        $this->usersFilters = true;
        $users = [];
            $all_users = User::where("email", "!=" , "help@smtk.com")->where("email", "!=" , "tech@smtk.com")->get();
           if(auth()->user()->role_id == 4){
            $all_users = User::where("admin_user_id", auth()->user()->id);
        }
            if($competetion == "" && $position == "" && $subdivision == "" && $object == "" ){
                foreach($all_users as $user){
                 $users[] =$user;
                }
             }
            if($object !== ""){
            foreach($all_users as $user){
                if($user->objects->first()){
                    foreach($user->objects as $user_subdivision){
                        if($user_subdivision->id == (int) $object){
                               if(!in_array($user,$users)){
                                $users[] = $user;
                             }
                        }
                    }
                }
                
            }
        }
        if($subdivision !== ""){
            foreach($all_users as $user){
                if($user->subdivisions){
                    foreach($user->subdivisions as $user_subdivision){
                        if((int) $subdivision == (int) $user_subdivision->id){
                                if(!in_array($user,$users)){
                                        $users[] = $user;
                                       }
                        }
                    }
                }

            }
        }
        if($position !== ""){
            foreach($all_users as $user){
                if($user->position->id == $position){
                   if(!in_array($user,$users)){
                    $users[] = $user;
                   }
                }
            }
        }
        if($competetion !== ""){
            foreach($all_users as $user){
              foreach($user->position->competetions as $user_competetion){
                if($user_competetion->id == $competetion){
                   if(!in_array($user,$users)){
                    $users[] = $user;
                   }
                }
              }
            }
        }
        $count_users = count($users);

        if($time !== ""){

           if($time !== "month" && $time !== "year"){
                $time = (int) $time;
           }
            for($i = 0; $i < $count_users;$i++){
            $user_competetions = [];
            foreach($users[$i]->competetions as $user_competetion){
                if($user_competetion->updated_at->format("y") == Carbon::now()->format('y')){
                $user_competetions[] = $user_competetion;
                }
            }
            foreach( $user_competetions as $competetion){
                $updated_at = $competetion->updated_at->format("m");
                $updated_at = substr($updated_at,-1);
                $updated_at = (int) $updated_at;
                if($competetion->is_done == 1){
                    if($time == 1){
                        if($updated_at > 3){
                        unset($users[$i]);
                    }
                }elseif($time == 2){
                        if(!($updated_at > 3 && $updated_at < 8)){
                        unset($users[$i]);
                    }
                }elseif($time == 3){
            if(!($updated_at > 4 && $updated_at < 9)){
                        unset($users[$i]);
                    }
                }elseif($time == 4){
                    if(!($updated_at > 8 && $updated_at <= 12)){
                        unset($users[$i]);
                    }
                }elseif($time == 'month'){
                    $now = Carbon::now()->format('m');
                    $now = substr($now, -1);
                    $now = (int) $now;
                    if($updated_at !== $now){
                        unset($users[$i]);
                    }
                }elseif($time == 'year'){
                    $updated_at = $competetion->updated_at->format("y");
                    $updated_at = substr($updated_at,-1);
                    $updated_at = (int) $updated_at;
                    $now = Carbon::now()->format('y');
                    $now = substr($now, -1);
                    $now = (int) $now;
                    if($updated_at !== $now){
                        unset($users[$i]);
                    }
                }
                }else{
                    unset($users[$i]);

                }
               
            }
            }
        }

        if($level !== ""){
            for($i = 0; $i< $count_users;$i++){
               if($users[$i]->competetions){
                foreach($users[$i]->competetions as $competetion){
                    $performance = (int) $competetion->performance;
                        if($level == "osvedomlen"){
                     if($performance == 0 || $performance > 20){
                         unset($users[$i]);
                     }
                    }elseif($level == "znanie"){
                     if($performance < 20 || $performance > 40){
                         unset($users[$i]);
                     }
                    }elseif($level == "opit"){
                     if($performance < 40 || $performance > 60){
                         unset($users[$i]);
                     }
                    }elseif($level == "master"){
                     if($performance < 60 || $performance > 80){
                         unset($users[$i]);
                     }
                    }elseif($level == "expert"){
                     if($performance < 80 || $performance > 100){
                         unset($users[$i]);
                     }
                    }
                 }
               }else{
                unset($users[$i]);
               }
            }
        }
        if($users == []){
            $this->usersFilter = false;
        }else{
            $this->usersFilter = $users;
        }
      
       
       
    }
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => 'reposts']);
    }
    public function oldReposts(){
        // dd(true);
        $this->oldReposts = true;
        $this->newReposts = false;
    }
    public function newReposts(){
        $this->oldReposts = false;
        $this->newReposts = true;
    }
    public function render()
    {
        $users = User::where("email", "!=" , "help@smtk.com")->where("email", "!=" , "tech@smtk.com")->orderBy("created_at","DESC")->paginate(8);
        if(auth()->user()->role_id == 4){
            $users = User::where("admin_user_id", auth()->user()->id)->where("email", "!=" , "help@smtk.com")->where("email", "!=" , "tech@smtk.com")->orderBy("created_at","DESC")->paginate(8);
        }
        if($this->searchTerm){
            $users =  User::where('first_name' , 'like', '%' . $this->searchTerm . '%')
                            ->orWhere('last_name' , 'like', '%' . $this->searchTerm . '%')
                            ->orWhere('fathers_name' , 'like', '%' . $this->searchTerm . '%')->paginate(8);
        }
        $user_reposts = UserRepost::orderBy("created_at","DESC")->get();
        if($this->searchTermOldReposts){
            $searchTermOldReposts = $this->searchTermOldReposts;
            $user_reposts =  UserRepost::with('user')->whereHas('user',function ($query) use ($searchTermOldReposts){
                $query->where('first_name' , 'like', '%' . $searchTermOldReposts . '%')
                ->orWhere('last_name' , 'like', '%' . $searchTermOldReposts . '%')
                ->orWhere('fathers_name' , 'like', '%' . $searchTermOldReposts . '%');
            })->get();
        }
            
            if($this->usersFilters ==true){
                if($this->usersFilter == false){
                    $users = [];
                }elseif($this->usersFilter != [] ){
                    $users = $this->usersFilter;
                }
            }
        
        // print_r($this->usersFilter);
        $competetions = Competetion::all();
        $subdivisions = Subdivision::all();
        $positions = Position::all();
        $objects = Objects::all();
        if(request('old') == "true"){
            $this->oldReposts = true;
            $this->newReposts = false;
        }
        return view('livewire.admin.new-repost', compact('users','user_reposts', 'competetions','subdivisions','positions','objects'));
    }
}
