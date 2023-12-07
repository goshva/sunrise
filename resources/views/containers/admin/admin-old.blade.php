@extends('components.head')
<link rel="stylesheet" href="{{ asset('/public/css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('/public/css/users.css') }}">
@section('code')
    <style>
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
            border-color: green;
        }

        .progress.blue .progress-left .progress-bar {
            animation: loading-2 1.5s linear forwards 1.8s;
        }

        .progress.yellow .progress-bar {
            border-color: #fdc426;
        }

        .progress.yellow .progress-left .progress-bar {
            animation: loading-3 1s linear forwards 1.8s;
        }

        .progress.pink .progress-bar {
            border-color: #f83754;
        }

        .progress.pink .progress-left .progress-bar {
            animation: loading-4 0.4s linear forwards 1.8s;
        }

        .progress.green .progress-bar {
            border-color: green;
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
                            <span>{{ count($users_competetions) }}</span>
                            <p>Всего учеников</p><div class="all_students_icon"></div>
                        </div>
                        <div class="admin_dashboard_up_item not_started">
                            <span>{{ count($users_competetions->where('progress', '=', 0)) }}</span>
                            <p>Не приступили</p><div class="not_started_students_icon"></div>
                        </div>
                        <div class="admin_dashboard_up_item ended">
                            <span>{{ count($users_competetions->where('progress', '=', 5)) }}</span>
                            <p>Завершили</p><div class="ended_students_icon"></div>
                        </div>
                        <div class="admin_dashboard_up_item in_work">
                            <span>{{ count($users_competetions->where('progress', '<', 5)->where('progress', '>', 0)) }}</span>
                            <p>В работе</p><div class="in_work_students_icon"></div>
                        </div>
                    </div>
                </div>
                <div class="dashboard_content_middle">
                    <div>
                        <div style="margin-bottom: 30px">
                            <div class="dashboard_content_middle_left_filters">
                                {{-- {{ print_r($month) }} --}}
                                <form action="{{ route('admin.dashboard') }}" method="GET"
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

                            </form>
                        </div>
                        <div class="dashboard_content_middle_left">

                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
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
                        <img class="dashboard_accordion_icon" src="/public/images/icon/chevron/down.png" alt="">
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
                                            <span>{{ count($users_competetions->where('is_done', 1)->where('competetion_id', $competetion->id)) }}</span>
                                            @if (count($users_competetions->where('is_done', 1)->where('competetion_id', $competetion->id)) > 1)
                                                <div class="user_copmetetion_count_div"
                                                    style="
                                    @if (count($users_competetions->where('is_done', 1)->where('competetion_id', $competetion->id)) <
                                            count($users_competetions->where('is_done', 0)->where('competetion_id', $competetion->id))) background:#f83754;
                                    @elseif(count($users_competetions->where('is_done', 1)->where('competetion_id', $competetion->id)) ==
                                            count($users_competetions->where('is_done', 0)->where('competetion_id', $competetion->id)) &&
                                            count($users_competetions->where('is_done', 1)->where('competetion_id', $competetion->id)) != 0)
                                        background: #fdc426
                                    @elseif(count($users_competetions->where('is_done', 1)->where('competetion_id', $competetion->id)) ==
                                            count($users_competetions->where('is_done', 0)->where('competetion_id', $competetion->id)) &&
                                            count($users_competetions->where('is_done', 1)->where('competetion_id', $competetion->id)) == 0)
                                        background:#f83754;
                                    @else
                                    background: green @endif
                                    ">
                                                </div>
                                            @else
                                                <div class="user_copmetetion_count_div" style="background:#f83754;"></div>
                                            @endif
                                            <span>{{ count($users_competetions->where('is_done', 0)->where('competetion_id', $competetion->id)) }}</span>
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
        const ctx = document.getElementById('myChart');
        const pluginadmin = {
            id: 'customCanvasBackgroundColor',
            beforeDraw: (chart, args, options) => {
                const {
                    ctx
                } = chart;
                ctx.save();
                ctx.globalCompositeOperation = 'destination-over';
                ctx.fillStyle = options.color || '#99ffff';
                ctx.fillRect(0, 0, chart.width, chart.height);
                ctx.restore();
            }
        };
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: JSON.parse('{!! json_encode($month) !!}'),

                datasets: [{
                    label: '# of Votes',
                    data: {{ json_encode($monthCount) }},
                    borderWidth: 4,
                    label: 'Прогресс обучения',
                    borderColor: '#104772',
                    backgroundColor: '#104772',
                    fill: true,
                    fill: {
                        target: "origin", // Set the fill options
                        above: "#DAE8F1"
                    }
                }, ]
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
            plugins: [pluginadmin],
        });

        function filterGraphick() {

        }
    </script>
    <script>
        var acc = document.querySelector(".dashboard_accordion");
        let dashboard_accordion_icon = document.querySelector(".dashboard_accordion_icon")
        acc.addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                dashboard_accordion_icon.src = "/public/images/icon/chevron/down.png"
                panel.style.display = "none";
            } else {
                dashboard_accordion_icon.src = "/public/images/icon/chevron/up.png"
                panel.style.display = "block";
            }
        });
    </script>
    <x-footer></x-footer>
@endsection
