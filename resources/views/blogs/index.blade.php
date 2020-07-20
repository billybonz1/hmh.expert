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
                <h1>Популярные блоги</h1>
                
                
                <div class="blogs-posts">
                    @foreach($posts as $post)
                        @include('inc.post')
                    @endforeach
                </div>
                
                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    
@endsection