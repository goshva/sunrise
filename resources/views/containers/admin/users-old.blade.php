@extends('components.head')
<meta charset="utf-8">
<link rel="stylesheet" href="{{ asset("public/css/users.css") }}">
@section('code')
<style>

    .sect{
        grid-template-rows:initial;
    }
    .progress{
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
    .progress > span{
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1;
    }
    .progress .progress-left{
        left: 0;
    }
    .progress .progress-bar{
        width: 100%;
        height: 100%;
        background: none;
        border-width: 5px;
        border-style: solid;
        position: absolute;
        top: 0;
    }
    .progress .progress-left .progress-bar{
        left: 100%;
        border-top-right-radius: 40px;
        border-bottom-right-radius: 40px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left;
    }
    .progress .progress-right{
        right: 0;
    }
    .progress .progress-right .progress-bar{
        left: -100%;
        border-top-left-radius: 40px;
        border-bottom-left-radius: 40px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
        animation: loading-1 1.8s linear forwards;
    }
    .progress .progress-value{
        width: 100%;
        height: 100%;
        font-size: 11px;
        color: #000;
        text-align: center;
        position: absolute;
    }
    .progress.blue .progress-bar{
        border-color: green;
    }
    .progress.blue .progress-left .progress-bar{
        animation: loading-2 1.5s linear forwards 1.8s;
    }
    .progress.yellow .progress-bar{
        border-color: #fdc426;
    }
    .progress.yellow .progress-left .progress-bar{
        animation: loading-3 1s linear forwards 1.8s;
    }
    .progress.pink .progress-bar{
        border-color: #f83754;
    }
    .progress.pink .progress-left .progress-bar{
        animation: loading-4 0.4s linear forwards 1.8s;
    }
    .progress.green .progress-bar{
        border-color: green;
    }
    .progress.green .progress-left .progress-bar{
        animation: loading-5 1.2s linear forwards 1.8s;
    }
    @media (max-width:700px){
    .user-popup_sectors{
        display: flex;
        flex-direction: column;

    }
    .user-popup_overlay{
        width: 100%;
        height: 100%;
    }

@media(max-width:1168px){
    .user-add_form,
    .user-btns{
        display: none;
    }
    .user-sec{
        display: block;
        margin-top: 40px;
    }

    .user-sector-flex{
        display: flex;
        gap: 20px;
        justify-content: space-between;
        align-items: center;
    }

    .user-sector-flex div h3{
        color: var(--gray-text, #343A40);

        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
    }

    .user-sector-flex div p{
        color: var(--gray-light-text, #8A92A6);

        font-family: Inter;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 16px;
    }

    .user-sector{
        display: flex;
        padding: 16px 12px;
        align-items: center;
        gap: 12px;
        align-self: stretch;
        border-bottom: 0.5px solid var(--gray-light-elements, #CFD1D8);
        /* background: #FFF; */
        box-shadow: 0px 2px 12px 0px rgba(35, 51, 63, 0.15);
        justify-content: space-between;  
        margin-bottom: 20px;
    }

    .user-content_sector{
        display: grid;
        grid-template-columns: minmax(60px,200px)  minmax(40px,200px)  minmax(60px,200px)  minmax(30px,200px)  minmax(50px,200px);
        gap: 50px;
        padding: 20px 0;
        text-align: start;
        align-items: center;
    }

    .user-title{
        font-size: 20px;
    }
.user-popup_content{
    width: 70%;
}
    .user-content{
        display: none;
    }

    .user{
        grid-area: main;
        gap: 20px;
        padding: 20px;
    }
}
}
</style>
<div class="sect">
    <x-admin-sidebar></x-admin-sidebar>
    <x-client-header></x-client-header>
    <form action="" class="header_input" style="display: none;">
        <input type="text" name="" id="header_input" style="display: none;">
    </form>
    <div class="kvadrat" style="display: none;"></div>

    <div class="user">
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
    @if(count($errors) > 0)
        <div id="alert-danger-div">
            @foreach ($errors->all() as $error)
            
                <div class="alert alert-danger mt-2" role="alert">
                    {{  $error }}
                  </div>

            @endforeach
            </div>
            <script>
                let error = document.getElementById('alert-danger-div');
                console.log(error);
                setTimeout(() => {
                  error.style = "display:none"
                   
                }, 3000);
    
            </script>
    @endif

    

        <div class="user-up">
            <h1 class="user-title">Сотрудники</h1>
            <div class="user-up_sel">
                {{-- <div class="user-up_sel-lab">
                    <label for="" class="user-up_sel-label">Показать:</label>
                    <select name="" id="" class="user-up_sel-select">
                        <option value="">моих подчиненных</option>
                    </select>
                </div> --}}
            </div>
        </div>
       
        <div class="user-add" style="display:flex;justify-content:space-between">
           <div style="display: flex;align-items:center;">
            <button class="user-add_button" onclick="addNewUser()" style="margin-right: 20px">Добавить сотрудника 
                <span class="user-add_span" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_1271_6120)">
                          <path d="M11 20C11 20.2652 11.1054 20.5196 11.2929 20.7071C11.4804 20.8946 11.7348 21 12 21C12.2652 21 12.5196 20.8946 12.7071 20.7071C12.8946 20.5196 13 20.2652 13 20V13H20C20.2652 13 20.5196 12.8946 20.7071 12.7071C20.8946 12.5196 21 12.2652 21 12C21 11.7348 20.8946 11.4804 20.7071 11.2929C20.5196 11.1054 20.2652 11 20 11H13V4C13 3.73478 12.8946 3.48043 12.7071 3.29289C12.5196 3.10536 12.2652 3 12 3C11.7348 3 11.4804 3.10536 11.2929 3.29289C11.1054 3.48043 11 3.73478 11 4V11H4C3.73478 11 3.48043 11.1054 3.29289 11.2929C3.10536 11.4804 3 11.7348 3 12C3 12.2652 3.10536 12.5196 3.29289 12.7071C3.48043 12.8946 3.73478 13 4 13H11V20Z" fill="#343A40"/>
                        </g>
                        <defs>
                          <clipPath id="clip0_1271_6120">
                            <rect width="24" height="24" fill="white"/>
                          </clipPath>
                        </defs>
                      </svg>
                </span>
            </button>
            <form action="{{ route("admin.users") }}"  method="GET" class="user-add_form">
                @csrf
                <input type="hidden" name="show_sub"  id="show_user_subdivisions">
                <input class="user-add_input" @if (app('request')->input('show_sub') == "true")
                    checked
                @endif
                    
                 name="show_sub" value="true" type="checkbox" id="user-subordinates" >
                <label for="user-subordinates" class="user-add_label">Показать моих подчиненных</label>
            </form>
           </div>
            <div class="">
                <button class="position-sector_download" onclick="showLiteratureBtn()" id="add-user-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 2.99988C14.5808 2.99988 16.8548 4.66088 17.6748 7.04488C20.1138 7.37588 21.9998 9.47188 21.9998 11.9999C21.9998 13.2209 21.5558 14.3959 20.7498 15.3089C20.5518 15.5319 20.2768 15.6469 19.9998 15.6469C19.7648 15.6469 19.5288 15.5649 19.3378 15.3969C18.9248 15.0299 18.8848 14.3989 19.2508 13.9839C19.7338 13.4379 19.9998 12.7319 19.9998 11.9999C19.9998 10.3459 18.6538 8.99988 16.9998 8.99988H16.8998C16.4238 8.99988 16.0138 8.66388 15.9198 8.19688C15.5458 6.34488 13.8978 4.99988 11.9998 4.99988C10.1028 4.99988 8.45376 6.34488 8.08076 8.19688C7.98676 8.66388 7.57576 8.99988 7.09976 8.99988H6.99976C5.34576 8.99988 3.99976 10.3459 3.99976 11.9999C3.99976 12.7319 4.26576 13.4379 4.74976 13.9839C5.11476 14.3989 5.07576 15.0299 4.66176 15.3969C4.24776 15.7629 3.61576 15.7219 3.25076 15.3089C2.44376 14.3959 1.99976 13.2209 1.99976 11.9999C1.99976 9.47188 3.88576 7.37588 6.32476 7.04488C7.14576 4.66088 9.41976 2.99988 11.9998 2.99988ZM11.305 11.28C11.699 10.904 12.322 10.907 12.707 11.293L15.707 14.293C16.098 14.684 16.098 15.316 15.707 15.707C15.512 15.902 15.256 16 15 16C14.744 16 14.488 15.902 14.293 15.707L13 14.414V20C13 20.553 12.552 21 12 21C11.448 21 11 20.553 11 20V14.356L9.69496 15.616C9.29796 16.001 8.66496 15.988 8.28096 15.591C7.89696 15.193 7.90796 14.561 8.30496 14.177L11.305 11.28Z" fill="white"/>
                      </svg>
                      Загрузить  
                </button>
            </div>
        </div>
        <div class="user-btns">
            <h3 class="user-btns_title">Сотрудники</h3>
            <form action="{{ route("admin.users") }}" method="GET" id="usersFilter" class="user-btns_flex">
                @csrf
                <input type="submit" class="user-btns_flex-btn @if (Request::has('all')) user-btns_flex-btn_active @endif  @if ( !Request::has('process') && !Request::has('ended') && !Request::has('didntstart')) user-btns_flex-btn_active @endif  " value="все сотрудники"  name="all">
                <input 
                
                 type="submit" class="user-btns_flex-btn @if (Request::has('ended')) user-btns_flex-btn_active @endif " value="завершили" name="ended" >
                <input type="submit" class="user-btns_flex-btn @if (Request::has('process')) user-btns_flex-btn_active @endif"  value="в работе" name="process">
                <input type="submit" class="user-btns_flex-btn @if (Request::has('didntstart')) user-btns_flex-btn_active @endif"   value="не приступили" name="didntstart">
               
                <script>
                    document.querySelectorAll(".user-btns_flex-btn").forEach(e=>{
                        e.addEventListener('click', ()=>{
                        document.getElementById('usersFilter').submit()
                    })
                    })
                </script>
            </form>
        </div>
        
            @livewire('admin.user-changes', ['users'=>$users, 'competetionLevels'=> $competetionLevels, 'indicators'=>$indicators])


        <div class="user-sec">
            @foreach ($users as $user)
            <div class="user-sector">
                <div class="user-sector-flex">
                    <img style="border-radius:50px" src="{{ $user->avatar }}" alt="">
                    <div class="">
                        <h3>{{ $user->last_name }} {{ $user->first_name }} {{ $user->fathers_name }}</h3>
                        <p style="margin:14px 0">{{ $user->position->name }}</p>
                        <p class="user-content_sector_info">@if (count($user->subdivisions) > 0)
                            {{ $user->subdivisions[0]->name}}
                        @endif</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    @if ($user->competetions)
                    <div  class="progress @if(count($user->competetions->where("is_done",1)->all())>=  count($user->competetions) )   green @elseif (count($user->competetions->where("is_done",1)->all())>=  count($user->competetions)  -  count($user->competetions)/2) yellow @else pink @endif">
                        <span class="progress-left">
                            <span id="indicator-{{ $user->id }}" class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span id="indicator-{{ $user->id }}-right"  class="progress-bar"></span>
                        </span>
            
                            <div  class="progress-value">{{ count($user->competetions->where("is_done",1)) }}/{{ count($user->competetions) }}</div>
                            <style>
                                   .progress .progress-right #indicator-{{ $user->id }}-right{
                                        left: -100%;
                                        border-top-left-radius: 40px;
                                        border-bottom-left-radius: 40px;
                                        border-right: 0;
                                        -webkit-transform-origin: center right;
                                        transform-origin: center right;
                                        @if (count($user->competetions->where("is_done",1))==count($user->competetions) &&count($user->competetions->where("is_done",1)) !=0 || count($user->competetions->where("is_done",1)) >= count($user->competetions) /2   && count($user->competetions->where("is_done",1)) !=0 )
                                        transform: rotate(180deg);
                                        @else
                                        transform: rotate({{ count($user->competetions->where("is_done",1)) *30 }}deg);
                                        @endif
                                    }
                                           #indicator-{{ $user->id }}{
                                         @if(count($user->competetions->where("is_done",1)) == count($user->competetions) &&   count($user->competetions->where("is_done",1)) !=0)
                                             transform: rotate(180deg);
                                             @elseif (count($user->competetions->where("is_done",1)) >= count($user->competetions) /2 && count($user->competetions->where("is_done",1)) !=0)
                                        transform: rotate({{ count($user->competetions->where("is_done",1)) *60 }}deg);
            
                                                @else
                                                transform: rotate(0deg);
                                        @endif
                                    }
                            </style>
            
                        
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <div class="user-slider">
                {{ $users->links('pagination::default') }}
            </div>
        </div>

        <div class="user-popup" id="popup1">
            <div class="user-popup_overlay"></div>
            <form style="
            width: 70%;
        " class="user-popup_content" method="POST" action="{{ route("admin.create-user") }}">
                @csrf
                <div class="user-popup_close-btn" onclick="addNewUser()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="user-popup_title">Добавить сотрудника</h2>
                <div class="user-popup_sectors">
                    <div class="user-popup-sector">
                        <label class="user-popup_label">Фамилия</label>
                        <input required class="user-popup_input" value="{{ old("last_name") }}" name="last_name" type="text">
                        <label class="user-popup_label">Имя</label>
                        <input required class="user-popup_input" value="{{ old("first_name") }}" name="first_name" type="text">
                        <label class="user-popup_label">Отчество</label>
                        <input required class="user-popup_input" value="{{ old("fathers_name") }}"  name="fathers_name" type="text">
                        <label class="user-popup_label">Город</label>
                       {{--<div class="create_user_other_location">
                            <input value="{{ old("location") }}" required class="user-popup_input" name="location"  type="text">
                       <div class="user-popup_btn">или выбрать из существующих</div>
                    </div>--}} 
                       
                       <select style="margin-bottom: 20px" required name="location"   class="user-popup-sector_select" id="location">
                            @foreach ($locations as $location)
                            <option selected value="{{ $location->name }}">{{ $location->name }}</option> 
                           {{--<option selected id="create_user_other_location">Другой город</option> --}} 
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="user-popup-sector">
                        <label class="user-popup_label">Email</label>
                        <input required class="user-popup_input" value="{{ old("email") }}" name="email" type="email">
                       
                       <div id="dobavit_object_select"> 
                        <select style="margin-bottom: 20px" required name="objects[]"  class="user-popup-sector_select" >
                            @foreach ($objects as $object)
                            <option selected value="{{ $object->id }}">{{ $object->name }}</option> 
                            @endforeach
                        </select>
                       </div>
                       
                        <div id="dobavit_podrozdelenie_select"> 
                            <select style="margin-bottom: 20px;margin-top: 20px" required name="subdivisions[]"  class="user-popup-sector_select" >
                                @foreach ($subdivisions as $subdivision)
                                <option selected value="{{ $subdivision->id }}">{{ $subdivision->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <a id="dobavit_podrozdelenie" class="user-popup_btn">Добавить подразделение</a>
                        <a id="udalit_podrozdelenie" style="display:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                 <path d="M2 4H3.33333H14" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M6.6665 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M9.3335 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                    </a>
                        <select style="margin-top: 20px" required name="position"  class="user-popup-sector_select" >
                            @foreach ($positions as $position)
                            <option selected value="{{ $position->id }}">{{ $position->name }}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
               
                <button class="user-popup_btn">сохранить</button>
            </form>
            
            <div class="user-slider">
                {{ $users->links('pagination::default') }}
            </div>
        </div>
         <div class="user-popup" id="popup_edit_user">
            <div class="user-popup_overlay"></div>
            <form id="editUserForm"
            style="
            width: 70%;
        " class="user-popup_content" method="PATCH" action="{{ route("admin.edit-user") }}">
                @csrf
                <div class="user-popup_close-btn" id="edit_user_close_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="user-popup_title">Редактировать сотрудника</h2>
                <div class="user-popup_sectors">
                    <div class="user-popup-sector">
                       
                        <label class="user-popup_label">Фамилия</label>
                        <input required class="user-popup_input" value="{{ $editedUser->last_name ?? '' }}" id="user_last_name" type="text">
                        <label class="user-popup_label">Имя</label>
                        <input required class="user-popup_input" value="{{ $editedUser->first_name ?? ''}}" id="user_first_name" type="text">
                        <label class="user-popup_label">Отчество</label>
                        <input required class="user-popup_input" value="{{ $editedUser->fathers_name ?? ''}}"  id="user_fathers_name" type="text">
                        <label class="user-popup_label">Город</label>
                        {{--<input value="{{ $editedUser->location ?? '' }}" required class="user-popup_input" id="user_location"  type="text">--}}
                        <div> 
                        <select style="margin-bottom: 20px" required name="locations[]"   class="user-popup-sector_select" id="user_location">
                            @foreach ($locations as $location)
                            <option selected value="{{ $location->name }}">{{ $location->name }}</option> 
                            @endforeach
                        </select>
                       </div>
                        
                    </div>
                    <div class="user-popup-sector">
                        <label class="user-popup_label">Email</label>
                        <input required class="user-popup_input" value="{{ $editedUser->email?? '' }}" id="user_email" type="email">
                       
                       <div id="dobavit_object_select"> 
                        <select style="margin-bottom: 20px" required name="objects[]"   class="user-popup-sector_select" id="user_object">
                            @foreach ($objects as $object)
                            <option selected value="{{ $object->id }}">{{ $object->name }}</option> 
                            @endforeach
                        </select>
                       </div>
                       
                        <div id="dobavit_podrozdelenie_select"> 
                            <select style="margin-bottom: 20px;margin-top: 20px" required name="subdivisions[]"  class="user-popup-sector_select" id="user_subdivision">
                                @foreach ($subdivisions as $subdivision)
                                <option selected value="{{ $subdivision->id }}">{{ $subdivision->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <a id="dobavit_podrozdelenie" class="user-popup_btn">Добавить подразделение</a>
                        <a id="udalit_podrozdelenie" style="display:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                 <path d="M2 4H3.33333H14" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M6.6665 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M9.3335 7.33337V11.3334" stroke="#343A40" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                    </a>
                        <select style="margin-top: 20px" required name="position"  class="user-popup-sector_select" id="user_position">
                            @foreach ($positions as $position)
                            <option id="user_position" selected value="{{ $position->id }}">{{ $position->name }}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
               
                <button 
                type="submit"
                class="user-popup_btn" class="user-popup_btn">Сохранить изменения</button>
            </form>
            
            
        </div>
    </div>

    <div class="user-popup literature_add_popup" id="add-user-popup">
        <div class="user-popup_overlay" id="literature_add-popup_overlay"></div>
        <form class="user-popup_content" method="POST" action="{{ route("admin.load-user") }}" enctype="multipart/form-data">
            @csrf
            <h2 class="user-popup_title">Добавить Сотрудника</h2>
            <div class="user-popup_sectors">
                <div class="user-popup-sector">
                    <input required name="file" onchange="readFile(this)" type="file" id="literature_file">
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
</div>


<script>
    
  $("#dobavit_podrozdelenie").click(function(){ 
                  var lsthmtl = $("#dobavit_podrozdelenie_select").html();
                     $("#udalit_podrozdelenie").css("display", "inline");
                 
                  $("#dobavit_podrozdelenie").before(lsthmtl);
              });
 $("#udalit_podrozdelenie").click(function() {
var elements = $("[name='subdivisions[]']");
if(elements.length != 1){
      $("#dobavit_podrozdelenie").prev().remove();
}if(elements.length  == 2){
                $("#udalit_podrozdelenie").css("display", "none");

}
  
});

              $("#dobavit_object").click(function(){ 
                  var lsthmtl = $("#dobavit_object_select").html();
                  console.log(lsthmtl);
                  $("#dobavit_object").before(lsthmtl);
              });
function togglePopup(){
    document.getElementById("popup1").classList.toggle("active");
    document.body.classList.toggle("body-lock");
}

function openSection(id){
    document.querySelectorAll(`.newrepost-content_section-${id}`).forEach((el)=>{
        el.classList.toggle("active");
    })
    document.querySelectorAll(`.newrepost-icon-${id}`).forEach((el)=>{
        el.classList.toggle("active");
    })
}

function openStats(id){
    
    setTimeout(() => {
        console.log(document.getElementById("second"+id).parentElement.parentElement.offsetHeight + "  " +id);
        const user_graphic_hrs = document.querySelectorAll(".user_graphic_hrs"+id);
    user_graphic_hrs.forEach(e=>{
        e.classList.toggle("active");
        e.width = (document.getElementById("second"+id).parentElement.parentElement.offsetHeight-30)
        e.style = document.getElementById("second"+id).parentElement.parentElement.offsetHeight > 350 ? `top:${(document.getElementById("second"+id).parentElement.parentElement.offsetHeight -250) };right:-220px` : `top:${(document.getElementById("second"+id).parentElement.parentElement.offsetHeight -230) }`
    })
    }, 100);
    
  document.getElementById("second"+id).classList.toggle("active");
  document.getElementById("secondIcon"+id).classList.toggle("active");
}
    function addNewUser(){
  document.getElementById("popup1").classList.toggle("active");
  document.body.classList.toggle("body-lock");
  document.addEventListener('click',(event) =>{
  const user_popup = document.querySelector(".user-popup_content");
  console.log(event.target);
    if (!user_popup.contains(event.target) &&  document.getElementById("popup1").contains(event.target)) {
     // document.getElementById("popup1").classList.remove("active");
    //  document.body.classList.remove("body-lock");

    }
  });
}
      function editUserPopup(id){
        const edit_user_popup =  document.getElementById("popup_edit_user")
  edit_user_popup.classList.toggle("active");
  localStorage.setItem('editedUserId', id);
  $.ajax({
          url: "/admin/users/findById",
          type:"POST",
          data:{ _token: "{{ csrf_token() }}",
            user_id:id,
          },
          success:function(response){
            console.log(response);
             $('#user_first_name').val(response.first_name);
         $('#user_last_name').val(response.last_name);
       $('#user_fathers_name').val(response.fathers_name);
         $('#user_location').val(response.location);

        $('#user_object').val(response.object);
        $('#user_subdivision').val(response.subdivision);
        $('#user_position').val(response.position);
         $('#user_email').val(response.email);
          }
        }),
        
  document.body.classList.toggle("body-lock");
  const editUserCloseBtn = document.getElementById('edit_user_close_btn');
  console.log(editUserCloseBtn,'editUserCloseBtn');
  editUserCloseBtn.addEventListener('click', ()=> {
edit_user_popup.classList.remove("active");
      document.body.classList.remove("body-lock");
  });
  document.addEventListener('click',(event) =>{
  console.log(event.target);
    if (
        !edit_user_popup.contains(event.target) &&  
    
    edit_user_popup.contains(event.target)) {
     edit_user_popup.classList.remove("active");
      document.body.classList.remove("body-lock");

    }
  });
}
$( document ).ready(function() {
  $('#searchUser').keyup(function(){
  let searchUser = $('#searchUser').val();
  console.log(searchUser,'searchUser');
   $.ajax({
          url: "/admin/users/findByName",
          type:"POST",
          data:{
            _token: "{{ csrf_token() }}",
            name:searchUser,
            
          },
          success:function(response){
            console.log(response);
          },
         });
});
$('#editUserForm').on('submit', function(event){
        event.preventDefault();
        let user_id = localStorage.editedUserId;
        let first_name = $('#user_first_name').val();
        let last_name = $('#user_last_name').val();
        let user_fathers_name = $('#user_fathers_name').val();
        let user_location = $('#user_location').val();

        let user_object_value = $('#user_object').val();
        let user_subdivision_value = $('#user_subdivision').val();
        let user_position_value = $('#user_position').val();
         let email = $('#user_email').val();
      $.ajax({
          url: "/users/edit",
          type:"PATCH",
          data:{
            user_id:user_id,
            _token: "{{ csrf_token() }}",
            first_name:first_name,
            last_name:last_name,
            email:email,
            user_fathers_name:user_fathers_name,
            user_location:user_location,
           user_object:user_object_value,
            user_subdivision:user_subdivision_value,
            user_position:user_position_value
          },
          success:function(response){
            console.log(response);
            location.reload();
          },
         });
        });
        });
    function editUser(){
        const userId = localStorage.getItem('editedUserId');
        console.log(userId,'userId');
 /* document.getElementById("popup_edit_user").classList.toggle("active");
  document.body.classList.toggle("body-lock");
  document.addEventListener('click',(event) =>{
  const user_popup = document.querySelector(".user-popup_content");
  console.log(event.target);
    if (!user_popup.contains(event.target) &&  document.getElementById("popup_edit_user").contains(event.target)) {
      document.getElementById("popup_edit_user").classList.remove("active");
      document.body.classList.remove("body-lock");

    }
  });*/
}
document.querySelector(".user-add_label").addEventListener("click", () => {
  const user_add_form = document.querySelector(".user-add_form");
  const show_user_subdivisions = document.getElementById("show_user_subdivisions");
  if(show_user_subdivisions.value == ""){
    show_user_subdivisions.value = "false"
  }else{
    show_user_subdivisions.value = "false"
  }
  setTimeout(() => {
    user_add_form.submit()
  }, 300);

})    

const showLiteratureBtn = () => {
                const add_literature_btn = document.getElementById("add-user-button")
            add_literature_btn.addEventListener("click",()=>{
            const add_literature_popup = document.getElementById("add-user-popup")
            add_literature_popup.classList.add("active")
                        document.body.classList.add("body-lock")
            setTimeout(() => {
                document.getElementById('literature_add-popup_overlay').addEventListener('click',(event) =>{
                    
                        add_literature_popup.classList.remove("active")
                
                        
               });   
            }, 100);
            })
        
            }

function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                       document.querySelector(".literature_file_load").style = "display:none";
                       document.querySelector(".literature_file_loaded").style = "display:block";
                       document.getElementById("add_literature_btn_text").innerHTML = "Загружен";                       
                    };

                    reader.readAsDataURL(input.files[0]);
                }
                }
                document.addEventListener('DOMContentLoaded', function() {
const myUsersCheckbox = document.querySelector('.user-add_input');
const myUsersForm = document.querySelector('form.user-add_form');
console.log(myUsersCheckbox);
console.log(myUsersForm);
myUsersCheckbox.addEventListener('click', function() {
myUsersForm.submit();
});
                });
</script>
@endsection