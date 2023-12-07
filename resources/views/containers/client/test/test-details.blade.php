@extends('components.head')
@section('code')
    <div class="sect">
        <x-client-side-bar></x-client-side-bar>
        <x-client-header></x-client-header>


        <div class="test-details_main">
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
            @if (session('Warning'))
                <div class="alert alert-warning mt-2" role="alert">
                    {{ session()->pull('Warning') }}
                </div>
                <script>
                    let error = document.querySelector('.alert-warning');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);
                </script>
            @endif
            <div class="test-details_main-nav">
                <a class="test-details_main-nav_first"href="{{ route('client.tests') }}">Тестирование</a>
                <span>/</span>
                <a class="test-details_main-nav_last" href="">{{ $competetion->name }}</a>

                <h1 class="test-details_main-nav_title">{{ $competetion->name }}</h1>
            </div>
            <div class="test-details_main-content">
                <div class="test-details_main-content_card-grid">
                    @foreach ($user_tests as $user_test)
                        <div class="test-details_main-content_card">
                            <div class="test-details_main-content_card-up">
                                <div class="test-details_main-content_card-flex">
                                    <p>Индикатор</p>
                                    <h3>{{ $user_test->test->indicator->name }}</h3>
                                </div>
                                @if ($user_test->test_id === $user_test->test->id)
                                    <div class="col-md-3 col-sm-6">
                                        <div
                                            class="progress @if ( $user_test->completed >= 4) green @elseif ( $user_test->completed >= 2) @elseif ( $user_test->completed == 0) grey @else pink @endif">
                                            <span class="progress-left">
                                                <span id="indicator-{{ $user_test->test->indicator->id }}"
                                                    class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span id="indicator-{{ $user_test->test->indicator->id }}-right"
                                                    class="progress-bar"></span>
                                            </span>

                                            <div class="progress-value">{{ $user_test->completed }}/5</div>
                                            <style>
                                                .progress .progress-right #indicator-{{ $user_test->test->indicator->id }}-right {
                                                    left: -100%;
                                                    border-top-left-radius: 40px;
                                                    border-bottom-left-radius: 40px;
                                                    border-right: 0;
                                                    -webkit-transform-origin: center right;
                                                    transform-origin: center right;

                                                    @if ($user_test->completed > 3)
                                                        transform: rotate(180deg);
                                                    @else
                                                        transform: rotate({{ $user_test->completed * 36 }}deg);
                                                    @endif
                                                }

                                                #indicator-{{ $user_test->test->indicator->id }} {
                                                    @if ($user_test->completed > 3)
                                                        @if ($user_test->completed == 5)
                                                            transform: rotate({{ $user_test->completed * 36 }}deg);

                                                        @else
                                                            transform: rotate({{ $user_test->completed * 10 }}deg);

                                                        @endif
                                                    @else
                                                        transform: rotate(0deg);
                                                    @endif
                                                }
                                            </style>


                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="test-details_main-content_card-down">
                                <div class="test-details_main-content_card-down-info">
                                    @if ($user_test->test->indicator->test)
                                        @if ($user_test->test_id === $user_test->test->indicator->test->id)
                                            <span>{{ $user_test->completed }}/5</span>
                                            <p> вопросов решено</p>
                                        @endif
                                    @else
                                        <span>0/5</span>
                                        <p> вопросов решено</p>
                                    @endif
                                </div>
                                <div class="test-details_main-content_card-down-reting">

                                </div>
                            </div>
                            @if ($user_test->test)
                                @if ($user_test->test_id === $user_test->test->id)
                                    @if ($user_test->completed === 5)
                                        <a href="/test-results/{{ $user_test->test->id }}"
                                            class="test-details_main-content_card-btn" style="padding: 10px 60px">Посмотреть
                                            результат</a>
                                    @else
                                        <a href="/test/{{ $user_test->test->id }}"
                                            class="test-details_main-content_card-btn" style="padding: 10px 60px">Продолжить
                                            тестирование</a>
                                    @endif
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
@endsection
