@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')

    <div class="profile">
        <div class="inner">
            
            @include('layouts._profileMenu')
            
            <div class="profile-content">
                <h1>Сменить пароль</h1>
        
                
                @include('partials.profileContentMenu')
                
                @include('partials.alerts')
                
                <form action="/profile/password" method="post" class="main-form">
                    @csrf
                    <label>
                        <div>Текущий пароль:</div>
                        <span style="position: relative;">
                            <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current-password" value="" required   />
                            <div></div>
                            @error('current-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>
                    
                    <label>
                        <div>Новый пароль:</div>
                        <span style="position: relative;">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required   />
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
                            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                            <div></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>
                            
                    <button type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection