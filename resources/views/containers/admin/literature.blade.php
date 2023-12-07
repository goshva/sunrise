@extends('components.head')
@section('code')
    <div class="sect">
        <x-admin-sidebar></x-admin-sidebar>
        <x-client-header></x-client-header>
        <div class="admin_literature">
            <div class="admin_literature_content">
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
                <div class="admin_literature_content_up">
                    <div class="admin_literature_content_up_name">
                        <h3>Учебные материалы</h3>
                    </div>
                    <div class="admin_literature_content_up_button">
                        <button class="position-sector_download" id="add-literature-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 2.99988C14.5808 2.99988 16.8548 4.66088 17.6748 7.04488C20.1138 7.37588 21.9998 9.47188 21.9998 11.9999C21.9998 13.2209 21.5558 14.3959 20.7498 15.3089C20.5518 15.5319 20.2768 15.6469 19.9998 15.6469C19.7648 15.6469 19.5288 15.5649 19.3378 15.3969C18.9248 15.0299 18.8848 14.3989 19.2508 13.9839C19.7338 13.4379 19.9998 12.7319 19.9998 11.9999C19.9998 10.3459 18.6538 8.99988 16.9998 8.99988H16.8998C16.4238 8.99988 16.0138 8.66388 15.9198 8.19688C15.5458 6.34488 13.8978 4.99988 11.9998 4.99988C10.1028 4.99988 8.45376 6.34488 8.08076 8.19688C7.98676 8.66388 7.57576 8.99988 7.09976 8.99988H6.99976C5.34576 8.99988 3.99976 10.3459 3.99976 11.9999C3.99976 12.7319 4.26576 13.4379 4.74976 13.9839C5.11476 14.3989 5.07576 15.0299 4.66176 15.3969C4.24776 15.7629 3.61576 15.7219 3.25076 15.3089C2.44376 14.3959 1.99976 13.2209 1.99976 11.9999C1.99976 9.47188 3.88576 7.37588 6.32476 7.04488C7.14576 4.66088 9.41976 2.99988 11.9998 2.99988ZM11.305 11.28C11.699 10.904 12.322 10.907 12.707 11.293L15.707 14.293C16.098 14.684 16.098 15.316 15.707 15.707C15.512 15.902 15.256 16 15 16C14.744 16 14.488 15.902 14.293 15.707L13 14.414V20C13 20.553 12.552 21 12 21C11.448 21 11 20.553 11 20V14.356L9.69496 15.616C9.29796 16.001 8.66496 15.988 8.28096 15.591C7.89696 15.193 7.90796 14.561 8.30496 14.177L11.305 11.28Z" fill="white"/>
                              </svg>
                              Загрузить  
                        </button>
                    </div>
                </div>
                <div class="admin_literature_content_down">
                    <div class="admin_literature_content_down_literature">
                        <div  class="admin_literature_content_down_literature_up">
                            <div style="width:50%" class="admin_literature_content_down_literature_up_competetion">
                                <h5>Компетенция</h5>
                            </div>
                            <div style="width:30%" class="admin_literature_content_down_literature_up_date">
                                <h5>Дата изменений</h5>
                            </div>
                            <div style="width:20%" class="admin_literature_content_down_literature_up_change"></div>
                        </div>
                        <div class="admin_literature_content_down_literature_down">
                            @foreach ($literatures as $literature)
                            <div class="constructor-content_flex">
                               <div style="width:60%"> <p onclick="togglePopup()" class="constructor-content_flex-info_link">{{ $literature->name }}</p></div>
                           <div style="width:30%">     <p class="constructor-content_flex-info">{{ $literature->updated_at->format('H:i:s d-m-Y ') }} </p></div>
                                <div style="width:10%" class="constructor-content_flex-a">
                                    <a href="/admin/edit_literature/{{ $literature->id }}"><svg class="change-literature-popup-btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13" stroke="#104772" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.5 2.50023C18.8978 2.1024 19.4374 1.87891 20 1.87891C20.5626 1.87891 21.1022 2.1024 21.5 2.50023C21.8978 2.89805 22.1213 3.43762 22.1213 4.00023C22.1213 4.56284 21.8978 5.1024 21.5 5.50023L12 15.0002L8 16.0002L9 12.0002L18.5 2.50023Z" stroke="#104772" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></a>
                                    </a>
                    
                                    <form id="delete-literature{{ $literature->id }}'' action="/test/delete/{{ $literature->id }}">
                                        @csrf
                                        @method('delete')
                                        <a href="/deleteLiterature/{{ $literature->id }}" style="background: none">
                                            <svg fill="#eb0000" height="15px" width="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#eb0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon points="512,59.076 452.922,0 256,196.922 59.076,0 0,59.076 196.922,256 0,452.922 59.076,512 256,315.076 452.922,512 512,452.922 315.076,256 "></polygon> </g> </g> </g>
                                            </svg></a>
                                    </form>
                                </div>
                            </div>
                            <hr>
                               @endforeach
                    
                    
                                
                            </div> 
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="user-popup literature_add_popup" id="add-literature-popup">
            <div class="user-popup_overlay" id="literature_add-popup_overlay"></div>
            <form class="user-popup_content" method="POST" action="{{ route("admin.create-literature") }}" enctype="multipart/form-data">
                @csrf
                <div class="user-popup_close-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#343A40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="user-popup_title">Добавить Литературу</h2>
                <div class="user-popup_sectors">
                    <div class="user-popup-sector">
                        <label class="user-popup_label">Название</label>
                        <input class="user-popup_input" type="text" name="name" id="">
                    </div>
                    <div class="user-popup-sector">
                        <label class="user-popup_label">Выбрать компетенцию</label>
                        <select required name="competetion"  class="user-popup-sector_select" >
                        @foreach ($competetions as $competetion)
                        <option selected value="{{ $competetion->id }}">{{ $competetion->name }}</option> 
                        @endforeach
                        </select>
                    </div>
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
        
        <script>

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
                const add_literature_btn = document.getElementById("add-literature-button")
                    add_literature_btn.addEventListener("click",()=>{
                    const add_literature_popup = document.getElementById("add-literature-popup")
                    add_literature_popup.classList.add("active")
                                document.body.classList.add("body-lock")
                    setTimeout(() => {
                        document.getElementById('literature_add-popup_overlay').addEventListener('click',(event) =>{
                            
                                add_literature_popup.classList.remove("active")
                        
                                document.body.classList.remove("body-lock")
                                
                    });   
                    }, 100);
                    })
        
            

        </script>
@endsection