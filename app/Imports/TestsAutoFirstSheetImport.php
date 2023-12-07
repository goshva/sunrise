<?php

namespace App\Imports;

use App\Models\Competetion;
use App\Models\Indicator;
use App\Models\IndicatorGroup;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\TestQuestionFiles;
use App\Models\TestQuestionVariation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Question;
use App\Models\QuestionVariation;

class TestsAutoFirstSheetImport implements ToCollection
{
    public $competetionId;
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
       // dd($collection);
        for ($i = 2; $i < count($collection); $i++) {
            //dd($collection[2]);
            // $recomended_points = 0;
            // if($collection[$i][5] == "Осведомленность"){
            //     $recomended_points = 1;
            // }elseif($collection[$i][5] == "Знание"){
            //     $recomended_points = 2;
            // }elseif($collection[$i][5] == "Опыт"){
            //     $recomended_points = 3;
            // }elseif($collection[$i][5] == "Мастерство"){
            //     $recomended_points = 4;
            // }elseif($collection[$i][5] == "Эксперт"){
            //     $recomended_points = 5;
            // }

            $type = 'text';
            /*  if ($collection[$i][6] == 'Аудио') {
                $type = 'audio';
            } elseif ($collection[$i][6] == 'Видео') {
                $type = 'video';
            } elseif ($collection[$i][6] == 'Фото') {
                $type = 'image';
            }*/

            if ($collection[$i] !== null && isset($collection[$i][3])) {
                $competetionName = (string) $collection[$i][3];

                $competetion = Competetion::where(
                    'name', 'like', '%' .
                    $competetionName . '%'
                )->first();
                //dd($competetion);
                if (!$competetion) {
                    $competetion = Competetion::create([
                        'name' => $competetionName,
                    ]);
                }

                 $indicator_group_name = (string)$collection[$i][5];
                 $indicator_group = IndicatorGroup::where('name', 'like', '%' . $indicator_group_name . '%');
                if(!$indicator_group){
                    $indicator_group = IndicatorGroup::create([
                       // "id"=>(int) $collection[$i][0],
                        "group_name"=>$indicator_group_name
                    ]);   
                }
                $indicator_group_first_letter = mb_substr($indicator_group_name, 0,1);
              // dd($indicator_group_first_letter);
switch ($indicator_group_first_letter) {
         case "a":
        $indicator_group_id = 1;
        break;
         case "а":
        $indicator_group_id = 1;
        break;
    case "b":
        $indicator_group_id = 2; 
        break;
        case "c":
        $indicator_group_id = 3;
        break;
        case "с":
        $indicator_group_id = 3;
        break;
        case "d":
        $indicator_group_id = 4;
        break;
        case "e":
        $indicator_group_id = 5;
        break;
        case "е":
        $indicator_group_id = 5;
        break;
} 
/*$level_name = (string)$collection[$i][7];
switch ($level_name) {
    case 'Осведомленность':
        $indicator_group_id = 1;
        break;
    case 'Знания':
        $indicator_group_id = 2;
        break;
        case 'Опыт':
        $indicator_group_id = 3;
        break;
        case 'Мастерство':
        $indicator_group_id = 4;
        break;
        case 'Эксперт':
        $indicator_group_id = 5;
        break;  
}*/


            if($collection[$i][8] != null){
                $indicatorName = (string) $collection[$i][8];
                $indicator = Indicator::where('name', 'like', '%' . $indicatorName . '%')->first();//->where('level', $collection[$i][9])
                if(!$indicator){
                    $indicator = Indicator::create([
                        "competetion_id"=> $competetion->id,
                        "name"=> $indicatorName,
                        "level"=>$indicator_group_id,
                        "indicators_group_id"=>$indicator_group_id
                    ]);
                }
                //dd($indicator);
                
            }
                
               
                $points = (float) $collection[$i][10];
                if ($points !== null) {
                    $question = Question::create([
                        'text' => (string) $collection[$i][11],
                        'indicator_id' => (int) $indicator->id,
                        'points' => $points,
                        'type' => 'text',
                    ]);
                }

                //обработка вариантов ответов
                if (
                    $question != null &&
                    $collection[$i][15] != null &&
                    $collection[$i][16] != null &&
                    $collection[$i][17] != null
                ) {
                    $testQuestionVariations = [];
                    $testQuestionVariationsArray = [
                        (string) $collection[$i][15],
                        (string) $collection[$i][16],
                        (string) $collection[$i][17],
                    ];
                    //dd($testQuestionVariationsArray);
                    foreach ($testQuestionVariationsArray as $key => $item) {
                        $firstSymbol = mb_substr($item, 0, 1);
                        $secondSymbol = mb_substr($item, 0, 2);
                        $is_true = $firstSymbol == '*' ? 1 : 0;
                        if ($firstSymbol == '*' && $secondSymbol !== ' ') {
                            $item = mb_substr($item, 1);
                        }
                        if ($firstSymbol == '*' && $secondSymbol == ' ') {
                            $item = mb_substr($item, 2);
                        }
                        $testQuestionVariations[
                            $key
                        ] = QuestionVariation::create([
                            'question_id' => $question->id,
                            'text' => $item,
                            'is_true' => $is_true,
                        ]);
                    }
                }
                // dd($question);

                //session(['competetion_id' => $collection[$i][0]]);
            }
            /* if ($collection[$i][8] != null) {
                $test_question = TestQuestion::create([
                    'test_id' => $test->id,
                    'type' => $type,
                    'question' => $collection[$i][8],
                    'progress' => (int) $collection[$i][7],
                    'points' => (int) $collection[$i][9],
                ]);

                if (
                    $collection[$i][12] != null ||
                    $collection[$i][13] != null ||
                    $collection[$i][14] != null
                ) {
                    if ($collection[$i][12] != null) {
                        $file = $collection[$i][12];
                    } elseif ($collection[$i][13] != null) {
                        $file = $collection[$i][13];
                    } elseif ($collection[$i][14] != null) {
                        $file = $collection[$i][14];
                    }
                    $file = TestQuestionFiles::create([
                        'test_question_id' => $test_question->id,
                        'file' => $file,
                    ]);
                }
            }
            if (
                $collection[$i][0] == null &&
                $collection[$i][2] == null &&
                $collection[$i][8] == null
            ) {
                if ($collection[$i][11] != null) {
                    $test_variation = TestQuestionVariation::create([
                        'test_question_id' => $test_question->id,
                        'variation' => $collection[$i][10],
                        'is_true' => $collection[$i][15] ? 1 : 0,
                    ]);
                }
            }*/
        }
    }
}
