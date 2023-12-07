<?php

namespace App\Http\Controllers;

use App\Models\Literature;
use App\Models\UserCompetetion;
use App\Models\UserLiterature;
use App\Models\UserTests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function changeLiterature(Request $request, $id)
    {
        $user = auth()->id();

        $literature = Literature::find($id);
        $userLiterature = UserLiterature::where('user_id', $user)
            ->where('literature_id', $id)
            ->first();
        if ($userLiterature) {
            $userLiterature->page = $request->page;
            $userLiterature->save();
            return back()->with('success', 'Страница была успешно сохранена');
        } else {
            UserLiterature::create([
                'user_id' => $user,
                'literature_id' => $id,
                'page' => $request->page,
            ]);
            return back()->with('success', 'Страница была успешно сохранена');
        }
    }

    public function startAgain(Request $request)
    {
        $userTest = UserTests::where('test_id', $request->test)->where('user_id', $request->user)->first();
        $userCompetetion = UserCompetetion::where('user_id', $request->user)
            ->where('competetion_id', $request->competetion_id)
            ->first();
        $userTest->performance = 0;
        $userTest->points = 0;
        $userTest->completed = 0;
        $userTest->text = '';
        $userTest->attempts = $userTest->attempts + 1;
        $userTest->save();
        $userCompetetion->performance = 0;
        $userCompetetion->is_done = 0;
        /*if($request->start_again_type == 'competetion') {
            $userCompetetion->progress = 0;
        }
        if($request->start_again_type == 'test') {
            $userCompetetion->progress = $userCompetetion->progress - 1;
        }*/
        if($userCompetetion->progress != 0){
             $userCompetetion->progress = $userCompetetion->progress - 1;
        }
        
        if($userCompetetion->max_points > 0) {
           $userCompetetion->performance = floor(
            ($userCompetetion->performance * 100) / $userCompetetion->max_points
        ); 
        }
        
       
        $userCompetetion->save();
        return redirect('/test' . '/' . $userTest->test->id);
    }
    
    public function startAgainCompetetion(Request $request, $id){
        $user_competetion = UserCompetetion::find($id);
        $user_tests = UserTests::where("user_id",$request->user)->where('competetion_id',$user_competetion->competetion->id)->get();
        $user_competetion->progress = 0;
        $user_competetion->performance = 0;
        $user_competetion->is_done = 0;
        $user_competetion->text = '';
        $user_competetion->save();
        foreach($user_tests as $user_test){
            $user_test->completed = 0;
            $user_test->points = 0;
            $user_test->performance = 0;
            $user_test->text = '';
            $user_test->attempts = $user_test->attempts+1;
            $user_test->save();
        }
        return redirect('/test-details'.'/'.$user_competetion->competetion->id);
    }
}
