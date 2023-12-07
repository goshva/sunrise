@extends('components.head')
<link rel="stylesheet" href="/public/css/auth.css">
@section('code')

    <div class="login">
        <div class="login_content">
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
            <form action="{{ route("login.post") }}" method="POST" class="login_info">
                @csrf
                <div class="login_info_up">
                    <h2>Вход</h2>
                </div>

                <div class="login_info_middle">
                    <div class="login_email">
                        <span>Email</span>
                        <input type="text" value="{{ old('email') }}" name="email" id="">
                    </div>
                    <div class="login_pass">
                        <span>Пароль</span>
                        <input value="{{ old('password') }}" type="password" name="password" id="">
                    </div>
                </div>
                <div class="login_info_down">
                    <div class="login_info_down_btn">
                        <button>Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection