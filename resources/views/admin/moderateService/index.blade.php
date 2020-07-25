@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @include('partials.alerts')

                <div class="card-header">Услуги для модерации</div>
                
                <div class="card-body">
                    <div class="mb-3" role="group">
                        <a href="/admin/moderate-services/create" class="btn btn-primary">
                            <i class="fa fa-fw fa-plus"></i> Создать услугу
                        </a>
                    </div>

                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-3">
                                <div class="moderate-post">
                                    <div class="moderate-post-status">
                                        @if(count($post->reasons) > 0)
                                            <div style="background: #a2a208;">Ожидает исправления</div>
                                        @else
                                            @if($post->new == 1)
                                                <div style="background: #a2a208;">На модерации</div>
                                            @endif
                                            @if($post->visible == 1)
                                                <div style="background: green;">Активный</div>
                                            @endif
                                        @endif
                                    </div>
                                    <a href="/admin/moderate-services/{{ $post->id }}" class="moderate-post-img" style="background-image: url({{ $post->getThumbUrlAttribute() }})"></a>
                                    <a href="/admin/moderate-services/{{ $post->id }}"><h4>{{ $post->name }}</h4></a>
                                    <a href="/admin/moderate-services/{{ $post->id }}">
                                        {{ $post->shortdesc }}
                                    </a>
                                    @if($post->author())
                                        <h5>Автор: {{ $post->author()->namef() }}</h5>
                                    @endif
                                    <span class="post-date">{{ $post->created_at }}</span>

                                    <a href="/admin/moderate-services/{{ $post->id }}/edit" class="moderate-post-edit">
                                        <span class="fa fa-edit"></span>
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
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Общие услуги:</h4>
                        </div>
                        @foreach($services as $post)
                            <div class="col-md-3">
                                <div class="moderate-post">
                                    <div class="moderate-post-status"> 
                                        @if(count($post->reasons) > 0)
                                            <div style="background: #a2a208;">Ожидает исправления</div>
                                        @else
                                            @if($post->new == 1)
                                                <div style="background: #a2a208;">На модерации</div>
                                            @endif
                                            @if($post->visible == 1)
                                                <div style="background: green;">Активный</div>
                                            @endif
                                        @endif
                                    </div> 
                                    <div class="moderate-post-img" style="background-image: url({{ $post->getOriginalUrlAttribute() }})"></div>
                                    <h4>{{ $post->name }}</h4>
                                    <p>
                                        {{ $post->shortdesc }}
                                    </p>
                                    @if($post->author())
                                        <h5>Автор: {{ $post->author()->namef() }}</h5>
                                    @endif
                                    <span class="post-date">{{ $post->created_at }}</span>

                                    <a href="/admin/moderate-services/{{ $post->id }}/editall" class="moderate-post-edit">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
