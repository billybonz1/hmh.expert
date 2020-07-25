@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')

    <div class="profile">
        <div class="inner">

                @include('layouts._profileMenu')

                <div class="profile-content">
                    <h1>Настройки эксперта</h1>


                    @include('partials.profileContentMenu')

                    @include('partials.alerts')

                    <form action="/profile/expert" method="post" class="main-form">
                        @csrf
                        <div class="profile-experts-cont">
                            <div>Отметьте галочками практики, котрые Вам подходят:</div>
                            <div class="profile-experts-cats">
                                 @include('profile._categories')
                            </div>
                        </div>
                        
                        <label>
                            <div>Должность:</div>
                            <span style="position: relative;">
                                <input type="text" id="post" class="form-control" name="post" value="{{ $currentUser->post }}"/>
                                <div></div>
                            </span>
                        </label>
                        
                        <label>
                            <div>Опыт работы:</div>
                            <span style="position: relative;">
                                <input type="text" id="exp" class="form-control" name="exp" value="{{ $currentUser->exp }}"/>
                                <div></div>
                            </span>
                        </label>
                        
                        
                        <label>
                            <div>Обо мне:</div>
                            <span style="position: relative;">
                                <textarea id="about" class="form-control" name="about">{{ $currentUser->about }}</textarea>
                                <div></div>
                            </span>
                        </label>

                        <label>
                            <div>Темы консультирования:</div>
                            <span style="position: relative;">
                                <textarea id="consulting_themes" class="form-control" name="consulting_themes">{{ $currentUser->consulting_themes }}</textarea>
                                <div></div>
                            </span>
                        </label>

                        <button type="submit">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
