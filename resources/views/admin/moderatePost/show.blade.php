@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($post->reasons) > 0)
            <div class="alert alert-warning">
                @foreach($post->reasons as $reason)
                    <strong>Причина отклонения:</strong> {{ $reason->text }}
                @endforeach
            </div>
            @endif
            
            
            <div class="card">
                <div class="card-header">
                    <div class="card-header-flex">
                        <h3>{{ $post->title }}</h3>
                        <div>
                            <p>
                                Дата: {{ $post->created_at }}
                            </p>
                            <p>
                                Категории:
                                @foreach($post->categories as $cat)
                                    <a href="" target="_blank">{{ $cat->title }}</a>
                                @endforeach
                            </p>
                            <p>
                                Автор: <a href="" target="_blank">{{ $post->author()->name }} {{ $post->author()->lastname }}</a>
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    {!! $post->content !!}
                </div>
                <div class="card-footer">
                    <form action="{{ route('moderatepost.postaccept') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button class="btn btn-primary" type="submit">Одобрить</button>
                    </form>
                    
                    <button class="btn btn-danger" data-toggle="modal" data-target="#rejected">Отклонить</button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="rejected" tabindex="-1" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Объясните причину</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            
                          </div>
                          <div class="modal-body">
                                <form action="{{ route('moderatepost.post') }}" method="POST">
                                    @csrf
                                    <textarea name="text"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Отправить</button>
                                    </div>
                                </form>
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
