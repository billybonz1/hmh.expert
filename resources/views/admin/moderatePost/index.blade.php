@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Посты для модерации</div>
                <div class="card-body">
                    
                    
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-3">
                                <div class="moderate-post">
                                    <a href="/admin/moderate-posts/{{ $post->id }}">
                                        <div class="moderate-post-status">
                                            @if(count($post->reasons) > 0)
                                                <div style="background: #a2a208;">Ожидает исправления</div>
                                            @else
                                                @if($post->new == 1)
                                                    <div style="background: #a2a208;">На модерации</div>
                                                @endif
                                                @if($post->active == 1)
                                                    <div style="background: green;">Активный</div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="moderate-post-img" style="background-image: url({{ $post->img }})"></div>
                                        <h4>{{ $post->title }}</h4>
                                        <p>
                                            {{ $post->short_desc() }}
                                        </p>
                                        <h5>Автор: {{ $post->author()->name }} {{ $post->author()->lastname }}</h5>
                                        <span class="post-date">{{ $post->created_at }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            <div class="text-center">
                                <div class="pagination">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
