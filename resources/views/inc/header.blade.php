@section('header')
<div class="menu-top" @isset($currentUser)data-user-id="{{ $currentUser->id }}" data-userprettyname="{{ $currentUser->namef() }}" data-avatar="{{ $currentUser->avatar() }}"@endisset data-last-id="{{ $last_insert_id }}">
    <div class="inner">
        <a href="/" class="logo">
            <img src="/img/logo.png" alt="">
        </a>
        <div class="mt-social-block">
            <a href="#" class="vk"></a>
            <a href="#" class="od"></a>
            <a href="#" class="insta"></a>
            <a href="#" class="fb"></a>
            <a href="#" class="yt"></a>
        </div>
        <div class="mt-user-block">
            @guest
                <div class="log-reg-buttons">
                    <a href="{{ route('register') }}">
                        <i class="lrb-icon lrb-reg"></i>
                        <span>Регистрация</span>
                    </a>
                    <a href="{{ route('login') }}">
                        <i class="lrb-icon lrb-user"></i>
                        <span>Войти</span>
                    </a>
                </div>
            @else
                <div class="mt-user">
                    <img src="{{ $currentUser->avatar() }}" alt="{{ $currentUser->name }} {{ $currentUser->lastname }}">
                    <div>
                        <p>Добро пожаловать</p>
                        <div class="mt-user-menu">
                            {{ $currentUser->namef() }}
                        </div>
                        <div class="top-balance">
                            {!! $currentUser->prettyBalance() !!}
                        </div>
                    </div>
                    
                    
                    <div class="mt-user-dropdown">
                        <ul>
                            <li>
                                <a href="/profile">Мой аккаунт</a>
                            </li>
                            
                            @if($currentUser->hasRole("expert"))
                                <li>
                                    <a href="/experts/{{ $currentUser->id }}">Моя трансляция</a>
                                </li>
                            @endif
                            
                            <li>
                                <a href="/auth/logout" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">Выйти</a>
                            </li>
                        </ul>
                        <form action="/auth/logout" method="POST" id="logout-form">
                            @csrf
                            <button>Выйти</button>
                        </form>
                    </div>
                    
                </div>
                
                <div class="mt-user-icons">
                    <div class="mtui-user active">
                        <div>1</div>
                    </div>
                    <div class="mtui-notify"></div>
                    <a href="{{ route('profile.messages') }}" class="mtui-message active">
                        @if($currentUser->unreadChats() > 0)
                        <div>
                            {{ $currentUser->unreadChats() }}
                        </div>
                        @endif
                    </a>
                </div>
            @endguest
        </div>
    </div>
    
</div>

<div class="menu-block">
    <ul>
        <li class="mb-has-children">
            <a href="#">Заказать</a>
        </li>
        <li class="mb-has-children">
            <a href="/experts">Эксперты</a>
            <ul>
                @include('layouts._menuCats')
            </ul>
        </li>
        <li class="mb-has-children">
            <a href="/services">Услуги</a>
            <ul>
                @include('layouts._menuServices')
            </ul>
        </li>
        <li class="mb-has-children">
            <a href="#">Акции</a>
        </li>
        <li class="mb-has-children">
            <a href="#">Онлайн-магазин</a>
        </li>
    </ul>
</div>

<div class="menu-sidebar menu-left">
    <div class="mt-social-block">
        <a href="#" class="ms-icon-menu"></a>
        <a href="#" class="ms-icon-shop">
            <div><div>Магазин</div></div>
        </a>
        <a href="/favourite" class="ms-icon-favourite">
            <div><div>Избранное</div></div>
        </a>
        @isset($currentUser)
            <a href="/profile/balance" class="ms-icon-coins">
                <div><div>Пополнить сейчас</div></div>
            </a>
        @endisset
        <a href="#" class="ms-icon-forum">
            <div><div>Форум</div></div>
        </a>
        <a href="/blogs" class="ms-icon-blog">
            <div><div>Блог</div></div>
        </a>
        <a href="/faq" class="ms-icon-faq">
            <div><div>Вопрос/ответ</div></div>
        </a>
    </div>
</div>

<div class="menu-sidebar menu-right">
    <div class="mt-social-block">
   
        <a href="#" class="ms-icon-video">
            <div><div>Приватная видео-консультация</div></div>
        </a>
        <a href="#" class="ms-icon-call">
            <div><div>Позвонить эксперту</div></div>
        </a>
     
        <a href="#" class="ms-icon-messages">
            <div><div>Открыть чат с экспертом</div></div>
        </a>
      
        <a href="#" class="ms-icon-private-mail">
            <div><div>Подробные e-mail консультации</div></div>
        </a>
     
        <a href="#" class="ms-icon-help">
            <div><div>Помощь эксперта</div></div>
        </a>
       
        <a href="#" class="ms-icon-support">
            <div><div>Центр поддержки клиентов</div></div>
        </a>
        <a href="#" class="ms-icon-how">
            <div><div>Как стать экспертом</div></div>
        </a>
        
    </div>
</div>

<div class="main-container">