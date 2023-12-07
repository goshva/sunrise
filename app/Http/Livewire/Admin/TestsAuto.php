<?php

namespace App\Http\Livewire\Admin;

use App\Models\Competetion;
use App\Models\CompetetionTest;
use App\Models\CommonTest;
use App\Models\Indicator;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\CompetetionLevel;
use App\Models\TestQuestionFiles;
use App\Models\TestQuestionVariation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Termwind\Components\Dd;
use App\Models\Question;
use App\Models\QuestionVariation;
use Illuminate\Http\Request;

class TestsAuto extends Component
{
    public $competetions;
    public $competetion;
    public $competetionTest;
    public $commonTest;
    public $selectedIndicator;
    public $testName;
    public $trueVariation;
    public $endTest = false;
    public $barProgress = 20;
    public $progressPage = 1;
    public $questionPoints = 0.5;
    public $question;
    public $goBackPage = 0;
    public $questionLevel;
    public $questionFile;
    public $TestRecomendedName;
    public $editQuestion;
    public $editQuestionFile;
    public $variations_change = [];
    public $questionType = 'text';
    public $variations = [];
    public $test;
    protected $listeners = [
        'changeCompetetion',
        'selectIndicator',
        'getVariationsAuto',
        'saveAndQuit',
        'changeTypeAudio',
        'changeTypeImage',
        'changeTypeVideo',
        'changeTypeText',
        'uploadFile',
        'TestRecomended',
        'goBack',
        'changeTest',
        'updateQuestion',
    ];

    public function changeTypeImage()
    {
        $this->questionType = 'image';
    }

    public function changeTypeVideo()
    {
        $this->questionType = 'video';
    }
    public function changeTypeAudio()
    {
        $this->questionType = 'audio';
    }
    public function changeTypeText()
    {
        $this->questionType = 'text';
    }
    public function uploadFile($file)
    {
        if ($this->editQuestion) {
            array_push(
                $this->variations_change,
                $this->editQuestion->variations
            );
        }
        if ($this->questionType == 'video') {
            $questionFileParts = explode(';base64,', $file);
            $file = base64_decode($questionFileParts[1]);
            $newName = time() . '-' . strpos($file, 0, 20) . '.mp4';
            Storage::disk('public')->put('videos' . '/' . $newName, $file);
            $this->questionFile = url('/storage/videos/' . $newName);
            if ($this->editQuestion) {
                $this->editQuestionFile = $this->questionFile;
            }
        } elseif ($this->questionType == 'image') {
            $questionFileParts = explode(';base64,', $file);
            $file = base64_decode($questionFileParts[1]);
            $newName = time() . '-' . strpos($file, 0, 20) . '.jpg';
            Storage::disk('public')->put('images' . '/' . $newName, $file);
            $this->questionFile = url('/storage/images/' . $newName);
            if ($this->editQuestion) {
                $this->editQuestionFile = $this->questionFile;
            }
        } elseif ($this->questionType == 'audio') {
            $questionFileParts = explode(';base64,', $file);
            $file = base64_decode($questionFileParts[1]);
            $newName = time() . '-' . strpos($file, 0, 20) . '.mp3';
            Storage::disk('public')->put('audio' . '/' . $newName, $file);
            $this->questionFile = url('/storage/audio/' . $newName);
            if ($this->editQuestion) {
                $this->editQuestionFile = $this->questionFile;
            }
        }
    }
    public function saveAndQuit()
    {
        $test = Test::where('indicator_id', $this->selectedIndicator->id)
            ->where('competetion_test_id', session('competetionTest'))
            ->first();
        if (count($test->questions) == $this->progressPage) {
            $test->completed = $this->progressPage;
            $test->save();
        } else {
            $test->completed = $this->progressPage - 1;
            $test->save();
        }
        session()->forget('competetionTest');
        session()->forget('test_id');
        return redirect(route('admin.competetion.constructor'))->with(
            'successCreatedWarning',
            'Тест был успешно создан , но не закончен'
        );
    }

    public function getVariationsAuto($variations, Request $request)
    {
       
        foreach ($this->competetion->indicators as $indicatorItem) {
            $this->variations_change = [];
            $this->variations = [];
        
            array_push($this->variations, $variations);
            if ($this->barProgress <= 80) {
                $this->barProgress = $this->barProgress + 20;
            } else {
                $this->endTest = true;
            }
            
            $commonTest = CommonTest::where('name',
                'LIKE',
                '%' . $this->testName . '%')->first();
              //  if ($commonTest) {
            //return session([
           //     'nameExist' => 'Тест с таким названием уже существует',
          //  ]);
        //}
                  $competetionId = $this->competetion->id;
                if(!$commonTest) {
                  
                    $commonTest = CommonTest::create([
                'name' => $this->testName,
                'competetion_id' => $competetionId,
                'created_type' => 'auto',
            ]);
                }
            $this->commonTest = $commonTest;
            $competetionTest = CompetetionTest::create([
                'name' => $this->testName,
                'competetion_id' => $this->competetion->id,
                'common_test_id' => $commonTest->id,
                'created_type' => 'auto',
            ]);
            // session(['competetionTest' => $competetionTest->id]);
            $this->competetionTest = $competetionTest->id;
            //если есть тест с этими индикаторами, то взять его, если нет - создать
            if (
                Test::where('indicator_id', $indicatorItem->id)
                    ->where('competetion_test_id', $competetionTest->id)
                    ->first()
            ) {
                $test = Test::where('indicator_id', $indicatorItem->id)
                    ->where('competetion_test_id', $competetionTest->id)
                    ->first();
            } else {
                //создаю тест без вопросов и ответов
                $test = Test::create([
                    'name' => $this->testName,
                    'competetion_id' => $this->competetion->id,
                    'competetion_test_id' => $competetionTest->id,
                    'common_test_id' => $commonTest->id,
                    'indicator_id' => $indicatorItem->id,
                    'completed' => $this->progressPage,
                    'created_type' => 'auto',
                ]);
            }

            //        session(['test_id' => $test->id]);

            //ищу questions с вопросами и ответами
            $testQuestionsArray = [];
            $testQuestionsVariationsArray = [];
            $testQuestionsFilesArray = [];
          $indicatorItemId = $indicatorItem->id;
$points = 0.5;

for ($p = 0; $p < 5; $p++) {
    // Query for questions with the current points
 $randomId = Question::where('indicator_id', $indicatorItemId)
    ->where('points', '=', $points)
    ->whereHas('indicator', function ($query) {
        $query->where('competetion_id', $this->competetion->id);
    })
    ->inRandomOrder()
    ->pluck('id')
    ->first();

$availableQuestions = Question::find($randomId);

    if ($availableQuestions) {
        if(!in_array($availableQuestions,$testQuestionsArray)){
            $testQuestionsArray[] = $availableQuestions;
        }
        $question = $availableQuestions;
        $points += 0.5; // Increment points for the next iteration
    } else {
        // Handle the case where no questions with the required points are available
        // You may want to break out of the loop or handle this situation accordingly.
        break;
    }

    // Now you can use $question for your purposes
}

    
                if ($question == null || $question->text == null) {
                    return session([
                        'nameExist' =>
                            'Не загружены вопросы по данному индикатору',
                    ]);
                }
                foreach($testQuestionsArray as $testQuestion){
                    $question = Question::find($testQuestion['id']);
                    $test_question = TestQuestion::create([
                    'test_id' => $test->id,
                    'question' => $question->text,
                    'type' => $question->type,
                    'progress' => $p + 1,
                    'points' => $question->points,
                    'indicator_id' => $question->indicator_id,
                ]);
                if ($this->questionFile) {
                    TestQuestionFiles::create([
                        'test_question_id' => $testQuestionsArray[$p]->id,
                        'file' => $this->questionFile,
                    ]);
                }
                $questionVariations = QuestionVariation::where(
                    'question_id',
                    $question->id
                )->take(3)->get();

                foreach ($questionVariations as $key => $item) {
                     TestQuestionVariation::create([
                        'test_question_id' => $test_question->id,
                        'variation' => $item->text,
                        'is_true' => $item->is_true,
                    ]);
                }
            
                }
                

                
            // dd($testQuestionsArray);
            //создать 5 вопросов

            $test->completed = $this->progressPage;
            $test->created_type = 'auto';
            $test->is_published = 1;
            $test->save();
            $competetionTest = CompetetionTest::find($competetionTest->id);
            if (
                count($competetionTest->tests) ==
                count($competetionTest->competetion->indicators)
            ) {
                return redirect(route('admin.competetion.constructor'))->with(
                    'successCreated',
                    'Тест был успешно создан'
                );
            } else {
                for ($i = 0; $i < count($this->competetion->indicators); $i++) {
                    if (
                        $indicatorItem->id ==
                        $this->competetion->indicators[$i]->id
                    ) {
                        $indicator = $this->competetion->indicators[$i];
                    }
                }
            }
        }

        $this->questionPoints = $this->questionPoints + 0.5;
        $this->questionType = 'text';
        $this->questionFile = '';
        $this->question = '';
        return redirect(route('admin.competetion.constructor'))->with(
            'successCreated',
            'Тест был успешно создан'
        );
    }
    public function updateQuestion($question, $variations, $true_variation)
    {
        $this->variations_change = [];

        if ($this->editQuestionFile) {
            $this->editQuestion->type = $this->questionType;
            $this->editQuestion->save();
            if ($this->editQuestion->file) {
                File::delete(
                    '/storage/images/' . $this->editQuestion->file->path
                );
                $this->editQuestion->file->file = $this->editQuestionFile;

                $this->editQuestion->file->save();
            } else {
                TestQuestionFiles::create([
                    'test_question_id' => $this->editQuestion->id,
                    'file' => $this->questionFile,
                ]);
            }
        }
        if ($question !== null) {
            if ($this->editQuestion->question !== $question) {
                $this->editQuestion->question = $question;
                $this->editQuestion->update();
                $this->editQuestion->save();
            }
        }
        for ($i = 0; $i < count($this->editQuestion->variations); $i++) {
            if (
                $this->editQuestion->variations[$i]->variation !==
                $variations[$i]
            ) {
                $this->editQuestion->variations[$i]->variation =
                    $variations[$i];
                $this->editQuestion->variations[$i]->update();
                $this->editQuestion->variations[$i]->save();
            }
        }
        if ($true_variation !== null) {
            foreach ($this->editQuestion->variations as $variation) {
                $variation->is_true = 0;
                $variation->update();
                $variation->save();
            }
            $this->editQuestion->variations[$true_variation - 1]->is_true = 1;
            $this->editQuestion->variations[$true_variation - 1]->update();
            $this->editQuestion->variations[$true_variation - 1]->save();
        }
        $this->question = '';
        $this->questionType = '';
        $this->questionFile = '';
        $this->editQuestion = '';
        $this->variations = [];
        $this->variations_change = [];
        $this->emitSelf('changeTest');
    }
    public function changeTest()
    {
        $question = TestQuestion::where('test_id', session('test_id'))
            ->where('progress', $this->progressPage)
            ->first();
        array_push($this->variations_change, $question->variations);
        // dd($this->variations_change);
        $this->question = $question->question;
        $this->goBackPage--;
        // $this->barProgress = $this->barProgress + 20;
        if ($this->goBackPage == 0) {
            $this->variations_change = [];
            if ($this->barProgress <= 80) {
                $this->barProgress = $this->barProgress + 20;
                $this->progressPage = $this->progressPage + 1;
            } else {
                $this->endTest = true;
            }
            return null;
        }
        $this->barProgress = $this->barProgress + 20;
        $this->progressPage = $this->progressPage + 1;
        $question = TestQuestion::where('test_id', session('test_id'))
            ->where('progress', $this->progressPage)
            ->first();
        $this->question = $question->question;
        $this->editQuestion = $question;
        $this->variations_change = [];
        array_push($this->variations_change, $question->variations);
    }
    public function goBack()
    {
        $this->variations_change = [];
        $this->goBackPage++;

        $question = TestQuestion::where('test_id', session('test_id'))
            ->where('progress', $this->progressPage - 1)
            ->first();
        $this->barProgress = $this->barProgress - 20;
        $this->progressPage = $this->progressPage - 1;
        $this->question = $question->question;
        $this->editQuestion = $question;
        array_push($this->variations_change, $question->variations);
    }
    public function TestRecomended($test)
    {
        $this->TestRecomendedName = $test;
    }
    public function changeCompetetion($competetion)
    {
        $this->competetion = Competetion::find($competetion);
        if (count($this->competetion->indicators) > 0) {
            $this->selectedIndicator = $this->competetion->indicators[0]->id;
            $this->selectedIndicator = Indicator::find(
                $this->selectedIndicator
            );
        }
    }
    public function selectIndicator($indicator)
    {
        $this->selectedIndicator = Indicator::find($indicator);
    }

    public function render()
    {
        if ($this->progressPage == 1) {
            $this->questionLevel = 'Осведомленность';
        } elseif ($this->progressPage == 2) {
            $this->questionLevel = 'Знание';
        } elseif ($this->progressPage == 3) {
            $this->questionLevel = 'Опыт';
        } elseif ($this->progressPage == 4) {
            $this->questionLevel = 'Эксперт';
        } elseif ($this->progressPage == 5) {
            $this->questionLevel = 'Мастерство';
        }
        $this->competetions = Competetion::all();
        if (request('competetion')) {
            $this->competetion = Competetion::find(request('competetion'));
        }
        if (request('indicator')) {
            $this->selectedIndicator = Indicator::find(request('indicator'));
        }
        if (request('competetionTest')) {
            $competetionTest = CompetetionTest::find(
                request('competetionTest')
            );
            $this->testName = $competetionTest->name;
        }
        return view('livewire..admin.tests-auto');
    }
}
