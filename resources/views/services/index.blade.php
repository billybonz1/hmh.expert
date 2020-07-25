@extends('website.website')

@section('content')
        @include('layouts._breadcrumbs')
        
        <div class="blogs-cats">
            <div class="inner">
                @include('services._cats')
            </div>
        </div>
        
        
        <div class="blogs">
            <div class="inner">
                <h1>Услуги экспертов</h1>
                
                <div class="blogs-posts">
                    @foreach($posts as $post)
                        @include('inc.service')
                    @endforeach
                </div>
                
                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    
@endsection