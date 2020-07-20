@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')


    <div class="profile">
        <div class="inner">

            @include('layouts._profileMenu')


            <div class="profile-content">
                <div class="profile-content-wrap">
                    <h1>Мои услуги</h1>
                    <a href="{{ route('profile.serviceCreate') }}" class="btn">Добавить услугу</a>
                </div>

                @include('partials.alerts')

                @if(count($posts) == 0)
                    <div class="profile-content-empty">
                        Вы пока не создали ни одной услуги
                    </div>
                @else
                    <div class="profile-content-full">
                        @foreach($posts as $post)
                            <a href="/profile/service/{{ $post->id }}" class="profile-post">
                                <div>
                                    <div class="profile-post-img" style="background-image: url({{ $post->getThumbUrlAttribute() }})"></div>
                                    <div class="profile-post-status">
                                        @if(count($post->reasons) > 0)
                                            <div class="profile-post-reason">
                                                Не одобрен
                                            </div>
                                        @else
                                            @if($post->new == 1)
                                                <div style="background: #a2a208;">На модерации</div>
                                            @endif
                                            @if($post->visible == 1)
                                                <div style="background: green;">Активный</div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="profile-post-content">
                                        <h3>{{ $post->name }}</h3>
                                        <p>
                                            {{ $post->shortdesc }}
                                        </p>
                                        <p class="price">Цена: {!! $post->getPrice() !!}</p>
                                        <p class="time">{{ $post->created_at }}</p>
                                    </div>

                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
