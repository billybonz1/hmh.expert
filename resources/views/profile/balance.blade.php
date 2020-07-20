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
                
                <div class="my-balance">
                    На вашем счету: <strong>{!! $currentUser->prettyBalance() !!}</strong>
                </div>
      
                <form action="/profile/balance" method="post" class="main-form">
                    @csrf
                    <label>
                        <div>Введите количество для пополнения:</div>
                        <span style="position: relative;">
                            <input id="balance" type="number" class="form-control @error('balance') is-invalid @enderror" name="balance" required  />
                            <div></div>
                            @error('balance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>
                    
 
                    <button type="submit">Пополнить баланс</button>
                </form>
            </div>
        </div>
    </div>
    
    
    <div id="cropImagePopup" class="total-popup">
        <div>
            <img id="cropImage" />
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