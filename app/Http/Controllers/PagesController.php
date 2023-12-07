<?php

namespace App\Http\Controllers;

use App\Models\Competetion;
use App\Models\Literature;
use App\Models\Position;
use App\Models\Test;
use App\Models\User;
use App\Models\UserCompetetion;
use App\Models\CompetetionLevel;
use App\Models\Indicator;
use App\Models\UserTests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\Indirect;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class PagesController extends Controller
{
    public function client(){
        $user = auth()->user();
        $progress =  UserTests::where("user_id", $user->id)->where("completed", 5)->orderBy("updated_at", "ASC")->get();
        $progress =$progress->groupBy(function($data){
            return Carbon::parse($data->updated_at)->format('M');
        });
        $weeks = [];
        $weekCount = [];
        foreach ($progress as $week => $values) {
           if($week == 'Jun'){
            $weeks[] = 'июнь';
           }elseif($week == 'Sep'){
            $weeks[] = 'сент';
            
           }elseif($week == 'Jul'){
            $weeks[] = 'июль';
            
           }elseif($week == 'Aug'){
            $weeks[] = 'авг';
            
           }elseif($week == 'Oct'){
            $weeks[] = 'окт';
            
           }elseif($week == 'Nov'){
            $weeks[] = 'ноя';
            
           }elseif($week == 'Dec'){
            $weeks[] = 'дек';
            
           }elseif($week == 'May'){
            $weeks[] = 'май';
            
           }elseif($week == 'Apr'){
            $weeks[] = 'апр';
            
           }elseif($week == 'Jan'){
            $weeks[] = 'янв';
            
           }elseif($week == 'Feb'){
            $weeks[] = 'фев';
            
           }elseif($week == 'Mar'){
            $weeks[] = 'мар';
            
           }
            // dump(Carbon::parse($value->updated_at)->dayOfWeek);
            $weekCount[] = count($values);

           
           }
           $competetion_points = 0;
           $competetion_max_points = 0;
              $competetion_level = 0;
           foreach($user->competetions as $user_competetion){
                                $competetionLevel = CompetetionLevel::where('competetion_id',  $user_competetion->competetion->id)->where('position_id', $user->position->id)->first();

                $this_tests = UserTests::where("user_id", $user->id)->with(['test.commonTest', 'test.competetionTest'])
                ->whereHas('test', function ($query) use ($user_competetion) {
                    $query->whereHas('commonTest', function ($query) use ($user_competetion) {
                        $query->where('common_test_id', $user_competetion->common_test_id ?? null);
                    })->orWhereHas('competetionTest', function ($query) use ($user_competetion) {
                        $query->where('competetion_test_id', $user_competetion->competetion_test_id ?? null);
                    });
                })->where("competetion_id" , $user_competetion->competetion_id)->get();
                
                     
                        if(count($this_tests) == 2){
                            if($competetionLevel->level == 1){
                                $competetion_level += 1;
                            }elseif($competetionLevel->level == 2){
                                $competetion_level += 3;
                            }elseif($competetionLevel->level == 3){
                                $competetion_level += 6;
                            }elseif($competetionLevel->level == 4){
                                $competetion_level += 10;
                            }elseif($competetionLevel->level == 5){
                                $competetion_level += 15;
                            }
                        }elseif(count($this_tests) == 3){
                            if($competetionLevel->level == 1){
                                $competetion_level += 1.5;
                            }elseif($competetionLevel->level == 2){
                                $competetion_level += 4.5;
                            }elseif($competetionLevel->level == 3){
                                $competetion_level += 9;
                            }elseif($competetionLevel->level == 4){
                                $competetion_level += 15;
                            }elseif($competetionLevel->level == 5){
                                $competetion_level += 22.5;
                            }
                        }elseif(count($this_tests) == 4){
                            if($competetionLevel->level == 1){
                                $competetion_level += 2;
                            }elseif($competetionLevel->level == 2){
                                $competetion_level += 6;
                            }elseif($competetionLevel->level == 3){
                                $competetion_level += 12;
                            }elseif($competetionLevel->level == 4){
                                $competetion_level += 20;
                            }elseif($competetionLevel->level == 5){
                                $competetion_level += 30;
                            }
                        }elseif(count($this_tests) == 5){
                           if($competetionLevel->level == 1){
                                $competetion_level += 2.5;
                            }elseif($competetionLevel->level == 2){
                                $competetion_level += 7.5;
                            }elseif($competetionLevel->level == 3){
                                $competetion_level += 17.5;
                            }elseif($competetionLevel->level == 4){
                                $competetion_level += 25;
                            }elseif($competetionLevel->level == 5){
                                $competetion_level += 37.5;
                            }
                        }
                        // if($competetion_level > )
                      
               $competetion_points+=$user_competetion->points;
                $competetion_max_points+=$user_competetion->max_points;
           }
            
           if($competetion_points == 0 && $competetion_level == 0){
               $resultat_fact = 0;
           }else{
                $resultat_fact = $competetion_points / $competetion_level * 100;
           }
        //   if($resultat_fact > 100){
        //       $resultat_fact = 100;
        //   }
        $latest_competetion = UserCompetetion::where("user_id", $user->id)->where("is_done",1)->orderBy('updated_at', "DESC")->first();
       
        return view('containers.client.dashboard', compact('weekCount', 'weeks','latest_competetion','user' , 'resultat_fact'));
    }
    public function tests(){
        $user = auth()->user();
        $user_position = Position::find($user->position_id);
        $user_competetions = $user->competetions;
        // dd($user_competetions);
    
        return view('containers.client.tests', ["competetions"=>$user_competetions],compact('user_position','user'));
    }

    public function literature(){
        $user = auth()->user();
        $literatures = [];
       $competetions = Competetion::has('literatures')
                           ->with('literatures')
                           ->orderBy('created_at', 'DESC')
                           ->get();
        foreach($user->position->competetions as $competetion){
            if(Literature::where("competetion_id", $competetion->id)->first()){
                $literatures[] = Literature::where("competetion_id", $competetion->id)->first();
            }
        }
        $user_tests = UserTests::where("user_id", $user->id)
        ->where("text", 'like', '%'."Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии"."%")
        ->orWhere("text", 'like', '%'."Вы получили НИЗКИЕ результаты по данной компетенции"."%")
        ->get();
        
        return view('containers.client.literature', compact('literatures','user','competetions','user_tests' ));
    }

    public function test_details($id){
        $competetion = Competetion::find($id);
        $user = auth()->user();
        $user_position_id = $user->position->id;
        $user_tests = UserTests::where("user_id",$user->id)->where("competetion_id", $id)->where("position_id", $user_position_id)->get();//
        $user_competetion_level = CompetetionLevel::where("competetion_id", $id)->where("position_id", $user_position_id)->first()->level;
        $user_tests_indicators = Indicator::where("competetion_id", $id)->where('level', $user_competetion_level)->get();
        //dd($user_tests_indicators);
        return view('containers.client.test.test-details', ["user_tests"=>$user_tests, "user"=>$user,'competetion'=>$competetion]);
    }

    public function test($id){
       // $test = Test::where("indicator_id",$id)->where("competetion_test_id", $competetion_test->id)->first();
      $test = Test::find($id);
        return view('containers.client.test.test', ["test"=>$test]);
    }
    
    public function statistic(){
        $user = auth()->user();
        $user_competetions = $user->competetions;
        return view('containers.client.statistic',['user_competetions'=>$user_competetions,'user'=>$user]);
    }

    public function login(){
        return view('containers.login');
    }

    public function support(){
        return view('containers.client.chat');
    }

    public function learning_material(){
        return view('containers.client.learning_material');
    }

    public function page_not_found(){
        return view('errors.404');
    }

    public function test_results($id){
        //$test = Test::where("indicator_id",$id)->first();
        $test = Test::find($id);
        $user_test = UserTests::where("user_id", auth()->id())->where("test_id",$test->id)->first();
        return view('containers.client.test.test-results',["test"=>$test, "user_test"=>$user_test]);
    }
    public function competetion_results($id){
        $competetion = Competetion::find($id);
        $user = auth()->user();
        $user_competetion = $user->competetions->where("competetion_id", $id)->first();
foreach ($user->tests as $test) {
   $indicator_id = $test->test->indicator->id;
    $test = Test::where("indicator_id",$indicator_id)->first();
}
         
        return view('containers.client.test.competetion-status',["competetion"=>$competetion,'user_competetion'=>$user_competetion,'user'=>$user, 'test'=>$test]);
    }
    
}
