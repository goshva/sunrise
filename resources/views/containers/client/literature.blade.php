@extends('components.head')
@section('code')
<div class="sect">
    <x-client-side-bar></x-client-side-bar>
    <x-client-header></x-client-header>
    <menu>
          <div class="menuContent">
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
            <div class="menuUp">
              <!--<div class="menuMaterials">
                <p>
                  
                  <span style="color: #104772">Учебные материалы</span>
                </p>
              </div>-->
              <div class="menuTitle">
                <h1>Учебные материалы</h1>
  
            
              </div>
              <div class="menuSubject">
                <p class="SubjectTitle">тема</p>
                <p class="SubjectSubTitle">
                 
                </p>
              </div>
            </div>
            <div class="menuBottom">
              <div class="menu_bottom_content">
                @foreach ($competetions as $competetion)
                <p style="width:60%">{{$competetion->name}}</p>
                @foreach ($competetion->literatures as $literature)
                <div class="basicTerms">
                      <div class="basicTermsLeft" style="
                      display: flex;
                      justify-content: space-between;
                      align-items: center;
                      ">
                        <div  class="onpage">
                          <p>{{ $literature->name }}</p>
                          @if($user_tests->first())
                          @if($user_tests->first()->user_id ==  auth()->id())
                            @if( $user_tests->first()->user_id ==  auth()->id() && $user_tests->first()->competetion->id == $competetion->id)
                             <div class="not_done_indicators" >
                                <img src="/public/images/not_started_students_icon.svg" />
                          
                               <div class="not_done_indicators_content">
                                   @foreach($user_tests->where('competetion_id',$competetion->id)->where("user_id", auth()->id()) as $test)
                                   <p>{{$test->test->indicator->name}}</p>
                                   @endforeach
                               </div>
                           </div>
                           @endif
                           @endif
                          @endif
                       
                      </div>
                      <form action="/literature/change/{{ $literature->id }}" method="POST" class="changings">
                        @csrf
                        <span class="position-popup_label">Я на странице</span>
                        <div class="literature_save_changes" style="
                        width:120px;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    ">
                    @php
                      $literature_page = 1;
                      foreach ($user->literatures as $user_literature) {
                        if($user_literature->literature->id == $literature->id){
                          $literature_page = $user_literature->page;
                        }
                        }
                    @endphp
                          <input min="0" required value="{{ $literature_page }}" class="position-popup_input" type="number" style="width: 90px;height:12px" name="page" id="">
                          <button type="submit" class="user-popup_btn" style="padding: 2px 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="10px" height="10px" fill-rule="nonzero"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M26.98047,5.99023c-0.2598,0.00774 -0.50638,0.11632 -0.6875,0.30273l-15.29297,15.29297l-6.29297,-6.29297c-0.25082,-0.26124 -0.62327,-0.36647 -0.97371,-0.27511c-0.35044,0.09136 -0.62411,0.36503 -0.71547,0.71547c-0.09136,0.35044 0.01388,0.72289 0.27511,0.97371l7,7c0.39053,0.39037 1.02353,0.39037 1.41406,0l16,-16c0.29576,-0.28749 0.38469,-0.72707 0.22393,-1.10691c-0.16075,-0.37985 -0.53821,-0.62204 -0.9505,-0.60988z"></path></g></g></svg></button>
                        </div>
                      </form>
                        <a href="{{ $literature->file .'#page='.$literature_page  }}" target="_blank"  class="user-popup_btn">Открыть материал</a>
                        </div>
                  </div>
                @endforeach
                 @endforeach
              </div>
          </div>
        
            </div>
          </div>
    </menu>

<x-footer></x-footer>
   </div>
   @endsection