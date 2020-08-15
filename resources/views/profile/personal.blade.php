@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')


    <div class="profile">
        <div class="inner">

            @include('layouts._profileMenu')






            <div class="profile-content">
                <h1>{{ $pageTitle }}</h1>
                @include('partials.alerts')

                @include('partials.profileContentMenu')

                <form action="/profile/personal" method="post" class="main-form">
                    @csrf
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

@endsection
