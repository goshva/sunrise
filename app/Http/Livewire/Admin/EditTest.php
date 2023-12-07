<?php

namespace App\Http\Livewire\Admin;

use App\Models\Test;
use App\Models\Indicator;
use App\Models\TestQuestion;
use App\Models\TestQuestionFiles;
use App\Models\TestQuestionVariation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\Console\Helper\ProgressBar;

class EditTest extends Component
{
    public $test;
    public $testName;
    public $competetion;
    public $selectedIndicator;
    public $selectedLevel;
    public $barProgress = 20;
    public $progressPage = 1;
    public $endTest = false;
    public $trueVariation;
    public $question;
    public $questionFile;
    public $questionType = "text";
    public $questionPoints = 0.5;
    public $editQuestion;
    public $editQuestionFile;
    public $goBackPage = 0;
    public $variations = [];
    public $variations_change = [];
    use WithFileUploads;
    public function mount($test)
    {
       $test = $test;
         $this->competetion = $test->competetionTest;
          $this->selectedLevel = $test->indicator->level;
          $this->testName = $test->competetionTest->name;
       if(!request("indicator")){
           
        $this->test = $test;
       
        
        $this->selectedIndicator = $test->indicator;
        $this->questionPoints = ($test->completed+1)  / 2;
        if($test->completed !== 5){
        $this->barProgress = ($test->completed+1) * 2 * 10;
        $this->progressPage = $test->completed+1;
        }else{
            $this->barProgress = ($test->completed) * 2 * 10;
            $this->progressPage = $test->completed;
            $question = TestQuestion::where("test_id", $this->test->id)->where("progress", 5)->first();
            // dd($question->variations);
            $this->question = $question->question;
            $this->editQuestion = $question;

            array_push($this->variations_change, $question->variations);
        // dd($this->variations_change);
    }
       } else{
            $this->selectedIndicator = Indicator::find((int)request('indicator'));
           $this->barProgress = 20;
             $this->progressPage = 1;
           $this->test = Test::create([
                    "name" => $this->testName,
                    "competetion_id" => $this->competetion->competetion->id,
                    "competetion_test_id" =>  $this->competetion->id,
                    "indicator_id" => $this->selectedIndicator->id,
                    "completed" => $this->progressPage,
                    'created_type' => 'handle',
                ]);
          
       }
    }
    protected $listeners = [
        "getVariations",
        "saveAndQuit",
        "goBack",
        "changeTest",
        'updateQuestion',
        'changeTypeAudio',
        'changeTypeImage',
        'changeTypeVideo',
        'changeTypeText',
        "uploadFile"
    ];



    public function changeTypeImage(){
        if($this->editQuestion){
            array_push($this->variations_change, $this->editQuestion->variations);
        }
        $this->questionType = "image";
        
    }

    public function changeTypeVideo(){
        if($this->editQuestion){
            array_push($this->variations_change, $this->editQuestion->variations);
        }
        $this->questionType = "video"; 
        
    }
    public function changeTypeAudio(){
        if($this->editQuestion){
            array_push($this->variations_change, $this->editQuestion->variations);
        }
        $this->questionType = "audio";

    }
    public function changeTypeText(){
        if($this->editQuestion){
            array_push($this->variations_change, $this->editQuestion->variations);
        }
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
    public function updateQuestion($question, $variations, $true_variation){
        // dd('updateQuestion');
        $this->variations_change = [];
        if($this->editQuestionFile){
            if($this->editQuestion->file){
            $this->editQuestion->file->file = $this->editQuestionFile;
            $this->editQuestion->type = $this->questionType;
            $this->editQuestion->save();
            $this->editQuestion->file->save();
            }else{
                 $this->editQuestion->type = $this->questionType;
                 TestQuestionFiles::create([
                     "test_question_id"=>$this->editQuestion->id,
                     "file"=>$this->editQuestionFile,
                     "progress"=>$this->progressPage,
                     "points"=>$this->questionPoints
                ]);
                $this->editQuestion->save();
            }
        }
        if($question !== null){
            if($this->editQuestion->question != $question){
                $this->editQuestion->question = $question;
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
        // dd('changeTest');

        $question = TestQuestion::where("test_id", $this->test->id)->where("progress", $this->progressPage)->first();
        
        array_push($this->variations_change, $question->variations);
        // dd($this->variations_change);
        $this->question = $question->question;
      
        $this->goBackPage--;
        // $this->barProgress = $this->barProgress + 20;
        if($this->goBackPage == 0){
        $this->variations_change = [];
           
        }
        if($this->progressPage == 5){
            $this->test->completed =5;
            $this->test->is_published =1;
            $this->test->save(); 
            if($this->testName && strtolower($this->testName) != strtolower($this->test->competetionTest->name)){
                $this->test->competetionTest->name = $this->testName;
                $this->test->competetionTest->save();
            }
             $indicators = $this->competetion->competetion->indicators->where("level", $this->selectedLevel)->values()->all();
            //  dd($indicators);
              for($i=0;$i<count($indicators);$i++){
                        // $key = $keys[$i];
                        if($this->selectedIndicator->id == $indicators[$i]->id && count($this->competetion->tests) < count($indicators)){
                            $indicator = Indicator::find($indicators[$i+1]->id);
                        
                        }
                       
                    }
                    if(count($this->competetion->tests) < count($indicators)){
                  return redirect('/admin/test/edit/' . $this->test->id . "?indicator=".$indicator->id)->with("successCreated", "Тест был успешно создан , создайте тесты для остольных индикаторов для этой компетенции тоже");
                    }

            return redirect(route('admin.competetion.constructor'))->with("successCreated", "Тест был успешно изменен ");
        }
        $this->barProgress = $this->barProgress + 20;
        $this->progressPage = $this->progressPage +1;
        $question = TestQuestion::where("test_id", $this->test->id)->where("progress", $this->progressPage)->first();

        $this->question = $question->question;
        $this->editQuestion = $question;
        $this->variations_change = [];
        array_push($this->variations_change, $question->variations);
    }
    public function goBack(){
        $this->variations_change = [];
        $this->goBackPage++;

        $question = TestQuestion::where("test_id", $this->test->id)->where("progress", $this->progressPage-1)->first();
        $this->barProgress = $this->barProgress - 20;
        $this->progressPage = $this->progressPage -1;
        $this->question = $question->question;
        $this->editQuestion = $question;
        array_push($this->variations_change, $question->variations);
    }
    public function saveAndQuit(){
        $test = Test::where("indicator_id", $this->test->indicator_id)->first();
        if($this->testName && strtolower($this->testName) != strtolower($this->test->competetionTest->name)){
            $this->test->competetionTest->name = $this->testName;
            $this->test->competetionTest->save();
        }
        if(count($test->questions) == $this->progressPage){
            $test->completed = $this->progressPage;
            $test->save();
        }else{
            $test->completed = $this->progressPage-1;
            $test->save();
        }
        return redirect(route('admin.competetion.constructor'))->with("successCreatedWarning", "Тест был успешно изменен , но не закончен");

    }
    public function getVariations($variations,$true_variation){
        // dd('getVariations');

        $this->variations_change = [];
        $this->variations = [];
        array_push($this->variations, $variations);
        $this->trueVariation = $true_variation;
        $testQuestion = TestQuestion::create([
            "test_id"=>$this->test->id,
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
        // dd($this->variations[0]);
            for ($i=0; $i < count($this->variations[0]); $i++) { 
                if($this->trueVariation-1 == $i){
                    TestQuestionVariation::create([
                        "test_question_id"=>$testQuestion->id,
                        "variation" => $this->variations[0][$i],
                        "is_true" => 1,
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
            $this->test->completed =5;
            $this->test->is_published =1;
            $this->test->save(); 
            if($this->testName && strtolower($this->testName) != strtolower($this->test->competetionTest->name)){
                $this->test->competetionTest->name = $this->testName;
                $this->test->competetionTest->save();
            }
             $indicators = $this->competetion->competetion->indicators->where("level", $this->selectedLevel)->values()->all();
            //  dd($indicators);
              for($i=0;$i<count($indicators);$i++){
                        // $key = $keys[$i];
                        if($this->selectedIndicator->id == $indicators[$i]->id && count($this->competetion->tests) < count($indicators)){
                            $indicator = Indicator::find($indicators[$i+1]->id);
                        
                        }
                       
                    }
                    if(count($this->competetion->tests) < count($indicators)){
                  return redirect('/admin/test/edit/' . $this->test->id . "?indicator=".$indicator->id)->with("successCreated", "Тест был успешно создан , создайте тесты для остольных индикаторов для этой компетенции тоже");
                    }

                        
                
            return redirect(route('admin.competetion.constructor'))->with("successCreated", "Тест был успешно изменен ");
        }
        $this->test->completed = $this->progressPage;
        $this->test->save();  
        $this->barProgress = $this->barProgress + 20;
        $this->progressPage = $this->progressPage + 1;
        $this->questionType = '';
        $this->questionFile = '';
        $this->question = '';
    }
    public function render()
    {
        return view('livewire..admin.edit-test');
    }
}
