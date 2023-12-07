<div class="creating">
    @if (session('successCreated'))

        <div class="alert alert-success mt-2" role="alert">
            {{ session()->pull('successCreated') }}
        </div>
        <script>
            let error = document.querySelector('.alert-success');
            setTimeout(() => {
                error.style.display = 'none';
            }, 3000);
        </script>
    @endif
    @if (session('nameExist'))

        <div class="alert alert-danger mt-2" role="alert">
            {{ session()->pull('nameExist') }}
        </div>
        <script>
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            let error = document.querySelector('.alert-danger');
            setTimeout(() => {
                error.style.display = 'none';
            }, 5000);
        </script>
    @endif
    <div class="creating-info">
        <div class="creating-nav">
            <a href="" class="creating-nav_first">Конструктор тестов</a>
            <span>/</span>
            <a href="" class="creating-nav_last">Составить тест</a>
        </div>
        <h3 class="creating-info_title">Название теста, компетенция, количество вопросов</h3>
    </div>

    <div class="creating-content">

        <div class="create-content">
            <label class="create-content_label">Название</label>
            <input @if ($this->testName) value = "{{ $this->testName }}" @endif wire:model="testName"
                class="create-content_input" type="text">
            <select class="create-content_select" id="create-content_select">
                <option @if (!$this->competetion) selected @endif class="create-content_option">Компетенция
                </option>
                {{-- {{ dd(request()->all()) }} --}}
                @foreach ($this->competetions as $competetion)
                    <option
                        @if ($this->competetion) @if ($this->competetion->id == $competetion->id)
                   selected @endif
                        @endif
                        value="{{ $competetion->id }}" class="create-content_option">{{ $competetion->name }}</option>
                @endforeach
            </select>
            @if ($this->competetion)
                @if ($this->competetion->indicators)
                    @foreach ($this->competetion->indicators as $indicator)
                        <label @if ($this->selectedIndicator) style="color:#1367A9;font-weight:bold" @endif
                            id="indicator-label-{{ $indicator->id }}"
                            class="writing-question_types-label create-content_info">
                            @if ($indicator->test)
                                {{-- <img src="{{ asset("images/received.png") }}" alt=""> --}}
                            @endif{{ $indicator->name }}
                        </label>
                    @endforeach

                @endif
            @endif
            <button onclick="addNewTestDataAuto()" id="writing-question_btn" class="writing-question_btn">
                Сгенерировать
            </button>

        </div>
    </div>

</div>
<x-footer></x-footer>
<script>
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                window.livewire.emit("uploadFile", e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    // const TestRecomended = document.getElementById('TestRecomended');
    // TestRecomended.addEventListener("change", ()=>{
    //         window.livewire.emit("TestRecomended", TestRecomended.value)
    //     })
    const test_select = document.getElementById('create-content_select');
    test_select.addEventListener("change", () => {
        window.livewire.emit("changeCompetetion", test_select.value)
    })

    const test_input = document.getElementById('test-question');
    const variable_input_1 = document.getElementById('test-question-input-1');
    const variable_input_2 = document.getElementById('test-question-input-2');
    const variable_input_3 = document.getElementById('test-question-input-3');




    // emitSomeData(test_input,'getQuestions')

    const clearInputs = (input) => {
        return input.value = '';

    }
    const writing_questions_question = document.querySelectorAll('.writing-question_inputs');



    function addNewTestDataAuto() {
        // let true_variation;
        let data = [];
        const test_select = document.getElementById('create-content_select');
        data['competetion'] = test_select.value;
        window.livewire.emit('getVariationsAuto', data);
    }
</script>
