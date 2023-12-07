<div>
    <div class="test">
        <div class="test-nav">
            <div class="test-nav_blok">
                <h1 class="test-nav_title">Тестовое задание</h1>
                <a href="" wire:click.prevent="saveAndQuit" class="test-nav_blok-btn">Сохранить и выйти</a>
            </div>
    
            <p>Тема</p>
            <h3>{{$this->test->competetion->name}}</h3>
        </div>
        <div class="test-content">
            <div class="test-content_count">Вопрос {{ $this->progressPage }}/5</div>
    
            <div class="test-content_bar">
                <span class="test-content_per" style="width:{{ $this->progressBar }}%">
                </span>
            </div>
            @if (!$this->autoTest)
              @if ($this->test->questions[$this->testQuestion]->type !== 'text' && $this->test->questions[$this->testQuestion]->type !== '')
                <div class="test-file-client">
                    <div class="test-file-content">
                        @if ($this->test->questions[$this->testQuestion]->type == 'image')
                            <img src="{{ $this->test->questions[$this->testQuestion]->file->file }}" alt="">
                        @elseif ($this->test->questions[$this->testQuestion]->type == 'video')
                            <video controls width="300" height="200"
                                src="{{ $this->test->questions[$this->testQuestion]->file->file }}"></video>
                        @elseif ($this->test->questions[$this->testQuestion]->type == 'audio')
                            <audio controls width="300" height="200"
                                src="{{ $this->test->questions[$this->testQuestion]->file->file }}"></audio>
                        @endif
                    </div>
                </div>
                @endif
                <div class="test-content_question">
                    <h2>{{ $this->test->questions[$this->testQuestion]->question }}</h2>
                    @foreach ($this->test->questions[$this->testQuestion]->variations as $variation)
                        <div class="test-content_answer">
                            <div class="test_input_container">
                                <input required class="test_client_radio" type="radio" id="{{ $variation->id }}"
                                    name="radio">
                            </div>
                            <div class="test_text_container">
                                <label for="{{ $variation->id }}">{{ $variation->variation }}</label>
                            </div>
                        </div>
                    @endforeach
        
                    <div class="test_bottom">
                        <a onclick="checkAnswer()" class="test-content_btn">продолжить</a>
                    </div>
                </div>
            @else
                @if ($this->autoTestQuestion->type !== 'text' && $this->autoTestQuestion->type != '')
                    @if ($this->autoTestQuestion->type == 'image')
                    <img src="{{ $this->autoTestQuestion->file->file }}" alt="">
                @elseif ($this->autoTestQuestion->type == 'video')
                    <video controls width="300" height="200"
                        src="{{ $this->autoTestQuestion->file->file }}"></video>
                @elseif ($this->autoTestQuestion->type == 'audio')
                    <audio controls width="300" height="200"
                        src="{{ $this->autoTestQuestion->file->file }}"></audio>
                @endif
                @endif

                <div class="test-content_question">
                    <h2>{{ $this->autoTestQuestion->text }}</h2>
                    @foreach ($this->autoTestQuestion->questionVariations as $variation)
                        <div class="test-content_answer">
                            <div class="test_input_container">
                                <input required class="test_client_radio" type="radio" id="{{ $variation->id }}"
                                    name="radio">
                            </div>
                            <div class="test_text_container">
                                <label for="{{ $variation->id }}">{{ $variation->text }}</label>
                            </div>
                        </div>
                    @endforeach
        
                    <div class="test_bottom">
                        <a onclick="checkAnswer()" class="test-content_btn">продолжить</a>
                    </div>
                </div>
            @endif
            
           
        </div>
    
    
    </div>
    </div>
    
    <script>
        const checkAnswer = () => {
            const test_client_radio = document.querySelectorAll(".test_client_radio");
            let true_variation;
            test_client_radio.forEach((child) => {
                if (child.checked == true) {
                    true_variation = child.id
                }
            });
            if(!true_variation){
                return alert("выберите вариант ответа")
            }
            window.livewire.emit("checkAnswer", true_variation);
        }
    </script>
    
</div>