@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')


    <div class="profile">
        <div class="inner">

            @include('layouts._profileMenu')






            <div class="profile-content">
                <h1>Аккаунт</h1>
                @include('partials.alerts')

                @include('partials.profileContentMenu')



                <form action="/profile/avatar" enctype="multipart/form-data" id="avatarForm" method="post" class="main-form">
                    @csrf
                    <label>
                        <div>Аватар:</div>
                        <span style="position: relative;">
                            <input type="file" id="avatar" name="avatar" class="inputfile form-control @error('avatar') is-invalid @enderror" required>
                            <label for="avatar">Выберите картинку</label>
                            <div></div>


                            <span class="current-avatar">
                                @if($currentUser->avatar)
                                    <img src="{{ $currentUser->avatar() }}" alt="{{ $currentUser->name }} {{ $currentUser->lastname }}">
                                @else
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="{{ $currentUser->name }} {{ $currentUser->lastname }}">
                                @endif
                            </span>

                        </span>
                    </label>
                    <input type="hidden" name="x" value="" />
                    <input type="hidden" name="y" value="" />
                    <input type="hidden" name="width" value="" />
                    <input type="hidden" name="height" value="" />
                </form>

                <form action="/profile" method="post" class="main-form">
                    @csrf
                    <label>
                        <div>Имя:</div>
                        <span style="position: relative;">
                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $currentUser->firstname }}" required  autofocus  />
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
                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $currentUser->lastname }}" required  autofocus  />
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
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $currentUser->email }}" required autocomplete="email" autofocus  />
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
                            <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ $currentUser->nickname }}" required autofocus  />
                            <div></div>
                            @error('nickname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>
                    <div>
                        Ссылка профиля:<a href="#"> </a>
                    </div>
                    
                    <input type="hidden" name="change-email" value="0" />
                    <button type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </div>


    <div id="cropImagePopup" class="total-popup">
        <div> 
            <div>
                <img id="cropImage" />
            </div>
            <button id="uploadAvatar" class="btn">
                Загрузить аватар
            </button>
            <div class="total-popup-close crop-close">x</div>
        </div>
    </div>



    <link rel="stylesheet" href="/js/cropper/cropper.min.css" />
    <script type="application/javascript" src="/js/admin/main.js"></script>
    <script type="application/javascript" src="/js/cropper/cropper.min.js"></script>
@endsection
