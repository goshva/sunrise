<?php

namespace App\Imports;

use App\Models\Indicator;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\TestQuestionFiles;
use App\Models\TestQuestionVariation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TestImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        for ($i=1; $i < count($collection); $i++) { 
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

            $type = "text";
            if($collection[$i][6] == "Аудио"){
                $type = "audio";
            }elseif($collection[$i][6] == "Видео"){
                $type = "video";
            }elseif($collection[$i][6] == "Фото"){
                $type = "image";
            }
            if(Test::where("indicator_id",(int) $collection[$i][2])->first()){
                Test::where("indicator_id",(int) $collection[$i][2])->first()->delete();
            }
            if($collection[$i][0] !== null && $collection[$i][2] !== null){
               
               $test = Test::create([
                'competetion_id'=>(int) $collection[$i][0],
                "indicator_id"=>(int) $collection[$i][2],
                "name"=>$collection[$i][3],
                "completed" =>(int) $collection[$i][4],
                "max_points"=>7.5,
                // "recomended_points"=>(int) $recomended_points,
                "is_published"=>(int) $collection[$i][11],
               ]);
               session(['competetion_id'=>$collection[$i][0]]);
            }elseif($collection[$i][0] == null && $collection[$i][2] != null && $collection[$i][8] != null){
                $test = Test::create([
                    'competetion_id'=>(int) session('competetion_id'),
                    "indicator_id"=>(int) $collection[$i][2],
                    "name"=>$collection[$i][3],
                    "completed" =>(int) $collection[$i][4],
                    "max_points"=>7.5,
                    // "recomended_points"=>(int) $recomended_points,
                    "is_published"=>(int) $collection[$i][11],
                   ]);
            }
            if($collection[$i][8] != null){
                $test_question = TestQuestion::create([
                    "test_id"=>$test->id,
                    "type"=>$type,
                    "question"=>$collection[$i][8],
                    "progress"=>(int) $collection[$i][7],
                    "points"=>(int) $collection[$i][9],
                ]);

                if($collection[$i][12] != null || $collection[$i][13] != null || $collection[$i][14] != null){
                    if($collection[$i][12] != null){
                        $file = $collection[$i][12];
                    }elseif($collection[$i][13] != null){
                        $file = $collection[$i][13];
                    }elseif($collection[$i][14] != null){
                        $file = $collection[$i][14];
                    }
                    $file = TestQuestionFiles::create([
                        "test_question_id"=>$test_question->id,
                        "file"=>$file
                    ]);
                }
               }
            if($collection[$i][0] == null && $collection[$i][2] == null && $collection[$i][8] == null){
               if($collection[$i][10] != null){
                $test_variation = TestQuestionVariation::create([
                    "test_question_id"=>$test_question->id,
                    "variation"=> $collection[$i][10],
                    "is_true"=>$collection[$i][15] ? 1 : 0
                ]);
               }
            }
            
        }
    }
}
