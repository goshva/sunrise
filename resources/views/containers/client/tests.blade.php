@extends('components.head')
@section('code')
<div class="sect">
    <x-client-side-bar></x-client-side-bar>
    <x-client-header></x-client-header>

    <div class="learning_main">

        <div class="learning_main_conteiner">

            <!--<h3 class="learning_main_subtitle">Тестирование</h3>-->

            <div class="">
                <div class="learning_main-contnet">
                    <h3 class="learning_main-contnet-subtext">График тестирования</h3>
                    <hr>
                    <div class="learning_main-contnet-grid">
                         <p class="learning_main-title">Дата</p>
                         <p class="learning_main-title">Тема</p>
                         <p class="learning_main-title">Реализация</p>
                    </div>
                    <hr>
                    <div class="learning_main-container_contnet">
                        <div class="content">
                            @foreach ($competetions as $competetion)
                            <?php $competetion_test_count = count($competetion->user->tests->where('competetion_id',$competetion->competetion_id)); ?>
                            @php
                                    $date1 = \Carbon\Carbon::parse($competetion->date_to);
                                    $date_to = \Carbon\Carbon::parse($competetion->date_to)->format("d-m-y");
                                    $date3 = \Carbon\Carbon::parse($competetion->date_from)->format("d-m-y");
                                    $date2 = \Carbon\Carbon::now()->format('d-m-y');
                                    
                                    $result = $date1->lte($date2);
                                    
                            @endphp
                            <div class="learning_main-contnet-flex">
                                <div class="learning_main-content_data">
                                    <p class="learning_main-data">
                                        От: {{ $date3 }}
                                    </p>
                                    <p class="learning_main-data">
                                        До: {{ $date_to }}
                                    </p>
                                </div>
                                <p class="learning_main-data">{{ $competetion->competetion->name }}</p>
                                <div class="learning_main-flex">
                                    <div class="col-md-3 col-sm-6">
                                        <div  class="progress @if($competetion->progress>=  $competetion_test_count)   green @elseif ($competetion->progress>=  $competetion_test_count  -  $competetion_test_count/2) yellow @else pink @endif">
                                            <span class="progress-left">
                                                <span id="indicator-{{ $competetion->competetion->id }}" class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span id="indicator-{{ $competetion->competetion->id }}-right"  class="progress-bar"></span>
                                            </span>
            
                                                <div  class="progress-value">{{ $competetion->progress }}/{{ $competetion_test_count }}</div>
                                                <style>
                                                    
                                                       .progress .progress-right #indicator-{{ $competetion->competetion->id }}-right{
                                                            left: -100%;
                                                            border-top-left-radius: 40px;
                                                            border-bottom-left-radius: 40px;
                                                            border-right: 0;
                                                            -webkit-transform-origin: center right;
                                                            transform-origin: center right;
                                                            @if ($competetion->progress==$competetion_test_count && $competetion->progress !=0 || $competetion->progress >= $competetion_test_count /2 && $competetion->progress !=0 )
                                                            transform: rotate(180deg);
                                                            @else
                                                            transform: rotate({{ $competetion->progress *30 }}deg);
                                                            @endif
                                                        }
                                                               #indicator-{{ $competetion->competetion->id }}{
                                                                    @if($competetion->progress == $competetion_test_count && $competetion->progress !=0 )
                                                                 transform: rotate(180deg);
                                                                 @elseif ($competetion->progress >= $competetion_test_count /2 )
                                                            transform: rotate({{ $competetion->progress *60 }}deg);

                                                                    @else
                                                                    transform: rotate(0deg);
                                                                    @endif
                                                        }
                                                </style>
            
                                            
                                        </div>
                                    </div>

                                </div>
                                @if(!$result)

                                @if ( $competetion->progress == $competetion_test_count &&  $competetion_test_count !== 0)
                               <div class="d-flex align-items-center gap-3">
                               <div class="ended_students_icon" style="position: relative; background: url('https://u2217969.isp.regruhosting.ru/public/images/ended_students_icon.svg');background-position: 50% 50%;
    width: 36px;
    height: 36px;
    background-repeat: no-repeat;"></div>
                                <a  style=" display: flex; justify-content: center; align-items: center; " href="/competetion-results/{{ $competetion->competetion->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                    <path d="M1 13L7 7L1 1" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  </svg>
                                </a>
                                </div>
                                @else
                                <a  style=" display: flex; justify-content: center; align-items: center; " href="/test-details/{{ $competetion->competetion->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                    <path d="M1 13L7 7L1 1" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  </svg>
                                </a>  
                                @endif
                               @else
                               <div  style="position:relative;display: flex; justify-content: center; align-items: center; " href="/test-details/{{ $competetion->competetion->id }}" class="why_cant_test_father">
                               <svg fill="#FC6262 " height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 460.775 460.775" xml:space="preserve" stroke="#FC6262"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"></path> </g></svg>
                               <div class="why_cant_do_test">
                                <span>Срок действия тестирования истёк.</span>
                               </div>
                            </div>  
                               @endif
                            </div>
                            <hr>
                            @endforeach
                            
                            
                        </div>  
                    </div> 
                 </div>
            </div>
        </div>    
    </div>
</div>

<x-footer></x-footer>
@endsection