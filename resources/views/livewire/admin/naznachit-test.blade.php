

<form action="/appoint-competetion" method="POST" class="tests-popup_content" id="get_test" style="display:block">
    @csrf
    <h2 style="cursor: pointer" onclick="window.location.href='{{ route('admin.tests') }} '"class="tests-popup_title"><div class="tests-up">
        <a onclick="window.location.href='{{ route('admin.tests') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M19 12H5" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 19L5 12L12 5" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Компетенции
        </a>
      </div></h2>
    <div class="tests-popup_section">
        <label wire:click="forUser" for="foronetest"><input checked type="radio" id="foronetest"  name="radio"> Для одного сотрудника</label>
        {{-- <button type="submit" class="tests-popup_btn for-group-test">Для компетенции</button> --}}
        <label   for="forSubdivision"><input type="radio" id="forSubdivision"  name="radio"> Для подразделения</label>
        

    </div>
           
  {{-- {{ dump($this->forSubdivision) }} --}}
    <input wire:model="searchTerm" type="search" name="" class="user-popup_input" style="border:2px solid #104772;border-radius:10px;" id="searchUser" >
    <div class="tests-popup-section">
        @if($this->forSubdivision == false)
            @if ($this->searchTerm != '')
           
                @foreach ($searchUserr as $texx)
                        @if ($this->competetions != null)
                                @foreach ($this->competetions as $competetion)
                                @php
                                    $competetion =\App\Models\Competetion::find($competetion['id']);
                                @endphp  
                                    @foreach ($competetion->positions as $position)
                                   
                                            @foreach ($position->users as $user)
                                                @if ($texx->id == $user->id)
                                                <label for="select_test_user-{{ $user->id }}" onclick="selectedTestUser(this)" class="tests-popup_sector-section">
                                                    <div class="select_user_div_test">
                                                        <h3>{{ $user->last_name }}  {{ $user->first_name }} {{ $user->fathers_name }} </h3>
                                                        <input type="radio" name="user" value="{{ $user->id }}" id="select_test_user-{{ $user->id }}">
                                                    </div>
                                                <p>{{ $user->position->name }}</p>
                                                </label>
                                
                                                @endif
                                                
                                            @endforeach
                                    @endforeach
                                @endforeach
                        @else
                       
                                @foreach ($this->competetion->positions as $position)
                                <?php 
                                /*$usersArray = [];
                                foreach($position->users as $item) {
                                    if(!in_array($item, $position->users)) {
                                        $usersArray[] = $item;
                                    }
                                } 
                                $elCounts = array_count_values($test);

$result = array_filter($test, function($el) use ($elCounts) {
    foreach ($elCounts as $k => $v) {
        if ($el == $k && $v == 1) {
            return $el;
        }
    }
});

sort($result);
print_r($result);*/
                                ?>
                                        @foreach ($position->users as $user)
                                                @if ($texx->id == $user->id)
                                                    <label for="select_test_user-{{ $user->id }}" onclick="selectedTestUser(this)" class="tests-popup_sector-section">
                                                        <div class="select_user_div_test">
                                                            <h3>{{ $user->last_name }}  {{ $user->first_name }} {{ $user->fathers_name }} </h3>
                                                            <input type="radio" name="user" value="{{ $user->id }}" id="select_test_user-{{ $user->id }}">
                                                        </div>
                                                    <p>{{ $user->position->name }}</p>
                                                    </label>

                                                @endif
                                            
                                        @endforeach
                                @endforeach
                        @endif

                @endforeach

            @else
                @if ($this->competetions != null && !$this->forSubdivision)
                  
                        @foreach ($this->competetions as $competetion)
                                @php
                               
                                $userarr = [];
                                    $competetion =\App\Models\Competetion::find($competetion['id']);
                                    foreach ($competetion->positions as $position){
                                        foreach ($position->users as $user){
                                            if(!in_array($user,$userarr)){
                                                $userarr[] = $user;
                                            }
                                        }
                                    
                                    }
                                @endphp  
                                  @endforeach 
                                @foreach($userarr as $user)
                                        <label for="select_test_user-{{ $user->id }}"  class="tests-popup_sector-section">
                                            <div class="select_user_div_test">
                                                <h3>{{ $user->last_name }}  {{ $user->first_name }} {{ $user->fathers_name }} </h3>
                                                <input type="radio" onclick="selectedUser(this.value)" name="user" value="{{ $user->id }}" id="select_test_user-{{ $user->id }}">
                                            </div>
                                            <p>{{ $user->position->name }}</p>
                                        </label>
                        @endforeach 
                       
                @endif
                       @if ($this->competetion && !$this->forSubdivision && $this->competetions == null)
                       
                            @foreach ($this->competetion->positions as $position)

                                    @foreach ($position->users as $user)
                                        <label for="select_test_user-{{ $user->id }}"  class="tests-popup_sector-section">
                                            <div class="select_user_div_test">
                                                <h3>{{ $user->last_name }}  {{ $user->first_name }} {{ $user->fathers_name }} </h3>
                                                
                                                <input type="radio" onclick="selectedUser(this.value)" name="user" value="{{ $user->id }}" id="select_test_user-{{ $user->id }}">
                                            </div>
                                            <p>{{ $user->position->name }}</p>
                                        </label>

                                    @endforeach
                            @endforeach
                       @endif
                @endif
        {{-- @else --}}
        {{-- {{ dd(true) }} --}}
                    
        @endif
        @if ($this->forSubdivision)
            @foreach ($this->subdivisions as $subdivision)
                            @php   $subdivision = \App\Models\Subdivision::find($subdivision); @endphp
                            <label for="select_test_user-{{ $subdivision->id }}"  class="tests-popup_sector-section">
                                <div class="select_user_div_test">
                                    <h3>{{ $subdivision->name }} </h3>
                                    <input type="checkbox" checked  name="subdivisions[]" value="{{ $subdivision->id }}" class="subdivision_checkbox">
                                </div>
                            
                            </label>
                    @endforeach
        
            
        @endif
        {{--  --}}
                       @if (!$this->competetions)
                            <input type="hidden" name="test" value="{{ $this->competetion->id }}">
                            @if (count($this->competetion->positions) ==0)
                            <h5 style="color: #104772">Нет сотрудников в данной компетенции</h5>
                            
                            @endif
                       @endif
    </div>
    <a onclick="showPopupDate()" class="tests-popup_btn">Назначить</a>
</form>
<div class="position-popup" id="popup-add-date">
    <div class="position-popup_overlay" onclick="showPopupDate()"></div>
    <form action="/appoint-competetion" method="POST" class="position-popup_content" id="naznachitTestForm">
      @csrf
      <input type="hidden" name="user" id="selectedUserNaznachitTest" >
      <input type="hidden" name="created_type" value="{{request('created_type')}}"  >
      {{-- @if ($this->forSubdivision) --}}
      <input type="hidden" id="forSubdivisionNaznachiTest" name="subdivisions[]" >
      {{-- @endif --}}
      <input type="hidden" id="forCOmpetetionNaznachiTest" style="display: none;">
      <input type="hidden" id="forCompetetionsNaznachiTest" style="display: none;">
      <input type="hidden" id="forCompetetionsUserNaznachiTest" style="display: none;">
      <input type="hidden" name="competetion" id="selectedCompetetionNaznachitTest" value="{{ request('competetions_for_publishing') }}" >
      <div class="position-popup_content">
        <div class="position-popup_close-btn" onclick="showPopupDate()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h2 class="position-popup_title">{{$this->competetions ? 'Добавить Дату для компетенций' : 'Добавить Дату для компетенции' }}</h2>
        @if ($this->competetions != [])
            @foreach ($this->competetions as $competetion)
        {{ $competetion['name'] }}
        <br>
                
            @endforeach
        @else
        {{ $this->competetion->name }}
            
        @endif
        <label class="position-popup_label">От</label>
        <input class="position-popup_input" name="date_from" type="date">
        <label class="position-popup_label">До</label>
        <input class="position-popup_input" name="date_to" type="date">
        <a onclick="submitNaznachitTest()" class="position-popup_btn" style="margin-top: 10px">Сохранить </a>
      </form>
</div>
  </div>
        <script>
         document.addEventListener('DOMContentLoaded', function() {
          let for_subdivision = document.getElementById('forSubdivision');
        for_subdivision.addEventListener('change', function() {
            console.log(document.querySelectorAll('input[name="user"]'));
            document.querySelectorAll('input[name="user"]').forEach((i) => {
                if (for_subdivision.checked) {
     i.style.display = "none";
    } else {
     i.style.display = "block";
    }
            });
            
        });
    });
            document.getElementById('forSubdivision').addEventListener("click",()=>{
                setTimeout(()=>{
                    window.livewire.emit('forSubdivision')
                },1000)
            })
            function forCompetetionsNaznachiTest(){
                document.getElementById('popup-add-date').classList.toggle("active")
            document.getElementById('forCompetetionsNaznachiTest').style = 'display:block';
            document.getElementById('forCompetetionsNaznachiTest').name = 'for_competetions';
            document.getElementById('forCompetetionsNaznachiTest').value = true;
            }
            function submitNaznachitTest(){

                if(localStorage.getItem('checkboxesChecked')){
                    
                    if(document.getElementById('forCompetetionsNaznachiTest').value == 'true'){
                        // alert('felfnerknf')
                    document.getElementById('forCompetetionsNaznachiTest').value = localStorage.getItem("checkboxesChecked");
                    
                }else{
                    document.getElementById('forCompetetionsUserNaznachiTest').name = 'for_competetions_user';
                    document.getElementById('forCompetetionsUserNaznachiTest').value = localStorage.getItem("checkboxesChecked");
                    document.getElementById('forCompetetionsUserNaznachiTest').style = 'display:block';
                   
                }
                localStorage.removeItem('checkboxesChecked')
            }
                document.getElementById('naznachitTestForm').submit()
            }
            
          function showPopupDate(){
            let subdivisions = [];
            document.querySelectorAll(".subdivision_checkbox").forEach(e=>{
                if(e.checked == true){
                    subdivisions.push(e.value)
                }

            })
            if(subdivisions != []){
                document.getElementById('forSubdivisionNaznachiTest').value=subdivisions;
            }
            document.getElementById('popup-add-date').classList.toggle("active")
        
          }
       function forCOmpetetionNaznachiTest(){
            document.getElementById('popup-add-date').classList.toggle("active")
            document.getElementById('forCOmpetetionNaznachiTest').style = 'display:block';
            document.getElementById('forCOmpetetionNaznachiTest').name = 'for_competetion';
            document.getElementById('forCOmpetetionNaznachiTest').value = true;

          }
          function selectedUser(id){
           document.getElementById('selectedUserNaznachitTest').value = id;
          }
        </script>