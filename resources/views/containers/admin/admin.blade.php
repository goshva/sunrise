@extends('components.head')
<link rel="stylesheet" href="{{ asset('/public/css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('/public/css/users.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        text {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
    </style>
@section('code')

    <style>
        .h100 {
            height: 100%;
        }
        .border_yellow {
            height: 80px;
            width: 4px;
            background: #ffcb7f;
        }
        .height-auto {
            height: auto;
        }

        .progress {
            width: 50px;
            height: 50px;
            line-height: 50px;
            background: none;
            margin: 0 auto;
            box-shadow: none;
            position: relative;
        }
.progress:after{
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 5px solid #f2f5f5;
        position: absolute;
        top: 0;
        left: 0;
    }
        $users_competetions->where('is_done', 0)->where('competetion_id', $competetion->id)) .progress:after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid #f2f5f5;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 5px;
            border-style: solid;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 40px;
            border-bottom-left-radius: 40px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
            animation: loading-1 1.8s linear forwards;
        }

        .progress .progress-value {
            width: 100%;
            height: 100%;
            font-size: 11px;
            color: #000;
            text-align: center;
            position: absolute;
        }

        .progress.blue .progress-bar {
            border-color: #70C493;
        }

        .progress.blue .progress-left .progress-bar {
            animation: loading-2 1.5s linear forwards 1.8s;
        }

        .progress.yellow .progress-bar {
            border-color: #F6A938;
        }

        .progress.yellow .progress-left .progress-bar {
            animation: loading-3 1s linear forwards 1.8s;
        }

        .progress.pink .progress-bar {
            border-color: #FC6262;
        }

        .progress.pink .progress-left .progress-bar {
            animation: loading-4 0.4s linear forwards 1.8s;
        }

        .progress.green .progress-bar {
            border-color: #70C493;
        }

        .progress.green .progress-left .progress-bar {
            animation: loading-5 1.2s linear forwards 1.8s;

        }
    </style>
    <div class="sect admin_main_page">
        <x-admin-sidebar></x-admin-sidebar>
        <x-client-header></x-client-header>
        <div class="admin_dashboard">
            <div class="admin_dashboard_content">
                <div class="admin_dashboard_up">
                    <div class="admin_dashboard_up_content">
                        <div class="admin_dashboard_up_item all">
                            <div class="admin_dashboard_up_item_border"></div>
                            <?php
                                $count_users=[];
                                $didntstart = [];
                                $isdoing = [];
                                $done = [];
                                foreach($users_competetions as $user_competetion){
                                    if(!in_array($user_competetion->user, $count_users)){
                                        $count_users[] = $user_competetion->user;
                                    }
                                }
                                foreach($users as $user){
                                    if( count($user->competetions->where("is_done", 1)) == count($user->competetions) && count($user->competetions) != 0){
                                        if(!in_array($user,$done)){
                                            $done[] = $user;
                                        }
                                    }elseif(count($user->competetions->where("is_done", 1)) < count($user->competetions) && count($user->competetions->where("is_done", 1)) != 0){
                                           if(!in_array($user,$isdoing)){
                                            $isdoing[] = $user;
                                        }
                                    }elseif(count($user->competetions->where("is_done", 1)) < count($user->competetions) && count($user->competetions->where("is_done", 1)) == 0){
                                           if(!in_array($user,$didntstart)){
                                            $didntstart[] = $user;
                                    }
                               }
                                }
                            ?>
                            <div class="admin_dashboard_up_item_content">
                            <span class="span_user">{{count($count_users)}}</span>
                            <p>Всего учеников</p>
                            <div class="all_students_icon">
                                </div>

                            </div>
                        </div>
                        <div class="admin_dashboard_up_item not_started">
                             <div class="admin_dashboard_up_item_border"></div>
                             <div class="admin_dashboard_up_item_content">
                            <span class="span_user">{{count($didntstart)}}</span>
                            <p>Не приступили</p><div class="not_started_students_icon"></div>
                             </div>
                        </div>
                        <div class="admin_dashboard_up_item ended">
                            <div class="admin_dashboard_up_item_border"></div>
                            <div class="admin_dashboard_up_item_content">
                            <span class="span_user">{{count($done)}}</span>
                            <p>Завершили</p><div class="ended_students_icon"></div>
                            </div>
                        </div>
                        <div class="admin_dashboard_up_item in_work">
                            <div class="admin_dashboard_up_item_border"></div>
                            <div class="admin_dashboard_up_item_content">
                            <span class="span_user">{{count($isdoing)}}</span>
                            <p>В работе</p><div class="in_work_students_icon"></div>
                        </div>
                        </div>
                        <!--<div class="border_yellow"></div>-->
                    </div>
                    <script>
              $(document).ready(function() {
  $('.span_user').each(function() {
    const $span = $(this);
    const targetCount = parseInt($span.text(), 10);
    $({ countNum: 0 }).animate(
      { countNum: targetCount },
      {
        duration: 2000, // Duration in milliseconds
        easing: 'linear',
        step: function() {
          $span.text(Math.floor(this.countNum));
        },
        complete: function() {
          $span.text(this.countNum);
        }
      }
    );
  });
});


                    </script>
                </div>
                <div class="dashboard_content_middle height-auto">
                    <div>
                        <div style="margin-bottom: 30px">
                            <div class="dashboard_content_middle_left_filters">
                                {{-- {{ print_r($month) }} --}}
                                {{--<form action="{{ route('admin.dashboard') }}" method="GET"
                                    class="tests_graphik_filter_filters"
                                    style="
                                @csrf
                                    <div class="position-sector_select
                                    test-graphic-select">
                                    <label for="select" class="position-sector_select-label">Город: </label>
                                    <select id="filterByLocation" name="location" class="position-sector_select-sel"
                                        style="width:90px">

                                        <option selected value="all">Все</option>
                                        @foreach ($locations as $location)
                                            @if (request()->get('location'))
                                                @if ($location == request()->get('location'))
                                                    <option value="{{ request()->get('location') }}" selected>
                                                        {{ request()->get('location') }}</option>
                                                @else
                                                    <option value="{{ $location }}">{{ $location }}</option>
                                                @endif
                                            @else
                                                <option value="{{ $location }}">{{ $location }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>

                            <div class="position-sector_select test-graphic-select">
                                <label for="select" class="position-sector_select-label">От: </label>
                                <input
                                    @if (request()->get('filterByDateFrom')) value="{{ request()->get('filterByDateFrom') }}" @endif
                                    type="date" name="filterByDateFrom" id="filterByDateFrom">
                            </div>
                            <div class="position-sector_select test-graphic-select">
                                <label for="select" class="position-sector_select-label">До: </label>
                                <input
                                    @if (request()->get('filterByDateTo')) value="{{ request()->get('filterByDateTo') }}" @endif
                                    type="date" name="filterByDateTo" id="filterByDateTo">
                            </div>
                            <button
                                style="padding: 9px;
                                        background: #104772;
                                        border-radius: 10px;
                                        color: #fff;
                                        font-size: 10px;"
                                type="submit">применить фильтр</button>

                            </form>--}}
                        </div>
                        <div>
                             <div class="histogramm">

                                 <div class="histogram_columns">

                                <?php
                                $all_complexes = App\Models\Complex::all();

                                $users_objects = App\Models\UserObject::all();
                                $users_with_competetion = [];
                               $UserCompetetionArr = App\Models\UserCompetetion::all();//->where('user_id', $user_id)->get();
                                ?>

                    @foreach($all_complexes as $complex)

                           @php
                           $users = \App\Models\User::all();
                           $UserCompetetionHighCount =[];
                           $UserCompetetionMediumCount =[];
                           $UserCompetetionNormalCount =[];
                           $UserCompetetionLowCount =[];
                           $testCount = 0;

                            $count_competetion_points = 0;
                            $testArr = [];
                             $competetion_level = 0;
                                    foreach($complex->competetions as $competetion){

                                        foreach($competetion->positions as $position){

                                            foreach($position->users as $user){
                                                 foreach($user->competetions as $user_competetion){

                                if($user_competetion->competetion->complex_id == $complex->id){
                                             $competetionLevel = \App\Models\CompetetionLevel::where('competetion_id',  $user_competetion->competetion->id)->where('position_id', $user->position->id)->first();
                                                if($user_competetion->is_done == 1){

                                                $user_tests = \App\Models\UserTests::where("user_id",$user->id)->where('competetion_id',$user_competetion->competetion->id)->get();
                                                foreach($user_tests as $test){
                                                $competetionIndicator = $test->test->indicator;
                                                $competetionLevelTest = \App\Models\CompetetionLevel::where('competetion_id',  $user_competetion->competetion->id)->where('position_id', $user->position->id)->first();

                                                if($competetionLevelTest){
                                                    if($test->test->indicator->level == $competetionLevelTest->level){
                                                    $testArr[] = $test->test;
                                                }
                                                }
                                            }
                                            foreach($testArr as $test){
                                                 $test = \App\Models\UserTests::where("test_id",$test->id)->where("user_id",$user->id)->first();
                                                 if($test){
                                                    $count_competetion_points += $test->points;
                                                 }
                                            }
                                                if(count($testArr) == 2){

                                    if($count_competetion_points >= 1.5 && $count_competetion_points <= 3){
                                        $competetion_level = 2;
                                    }elseif($count_competetion_points >= 3.5 && $count_competetion_points <= 6){
                                        $competetion_level = 3;
                                    }elseif($count_competetion_points >= 6.5 && $count_competetion_points <= 10){
                                        $competetion_level = 4;
                                    }elseif($count_competetion_points >= 10.5 && $count_competetion_points <= 15){
                                        $competetion_level = 5;
                                    }
                                }elseif(count($testArr) == 3){
                                    if($count_competetion_points >= 1.6 && $count_competetion_points <= 4.5){
                                        $competetion_level = 2;
                                    }elseif($count_competetion_points >= 4.6 && $count_competetion_points <= 9){
                                        $competetion_level = 3;
                                    }elseif($count_competetion_points >= 9.5 && $count_competetion_points <= 15){
                                        $competetion_level = 4;
                                    }elseif($count_competetion_points >= 15.1 && $count_competetion_points <= 22.5){
                                        $competetion_level = 5;
                                    }
                                }elseif(count($testArr) == 4){
                                    if($count_competetion_points >= 3 && $count_competetion_points <= 6){
                                        $competetion_level = 2;
                                    }elseif($count_competetion_points >= 7 && $count_competetion_points <= 12){
                                        $competetion_level = 3;
                                    }elseif($count_competetion_points >= 12.1 && $count_competetion_points <= 20){
                                        $competetion_level = 4;
                                    }elseif($count_competetion_points >= 20.1 && $count_competetion_points <= 30){
                                        $competetion_level = 5;
                                    }
                                }elseif(count($testArr) == 5){
                                    if($count_competetion_points >= 2.6 && $count_competetion_points <= 7.5){
                                        $competetion_level = 2;
                                    }elseif($count_competetion_points >= 7.6 && $count_competetion_points <= 17.5){
                                        $competetion_level = 3;
                                    }elseif($count_competetion_points >= 17.6 && $count_competetion_points <= 25){
                                        $competetion_level = 4;
                                    }elseif($count_competetion_points >= 25.1 && $count_competetion_points <= 37.5){
                                        $competetion_level = 5;
                                    }

                                    }
                                     if( $competetion_level < $competetionLevel->level && $competetion_level < 2 && $competetion_level != 0){
                                         if(!in_array($user->id,$UserCompetetionLowCount ) && !in_array($user->id,$UserCompetetionMediumCount ) && !in_array($user->id,$UserCompetetionHighCount ) && !in_array($user->id,$UserCompetetionNormalCount )) {
                                                $UserCompetetionLowCount[] = $user->id;
                                            }
                                     }elseif($competetion_level < $competetionLevel->level && $competetion_level >= 2){
                                     if(!in_array($user->id,$UserCompetetionLowCount ) && !in_array($user->id,$UserCompetetionMediumCount ) && !in_array($user->id,$UserCompetetionHighCount ) && !in_array($user->id,$UserCompetetionNormalCount )) {
                                                $UserCompetetionNormalCount[] = $user->id;
                                            }
                                     }elseif($competetion_level == $competetionLevel->level){
                                             if(!in_array($user->id,$UserCompetetionLowCount ) && !in_array($user->id,$UserCompetetionNormalCount ) && !in_array($user->id,$UserCompetetionHighCount ) && !in_array($user->id,$UserCompetetionMediumCount )) {
                                                    $UserCompetetionMediumCount[] = $user->id;
                                                }
                                     }elseif($competetion_level > $competetionLevel->level){
                                        if(!in_array($user->id,$UserCompetetionLowCount ) && !in_array($user->id,$UserCompetetionMediumCount ) && !in_array($user->id,$UserCompetetionHighCount ) && !in_array($user->id,$UserCompetetionNormalCount )) {
                                                    $UserCompetetionHighCount[] = $user->id;
                                                }
                                     }

                                                }


                                                /***** COMPETETION LEVELS ********/

                             }

                                            }
                                        }

                                     }
                                    }

                           @endphp


                    <!--   <div class="histogramm_column_item">-->
                                 <!--     <div class="count_all">{{count($UserCompetetionHighCount)+count($UserCompetetionMediumCount)+count($UserCompetetionNormalCount)+count($UserCompetetionLowCount)}} чел.</div>-->

                                 <!--     <div class="histogramm_row high" style="height: 25%;">{{count($UserCompetetionHighCount)}}</div>-->

                                 <!--   <div class="histogramm_row medium -->

                                 <!--   " style="height: 25%;">{{count($UserCompetetionMediumCount)}} </div>-->

                                 <!--   <div class="histogramm_row normal-->
                                 <!--   " style="height: 25%;">{{count($UserCompetetionNormalCount)}}</div>-->

                                 <!--   <div class="histogramm_row low-->
                                 <!--   " style="height: 25%;">{{count($UserCompetetionLowCount)}}</div>-->


                                 <!--</div>-->
                                 <!--<p>{{$complex->name}}</p>-->
                                 <!--</div>-->
                                 <div class="div">
                                                   <div class="div-5">{{$complex->name}}</div>

  <div class="div-2">
    <div class="div-3">

      <div class="column">
        <div class="div-4">

           <canvas id="myDoughnutChart{{$complex->id}}" width="100" height="100" style="width:120px;height:120px;!important"></canvas>
        </div>
      </div>
      <div class="column-2">
        <div class="div-6">
          <div class="div-7">
            <div class="high_results_dot"></div>
            <div class="div-8">Получили высокие результаты</div>
          </div>
          <div class="div-9">
            <div class="normal_results_dot"></div>

            <div class="div-10">
              Получили соответствующие результаты
            </div>
          </div>
          <div class="div-11">
            <div class="low_results_dot"></div>
            <div class="div-12">Получили низкие результаты</div>
          </div>
          <div class="div-13">
            <div class="bad_results_dot"></div>
            <div class="div-14">Не соответствуют компетенции</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    <script>
document.addEventListener("DOMContentLoaded", function() {

//   const ctx = document.getElementById('myDoughnutChart').getContext('2d');

  let originalColors = ['#70C493', '#B4B5B4', '#F6A938' , '#FC6262'];
  let greyColors = ['#F3F3F4', 'grey', 'grey', 'grey'];

  let data = [{{count($UserCompetetionHighCount)}}, {{count($UserCompetetionMediumCount)}}, {{count($UserCompetetionNormalCount)}}, {{count($UserCompetetionLowCount)}}];  // Your original data

  const sum = data.reduce((a, b) => a + b, 0);

  let tooltipTitle = "Пользователи";

  if (sum === 0) {
    data = [100];
    originalColors = greyColors;
    tooltipTitle = "Пользователи";
  }

  const chartData = {
    labels: ['#70C493', '#B4B5B4', '#F6A938' , '#FC6262'],
    datasets: [{
      data: data,
      backgroundColor: originalColors,
      borderRadius: 80,
    }]
  };

  const options = {
    responsive: true,
    plugins: {
      legend: {
        display: false
      },
      
      tooltip: {
          enabled: sum !== 0, 
        callbacks: {
          title: function() {
            return tooltipTitle;
          }
        }
      }
    },
    animation: {
          duration: 2000,
    easing: 'easeOutBounce',
    animateRotate: true,
    animateScale: true,
      onComplete: function() {
        const ctx = this.ctx;
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';

        if (sum === 0) {
          ctx.font = '18px Inter';
          ctx.fillStyle = 'grey'; // Font color for center if sum is zero
          ctx.fillText('0', this.width / 2, this.height / 2);
          ctx.font = '14px Inter';
          ctx.fillText('чел.', this.width / 2, this.height / 2 + 20);
        } else {
          const dataset = this.data.datasets[0];
          const meta = this.getDatasetMeta(0);
          ctx.fillStyle = '#fff';
          ctx.font = '14px Inter';
          meta.data.forEach((element, index) => {
            const position = element.getCenterPoint();
            const dataValue = dataset.data[index];
            ctx.fillText(dataValue, position.x, position.y);
          });

          ctx.font = '18px Inter';
          ctx.fillStyle = '#000';
          ctx.fillText(sum, this.width / 2, this.height / 2);
          ctx.font = '14px Inter';
          ctx.fillText('чел.', this.width / 2, this.height / 2 + 20);
        }
      }
    },

  };

  new Chart(document.getElementById('myDoughnutChart'+{{$complex->id}}), {
    type: 'doughnut',
    data: chartData,
    options: options
  });
});


    </script>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="admin_dashboard_competetions_section">
            <div class="admin_dashboard_competetion">
                <div class="admin_dashboard_competetion_content">
                    <div class="dashboard_accordion">
                        <span>Компетенции</span>
                        <img class="dashboard_accordion_icon" src="/images/icon/chevron/down.png" alt="">
                    </div>
                    <div class="dashboard_accordion_panel" style="display: block">
                        <div class="dashboard_accordion_panel_header">
                            <div class="dashboard_accordion_panel_header_left">
                                <h5>Компетенция</h5>
                            </div>
                            <div class="dashboard_accordion_panel_header_right">
                                <h5>Сотрудники</h5>
                                <span>завершили | не завершили</span>
                            </div>
                        </div>
                        <div class="dashboard_accordion_panel_info">
                            @foreach ($competetions as $competetion)
                                <div class="dashboard_accordion_panel_info_item">
                                    <div class="dashboard_accordion_panel_info_item_competetion">
                                        <p>{{ $competetion->name }}</p>
                                    </div>
                                    <div class="dashboard_accordion_panel_info_item_users">
                                        <div class="user_copmetetion_count">
                                            @php
                                            $acc_done = [];
                                            $acc_not_done = [];
                                            foreach($users_competetions as $user_competetion){
                                                if($user_competetion->competetion->id == $competetion->id){

                                                if($user_competetion->is_done == 1){
                                                    if(!in_array($user_competetion->user,$acc_done)){
                                                    $acc_done[] = $user_competetion->user;
                                                }
                                                }else{
                                                 if(!in_array($user_competetion->user,$acc_done)){
                                                    $acc_not_done[] = $user_competetion->user;
                                                }
                                                }
                                                }
                                                }
                                            @endphp

                                            <span>{{ count($acc_done) }}</span>

                                                <div class="user_copmetetion_count_div"
                                                    style="
                                    @if (count($acc_done) < count($acc_not_done))
                                    background:#FC6262;
                                    @elseif(count($acc_done) == count($acc_not_done) && count($acc_done) != 0)
                                        background: #fdc426
                                    @elseif(count($acc_done) == count($acc_not_done) && count($acc_done) == 0)
                                        background:#fdc426;
                                    @else
                                    background: #70C493 @endif
                                    ">
                                                </div>

                                            <span>{{count($acc_not_done) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @livewire('admin.users-pagination')
    </div>

    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        var acc = document.querySelector(".dashboard_accordion");
        let dashboard_accordion_icon = document.querySelector(".dashboard_accordion_icon")
        acc.addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                dashboard_accordion_icon.src = "/images/icon/chevron/down.png"
                panel.style.display = "none";
            } else {
                dashboard_accordion_icon.src = "/images/icon/chevron/up.png"
                panel.style.display = "block";
            }
        });
    </script>
    <x-footer></x-footer>
@endsection
