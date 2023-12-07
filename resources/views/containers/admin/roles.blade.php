@extends('components.head')

@section('code')
    <div class="sect">
       <x-admin-sidebar></x-admin-sidebar>
        <x-client-header></x-client-header>
        <div class="admin">
            @if (session('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session()->pull('success') }}
                </div>
                <script>
               
                    let error = document.querySelector('.alert-success');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);
                </script>
            @endif
            <style>
                @media (max-width:1168px) {
                    .user_changes {
                        width: 128px;
                        height: 80px;
                        border-radius: 10px;
                        background: #f3f3f3;
                        position: absolute;
                        left: -53px;
                        bottom: -19px;
                        margin: 40px;
                        z-index: 100;
                        padding: 10px;
                    }
                }
            </style>
            <h1 class="admin-title">Права доступа</h1>

            <div class="admin-content">
                <div class="admin-content_sector">
                    <p class="admin-content_sector-p">Сотрудник</p>
                    <p class="admin-content_sector-p">Должность</p>
                    <p class="admin-content_sector-p">Роль</p>
                </div>
                <hr>
                @foreach ($users as $user)
                    <div class="admin-content_sector">
                        <div class="admin-content_sector-user">
                            <img src="{{ $user->avatar }}" alt="" style="border-radius: 50%">
                            <p class="admin-content_sector-user_name">{{ $user->last_name }} {{ $user->first_name }}
                                {{ $user->fathers_name }}</p>
                        </div>
                        <p class="admin-content_sector_info">{{ $user->position->name }}</p>
                        <div class="change_roles">
                            <?php if($user->role != null) { ?> <p class="admin-content_sector_info hover">{{ $user->role->name }}</p>
                            <?php } ?>
                            <form action="/change-role/{{ $user->id }}" class="user_changes_div" method="POST">
                                @method('PUT')
                                @csrf
                                <a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                        viewBox="0 0 25 24" fill="none">
                                        <path
                                            d="M12.5 20C12.7652 20 13.0196 19.8946 13.2071 19.7071C13.3946 19.5196 13.5 19.2652 13.5 19C13.5 18.7348 13.3946 18.4804 13.2071 18.2929C13.0196 18.1054 12.7652 18 12.5 18C12.2348 18 11.9804 18.1054 11.7929 18.2929C11.6054 18.4804 11.5 18.7348 11.5 19C11.5 19.2652 11.6054 19.5196 11.7929 19.7071C11.9804 19.8946 12.2348 20 12.5 20ZM12.5 13C12.7652 13 13.0196 12.8946 13.2071 12.7071C13.3946 12.5196 13.5 12.2652 13.5 12C13.5 11.7348 13.3946 11.4804 13.2071 11.2929C13.0196 11.1054 12.7652 11 12.5 11C12.2348 11 11.9804 11.1054 11.7929 11.2929C11.6054 11.4804 11.5 11.7348 11.5 12C11.5 12.2652 11.6054 12.5196 11.7929 12.7071C11.9804 12.8946 12.2348 13 12.5 13ZM12.5 6C12.7652 6 13.0196 5.89464 13.2071 5.70711C13.3946 5.51957 13.5 5.26522 13.5 5C13.5 4.73478 13.3946 4.48043 13.2071 4.29289C13.0196 4.10536 12.7652 4 12.5 4C12.2348 4 11.9804 4.10536 11.7929 4.29289C11.6054 4.48043 11.5 4.73478 11.5 5C11.5 5.26522 11.6054 5.51957 11.7929 5.70711C11.9804 5.89464 12.2348 6 12.5 6Z"
                                            stroke="#8A92A6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <div class="user_changes" style="  left: -150px;">
                                    <div class="user_changes_content">
                                        <button>
                                            @if ($user->role != null && $user->role_id == 2 || $user->role_id == 4)
                                                <input id="userCurrentRole{{ $user->id }}" name="role_student"
                                                    type="radio">
                                            @endif

                                            <label for="userCurrentRole{{ $user->id }}">Студент</label>
                                        </button>
                                        <br>
                                        <button>
                                            @if ($user->role != null && $user->role_id == 1 || $user->role_id == 4)
                                                <input id="userChangeRole{{ $user->id }}" name="role_admin"
                                                    type="radio">
                                            @endif

                                            <label for="userChangeRole{{ $user->id }}">Администратор</label>
                                        </button>
                                        <br/>
                                        <button>
                                            @if ($user->role != null && $user->role_id != 4)
                                                <input id="userChangeRoleRukovaditel{{ $user->id }}" name="role_rukovoditel"
                                                    type="radio">
                                            @endif

                                            <label for="userChangeRoleRukovaditel{{ $user->id }}">Руководитель</label>
                                        </button>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <hr>
                @endforeach

            </div>

            <div class="user-slider" style="margin-top:30px">
                @if ($users)
           {{ $users->links('pagination::default') }}
           @endif 
            </div>
        </div>
    
    </div>
    
@endsection
