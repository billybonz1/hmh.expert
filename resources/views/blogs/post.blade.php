@extends('website.website')

@section('content')
        @include('layouts._breadcrumbs')
        
        
        
        <div class="blogs-cats">
            <div class="inner">
                @include('blogs._cats')
            </div>
        </div>
        <div class="blogs">
            <div class="inner">
                <h1>{{ $pageTitle }}</h1>
                
                <div class="blog-attrs">
                    <div class="blog-attr">
                        <strong>Дата:</strong> {{ $post->created_at->format('d.m.Y H:i') }}
                    </div>
                    <div class="blog-attr">
                        <strong>Автор:</strong> 
                        <a href="/user/{{ $post->author()->id }}">
                            {{ $post->author()->name }} {{ $post->author()->lastname }}
                        </a>
                    </div>
                    
                    <div class="blog-attr">
                        <strong>Категория:</strong> 
                        <a href="{{ $post->categories[count($post->categories) - 1]->url() }}">
                            {{ $post->categories[count($post->categories) - 1]->title }}
                        </a>
                    </div>
                </div>
                
                <div class="blog-content">
                    <img src="{{ $post->img }}" alt="{{ $post->title }}">
                    {!! $post->content !!}
                </div>
                
                
                
                <div class="blog-comments">
                    @comments([
                        'model' => $post,
                        'approved' => true,
                        'perPage' => 10
                    ])
                </div>
                
            </div>
        </div>
    
@endsection