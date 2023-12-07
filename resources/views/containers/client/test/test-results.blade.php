@extends('components.head')
@section('code')
    <div class="sect">
        <x-client-side-bar></x-client-side-bar>
        <x-client-header></x-client-header>
        <div class="status">  
            <p class="status-subtitle">компетенция</p>
            <h1 class="status-title">{{ $test->indicator->name }}</h1>
            <div class="test-status-content">
                <div class="test-status">
                    <h4 class="status-bar_text">Завершено</h4>
                    <div class="status-bar" style="background:#F3F3F4" >
                        <span class="status-per" style="width:{{ floor($user_test->completed *100 / 5) }}%">
                        </span>
                    </div>
                    <div class="test_results_name">
                        <h4>Вы завершили тестовое задание по индикатору “{{ $test->indicator->name }}”</h4>
                    </div>
                    <div class="test_results_result">
                        <div class="test_results_result_up">
                            <h5>Результат</h5>
                        </div>
                        <div class="test_results_result_content">
                             @php
                             $level = 0;
                            if($user_test->points <= 0.5){
                                $level = 1;
                            }elseif($user_test->points <= 1.5){
                            $level = 2;
                            }elseif($user_test->points <= 3){
                            $level = 3;
                            }elseif($user_test->points <= 5){
                            $level = 4;
                            }elseif($user_test->points <= 7.5){
                            $level = 5;
                            }
                            @endphp
                            <div class="test_results_result_content_precent">
                                <p>{{ $test->indicator->name }}</p>
                                <div class="status-bar" style="background:#F3F3F4">
                                    <span class="status-per"
                                     style="@if($level < $test->indicator->level && $level < 2)
                                width:10%;
                                @elseif($level < $test->indicator->level && $level >= 2)
                                width:40%;
                                @elseif($level == $test->indicator->level)
                                width:54%;
                                 @elseif($level > $test->indicator->level)
                                  width:100%;
                                @endif
                                @if( $level < $test->indicator->level && $level  <2)
                                  background: linear-gradient(270deg, #FC6262 0%, #FFB4B4 100%);
                                @elseif($level < $test->indicator->level && $level > 1)
                                background: linear-gradient(270deg, #F6A938 0.98%, #FFD598 100%);
                                @else
                                background: linear-gradient(270deg, #70C493 2.83%, #96F6BE 100%);
                                @endif
                        " >
                                    </span>
                                </div>
                            </div>
                            <div class="test_results_result_content_text">
                                
                                <p>{{ $user_test->text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
               <form action="{{ route('test.start.again') }}" class="start_test_again" method="POST">
                @csrf
                <input type="hidden" name="user" value="{{ auth()->id() }}" id="">
                <input type="hidden" name="test" value="{{ $test->id }}" id="">
                <input type="hidden" name="start_again_type" value="test" id="">
                <input type="hidden" name="competetion_id" value="{{ $test->competetion_id }}" id="">
                <button type="submit" class="tests-popup_btn">
                    Начать заново
                </button>
               </form>
            </div> 
            
        </div>

    </div>
@endsection