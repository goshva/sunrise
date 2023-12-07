<div>
    
<div class="creating">
   
   
    <div class="creating-info">  
        <div class="creating-nav">
            <a href="" class="creating-nav_first">Конструктор тестов</a>
            <span>/</span>
            <a href="" class="creating-nav_last">Составить тест</a>
        </div>
        <div class="creating-sector">
            <h1 class="creating-sector_title">Продолжение теста</h1>
            <a wire:click.prevent="saveAndQuit" href="" class="creating-sector_btn">сохранить и выйти</a>
        </div>
    </div>

    <div class="creating-content">
        <div class="create-content">
            <label class="create-content_label">Название</label>
            <input @if ($this->testName)
                value = "{{ $this->testName }}"
            @endif wire:model="testName" class="create-content_input" type="text">
            <select disabled class="create-content_select" name="" id="competetion_level_test">  
                <option disabled @if (!$this->selectedLevel)
                    selected
                @endif >Уровень</option>
                <option @if ($this->selectedLevel == 1) selected  @endif value="1">Осведомленность</option>
                <option @if ($this->selectedLevel == 2) selected  @endif value="2">Знание </option>
                <option @if ($this->selectedLevel == 3) selected  @endif value="3">Опыт</option>
                <option @if ($this->selectedLevel == 4) selected  @endif value="4">Мастерство</option>
                <option @if ($this->selectedLevel == 5) selected  @endif value="5">Эксперт</option>
            </select>
            <h4>{{$this->competetion->name}}</h4>
                 @if ($this->competetion)
                    @if($this->competetion->competetion->indicators)
                 @foreach ($this->competetion->competetion->indicators->where("level", $this->selectedLevel) as $indicator)
                 <label @if ($this->selectedIndicator)
                         @if ($this->selectedIndicator->id == $indicator->id)
                     style="color:#1367A9;font-weight:bold"
                 @endif @endif id="indicator-label-{{  $indicator->id }}"  class="writing-question_types-label create-content_info">@if ($indicator->test)
                    {{-- <img src="{{ asset("images/received.png") }}" alt=""> --}}
                 @endif{{ $indicator->name }}</label>
                    
                 @endforeach

                 @endif
                 @endif
        </div> 
        <div class="writing-content" id="test-writing-content">
            <p class="writing-content_question">Вопрос {{ $this->progressPage }}/5</p>
            <div class="writing-bar">
                <span class="writing-per" id="writing-per" style="width: {{ $this->barProgress }}%">
                </span>
            </div>
            <div class="writing-question_types">
                <p class="writing-question_types-title">Выберите тип вопроса:</p>
                <form class="writing-question_types-form" >
                    <label wire:click.prevent="changeTypeText" for="number" class="writing-question_types-label"><input class="writing-question_type" type="radio" id="number" @if ($this->questionType == "text")  checked @endif  name="radio"> Текст</label>
                    <label wire:click.prevent="changeTypeAudio" for="number2" class="writing-question_types-label"><input class="writing-question_type" type="radio" @if ($this->questionType == "audio")  checked @endif  id="number2" name="radio"> Аудио</label>
                    <label  wire:click.prevent="changeTypeImage" for="number3" class="writing-question_types-label"><input class="writing-question_type" type="radio" @if ($this->questionType == "image")  checked @endif  id="number3" name="radio"> Изображение</label>
                    <label wire:click.prevent="changeTypeVideo" for="number4" class="writing-question_types-label"><input class="writing-question_type" type="radio" @if ($this->questionType == "video")  checked @endif  id="number4" name="radio"> Видео</label>
                </form>
                                      
                @if($this->editQuestion)
                    @if($this->editQuestion->type !== "text")
                    <div class=" admin_test_edit_file">

                        @if ($this->editQuestion->type === "audio")
                        <audio controls  width="300" height="200" src="{{ $this->editQuestion->file->file }}"></audio>
                        @elseif ($this->editQuestion->type === "video")
                        <video controls  width="300" height="200" src="{{ $this->editQuestion->file->file }}"></video>
                        @elseif ($this->editQuestion->type === "image")
                    <img src="{{ $this->editQuestion->file->file }}" alt="">
                    @endif
                    </div>
                    @endif
                    
                @endif
                  <div class="loader-container">
                                            <div class="loader"></div>
                                        </div>
                @if($this->questionType == "video")
                <div class="admin_test_creating_file">
                    <input   onchange="readFile(this)"  type="file" name="" id="load_file">
                                                             
                    @if($this->questionFile)
                    <video controls autoplay width="300" height="200" src="{{ $this->questionFile }}"></video>
                    @endif
                </div>

                @elseif ($this->questionType == "image")
                <div class="admin_test_creating_file">
                    <input   onchange="readFile(this)"  type="file" name="" id="load_file">
                    @if($this->questionFile)
                   <img src="{{ $this->questionFile }}" alt="">
                   @endif
                </div>
                @elseif ($this->questionType == "audio")
                <div class="admin_test_creating_file">
                    <input  onchange="readFile(this)" type="file" />
                    @if($this->questionFile)
                    <audio controls autoplay width="300" height="200" src="{{ $this->questionFile }}"></audio>
                     @endif
                </div>
                @endif

            </div>
            <div class="writing-question">
                <div id="warning_message" class="alert alert-warning" style="display: none;">Заполните все поля для продолжения</div>

                <h2 class="writing-question_title">Введите вопрос</h2>
                <label class="writing-question_label"  >Вопрос</label>
                @if ($this->goBackPage>= 0 && $this->editQuestion)
               
                <input required value="{{ $this->question }}" id="update-test-question" type="text"  class="writing-question_input" >
                <script>
            let update_test_question = document.getElementById("update-test-question")
            update_test_question.addEventListener("change",()=>{
                localStorage.setItem("updated_question",update_test_question.value);
            })
                </script>
                @else
                <input required wire:model="question" type="text" id="test-question" class="writing-question_input" >
                @endif
            </div>

            <div class="writing-question">
                <h2 class="writing-question_title">Введите варианты ответов и укажите верный ответ</h2>
                <div class="test-questions">
                    <div class="writing_questions_question">
                        <label class="writing-question_label" id="test-question-1">Вариант ответа 1</label>
                            <div class="writing-question_inputs">
                            
                            <input type="text" @if ($this->variations_change != [])
                            value="{{ $this->variations_change[0][0]['variation']  }}"
                                                    @if ($this->variations_change[0][0]['is_true'] == 1)
                        style="background:#DAE8F1"
                    @endif @endif  id="test-question-input-1" class="writing-question_input" >
                            <input class="test-question-radio" type="radio" id="test-question-radio-1" name="radio">
                        </div>
                    </div>
                    <div class="writing_questions_question">
                        <label class="writing-question_label" id="test-question-1">Вариант ответа 2</label>
                            <div class="writing-question_inputs">
                            <input required type="text" @if ($this->variations_change != [])
                                value="{{ $this->variations_change[0][1]['variation']  }}"
                            @if ($this->variations_change[0][1]['is_true'] == 1)
                            style="background:#DAE8F1"
                        @endif @endif id="test-question-input-2" class="writing-question_input" >
                            <input class="test-question-radio" type="radio" id="test-question-radio-2" name="radio">
                        </div>
                    </div>
                    <div class="writing_questions_question">
                        <label class="writing-question_label" id="test-question-1">Вариант ответа 3</label>
                            <div class="writing-question_inputs">
                            <input required type="text" @if ($this->variations_change != [])
                            value="{{ $this->variations_change[0][2]['variation']  }}"
                        @if ($this->variations_change[0][2]['is_true'] == 1)
                        style="background:#DAE8F1"
                    @endif @endif id="test-question-input-3" class="writing-question_input" >
                            <input required class="test-question-radio"  type="radio" id="test-question-radio-3" name="radio">
                        </div>
                    </div>
                    <input type="hidden" name="" id="checked_true_test_answer">
                </div>
<div class="test-buttons-prevnext">

        <button  @if ($this->progressPage == 1)
            disabled style="cursor:not-allowed;"
        @endif  wire:click.prevent="goBack" id="" class="writing-question_btn">
             Назад
        </button>
        @if ($this->goBackPage >= 0 && $this->editQuestion)
        <button  id="updateData" class="writing-question_btn">
             Сохрaнить
            </button>
            <script>
            const test_question_radios = document.querySelectorAll(".test-question-radio");
            let true_variation_change;
            test_question_radios.forEach((e)=>{
                e.addEventListener('click',()=>{
                    writing_questions_question.forEach((inputs)=>{
        Array.prototype.forEach.call(inputs.children, child => {

       if(child.checked == true){
        true_variation_change = child.id.slice(-1)
       }
});
    })
                })
            })
            const updateData = document.getElementById('updateData');

                updateData.addEventListener("click", ()=>{
        window.livewire.emit('updateQuestion', localStorage.getItem("updated_question"), [variable_input_1.value,variable_input_2.value, variable_input_3.value], true_variation_change)
                    localStorage.removeItem('updated_question')
                })</script>
        @else
            @if ($this->endTest)
            <button onclick="addNewTestData()" id="writing-question_btn" class="writing-question_btn">
             Завершить
            </button>
            @else
            <button  onclick="addNewTestData()" id="writing-question_btn" class="writing-question_btn">
                Сохранить
            @endif
            </button>
        @endif

</div>
            </div>
        </div>
    </div>
    
</div>
<x-footer></x-footer>
<script>
        function readFile(input) {
    
    const loaderContainer = document.querySelector(".loader-container");
    const fileInput = input;

        // Show the loading animation
        loaderContainer.style.display = "block";

        // Disable the file input during loading
        fileInput.disabled = true;

        // Simulate file loading with a setTimeout (replace this with your actual file loading logic)
        setTimeout(function () {
            // Hide the loading animation once loading is complete
            loaderContainer.style.display = "none";
            
            // Re-enable the file input
            fileInput.disabled = false;
            
            // Clear the selected file (optional)
            fileInput.value = "";
        }, 3000); // Simulated loading time (3 seconds)
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            window.livewire.emit("uploadFile",e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}


const test_input = document.getElementById('test-question');
const variable_input_1 = document.getElementById('test-question-input-1');
const variable_input_2 = document.getElementById('test-question-input-2');
const variable_input_3 = document.getElementById('test-question-input-3');

const clearInputs = (input)=>{
    return input.value = '';
}
const writing_questions_question = document.querySelectorAll('.writing-question_inputs');
const next_question_btn = document.querySelector('#writing-question_btn');
next_question_btn.addEventListener("click", ()=>{

})
const addNewTestData = ()=>{
    let true_variation;
    writing_questions_question.forEach((inputs)=>{
        Array.prototype.forEach.call(inputs.children, child => {
       if(child.checked == true){
        true_variation = child.id.slice(-1)
       }
});
    })
     input_progress = document.getElementById('writing-per')
     if(variable_input_1.value && variable_input_2.value && variable_input_3.value && test_input.value){
          window.livewire.emit('getVariations', [variable_input_1.value,variable_input_2.value, variable_input_3.value], true_variation)
     }else{
             document.getElementById('warning_message').style.display = 'block';

     }
   
    clearInputs(variable_input_1);
    clearInputs(variable_input_2);
    clearInputs(variable_input_3);
    clearInputs(test_input);

}


</script>
</div>