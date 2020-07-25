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
                
                
                @if(count($posts) > 0)
                    <div class="blogs-posts">
                        @foreach($posts as $post)
                            @include('inc.post')
                        @endforeach
                    </div>
                    
                    <div class="pagination">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="no-posts">
                        В данной категории пока нет постов.
                    </div>
                @endif
            </div>
        </div>
    
@endsection