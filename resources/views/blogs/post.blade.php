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
                    
                    <div class="blog-attr like-attr">
                        <svg data-post-id="{{ $post->id }}" class="like-post @if($post->liked()) liked @endif" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 412.735 412.735" style="enable-background:new 0 0 412.735 412.735;" xml:space="preserve">
                            <g>
                            	<path d="M295.706,46.058C354.45,46.344,402,93.894,402.286,152.638   c0,107.624-195.918,214.204-195.918,214.204S10.449,258.695,10.449,152.638c0-58.862,47.717-106.58,106.58-106.58l0,0   c36.032-0.281,69.718,17.842,89.339,48.065C226.123,64.047,259.722,45.971,295.706,46.058z"/>
                            	<path d="M206.367,377.291c-1.854-0.024-3.664-0.567-5.224-1.567C193.306,371.544,0,263.397,0,152.638   C0,88.005,52.395,35.609,117.029,35.609l0,0c34.477-0.406,67.299,14.757,89.339,41.273   c41.749-49.341,115.591-55.495,164.932-13.746c26.323,22.273,41.484,55.02,41.436,89.501   c0,112.327-193.306,218.906-201.143,223.086C210.031,376.723,208.221,377.266,206.367,377.291z M117.029,56.507   c-53.091,0-96.131,43.039-96.131,96.131l0,0c0,89.861,155.167,184.424,185.469,202.188   c30.302-17.241,185.469-111.282,185.469-202.188c0.087-53.091-42.881-96.201-95.972-96.289   c-32.501-0.053-62.829,16.319-80.615,43.521c-3.557,4.905-10.418,5.998-15.323,2.44c-0.937-0.68-1.761-1.503-2.44-2.44   C179.967,72.479,149.541,56.08,117.029,56.507z"/>
                            </g>
                        </svg>
                        <span>{{ $post->likeCount }}</span>
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


@section('scripts')
    <script src="/js/blogs.js" defer></script>
@endsection