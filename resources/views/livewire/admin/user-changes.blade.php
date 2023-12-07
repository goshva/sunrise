<div>
    <style>
        .newrepost-content_section-second{
            z-index:1;
        }
        .recomended_bla{
            position:absolute;
            z-index:9999999;
            right:-92px;
            display:none;
        }
        .recomended_bla div{
            width: 200px;
    z-index: 9999;
    /* position: absolute; */
    right: -92px;
    padding: 20px;
    background: #fff;
    box-shadow: 0px 2px 12px 0px rgba(35, 51, 63, 0.15);
    border-radius: 20px;
        }
    </style>
    <div>
    <form action="" class="header_input" style="display: none;">
        <input type="text" name="" id="header_input" style="display: none;">
    </form>
    <div class="kvadrat" style="display: none;"></div>

    <div class="user">
        @if(session('success'))

        <div class="alert alert-success mt-2" role="alert">
                  {{  session()->pull('success')}}
                </div>
                <script>
                let error = document.querySelector('.alert-success');
                setTimeout(() => {
                    error.style.display = 'none';
                }, 3000);

            </script>
    @endif
    @if(count($errors) > 0)
        <div id="alert-danger-div">
            @foreach ($errors->all() as $error)

                <div class="alert alert-danger mt-2" role="alert">
                    {{  $error }}
                  </div>

            @endforeach
            </div>
            <script>
                let error = document.getElementById('alert-danger-div');
                console.log(error);
                setTimeout(() => {
                  error.style = "display:none"

                }, 3000);

            </script>
    @endif
        <div class="user-up">
            <h1 class="user-title">Сотрудники</h1>
            <div class="user-up_sel">
                {{-- <div class="user-up_sel-lab">
                    @if(auth()->user()->role_id != 4)
                    <label for="" class="user-up_sel-label">Показать:</label>
                    <select name="" id="" class="user-up_sel-select">
                        <option value="">моих подчиненных</option>
                    </select>
                    @endif
                </div> --}}
            </div>
        </div>

        <div class="user-add">
             @if(auth()->user()->role_id != 4)
           <div style="display: flex;align-items:center;">
            <button class="user-add_button" onclick="addNewUser()" style="margin-right: 20px">Добавить сотрудника
                <span class="user-add_span" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_1271_6120)">
                          <path d="M11 20C11 20.2652 11.1054 20.5196 11.2929 20.7071C11.4804 20.8946 11.7348 21 12 21C12.2652 21 12.5196 20.8946 12.7071 20.7071C12.8946 20.5196 13 20.2652 13 20V13H20C20.2652 13 20.5196 12.8946 20.7071 12.7071C20.8946 12.5196 21 12.2652 21 12C21 11.7348 20.8946 11.4804 20.7071 11.2929C20.5196 11.1054 20.2652 11 20 11H13V4C13 3.73478 12.8946 3.48043 12.7071 3.29289C12.5196 3.10536 12.2652 3 12 3C11.7348 3 11.4804 3.10536 11.2929 3.29289C11.1054 3.48043 11 3.73478 11 4V11H4C3.73478 11 3.48043 11.1054 3.29289 11.2929C3.10536 11.4804 3 11.7348 3 12C3 12.2652 3.10536 12.5196 3.29289 12.7071C3.48043 12.8946 3.73478 13 4 13H11V20Z" fill="#343A40"/>
                        </g>
                        <defs>
                          <clipPath id="clip0_1271_6120">
                            <rect width="24" height="24" fill="white"/>
                          </clipPath>
                        </defs>
                      </svg>
                </span>
            </button>
            <form action="{{ route("admin.users") }}" id="showSubForm"  method="GET" class="user-add_form">
                @csrf
                <input type="hidden" name="show_sub"  id="show_user_subdivisions">
                <input class="user-add_input" @if (app('request')->input('show_sub') == "true")
                    checked
                @endif

                 name="show_sub" value="true" type="checkbox" id="user-subordinates" >
                <label for="user-subordinates" class="user-add_label">Показать моих подчиненных</label>
            </form>
           </div>
          
            <div class="">
                <button class="position-sector_download" onclick="showLiteratureBtn()" id="add-user-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 2.99988C14.5808 2.99988 16.8548 4.66088 17.6748 7.04488C20.1138 7.37588 21.9998 9.47188 21.9998 11.9999C21.9998 13.2209 21.5558 14.3959 20.7498 15.3089C20.5518 15.5319 20.2768 15.6469 19.9998 15.6469C19.7648 15.6469 19.5288 15.5649 19.3378 15.3969C18.9248 15.0299 18.8848 14.3989 19.2508 13.9839C19.7338 13.4379 19.9998 12.7319 19.9998 11.9999C19.9998 10.3459 18.6538 8.99988 16.9998 8.99988H16.8998C16.4238 8.99988 16.0138 8.66388 15.9198 8.19688C15.5458 6.34488 13.8978 4.99988 11.9998 4.99988C10.1028 4.99988 8.45376 6.34488 8.08076 8.19688C7.98676 8.66388 7.57576 8.99988 7.09976 8.99988H6.99976C5.34576 8.99988 3.99976 10.3459 3.99976 11.9999C3.99976 12.7319 4.26576 13.4379 4.74976 13.9839C5.11476 14.3989 5.07576 15.0299 4.66176 15.3969C4.24776 15.7629 3.61576 15.7219 3.25076 15.3089C2.44376 14.3959 1.99976 13.2209 1.99976 11.9999C1.99976 9.47188 3.88576 7.37588 6.32476 7.04488C7.14576 4.66088 9.41976 2.99988 11.9998 2.99988ZM11.305 11.28C11.699 10.904 12.322 10.907 12.707 11.293L15.707 14.293C16.098 14.684 16.098 15.316 15.707 15.707C15.512 15.902 15.256 16 15 16C14.744 16 14.488 15.902 14.293 15.707L13 14.414V20C13 20.553 12.552 21 12 21C11.448 21 11 20.553 11 20V14.356L9.69496 15.616C9.29796 16.001 8.66496 15.988 8.28096 15.591C7.89696 15.193 7.90796 14.561 8.30496 14.177L11.305 11.28Z" fill="white"/>
                      </svg>
                      Загрузить
                </button>
            </div>
             @endif
        </div>
        <div class="user-btns">
            <h3 class="user-btns_title">Сотрудники</h3>
            <form action="{{ route("admin.users") }}" method="GET" id="usersFilter" class="user-btns_flex">
                @csrf
                <input type="submit" class="user-btns_flex-btn @if (Request::has('all')) user-btns_flex-btn_active @endif  @if ( !Request::has('process') && !Request::has('ended') && !Request::has('didntstart')) user-btns_flex-btn_active @endif  " value="все сотрудники"  name="all">
                <input

                 type="submit" class="user-btns_flex-btn @if (Request::has('ended')) user-btns_flex-btn_active @endif " value="завершили" name="ended" >
                <input type="submit" class="user-btns_flex-btn @if (Request::has('process')) user-btns_flex-btn_active @endif"  value="в работе" name="process">
                <input type="submit" class="user-btns_flex-btn @if (Request::has('didntstart')) user-btns_flex-btn_active @endif"   value="не приступили" name="didntstart">
                <button >

                </button>
                <script>
                    document.querySelectorAll(".user-btns_flex-btn").forEach(e=>{
                        e.addEventListener('click', ()=>{
                        document.getElementById('usersFilter').submit()
                    })
                    })
                </script>
            </form>
        </div>

        <div class="user-content">
            <div class="user-content_sector">
                <p class="user-content_sector-p">Сотрудник</p>
                <p class="user-content_sector-p">Должность</p>
                <p class="user-content_sector-p">Подразделение</p>
                <p class="user-content_sector-p">Компетенции</p>
                <p class="user-content_sector-p">Статус</p>
            </div>
            <hr>
    <style>
        .newrepost-content_section-up p{
        font-size: 11px;
        }
        .user_graphic_hrs{
            transform: rotate(90deg); position: absolute;right: -150px; z-index: 5;
        }
        @media (max-width:2000px){
            #user_graphic_hrs_first {
                transform: rotate(90deg); position: absolute;right: -190px; z-index: 5;
            }
            #user_graphic_hrs_second{
                transform: rotate(90deg); position: absolute;right: -175px; z-index: 5;
            }
            #user_graphic_hrs_third{
                    transform: rotate(90deg); position: absolute;right: -175px; z-index: 5;
                }
        }

    </style>
    <label class="repost-content_label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 11C5 7.691 7.691 5 11 5C14.309 5 17 7.691 17 11C17 14.309 14.309 17 11 17C7.691 17 5 14.309 5 11ZM20.707 19.293L17.312 15.897C18.365 14.543 19 12.846 19 11C19 6.589 15.411 3 11 3C6.589 3 3 6.589 3 11C3 15.411 6.589 19 11 19C12.846 19 14.543 18.365 15.897 17.312L19.293 20.707C19.488 20.902 19.744 21 20 21C20.256 21 20.512 20.902 20.707 20.707C21.098 20.316 21.098 19.684 20.707 19.293Z" fill="#8A92A6"/>
    </svg>
        <input style="height:50px" wire:model='searchTerm' class="repost-content_input" type="text" placeholder="Поиск">
    </label>
    @php
        if(auth()->user()->role_id != 4){
            $usersForeach = $users->where("email", "!=" , "help@smtk.com")->where("email", "!=" , "tech@smtk.com");
            }else{
            $usersForeach = $users->where("email", "!=" , "help@smtk.com")->where("email", "!=" , "tech@smtk.com")->where('admin_user_id', $user->id);
            }
        
    @endphp
     
     
@foreach ($users as $user)
@php
    $position = $positions->where('id', $user->position_id)->first();
    $competetion_count = count($position->competetions);
@endphp
<div class="user-content_sector">

<div class="user-content_sector-user">

    <img style="width:50px;height:50px; border-radius: 50%;" src="{{ $user->avatar }}" alt="">
    <p class="user-content_sector-user_name">{{ $user->last_name }} {{ $user->first_name }} {{ $user->fathers_name }}</p>
</div>
<p class="user-content_sector_info">{{ $position->name }} </p>
<p class="user-content_sector_info">@if ($user->subdivisions->first())
    {{ $user->subdivisions->first()->name }}
@endif</p>
<p class="user-content_sector_info">{{ $competetion_count }} Компетенции</p>
<div class="user-content_sector-status">
    <div class="col-md-3 col-sm-6">
        @if ($user->competetions)
        <div  class="progress @if(count($user->competetions->where("is_done",1)->all())>=  count($user->competetions) )   green @elseif (count($user->competetions->where("is_done",1)->all())>=  count($user->competetions)  -  count($user->competetions)/2) yellow @else pink @endif">
            <span class="progress-left">
                <span id="indicator-{{ $user->id }}" class="progress-bar"></span>
            </span>
            <span class="progress-right">
                <span id="indicator-{{ $user->id }}-right"  class="progress-bar"></span>
            </span>

                <div  class="progress-value">{{ count($user->competetions->where("is_done",1)) }}/{{ count($user->competetions) }}</div>
                <style>
                       .progress .progress-right #indicator-{{ $user->id }}-right{
                            left: -100%;
                            border-top-left-radius: 40px;
                            border-bottom-left-radius: 40px;
                            border-right: 0;
                            -webkit-transform-origin: center right;
                            transform-origin: center right;
                            @if (count($user->competetions->where("is_done",1))==count($user->competetions) &&count($user->competetions->where("is_done",1)) !=0 || count($user->competetions->where("is_done",1)) >= count($user->competetions) /2)
                            transform: rotate(180deg);
                            @else
                            transform: rotate({{ count($user->competetions->where("is_done",1)) *30 }}deg);
                            @endif
                        }
                               #indicator-{{ $user->id }}{
                                    @if(count($user->competetions->where("is_done",1)) == count($user->competetions))
                                 transform: rotate(180deg);
                                 @elseif (count($user->competetions->where("is_done",1)) >= count($user->competetions) /2)
                            transform: rotate({{ count($user->competetions->where("is_done",1)) *60 }}deg);

                                    @else
                                    transform: rotate(0deg);
                                    @endif
                        }
                </style>


        </div>
        @endif
    </div>
    <button onclick="openSection({{ $user->id }})">
        <svg id="icon{{ $user->id }}" class="icon1 newrepost-icon-{{ $user->id }}" xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0172 8.38113C19.3479 8.78651 19.3243 9.38375 18.9463 9.76215L13.104 15.6041C12.9081 15.8 12.6461 15.906 12.3744 15.906C12.1025 15.906 11.841 15.8002 11.6444 15.6041L5.8023 9.76203C5.39923 9.35848 5.39923 8.70527 5.8023 8.30278C6.20551 7.89909 6.85889 7.89909 7.26188 8.30266L12.3744 13.4147L17.4867 8.30278C17.8647 7.92434 18.4626 7.90067 18.868 8.23178L18.9464 8.30274L19.0172 8.38113Z" fill="#CFD1D8"/>
        </svg>
    </button>

    <form action="/download-reposts" class="user_changes_div">
        @csrf
        <a>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                <path d="M12.5 20C12.7652 20 13.0196 19.8946 13.2071 19.7071C13.3946 19.5196 13.5 19.2652 13.5 19C13.5 18.7348 13.3946 18.4804 13.2071 18.2929C13.0196 18.1054 12.7652 18 12.5 18C12.2348 18 11.9804 18.1054 11.7929 18.2929C11.6054 18.4804 11.5 18.7348 11.5 19C11.5 19.2652 11.6054 19.5196 11.7929 19.7071C11.9804 19.8946 12.2348 20 12.5 20ZM12.5 13C12.7652 13 13.0196 12.8946 13.2071 12.7071C13.3946 12.5196 13.5 12.2652 13.5 12C13.5 11.7348 13.3946 11.4804 13.2071 11.2929C13.0196 11.1054 12.7652 11 12.5 11C12.2348 11 11.9804 11.1054 11.7929 11.2929C11.6054 11.4804 11.5 11.7348 11.5 12C11.5 12.2652 11.6054 12.5196 11.7929 12.7071C11.9804 12.8946 12.2348 13 12.5 13ZM12.5 6C12.7652 6 13.0196 5.89464 13.2071 5.70711C13.3946 5.51957 13.5 5.26522 13.5 5C13.5 4.73478 13.3946 4.48043 13.2071 4.29289C13.0196 4.10536 12.7652 4 12.5 4C12.2348 4 11.9804 4.10536 11.7929 4.29289C11.6054 4.48043 11.5 4.73478 11.5 5C11.5 5.26522 11.6054 5.51957 11.7929 5.70711C11.9804 5.89464 12.2348 6 12.5 6Z" stroke="#8A92A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <input type="hidden" name="users[]" value="{{ $user->id }}" id="">
        <input type="hidden" id="changePassUser"  value="{{ $user->id }}" id="">
        <div class="user_changes"
          @if(auth()->user()->role_id == 4)
          style="bottom:-80px"
          @endif
        >
            <div class="user_changes_content">
                @if(auth()->user()->role_id != 4)
                <div class="edit_user_ref" onclick="editUserPopup(<?php echo $user->id;?> )">Редактировать
                </div>
                <a class="edit_user_ref" href="/change_pass/{{ $user->id }}">Сбросить пароль
                </a>
                
                @endif
                
                <button  class="edit_user_ref" type="submit">Выгрузка отчета по сотруднику</button>

            </div>
        </div>
    </form>


</div>
</div>
<hr>
@foreach ($user->competetions->where("is_done",1) as $competetion)
        <div class="newrepost-content_section_passive newrepost-content_section-{{ $user->id }}" style="padding:20px;" id="section{{ $competetion->id }}" >
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

@endforeach
<div class="position-popup " id="popup-reposts">
    <div class="position-popup_overlay" onclick="changePassPopup()"></div>
    <div class="position-popup_content">
        <div class="position-popup_close-btn" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h2 class="position-popup_title">Сбросить пароль</h2>
        <label class="position-popup_label">Новый пароль</label>
        <input id="PasswordSbros" class="position-popup_input" type="text" style="margin-bottom:15px">



        <a onclick="changePass()" class="position-popup_btn">Сохранить </a>
    </div>
</div>

</div>

<div class="user-sec">
        <label style="margin-bottom:20px" class="repost-content_label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 11C5 7.691 7.691 5 11 5C14.309 5 17 7.691 17 11C17 14.309 14.309 17 11 17C7.691 17 5 14.309 5 11ZM20.707 19.293L17.312 15.897C18.365 14.543 19 12.846 19 11C19 6.589 15.411 3 11 3C6.589 3 3 6.589 3 11C3 15.411 6.589 19 11 19C12.846 19 14.543 18.365 15.897 17.312L19.293 20.707C19.488 20.902 19.744 21 20 21C20.256 21 20.512 20.902 20.707 20.707C21.098 20.316 21.098 19.684 20.707 19.293Z" fill="#8A92A6"/>
    </svg>
        <input style="height:50px" wire:model='searchTerm' class="repost-content_input" type="text" placeholder="Поиск">
    </label>
    @foreach ($users as $user)
    <div class="user-sector">
        <div class="user-sector-flex">
            <img src="{{ $user->avatar }}" alt="">
            <div class="">
                <h3>{{ $user->last_name }} {{ $user->first_name }} {{ $user->fathers_name }}</h3>
                <p>{{ $user->position->name }}</p>
                <p class="user-content_sector_info">@if ($user->subdivisions->first())
    {{ $user->subdivisions->first()->name }}
@endif</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            @if ($user->competetions)
            <div  class="progress @if(count($user->competetions->where("is_done",1)->all())>=  count($user->competetions) )   green @elseif (count($user->competetions->where("is_done",1)->all())>=  count($user->competetions)  -  count($user->competetions)/2) yellow @else pink @endif">
                <span class="progress-left">
                    <span id="indicator-{{ $user->id }}" class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span id="indicator-{{ $user->id }}-right"  class="progress-bar"></span>
                </span>

                    <div  class="progress-value">{{ count($user->competetions->where("is_done",1)) }}/{{ count($user->competetions) }}</div>
                    <style>
                           .progress .progress-right #indicator-{{ $user->id }}-right{
                                left: -100%;
                                border-top-left-radius: 40px;
                                border-bottom-left-radius: 40px;
                                border-right: 0;
                                -webkit-transform-origin: center right;
                                transform-origin: center right;
                                @if (count($user->competetions->where("is_done",1))==count($user->competetions) &&count($user->competetions->where("is_done",1)) !=0 || count($user->competetions->where("is_done",1)) >= count($user->competetions) /2   && count($user->competetions->where("is_done",1)) !=0 )
                                transform: rotate(180deg);
                                @else
                                transform: rotate({{ count($user->competetions->where("is_done",1)) *30 }}deg);
                                @endif
                            }
                                   #indicator-{{ $user->id }}{
                                 @if(count($user->competetions->where("is_done",1)) == count($user->competetions) &&   count($user->competetions->where("is_done",1)) !=0)
                                     transform: rotate(180deg);
                                     @elseif (count($user->competetions->where("is_done",1)) >= count($user->competetions) /2 && count($user->competetions->where("is_done",1)) !=0)
                                transform: rotate({{ count($user->competetions->where("is_done",1)) *60 }}deg);

                                        @else
                                        transform: rotate(0deg);
                                @endif
                            }
                    </style>


            </div>
            @endif
        </div>
    </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</div>

<div class="user-popup" id="popup1">
    <div class="user-popup_overlay"></div>
    <form style="
    width: 70%;
" class="user-popup_content" method="POST" action="{{ route("admin.create-user") }}">
        @csrf
        <div class="user-popup_close-btn" onclick="addNewUser()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h2 class="user-popup_title">Добавить сотрудника</h2>
        <div class="user-popup_sectors">
            <div class="user-popup-sector">
                <label class="user-popup_label">Фамилия</label>
                <input pattern="[A-Za-z]+" required class="user-popup_input noSpecialSimbols" value="{{ old("last_name") }}" name="last_name" type="text">
                <label class="user-popup_label">Имя</label>
                <input pattern="[A-Za-z]+" required class="user-popup_input noSpecialSimbols" value="{{ old("first_name") }}" name="first_name" type="text">
                <label class="user-popup_label">Отчество</label>
                <input pattern="[A-Za-z]+" required class="user-popup_input noSpecialSimbols" value="{{ old("fathers_name") }}"  name="fathers_name" type="text">
                <label class="user-popup_label">Город</label>
                <select style="margin-bottom: 20px" required name="location"   class="user-popup-sector_select" id="user_location">
                            @foreach ($locations as $location)
                            <option selected value="{{ $location->name }}">{{ $location->name }}</option>
                            @endforeach
                        </select>

            </div>
            <div class="user-popup-sector">
                <label class="user-popup_label">Email</label>
                <input required class="user-popup_input" value="{{ old("email") }}" name="email" type="email">

               <div id="dobavit_object_select">
                <select style="margin-bottom: 20px" required name="objects[]"  class="user-popup-sector_select" >
                    @foreach ($objects as $object)
                    <option selected value="{{ $object->id }}">{{ $object->name }}</option>
                    @endforeach
                </select>
               </div>

                <div id="dobavit_podrozdelenie_select">
                    <select style="margin-bottom: 20px;margin-top: 20px" required name="subdivisions[]"  class="user-popup-sector_select subdivisions" >
                        @foreach ($subdivisions as $subdivision)
                        <option selected value="{{ $subdivision->id }}">{{ $subdivision->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=subdivision_for_user_cals>
                    <a id="dobavit_podrozdelenie" class="user-popup_btn">Добавить подразделение</a>
                    <a id="udalit_podrozdelenie">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                 <path d="M2 4H3.33333H14" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M6.6665 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M9.3335 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                    </a>
                </div>
                <select style="margin-top: 20px" required name="position"  class="user-popup-sector_select" >
                    @foreach ($positions as $position)
                    <option selected value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button class="user-popup_btn" class="user-popup_btn">сохранить</button>
    </form>

    <div class="user-slider">
       @if(!$this->searchTerm)
       {{ $users->links('pagination::default') }}
       @endif
    </div>
</div>

</div>
<div class="user-popup" id="popup_edit_user">
            <div class="user-popup_overlay" onclick="closeEditUserPopup()"></div>
            @if($this->editUser)
            <form
            id="editUserForm"
            style="
            width: 70%;
        " class="user-popup_content edit_user_popup_content" method="POST" action="{{ route("admin.edit-user") }}">
                @csrf
                @method("PATCH")
                <input type="hidden" value="{{$this->editUser->id}}" name="user_id" />
                <div class="user-popup_close-btn" id="edit_user_close_btn" onclick="closeEditUserPopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="user-popup_title">Редактировать сотрудника</h2>
                <div class="user-popup_sectors">
                    <div class="user-popup-sector">

                        <label class="user-popup_label">Фамилия</label>
                        <input class="user-popup_input" value="{{ $this->editUser->last_name ?? '' }}" name='last_name' id="user_last_name" type="text">
                        <label class="user-popup_label">Имя</label>
                        <input  class="user-popup_input" value="{{ $this->editUser->first_name ?? ''}}" name='first_name' id="user_first_name" type="text">
                        <label class="user-popup_label">Отчество</label>
                        <input  class="user-popup_input" value="{{ $this->editUser->fathers_name ?? ''}}"  name='fathers_name' id="user_fathers_name" type="text">
                        <label class="user-popup_label">Город</label>
                        {{--<input value="{{  $this->editUser->location ?? '' }}" required class="user-popup_input" id="user_location"  type="text">--}}
                        <div>
                        <select style="margin-bottom: 20px" required  name="location"   class="user-popup-sector_select" id="user_location">
                            @foreach ($locations as $location)
                            <option @if($this->editUser->location == $location->name)  selected @endif value="{{ $location->name }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                       </div>

                    </div>

                    <div class="user-popup-sector">
                        <label class="user-popup_label">Email</label>
                        <input name='email' required class="user-popup_input" value="{{ $this->editUser->email?? '' }}" id="user_email" type="email">

                       <div id="dobavit_object_select">
                       <label class="user-popup_label">Блок</label>
                        <select style="margin-bottom: 20px"  name="objects[]" class="user-popup-sector_select" id="user_object">
                             <option   @if(count($this->editUser->objects) == 0) selected @endif disabled >Выбрать блок</option>
                            @foreach($objects as $object)

                            <option
                            @if(count($this->editUser->objects) > 0)
                            @if($this->editUser->objects[0]->id == $object->id)
                             selected
                            @endif


                            @endif
                            value="{{ $object->id }}">{{ $object->name }}</option>

                             @endforeach
                        </select>

                       </div>

                        <div id="dobavit_podrozdelenie_select">
                          @foreach ($this->editUser->subdivisions as $user_subdivision)
                           <div class="user_edit_subdivisions" id="user-edit-{{$user_subdivision->id}}">
                                <div style="display:flex;align-items:center">
                                    <select style="margin-bottom: 20px;margin-top: 20px" required name="subdivisions[]"  class="user-popup-sector_select" id="user_subdivision">
                              @foreach($subdivisions as $subdivision)
                                <option @if($subdivision->id == $user_subdivision->id) selected @endif value="{{ $subdivision->id }}"> {{ $subdivision->name }}</option>
                            @endforeach
                            </select>
                            <a onclick="deleteSUbEdit({{$user_subdivision->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                 <path d="M2 4H3.33333H14" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M6.6665 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M9.3335 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            </a>
                                </div>
                           </div>
                            @endforeach
                        </div>
                        <a onclick="addSubdivisionEdit(this)" class="user-popup_btn">Добавить подразделение</a>
                        <a onclick="deleteSubdivisionEdit(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                 <path d="M2 4H3.33333H14" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M6.6665 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M9.3335 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <label style="margin-top: 20px" class="user-popup_label">Должность</label>
                        <select  required name="position"  class="user-popup-sector_select" id="user_position">
                            @foreach ($positions as $position)
                            <option id="user_position" @if($this->editUser->position_id == $position->id) selected @endif value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button
                type="submit"
                class="user-popup_btn" class="user-popup_btn">Сохранить изменения</button>
            </form>
            @endif


        </div>
<div class="user-popup literature_add_popup" id="add-user-popup">
<div class="user-popup_overlay" id="literature_add-popup_overlay"></div>
<form class="user-popup_content" method="POST" action="{{ route("admin.load-user") }}" enctype="multipart/form-data">
    @csrf
    <h2 class="user-popup_title">Добавить Сотрудника</h2>
    <div class="user-popup_sectors">
        <div class="user-popup-sector">
            <input name="file" onchange="readFile(this)" type="file" required id="literature_file">
            <button class="position-sector_download">
                <svg class="literature_file_load" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 2.99988C14.5808 2.99988 16.8548 4.66088 17.6748 7.04488C20.1138 7.37588 21.9998 9.47188 21.9998 11.9999C21.9998 13.2209 21.5558 14.3959 20.7498 15.3089C20.5518 15.5319 20.2768 15.6469 19.9998 15.6469C19.7648 15.6469 19.5288 15.5649 19.3378 15.3969C18.9248 15.0299 18.8848 14.3989 19.2508 13.9839C19.7338 13.4379 19.9998 12.7319 19.9998 11.9999C19.9998 10.3459 18.6538 8.99988 16.9998 8.99988H16.8998C16.4238 8.99988 16.0138 8.66388 15.9198 8.19688C15.5458 6.34488 13.8978 4.99988 11.9998 4.99988C10.1028 4.99988 8.45376 6.34488 8.08076 8.19688C7.98676 8.66388 7.57576 8.99988 7.09976 8.99988H6.99976C5.34576 8.99988 3.99976 10.3459 3.99976 11.9999C3.99976 12.7319 4.26576 13.4379 4.74976 13.9839C5.11476 14.3989 5.07576 15.0299 4.66176 15.3969C4.24776 15.7629 3.61576 15.7219 3.25076 15.3089C2.44376 14.3959 1.99976 13.2209 1.99976 11.9999C1.99976 9.47188 3.88576 7.37588 6.32476 7.04488C7.14576 4.66088 9.41976 2.99988 11.9998 2.99988ZM11.305 11.28C11.699 10.904 12.322 10.907 12.707 11.293L15.707 14.293C16.098 14.684 16.098 15.316 15.707 15.707C15.512 15.902 15.256 16 15 16C14.744 16 14.488 15.902 14.293 15.707L13 14.414V20C13 20.553 12.552 21 12 21C11.448 21 11 20.553 11 20V14.356L9.69496 15.616C9.29796 16.001 8.66496 15.988 8.28096 15.591C7.89696 15.193 7.90796 14.561 8.30496 14.177L11.305 11.28Z" fill="white"/>
                </svg>
                <svg class="literature_file_loaded" style="display: none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256"
                style="fill:#000000;">
                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M20.29297,5.29297l-11.29297,11.29297l-4.29297,-4.29297l-1.41406,1.41406l5.70703,5.70703l12.70703,-12.70703z"></path></g></g>
            </svg>
                <span id="add_literature_btn_text">Загрузить</span>
            </button>
        </div>
    </div>

    <button type="submit" class="user-popup_btn">Добавить</button>
</form>

</div>
<x-footer></x-footer>
</div>
<script>
       
$("#dobavit_podrozdelenie").click(function(){
          var lsthmtl = $("#dobavit_podrozdelenie_select").html();
          console.log(lsthmtl);
          $("#dobavit_podrozdelenie").before(lsthmtl);
      });
$("#udalit_podrozdelenie").click(function() {
    // Check if there are more than one elements with the id "dobavit_podrozdelenie_select"
        if ($(".subdivisions").length > 1) {
        // Remove the last one
        $(".subdivisions:last").remove();
    }
});

      $("#dobavit_object").click(function(){
          var lsthmtl = $("#dobavit_object_select").html();
          console.log(lsthmtl);
          $("#dobavit_object").before(lsthmtl);
      });
function togglePopup(){
document.getElementById("popup1").classList.toggle("active");
document.body.classList.toggle("body-lock");
}
function addSubdivisionEdit(button){
    var customSelect = '<select name="subdivisions[]"  class="user-popup-sector_select" id="user_subdivision">'

    @for($i=0;$i<count($subdivisions);$i++)
        customSelect += '<option value="{{ $subdivisions[$i]->id }}">{{ $subdivisions[$i]->name }}</option>';
    @endfor


    customSelect += '</select>';

    // Append the custom select element to the target element
    $(customSelect).insertBefore(button);
}
function deleteSubdivisionEdit(button) {
    // Get the button's parent element
    var parentElement = button.parentElement;

    // Get the index of the button's parent element
    var index = Array.from(parentElement.children).indexOf(button);

    // Ensure there is an element before the button
    if (index > 0) {
        // Get the element before the button
        var elementToDelete = parentElement.children[index - 2];

        // Check if the element has the specified class
        console.log(elementToDelete.id)
        if (elementToDelete.id != 'dobavit_podrozdelenie_select') {
            // If it doesn't have the class, remove it
            parentElement.removeChild(elementToDelete);
        }
    }
}
function closeEditUserPopup(){
    const edit_user_popup =  document.getElementById("popup_edit_user");
    edit_user_popup.classList.remove('active')
}
function deleteSUbEdit(id){
   var element = document.getElementById('user-edit-' + id);

    // Find the <select> element within the element
    var selectElement = element.querySelector('select');

    if (selectElement) {
        // Set the <select> element to be disabled
        selectElement.disabled = true;
    }

    // Hide the entire element
    element.style.display = "none";

    // Disable the entire element to exclude it from form submission
    element.disabled = true;
}
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
function addNewUser(){
document.getElementById("popup1").classList.toggle("active");
document.body.classList.toggle("body-lock");
document.addEventListener('click',(event) =>{
const user_popup = document.querySelector(".user-popup_content");
console.log(event.target);
if (!user_popup.contains(event.target) &&  document.getElementById("popup1").contains(event.target)) {
document.getElementById("popup1").classList.remove("active");
document.body.classList.remove("body-lock");

}
});
}

document.querySelector(".user-add_label").addEventListener("click", () => {
const user_add_form = document.querySelector(".user-add_form");
const show_user_subdivisions = document.getElementById("show_user_subdivisions");
if(show_user_subdivisions.value == ""){
show_user_subdivisions.value = "false"
}else{
show_user_subdivisions.value = "false"
}
setTimeout(() => {
user_add_form.submit()
}, 300);

})

const showLiteratureBtn = () => {
        const add_literature_btn = document.getElementById("add-user-button")
    const add_literature_popup = document.getElementById("add-user-popup")
    add_literature_popup.classList.add("active")
                document.body.classList.add("body-lock")
    setTimeout(() => {
        document.getElementById('literature_add-popup_overlay').addEventListener('click',(event) =>{

                add_literature_popup.classList.remove("active")

 document.body.classList.remove("body-lock")
       });
    }, 100);

    }

function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
               document.querySelector(".literature_file_load").style = "display:none";
               document.querySelector(".literature_file_loaded").style = "display:block";
               document.getElementById("add_literature_btn_text").innerHTML = "Загружен";
            };

            reader.readAsDataURL(input.files[0]);
        }
        }
</script>
<script>


    function changePassPopup(user){
        localStorage.setItem('user', user)
        document.getElementById("popup-reposts").classList.toggle("active")
    }

    function changePass(){
        window.livewire.emit("changePass",   document.getElementById("PasswordSbros").value , localStorage.getItem("user"))
        localStorage.removeItem("user")
    }

      function editUserPopup(id){
          window.scrollTo(0, 0);
        const edit_user_popup =  document.getElementById("popup_edit_user");
        const user_panel =  document.querySelector(".user_changes");

  window.livewire.emit('editUser', id)
  setTimeout(()=>{
       edit_user_popup.classList.toggle("active");
  },1000)
}
document.getElementById('user-subordinates').addEventListener("click",()=>{
    document.getElementById('showSubForm').submit()
})
</script>
</div>

