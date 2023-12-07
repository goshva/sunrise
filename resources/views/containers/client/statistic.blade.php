@extends('components.head')
@section('code')
    <style>
        .newrepost-content_section-up p {
            font-size: 11px;
        }

        .user_graphic_hrs {
            display: none;
            transform: rotate(90deg);
            position: absolute;
            right: -150px;
            z-index: 5;
        }

        .user_graphic_hrs.active {
            display: block;
        }

        @media (max-width:2000px) {
            #user_graphic_hrs_first {
                transform: rotate(90deg);
                position: absolute;
                right: -190px;
                z-index: 5;
            }

            #user_graphic_hrs_second {
                transform: rotate(90deg);
                position: absolute;
                right: -175px;
                z-index: 5;
            }

            #user_graphic_hrs_third {
                transform: rotate(90deg);
                position: absolute;
                right: -175px;
                z-index: 5;
            }
        }
    </style>
    <div class="sect">
        <x-client-side-bar></x-client-side-bar>
        <x-client-header></x-client-header>
        <div class="status">
            <p class="status-subtitle">Статистика</p>
            <h1 class="status-title">Итоговая оценка по обучению</h1>
            <?php
            $competetion_status = [];
            foreach ($user_competetions as $key => $value) {
                if ($value->progress == count($value->competetion->tests)) {
                    $competetion_status[] = $value;
                }
            }
            ?>
            @if (count($competetion_status) !== 0)
                <h4 class="status-bar_text">Завершено
                    {{ floor((count($competetion_status) * 100) / count($user_competetions)) }}%</h4>
                <div class="status-bar">
                    <span class="status-per"
                        style="width: {{ floor((count($competetion_status) * 100) / count($user_competetions)) }}%">
                    </span>
                </div>
            @endif

            <div class="status-content">
                <div>
                    @foreach ($competetion_status as $competetion)
                        <div class="newrepost-content_section newrepost-content_section-{{ $user->id }}"
                            style="display:block" id="section{{ $competetion->id }}">
                            <div class="newrepost-content_section-up">
                                <p>Компетенции</p>
                                <div style="position: relative;display:flex">
                                    <p>Уровень осведомленности</p>
                                    <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}"
                                        id="user_graphic_hrs_first">
                                </div>
                                <div style="position: relative;display:flex">
                                    <p>Уровень знания</p>
                                    <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}"
                                        id="user_graphic_hrs_second">
                                </div>
                                <div style="position: relative;display:flex">
                                    <p>Уровень опыта</p>
                                    <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}"
                                        id="user_graphic_hrs_third">
                                </div>
                                <div style="position: relative;display:flex">
                                    <p>Уровень мастерства</p>
                                    <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}">
                                </div>
                                <div style="position: relative;display:flex">
                                    <p>Экспертный уровень</p>

                                </div>
                            </div>
                            <div class="newrepost-content_section-last">
                                <p>{{ $competetion->competetion->name }}</p>

                                <div class="newrepost-content_section-last_sector">

                                    <div style="margin-left:@if ($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 1) 9%  @elseif($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 2)29% @elseif($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 3)50% @elseif($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 4)61% @elseif($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 5)90% @endif;position: absolute;top: -15px;
                    width: 4px; z-index:6;"
                                        class="recomendation_div">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            fill="#104772" height="20px" width="20px" version="1.1" id="Layer_1"
                                            viewBox="0 0 512 512" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M379.537,141.607l76.016-102.958c2.287-3.096,2.634-7.217,0.9-10.653c-1.734-3.436-5.256-5.603-9.105-5.603H117.991    C113.699,9.403,101.452,0,87.043,0C69.072,0,54.452,14.621,54.452,32.591v446.819c0,17.97,14.621,32.591,32.592,32.591    s32.592-14.621,32.592-32.591V264.672h327.714c3.818,0,7.315-2.132,9.065-5.525c1.75-3.392,1.458-7.478-0.756-10.589    L379.537,141.607z M99.236,479.409h-0.001c0,6.723-5.47,12.192-12.193,12.192c-6.723,0-12.193-5.469-12.193-12.192V32.591    c0.001-6.723,5.471-12.192,12.194-12.192s12.193,5.469,12.193,12.192V479.409z M119.634,244.274V42.79h307.505l-68.404,92.65    c-2.619,3.548-2.662,8.379-0.105,11.972l68.94,96.863H119.634z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M258.035,210.686H145.058c-5.633,0-10.199,4.567-10.199,10.199c0,5.632,4.566,10.199,10.199,10.199h112.978    c5.633,0,10.199-4.567,10.199-10.199C268.235,215.253,263.668,210.686,258.035,210.686z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M296.711,210.686h-5.089c-5.633,0-10.199,4.567-10.199,10.199c0,5.632,4.566,10.199,10.199,10.199h5.089    c5.633,0,10.199-4.567,10.199-10.199C306.911,215.253,302.344,210.686,296.711,210.686z" />
                                                </g>
                                            </g>
                                        </svg>

                                        <div class="recomendation_div_content">
                                            <p>Рекомендованный уровень освоения компетенции/индикатора</p>
                                        </div>
                                    </div>
                                    @if (
                                        $competetion->performance >
                                            $competetion->competetion->levels->where('position_id', $user->position_id)->first()->level * 20)
                                        <svg style="position: absolute;top: -15px; left:{{ $competetion->performance - 2 }}%;"
                                            xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            viewBox="0 0 19 19" fill="none">
                                            <path
                                                d="M8.54894 0.927052C8.8483 0.00574112 10.1517 0.00573993 10.4511 0.927051L11.9697 5.60081C12.1035 6.01284 12.4875 6.2918 12.9207 6.2918H17.835C18.8037 6.2918 19.2065 7.53141 18.4228 8.10081L14.447 10.9894C14.0966 11.244 13.9499 11.6954 14.0838 12.1074L15.6024 16.7812C15.9017 17.7025 14.8472 18.4686 14.0635 17.8992L10.0878 15.0106C9.7373 14.756 9.2627 14.756 8.91221 15.0106L4.93648 17.8992C4.15276 18.4686 3.09828 17.7025 3.39763 16.7812L4.91623 12.1074C5.05011 11.6954 4.90345 11.244 4.55296 10.9894L0.577221 8.10081C-0.206493 7.53141 0.196283 6.2918 1.16501 6.2918H6.07929C6.51252 6.2918 6.89647 6.01284 7.03035 5.60081L8.54894 0.927052Z"
                                                fill="#FFC971" />
                                        </svg>
                                    @endif
                                    <div class="newrepost-content_section-last_sector-bar" style="width: 100%">

                                        <span class="newrepost-content_section-last_sector-per"
                                            @if ($competetion->performance <= 40) style="background: #33897C; width:{{ $competetion->performance }}%" 
                            @elseif($competetion->performance <= 70) 
                          style="background: #3F92B4; width:{{ $competetion->performance }}%" 
                          @else style="background: #70C493; width:{{ $competetion->performance }}%" @endif>
                                        </span>

                                    </div>

                                </div>

                                <button onclick="openStats({{ $competetion->id }})">
                                    <svg class="secondIcon1 secondIcon-{{ $competetion->id }}"id="secondIcon{{ $competetion->id }}"
                                        xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M19.0172 8.38113C19.3479 8.78651 19.3243 9.38375 18.9463 9.76215L13.104 15.6041C12.9081 15.8 12.6461 15.906 12.3744 15.906C12.1025 15.906 11.841 15.8002 11.6444 15.6041L5.8023 9.76203C5.39923 9.35848 5.39923 8.70527 5.8023 8.30278C6.20551 7.89909 6.85889 7.89909 7.26188 8.30266L12.3744 13.4147L17.4867 8.30278C17.8647 7.92434 18.4626 7.90067 18.868 8.23178L18.9464 8.30274L19.0172 8.38113Z"
                                            fill="#CFD1D8" />
                                    </svg>
                                </button>
                            </div>
                            <hr>
                            <div class="second1 section-{{ $competetion->id }}" id="second{{ $competetion->id }}">






                                @foreach ($user->tests->where('competetion_id', $competetion->competetion->id) as $test)
                                    <div class="newrepost-content_section-second">
                                        <p>{{ $test->test->indicator->name }}</p>

                                        <div class="newrepost-content_section-last_sector" style="position: relative">
                                            {{-- {{ dump($competetion->levels\\) }} --}}
                                            <div style="margin-left:@if ($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 1) 9%  @elseif($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 2)29% @elseif($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 3)50% @elseif($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 4)61% @elseif($competetion->competetion->levels->where('position_id', $user->position_id)->first()->level == 5)90% @endif;position: absolute;top: -15px;
                    width: 4px; z-index:6;"
                                                class="recomendation_div">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" fill="#104772" height="20px"
                                                    width="20px" version="1.1" id="Layer_1" viewBox="0 0 512 512"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M379.537,141.607l76.016-102.958c2.287-3.096,2.634-7.217,0.9-10.653c-1.734-3.436-5.256-5.603-9.105-5.603H117.991    C113.699,9.403,101.452,0,87.043,0C69.072,0,54.452,14.621,54.452,32.591v446.819c0,17.97,14.621,32.591,32.592,32.591    s32.592-14.621,32.592-32.591V264.672h327.714c3.818,0,7.315-2.132,9.065-5.525c1.75-3.392,1.458-7.478-0.756-10.589    L379.537,141.607z M99.236,479.409h-0.001c0,6.723-5.47,12.192-12.193,12.192c-6.723,0-12.193-5.469-12.193-12.192V32.591    c0.001-6.723,5.471-12.192,12.194-12.192s12.193,5.469,12.193,12.192V479.409z M119.634,244.274V42.79h307.505l-68.404,92.65    c-2.619,3.548-2.662,8.379-0.105,11.972l68.94,96.863H119.634z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M258.035,210.686H145.058c-5.633,0-10.199,4.567-10.199,10.199c0,5.632,4.566,10.199,10.199,10.199h112.978    c5.633,0,10.199-4.567,10.199-10.199C268.235,215.253,263.668,210.686,258.035,210.686z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M296.711,210.686h-5.089c-5.633,0-10.199,4.567-10.199,10.199c0,5.632,4.566,10.199,10.199,10.199h5.089    c5.633,0,10.199-4.567,10.199-10.199C306.911,215.253,302.344,210.686,296.711,210.686z" />
                                                        </g>
                                                    </g>
                                                </svg>


                                                <div class="recomendation_div_content">
                                                    <p>Рекомендованный уровень освоения компетенции/индикатора</p>
                                                </div>
                                            </div>
                                            @if ($test->points > $competetion->competetion->levels->where('position_id', $user->position_id)->first()->level + 2)
                                                <svg style="position: absolute;top: -15px; left:{{ $test->performance - 2 }}%;"
                                                    xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                    viewBox="0 0 19 19" fill="none">
                                                    <path
                                                        d="M8.54894 0.927052C8.8483 0.00574112 10.1517 0.00573993 10.4511 0.927051L11.9697 5.60081C12.1035 6.01284 12.4875 6.2918 12.9207 6.2918H17.835C18.8037 6.2918 19.2065 7.53141 18.4228 8.10081L14.447 10.9894C14.0966 11.244 13.9499 11.6954 14.0838 12.1074L15.6024 16.7812C15.9017 17.7025 14.8472 18.4686 14.0635 17.8992L10.0878 15.0106C9.7373 14.756 9.2627 14.756 8.91221 15.0106L4.93648 17.8992C4.15276 18.4686 3.09828 17.7025 3.39763 16.7812L4.91623 12.1074C5.05011 11.6954 4.90345 11.244 4.55296 10.9894L0.577221 8.10081C-0.206493 7.53141 0.196283 6.2918 1.16501 6.2918H6.07929C6.51252 6.2918 6.89647 6.01284 7.03035 5.60081L8.54894 0.927052Z"
                                                        fill="#FFC971" />
                                                </svg>
                                            @endif
                                            <div class="newrepost-content_section-last_sector-bar">
                                                <span class="newrepost-content_section-last_sector-per"
                                                    @if ($test->performance <= 40) style="background: #33897C; width:{{ $test->performance }}%" 
                       @elseif($test->performance <= 70) 
                     style="background: #3F92B4; width:{{ $test->performance }}%" 
                     @else style="background: #70C493; width:{{ $test->performance }}%" @endif>
                                                </span>


                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach


                            </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <script>
        function openStats(id) {

            setTimeout(() => {
                console.log(document.getElementById("second" + id).parentElement.parentElement.offsetHeight + "  " +
                    id);
                const user_graphic_hrs = document.querySelectorAll(".user_graphic_hrs" + id);
                user_graphic_hrs.forEach(e => {
                    e.classList.toggle("active");
                    e.width = (document.getElementById("second" + id).parentElement.parentElement
                        .offsetHeight - 30)
                    e.style = document.getElementById("second" + id).parentElement.parentElement
                        .offsetHeight > 350 ?
                        `top: ${(document.getElementById("second"+id).parentElement.parentElement.offsetHeight ) - 280 }px;right:-270px` :
                        `top:${(document.getElementById("second"+id).parentElement.parentElement.offsetHeight )-230 }`
                })
            }, 100);

            document.getElementById("second" + id).classList.toggle("active");
            document.getElementById("secondIcon" + id).classList.toggle("active");
        }
    </script>
@endsection
