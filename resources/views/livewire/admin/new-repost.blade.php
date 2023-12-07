<div>
    <div>

    <div class="repost " @if ($this->newReposts)
        style="display:none"
         @endif>
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
        <h1 class="repost-title">Отчеты</h1>
        <div class="repost-up">
            <div class="repost-up_sector">
                <h1 class="repost-up_sector-title">Отчеты</h1>
                <div class="repost-up_sector-btn" onclick="togglePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 3C14.5808 3 16.8548 4.661 17.6748 7.045C20.1138 7.376 21.9998 9.472 21.9998 12C21.9998 13.221 21.5558 14.396 20.7498 15.309C20.5518 15.532 20.2768 15.647 19.9998 15.647C19.7648 15.647 19.5288 15.565 19.3378 15.397C18.9248 15.03 18.8848 14.399 19.2508 13.984C19.7338 13.438 19.9998 12.732 19.9998 12C19.9998 10.346 18.6538 9 16.9998 9H16.8998C16.4238 9 16.0138 8.664 15.9198 8.197C15.5458 6.345 13.8978 5 11.9998 5C10.1028 5 8.45379 6.345 8.08079 8.197C7.98679 8.664 7.57579 9 7.09979 9H6.99979C5.34579 9 3.99979 10.346 3.99979 12C3.99979 12.732 4.26579 13.438 4.74979 13.984C5.11479 14.399 5.07579 15.03 4.66179 15.397C4.24779 15.763 3.61579 15.722 3.25079 15.309C2.44379 14.396 1.99979 13.221 1.99979 12C1.99979 9.472 3.88579 7.376 6.32479 7.045C7.14579 4.661 9.41979 3 11.9998 3ZM11.305 11.2801C11.699 10.9041 12.322 10.9071 12.707 11.2931L15.707 14.2931C16.098 14.6841 16.098 15.3161 15.707 15.7071C15.512 15.9021 15.256 16.0001 15 16.0001C14.744 16.0001 14.488 15.9021 14.293 15.7071L13 14.4141V20.0001C13 20.5531 12.552 21.0001 12 21.0001C11.448 21.0001 11 20.5531 11 20.0001V14.3561L9.69499 15.6161C9.29799 16.0011 8.66499 15.9881 8.28099 15.5911C7.89699 15.1931 7.90799 14.5611 8.30499 14.1771L11.305 11.2801Z" fill="white"/>
                    </svg>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6901 7.84996C11.1935 7.09341 11.067 6.0823 10.3927 5.47312C9.71836 4.86394 8.69963 4.8404 7.99792 5.41779C7.2962 5.99517 7.1231 6.99935 7.59102 7.77835C8.05893 8.55735 9.02675 8.87624 9.86608 8.52796C10.2015 8.38801 10.4882 8.15215 10.6901 7.84996Z" stroke="#343A40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6901 18.1649C11.1935 17.4084 11.067 16.3972 10.3927 15.7881C9.71836 15.1789 8.69963 15.1553 7.99792 15.7327C7.2962 16.3101 7.1231 17.3143 7.59102 18.0933C8.05893 18.8723 9.02675 19.1912 9.86608 18.8429C10.2015 18.703 10.4882 18.4671 10.6901 18.1649V18.1649Z" stroke="#343A40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3101 13.0069C12.8067 12.2504 12.9332 11.2393 13.6075 10.6301C14.2818 10.0209 15.3006 9.99738 16.0023 10.5748C16.704 11.1522 16.8771 12.1563 16.4092 12.9353C15.9413 13.7143 14.9734 14.0332 14.1341 13.6849C13.7987 13.545 13.512 13.3091 13.3101 13.0069V13.0069Z" stroke="#343A40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 6.07593C10.5858 6.07593 10.25 6.41171 10.25 6.82593C10.25 7.24014 10.5858 7.57593 11 7.57593V6.07593ZM19 7.57593C19.4142 7.57593 19.75 7.24014 19.75 6.82593C19.75 6.41171 19.4142 6.07593 19 6.07593V7.57593ZM7.327 7.57593C7.74121 7.57593 8.077 7.24014 8.077 6.82593C8.077 6.41171 7.74121 6.07593 7.327 6.07593V7.57593ZM5 6.07593C4.58579 6.07593 4.25 6.41171 4.25 6.82593C4.25 7.24014 4.58579 7.57593 5 7.57593V6.07593ZM11 16.3919C10.5858 16.3919 10.25 16.7277 10.25 17.1419C10.25 17.5561 10.5858 17.8919 11 17.8919V16.3919ZM19 17.8919C19.4142 17.8919 19.75 17.5561 19.75 17.1419C19.75 16.7277 19.4142 16.3919 19 16.3919V17.8919ZM7.327 17.8919C7.74121 17.8919 8.077 17.5561 8.077 17.1419C8.077 16.7277 7.74121 16.3919 7.327 16.3919V17.8919ZM5 16.3919C4.58579 16.3919 4.25 16.7277 4.25 17.1419C4.25 17.5561 4.58579 17.8919 5 17.8919V16.3919ZM13 12.7339C13.4142 12.7339 13.75 12.3981 13.75 11.9839C13.75 11.5697 13.4142 11.2339 13 11.2339V12.7339ZM5 11.2339C4.58579 11.2339 4.25 11.5697 4.25 11.9839C4.25 12.3981 4.58579 12.7339 5 12.7339V11.2339ZM16.673 11.2339C16.2588 11.2339 15.923 11.5697 15.923 11.9839C15.923 12.3981 16.2588 12.7339 16.673 12.7339V11.2339ZM19 12.7339C19.4142 12.7339 19.75 12.3981 19.75 11.9839C19.75 11.5697 19.4142 11.2339 19 11.2339V12.7339ZM11 7.57593H19V6.07593H11V7.57593ZM7.327 6.07593H5V7.57593H7.327V6.07593ZM11 17.8919H19V16.3919H11V17.8919ZM7.327 16.3919H5V17.8919H7.327V16.3919ZM13 11.2339H5V12.7339H13V11.2339ZM16.673 12.7339H19V11.2339H16.673V12.7339Z" fill="#343A40"/>
            </svg>
        </div>

        <div class="repost-btns">
            <a wire:click="$emit('newReposts')" class="newrepost-btn">Новый отчет</a>
            <a wire:click="$emit('oldReposts')" class="newrepost-btn newrepost-btn_active">Предыдущий отчет</a>
        </div>
        <hr>
        <div class="repost-sector">
            <div class="">

            </div>

            <form action="{{ route("admin.download-repost-again") }}" method="POST" class="newrepost-sector_btns" id="downloadRepostAgainForm">
                @csrf
                <input type="hidden" name="downloadRepostAgainInp" id="downloadRepostAgainInp">
                <a id="downloadRepostAgainButton"  class="newrepost-sector_btn" onclick="getCheckedBoxes('checkRepostAgain',this)">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 3C14.5808 3 16.8548 4.661 17.6748 7.045C20.1138 7.376 21.9998 9.472 21.9998 12C21.9998 13.221 21.5558 14.396 20.7498 15.309C20.5518 15.532 20.2768 15.647 19.9998 15.647C19.7648 15.647 19.5288 15.565 19.3378 15.397C18.9248 15.03 18.8848 14.399 19.2508 13.984C19.7338 13.438 19.9998 12.732 19.9998 12C19.9998 10.346 18.6538 9 16.9998 9H16.8998C16.4238 9 16.0138 8.664 15.9198 8.197C15.5458 6.345 13.8978 5 11.9998 5C10.1028 5 8.45376 6.345 8.08076 8.197C7.98676 8.664 7.57576 9 7.09976 9H6.99976C5.34576 9 3.99976 10.346 3.99976 12C3.99976 12.732 4.26576 13.438 4.74976 13.984C5.11476 14.399 5.07576 15.03 4.66176 15.397C4.24676 15.763 3.61576 15.722 3.25076 15.309C2.44376 14.396 1.99976 13.221 1.99976 12C1.99976 9.472 3.88576 7.376 6.32476 7.045C7.14576 4.661 9.41976 3 11.9998 3ZM13.0002 17.6439L14.3052 16.3839C14.7032 16.0009 15.3362 16.0119 15.7192 16.4089C16.1032 16.8069 16.0922 17.4399 15.6952 17.8229L12.6952 20.7199C12.5002 20.9059 12.2502 20.9999 12.0002 20.9999C11.7442 20.9999 11.4882 20.9029 11.2932 20.7069L8.29316 17.7069C7.90216 17.3169 7.90216 16.6839 8.29316 16.2929C8.68316 15.9029 9.31616 15.9029 9.70716 16.2929L11.0002 17.5859V11.9999C11.0002 11.4469 11.4482 10.9999 12.0002 10.9999C12.5522 10.9999 13.0002 11.4469 13.0002 11.9999V17.6439Z" fill="white"/>
                        </svg>

                    Скачать
                    </a>

            </form>
        </div>

        <div class="repost-content">
            <div class="repost-content_lab">
                <label class="repost-content_label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 11C5 7.691 7.691 5 11 5C14.309 5 17 7.691 17 11C17 14.309 14.309 17 11 17C7.691 17 5 14.309 5 11ZM20.707 19.293L17.312 15.897C18.365 14.543 19 12.846 19 11C19 6.589 15.411 3 11 3C6.589 3 3 6.589 3 11C3 15.411 6.589 19 11 19C12.846 19 14.543 18.365 15.897 17.312L19.293 20.707C19.488 20.902 19.744 21 20 21C20.256 21 20.512 20.902 20.707 20.707C21.098 20.316 21.098 19.684 20.707 19.293Z" fill="#8A92A6"/>
                </svg>
                    <input wire:model='searchTermOldReposts' class="repost-content_input" type="text" placeholder="Поиск">
                </label>

                <div class="repost-content_sector">
                    <label class="repost-content_labelN2">
                        <select class="repost-content_select">
                            <option class="repost-content">Уровень освед.</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0004 17L15.0004 4C15.0004 3.448 15.4474 3 16.0004 3C16.5534 3 17.0004 3.448 17.0004 4L17.0004 17.082L18.2104 15.524C18.5494 15.088 19.1784 15.009 19.6134 15.348C19.8674 15.545 20.0004 15.84 20.0004 16.138C20.0004 16.353 19.9324 16.569 19.7904 16.751L16.7904 20.613C16.5994 20.86 16.3044 21.002 15.9914 21C15.6804 20.998 15.3874 20.85 15.2004 20.6L12.2004 16.6C11.8694 16.157 11.9584 15.531 12.4004 15.2C12.8424 14.869 13.4694 14.958 13.8004 15.4L15.0004 17ZM8.00038 7.00004L8.00038 20C8.00038 20.552 7.55338 21 7.00038 21C6.44738 21 6.00038 20.552 6.00038 20L6.00038 6.91804L4.79038 8.47604C4.45138 8.91204 3.82238 8.99104 3.38738 8.65204C2.95038 8.31304 2.87138 7.68404 3.21038 7.24904L6.21038 3.38704C6.40138 3.14004 6.69638 2.99804 7.00938 3.00004C7.32038 3.00204 7.61338 3.15004 7.80038 3.40004L10.8004 7.40004C10.9354 7.58004 11.0004 7.79104 11.0004 7.99904C11.0004 8.30304 10.8624 8.60404 10.6004 8.80004C10.1584 9.13104 9.53138 9.04204 9.20038 8.60004L8.00038 7.00004Z" fill="#8A92A6"/>
                        </svg>
                    </label>

                    <label class="repost-content_labelN2">
                        <select class="repost-content_select">
                            <option class="repost-content">Уровень освед.</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0004 17L15.0004 4C15.0004 3.448 15.4474 3 16.0004 3C16.5534 3 17.0004 3.448 17.0004 4L17.0004 17.082L18.2104 15.524C18.5494 15.088 19.1784 15.009 19.6134 15.348C19.8674 15.545 20.0004 15.84 20.0004 16.138C20.0004 16.353 19.9324 16.569 19.7904 16.751L16.7904 20.613C16.5994 20.86 16.3044 21.002 15.9914 21C15.6804 20.998 15.3874 20.85 15.2004 20.6L12.2004 16.6C11.8694 16.157 11.9584 15.531 12.4004 15.2C12.8424 14.869 13.4694 14.958 13.8004 15.4L15.0004 17ZM8.00038 7.00004L8.00038 20C8.00038 20.552 7.55338 21 7.00038 21C6.44738 21 6.00038 20.552 6.00038 20L6.00038 6.91804L4.79038 8.47604C4.45138 8.91204 3.82238 8.99104 3.38738 8.65204C2.95038 8.31304 2.87138 7.68404 3.21038 7.24904L6.21038 3.38704C6.40138 3.14004 6.69638 2.99804 7.00938 3.00004C7.32038 3.00204 7.61338 3.15004 7.80038 3.40004L10.8004 7.40004C10.9354 7.58004 11.0004 7.79104 11.0004 7.99904C11.0004 8.30304 10.8624 8.60404 10.6004 8.80004C10.1584 9.13104 9.53138 9.04204 9.20038 8.60004L8.00038 7.00004Z" fill="#8A92A6"/>
                        </svg>
                    </label>
                </div>
            </div>
            <div class="repost-content_grid">
               <div class="repost-content_flex">
                <p class="repost-content_flex-name">Название</p>
                <p class="repost-content_flex-data">Дата выгрузки</p>
               </div>
            </div>
            <div class="scroll_reposts">
     
                @foreach ($user_reposts as $user_repost)
            <div class="repost-content_grid">
                <div class="repost-content_flex">
                 <span class="repost-content_flex-grid">
                      <input type="checkbox" name="checkRepostAgain" id="" value="{{ $user_repost->id }}" style="margin :0 10px">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M7.5 4.5H4.125C3.50368 4.5 3 5.00368 3 5.625V21.375C3 21.9963 3.50368 22.5 4.125 22.5H14.625C15.2463 22.5 15.75 21.9963 15.75 21.375V20.25H8.625C8.00368 20.25 7.5 19.7463 7.5 19.125V4.5Z" fill="#104772"/>
                        <path d="M21 2.625V3.75H19.125C18.9179 3.75 18.75 3.58211 18.75 3.375V1.5H19.875C20.4963 1.5 21 2.00368 21 2.625Z" fill="#104772"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.125 4.5H21V18.375C21 18.9963 20.4963 19.5 19.875 19.5H9.375C8.75368 19.5 8.25 18.9963 8.25 18.375V2.625C8.25 2.00368 8.75368 1.5 9.375 1.5H18V3.375C18 3.99632 18.5037 4.5 19.125 4.5ZM10.325 6C10.1179 6 9.94997 6.16789 9.94997 6.375C9.94997 6.58211 10.1179 6.75 10.325 6.75H12.975C13.1821 6.75 13.35 6.58211 13.35 6.375C13.35 6.16789 13.1821 6 12.975 6H10.325ZM9.94997 8.625C9.94997 8.41789 10.1179 8.25 10.325 8.25H18.925C19.1321 8.25 19.3 8.41789 19.3 8.625C19.3 8.83211 19.1321 9 18.925 9H10.325C10.1179 9 9.94997 8.83211 9.94997 8.625ZM10.325 10.5C10.1179 10.5 9.94997 10.6679 9.94997 10.875C9.94997 11.0821 10.1179 11.25 10.325 11.25H18.925C19.1321 11.25 19.3 11.0821 19.3 10.875C19.3 10.6679 19.1321 10.5 18.925 10.5H10.325ZM9.94997 13.125C9.94997 12.9179 10.1179 12.75 10.325 12.75H18.925C19.1321 12.75 19.3 12.9179 19.3 13.125C19.3 13.3321 19.1321 13.5 18.925 13.5H10.325C10.1179 13.5 9.94997 13.3321 9.94997 13.125ZM10.325 15C10.1179 15 9.94997 15.1679 9.94997 15.375C9.94997 15.5821 10.1179 15.75 10.325 15.75H18.925C19.1321 15.75 19.3 15.5821 19.3 15.375C19.3 15.1679 19.1321 15 18.925 15H10.325Z" fill="#104772"/>
                      </svg>
                      <p class="repost-content_flex-info">Отчет об обучении {{ $user_repost->user ? $user_repost->user->last_name : "" }} {{  $user_repost->user ? mb_substr($user_repost->user->first_name,0,1 ) : ""}}.{{ $user_repost->user ?  mb_substr($user_repost->user->fathers_name,0,1): "" }}</p>
                 </span>
                 <p class="repost-content_flex-deta">{{ $user_repost->created_at->format('H:i:s d-m-Y ') }}</p>
                </div>
            </div>
            @endforeach
            </div>


        </div>

        <div class="repost-popup" id="popup1">
            <div class="repost-popup_overlay"></div>
            <div class="repost-popup_content">
                <div class="repost-popup_close-btn" onclick="togglePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="repost-popup_title">Скачать отчет</h2>
                <label class="repost-popup_label">Название отчета</label>
                <input class="repost-popup_input" type="text">
                <a href="" onclick="togglePopup()" class="repost-popup_btn">Сохранить и скачать</a>
            </div>
        </div>

        <div class="user-slider" style="margin-top:30px">
         </div>
    </div>


    <div  class="newrepost" @if ($this->oldReposts)
        style="display:none"
         @endif>
        <h1 class="newrepost-title">Отчеты</h1>
        <div class="newrepost-up">
            <div class="newrepost-up_sector">
                <h1 class="newrepost-up_sector-title">Отчеты</h1>
                <div class="newrepost-up_sector-btn" onclick="togglePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 3C14.5808 3 16.8548 4.661 17.6748 7.045C20.1138 7.376 21.9998 9.472 21.9998 12C21.9998 13.221 21.5558 14.396 20.7498 15.309C20.5518 15.532 20.2768 15.647 19.9998 15.647C19.7648 15.647 19.5288 15.565 19.3378 15.397C18.9248 15.03 18.8848 14.399 19.2508 13.984C19.7338 13.438 19.9998 12.732 19.9998 12C19.9998 10.346 18.6538 9 16.9998 9H16.8998C16.4238 9 16.0138 8.664 15.9198 8.197C15.5458 6.345 13.8978 5 11.9998 5C10.1028 5 8.45379 6.345 8.08079 8.197C7.98679 8.664 7.57579 9 7.09979 9H6.99979C5.34579 9 3.99979 10.346 3.99979 12C3.99979 12.732 4.26579 13.438 4.74979 13.984C5.11479 14.399 5.07579 15.03 4.66179 15.397C4.24779 15.763 3.61579 15.722 3.25079 15.309C2.44379 14.396 1.99979 13.221 1.99979 12C1.99979 9.472 3.88579 7.376 6.32479 7.045C7.14579 4.661 9.41979 3 11.9998 3ZM11.305 11.2801C11.699 10.9041 12.322 10.9071 12.707 11.2931L15.707 14.2931C16.098 14.6841 16.098 15.3161 15.707 15.7071C15.512 15.9021 15.256 16.0001 15 16.0001C14.744 16.0001 14.488 15.9021 14.293 15.7071L13 14.4141V20.0001C13 20.5531 12.552 21.0001 12 21.0001C11.448 21.0001 11 20.5531 11 20.0001V14.3561L9.69499 15.6161C9.29799 16.0011 8.66499 15.9881 8.28099 15.5911C7.89699 15.1931 7.90799 14.5611 8.30499 14.1771L11.305 11.2801Z" fill="white"/>
                    </svg>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6901 7.84996C11.1935 7.09341 11.067 6.0823 10.3927 5.47312C9.71836 4.86394 8.69963 4.8404 7.99792 5.41779C7.2962 5.99517 7.1231 6.99935 7.59102 7.77835C8.05893 8.55735 9.02675 8.87624 9.86608 8.52796C10.2015 8.38801 10.4882 8.15215 10.6901 7.84996Z" stroke="#343A40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6901 18.1649C11.1935 17.4084 11.067 16.3972 10.3927 15.7881C9.71836 15.1789 8.69963 15.1553 7.99792 15.7327C7.2962 16.3101 7.1231 17.3143 7.59102 18.0933C8.05893 18.8723 9.02675 19.1912 9.86608 18.8429C10.2015 18.703 10.4882 18.4671 10.6901 18.1649V18.1649Z" stroke="#343A40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3101 13.0069C12.8067 12.2504 12.9332 11.2393 13.6075 10.6301C14.2818 10.0209 15.3006 9.99738 16.0023 10.5748C16.704 11.1522 16.8771 12.1563 16.4092 12.9353C15.9413 13.7143 14.9734 14.0332 14.1341 13.6849C13.7987 13.545 13.512 13.3091 13.3101 13.0069V13.0069Z" stroke="#343A40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 6.07593C10.5858 6.07593 10.25 6.41171 10.25 6.82593C10.25 7.24014 10.5858 7.57593 11 7.57593V6.07593ZM19 7.57593C19.4142 7.57593 19.75 7.24014 19.75 6.82593C19.75 6.41171 19.4142 6.07593 19 6.07593V7.57593ZM7.327 7.57593C7.74121 7.57593 8.077 7.24014 8.077 6.82593C8.077 6.41171 7.74121 6.07593 7.327 6.07593V7.57593ZM5 6.07593C4.58579 6.07593 4.25 6.41171 4.25 6.82593C4.25 7.24014 4.58579 7.57593 5 7.57593V6.07593ZM11 16.3919C10.5858 16.3919 10.25 16.7277 10.25 17.1419C10.25 17.5561 10.5858 17.8919 11 17.8919V16.3919ZM19 17.8919C19.4142 17.8919 19.75 17.5561 19.75 17.1419C19.75 16.7277 19.4142 16.3919 19 16.3919V17.8919ZM7.327 17.8919C7.74121 17.8919 8.077 17.5561 8.077 17.1419C8.077 16.7277 7.74121 16.3919 7.327 16.3919V17.8919ZM5 16.3919C4.58579 16.3919 4.25 16.7277 4.25 17.1419C4.25 17.5561 4.58579 17.8919 5 17.8919V16.3919ZM13 12.7339C13.4142 12.7339 13.75 12.3981 13.75 11.9839C13.75 11.5697 13.4142 11.2339 13 11.2339V12.7339ZM5 11.2339C4.58579 11.2339 4.25 11.5697 4.25 11.9839C4.25 12.3981 4.58579 12.7339 5 12.7339V11.2339ZM16.673 11.2339C16.2588 11.2339 15.923 11.5697 15.923 11.9839C15.923 12.3981 16.2588 12.7339 16.673 12.7339V11.2339ZM19 12.7339C19.4142 12.7339 19.75 12.3981 19.75 11.9839C19.75 11.5697 19.4142 11.2339 19 11.2339V12.7339ZM11 7.57593H19V6.07593H11V7.57593ZM7.327 6.07593H5V7.57593H7.327V6.07593ZM11 17.8919H19V16.3919H11V17.8919ZM7.327 16.3919H5V17.8919H7.327V16.3919ZM13 11.2339H5V12.7339H13V11.2339ZM16.673 12.7339H19V11.2339H16.673V12.7339Z" fill="#343A40"/>
            </svg>
        </div>

        <div class="newrepost-btns">
        <a wire:click="$emit('newReposts')" class="newrepost-btn newrepost-btn_active">Новый отчет</a>
            <a wire:click="$emit('oldReposts')" class="newrepost-btn">Предыдущий отчет</a>
        </div>
        <hr>
        <div class="newrepost-sector">
            <div class="">
                        <div class="newrepost-sector_select">
                    <label for="select" class="newrepost-sector_select-label">Период: </label>
                    <select id="repostFilterTime" class="newrepost-sector_select-sel" name="" aria-valuetext="Подразделение:" id="select" style="width:135px">
                        <option value="">За все время</option>
                        <option value="1">За первый квартал</option>
                        @if (\Carbon\Carbon::now()->month > 3)
                        <option value="2">За второй квартал</option>
                        @endif
                        @if (\Carbon\Carbon::now()->month > 6)
                        <option value="3">За третий квартал</option>
                        @endif
                        @if (\Carbon\Carbon::now()->month > 9)
                        <option value="4">За четвертый квартал</option>
                        @endif
                        <option value="month">За месяц</option>
                        <option value="year">За год</option>
                    </select>
                </div>
                 <div class="newrepost-sector_select">
                    <label for="select" class="newrepost-sector_select-label">Компетенции: </label>
                    <select id="repostFilterCompetetions" class="newrepost-sector_select-sel" name="competetion" aria-valuetext="Подразделение:" id="select">
                        <option value="">Все</option>
                        @foreach ($competetions as $competetion)
                        <option value="{{ $competetion->id }}">{{ $competetion->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="newrepost-sector_select">
                    <label for="select" class="newrepost-sector_select-label">Должность:  </label>
                    <select id="repostFilterPositions" class="newrepost-sector_select-sel" name="position" aria-valuetext="Подразделение:" id="select">
                        <option value="" >Все</option>
                        @foreach ($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="newrepost-sector_select">
                    <label for="select" class="newrepost-sector_select-label">Блок: </label>
                    <select id="repostFilterObjects" class="newrepost-sector_select-sel" name="object" aria-valuetext="Подразделение:" id="select">
                        <option value="">Все</option>
                        @foreach ($objects as $object)
                        <option value="{{ $object->id }}">{{ $object->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="newrepost-sector_select">
                    <label for="select" class="newrepost-sector_select-label">Подразделение: </label>
                    <select id="repostFilterSubdivisions" class="newrepost-sector_select-sel" name="subdivision" aria-valuetext="Подразделение:" id="select">
                        <option value="">Все</option>
                        @foreach ($subdivisions as $subdivision)
                        <option value="{{ $subdivision->id }}">{{ $subdivision->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="newrepost-sector_select">
                    <label for="select" class="newrepost-sector_select-label">Уровень компетенции: </label>
                    <select id="repostFilterLevel" class="newrepost-sector_select-sel" name="" aria-valuetext="Подразделение:" id="select">
                        <option value="">Все</option>
                        <option value="osvedomlen">Осведомленность</option>
                        <option value="znanie">Знание</option>
                        <option value="opit">Опыт</option>
                        <option value="master">Мастерство</option>
                        <option value="expert">Эксперт</option>
                    </select>
                </div>
                <br>
  <button onclick="filterUsers()" style="padding: 9px;
  background: #104772;
  border-radius: 10px;
  margin-top:10px;
  color: #fff;
  font-size: 10px;">Применить фильтр</button>
</div>

            <div class="newrepost-sector_btns">
                <button class="newrepost-sector_btn" onclick="downloadRepost()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 3C14.5808 3 16.8548 4.661 17.6748 7.045C20.1138 7.376 21.9998 9.472 21.9998 12C21.9998 13.221 21.5558 14.396 20.7498 15.309C20.5518 15.532 20.2768 15.647 19.9998 15.647C19.7648 15.647 19.5288 15.565 19.3378 15.397C18.9248 15.03 18.8848 14.399 19.2508 13.984C19.7338 13.438 19.9998 12.732 19.9998 12C19.9998 10.346 18.6538 9 16.9998 9H16.8998C16.4238 9 16.0138 8.664 15.9198 8.197C15.5458 6.345 13.8978 5 11.9998 5C10.1028 5 8.45376 6.345 8.08076 8.197C7.98676 8.664 7.57576 9 7.09976 9H6.99976C5.34576 9 3.99976 10.346 3.99976 12C3.99976 12.732 4.26576 13.438 4.74976 13.984C5.11476 14.399 5.07576 15.03 4.66176 15.397C4.24676 15.763 3.61576 15.722 3.25076 15.309C2.44376 14.396 1.99976 13.221 1.99976 12C1.99976 9.472 3.88576 7.376 6.32476 7.045C7.14576 4.661 9.41976 3 11.9998 3ZM13.0002 17.6439L14.3052 16.3839C14.7032 16.0009 15.3362 16.0119 15.7192 16.4089C16.1032 16.8069 16.0922 17.4399 15.6952 17.8229L12.6952 20.7199C12.5002 20.9059 12.2502 20.9999 12.0002 20.9999C11.7442 20.9999 11.4882 20.9029 11.2932 20.7069L8.29316 17.7069C7.90216 17.3169 7.90216 16.6839 8.29316 16.2929C8.68316 15.9029 9.31616 15.9029 9.70716 16.2929L11.0002 17.5859V11.9999C11.0002 11.4469 11.4482 10.9999 12.0002 10.9999C12.5522 10.9999 13.0002 11.4469 13.0002 11.9999V17.6439Z" fill="white"/>
                        </svg>

                    Скачать
                </button>
            </div>
        </div>

        <div class="newrepost-content">
            <div class="newrepost-content_lab">
                <label class="newrepost-content_label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 11C5 7.691 7.691 5 11 5C14.309 5 17 7.691 17 11C17 14.309 14.309 17 11 17C7.691 17 5 14.309 5 11ZM20.707 19.293L17.312 15.897C18.365 14.543 19 12.846 19 11C19 6.589 15.411 3 11 3C6.589 3 3 6.589 3 11C3 15.411 6.589 19 11 19C12.846 19 14.543 18.365 15.897 17.312L19.293 20.707C19.488 20.902 19.744 21 20 21C20.256 21 20.512 20.902 20.707 20.707C21.098 20.316 21.098 19.684 20.707 19.293Z" fill="#8A92A6"/>
                </svg>
                    <input wire:model="searchTerm" class="newrepost-content_input" type="search" placeholder="Поиск">
                </label>

                <div class="newrepost-content_sector">
                    <label class="newrepost-content_labelN2">
                        <select class="newrepost-content_select">
                            <option class="newrepost-content">Выше уровня профиля</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0004 17L15.0004 4C15.0004 3.448 15.4474 3 16.0004 3C16.5534 3 17.0004 3.448 17.0004 4L17.0004 17.082L18.2104 15.524C18.5494 15.088 19.1784 15.009 19.6134 15.348C19.8674 15.545 20.0004 15.84 20.0004 16.138C20.0004 16.353 19.9324 16.569 19.7904 16.751L16.7904 20.613C16.5994 20.86 16.3044 21.002 15.9914 21C15.6804 20.998 15.3874 20.85 15.2004 20.6L12.2004 16.6C11.8694 16.157 11.9584 15.531 12.4004 15.2C12.8424 14.869 13.4694 14.958 13.8004 15.4L15.0004 17ZM8.00038 7.00004L8.00038 20C8.00038 20.552 7.55338 21 7.00038 21C6.44738 21 6.00038 20.552 6.00038 20L6.00038 6.91804L4.79038 8.47604C4.45138 8.91204 3.82238 8.99104 3.38738 8.65204C2.95038 8.31304 2.87138 7.68404 3.21038 7.24904L6.21038 3.38704C6.40138 3.14004 6.69638 2.99804 7.00938 3.00004C7.32038 3.00204 7.61338 3.15004 7.80038 3.40004L10.8004 7.40004C10.9354 7.58004 11.0004 7.79104 11.0004 7.99904C11.0004 8.30304 10.8624 8.60404 10.6004 8.80004C10.1584 9.13104 9.53138 9.04204 9.20038 8.60004L8.00038 7.00004Z" fill="#8A92A6"/>
                        </svg>
                    </label>
                </div>
            </div>
            <hr>
            <div class="newrepost-content_grid">
                <div class="newrepost-content_grid-start">
                    <input onclick="selectAll(this)" type="checkbox"> <p>Сотрудник</p>
                </div>
                <p>Должность</p>
                <p>Блок</p>
                <p>Подразделение</p>
            </div>
            <hr>
            <form  action="/download-reposts" class="section1" id="section-reposts">
              @if($users)
     
@foreach ($users as $user)
              @php
                  $user_object = \App\Models\UserObject::where("user_id",$user->id)->orderBy("created_at",'desc')->first();
                  $user_subdivision = \App\Models\SubdivisionUser::where("user_id",$user->id)->orderBy("created_at",'desc')->first();
              @endphp
              <div class="newrepost-content_flex">
                  <div class="newrepost-content_grid-start">
                      <input class="select_user_chk" name="users[]" value="{{ $user->id }}" type="checkbox">
                      <div class="newrepost-content_grid-start_name">
                          <img src="{{ $user->avatar }}" alt="" style="border-radius: 50%;">
                          <p>{{ $user->last_name }} {{ $user->first_name }} {{ $user->fathers_name }}</p>
                      </div>
                  </div>
                  <p>{{ $user->position->name }}</p>
                  <p>{{ $user_object ? $user_object->object->name : ""  }}</p>
                  <p>{{ $user_subdivision ? $user_subdivision->subdivision->name : "" }}</p>

                  <div class="newrepost-content_grid-end">
                      <p></p>
                      <a onclick="openSection({{ $user->id }})">
                          <svg id="icon1" class="repost-icon1" xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0172 8.38113C19.3479 8.78651 19.3243 9.38375 18.9463 9.76215L13.104 15.6041C12.9081 15.8 12.6461 15.906 12.3744 15.906C12.1025 15.906 11.841 15.8002 11.6444 15.6041L5.8023 9.76203C5.39923 9.35848 5.39923 8.70527 5.8023 8.30278C6.20551 7.89909 6.85889 7.89909 7.26188 8.30266L12.3744 13.4147L17.4867 8.30278C17.8647 7.92434 18.4626 7.90067 18.868 8.23178L18.9464 8.30274L19.0172 8.38113Z" fill="#CFD1D8"/>
                          </svg>
                      </a>
                  </div>
              </div>
@foreach ($user->competetions->where("is_done",1) as $competetion)
        <div class="newrepost-content_section_passive newrepost-content_section-{{ $user->id }}" style="padding:20px;" id="section{{ $competetion->id }}" >
        <div class="newrepost-content_section-up">
            <p>Компетенции</p>
            <div style="position: relative;display:flex;height:26px">
                <p>Уровень осведомленности</p>
        <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}" id="user_graphic_hrs_first">
            </div>
            <div style="position: relative;display:flex;height:26px">
                <p>Уровень знания</p>
        <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}" id="user_graphic_hrs_second">
            </div>
            <div style="position: relative;display:flex;height:26px">
                <p>Уровень опыта</p>
        <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}" id="user_graphic_hrs_third">
            </div>
            <div style="position: relative;display:flex;height:26px">
                <p>Уровень мастерства</p>
        <hr class="user_graphic_hrs user_graphic_hrs{{ $competetion->id }}">
            </div>
            <div style="position: relative;display:flex">
                <p>Экспертный уровень</p>

            </div>
        </div>

                @php

                    $testArr = [];
                    $count_competetion_points = 0;

                                                 $competetionLevel = \App\Models\CompetetionLevel::where('competetion_id',  $competetion->competetion->id)->where('position_id', $user->position->id)->first();
$tests = $competetion->competetion->tests; // Assuming this retrieves the tests

$filteredTests = $tests->filter(function ($test) use ($competetionLevel) {
    return $test->indicator->level == $competetionLevel->level;
});






                    foreach($filteredTests as $test){
                     $test = \App\Models\UserTests::where("test_id",$test->id)->where("user_id",$user->id)->first();
                     if($test){
                        $count_competetion_points += $test->points;
                     }
                    }
                    $competetion_level = $competetion->level;

                @endphp
        <div>
            <div class="newrepost-content_section-last">
                <p class="table_competetion_name">{{ $competetion->competetion->name }}</p>

                <div class="newrepost-content_section-last_sector">

                    <div class="newrepost-content_section-last_sector-bar" style="width: 100%">

                        <span class="newrepost-content_section-last_sector-per"

                        style="@if($competetion_level < 2)
                                width:9%;
                                @elseif($competetion_level == 2)
                                width:29%;
                                @elseif($competetion_level == 3)
                                width:54%;
                                 @elseif($competetion_level == 4)
                                 width:74%;
                                 @elseif($competetion_level == 5)
                                  width:94%;
                                @endif
                                @if( $competetion_level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level < 2)
                                    background: linear-gradient(270deg, #FC6262 0%, #FFB4B4 100%);
                                    @elseif( $competetion_level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level >= 2)
                                background: linear-gradient(270deg, #F6A938 0.98%, #FFD598 100%);
                                @else
                                background: linear-gradient(270deg, #70C493 2.83%, #96F6BE 100%);
                                    @endif
                                    ">
                            @if( $competetion_level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level < 2)
                                <div class="recomended_text">
                                   <!-- <svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.5885L15.8771 9.5L33.2998 9.5L42.0111 24.5885L33.2998 39.6769L15.8771 39.6769L7.16581 24.5885Z" fill="white" stroke="#FC6262"/>
                                <path d="M25 35C30.5228 35 35 30.5228 35 25C35 19.4772 30.5228 15 25 15C19.4772 15 15 19.4772 15 25C15 30.5228 19.4772 35 25 35Z" fill="white"/>
                                <path d="M25 21V25" stroke="#FC6262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M25 29H25.01" stroke="#FC6262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>-->
                            <div style="right:-20px;" class="table_notice_icon"></div>
                                <div class="recomended_text_content">
                                    <span>{{$competetion->text}}</span>
                                </div>
                                </div>
                             @elseif( $competetion_level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $competetion_level >= 2)
                              <div class="recomended_text">
                              <div style="right:-20px;" class="table_book_icon"></div>                                  
                              <!--<img style="position: absolute;
                                                                        top: -9px;
                                                                        z-index: 99;
                                                                        right:-20px" src="/public/images/Group 37996.svg" />-->
                                <div class="recomended_text_content">
                                    <span>{{$competetion->text}}</span>
                                </div>
                                </div>

                            @elseif( $competetion_level == $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level)
                             <div class="recomended_text">
                             <div style="right:-20px;" class="table_complete_icon"></div>   
                             <!--<svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.8538L15.8771 9.76538L33.2998 9.76538L42.0111 24.8538L33.2998 39.9423L15.8771 39.9423L7.16581 24.8538Z" fill="white" stroke="#70C493"/>
                                <path d="M30.3327 21L22.9993 28.3333L19.666 25" stroke="#70C493" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>-->
                                <div class="recomended_text_content">
                                    <span>{{$competetion->text}}</span>
                                </div>
                                </div>
                             @elseif( $competetion_level > $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level )
                               <div class="recomended_text">
                                <div style="right:-20px;" class="table_star_icon"></div>  
                                <!--<svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.5885L15.8771 9.5L33.2998 9.5L42.0111 24.5885L33.2998 39.6769L15.8771 39.6769L7.16581 24.5885Z" fill="white" stroke="#70C493"/>
                                <path d="M25 17L26.7961 22.5279H32.6085L27.9062 25.9443L29.7023 31.4721L25 28.0557L20.2977 31.4721L22.0938 25.9443L17.3915 22.5279H23.2039L25 17Z" fill="#70C493"/>
                            </svg>-->
                                <div class="recomended_text_content">
                                    <span>{{$competetion->text}}</span>
                                </div>
                                </div>

                        @endif
                                </span>

                                <div class="per" style="width:@if( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==1 )9%  @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==2)29% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==3)54% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==4)74% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level == 5)94% @endif;
                                    ">
                                    <div class="per_per" >

                                    </div>
                                    </div>
                    </div>

                </div>

                <a onclick="openStats({{ $competetion->id }})">
                    <svg style="width:60px" class="secondIcon1 secondIcon-{{ $competetion->id }}"id="secondIcon{{ $competetion->id }}" xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0172 8.38113C19.3479 8.78651 19.3243 9.38375 18.9463 9.76215L13.104 15.6041C12.9081 15.8 12.6461 15.906 12.3744 15.906C12.1025 15.906 11.841 15.8002 11.6444 15.6041L5.8023 9.76203C5.39923 9.35848 5.39923 8.70527 5.8023 8.30278C6.20551 7.89909 6.85889 7.89909 7.26188 8.30266L12.3744 13.4147L17.4867 8.30278C17.8647 7.92434 18.4626 7.90067 18.868 8.23178L18.9464 8.30274L19.0172 8.38113Z" fill="#CFD1D8"/>
                    </svg>
                </a>
            </div>
            <hr>
            <div class="second1 section-{{ $competetion->id }}" id="second{{ $competetion->id }}">



                @foreach ($filteredTests as $test)
                @php
                    $test = \App\Models\UserTests::where("test_id",$test->id)->where("user_id",$user->id)->first();
                @endphp
               @if($test)
                 <div class="newrepost-content_section-second">
                    <div class="if_not_ll" > 
                 <p id="testText">{{ mb_strlen($test->test->indicator->name) > 91 ? mb_substr($test->test->indicator->name , 0, 91) . "..." : $test->test->indicator->name }}</p>
                  @if( mb_strlen($test->test->indicator->name) > 91)
                  
                    <div id="fullText">{{$test->test->indicator->name}}</div>
                  @endif
                  </div>

                    <div class="newrepost-content_section-last_sector" style="position: relative">



                        <div class="newrepost-content_section-last_sector-bar">
                            @php
                            if($test->points == 0){
                             $level = 0;
                            }elseif($test->points <= 0.5 && $test->points != 0 ){
                                $level = 1;
                            }elseif($test->points <= 1.5){
                            $level = 2;
                            }elseif($test->points <= 3){
                            $level = 3;
                            }elseif($test->points <= 5){
                            $level = 4;
                            }elseif($test->points <= 7.5){
                            $level = 5;
                            }
                            @endphp
                            <span class="newrepost-content_section-last_sector-per"
                             style="
                             @if($level == 1 || $level == 0)
                                width:9%;
                                @elseif($level == 2)
                                width:29%;
                                @elseif($level == 3)
                                width:54%;
                                 @elseif($level == 4)
                                 width:74%;
                                 @elseif($level == 5)
                                  width:94%;
                                @endif
                                @if( $level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $level  <= 1)
                                 background: linear-gradient(270deg, #FC6262 0%, #FFB4B4 100%);
                                @elseif($level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $level > 1)
                                background: linear-gradient(270deg, #F6A938 0.98%, #FFD598 100%);
                                @else
                                background: linear-gradient(270deg, #70C493 2.83%, #96F6BE 100%);
                                @endif

                        "
                        >
                                                @if( $level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $level  <= 1)
                                                    <div class="recomended_text">
                                   <!-- <svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.5885L15.8771 9.5L33.2998 9.5L42.0111 24.5885L33.2998 39.6769L15.8771 39.6769L7.16581 24.5885Z" fill="white" stroke="#FC6262"/>
                                <path d="M25 35C30.5228 35 35 30.5228 35 25C35 19.4772 30.5228 15 25 15C19.4772 15 15 19.4772 15 25C15 30.5228 19.4772 35 25 35Z" fill="white"/>
                                <path d="M25 21V25" stroke="#FC6262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M25 29H25.01" stroke="#FC6262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>-->
                            <div style="right:-20px;" class="table_notice_icon"></div>
                                <div class="recomended_text_content" style="top:0">
                                    <span>{{$test->text}}</span>
                                </div>
                                </div>

                             @elseif( $level < $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level && $level>1)
 <div class="recomended_text">
                              <div style="right:-20px;" class="table_book_icon"></div>                                  
                              <!--<img style="position: absolute;
                                                                        top: -9px;
                                                                        z-index: 99;
                                                                        right:-20px" src="/public/images/Group 37996.svg" />-->
                                <div class="recomended_text_content" style="top:0">
                                    <span>{{$test->text}}</span>
                                </div>
                                </div>



                           @elseif($level == $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level)
                             <div class="recomended_text">
                             <div style="right:-20px;" class="table_complete_icon"></div>   
                             <!--<svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.8538L15.8771 9.76538L33.2998 9.76538L42.0111 24.8538L33.2998 39.9423L15.8771 39.9423L7.16581 24.8538Z" fill="white" stroke="#70C493"/>
                                <path d="M30.3327 21L22.9993 28.3333L19.666 25" stroke="#70C493" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>-->
                                <div class="recomended_text_content" style="top:0">
                                    <span>{{$test->text}}</span>
                                </div>
                                </div>

                             @elseif($level> $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level )
<div class="recomended_text">
                                <div style="right:-20px;" class="table_star_icon"></div>  
                                <!--<svg style="right:-20px;" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.16581 24.5885L15.8771 9.5L33.2998 9.5L42.0111 24.5885L33.2998 39.6769L15.8771 39.6769L7.16581 24.5885Z" fill="white" stroke="#70C493"/>
                                <path d="M25 17L26.7961 22.5279H32.6085L27.9062 25.9443L29.7023 31.4721L25 28.0557L20.2977 31.4721L22.0938 25.9443L17.3915 22.5279H23.2039L25 17Z" fill="#70C493"/>
                            </svg>-->
                                <div class="recomended_text_content" style="top:0">
                                    <span>{{$test->text}}</span>
                                </div>
                                </div>

                        @endif
                        </span>
                        {{-- {{ dump($competetion->competetion->levels->where("position_id",$user->position_id)->first()->level) . "  " .  $test->performance }} --}}

                        <div class="per" style="width:@if( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==1 )9%  @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==2)29% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==3)54% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level ==4)74% @elseif( $competetion->competetion->levels->where("position_id",$user->position_id)->first()->level == 5)94% @endif;
                        ">
                            <div class="per_per" >

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
               @endif

                @endforeach

                  <hr>
            </div>
        </div>
        </div>

@endforeach
              <hr>
              @endforeach
              @endif




            </form>

        </div>

        {{-- {{ print_r(session('users')) }} --}}
        <div class="newrepost-popup" id="popup1">
            <div class="newrepost-popup_overlay"></div>
            <div class="newrepost-popup_content">
                <div class="newrepost-popup_close-btn" onclick="togglePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="newrepost-popup_title">Скачать отчет</h2>
                <label class="newrepost-popup_label">Название отчета</label>
                <input class="newrepost-popup_input" type="text">
                <a href="" onclick="togglePopup()" class="newrepost-popup_btn">Сохранить и скачать</a>
            </div>
        </div>
        <div class="user-slider" style="margin-top:30px">
           @if ($users)
           @if(!$this->usersFilter)
           {{ $users->links('livewire.pagination') }}
           @endif
           @endif
        </div>
    </div>
</div>
<script>
    function filterUsers(){
        let repost_competetions = document.getElementById('repostFilterCompetetions').value;
        let repost_positions = document.getElementById('repostFilterPositions').value;
        let repost_subdivisions = document.getElementById('repostFilterSubdivisions').value;
        let repost_objects = document.getElementById('repostFilterObjects').value;
        let repost_time = document.getElementById('repostFilterTime').value;
        let repost_level = document.getElementById('repostFilterLevel').value;
        window.livewire.emit("filterRepost",repost_competetions ,repost_positions , repost_subdivisions , repost_objects,repost_time,repost_level)
    }
    function downloadRepost(){
        var checkboxes = document.getElementsByName('users[]');
        var checkboxesChecked = [];
        // loop over them all
        for (var i=0; i<checkboxes.length; i++) {
            // And stick the checked ones onto an array...
            if (checkboxes[i].checked) {
                checkboxesChecked.push(checkboxes[i].value);
            }
        }
        if(checkboxesChecked.length > 0){
               document.getElementById("section-reposts").submit()

        }else{
            alert("Вы не выбрали сотрудников для скачивания")
        }
        // Return the array if it is non-empty, or null

         return checkboxesChecked.length > 0 ? checkboxesChecked : null;

    }

    function selectAll(inp){
        const select_user_chk = document.querySelectorAll('.select_user_chk');
        if(inp.checked == true){
            select_user_chk.forEach(element => {
            element.checked=true
        });
        }else{
            select_user_chk.forEach(element => {
            element.checked=false
        });
        }

    }
    function getCheckedBoxes(chkboxName) {
        document.getElementById('downloadRepostAgainButton').addEventListener("click", function(event){
              event.preventDefault()
            });
        var checkboxes = document.getElementsByName(chkboxName);
        var checkboxesChecked = [];
        // loop over them all
        for (var i=0; i<checkboxes.length; i++) {
            // And stick the checked ones onto an array...
            if (checkboxes[i].checked) {
                checkboxesChecked.push(checkboxes[i].value);
            }
        }
        if(checkboxesChecked.length > 0){
              document.getElementById('downloadRepostAgainInp').value = checkboxesChecked
                document.getElementById('downloadRepostAgainForm').submit()

        }else{
            alert("Вы не выбрали сотрудников для скачивания")
        }
        // Return the array if it is non-empty, or null

         return checkboxesChecked.length > 0 ? checkboxesChecked : null;
}
function openSection(id){
document.querySelectorAll(`.newrepost-content_section-${id}`).forEach(e=>{
e.classList.toggle("active");
})
document.querySelectorAll(`.newrepost-icon-${id}`).forEach(e=>{
e.classList.toggle("active");
})
}
</script>
</div>
