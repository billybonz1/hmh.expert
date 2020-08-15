@extends('website.website')

@section('content')
<div class="register-block">
    <div class="inner">
        <form action="{{ route('register') }}" class="main-form" method="post">
            @csrf
            <h1>Регистрация</h1>
            <label>
                <div>Имя:</div>
                <span style="position: relative;">
                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                    <div></div>
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </span>
            </label>
            
            
            <label>
                <div>Фамилия:</div>
                <span style="position: relative;">
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                    <div></div>
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </span>
            </label>
            
            
            <label>
                <div>E-mail:</div>
                <span style="position: relative;">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                    <div></div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </span>
            </label>
            
            
            <label>
                <div>Никнейм:</div>
                <span style="position: relative;">
                    <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autofocus>
                    <div></div>
                    @error('nickname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </span>
            </label>
            
            
            <label>
                <div>Дата рождения:</div>
                <span style="position: relative;">
                    <input id="born_at" type="date" class="form-control @error('born_at') is-invalid @enderror" name="born_at" value="{{ old('born_at') }}" required autofocus>
                    <div></div>
                    @error('born_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </span>
            </label>
            
            
            <label>
                <div>Страна:</div>
                <span style="position: relative;">
                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autofocus>
                    <div></div>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </span>
            </label>
            
            
            <label>
                <div>Пароль:</div>
                <span style="position: relative;">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div></div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </span>
            </label>
            
            
            <label>
                <div>Подтверждения пароля:</div>
                <span style="position: relative;">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <div></div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </span>
            </label>
            
            
            <label>
                <div>Капча</div>
                <div class="captcha">
                    <div>
                        {!! captcha_img() !!}
                    </div>
                    <button class="btn-refresh">Обновить капчу</button>
                    <span style="position: relative;">    
                        <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" required>
                        <div></div>
                        @error('captcha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </span>
                </div>
                
            </label>
 
            <div style="text-align: center;">
                <button type="submit">
                    Регистрация
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelector(".btn-refresh").addEventListener("click", function(e){
        e.preventDefault();
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/refresh_captcha');
        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                document.querySelector(".captcha div").innerHTML = data.captcha;
            }
            else {
                alert('Request failed.  Returned status of ' + xhr.status);
            }
        };
        xhr.send();
    });
    
</script>

@endsection
