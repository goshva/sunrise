<?php

namespace App\Http\Livewire\Admin;

use App\Models\Competetion;
use App\Models\Position;
use App\Models\Subdivision;
use App\Models\SubdivisionUser;
use App\Models\User;
use App\Models\UserCompetetion;
use App\Models\UserSubdivision;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersPagination extends Component
{
    use WithPagination;
    protected $paginationTheme = 'default';
    public $filterByEnded;
    public $filterByDidntStart;
    public $filterByProgress;
    public $filterByAll;
    protected $listeners = [
        'filterUsers'
    ];
    public function filterUsers($filter){
       if($filter == "ended"){
        $this->filterByEnded=true;
        $this->filterByDidntStart = false;
        $this->filterByProgress = false;
        $this->filterByAll = false;
       }elseif($filter == "didntstart"){
        $this->filterByDidntStart = true;
        $this->filterByEnded = false;
        $this->filterByProgress = false;
        $this->filterByAll = false;
       }elseif($filter == "process"){
        $this->filterByProgress = true;
        $this->filterByEnded = false;
        $this->filterByDidntStart = false;
        $this->filterByAll = false;
       }elseif($filter == "all"){
        $this->filterByAll = true;
        $this->filterByEnded = false;
        $this->filterByDidntStart = false;
        $this->filterByProgress = false;
       }
    }
    public function getProgressBarClass($user) {
    if (count($user->competetions->where("is_done", 1)) == count($user->competetions) && count($user->competetions) != 0) {
        return 'green';
    } elseif (count($user->competetions->where("is_done", 1)) > 0) {
        return 'yellow';
    }elseif(count($user->competetions) == 0){
        return "grey";
    }
    else {
        return 'pink';
    }
}

    public function render()
    {
        $user = auth()->user();
        $users_all = User::all();
        $users = User::orderBy("created_at","DESC")->paginate(10);
        $subordinates = User::where("admin_user_id",$user->id)->get();
        $positions = Position::all();
        $subdivisions = Subdivision::all();
        $competetions = Competetion::all();
        $user_subdivisions = SubdivisionUser::all();
        $users_competetions = UserCompetetion::all();
        if($this->filterByEnded == true){
            $users = [];
            foreach($users_all as $user){
                if(count($user->competetions) == count($user->competetions->where("is_done", 1)) && count($user->competetions) != 0){
                    $users[] = $user;
                }
            }
            $users = $this->paginate($users);
        }elseif($this->filterByDidntStart == true){
            $users = [];
            foreach($users_all as $user){
                if(count($user->competetions) - count($user->competetions->where("is_done", 0)) == 0 && count($user->competetions) != 0){
                    $users[] = $user;
                }
            }
            $users = $this->paginate($users);
        }elseif($this->filterByProgress == true){
            $users = [];
            foreach($users_all as $user){
                if(count($user->competetions) > count($user->competetions->where("is_done", 1)) && count($user->competetions->where("is_done", 1)) != 0){
                    $users[] = $user;
                }
            }
            $users = $this->paginate($users);
        }elseif($this->filterByAll == true){
            $users = User::orderBy("created_at","DESC")->paginate(10);
        }
        return view('livewire.admin.users-pagination', compact('users','subordinates','positions','subdivisions','competetions','users_competetions','user_subdivisions'));
    }
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => 'dashboard', 'query' => request()->query()]);
    }
}
