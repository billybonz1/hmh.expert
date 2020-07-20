@extends('website.website')

@section('content')
<div class="login-block">
    <div class="inner">
        <form action="{{ route('login') }}" class="main-form" method="post">
            @csrf
            <h1>Авторизация</h1>
            <label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Введите e-mail" />
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{!! form_error_message('email', $errors) !!}</strong>
                    </span>
                @enderror
            </label>
            <label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Введите пароль" />
                
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{!! form_error_message('password', $errors) !!}</strong>
                    </span>
                @enderror
            </label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Запомнить меня
                </label>
            </div>
            <div class="main-form-urls">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Забыли пароль?</a>
                @endif
                <a href="{{ route('register') }}">Регистрация</a>
            </div>
            <div style="text-align: center;">
                <button>Войти</button>
            </div>
        </form>
    </div>
</div>
@endsection
