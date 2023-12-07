@extends('components.head')
@section('code')
<style>
 input {
    width: 100%;
    height: 46px;
    padding-left: 10px;
    color:  #104772;
    border-radius: 20px;
    font-family: 'Inter';
    font-size: 18px;
    font-weight: 400;
    line-height: 22px;
    letter-spacing: 0.01em;
    text-align: left;

}
h3{
    color: #104772;
}
</style>
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
                        <svg onclick="window.location.href = '{{ route("admin.literature") }}'" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6189 18.5172C15.2135 18.8479 14.6162 18.8243 14.2379 18.4463L8.39586 12.604C8.20002 12.4081 8.09401 12.1461 8.09401 11.8744C8.09401 11.6025 8.19984 11.341 8.39586 11.1444L14.238 5.3023C14.6415 4.89923 15.2947 4.89923 15.6972 5.3023C16.1009 5.70551 16.1009 6.35889 15.6973 6.76188L10.5853 11.8744L15.6972 16.9867C16.0757 17.3647 16.0993 17.9626 15.7682 18.368L15.6973 18.4464L15.6189 18.5172Z" fill="#343A40"/>
                        </svg>
                    </div>                            
                    <div class="admin_literature_content_up_button">

                    </div>
                </div>

                </select>
                <div class="admin_literature_content_down">
                    <div class="admin_literature_content_down_literature">
                        <form method="POST" action="/update_literature/{{ $literature->id }}" class="admin_edit_literature_select" style="padding: 30px"  enctype="multipart/form-data">
                            @csrf
                            <h3>Название</h3>
                            <input style="width:50%;border:1px solid #104772;" type="text" name="name" id="" value="{{ $literature->name }}" class="user-popup_input">
                            <h3>Компетенция</h3>
                            <select style="width:50%;border:1px solid #104772;" required name="competetion_id"  class="user-popup-sector_select" >
                                <option selected value="{{ $literature->competetion->id }}">{{ $literature->competetion->name }}</option> 
                                @foreach ($competetions as $competetion)
                                <option value="{{ $competetion->id }}">{{ $competetion->name }}</option> 
                                @endforeach
                                </select>
                            <h3>Файл</h3>
                            <a href="{{ $literature->file }}" target="_blank"><svg width="75" height="35" fill="#104772" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 442.04 442.04" xml:space="preserve" stroke="#104772"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203 c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219 c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367 c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021 c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212 c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071 c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z"></path> </g> <g> <path d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188 c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993 c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5 s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z"></path> </g> <g> <path d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z"></path> </g> </g> </g></svg></a>
                            <input name="file" onchange="readFile(this)" type="file" id="literature_file">
                            <button class="position-sector_download">
                                <svg class="literature_file_load" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 2.99988C14.5808 2.99988 16.8548 4.66088 17.6748 7.04488C20.1138 7.37588 21.9998 9.47188 21.9998 11.9999C21.9998 13.2209 21.5558 14.3959 20.7498 15.3089C20.5518 15.5319 20.2768 15.6469 19.9998 15.6469C19.7648 15.6469 19.5288 15.5649 19.3378 15.3969C18.9248 15.0299 18.8848 14.3989 19.2508 13.9839C19.7338 13.4379 19.9998 12.7319 19.9998 11.9999C19.9998 10.3459 18.6538 8.99988 16.9998 8.99988H16.8998C16.4238 8.99988 16.0138 8.66388 15.9198 8.19688C15.5458 6.34488 13.8978 4.99988 11.9998 4.99988C10.1028 4.99988 8.45376 6.34488 8.08076 8.19688C7.98676 8.66388 7.57576 8.99988 7.09976 8.99988H6.99976C5.34576 8.99988 3.99976 10.3459 3.99976 11.9999C3.99976 12.7319 4.26576 13.4379 4.74976 13.9839C5.11476 14.3989 5.07576 15.0299 4.66176 15.3969C4.24776 15.7629 3.61576 15.7219 3.25076 15.3089C2.44376 14.3959 1.99976 13.2209 1.99976 11.9999C1.99976 9.47188 3.88576 7.37588 6.32476 7.04488C7.14576 4.66088 9.41976 2.99988 11.9998 2.99988ZM11.305 11.28C11.699 10.904 12.322 10.907 12.707 11.293L15.707 14.293C16.098 14.684 16.098 15.316 15.707 15.707C15.512 15.902 15.256 16 15 16C14.744 16 14.488 15.902 14.293 15.707L13 14.414V20C13 20.553 12.552 21 12 21C11.448 21 11 20.553 11 20V14.356L9.69496 15.616C9.29796 16.001 8.66496 15.988 8.28096 15.591C7.89696 15.193 7.90796 14.561 8.30496 14.177L11.305 11.28Z" fill="white"/>
                                </svg>
                                <svg class="literature_file_loaded" style="display: none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256"
                                style="fill:#000000;">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M20.29297,5.29297l-11.29297,11.29297l-4.29297,-4.29297l-1.41406,1.41406l5.70703,5.70703l12.70703,-12.70703z"></path></g></g>
                            </svg>
                                <span id="add_literature_btn_text">Изменить</span>  
                            </button>
                       <div style="margin-top: 30px">
                        <button type="submit" class="user-popup_btn">Сохранить</button>
                       </div>
                    </form> 
                    </div>
                </div>
        </div>
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
            </script>
@endsection