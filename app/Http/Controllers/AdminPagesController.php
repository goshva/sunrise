<?php

namespace App\Http\Controllers;

use App\Models\Competetion;
use App\Models\CompetetionTest;
use App\Models\CommonTest;
use App\Models\CompetetionLevel;
use App\Models\Literature;
use App\Models\Objects;
use App\Models\Position;
use App\Models\Subdivision;
use App\Models\Test;
use App\Models\User;
use App\Models\Role;
use App\Models\Indicator;
use App\Models\UserCompetetion;
use App\Models\UserTests;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminPagesController extends Controller
{
    
    public $editedUser;
    public $searchUser;
    public function admin_dashboard(Request $request)
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        $user = Auth::user();
        if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        $subordinates = User::where('admin_user_id', $user->id)->get();
        $positions = Position::all();
        $subdivisions = Subdivision::all();
        $competetions = Competetion::all();
        $objects = Objects::all();
        $users_competetions = UserCompetetion::all();
        //    dd($user_competetions);
        $users_all = User::all();
        $locations = [];
        foreach ($users_all as $user) {
            if (!in_array($user->location, $locations)) {
                $locations[] = $user->location;
            }
        }
        $month = [];
        $monthCount = [];
        /***********  if request has location or filter by date ************/
        if ($request->location || $request->filterByDateFrom) {
            $user_competetions_array = [];
            /***********  if request location is selected  ************/
            if ($request->location !== 'all') {
                $users_locations = User::where(
                    'location',
                    '=',
                    $request->location
                )->get();
                /****************  if request location is all ************/
            } else {
                $users_locations = [];
            }

            /****************  if request has filters by date *****************/

            if ($request->filterByDateFrom !== null) {
                /****************  if request location is selected *****************/
                if ($users_locations) {
                    for ($i = 0; $i < count($users_locations); $i++) {
                        $user_competetions = UserCompetetion::where(
                            'is_done',
                            1
                        )
                            ->where('user_id', $users_locations[$i]->id)
                            ->where(
                                'updated_at',
                                '>',
                                $request->filterByDateFrom
                            )
                            ->where('updated_at', '<', $request->filterByDateTo)
                            ->orderBy('updated_at', 'ASC')
                            ->get();
                        $user_competetions = $user_competetions
                            ->groupBy(function ($date) {
                                return Carbon::parse($date->updated_at)->format(
                                    'd m'
                                );
                            })
                            ->all();
                        if ($user_competetions !== []) {
                            if (
                                !in_array(
                                    $user_competetions,
                                    $user_competetions_array
                                )
                            ) {
                                // dd($user_competetions);
                                $user_competetions_array[] = $user_competetions;
                            }
                        }
                    }
                    foreach (
                        $user_competetions_array
                        as $key => $user_competetion
                    ) {
                        foreach ($user_competetion as $key2 => $value) {
                            if (!in_array($key2, $month)) {
                                $month[] = $key2;
                                $monthCount[] = count($value);
                            } else {
                                $monthCount[0]++;
                            }
                        }
                    }

                    sort($month);
                    sort($monthCount);

                    /****************  if request location is all *****************/
                } else {
                    $user_competetions = UserCompetetion::where('is_done', 1)
                        ->where('updated_at', '>', $request->filterByDateFrom)
                        ->orderBy('updated_at', 'ASC')
                        ->get();
                    $user_competetions = $user_competetions
                        ->groupBy(function ($date) {
                            return Carbon::parse($date->updated_at)->format(
                                'd m'
                            );
                        })
                        ->all();
                    foreach ($user_competetions as $key => $user_competetion) {
                        // dump($key->key);
                        $month[] = $key;
                        $monthCount[] = count($user_competetion);
                    }
                }
                /****************  if request dont have filters by date *****************/
            } else {
                if ($users_locations) {
                    for ($i = 0; $i < count($users_locations); $i++) {
                        $user_competetions = UserCompetetion::where(
                            'is_done',
                            1
                        )
                            ->where('user_id', $users_locations[$i]->id)
                            ->whereMonth('updated_at', Carbon::now()->month)
                            ->orderBy('updated_at', 'ASC')
                            ->get();
                        $user_competetions = $user_competetions
                            ->groupBy(function ($date) {
                                return Carbon::parse($date->updated_at)->format(
                                    'd m'
                                );
                            })
                            ->all();
                        if ($user_competetions !== []) {
                            if (
                                !in_array(
                                    $user_competetions,
                                    $user_competetions_array
                                )
                            ) {
                                // dd($user_competetions);
                                $user_competetions_array[] = $user_competetions;
                            }
                        }
                    }
                    foreach (
                        $user_competetions_array
                        as $key => $user_competetion
                    ) {
                        foreach ($user_competetion as $key2 => $value) {
                            if (!in_array($key2, $month)) {
                                $month[] = $key2;
                                $monthCount[] = count($value);
                            } else {
                                $monthCount[0]++;
                            }
                        }
                    }

                    sort($month);
                    sort($monthCount);
                }
            }
            /****************  if request dont have filters *****************/
        } else {
            $user_competetions = UserCompetetion::where('is_done', 1)
                ->whereMonth('updated_at', Carbon::now()->month)
                ->orderBy('updated_at', 'ASC')
                ->get();
            $user_competetions = $user_competetions
                ->groupBy(function ($date) {
                    return Carbon::parse($date->updated_at)->format('d');
                })
                ->all();
            foreach ($user_competetions as $key => $user_competetion) {
                // dump($key->key);
                $month[] = $key;
                $monthCount[] = count($user_competetion);
            }
        }
        
        return view(
            'containers.admin.admin',
            [
                'positions' => $positions,
                'users' => $users,
                'subdivisions' => $subdivisions,
                'competetions' => $competetions,
                'objects' => $objects,
            ],
            compact('locations', 'month', 'monthCount', 'users_competetions')
        );
    }
    public function findUserByName(Request $request) {
         $this->searchUser = User::where('first_name' , 'like', '%' . $request->name . '%')
                            ->orWhere('last_name' , 'like', '%' . $request->name . '%')
                            ->orWhere('fathers_name' , 'like', '%' . $request->name . '%')->get();
                            return $this->searchUser;
    }
    public function findUserById(Request $request) {
         $this->editedUser = User::find($request->user_id);
$editedUser = $this->editedUser;
         return $editedUser;
    }
    public function users(Request $request)
    {
        $user = User::find(auth()->id());
        $filteredTests = collect();

        foreach ($user->competetions as $userCompetetion) {
            if ($userCompetetion->competetionTest != null) {
                $filteredTestsForThisCompetetion = $userCompetetion->competetionTest->tests->filter(
                    function ($test) use ($userCompetetion) {
                        return $test->competetion_test_id ==
                            $userCompetetion->competetionTest->id;
                    }
                );

                $filteredTests = $filteredTests->concat(
                    $filteredTestsForThisCompetetion
                );
            }
        }
        $users_all = User::all();
        $user = Auth::user();
        $all_positions = Position::all();
        
        $users = User::orderBy('created_at', 'DESC')->paginate(8);
        if($user->role_id == 4){
            $users = $users->where("admin_user_id", $user->id);
        }
        if ($request->show_sub == 'true') {
            $users = User::where('admin_user_id', $user->id)->paginate(8);
        }
        if ($request->ended) {
            $users = [];
            foreach ($users_all as $user) {
                
                if (
                    count($user->competetions) ==
                        count($user->competetions->where('is_done', 1)) &&
                    count($user->competetions) != 0
                ) {
                    if(auth()->user()->role_id == "4"){
                        if($user->admin_user_id == auth()->id()){
                        
                            $users[] = $user;
                        }
                    }else{
                        $users[] = $user;
                    }
                    
                }
            }
            $users = $this->paginate($users);
        } elseif ($request->process) {
            $users = [];
            foreach ($users_all as $user) {
                if (
                    count($user->competetions) >
                        count($user->competetions->where('is_done', 1)) &&
                    count($user->competetions->where('is_done', 1)) != 0
                ) {
                   if(auth()->user()->role_id == "4"){
                      
                        if($user->admin_user_id == auth()->id()){
                            $users[] = $user;
                        }
                    }else{
                        $users[] = $user;
                    }
                }
            }
            $users = $this->paginate($users);
        } elseif ($request->didntstart) {
            $users = [];
            foreach ($users_all as $user) {
                if (
                    count($user->competetions) -
                        count($user->competetions->where('is_done', 0)) ==
                    0 && count($user->competetions) > 0
                ) {
                   if(auth()->user()->role_id == "4"){
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
        $subdivisions = Subdivision::all();
        $objects = Objects::all();
        $positions = [];
        foreach ($all_positions as $position) {
            if (!in_array($position, $positions)) {
                $positions[] = $position;
            }
        }
        if($this->searchUser !== null) {
            $users = $this->searchUser;
        }
         $competetionLevels = CompetetionLevel::all();
         $indicators = Indicator::all();
        //  dd($users);
        $locations = $this->getLocations(); 
        return view(
            'containers.admin.users',
            [
                'positions' => $positions, 
                'users' => $users,
                'subdivisions' => $subdivisions,
                'editedUser' => $this->editedUser,
                'locations' => $locations,
                'competetionLevels' => $competetionLevels,
                'indicators' => $indicators,
            ],
            compact('objects')
        );
    }
public function getLocations() {
$locations = Location::all();
return $locations;
}
    public function messages()
    {
        return view('containers.admin.messages');
    }

    public function tests_create()
    {
                if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        return view('containers.admin.make_tests');
    }
    public function tests_create_auto()
    {
                if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        return view('containers.admin.make_tests_auto');
    }
    public function tests_constructor($id)
    {
                if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        $competetion = CompetetionTest::find($id);
        $tests = $this->paginate($competetion->tests);

        // dd($tests->questions->v);
        return view('containers.admin.test_constructor', [
            'tests' => $tests,
            'competetion' => $competetion,
        ]);
    }
    public function competetion_constructor()
    {
        if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        $all_tests_competetions = CompetetionTest::all();
        $handle_create = CompetetionTest::where(
            'created_type',
            'handle'
        )->orderBy('created_at', 'DESC')->get();
       // $auto_create = CompetetionTest::where('created_type', 'auto')->orderBy('created_at', 'DESC')->get();
       $auto_create = CommonTest::where('created_type', 'auto')->orderBy('created_at', 'DESC')->get();

        //$tests = Test::orderBy("created_at","DESC")->get();
        //$handle_created_tests = CompetetionTest::where('created_type', 'handle')->orderBy("created_at","DESC")->get();
        // $auto_created_tests = CompetetionTest::where('created_type', 'auto')->orderBy("created_at","DESC")->get();
        // $all_tests_competetions_random = CompetetionTest::inRandomOrder()->get();
        // dd($all_tests_competetions_random);
        $competetions_for_publishing = [];
        foreach ($all_tests_competetions as $competetion) {
            if (count($competetion->tests) > 0) {
                $competetions_for_publishing[] = $competetion;
            }
            // dd($competetions_for_publishing);
        }
        $competetions_for_publishing = $this->paginate(
            $competetions_for_publishing
        );
         if(request('created_type') == 'auto_create'){
            $handle_create = $this->paginate(
                $handle_create, 'competetion_constructor?created_type=handle_create',8,1
            );
        }else{
            $handle_create = $this->paginate(
                $handle_create, 'competetion_constructor?created_type=handle_create'
            );
        }
        if(request('created_type') == 'handle_create'){
            $auto_create = $this->paginate(
                $auto_create,
                'competetion_constructor?created_type=auto_create',8,1
            );
        }else{
            $auto_create = $this->paginate(
                $auto_create,
                'competetion_constructor?created_type=auto_create'
            );
        }
        // dd($tests->questions->v);
        return view('containers.admin.competetion_constructor', [
            'competetions_for_publishing' => $competetions_for_publishing,
            'handle_create' => $handle_create,
            'auto_create' => $auto_create,
        ]);
    }
    public function competetion_constructor_auto_create()
    {
                if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        $all_tests_competetions_random = CompetetionTest::inRandomOrder()->get();
        $competetions_for_publishing = [];
        foreach ($all_tests_competetions_random as $competetion) {
            if (count($competetion->tests) > 0) {
                $competetions_for_publishing[] = $competetion;
            }
            // dd($competetions_for_publishing);
        }
        $competetions_for_publishing = $this->paginate(
            $competetions_for_publishing
        );

        // dd($tests->questions->v);
        return view('containers.admin.competetion_constructor', [
            'competetions_for_publishing' => $competetions_for_publishing,
        ]);
    }
    public function tests(Request $request)
    {
                if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        $all_competetions = Competetion::all();
        $all_competetion_tests = CompetetionTest::all();
        $tests = Test::orderBy('created_at', 'DESC')->get();
        $published_tests = Test::where('is_published', 1)
            ->orderBy('created_at', 'DESC')
            ->get();
        $competetions_for_publishing = [];
        foreach ($all_competetion_tests as $competetion) {
            if (
                count($competetion->tests) ==
                    count($competetion->competetion->indicators) &&
                count($competetion->tests) != 0
            ) {
                $competetions_for_publishing[] = $competetion;
            }
        }
        $tests_last_month = Test::select('*')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        $users = User::all();

        $competetions = [];
        foreach ($all_competetions as $competetion) {
            foreach ($competetion->indicators as $indicator) {
                if ($indicator->test !== null) {
                    $competetions[] = $competetion;
                }
            }
        }
        $competetion_for_publishing = null;
        if ($request->competetions_for_publishing) {
            // $competetionTest = CompetetionTest::find()
            if($request->created_type == 'auto_create') {
                $competetion_for_publishing = CommonTest::find(
                $request->competetions_for_publishing
            );
            } else {
                $competetion_for_publishing = CompetetionTest::find(
                $request->competetions_for_publishing);
            }
            
            session(['appoint-test' => 'active']);
        }
        $competeions_date = [];
        foreach ($all_competetions as $competetion2) {
            if (
                count($competetion2->tests) ==
                    count($competetion2->indicators) &&
                count($competetion2->indicators) !== 0
            ) {
                if (!in_array($competetion2, $competeions_date));
                $competeions_date[] = $competetion2;
            }
        }

        $test_ended = UserCompetetion::where('is_done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->get();
        $test_doing = UserCompetetion::where('progress', '<', 5)
            ->where('progress', '>', 0)->where('progress', '<', 5)
            ->whereDate('updated_at', Carbon::today())
            ->get();
        $test_not_doing = UserCompetetion::where('progress', 0)
            ->whereDate('updated_at', Carbon::today())
            ->get();
        $handle_create = CompetetionTest::where(
            'created_type',
            'handle'
        )->get();
       // $auto_create = CompetetionTest::where('created_type', 'auto')->get();
$auto_create = CommonTest::where('created_type', 'auto')->orderBy('created_at', 'DESC')->get();
        if ($request->day) {
            if ($request->day === 'month') {
                $test_ended = UserCompetetion::where('is_done', 1)
                    ->whereMonth('updated_at', Carbon::now()->month)
                    ->get();
                $test_doing = UserCompetetion::where('progress', '<', 5)
                    ->where('progress', '>', 1)
                    ->whereMonth('updated_at', Carbon::now()->month)
                    ->get();
                $test_not_doing = UserCompetetion::where('progress', 0)
                    ->whereMonth('updated_at', Carbon::now()->month)
                    ->get();
                // dd($test_not_doing);
            }
            if ($request->competetions !== 'all') {
                $test_ended = $test_ended->where(
                    'competetion_id',
                    $request->competetions
                );
                $test_doing = $test_doing->where(
                    'competetion_id',
                    $request->competetions
                );
                $test_not_doing = $test_not_doing->where(
                    'competetion_id',
                    $request->competetions
                );
            }
            return view(
                'containers.admin.tests',
                compact(
                    'tests',
                    'competetions_for_publishing',
                    'handle_create',
                    'auto_create',
                    'published_tests',
                    'tests_last_month',
                    'users',
                    'competetion_for_publishing',
                    'test_ended',
                    'test_doing',
                    'test_not_doing',
                    'competetions',
                    'competeions_date'
                )
            );
        }
        return view(
            'containers.admin.tests',
            compact(
                'tests',
                'competetions_for_publishing',
                'handle_create',
                'auto_create',
                'published_tests',
                'tests_last_month',
                'users',
                'competetion_for_publishing',
                'test_ended',
                'test_doing',
                'test_not_doing',
                'competetions',
                'competeions_date'
            )
        );
    }

    public function positions()
    {
        return view('containers.admin.positions');
    }

    public function reposts(Request $request)
    {
        $user = Auth::user();
        $positions = Position::all();
        $users = User::orderBy('created_at', 'DESC')->paginate(8);
        $subdivisions = Subdivision::all();
        return view('containers.admin.reposts', [
            'positions' => $positions,
            'users' => $users,
            'subdivisions' => $subdivisions,
        ]);
    }

    public function edit_test($id)
    {
                if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        $test = Test::find($id);
        if ($test) {
            return view('containers.admin.edit_test', ['test' => $test]);
        } else {
            return view('errors.404');
        }
    }

    public function literature()
    {
                if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        $competetions = Competetion::orderBy('created_at', 'DESC')->get();
        $literatures = Literature::orderBy('created_at', 'DESC')->get();
        return view('containers.admin.literature', [
            'competetions' => $competetions,
            'literatures' => $literatures,
        ]);
    }

    public function editLiterature($id)
    {
                if(auth()->user()->role_id == 4){
             return view('errors.404');
        }
        $literature = Literature::find($id);
        $competetions = Competetion::all();
        return view('containers.admin.edit_literautre', [
            'literature' => $literature,
            'competetions' => $competetions,
        ]);
    }

    public function adminRoles()
    {
        
        $usersItems = [];
        $usersArray = User::orderBy('created_at', 'DESC')->paginate(8);
        foreach ($usersArray as $key => $user) {
            $user_roles = Role::where('id', $user->role_id)->get();
            $user->roles = $user_roles;
            $usersItems[$key] = $user;
        }
        $users = $usersArray;
        return view('containers.admin.roles', compact('users'));
    }

    public function paginate($items, $url = null, $perPage = 8, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items =
            $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            //['path' => request()->url(), 'query' => request()->query()]
             ['path' => $url]
        );
    }
}
