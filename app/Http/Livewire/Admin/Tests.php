<?php

namespace App\Http\Livewire\Admin;

use App\Models\Competetion;
use App\Models\CompetetionTest;
use App\Models\Indicator;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\TestQuestionFiles;
use App\Models\TestQuestionVariation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Termwind\Components\Dd;

class Tests extends Component
{
    public $competetions;
    public $competetion;
    public $selectedLevel;
    public $competetionTest;
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
    public $questionType = "text";
    public $variations = [];
    public $test;
    protected $listeners = [
        "changeCompetetion",
        "selectIndicator",
        "getVariations",
        "saveAndQuit",
        'changeTypeAudio',
        'changeTypeImage',
        'changeTypeVideo',
        'changeTypeText',
        "uploadFile",
        'TestRecomended',
        "goBack",
        "changeTest",
        'updateQuestion',
        'competetionLevel'
    ];
    public function competetionLevel($level){
        // dd($level);
        $this->selectedLevel = $level;
        if($this->competetion){
            $this->emitSelf('changeCompetetion',$this->competetion->id);
        }
      
    }
    public function changeTypeImage(){
        $this->questionType = "image";
        
    }

    public function changeTypeVideo(){
        $this->questionType = "video"; 
        
    }
    public function changeTypeAudio(){
        $this->questionType = "audio";

    }
    public function changeTypeText(){
        $this->questionType = "text";

    }
    public function uploadFile($file){
        if($this->editQuestion){
            array_push($this->variations_change, $this->editQuestion->variations);
        }
        if($this->questionType =="video"){
        $questionFileParts = explode(";base64,",$file);
        $file = base64_decode($questionFileParts[1]);
        $newName = time() . "-" . strpos($file,0,20) . ".mp4";
        Storage::disk('public')->put('videos'.  '/' . $newName , $file);
        $this->questionFile =url("/storage/app/public/videos/".$newName);
        if($this->editQuestion){
            $this->editQuestionFile = $this->questionFile;
        }
       }elseif($this->questionType == "image"){
        $questionFileParts = explode(";base64,",$file);
        $file = base64_decode($questionFileParts[1]);
        $newName = time() . "-" . strpos($file,0,20) . ".jpg";
        Storage::disk('public')->put('images'.  '/' . $newName , $file);
        $this->questionFile =url("/storage/app/public/images/".$newName);
        if($this->editQuestion){
            $this->editQuestionFile = $this->questionFile;
        }
       }elseif($this->questionType == "audio"){
        $questionFileParts = explode(";base64,",$file);
        $file = base64_decode($questionFileParts[1]);
        $newName = time() . "-" . strpos($file,0,20) . ".mp3";
        Storage::disk('public')->put('audio'.  '/' . $newName , $file);
        $this->questionFile =url("/storage/app/public/audio/".$newName);
        if($this->editQuestion){
            $this->editQuestionFile = $this->questionFile;
        }
       }


    }
    public function saveAndQuit(){
       
        if($this->selectedIndicator){
             $test = Test::where("indicator_id", $this->selectedIndicator->id)->where("competetion_test_id", session('competetionTest'))->first();
             if($test){
            if(count($test->questions) == $this->progressPage){
            $test->completed = $this->progressPage;
            $test->save();
            
        }else{
            $test->completed = $this->progressPage-1;
            $test->save();
        }
        }
        }
        
        session()->forget('competetionTest');
        session()->forget('test_id');
        return redirect(route('admin.competetion.constructor'));
    }
    public function getVariations($variations,$true_variation){
        $this->variations_change = [];
        $this->variations = [];
        $competetionTest = CompetetionTest::where("name", 'LIKE', "%".$this->testName ."%")->first();
        if(!session('competetionTest')){
            if($competetionTest){
                return session(['nameExist'=>'Тест с таким названием уже существует']);
            }
        }
            array_push($this->variations, $variations);
        $this->trueVariation = $true_variation;
        if($this->barProgress <= 80){
            $this->barProgress = $this->barProgress + 20;
        }else{
            $this->endTest = true;
        }
        if(!session('competetionTest')){
            $competetionTest = CompetetionTest::create(
                [
                    "name"=>$this->testName,
                    "competetion_id" => $this->competetion->id,
                    'created_type' => 'handle',
                ]
                );
                
                session(['competetionTest'=>$competetionTest->id]);
                $this->competetionTest = $competetionTest->id;
        }
            
            if(Test::where("indicator_id", $this->selectedIndicator->id)->where("competetion_test_id", session('competetionTest'))->first()){
                $test = Test::where("indicator_id", $this->selectedIndicator->id)->where("competetion_test_id", session('competetionTest'))->first();
            }else{
                $test = Test::create([
                    "name" => $this->testName,
                    "competetion_id" => $this->competetion->id,
                    "competetion_test_id" => session('competetionTest'),
                    "indicator_id" => $this->selectedIndicator->id,
                    "completed" => $this->progressPage,
                    'created_type' => 'handle',
                ]);
            }
       
        session(['test_id'=>$test->id]);
        $testQuestion = TestQuestion::create([
            "test_id"=>$test->id,
            "question" => $this->question,
            "type" => $this->questionType,
            "progress" => $this->progressPage,
            "points" => $this->questionPoints
        ]);
        if($this->questionFile){
            TestQuestionFiles::create([
                'test_question_id' => $testQuestion->id,
                "file" => $this->questionFile
            ]);
        }
        for ($i=0; $i < count($this->variations[0]); $i++) { 
        if($this->trueVariation-1 == $i){
            TestQuestionVariation::create([
                "test_question_id"=>$testQuestion->id,
                "variation" => $this->variations[0][$i],
                "is_true" => 1
            ]); 
        }else{
            TestQuestionVariation::create([
            "test_question_id"=>$testQuestion->id,
            "variation" => $this->variations[0][$i],
            "is_true" => 0
        ]);
        }
        }
            if($this->progressPage == 5){
            $test->completed = $this->progressPage;
            $test->created_type = 'handle';
            $test->is_published = 1;
            $test->save();
            // $competetionTest = CompetetionTest::where("name",'LIKE',$this->testName)->get();
            $competetionTest = CompetetionTest::find(session('competetionTest'));

            if(count($competetionTest->tests) == count($competetionTest->competetion->indicators->where("level",$this->selectedLevel))){
                session()->forget('competetionTest');
                session()->forget('test_id');
                return redirect(route('admin.competetion.constructor'))->with("successCreated", "Тест был успешно создан");
            }else{
                $indicators = $this->competetion->indicators->where("level", $this->selectedLevel)->values()->all();
                // $keys = array_keys($indicators); // Get all keys from the array
                // dd($indicators);
                    for($i=0;$i<count($indicators);$i++){
                        // $key = $keys[$i];
                        if($this->selectedIndicator->id == $indicators[$i]->id){
                            $indicator = $indicators[$i+1]->id;
                        
                        }
                       
                    }
 
                return redirect('admin/tests/create?competetion=' . $this->competetion->id . "&indicator=".$indicator . "&competetionTest=" . session('competetionTest') . "&level=".$this->selectedLevel)->with("successCreated", "Тест был успешно создан , создайте тесты для остольных индикаторов для этой компетенции тоже");
            }
           
            }
        
        $test->completed = $this->progressPage;
        $test->save();  
        $this->progressPage = $this->progressPage + 1;
        if($this->progressPage == 5){
            $this->endTest = true;
        }
        $this->questionPoints = $this->questionPoints + 0.5;
        $this->questionType = 'text';
        $this->questionFile = '';
        $this->question = '';
        
        
    }
    public function updateQuestion($question, $variations, $true_variation){
        $this->variations_change = [];
        
        if($this->editQuestionFile){  
            $this->editQuestion->type = $this->questionType;
            $this->editQuestion->save();
            if($this->editQuestion->file){
          File::delete('/storage/app/public/images/' .   $this->editQuestion->file->path);
            $this->editQuestion->file->file = $this->editQuestionFile;
          
            $this->editQuestion->file->save();
            }else{
            TestQuestionFiles::create([
                    'test_question_id' => $this->editQuestion->id,
                    "file" => $this->questionFile
                ]);
            }
            
        }
        if($question !== null){
            if($this->editQuestion->question !== $question){
                $this->editQuestion->question = $question;
                $this->editQuestion->update();
                $this->editQuestion->save();
               }
        }
        for ($i=0; $i < count($this->editQuestion->variations); $i++) { 
            if($this->editQuestion->variations[$i]->variation !== $variations[$i]){
                $this->editQuestion->variations[$i]->variation =  $variations[$i];
                $this->editQuestion->variations[$i]->update();
                $this->editQuestion->variations[$i]->save();
            }
        }
        if($true_variation !== null){
            foreach ($this->editQuestion->variations as $variation) {
                $variation->is_true = 0;
                $variation->update();
                $variation->save();
            }
            $this->editQuestion->variations[$true_variation-1]->is_true = 1;
            $this->editQuestion->variations[$true_variation-1]->update();
            $this->editQuestion->variations[$true_variation-1]->save();
        }
        $this->question = '';
        $this->questionType = '';
        $this->questionFile = '';
        $this->editQuestion = '';
        $this->variations = [];
        $this->variations_change = [];
        $this->emitSelf('changeTest');
       
    }
    public function changeTest(){

    
        $question = TestQuestion::where("test_id", session('test_id'))->where("progress", $this->progressPage)->first();
        array_push($this->variations_change, $question->variations);
        // dd($this->variations_change);
        $this->question = $question->question;
        $this->goBackPage--;
        // $this->barProgress = $this->barProgress + 20;
        if($this->goBackPage == 0){
        $this->variations_change = [];
        if($this->barProgress <= 80){
        $this->barProgress = $this->barProgress + 20;
        $this->progressPage = $this->progressPage +1;
        }else{
                $this->endTest = true;
            }
            return null;
        }
        $this->barProgress = $this->barProgress + 20;
        $this->progressPage = $this->progressPage +1;
        $question = TestQuestion::where("test_id", session('test_id'))->where("progress", $this->progressPage)->first();
        $this->question = $question->question;
        $this->editQuestion = $question;
        $this->variations_change = [];
        array_push($this->variations_change, $question->variations);
       

    }
    public function goBack(){
        $this->variations_change = [];
        $this->goBackPage++;

        $question = TestQuestion::where("test_id",  session('test_id'))->where("progress", $this->progressPage-1)->first();
        $this->barProgress = $this->barProgress - 20;
        $this->progressPage = $this->progressPage -1;
        $this->question = $question->question;
        $this->editQuestion = $question;
        array_push($this->variations_change, $question->variations);
    }
    public function TestRecomended($test){
        $this->TestRecomendedName = $test;
    }
    public function changeCompetetion($competetion){
        $this->competetion = Competetion::find($competetion);
        $this->selectedIndicator= $this->competetion->indicators->where("level", $this->selectedLevel)->first();
      
      
        // if(count($this->competetion->indicators)>0){
        //     $this->selectedIndicator = $this->competetion->indicators[0]->id;
        //     $this->selectedIndicator = Indicator::find($this->selectedIndicator);
        // }
    }
    public function selectIndicator($indicator){
       $this->selectedIndicator = Indicator::find($indicator);
    }

    public function render()
    {
        if($this->progressPage == 1){
            $this->questionLevel = 'Осведомленность';
        }elseif($this->progressPage == 2){
            $this->questionLevel = 'Знание';
        }elseif($this->progressPage == 3){
            $this->questionLevel = 'Опыт';
        }elseif($this->progressPage == 4){
            $this->questionLevel = 'Эксперт';
        }elseif($this->progressPage == 5){
            $this->questionLevel = 'Мастерство';
        }
        $this->competetions = Competetion::all();
        if(request('competetion')){
            $this->competetion = Competetion::find(request('competetion'));
        }
        if(request('level')){
            $this->selectedLevel = (int)request('level');
        }
        if(request('indicator')){
            $this->selectedIndicator = Indicator::find(request('indicator'));
        }
     
       
    
                
        if(request('competetionTest')){
            $competetionTest = CompetetionTest::find(request('competetionTest'));
            $this->testName = $competetionTest->name;
        }
        return view('livewire..admin.tests');
    }
}
