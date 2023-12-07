<?php

namespace App\Http\Livewire\Client;

use App\Http\Controllers\UserController;
use App\Models\Question;
use App\Models\QuestionVariation;
use App\Models\UserCompetetionArchive;
use App\Models\TestQuestion;
use App\Models\TestQuestionVariation;
use App\Models\UserCompetetion;
use App\Models\UserTestAnswers;
use App\Models\UserTests;
use Livewire\Component;

class Test extends Component
{
    public $test;
    public $autoTest = false;
    public $autoTestQuestion;
    public $progressBar = 20;
    public $progressPage = 1;
    public $testQuestion = 0;
    public $userTest;
    public $points = 0.5;
    protected $listeners = [
        "checkAnswer",
        "saveAndQuit"
    ];
    public function mount($test){
        $user = auth()->user();
        $this->test = $test;
        // dd($test);
        $this->userTest = UserTests::where("user_id",auth()->id())->where("test_id",$this->test->id)->first();
        if($this->userTest->completed!== 0 && $this->userTest->completed!== 5){
            $this->progressPage = $this->userTest->completed+1;
            $this->progressBar = ($this->userTest->completed+1) * 20;
            $this->testQuestion = $this->userTest->completed;
            $this->points = ($this->userTest->completed+1 )/2;
        }
        $user_competetion  = UserCompetetion::where("user_id", $user->id)->where("competetion_id",$test->competetion->id)->first();
        if($test->created_type != "handle"){
            $this->autoTest = true;
            $randomId = Question::where('indicator_id', $test->indicator->id)
            ->where('points', '=', $this->points)
            ->whereHas('indicator', function ($query) {
                $query->where('competetion_id',  $this->test->competetion->id);
            })
            ->inRandomOrder()
            ->pluck('id')
            ->first();
            $this->autoTestQuestion = Question::find($randomId);
        }
       
    }
    public function saveAndQuit() {
        return redirect("/test-details" . "/" . $this->test->competetion_id)->with('Warning',"Прохождение теста не закончено");
    }   
        public function checkAnswer($answer)
        {
            if(!$this->autoTest){
                $variation = TestQuestionVariation::find($answer);
            }else{
                $variation = QuestionVariation::find($answer);
            }
          
            if ($variation->is_true === 1) {
                UserTestAnswers::create([
                    'user_test_id' => $this->userTest->id,
                    'competetion_id' => $this->test->competetion_id,
                    'question_id' =>
                        $this->test->questions[$this->testQuestion]->id,
                    'is_true' => true,
                ]);
                $this->userTest->points = $this->userTest->points + $this->points;
                $this->userTest->save();
            } else {
                UserTestAnswers::create([
                    'user_test_id' => $this->userTest->id,
                    'competetion_id' => $this->test->competetion_id,
                    'question_id' =>
                        $this->test->questions[$this->testQuestion]->id,
                    'is_true' => false,
                ]);
            }
            $this->userTest->completed = $this->progressPage;
            $this->userTest->save();
            $this->points += 0.5;
            $this->progressPage++;
            $randomId = Question::where('indicator_id', $this->test->indicator->id)
            ->where('points', '=', $this->points)
            ->whereHas('indicator', function ($query) {
                $query->where('competetion_id',  $this->test->competetion->id);
            })
            ->inRandomOrder()
            ->pluck('id')
            ->first();
            $this->autoTestQuestion = Question::find($randomId);
            if ($this->progressBar != 100 && $this->progressBar < 100) {
                $this->progressBar += 20;
            }
            if ($this->testQuestion !== 4 && $this->testQuestion < 4) {
                $this->testQuestion++;
            } else {
                $this->userTest->performance = floor(
                    ($this->userTest->points * 100) / $this->test->max_points
                );
                if($this->userTest->performance > 100) {
                    $this->userTest->performance = 100;
                }
                $level = 0;
                 if($this->userTest->points == 0.5){
                                    $level = 1;
                                }elseif($this->userTest->points <= 1.5 && $this->userTest->points > 0){
                                $level = 2;
                                }elseif($this->userTest->points <= 3 && $this->userTest->points > 0){
                                $level = 3;
                                }elseif($this->userTest->points <= 5 && $this->userTest->points > 0){
                                $level = 4;
                                }elseif($this->userTest->points <= 7.5 && $this->userTest->points > 0){
                                $level = 5;
                                }
                if ($level < $this->userTest->test->indicator->level && $level < 2) {
                         $this->userTest->text =
                            'Вы получили НИЗКИЕ результаты по данной компетенции.';
                    } elseif ($level < $this->userTest->test->indicator->level && $level >= 2) {
                        $this->userTest->text =
                            'Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии';
                    } elseif ($level == $this->userTest->test->indicator->level) {
                        $this->userTest->text =
                            'Вы СООТВЕТСТВУЕТЕ данной компетенции';
                    } else {
                         $this->userTest->text =
                            'Вы получили ВЫСОКИЕ результаты по данной компетенции';
                    }
                $this->userTest->save();
                $user = auth()->user();
                $user_competetion = UserCompetetion::where('user_id', $user->id)
                    ->where('competetion_id', $this->userTest->competetion_id)
                    ->first();
                $user_tests = UserTests::where('user_id', $user->id)
                    ->where('competetion_id', $this->userTest->competetion_id)
                    ->get();
                $user_competetion->progress++;
                $user_competetion->save();
                if (
                    $user_competetion->progress == count($user_tests)
                   //  && $user_competetion->max_points != 0
                ) {
                    $user_competetion->is_done = 1;
                    $user_competetion_test_points = 0;
                    foreach ($user_tests as $test) {
                        $user_competetion_test_points =
                            $user_competetion_test_points + $test->points;
                    }
                    if($user_competetion->max_points > 0) {
                         $user_competetion->performance = floor(
                        ($user_competetion_test_points * 100) /
                            $user_competetion->max_points
                    );
                    }
                   
                     $competetion_level = 0;
                        if(count($user_tests) == 2){
                            if($user_competetion_test_points >= 1.5 && $user_competetion_test_points <= 3){
                                $competetion_level = 2;
                            }elseif($user_competetion_test_points >= 3.5 && $user_competetion_test_points <= 6){
                                $competetion_level = 3;
                            }elseif($user_competetion_test_points > 0 && $user_competetion_test_points <= 1){
                                $competetion_level = 1;
                            }elseif($user_competetion_test_points >= 6.5 && $user_competetion_test_points <= 10){
                                $competetion_level = 4;
                            }elseif($user_competetion_test_points >= 10.5 && $user_competetion_test_points <= 15){
                                $competetion_level = 5;
                            }
                        }elseif(count($user_tests) == 3){
                            if($user_competetion_test_points >= 1.6 && $user_competetion_test_points <= 4.5){
                                $competetion_level = 2;
                            }elseif($user_competetion_test_points >= 3.5 && $user_competetion_test_points <= 6){
                                $competetion_level = 3;
                            }elseif($user_competetion_test_points > 0 && $user_competetion_test_points <= 1.5){
                                $competetion_level = 1;
                            }elseif($user_competetion_test_points >= 9.5 && $user_competetion_test_points <= 15){
                                $competetion_level = 4;
                            }elseif($user_competetion_test_points >= 15.1 && $user_competetion_test_points <= 22.5){
                                $competetion_level = 5;
                            }
                        }elseif(count($user_tests) == 4){
                            if($user_competetion_test_points >= 3 && $user_competetion_test_points <= 6){
                                $competetion_level = 2;
                            }elseif($user_competetion_test_points > 0 && $user_competetion_test_points <= 2){
                                $competetion_level = 1;
                            }elseif($user_competetion_test_points >= 7 && $user_competetion_test_points <= 12){
                                $competetion_level = 3;
                            }elseif($user_competetion_test_points >= 12.1 && $user_competetion_test_points <= 20){
                                $competetion_level = 4;
                            }elseif($user_competetion_test_points >= 20.1 && $user_competetion_test_points <= 30){
                                $competetion_level = 5;
                            }
                        }elseif(count($user_tests) == 5){
                            if($user_competetion_test_points >= 2.6 && $user_competetion_test_points <= 7.5){
                                $competetion_level = 2;
                            }elseif($user_competetion_test_points > 0 && $user_competetion_test_points <= 2.5){
                                $competetion_level = 1;
                            }elseif($user_competetion_test_points >= 7.6 && $user_competetion_test_points <= 17.5){
                                $competetion_level = 3;
                            }elseif($user_competetion_test_points >= 17.6 && $user_competetion_test_points <= 25){
                                $competetion_level = 4;
                            }elseif($user_competetion_test_points >= 25.1 && $user_competetion_test_points <= 37.5){
                                $competetion_level = 5;
                            }
                        }
                        $user_competetion->level = $competetion_level;
                        $user_competetion->points = $user_competetion_test_points;
                        if($competetion_level < $user_competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level < 2){
                            $user_competetion->text ="Вы получили НИЗКИЕ результаты по данной компетенции.";
                        }elseif($competetion_level < $user_competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level >= 2){
                            $user_competetion->text ="Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии";
                        }elseif($competetion_level == $user_competetion->competetion->levels->where("position_id",$user->position_id)->first()->level){
                             $user_competetion->text = "Вы СООТВЕТСТВУЕТЕ данной компетенции";
                        }elseif($competetion_level > $user_competetion->competetion->levels->where("position_id",$user->position_id)->first()->level){
                            $user_competetion->text = "Вы получили ВЫСОКИЕ результаты по данной компетенции";
                        }
                    $user_competetion->save();
                    UserCompetetionArchive::create(
                        [
                            "user_id"=>$user->id,
                            "competetion_id"=>$user_competetion->competetion->id,
                            "points"=>$user_competetion->points,
                            "level"=>$user_competetion->level,
                            "text"=>$user_competetion->text,
                            "date"=>$user_competetion->updated_at
                        ]);
                }
                return redirect(
                    '/test-details' . '/' . $this->test->competetion_id
                )->with('success', 'Тест был успешно пройден');
            }
        }
    public function render()
    {
        return view('livewire.client.test');
    }
}
