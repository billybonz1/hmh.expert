@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Комментарии для модерации</div>
                <div class="card-body">
                    
                    @include("partials.alerts")
                    
                    @if($comments->count() < 1)
                        <div class="alert alert-warning">Пока еще нет ни одного комментария.</div>
                    @endif
                    
                    <ul class="list-unstyled">
                        @php
                            $perPage = 10;
                            $comments = $comments->sortBy('approved');
                    
                            if (isset($perPage)) {
                                $page = request()->query('page', 1) - 1;
                    
                                $parentComments = $comments->where('child_id', '');
                    
                                $slicedParentComments = $parentComments->slice($page * $perPage, $perPage);
                    
                                $m = Config::get('comments.model'); // This has to be done like this, otherwise it will complain.
                                $modelKeyName = (new $m)->getKeyName(); // This defaults to 'id' if not changed.
                    
                                $slicedParentCommentsIds = $slicedParentComments->pluck($modelKeyName)->toArray();
                    
                                // Remove parent Comments from comments.
                                $comments = $comments->where('child_id', '!=', '');
                    
                                $grouped_comments = new \Illuminate\Pagination\LengthAwarePaginator(
                                    $slicedParentComments->merge($comments)->groupBy('child_id'),
                                    $parentComments->count(),
                                    $perPage
                                );
                    
                                $grouped_comments->withPath("/".request()->path());
                            } else {
                                $grouped_comments = $comments->groupBy('child_id');
                            }
                        @endphp
                        @foreach($grouped_comments as $comment_id => $comments)
                            {{-- Process parent nodes --}}
                            @if($comment_id == '')
                                @foreach($comments as $comment)
                                    @include('admin.moderateComments._comment', [
                                        'comment' => $comment,
                                        'grouped_comments' => $grouped_comments
                                    ])
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                    
                    @isset ($perPage)
                        {{ $grouped_comments->links() }}
                    @endisset
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
