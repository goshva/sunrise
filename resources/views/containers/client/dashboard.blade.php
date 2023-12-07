@extends('components.head')
@section('code')
    <link rel="stylesheet" href="{{ asset("/public/css/dashboard.css") }}">
    <link rel="stylesheet" href="{{ asset("/public/css/users.css") }}">
    <div class="sect">
    <x-client-side-bar></x-client-side-bar>
    <x-client-header></x-client-header>
    <style>
    .newrepost-content_section-up p{
    font-size: 11px;
    }
    .user_graphic_hrs{
        transform: rotate(90deg); position: absolute;right:-130px; z-index: 5;
    }
    /*@media (max-width:2000px){*/
    /*    #user_graphic_hrs_first {*/
    /*        transform: rotate(90deg); position: absolute;right: -190px; z-index: 5;*/
    /*    }*/
    /*    #user_graphic_hrs_second{*/
    /*        transform: rotate(90deg); position: absolute;right: -175px; z-index: 5;*/
    /*    }*/
    /*    #user_graphic_hrs_third{*/
    /*            transform: rotate(90deg); position: absolute;right: -175px; z-index: 5;*/
    /*        }*/
    /*}*/

</style>
    <div class="dashboard_content">
        <div class="dashboard_content_up">
            <div class="dashboard_content_up_items" @if ($latest_competetion)
               
                @endif >
                <div class="dashboard_content_up_item">
                    <div class="dashboard_content_up_item_percent_text">
                        <p>Компетенций освоено</p>
                    </div>
                    <div class="dashboard_content_up_item_percent">
                                   <?php
// Assuming $resultat_fact is a percentage value between 0 and 100
$lol = count($user->competetions->where("is_done", 1)) ;
if($lol == 0){
    $percentageFill2 = 0;
}else{
    $percentageFill2 = count($user->competetions->where("is_done", 1)) / count($user->competetions)  * 100;
}

if($percentageFill2 > 100){
    $percentageFill2 = 100;
}
// Calculate the stroke-dasharray value based on the percentage
// The radius of the circle here is adjusted to fit the SVG size
$radius2 = 18.5; // Adjust the radius as needed
$circumference2 = 2 * M_PI * $radius2;
if ($percentageFill2 > 0) {
    $strokeDashArray2 = ($percentageFill2 / 100) * $circumference2;
    $strokeDashOffset2 = $circumference2 - $strokeDashArray2; // Calculate the offset
} else {
    // Set $strokeDashArray and $strokeDashOffset to zero if there's no fill
    $strokeDashArray2 = 0;
    $strokeDashOffset2 = $circumference2;
}
?>

<div class="progress-circle">
    <svg width="80" height="80" viewBox="0 0 68 68">
        <circle cx="34" cy="34" r="<?php echo $radius2; ?>" fill="none" stroke="#eee" stroke-width="4"></circle>
        <circle cx="34" cy="34"r="<?php echo $radius2; ?>" fill="none" stroke="#104772" stroke-width="4" stroke-dasharray="<?php echo $circumference2; ?>" stroke-dashoffset="<?php echo $strokeDashOffset2; ?>"
            style="transform: rotate(-90deg); transform-origin: 50%;"></circle>
    </svg>
   <p class="progress-text">{{ count($user->competetions->where("is_done", 1)) }}/{{ count($user->competetions) }}</p>
</div>
                        <!--<div class="dashboard_content_up_item_percent_content">-->
                        <!--    <p></p>-->
                        <!--</div>-->
                    </div>

                </div>
                <div class="dashboard_content_up_item">
                    <div class="dashboard_content_up_item_percent_text">
                        <p>Пройдено <br> тестов</p>
                    </div>
                    <div class="dashboard_content_up_item_percent">
                                                <?php
// Assuming $resultat_fact is a percentage value between 0 and 100
if (count($user->competetions->where("is_done", 1))!== 0){
    $user_test_count = count($user->competetions->where("is_done", 1));
}else{
    $user_test_count = 0;
}

if($user_test_count == 0){
    $percentageFill1 = 0;
}else{
    $percentageFill1 =  count($user->competetions->where("is_done", 1)) / count($user->competetions)  * 100;
}
// $percentageFill1 = floor( $user_test_count) * 100  / count($user->competetions);
if($percentageFill1 > 100){
    $percentageFill1 = 100;
}
// Calculate the stroke-dasharray value based on the percentage
// The radius of the circle here is adjusted to fit the SVG size
$radius1 = 18.5; // Adjust the radius as needed
$circumference1 = 2 * M_PI * $radius1;
if ($percentageFill1 > 0) {
    $strokeDashArray1 = ($percentageFill1 / 100) * $circumference1;
    $strokeDashOffset1 = $circumference1 - $strokeDashArray1; // Calculate the offset
} else {
    // Set $strokeDashArray and $strokeDashOffset to zero if there's no fill
    $strokeDashArray1 = 0;
    $strokeDashOffset1 = $circumference1;
}
?>

<div class="progress-circle">
    <svg width="80" height="80" viewBox="0 0 68 68">
        <circle cx="34" cy="34" r="<?php echo $radius1; ?>" fill="none" stroke="#eee" stroke-width="4"></circle>
        <circle cx="34" cy="34"r="<?php echo $radius1; ?>" fill="none" stroke="#104772" stroke-width="4" stroke-dasharray="<?php echo $circumference1; ?>" stroke-dashoffset="<?php echo $strokeDashOffset1; ?>"
            style="transform: rotate(-90deg); transform-origin: 50%;"></circle>
    </svg>
      
    @if (count($user->tests)!== 0)     
                            <p class="progress-text">{{  floor(( $user_test_count) * 100  / count($user->competetions)) }}%</p>
                            @else
                            <p class="progress-text">0%</p>
                            @endif
</div>
                      
                    </div>

                </div>
                 <div class="dashboard_content_up_item">
                    <div class="dashboard_content_up_item_percent_text">
                        <p>Соответствие  <br> профилю</p>
                    </div>
                    <div class="dashboard_content_up_item_percent">
                        <?php
// Assuming $resultat_fact is a percentage value between 0 and 100
$percentageFill = round($resultat_fact);
if($percentageFill > 100){
    $percentageFill = 100;
}
// Calculate the stroke-dasharray value based on the percentage
// The radius of the circle here is adjusted to fit the SVG size
$radius = 18.5; // Adjust the radius as needed
$circumference = 2 * M_PI * $radius;
if ($percentageFill > 0) {
    $strokeDashArray = ($percentageFill / 100) * $circumference;
    $strokeDashOffset = $circumference - $strokeDashArray; // Calculate the offset
} else {
    // Set $strokeDashArray and $strokeDashOffset to zero if there's no fill
    $strokeDashArray = 0;
    $strokeDashOffset = $circumference;
}
?>

<div class="progress-circle">
    <svg width="80" height="80" viewBox="0 0 68 68">
        <circle cx="34" cy="34" r="<?php echo $radius; ?>" fill="none" stroke="#eee" stroke-width="4"></circle>
        <circle cx="34" cy="34"r="<?php echo $radius; ?>" fill="none" stroke="#104772" stroke-width="4" stroke-dasharray="<?php echo $circumference; ?>" stroke-dashoffset="<?php echo $strokeDashOffset; ?>"
            style="transform: rotate(-90deg); transform-origin: 50%;"></circle>
    </svg>
   <p class="progress-text"><?php echo round($resultat_fact) . '%'; ?></p>
</div>

                    </div>

                </div>
                {{-- @if ($latest_competetion)
                <div class="test_results_result dashboard_content_up_item" style="width:300px; margin:0;margin-bottom:33px"
                onclick="window.location.href='/statistic'"
                >
                  <div class="test_results_result_up">
                      <h5>Последний результат</h5>
                  </div>
                  <div class="test_results_result_content">
                      <div class="test_results_result_content_precent" style="width: 70%">
                          <p style="
                          font-size: 9px;
                      ">{{ $latest_competetion->competetion->name }}</p>

                          <div class="status-bar" style="background:#F3F3F4">
                              <span class="status-per"
                               @if( $latest_competetion->performance <=40 )
                                  style="background: #ce3535; width:{{ $latest_competetion->performance }}%"
                                  @elseif( $latest_competetion->performance <=70  )
                                style="background: rgb(156, 156, 0); width:{{ $latest_competetion->performance }}%"
                                @else style="background: #70C493; width:{{ $latest_competetion->performance }}%"
                                  @endif >
                              </span>
                          </div>
                      </div>
                      <div class="test_results_result_content_text" style="
                      width: 40%;
                      margin-left: 10px;
                  ">

                          <p style="
                          font-size: 11px;
                      ">{{ $latest_competetion->text }}</p>
                      </div>
                  </div>
                  
              </div>
                @endif --}}
                <div class="recommendations_block" onclick="window.location.href='/literature'">
<h3>Рекомендации </h3>
                    <div class="recommendations_icon">
                        <img src='/images/table_book_icon.svg' style="width:62px;height:62px" />
<!--<svg width="140" height="139" viewBox="0 0 140 139" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">-->
<!--<path d="M19.6172 68.7495L44.4307 26.0781H94.0578L118.871 68.7495L94.0578 111.421H44.4307L19.6172 68.7495Z" fill="white" stroke="#FC6262"/>-->
<!--<path d="M98.5514 41.9395H42.2285V97.8601H98.5514V41.9395Z" fill="url(#pattern0)"/>-->
<!--<defs>-->
<!--<pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">-->
<!--<use xlink:href="#image0_324_4545" transform="scale(0.00277778)"/>-->
<!--</pattern>-->
<!--<image id="image0_324_4545" width="360" height="360" xlink:href="data:image/jpeg;base64,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ONJW5ZYmEoumfcfhTwZ4a8E6cul+GtKt9Ot/kM8iDfd3kqLt8+9u5N09zKecGRysYJSJI48IPtsLg8NgqfssNSjTjpzNazm1pzTm/ek/V2WySWh/Luf8SZ1xNjHjs6x9bGVveVKEny4fDQk7+yw2HhalQprtCKlOylUlOd5PqK6jwwoAKACgAoAKACgAoAKACgAoAKACgAoAKACgAoAKACgAoAKACgAoAKACgAoAKACgAoAKACgAoAKACgAoAKACgAoAKACgCvdWlpfQPbXtrb3lvIMSW91DHcQOCCCHilV42BBIwyngkd6mUITi4zjGcXvGUVKL9U00zahiMRhasa2Gr1sPWg7wq0Ks6NWLuneNSnKM4u6T0a1SPK9d+Bfwt1/e0/hW00+dyxFzojzaQ6MxJLCCzeOxcknP720kA7CvLr5HleIu5YWFOT+1Rbotf9uwag/nBn3mVeKfHWU8saWfYjGUo2XsczjTzCMktEnVxMZ4qK/694iD7sTwN8EPAfgK7fUtNsrjUtU81pLbUtblhvbmwQn5Y7FIre2trcoOPtK25vW3ODc+WwjCwOSYDATdSnCVSrduNSu1OVNdFBKMYxt/Ny8+/vW0HxT4n8V8WYeODxuJo4LAezjCtgsshUw1HFyXxTxUp1q1espP/lw6ywytFqjzrnfrteufngUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFABQAUAFAAD/2Q=="/>-->
<!--</defs>-->
<!--</svg>-->





                    </div>

                </div>
            </div>

        <div class="dashboard_content_middle box_shadow_gray">
               <div class="w100">

                {{--<canvas id="myChart-cli"></canvas>--}}

                {{--график--}}
<div class="client_charts">

@foreach ($user->competetions->where("is_done",1) as $competetion)
        <div class="newrepost-content_section-{{ $user->id }}" style="padding:20px;" id="section{{ $competetion->id }}" >
        <div class="newrepost-content_section-up">
            <p>Компетенции</p>
            <div style="position: relative;display:flex;height:26px">
                <p>Уровень осведомленности</p>
        <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}" id="user_graphic_hrs_first">
            </div>
            <div style="position: relative;display:flex;height:26px">
                <p>Уровень знания</p>
        <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}" id="user_graphic_hrs_second">
            </div>
            <div style="position: relative;display:flex;height:26px">
                <p>Уровень опыта</p>
        <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}" id="user_graphic_hrs_third">
            </div>
            <div style="position: relative;display:flex;height:26px">
                <p>Уровень мастерства</p>
        <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}">
            </div>
            <div style="position: relative;display:flex">
                <p>Экспертный уровень</p>

            </div>
        </div>

                @php

                    $testArr = [];
                    $count_competetion_points = 0;

                                                 $competetionLevel = \App\Models\CompetetionLevel::where('competetion_id',  $competetion->competetion->id)->where('position_id', $user->position->id)->first();
$tests = $competetion->competetion->tests; // Assuming this retrieves the tests

$filteredTests = $tests->filter(function ($test) use ($competetionLevel) {
    return $test->indicator->level == $competetionLevel->level;
});






                    foreach($filteredTests as $test){
                     $test = \App\Models\UserTests::where("test_id",$test->id)->where("user_id",$user->id)->first();
                     if($test){
                        $count_competetion_points += $test->points;
                     }
                    }
                    $competetion_level = $competetion->level;

                @endphp
        <div>
            <div class="newrepost-content_section-last">
                <p class="table_competetion_name">{{ $competetion->competetion->name }}</p>

                <div class="newrepost-content_section-last_sector">

                    <div class="newrepost-content_section-last_sector-bar" style="width: 100%">

                        <span class="newrepost-content_section-last_sector-per"

                        style="@if($competetion_level < 2)
                                width:9%;
                                @elseif($competetion_level == 2)
                                width:29%;
                                @elseif($competetion_level == 3)
                                width:54%;
                                 @elseif($competetion_level == 4)
                                 width:74%;
                                 @elseif($competetion_level == 5)
                                  width:94%;
                                @endif
                                @if( $competetion_level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level < 2)
                                    background: linear-gradient(270deg, #FC6262 0%, #FFB4B4 100%);
                                    @elseif( $competetion_level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level >= 2)
                                background: linear-gradient(270deg, #F6A938 0.98%, #FFD598 100%);
                                @else
                                background: linear-gradient(270deg, #70C493 2.83%, #96F6BE 100%);
                                    @endif
                                    ">
                            @if( $competetion_level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level < 2)
                                <div class="recomended_text">
                                   <!-- <svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.5885L15.8771 9.5L33.2998 9.5L42.0111 24.5885L33.2998 39.6769L15.8771 39.6769L7.16581 24.5885Z" fill="white" stroke="#FC6262"/>
                                <path d="M25 35C30.5228 35 35 30.5228 35 25C35 19.4772 30.5228 15 25 15C19.4772 15 15 19.4772 15 25C15 30.5228 19.4772 35 25 35Z" fill="white"/>
                                <path d="M25 21V25" stroke="#FC6262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M25 29H25.01" stroke="#FC6262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>-->
                            <div style="right:-20px;" class="table_notice_icon"></div>
                                <div class="recomended_text_content">
                                    <span>{{$competetion->text}}</span>
                                </div>
                                </div>
                             @elseif( $competetion_level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level >= 2)
                              <div class="recomended_text">
                              <div style="right:-20px;" class="table_book_icon"></div>                                  
                              <!--<img style="position: absolute;
                                                                        top: -9px;
                                                                        z-index: 99;
                                                                        right:-20px" src="/public/images/Group 37996.svg" />-->
                                <div class="recomended_text_content">
                                    <span>{{$competetion->text}}</span>
                                </div>
                                </div>

                            @elseif( $competetion_level == $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level)
                             <div class="recomended_text">
                             <div style="right:-20px;" class="table_complete_icon"></div>   
                             <!--<svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.8538L15.8771 9.76538L33.2998 9.76538L42.0111 24.8538L33.2998 39.9423L15.8771 39.9423L7.16581 24.8538Z" fill="white" stroke="#70C493"/>
                                <path d="M30.3327 21L22.9993 28.3333L19.666 25" stroke="#70C493" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>-->
                                <div class="recomended_text_content">
                                    <span>{{$competetion->text}}</span>
                                </div>
                                </div>
                             @elseif( $competetion_level > $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level )
                               <div class="recomended_text">
                                <div style="right:-20px;" class="table_star_icon"></div>  
                                <!--<svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.5885L15.8771 9.5L33.2998 9.5L42.0111 24.5885L33.2998 39.6769L15.8771 39.6769L7.16581 24.5885Z" fill="white" stroke="#70C493"/>
                                <path d="M25 17L26.7961 22.5279H32.6085L27.9062 25.9443L29.7023 31.4721L25 28.0557L20.2977 31.4721L22.0938 25.9443L17.3915 22.5279H23.2039L25 17Z" fill="#70C493"/>
                            </svg>-->
                                <div class="recomended_text_content">
                                    <span>{{$competetion->text}}</span>
                                </div>
                                </div>

                        @endif
                                </span>

                                <div class="per" style="width:@if( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==1 )9%  @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==2)29% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==3)54% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==4)74% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level == 5)94% @endif;
                                    ">
                                    <div class="per_per" >

                                    </div>
                                    </div>
                    </div>

                </div>

                <a onclick="openStats({{ $competetion->id }})">
                    <svg style="width:60px" class="secondIcon1 secondIcon-{{ $competetion->id }}"id="secondIcon{{ $competetion->id }}" xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0172 8.38113C19.3479 8.78651 19.3243 9.38375 18.9463 9.76215L13.104 15.6041C12.9081 15.8 12.6461 15.906 12.3744 15.906C12.1025 15.906 11.841 15.8002 11.6444 15.6041L5.8023 9.76203C5.39923 9.35848 5.39923 8.70527 5.8023 8.30278C6.20551 7.89909 6.85889 7.89909 7.26188 8.30266L12.3744 13.4147L17.4867 8.30278C17.8647 7.92434 18.4626 7.90067 18.868 8.23178L18.9464 8.30274L19.0172 8.38113Z" fill="#CFD1D8"/>
                    </svg>
                </a>
            </div>
            <hr>
            <div class="second1 section-{{ $competetion->id }}" id="second{{ $competetion->id }}">



                @foreach ($filteredTests as $test)
                @php
                    $test = \App\Models\UserTests::where("test_id",$test->id)->where("user_id",$user->id)->first();
                @endphp
               @if($test)
                 <div class="newrepost-content_section-second">
                    <div class="if_not_ll" > 
                 <p id="testText">{{ mb_strlen($test->test->indicator->name) > 91 ? mb_substr($test->test->indicator->name , 0, 91) . "..." : $test->test->indicator->name }}</p>
                  @if( mb_strlen($test->test->indicator->name) > 91)
                  
                    <div id="fullText">{{$test->test->indicator->name}}</div>
                  @endif
                  </div>

                    <div class="newrepost-content_section-last_sector" style="position: relative">



                        <div class="newrepost-content_section-last_sector-bar">
                            @php
                            if($test->points == 0){
                             $level = 0;
                            }elseif($test->points <= 0.5 && $test->points != 0 ){
                                $level = 1;
                            }elseif($test->points <= 1.5){
                            $level = 2;
                            }elseif($test->points <= 3){
                            $level = 3;
                            }elseif($test->points <= 5){
                            $level = 4;
                            }elseif($test->points <= 7.5){
                            $level = 5;
                            }
                            @endphp
                            <span class="newrepost-content_section-last_sector-per"
                             style="
                             @if($level == 1 || $level == 0)
                                width:9%;
                                @elseif($level == 2)
                                width:29%;
                                @elseif($level == 3)
                                width:54%;
                                 @elseif($level == 4)
                                 width:74%;
                                 @elseif($level == 5)
                                  width:94%;
                                @endif
                                @if( $level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $level  <= 1)
                                 background: linear-gradient(270deg, #FC6262 0%, #FFB4B4 100%);
                                @elseif($level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $level > 1)
                                background: linear-gradient(270deg, #F6A938 0.98%, #FFD598 100%);
                                @else
                                background: linear-gradient(270deg, #70C493 2.83%, #96F6BE 100%);
                                @endif

                        "
                        >
                                                @if( $level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $level  <= 1)
                                                    <div class="recomended_text">
                                   <!-- <svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.5885L15.8771 9.5L33.2998 9.5L42.0111 24.5885L33.2998 39.6769L15.8771 39.6769L7.16581 24.5885Z" fill="white" stroke="#FC6262"/>
                                <path d="M25 35C30.5228 35 35 30.5228 35 25C35 19.4772 30.5228 15 25 15C19.4772 15 15 19.4772 15 25C15 30.5228 19.4772 35 25 35Z" fill="white"/>
                                <path d="M25 21V25" stroke="#FC6262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M25 29H25.01" stroke="#FC6262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>-->
                            <div style="right:-20px;" class="table_notice_icon"></div>
                                <div class="recomended_text_content" style="top:0">
                                    <span>{{$test->text}}</span>
                                </div>
                                </div>

                             @elseif( $level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $level>1)
 <div class="recomended_text">
                              <div style="right:-20px;" class="table_book_icon"></div>                                  
                              <!--<img style="position: absolute;
                                                                        top: -9px;
                                                                        z-index: 99;
                                                                        right:-20px" src="/public/images/Group 37996.svg" />-->
                                <div class="recomended_text_content" style="top:0">
                                    <span>{{$test->text}}</span>
                                </div>
                                </div>



                           @elseif($level == $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level)
                             <div class="recomended_text">
                             <div style="right:-20px;" class="table_complete_icon"></div>   
                             <!--<svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.8538L15.8771 9.76538L33.2998 9.76538L42.0111 24.8538L33.2998 39.9423L15.8771 39.9423L7.16581 24.8538Z" fill="white" stroke="#70C493"/>
                                <path d="M30.3327 21L22.9993 28.3333L19.666 25" stroke="#70C493" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>-->
                                <div class="recomended_text_content" style="top:0">
                                    <span>{{$test->text}}</span>
                                </div>
                                </div>

                             @elseif($level> $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level )
<div class="recomended_text">
                                <div style="right:-20px;" class="table_star_icon"></div>  
                                <!--<svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.5885L15.8771 9.5L33.2998 9.5L42.0111 24.5885L33.2998 39.6769L15.8771 39.6769L7.16581 24.5885Z" fill="white" stroke="#70C493"/>
                                <path d="M25 17L26.7961 22.5279H32.6085L27.9062 25.9443L29.7023 31.4721L25 28.0557L20.2977 31.4721L22.0938 25.9443L17.3915 22.5279H23.2039L25 17Z" fill="#70C493"/>
                            </svg>-->
                                <div class="recomended_text_content" style="top:0">
                                    <span>{{$test->text}}</span>
                                </div>
                                </div>

                        @endif
                        </span>
                        {{-- {{ dump($competetion->competetion->levels->where("position_id",$user->position_id)->first()->level) . "  " .  $test->performance }} --}}

                        <div class="per" style="width:@if( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==1 )9%  @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==2)29% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==3)54% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==4)74% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level == 5)94% @endif;
                        ">
                            <div class="per_per" >

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
               @endif

                @endforeach

                  <hr>
            </div>
        </div>
        </div>

@endforeach
</div>
<div class="client_charts_media">
                    <div class="status-content">

                                    <div class="status-content_scroll">
                                        @foreach ($user->competetions->where("is_done", 1) as $user_competetion)


                                        <div class="status-content-competetion">
                                            <div>
                                                <a href="" class="status-content_info">{{ $user_competetion->competetion->name }}</a>
                                            </div>
                                            <div class="status-content_card">
                                                                @php
                    $competetionLevel = \App\Models\CompetetionLevel::where('competetion_id',  $user_competetion->competetion->id)->where('position_id', $user->position->id)->first();
                                    $tests = $user_competetion->competetion->tests; // Assuming this retrieves the tests

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
                                                if($test->points <= 0.5 && $test->points !== 0){
                                                    $level = 1;
                                                }elseif($test->points <= 1.5){
                                                $level = 2;
                                                }elseif($test->points <= 3){
                                                $level = 3;
                                                }elseif($test->points <= 5){
                                                $level = 4;
                                                }elseif($test->points <= 7.5){
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
                                                    @if( $level < $test->competetion->levels->where("position_id",$user->position_id)->first()->level && $level  == 1)
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
                        @endforeach
                        <hr>
                </div>
</div>
                {{----}}
                </div>

        </div>
        <div class="dashboard_content_down"></div>
    </div>
   </div>
    <x-footer></x-footer>

    <script>
function openSection(id){
    document.querySelectorAll(`.newrepost-content_section-${id}`).forEach((el)=>{
        el.classList.toggle("active");
    })
    document.querySelectorAll(`.newrepost-icon-${id}`).forEach((el)=>{
        el.classList.toggle("active");
    })
}

  const ctx_cli = document.getElementById('myChart-cli');
  new Chart(ctx_cli, {
    type: 'line',
    data: {
      labels: JSON.parse('{!! json_encode($weeks) !!}'),

      datasets: [{
        label: '# of Votes',
        data: {{ json_encode($weekCount) }},
        borderWidth: 4,
        label: 'Прогресс обучения',
        borderColor: '#104772',
        backgroundColor: '#104772',
        fill: true,
        fill: {
          target: "origin", // Set the fill options
          above: "#DAE8F1"
        }
    },
]
    },

    options: {
        // maintainAspectRatio: false,
        tension: 0.3,
        scale: {
    ticks: {
      precision: 0
    }
  },
      scales: {
        y: {
          beginAtZero: true,

        }
      },
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        customCanvasBackgroundColor: {
          color: '#F3F3F4',
        }
      }
    },
    plugins: [plugin],
  });

function openSection(id){
    document.querySelectorAll(`.newrepost-content_section-${id}`).forEach(e=>{
    e.classList.toggle("active");
    })
    document.querySelectorAll(`.newrepost-icon-${id}`).forEach(e=>{
    e.classList.toggle("active");
    })
}

function openStats(id){

    setTimeout(() => {
    console.log(document.getElementById("second"+id).parentElement.parentElement.offsetHeight + "  " +id);
    const user_graphic_hrs = document.querySelectorAll(".user_graphic_hrs"+id);
    user_graphic_hrs.forEach(e=>{
    e.classList.toggle("active");
    e.width = (document.getElementById("second"+id).parentElement.parentElement.offsetHeight-30)
    console.log(document.getElementById("second"+id).parentElement.parentElement.offsetHeight)
    const elem = document.getElementById("second" + id);
const parentHeight = elem.parentElement.parentElement.offsetHeight;


if (parentHeight > 400) {
  e.style.cssText = `top: ${parentHeight - 320}px; right: -${e.width-240}px`;
} else {
    e.style.cssText = `top: ${parentHeight - 240}px;right: -${e.width-155}px`;
}

    })
    }, 100);

    document.getElementById("second"+id).classList.toggle("active");
    document.getElementById("secondIcon"+id).classList.toggle("active");
}
    </script>
@endsection
