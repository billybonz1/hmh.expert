@extends('website.website')

@section('content')
        @include('layouts._breadcrumbs')
        
        
        
        <div class="blogs-cats">
            <div class="inner">
                @include('services._cats')
            </div>
        </div>
        <div class="blogs services">
            <div class="inner">
                <div>
                    @php $author = $post->author(); @endphp
                    <div class="service-top top-expert-{{ $author->id }}">
                        <img src="{{ $post->getThumbUrlAttribute() }}" alt="{{ $post->name }}">
                        <div>
                            <h1>{{ $pageTitle }}</h1>
                            <div class="service-top-expert">
                                <a href="/experts/{{ $author->id }}">
                                    <img src="{{ $author->avatar() }}" alt="{{ $author->namef() }}">
                                </a>
                                <div>
                                    <h3>
                                        <span>Услуга эксперта</span>
                                        <a href="/experts/{{ $author->id }}">{{ $author->namef() }}</a> 
                                        <div class="user-status st-grey active">Нет в сети</div>
                                        <div class="user-status now-online">В сети</div>
                                    </h3>
                                    <p>
                                        {{ $author->about }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-content service-content">
                        
                        {!! $post->desc !!}
                    </div>
                </div>
                <div class="service-buy">
                    <h3>Стоимость услуги</h3>
                    <p>{!! $post->getPrice() !!}</p>
                    @isset($currentUser)
                        <a href="#servicePay" class="btn open-popup" data-id="{{ $post->id }}">Заказать</a>
                        
                        <div id="servicePay" class="total-popup videocall-popup service-buy-popup">
                            <div class="videocall-popup-inner" style="min-height: unset;max-width: 500px;">
                                <form action="/profile/pay" class="main-form" method="post" style="margin-bottom: 0;">
                                    @csrf
                                    <h2 style="padding: 0 15px; font-size: 22px;">
                                        Вы приобретаете услугу <br> 
                                        <strong>"{{ $post->name }}"</strong> <br>
                                        стоимостью <strong>{!! $post->getPrice() !!}</strong>
                                    </h2>
                                    @if($currentUser->balance < $post->price)
                                        <p>
                                            К сожалению на Вашем счету не хватает средств. Перейдите на страницу пополнения.
                                        </p>
                                        <div style="text-align: center;">
                                            <a href="/profile/balance" class="popup-btn">Пополнить баланс</a>
                                        </div>
                                    @else
                                        <div style="text-align: center;">
                                            <button>Купить</button>
                                        </div>
                                        
                                        <input type="hidden" name="service_id" value="{{ $post->id }}" />
                                        <input type="hidden" name="action" value="buyService" />
                                    @endif
                                </form>
                                <div class="total-popup-close">X</div>
                            </div>
                        </div>
                        
                        
                        
                        <div id="servicePayThank" class="total-popup videocall-popup">
                            <div class="videocall-popup-inner" style="min-height: unset;max-width: 500px;">
                                <div class="main-form">
                                    <h2 style="padding: 0 15px; font-size: 22px; font-weight: bold;"></h2>
                                </div>
                                <div class="total-popup-close">X</div>
                            </div>
                        </div>
                    @else
                        <a href="#notLoggedInPopup" class="btn open-popup" data-id="{{ $post->id }}">Заказать</a>
                    @endisset
                    <pre>{{ $post->saleinfo }}</pre>
                </div>
            </div> 
        </div>
    
@endsection

@section('scripts')
    <script type="text/javascript">
        document.querySelector("#servicePay form").addEventListener("submit", function(e){
            e.preventDefault();
            var form = this;
            form.querySelector("button").classList.add("loading");
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.getAttribute("action"));
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var arr = JSON.parse(xhr.responseText);
                    if(arr.length == 2){
                        document.querySelector(".top-balance").innerHTML = arr[1];
                    }
                    document.querySelector("#servicePayThank h2").innerHTML = arr[0];
                    closePopup();
                    form.querySelector("button").classList.remove("loading");
                    openPopup("#servicePayThank");
                }
                else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                }
            };
            xhr.send(formData);
        });
    </script>
@endsection