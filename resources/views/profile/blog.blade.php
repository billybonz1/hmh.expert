@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')


    <div class="profile">
        <div class="inner">
            
            @include('layouts._profileMenu')
            
            
            <div class="profile-content">
                <div class="profile-content-wrap">
                    <h1>Мой блог</h1>
                    <a href="{{ route('profile.postCreate') }}" class="btn">Добавить пост</a>
                </div>
                
                @include('partials.alerts')
                
                @if(count($posts) == 0)
                    <div class="profile-content-empty">
                        Вы пока не создали ни одного поста
                    </div>
                @else
                    <div class="profile-content-full">
                    @foreach($posts as $post)
                        <a href="/profile/blog/{{ $post->id }}" class="profile-post">
                            <div>
                                <div class="profile-post-img" style="background-image: url({{ $post->img }})"></div>
                                <div class="profile-post-status">
                                        @if(count($post->reasons) > 0)
                                            <div class="profile-post-reason">
                                                Не одобрен 
                                            </div>
                                        @else
                                            @if($post->new == 1)
                                                <div style="background: #a2a208;">На модерации</div>
                                            @endif
                                            @if($post->active == 1)
                                                <div style="background: green;">Активный</div>
                                            @endif
                                        @endif
                                </div>
                                <div class="profile-post-content">
                                    <h3>{{ $post->title }}</h3>
                                    <p>
                                        {!! $post->short_desc() !!}
                                    </p>
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