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
                                    <img src="/public/images/avatars/{{ $currentUser->avatar }}" alt="{{ $currentUser->name }} {{ $currentUser->lastname }}">
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
                        <div>Дата рождения:</div>
                        <span style="position: relative;">
                            <input id="born_at" type="date" class="form-control @error('born_at') is-invalid @enderror" name="born_at" value="{{ $currentUser->born_at }}" required autofocus>
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
                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $currentUser->country }}" required autofocus>
                            <div></div>
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Город:</div>
                        <span style="position: relative;">
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $currentUser->city }}" autofocus>
                            <div></div>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Телефон:</div>
                        <span style="position: relative;">
                            <input id="cellphone" type="tel" class="form-control maskField masked-phone @error('cellphone') is-invalid @enderror" name="cellphone" value="{{ $currentUser->cellphone }}" mask="+38 (999) 999–9999" autofocus>
                            <div></div>
                            @error('cellphone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Skype:</div>
                        <span style="position: relative;">
                            <input id="skype" type="text" class="form-control @error('skype') is-invalid @enderror" name="skype" value="{{ $currentUser->skype }}" autofocus>
                            <div></div>
                            @error('skype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Профиль Вконтакте:</div>
                        <span style="position: relative;">
                            <input id="vk" type="text" class="form-control @error('vk') is-invalid @enderror" name="vk" value="{{ $currentUser->vk }}" autofocus>
                            <div></div>
                            @error('vk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Профиль Одноклассники:</div>
                        <span style="position: relative;">
                            <input id="od" type="text" class="form-control @error('od') is-invalid @enderror" name="od" value="{{ $currentUser->od }}" autofocus>
                            <div></div>
                            @error('od')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Профиль Facebook:</div>
                        <span style="position: relative;">
                            <input id="fb" type="text" class="form-control @error('fb') is-invalid @enderror" name="fb" value="{{ $currentUser->fb }}" autofocus>
                            <div></div>
                            @error('fb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    @foreach($currentUser->fields() as $field)
                        <label>
                            <div>{{ $field->name }}:</div>
                            <span style="position: relative;">

                                @if($field->type == "text")
                                    <input id="field-{{ $field->slug }}" type="text" class="form-control" name="field-{{ $field->slug }}" value="{{ $field->getValue($currentUser->id) }}" />
                                @elseif($field->type == "textarea")
                                    <textarea id="field-{{ $field->slug }}" class="form-control" name="field-{{ $field->slug }}">{{ $field->getValue($currentUser->id) }}</textarea>
                                @endif


                                <div></div>
                            </span>
                        </label>
                    @endforeach

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



    <link rel="stylesheet" href="/public/js/cropper/cropper.min.css" />
    <script type="application/javascript" src="/public/js/admin/main.js"></script>
    <script type="application/javascript" src="/public/js/cropper/cropper.min.js"></script>
@endsection
