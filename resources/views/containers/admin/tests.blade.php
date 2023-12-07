@extends('components.head')
<link rel="stylesheet" href="{{ asset('/public/css/admin-tests.css') }}">
@section('code')
    <div class="sect">
        <x-admin-sidebar></x-admin-sidebar>
        <x-client-header></x-client-header>
<style>

    
</style>
        <section class="tests">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
                <script>
                    let error = document.querySelector('.alert-danger');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);
                </script>
            @endif

            @if (session('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session()->pull('success') }}
                </div>
                <script>
                    let error = document.querySelector('.alert-success');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);
                </script>
            @endif

            <?php 
            $testsArr = (count($handle_create) + count($auto_create));?>
            <div class="test1  {{ session('appoint-test') }}" id="test1">
                <div class="tests-sector">
                    <div class="tests-sector_content">
                        <h2>{{ ($testsArr) }}</h2>
                        <p>Тестов создано</p>
                    </div>
                    <div class="tests-sector_content">
                        <h2>{{ ($testsArr) }}</h2>
                        <p>Тестов <br> опубликовано</p>
                    </div>
                    <div class="tests-sector_content">
                        <h2>{{ ($testsArr)}}</h2>{{--count($tests_last_month) --}}
                        <p>Тестирований <br> за {{ \Carbon\Carbon::now()->translatedFormat('F') }}</p>
                    </div>
                    <div class="tests-sector_content">
                        <h2>{{ ($testsArr) }}</h2>
                        <p>Тестирований <br> за все время</p>
                    </div>

                </div>

                <div class="tests-section">
                    <button onclick="tests()">Компетенции
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.47488 18.5172C8.88026 18.8479 9.4775 18.8243 9.8559 18.4463L15.6979 12.604C15.8937 12.4081 15.9997 12.1461 15.9997 11.8744C15.9997 11.6025 15.8939 11.341 15.6979 11.1444L9.85578 5.3023C9.45223 4.89923 8.79902 4.89923 8.39653 5.3023C7.99284 5.70551 7.99284 6.35889 8.39641 6.76188L13.5085 11.8744L8.39653 16.9867C8.01809 17.3647 7.99442 17.9626 8.32553 18.368L8.39649 18.4464L8.47488 18.5172Z"
                                fill="#343A40" />
                        </svg>
                    </button>
                    <button onclick="grafik()">Прохождение тестирований
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.47488 18.5172C8.88026 18.8479 9.4775 18.8243 9.8559 18.4463L15.6979 12.604C15.8937 12.4081 15.9997 12.1461 15.9997 11.8744C15.9997 11.6025 15.8939 11.341 15.6979 11.1444L9.85578 5.3023C9.45223 4.89923 8.79902 4.89923 8.39653 5.3023C7.99284 5.70551 7.99284 6.35889 8.39641 6.76188L13.5085 11.8744L8.39653 16.9867C8.01809 17.3647 7.99442 17.9626 8.32553 18.368L8.39649 18.4464L8.47488 18.5172Z"
                                fill="#343A40" />
                        </svg>
                    </button>
                </div>

                <div class="tests-content">
                    <div>
                             @if(request('created_type') !="auto_create")
                        <div class="tests-content_sector">

                        @if (!isset($_GET['created_type']))
                                <div id="tests-all-apoint">
                                    <h2>Компетенция - ручная сборка</h2>
                                    <div class="tests-content_sector-data">
                                        <p>Название</p>
                                        <p>Дата изменений</p>
                                    </div>

                                    <form>
                                        @csrf
                                        <div class="tests-content_sector-info">
                                        @foreach ($handle_create as $key => $competetion)
                                        
                                            <div class="tests-content_sector-info_section">
                                                <div class="test_list_item">
                                                    <input type="checkbox" name="checkCompetetionsHandle" id=""
                                                        value="{{ $competetion->id }}" style="margin :0 10px">
                                                    <p>{{ $competetion->name }}</p>
                                                </div>
                                                <p>{{ $competetion->updated_at->format('H:i:s d-m-Y ') }}</p>
                                                {{--  <a class="tests-content_sector-info_section_a"
                                                    href="/admin/tests?created_type=handle_create?competetions_for_publishing={{ $competetion->id }}">Назначить
                                                    тест</a>
                                                <button onclick="window.location.href='/admin/tests?test={{ $m->id }}'">назначить тест</button> --}}
                                            </div>
                                            
                                        @endforeach
                                        </div>
                                        <div class="tests-content_sector-info_section_a_div">
                                            <a class="tests-content_sector-info_section_a"
                                                onclick="getCheckedBoxes('checkCompetetionsHandle', 'handle_create')">Назначить
                                                тесты</a>
                                        </div>
                                    </form>
                                </div>
                            @endif

                            @if (
                                $competetion_for_publishing &&
                                    isset($_GET['created_type']) &&
                                    $_GET['created_type'] == 'handle_create' &&
                                    isset($_GET['competetions_for_publishing']))
                                @livewire('admin.naznachit-test', ['competetion' => $_GET['competetions_for_publishing'], 'created_type' => 'handle_create'])
                            @endif
                            {{-- Competetion --}}
                        </div>
                        @endif

 @if(request('created_type') !="handle_create")
                        <div class="tests-content_sector">

                            @if (!isset($_GET['created_type']))
                                <div id="tests-all-apoint">
                                    <h2>Компетенция - автоматическая генерация</h2>
                                    <div class="tests-content_sector-data">
                                        <p>Название</p>
                                        <p>Дата изменений</p>
                                    </div>

                                    <form>
                                        @csrf
                                        <div class="tests-content_sector-info">
                                        @foreach ($auto_create as $key => $competetion)
                                        
                                            <div class="tests-content_sector-info_section">
                                                <div class="test_list_item">
                                                    <input type="checkbox" name="checkCompetetionsAuto" id=""
                                                        value="{{ $competetion->id }}" style="margin :0 10px">
                                                    <p>{{ $competetion->name }}</p>
                                                </div>
                                                <p>{{ $competetion->updated_at->format('H:i:s d-m-Y ') }}</p>
                                                {{-- <a class="tests-content_sector-info_section_a"
                                                    href="/admin/tests?created_type=auto_create?competetions_for_publishing={{ $competetion->id }}">Назначить
                                                    тест</a>
                                                 <button onclick="window.location.href='/admin/tests?test={{ $m->id }}'">назначить тест</button> --}}
                                            </div>
                                            
                                        @endforeach
                                        </div>
                                        <div class="tests-content_sector-info_section_a_div">
                                            <a class="tests-content_sector-info_section_a"
                                                onclick="getCheckedBoxes('checkCompetetionsAuto', 'auto_create')">Назначить
                                                тесты</a>
                                        </div>
                                    </form>
                                </div>
                            @endif

                            @if (
                                $competetion_for_publishing &&
                                    isset($_GET['created_type']) &&
                                    $_GET['created_type'] == 'auto_create' &&
                                    isset($_GET['competetions_for_publishing']))
                                @livewire('admin.naznachit-test', ['competetion' => $_GET['competetions_for_publishing'], 'created_type' => 'auto_create'])
                            @endif

                        </div>
@endif

                    </div>
                    <div class="tests-content_sector">
                        <div class="tests_graphik_filter">
                            <h3>Прохождение тестирований</h3>
                            <form action="{{ route('admin.tests') }}" method="GET" class="tests_graphik_filter_filters">
                                @csrf
                                <div class="position-sector_select test-graphic-select">
                                    <label for="select" class="position-sector_select-label">Компетенции: </label>
                                    <select name="competetions" class="position-sector_select-sel" style="width:40px">
                                        <option value="all">Все</option>
                                        @php
                                        $competetionsArr = [];
                                        foreach($competetions as $competetion){
                                        if(!in_array($competetion,$competetionsArr)){
                                            $competetionsArr[] = $competetion;
                                        }
                                        }
                                        @endphp
                                        @foreach ($competetionsArr as $competetion)
                                            <option @if (Request::get('competetions') == $competetion->id) selected @endif
                                                value="{{ $competetion->id }}">{{ $competetion->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="position-sector_select test-graphic-select">
                                    <label for="select" class="position-sector_select-label">Период: </label>
                                    <select name="day" class="position-sector_select-sel" style="width:66px;">
                                        <option value="today">Сегодня</option>
                                        <option @if (Request::get('day') == 'month') selected @endif value="month">В этом
                                            месяце</option>
                                    </select>
                                </div>
                                <button type="submit">применить фильтр</button>
                            </form>

                        </div>
<?php 
$users_competetions = App\Models\UserCompetetion::all();
$usersArr = App\Models\User::all();
                            $usersCometetionsDoneArr = [];
                             $usersCometetionsNotStartedArr = [];
                             $usersCometetionsInWorkArr = [];
                            foreach($usersArr as $key => $item) {
                                foreach($users_competetions as $users_competetion) {
                                    if($users_competetion->is_done == 1) {
                                        if(!in_array($item,$usersCometetionsDoneArr)){
                                           $usersCometetionsDoneArr[] = $item;
                                        }
                                    }
                                    if($users_competetion->progress == 0) {
                                        if(!in_array($item,$usersCometetionsNotStartedArr)){
                                           $usersCometetionsNotStartedArr[$key] = $item;
                                        }
                                    }
                                    if($users_competetion->progress > 0 && $users_competetion->is_done == 0) {
                                        if(!in_array($item,$usersCometetionsInWorkArr)){
                                           $usersCometetionsInWorkArr[$key] = $item;
                                        }
                                    }
                                    
                                }
                                
                            }
                            ?>
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
                        <div class="tests_graphik">
                            <div class="tests_graphik_content">
                                <div class="tests_graphik_started">
                                    <div class="tests_graphik_started_num">
                                        <span>{{ count($didntstart) }}</span>
                                    </div>
                                    <div class="tests_graphik_started_progress"
                                        style="height:{{ count($didntstart) * 2 }}%; @if (count($didntstart) <= 30) background:#B6D5EE;
                                @elseif(count($didntstart) <= 65)
                                background:#4A99D6; @endif">
                                    </div>
                                    <div class="tests_graphik_started_name">
                                        <span>не приступили</span>
                                    </div>
                                </div>
                                <div class="tests_graphik_joined">
                                    <div class="tests_graphik_started_num">
                                        <span>{{ count($isdoing) }}</span>
                                    </div>
                                    <div class="tests_graphik_started_progress"
                                        style="height:{{ count($isdoing) * 2 }}%; @if (count($isdoing) <= 30) background:#B6D5EE;
                              @elseif(count($didntstart) <= 65)
                              background:#4A99D6; @endif">
                                    </div>
                                    <div class="tests_graphik_started_name">
                                        <span>в работе</span>
                                    </div>
                                </div>
                                <div class="tests_graphik_ended">
                                    <div class="tests_graphik_started_num">
                                        <span>{{ count($done) }}</span>
                                    </div>
                                    <div class="tests_graphik_started_progress"
                                        style="height:{{ count($done) * 2 }}%; @if (count($done) <= 30) background:#B6D5EE;
                              @elseif(count($didntstart) <= 65)
                              background:#4A99D6; @endif">
                                    </div>
                                    <div class="tests_graphik_started_name">
                                        <span>завершили</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="test2
  {{ session()->pull('appoint-test') }}" id="test2">

                <!--<div class="tests-up tests_back">-->
                <!--    <a href='{{ route('admin.tests') }}' style="color: #000"><svg xmlns="http://www.w3.org/2000/svg"-->
                <!--            width="24" height="24" viewBox="0 0 24 24" fill="none">-->
                <!--            <path d="M19 12H5" stroke="#343A40" stroke-width="2" stroke-linecap="round"-->
                <!--                stroke-linejoin="round" />-->
                <!--            <path d="M12 19L5 12L12 5" stroke="#343A40" stroke-width="2" stroke-linecap="round"-->
                <!--                stroke-linejoin="round" />-->
                <!--        </svg>-->
                <!--        Тесты-->
                <!--    </a>-->
                <!--</div>-->
                @if(request('created_type') !="auto_create")
                <div class="tests-content_sector">

                            @if (!isset($_GET['created_type']))
                                <div id="tests-all-apoint">
                                    <h2>Компетенция - ручная сборка</h2>
                                   

                                    <form>
                                        
                                        @csrf
                                        <div class="tests-content_sector-info">
                                        @foreach ($handle_create as $key => $competetion)
                                        
                                            <div class="tests-content_sector-info_section">
                                                <div class="test_list_item">
                                                    <input type="checkbox" name="checkCompetetionsHandle" id=""
                                                        value="{{ $competetion->id }}" style="margin :0 10px">
                                                    <p>{{ $competetion->name }}</p>
                                                </div>
                                                <p>{{ $competetion->updated_at->format('H:i:s d-m-Y ') }}</p>
                                                {{--  <a class="tests-content_sector-info_section_a"
                                                    href="/admin/tests?created_type=handle_create?competetions_for_publishing={{ $competetion->id }}">Назначить
                                                    тест</a>
                                                <button onclick="window.location.href='/admin/tests?test={{ $m->id }}'">назначить тест</button> --}}
                                            </div>
                                            
                                        @endforeach
                                        </div>
                                        <div class="tests-content_sector-info_section_a_div">
                                            <a class="tests-content_sector-info_section_a"
                                                onclick="getCheckedBoxes('checkCompetetionsHandle', 'handle_create')">Назначить
                                                тесты</a>
                                        </div>
                                    </form>
                                </div>
                            @endif

                            @if (
                                $competetion_for_publishing &&
                                    isset($_GET['created_type']) &&
                                    $_GET['created_type'] == 'handle_create' &&
                                    isset($_GET['competetions_for_publishing']))
                                @livewire('admin.naznachit-test', ['competetion' => $_GET['competetions_for_publishing'], 'created_type' => 'handle_create'])
                            @endif
                            {{-- Competetion --}}
                        </div>
                @endif
   @if(request('created_type') !="handle_create")
                        <div class="tests-content_sector">

                            @if (!isset($_GET['created_type']))
                                <div id="tests-all-apoint">
                                    <h2>Компетенция - автоматическая генерация</h2>
                                    

                                    <form>
                                        @csrf
                                         <div class="tests-content_sector-info">
                                        @foreach ($auto_create as $key => $competetion)
                                       
                                            <div class="tests-content_sector-info_section">
                                                <div class="test_list_item">
                                                    <input type="checkbox" name="checkCompetetionsAuto" id=""
                                                        value="{{ $competetion->id }}" style="margin :0 10px">
                                                    <p>{{ $competetion->name }}</p>
                                                </div>
                                                <p>{{ $competetion->updated_at->format('H:i:s d-m-Y ') }}</p>
                                                {{-- <a class="tests-content_sector-info_section_a"
                                                    href="/admin/tests?created_type=auto_create?competetions_for_publishing={{ $competetion->id }}">Назначить
                                                    тест</a>
                                                 <button onclick="window.location.href='/admin/tests?test={{ $m->id }}'">назначить тест</button> --}}
                                            </div>
                                           
                                        @endforeach
                                         </div>
                                        <div class="tests-content_sector-info_section_a_div">
                                            <a class="tests-content_sector-info_section_a"
                                                onclick="getCheckedBoxes('checkCompetetionsAuto', 'auto_create')">Назначить
                                                тесты</a>
                                        </div>
                                    </form>
                                </div>
                            @endif

                            @if (
                                $competetion_for_publishing &&
                                    isset($_GET['created_type']) &&
                                    $_GET['created_type'] == 'auto_create' &&
                                    isset($_GET['competetions_for_publishing']))
                                @livewire('admin.naznachit-test', ['competetion' => $_GET['competetions_for_publishing'], 'created_type' => 'auto_create'])
                            @endif

                        </div>
 @endif
            </div>
            <div class="test3" id="test3">
                <div class="tests-up">
                    <button onclick="grafik()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path d="M19 12H5" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 19L5 12L12 5" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Прохождение тестирований
                    </button>
                </div>
                <div class="tests-content_sector" style="height:600px;">
                    <div class="tests_graphik_filter">
                        <h3>Прохождние тестирований</h3>
                        <div class="tests_graphik_filter_filters">

                            <div class="position-sector_select test-graphic-select">
                                <label for="select" class="position-sector_select-label">Компетенции: </label>
                                <select class="position-sector_select-sel">
                                    <option value="">Все</option>
                                </select>
                            </div>

                            <div class="position-sector_select test-graphic-select">
                                <label for="select" class="position-sector_select-label">Период: </label>
                                <select class="position-sector_select-sel">
                                    <option value="">Сегодня</option>
                                </select>
                            </div>
                            <button style="">применить фильтр</button>
                        </div>
                    </div>
                    <div class="tests_graphik">
                        <div class="tests_graphik_content">
                            <div class="tests_graphik_started">
                                <div class="tests_graphik_started_num">
                                    <span>{{ count($test_not_doing) }}</span>
                                </div>
                                <div class="tests_graphik_started_progress"
                                    style="height:{{ count($test_not_doing) * 2 }}%; @if (count($test_not_doing) <= 30) background:#B6D5EE;
          @elseif(count($test_not_doing) <= 65)
          background:#4A99D6; @endif">
                                </div>
                                <div class="tests_graphik_started_name">
                                    <span>не приступили</span>
                                </div>
                            </div>
                            <div class="tests_graphik_joined">
                                <div class="tests_graphik_started_num">
                                    <span>{{ count($test_doing) }}</span>
                                </div>
                                <div class="tests_graphik_started_progress"
                                    style="height:{{ count($test_doing) * 2 }}%; @if (count($test_doing) <= 30) background:#B6D5EE;
        @elseif(count($test_not_doing) <= 65)
        background:#4A99D6; @endif">
                                </div>
                                <div class="tests_graphik_started_name">
                                    <span>в работе</span>
                                </div>
                            </div>
                            <div class="tests_graphik_ended">
                                <div class="tests_graphik_started_num">
                                    <span>{{ count($test_ended) }}</span>
                                </div>
                                <div class="tests_graphik_started_progress"
                                    style="height:{{ count($test_ended) * 2 }}%; @if (count($test_ended) <= 30) background:#B6D5EE;
        @elseif(count($test_not_doing) <= 65)
        background:#4A99D6; @endif">
                                </div>
                                <div class="tests_graphik_started_name">
                                    <span>завершили</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </div>


    </div>
    </div>
    <x-footer></x-footer>
    <script></script>
    <script>
        function getCheckedBoxes(chkboxName, createdType) {
            var checkboxes = document.getElementsByName(chkboxName);
            var checkboxesChecked = [];
            // loop over them all
            for (var i = 0; i < checkboxes.length; i++) {
                // And stick the checked ones onto an array...
                if (checkboxes[i].checked) {

                    checkboxesChecked.push(checkboxes[i].value);
                }
            }
            if (checkboxesChecked.length > 0) {
                localStorage.setItem('checkboxesChecked', checkboxesChecked)
                window.location.href = '/admin/tests?created_type=' + createdType + '&competetions_for_publishing=' +
                    checkboxesChecked

            } else {
                alert("Вы не выбрали тесты для назначения")
            }
            // Return the array if it is non-empty, or null
            readCheckBoxesValue(checkboxesChecked);
            return checkboxesChecked.length > 0 ? checkboxesChecked : null;
        }

        function readCheckBoxesValue(checkboxesChecked) {
            checkboxesChecked.forEach(element => {
                console.log(element)
            });

        };

        // Call as
        if (window.location.href.indexOf("?competetions_for_publishing") != -1) {
            document.getElementById('tests-all-apoint').style = "display:none";
            document.getElementById('tests-all-apoint-2').style = "display:none";
            // document.getElementById('get_test').style="display:block";
        }

        function hideTestPopup() {
            document.getElementById("popup2").classList.remove("active");
            document.body.classList.remove("body-lock");

        }

        function tests() {
            document.getElementById("test1").classList.add("active");
            document.getElementById("test2").classList.add("active");
        }

        function grafik() {
            document.getElementById("test1").classList.toggle("active");
            document.getElementById("test3").classList.toggle("active");

        }
        const test_page_chart = document.getElementById('tets-chart');
        new Chart(test_page_chart, {
            type: 'bar',
            data: {
                labels: ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'],
                datasets: [{
                    label: '# of Votes',
                    data: [5, 2, 30, 50, 100, 5, 900],
                    borderWidth: 4,
                    label: 'Прогресс обучения',
                    borderColor: '#104772',
                    backgroundColor: '#104772',
                    fill: true,
                    fill: {
                        target: "origin", // Set the fill options
                    }
                }, ]
            },

            options: {
                // maintainAspectRatio: false,
                tension: 0.3,

                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: (value, index, values) => {
                                return `${value}`
                            }
                        }
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

        /************* Test Page Chart *************/
    </script>
@endsection
