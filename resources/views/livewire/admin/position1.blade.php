<div class="position">
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
    <h1 class="position-title">Должности</h1>  
    <div class="position-up">
        <div class="position-up_sector">
            <h1 class="position-up_sector-title">Должности</h1>
            <div class="position-up_sector-btn" onclick="togglePopup()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 3C14.5808 3 16.8548 4.661 17.6748 7.045C20.1138 7.376 21.9998 9.472 21.9998 12C21.9998 13.221 21.5558 14.396 20.7498 15.309C20.5518 15.532 20.2768 15.647 19.9998 15.647C19.7648 15.647 19.5288 15.565 19.3378 15.397C18.9248 15.03 18.8848 14.399 19.2508 13.984C19.7338 13.438 19.9998 12.732 19.9998 12C19.9998 10.346 18.6538 9 16.9998 9H16.8998C16.4238 9 16.0138 8.664 15.9198 8.197C15.5458 6.345 13.8978 5 11.9998 5C10.1028 5 8.45379 6.345 8.08079 8.197C7.98679 8.664 7.57579 9 7.09979 9H6.99979C5.34579 9 3.99979 10.346 3.99979 12C3.99979 12.732 4.26579 13.438 4.74979 13.984C5.11479 14.399 5.07579 15.03 4.66179 15.397C4.24779 15.763 3.61579 15.722 3.25079 15.309C2.44379 14.396 1.99979 13.221 1.99979 12C1.99979 9.472 3.88579 7.376 6.32479 7.045C7.14579 4.661 9.41979 3 11.9998 3ZM11.305 11.2801C11.699 10.9041 12.322 10.9071 12.707 11.2931L15.707 14.2931C16.098 14.6841 16.098 15.3161 15.707 15.7071C15.512 15.9021 15.256 16.0001 15 16.0001C14.744 16.0001 14.488 15.9021 14.293 15.7071L13 14.4141V20.0001C13 20.5531 12.552 21.0001 12 21.0001C11.448 21.0001 11 20.5531 11 20.0001V14.3561L9.69499 15.6161C9.29799 16.0011 8.66499 15.9881 8.28099 15.5911C7.89699 15.1931 7.90799 14.5611 8.30499 14.1771L11.305 11.2801Z" fill="white"/>
                </svg>
            </div>
        </div>
     
    </div>

    <div class="position-sector">
        <div class="position-sector_content">
            <button onclick="addPosition()" class="position-sector_btn">Добавить должность 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_1301_8331)">
                      <path d="M11 20C11 20.2652 11.1054 20.5196 11.2929 20.7071C11.4804 20.8946 11.7348 21 12 21C12.2652 21 12.5196 20.8946 12.7071 20.7071C12.8946 20.5196 13 20.2652 13 20V13H20C20.2652 13 20.5196 12.8946 20.7071 12.7071C20.8946 12.5196 21 12.2652 21 12C21 11.7348 20.8946 11.4804 20.7071 11.2929C20.5196 11.1054 20.2652 11 20 11H13V4C13 3.73478 12.8946 3.48043 12.7071 3.29289C12.5196 3.10536 12.2652 3 12 3C11.7348 3 11.4804 3.10536 11.2929 3.29289C11.1054 3.48043 11 3.73478 11 4V11H4C3.73478 11 3.48043 11.1054 3.29289 11.2929C3.10536 11.4804 3 11.7348 3 12C3 12.2652 3.10536 12.5196 3.29289 12.7071C3.48043 12.8946 3.73478 13 4 13H11V20Z" fill="#343A40"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_1301_8331">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
            </button>
            <button onclick="addCompetetion()"  class="position-sector_btn" onclick="">Добавить компетенцию 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_1301_8331)">
                      <path d="M11 20C11 20.2652 11.1054 20.5196 11.2929 20.7071C11.4804 20.8946 11.7348 21 12 21C12.2652 21 12.5196 20.8946 12.7071 20.7071C12.8946 20.5196 13 20.2652 13 20V13H20C20.2652 13 20.5196 12.8946 20.7071 12.7071C20.8946 12.5196 21 12.2652 21 12C21 11.7348 20.8946 11.4804 20.7071 11.2929C20.5196 11.1054 20.2652 11 20 11H13V4C13 3.73478 12.8946 3.48043 12.7071 3.29289C12.5196 3.10536 12.2652 3 12 3C11.7348 3 11.4804 3.10536 11.2929 3.29289C11.1054 3.48043 11 3.73478 11 4V11H4C3.73478 11 3.48043 11.1054 3.29289 11.2929C3.10536 11.4804 3 11.7348 3 12C3 12.2652 3.10536 12.5196 3.29289 12.7071C3.48043 12.8946 3.73478 13 4 13H11V20Z" fill="#343A40"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_1301_8331">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
            </button>
            <button onclick="addIndicator()" class="position-sector_btn" onclick="">Добавить индикатор 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_1301_8331)">
                      <path d="M11 20C11 20.2652 11.1054 20.5196 11.2929 20.7071C11.4804 20.8946 11.7348 21 12 21C12.2652 21 12.5196 20.8946 12.7071 20.7071C12.8946 20.5196 13 20.2652 13 20V13H20C20.2652 13 20.5196 12.8946 20.7071 12.7071C20.8946 12.5196 21 12.2652 21 12C21 11.7348 20.8946 11.4804 20.7071 11.2929C20.5196 11.1054 20.2652 11 20 11H13V4C13 3.73478 12.8946 3.48043 12.7071 3.29289C12.5196 3.10536 12.2652 3 12 3C11.7348 3 11.4804 3.10536 11.2929 3.29289C11.1054 3.48043 11 3.73478 11 4V11H4C3.73478 11 3.48043 11.1054 3.29289 11.2929C3.10536 11.4804 3 11.7348 3 12C3 12.2652 3.10536 12.5196 3.29289 12.7071C3.48043 12.8946 3.73478 13 4 13H11V20Z" fill="#343A40"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_1301_8331">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
            </button>

            
            <div class="position-sector_select">
                <label for="select" class="position-sector_select-label">Компетенции: </label>
                <select style="width:100px" id="filterCompetetionForPosition" class="position-sector_select-sel">
                    <option value="Все">Все</option>
                    @foreach ($all_competetions as $competetion)
                    <option  value="{{ $competetion->id }}">{{ $competetion->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
       
            <div>
                <button onclick="showLiteratureBtn()" id="add-literature-button" class="constructor-sector_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 3C14.5808 3 16.8548 4.661 17.6748 7.045C20.1138 7.376 21.9998 9.472 21.9998 12C21.9998 13.221 21.5558 14.396 20.7498 15.309C20.5518 15.532 20.2768 15.647 19.9998 15.647C19.7648 15.647 19.5288 15.565 19.3378 15.397C18.9248 15.03 18.8848 14.399 19.2508 13.984C19.7338 13.438 19.9998 12.732 19.9998 12C19.9998 10.346 18.6538 9 16.9998 9H16.8998C16.4238 9 16.0138 8.664 15.9198 8.197C15.5458 6.345 13.8978 5 11.9998 5C10.1028 5 8.45379 6.345 8.08079 8.197C7.98679 8.664 7.57579 9 7.09979 9H6.99979C5.34579 9 3.99979 10.346 3.99979 12C3.99979 12.732 4.26579 13.438 4.74979 13.984C5.11479 14.399 5.07579 15.03 4.66179 15.397C4.24779 15.763 3.61579 15.722 3.25079 15.309C2.44379 14.396 1.99979 13.221 1.99979 12C1.99979 9.472 3.88579 7.376 6.32479 7.045C7.14579 4.661 9.41979 3 11.9998 3ZM11.305 11.2801C11.699 10.9041 12.322 10.9071 12.707 11.2931L15.707 14.2931C16.098 14.6841 16.098 15.3161 15.707 15.7071C15.512 15.9021 15.256 16.0001 15 16.0001C14.744 16.0001 14.488 15.9021 14.293 15.7071L13 14.4141V20.0001C13 20.5531 12.552 21.0001 12 21.0001C11.448 21.0001 11 20.5531 11 20.0001V14.3561L9.69499 15.6161C9.29799 16.0011 8.66499 15.9881 8.28099 15.5911C7.89699 15.1931 7.90799 14.5611 8.30499 14.1771L11.305 11.2801Z" fill="white"/>
                    </svg>
                    Загрузить 
                </button>
            </div>
        
    </div>

    <div class="position-content">
        <div class="position-content_sector">
            <p class="position-content_sector-p">Должность</p>
            <p class="position-content_sector-p">Компетенции</p>
            <p style="
    width: 156px;
" class="position-content_sector-p">Индикаторы</p>
        </div>
        <hr>
@if ($this->filterPositions)
@foreach ($this->filterPositions as $position)
<div style="overflow-y: scroll" class="position-content_sector">
   <p class="position-content_sector_info">{{ $position->name }}</p>
  <div>
    <p class="position-content_sector_info">посмотреть компетенции ({{ count($position->competetions) }})</p>
  </div>
   <div class="position-content_sector-last">
     <div>
        <p class="position-content_sector_info">Посмотреть индикаторы</p>
     </div>
       <button onclick="addNewSector({{ $position->id }})" >
           <svg id="button-svg{{$position->id}}" class="button-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
               <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5172 8.38113C18.8479 8.78651 18.8243 9.38375 18.4463 9.76215L12.604 15.6041C12.4081 15.8 12.1461 15.906 11.8744 15.906C11.6025 15.906 11.341 15.8002 11.1444 15.6041L5.3023 9.76203C4.89923 9.35848 4.89923 8.70527 5.3023 8.30278C5.70551 7.89909 6.35889 7.89909 6.76188 8.30266L11.8744 13.4147L16.9867 8.30278C17.3647 7.92434 17.9626 7.90067 18.368 8.23178L18.4464 8.30274L18.5172 8.38113Z" fill="#CFD1D8"/>
             </svg>
       </button>
       <button onclick="activeButton({{ $position->id }})">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
               <path d="M12 20C12.2652 20 12.5196 19.8946 12.7071 19.7071C12.8946 19.5196 13 19.2652 13 19C13 18.7348 12.8946 18.4804 12.7071 18.2929C12.5196 18.1054 12.2652 18 12 18C11.7348 18 11.4804 18.1054 11.2929 18.2929C11.1054 18.4804 11 18.7348 11 19C11 19.2652 11.1054 19.5196 11.2929 19.7071C11.4804 19.8946 11.7348 20 12 20ZM12 13C12.2652 13 12.5196 12.8946 12.7071 12.7071C12.8946 12.5196 13 12.2652 13 12C13 11.7348 12.8946 11.4804 12.7071 11.2929C12.5196 11.1054 12.2652 11 12 11C11.7348 11 11.4804 11.1054 11.2929 11.2929C11.1054 11.4804 11 11.7348 11 12C11 12.2652 11.1054 12.5196 11.2929 12.7071C11.4804 12.8946 11.7348 13 12 13ZM12 6C12.2652 6 12.5196 5.89464 12.7071 5.70711C12.8946 5.51957 13 5.26522 13 5C13 4.73478 12.8946 4.48043 12.7071 4.29289C12.5196 4.10536 12.2652 4 12 4C11.7348 4 11.4804 4.10536 11.2929 4.29289C11.1054 4.48043 11 4.73478 11 5C11 5.26522 11.1054 5.51957 11.2929 5.70711C11.4804 5.89464 11.7348 6 12 6Z" stroke="#8A92A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
           </svg>
       </button>
   </div>

   <div class="position-content_sector-position " id="position{{ $position->id }}">
       <button onclick="editing({{ $position->id }})" class="position-content_sector-position_btn">Редактировать</button>
       <hr>
       <button onclick="addCompetetion()" class="position-content_sector-position_btn">Добавить компетенцию</button>
       <hr>
       <button onclick="addIndicator()" class="position-content_sector-position_btn">Добавить индикатор</button>
   </div>
</div>
<div class="position-content_sector-wrap" id="sector{{  $position->id }}">
    <div class="position-content_section"  id="position-content_section{{$position->id}}">
        <div class=""></div>
        <div class="">
            <div class="position-content_sector-svg">
                <p class="position-content_sector-p">Компетенции</p>
                <button onclick="competencies({{$position->id}})" class="">
                    <svg class="svg1 svg{{$position->id}}" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                        <path d="M1 8L7 2L13 8" stroke="#8A92A6" stroke-width="1.5"/>
                    </svg>
                </button>
            </div>
            
            <div style="display: grid; gap: 10px; margin-top: 10px;">
                <ul style="padding-left: 0;">
                @foreach ($position->competetions as $competetion)
                <div 
                    style="margin-bottom:50px;"
            >
                     <li class="position-content_sector-info position-infoN{{$position->id}}" id="">{{ $competetion->name }}</li>
                    
                </div>
            @endforeach
            </ul>
            </div>
        </div>
        <div class="">
            <div class="position-content_sector-svg" >
                <p class="position-content_sector-p">Индикаторы</p>
               
            </div>
            <div style=" display: grid; gap: 10px; margin-top: 10px;">
                @foreach ($position->competetions as $competetion)
                   <div style="margin-bottom: 50px;">
                    @foreach ($competetion->indicators as $indicator)
                 

                    <p style="margin-bottom: 10px;"class="position-content_sector-indicator position-indicatorN{{$position->id}}" id="">{{ $indicator->name }}</p>
                    
                @endforeach
                   </div>
                @endforeach

            </div>
        </div> 
    </div>
    <div class="position-content_sector-wrapper">
        <div class="position-content_sector sector">
            <p class=""></p>
           
           
        </div>
    </div>
    <hr>
</div>

@endforeach
@else
@foreach ($this->positions as $position)
<div class="position-content_sector">
   <p class="position-content_sector_info">{{ $position->name }}</p>
  <div>
    <p class="position-content_sector_info">посмотреть компетенции ({{ count($position->competetions) }})</p>
  </div>
   <div class="position-content_sector-last">
     <div>
        <p class="position-content_sector_info">Посмотреть индикаторы</p>
     </div>
       <button onclick="addNewSector({{ $position->id }})" >
           <svg id="button-svg{{$position->id}}" class="button-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
               <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5172 8.38113C18.8479 8.78651 18.8243 9.38375 18.4463 9.76215L12.604 15.6041C12.4081 15.8 12.1461 15.906 11.8744 15.906C11.6025 15.906 11.341 15.8002 11.1444 15.6041L5.3023 9.76203C4.89923 9.35848 4.89923 8.70527 5.3023 8.30278C5.70551 7.89909 6.35889 7.89909 6.76188 8.30266L11.8744 13.4147L16.9867 8.30278C17.3647 7.92434 17.9626 7.90067 18.368 8.23178L18.4464 8.30274L18.5172 8.38113Z" fill="#CFD1D8"/>
             </svg>
       </button>
       <button onclick="activeButton({{ $position->id }})">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
               <path d="M12 20C12.2652 20 12.5196 19.8946 12.7071 19.7071C12.8946 19.5196 13 19.2652 13 19C13 18.7348 12.8946 18.4804 12.7071 18.2929C12.5196 18.1054 12.2652 18 12 18C11.7348 18 11.4804 18.1054 11.2929 18.2929C11.1054 18.4804 11 18.7348 11 19C11 19.2652 11.1054 19.5196 11.2929 19.7071C11.4804 19.8946 11.7348 20 12 20ZM12 13C12.2652 13 12.5196 12.8946 12.7071 12.7071C12.8946 12.5196 13 12.2652 13 12C13 11.7348 12.8946 11.4804 12.7071 11.2929C12.5196 11.1054 12.2652 11 12 11C11.7348 11 11.4804 11.1054 11.2929 11.2929C11.1054 11.4804 11 11.7348 11 12C11 12.2652 11.1054 12.5196 11.2929 12.7071C11.4804 12.8946 11.7348 13 12 13ZM12 6C12.2652 6 12.5196 5.89464 12.7071 5.70711C12.8946 5.51957 13 5.26522 13 5C13 4.73478 12.8946 4.48043 12.7071 4.29289C12.5196 4.10536 12.2652 4 12 4C11.7348 4 11.4804 4.10536 11.2929 4.29289C11.1054 4.48043 11 4.73478 11 5C11 5.26522 11.1054 5.51957 11.2929 5.70711C11.4804 5.89464 11.7348 6 12 6Z" stroke="#8A92A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
           </svg>
       </button>
   </div>

   <div class="position-content_sector-position " id="position{{ $position->id }}">
       <button onclick="editing({{ $position->id }})" class="position-content_sector-position_btn">Редактировать</button>
       <hr>
       <button onclick="addCompetetion()" class="position-content_sector-position_btn">Добавить компетенцию</button>
       <hr>
       <button onclick="addIndicator()" class="position-content_sector-position_btn">Добавить индикатор</button>
   </div>
</div>
<div class="position-content_sector-wrap" id="sector{{  $position->id }}">
    <div class="position-content_section" id="position-content_section{{$position->id}}">
        <div class=""></div>
        
        <div class="">
            <div class="position-content_sector-svg">
                <p class="position-content_sector-p">Компетенции</p>
                <button onclick="competencies({{  $position->id }})" class="">
                    <svg class="svg1 svg{{$position->id}}"  xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                        <path d="M1 8L7 2L13 8" stroke="#8A92A6" stroke-width="1.5"/>
                    </svg>
                </button>
            </div>
            
            <div style="display: grid; gap: 10px; margin-top: 10px;">
                <ul style="padding-left: 0;">
                    @foreach ($position->competetions as $competetion)
                        <div 
                            style="margin-bottom:50px;"
                    >

                    <li class="position-content_sector-info position-infoN{{$position->id}}" id="">{{ $competetion->name }}</li>
                            
                        </div>
                    @endforeach
                    </ul>
            </div>
        </div>
        <div class="">
            <div class="position-content_sector-svg" >
                <p class="position-content_sector-p">Индикаторы</p>
              
            </div>
            <div style=" display: grid; gap: 10px; margin-top: 10px;">
                @foreach ($position->competetions as $competetion)
                   <?php var_dump($position->competetions);?>
                   {{-- @foreach ($competetion->indicators as $indicator) 
                    @foreach($competetion->levels as $level)--}}
                    
                   {{--@if($competetion->levels->first()->level === $indicator->level)--}} 
                   <?php $indicatorsArr = $all_indicators->where('competetion_id', $competetion->id)->where('level', $position->level);
                   $levelsArr = $competetionLevels->where('competetion_id', $competetion->id)->where('level', $position->level);
                   ?>
                   @foreach ($indicatorsArr as $indicator)
                      <div style="margin-bottom: 20px;">
                    <p style="margin-bottom: 10px;" class="position-content_sector-indicator position-indicatorN{{$position->id}}" id="">{{$competetion->name}} - {{ $indicator->name }}</p>
                    </div> 
                   @endforeach
                    
                    {{--@endif--}}
                  @endforeach
                  {{--@endforeach
                @endforeach--}} 

            </div>
        </div> 
    </div>
    <div class="position-content_sector-wrapper">
        <div class="position-content_sector sector">
            <p class=""></p>
           
           
        </div>
    </div>
    <hr>
</div>

@endforeach
@endif




                
</div>

<section class="position-sectoins">
    @foreach ($positions as $position)
    <div class="position-sectoin">
        <div class="position-sectoin_up">
            <p>{{ $position->name }}</p>

            <button onclick="editing({{$position->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_1309_32917)">
                  <path d="M9.1665 3.33337H3.33317C2.89114 3.33337 2.46722 3.50897 2.15466 3.82153C1.8421 4.13409 1.6665 4.55801 1.6665 5.00004V16.6667C1.6665 17.1087 1.8421 17.5327 2.15466 17.8452C2.46722 18.1578 2.89114 18.3334 3.33317 18.3334H14.9998C15.4419 18.3334 15.8658 18.1578 16.1783 17.8452C16.4909 17.5327 16.6665 17.1087 16.6665 16.6667V10.8334" stroke="#8A92A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15.4165 2.08332C15.748 1.7518 16.1977 1.56555 16.6665 1.56555C17.1353 1.56555 17.585 1.7518 17.9165 2.08332C18.248 2.41484 18.4343 2.86448 18.4343 3.33332C18.4343 3.80216 18.248 4.2518 17.9165 4.58332L9.99984 12.5L6.6665 13.3333L7.49984 9.99999L15.4165 2.08332Z" stroke="#8A92A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                  <clipPath id="clip0_1309_32917">
                    <rect width="20" height="20" fill="white"/>
                  </clipPath>
                </defs>
              </svg></button>
        </div>
        <div class="position-sectoin_down" onclick="addNewSection({{ $position->id }})">
            <p>Компетенции ({{ count($position->competetions) }})</p>

            <button onclick="addNewSection({{ $position->id }})">
                <svg  id="svg{{ $position->id }}" class="svg" xmlns="http://www.w3.org/2000/svg" width="9" height="14" viewBox="0 0 9 14" fill="none">
                    <path d="M1.5 1L7.5 7L1.5 13" stroke="#104772" stroke-width="1.5"/>
                  </svg>
            </button>
        </div>

        <div class="position-sectoin_competency" id="competency{{ $position->id }}">
            @foreach ($position->competetions as $competetion)
            <div class="position-sectoin_competency-content"  onclick=" addNewSec({{ $competetion->id }})">
                <div class="position-sectoin_competency-sector">
                    <p>{{ $competetion->name }}</p>

                    <button onclick="addNewSec({{ $competetion->id }})">
                        <svg  id="svg2{{ $competetion->id }}" class="svg" xmlns="http://www.w3.org/2000/svg" width="9" height="14" viewBox="0 0 9 14" fill="none">
                            <path d="M1.5 1L7.5 7L1.5 13" stroke="#104772" stroke-width="1.5"/>
                          </svg>
                    </button>
                </div>
                <div class="position-sectoin_competency-sector_grid content{{ $competetion->id }}" id="content{{ $competetion->id }}">
                    @foreach ($competetion->indicators as $indicator)
                    <p>{{ $indicator->name }}</p>
                        
                    @endforeach
                  
                </div>    
            </div> 
            @endforeach

        </div>
    </div>
    
    @endforeach

</section>

        <div class="position-popup     @if ($this->position)
            active
            @endif" id="popup1">
            @if ($this->position)

            <div class="position-popup_overlay"></div>
            <div class="position-popup_content">
                <div class="position-popup_close-btn" onclick="editing()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
                <h2 class="position-popup_title">Редактировать должность</h2>
                <label class="position-popup_label">Должность</label>
                <input value="{{ $this->position->name }}" name="name" id="PositionChnageName" class="position-popup_input" type="text">
                <select id="select_competetion_positions" class="position-popup_select">
                    <option class="position-popup_option">Выбрать компетенцию</option>
                    @foreach ($this->position->competetions as $competetion)
                        <option value="{{ $competetion->id }}" class="position-popup_option">{{ $competetion->name }}</option>
                    @endforeach
                </select>
                <script>
                        const get_position_change_competetion =  document.getElementById('select_competetion_positions')
            get_position_change_competetion.addEventListener("change", ()=>{
                window.livewire.emit('getCompetation',get_position_change_competetion.value)
            })
                </script>
                @if ($this->competetion)
                <label class="position-popup_label">Копрметенция</label>

                    <input style="font-size:12px; color:#104772" aria-current="{{ $this->competetion->id }}" id="position-popup_input_competetion" class="position-popup_input" value="{{ $this->competetion->name }}">
                <label class="position-popup_label">Индикаторы</label>
                @foreach ($this->competetion->indicators as $indicator)
                <section class="position-popup_section">
                <div class="position-popup_sector">
                    <input style="font-size:12px; color:#104772" aria-current="{{ $indicator->id }}" class="position-popup_input position-popup_input_indicator" value="{{ $indicator->name }}">
                    <div class="position-popup_sector-flex">
                        <button  onclick="deleteSector({{ $indicator->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M2 4H3.33333H14" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.6665 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.3335 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
            </div>
            </div>
            </section>
                @endforeach
                @endif

                <a onclick="editPosition()" class="position-popup_btn">Сохранить изменения</a>
            </div>
         @endif
</div>
<script>
    function editPosition(){
        const editPositionIndicatorValues = [];
        const editPositionIndicatorIds = [];
        document.querySelectorAll(".position-popup_input_indicator").forEach(e=>{
            editPositionIndicatorValues.push(e.value)
            editPositionIndicatorIds.push(e.getAttribute("aria-current"))
        })
        console.log(editPositionIndicatorValues);
        console.log(editPositionIndicatorIds);
        window.livewire.emit('editPosition',document.getElementById("PositionChnageName").value,editPositionIndicatorValues,document.getElementById('position-popup_input_competetion') ? document.getElementById('position-popup_input_competetion').value : "" )
    }
</script>
<div class="position-popup  @if ($this->addedCompetetions !== []) active @endif @if ($this->subdivision)
    active
    @endif " id="popup2">
    <div class="position-popup_overlay"></div>
    <div class="position-popup_content">
        <div class="position-popup_close-btn" onclick="addPosition()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h2 class="position-popup_title">Добавить должность</h2>
        <label class="position-popup_label">Должность</label>
        <input id="positionName" class="position-popup_input" type="text">
        <select id="add_competetion_to_position" class="position-popup_select">
            <option class="position-popup_option">Добавить  компетенции</option>
            @foreach ($all_competetions as $competetion)
                <option value="{{ $competetion->id }}" class="position-popup_option">{{ $competetion->name }}</option>
            @endforeach
        </select>
        @if ($this->addedCompetetions !== [])
           @foreach ($this->addedCompetetions as $competetion)
           <div class="position-popup_sector">
            <p>{{ $competetion['name'] }}</p>
       {{-- {{$this->addedCompetetions[0]}} --}}
       
       <div class="position-popup_sector-flex">
                <button onclick="deleteCompetetionFromPosition({{ $competetion['id'] }})">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M2 4H3.33333H14" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.6665 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.3335 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                </button>
            </div>
        </div>
           @endforeach

        @endif
        <script>
           const add_competetion_to_position = document.getElementById("add_competetion_to_position");
           add_competetion_to_position.addEventListener("change",()=>{
              window.livewire.emit("addCompetetionToPosition", add_competetion_to_position.value);
           })
            function deleteCompetetionFromPosition(id){
                window.livewire.emit("deleteCompetetionFromPosition",id)
            }
        </script>
        <a onclick="addPositionDB()" class="position-popup_btn">Сохранить </a>
    </div>
    
</div>
<div class="position-popup  @if ($this->addCompetationPositions !== []) active @endif" id="popup3">
    <div class="position-popup_overlay"></div>
    <div class="position-popup_content">
        <div class="position-popup_close-btn" onclick="addCompetetion()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h2 class="position-popup_title">Добавить компетенцию</h2>
        <label class="position-popup_label">Компетенция</label>
        <input id="addCompetationName" class="position-popup_input" type="text">
        <select id="addPositionsToAddCompetations" class="position-popup_select">
            <option selected class="position-popup_option">Добавить должности</option>
            @foreach ($all_positions as $position)
            <option value="{{ $position->id }}" class="position-popup_option">{{ $position->name }}</option>
                
            @endforeach
        </select>
        @if ($this->addCompetationPositions !== [])
        @foreach ($this->addCompetationPositions as $position)
        <div class="position-popup_sector">
         <p>{{ $position['name'] }}</p>
    {{-- {{$this->addedpositions[0]}} --}}
    
    <div class="position-popup_sector-flex">
             <button onclick="deletePositionFromCompetetion({{ $position['id'] }})">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                     <path d="M2 4H3.33333H14" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M6.6665 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M9.3335 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                   </svg>
             </button>
         </div>
     </div>
        @endforeach

     @endif
        <a onclick="addCompetetionDB()" class="position-popup_btn">Сохранить</a>
        <script>
          //  const addPositionsToAddCompetations = document.getElementById("addPositionsToAddCompetations");
           // addPositionsToAddCompetations.addEventListener("change",()=>{
           //     window.livewire.emit("addPositionToCompetetion", addPositionsToAddCompetations.value);
          //  })
      //     function deleteCompetetionFromPosition(id){
       //        window.livewire.emit("deleteCompetetionFromPosition",id)
        //    }
            function deletePositionFromCompetetion(id){
                window.livewire.emit('deletePositionFromCompetetion',id)
            }

            function addCompetetionDB(){
    const competetionName = document.getElementById('addCompetationName').value;
   const addPositionsToAddCompetations = document.getElementById("addPositionsToAddCompetations").value;
   
if(competetionName !== '' && competetionName !== ' ' && competetionName !== null && addPositionsToAddCompetations !== 'Добавить должности' && addCompetetionForIndicator !== null) {
    window.livewire.emit('addCompetetion',competetionName);
     window.livewire.emit("addPositionToCompetetion", addPositionsToAddCompetations);
} else {
    //if(positionName == '' && positionName == null) {
   //     alert('Необходимо ввести название должности'); 
   // }
    if(addPositionsToAddCompetations == 'Добавить должности' || addCompetetionForIndicator == null) {
         alert('Необходимо выбрать должность');  
    }
    else {
         alert('Необходимо ввести название компетенции'); 
    }
}   
}
        </script>
    </div>
</div>
<div class="position-popup  " id="popup4">
    <div class="position-popup_overlay"></div>
    <div class="position-popup_content">
        <div class="position-popup_close-btn" onclick="addIndicator()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h2 class="position-popup_title">Добавить индикатор</h2>
        <label class="position-popup_label">Индикатор</label>
        <input id="addIndicatorName" class="position-popup_input" type="text">
        <select id="addCompetetionForIndicator" class="position-popup_select">
            <option selected class="position-popup_option">Добавить компетенцию</option>
            @foreach ($all_competetions as $competetion)
            <option value="{{ $competetion->id }}" class="position-popup_option">{{ $competetion->name }}</option>
                
            @endforeach
        </select>
        <a onclick="addIndicatorDB()" class="position-popup_btn">Сохранить</a>
        <script>
            function addIndicatorDB(){
                const indicatorName = document.getElementById('addIndicatorName').value;
                const addCompetetionForIndicator = document.getElementById('addCompetetionForIndicator').value;
                console.log(addCompetetionForIndicator);
                if(indicatorName !== '' && indicatorName !== ' ' && indicatorName !== null && addCompetetionForIndicator !== 'Добавить компетенцию' && addCompetetionForIndicator !== null) {
    window.livewire.emit('addIndicator',indicatorName,addCompetetionForIndicator)
                document.body.classList.remove("body-lock");
} else {
    if(addCompetetionForIndicator == 'Добавить компетенцию'|| addCompetetionForIndicator == null) {
        alert('Необходимо выбрать компетенцию для индикатора');
    } else {
        alert('Необходимо ввести название индикатора');
    }
    
}
               
            }
        </script>
    </div>
</div>
<div class="position-popup" id="delet">
    <div class="position-popup_overlay"></div>
    <div class="position-popup_content">
        <div class="position-popup_close-btn" onclick="editing()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <svg class="position-popup_error" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
            <path d="M24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44Z" stroke="#CC4D31" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M24 32V24" stroke="#CC4D31" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M24 16H24.02" stroke="#CC4D31" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        
        <p class="position-popup_info">Вы действительно хотите удалить выбранный индикатор компетенции?</p>
        
        
        <a  onclick="deleteIndicator()" class="position-popup_btn">Удалить</a>
    </div>
</div>
<div style="margin-top: 20px" class="user-slider">
    {{ $positions->links('pagination::default') }}
</div>

</div>
<div class="user-popup literature_add_popup" id="add-literature-popup">
    <div class="user-popup_overlay" id="literature_add-popup_overlay" onclick="showLiteratureBtn()"></div>
    <form class="user-popup_content" method="POST" action="{{ route("admin.load-position") }}" enctype="multipart/form-data">
        @csrf
        <h2 class="user-popup_title">Добавить Должность</h2>
        <div class="user-popup_sectors">
            <div class="user-popup-sector">
                <input name="file" onchange="readFile(this)" type="file" id="literature_file">
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
<script>
      function showLiteratureBtn () {
            const add_literature_popup = document.getElementById("add-literature-popup")
            add_literature_popup.classList.toggle("active")
        
            }
            function readFile(input) {

                if (input.files && input.files[0]) {
                    console.log(input.files,'input.files');
                 /*   var reader = new FileReader();

                    reader.onload = function (e) {
                       document.querySelector(".literature_file_load").style = "display:none";
                       document.querySelector(".literature_file_loaded").style = "display:block";
                       document.getElementById("add_literature_btn_text").innerHTML = "Загружен";                       
                    };

                    reader.readAsDataURL(input.files[0]);*/
                }
                }
    
    document.getElementById('filterCompetetionForPosition').addEventListener("change",()=>{
        // alert(true)
        window.livewire.emit('filterCompetetion',document.getElementById('filterCompetetionForPosition').value)
    })
    function deleteIndicator(){
        window.livewire.emit("deleteIndicator",localStorage.getItem('deleteIndicator'))
        localStorage.removeItem('deleteIndicator')
    }
    function getIndicators(id){
        window.livewire.emit('getIndicators',id)
    }

    function competencies(id){
        document.getElementById("position-content_section"+id).classList.toggle("position-content_section-active");
        
    document.querySelectorAll(".svg"+id).forEach(e=>{
    e.classList.toggle("active");
  })
    document.querySelectorAll(".position-infoN"+id).forEach(e=>{
    e.classList.toggle("active");
  })
    document.querySelectorAll(".position-indicatorN"+id).forEach(e=>{
    e.classList.toggle("active");
  })

}
function activeButton(id){
    document.getElementById(`position${id}`).classList.toggle("active")
}

function addNewSector(id){
  document.getElementById("sector"+id).classList.toggle("active");
  document.getElementById("button-svg"+id).classList.toggle("active");
}
function addPositionDB(){
    const positionName = document.getElementById('positionName').value;
   const competetion_to_position = document.getElementById("add_competetion_to_position").value;
   console.log(competetion_to_position,'competetion_to_position');
if(positionName !== '' && positionName !== ' ' && positionName !== null && competetion_to_position !== 'Добавить компетенции' && addCompetetionForIndicator !== null) {
    window.livewire.emit('addPosition',positionName)
} else {
    //if(positionName == '' && positionName == null) {
   //     alert('Необходимо ввести название должности'); 
   // }
    if(competetion_to_position == 'Добавить компетенции' || addCompetetionForIndicator == null) {
         alert('Необходимо выбрать компетенцию'); 
    }
    else {
         alert('Необходимо ввести название должности'); 
    }
}   
}

function addNewSection(id){
  document.getElementById(`svg${id}`).classList.toggle("active");
  document.getElementById(`competency${id}`).classList.toggle("active");
}

function addNewSec(id){
  document.getElementById(`svg2${id}`).classList.toggle("active");
  document.querySelectorAll(`.content${id}`).forEach(e=>{
    e.classList.toggle("active");
  })
}


function addPosition(){
    document.getElementById("popup2").classList.toggle("active");
}
function addIndicator(){
    document.getElementById("popup4").classList.toggle("active");
}
function addCompetetion(){
  document.getElementById("popup3").classList.toggle("active");
}

function editing(position){
  document.getElementById("popup1").classList.toggle("active");
  document.getElementById("delet").classList.remove("active");
  window.livewire.emit('getPosition', position)
}

function deleteSector(id){
    localStorage.setItem("deleteIndicator",id);
  document.getElementById("popup1").classList.remove("active");
  document.getElementById("delet").classList.add("active");
}


</script>
