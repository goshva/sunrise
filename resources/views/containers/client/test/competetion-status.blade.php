@extends('components.head')
@section('code')
    <div class="sect competetion_results_page">
        <x-client-side-bar></x-client-side-bar>
        <x-client-header></x-client-header>
        <div class="status">
            <div class="start_test_again_block">
                <h1 class="status-title">{{ $test->indicator->name }}</h1>
                <form action="/competetion/start-again/{{ $user_competetion->id }}" class="start_test_again" method="POST">
                    @csrf
                    <input type="hidden" name="user" value="{{ auth()->id() }}" id="">
                    <input type="hidden" name="start_again_type" value="competetion" id="">
                    <input type="hidden" name="competetion_id" value="{{ $user_competetion->competetion->id }}"
                        id="">
                    <button type="submit" class="tests-popup_btn">
                        Начать заново
                    </button>
                </form>
            </div>


            <p class="status-content_title">Компетенция</p>
            <div>
                <a href="" class="status-content_info">{{ $user_competetion->competetion->name }}</a>
            </div>
            <!--<h1 class="status-title">Итоговая оценка по обучению</h1>-->
            <h4 class="status-bar_text">Завершено</h4>
            <div class="status-bar" style="background:#F3F3F4">
                <span class="status-per" style="width:100%">
                </span>
            </div>

            <div class="status-content">

                <div class="status-content_scroll">
                    <div class="">
                        <div>
                            <a href="" class="status-content_info">{{ $user_competetion->competetion->name }}</a>
                        </div>
                        <div class="status-content_card">
                                            @php
  $competetionLevel = \App\Models\CompetetionLevel::where('competetion_id',  $competetion->id)->where('position_id', $user->position->id)->first();
                $tests = $competetion->tests; // Assuming this retrieves the tests

$filteredTests = $tests->filter(function ($test) use ($competetionLevel) {
    return $test->indicator->level == $competetionLevel->level;
});
         
                @endphp
                            @foreach ($filteredTests as $test)
                            @php
                            
                             $test = \App\Models\UserTests::where("user_id", auth()->id())->where("test_id",$test->id)->first();
                             
                            @endphp
                            @if($test)
                             @php
                             $level = 0;
                            if($test->points == 0.5 && $test->points != 0){
                                $level = 1;
                            }elseif($test->points <= 1.5 && $test->points != 0){
                            $level = 2;
                            }elseif($test->points <= 3 && $test->points != 0){
                            $level = 3;
                            }elseif($test->points <= 5 && $test->points != 0){
                            $level = 4;
                            }elseif($test->points <= 7.5 && $test->points != 0){
                            $level = 5;
                            }
                            @endphp
   <div class="test_results_result" style="width:90%">
                        <div class="test_results_result_up">
                            <h5>Результат</h5>
                        </div>
                        <div class="test_results_result_content">
                            <div class="test_results_result_content_precent">
                                <p >{{ $test->test->indicator->name }}</p>
                                <div class="status-bar" style="background:#F3F3F4">
                                   
                                    <span class="status-per"
                                    style="@if($level < $test->test->indicator->level && $level < 2)
                                width:10%;
                                @elseif($level < $test->test->indicator->level && $level >= 2)
                                width:40%;
                                @elseif($level == $test->test->indicator->level)
                                width:54%;
                                 @elseif($level > $test->test->indicator->level)
                                  width:100%;
                                @endif
                                @if( $level < $test->competetion->levels->where("position_id",$user->position_id)->first()->level && $level  <= 1)
                                 background: linear-gradient(270deg, #FC6262 0%, #FFB4B4 100%);
                                @elseif($level < $test->competetion->levels->where("position_id",$user->position_id)->first()->level && $level > 1)
                                background: linear-gradient(270deg, #F6A938 0.98%, #FFD598 100%);
                                @else
                                background: linear-gradient(270deg, #70C493 2.83%, #96F6BE 100%);
                                @endif
                                
                        ">
                                    </span>
                                </div>
                            </div>
                            <div class="test_results_result_content_text">
                                
                                <p>{{ $test->text }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                            @endforeach

                        </div>
                    </div>
                    <hr>
                </div>
                {{--<a href="/statistic" class="blue__btn">Посмотреть результат</a>--}}
            </div>
        </div>
    </div>
@endsection
