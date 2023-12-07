
<div class="client_header">
    <div class="client_header_content">
        <div class="client_header_left">
        </div>
        <div class="client_header_right">
            <div class="client_header_right_content">
                <div class="client_header_right_icons">
                    <a  class="menu_burger" ><img id="menu_burger" src="https://www.svgrepo.com/show/506800/burger-menu.svg" alt=""></a>
                   
                  @livewire('client.notifications')
                    <a href="{{ route("login.post") }}" id="logout_icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 5C8 5.55 7.55 6 7 6H6V18H7C7.55 18 8 18.45 8 19C8 19.55 7.55 20 7 20H5C4.45 20 4 19.55 4 19V5C4 4.45 4.45 4 5 4H7C7.55 4 8 4.45 8 5ZM18.0039 7.4248L20.8179 11.4248C21.0679 11.7788 21.0599 12.2538 20.7999 12.5998L17.7999 16.5998C17.6039 16.8618 17.3029 16.9998 16.9989 16.9998C16.7909 16.9998 16.5799 16.9348 16.3999 16.7998C15.9579 16.4688 15.8689 15.8418 16.1999 15.4008L18.0009 12.9998H17.9999H9.9999C9.4479 12.9998 8.9999 12.5528 8.9999 11.9998C8.9999 11.4468 9.4479 10.9998 9.9999 10.9998H17.9999C18.0164 10.9998 18.0317 11.0044 18.0472 11.0089C18.0598 11.0127 18.0724 11.0165 18.0859 11.0178L16.3679 8.5748C16.0499 8.1238 16.1589 7.4998 16.6109 7.1818C17.0619 6.8628 17.6859 6.9728 18.0039 7.4248Z" fill="#343A40"/>
                        </svg>
                        </a>
                </div>
                <div class="client_header_right_profile"   onclick="ProfileOnclick()"> 
                    <div class="client_header_right_profile_image">
                        <img style="width:50px;height:50px; border-radius: 50%;" src="{{ $user->avatar }}" alt="">
                    </div>
                    <div class="client_header_right_profile_fullname">
                        <h4>{{ $user->last_name }} {{ $user->first_name }} {{ $user->fathers_name }}</h4>
                        <p style="display:inline">{{ $position->name }}</p>
                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M18.5172 8.38113C18.8479 8.78651 18.8243 9.38375 18.4463 9.76215L12.604 15.6041C12.4081 15.8 12.1461 15.906 11.8744 15.906C11.6025 15.906 11.341 15.8002 11.1444 15.6041L5.3023 9.76203C4.89923 9.35848 4.89923 8.70527 5.3023 8.30278C5.70551 7.89909 6.35889 7.89909 6.76188 8.30266L11.8744 13.4147L16.9867 8.30278C17.3647 7.92434 17.9626 7.90067 18.368 8.23178L18.4464 8.30274L18.5172 8.38113Z" fill="#343A40"/>
</svg>

                    </div>
                    @if ($user->role_id == 2 || $user->role_id == 4) 
                    <div   class="client_header_right_profile-onclick" id="profile-onclick" >
                            @if (Request::is("admin/*"))
                            <a style="    padding: 5px;
                            transition: all 0.3s ease-in-out;
                            border-radius: 8px;" href="/client">перейти в режим обучения</a>
                                
                            @else
                              @if ($user->role_id == 2 ) 
                            <a href="/admin/dashboard">перейти в режим Админа</a>
                            @else
                                                        <a href="/admin/users">перейти в режим Руководителя</a>
@endif
                                
                            @endif
                        </div>
                    @elseif($user->role_id == 3)
                    <div   class="client_header_right_profile-onclick" id="profile-onclick" >
                            @if (Request::is("admin/*"))
                            <a style="padding: 5px;
                            transition: all 0.3s ease-in-out;
                            border-radius: 8px;" href="/client">перейти в режим обучения</a>
                                
                            @else
                            <a href="/admin/dashboard">перейти в режим Админа</a>
                                
                            @endif
                            <a href="/admin/roles">Права доступа</a>
                        </div>
                    @endif
                   
                </div>

               
            </div>
        </div>
    </div>
</div>