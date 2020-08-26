@php
    if (isset($approved) and $approved == true) {
        $comments = $model->approvedComments;
    } else {
        $comments = $model->comments;
    }
@endphp


@php
    $comments = $comments->sortByDesc('created_at');

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



@if(class_basename($model) == "WallPost")
    <ul class="comments-list">
    	@foreach($grouped_comments as $comment_id => $comments)
            @if($comment_id == '')
                @foreach($comments as $comment)
                	@include('comments::_comment_wall', [
                        'comment' => $comment,
                        'grouped_comments' => $grouped_comments
                    ])
				@endforeach
			@endif
		@endforeach
		<!--<li class="comment-item has-children">-->
		<!--	<div class="post__author author vcard inline-items">-->
		<!--		<img src="/img/wall/img/avatar5-sm.jpg" alt="author">-->
		
		<!--		<div class="author-date">-->
		<!--			<a class="h6 post__author-name fn" href="#">Красный Бог камней</a>-->
		<!--			<div class="post__date">-->
		<!--				<time class="published" datetime="2020-03-24T18:18">-->
		<!--					1 час спустя-->
		<!--				</time>-->
		<!--			</div>-->
		<!--		</div>-->
		
		<!--		<a href="#" class="more">-->
		<!--			<svg class="olymp-three-dots-icon">-->
		<!--				<use xlink:href="#olymp-three-dots-icon"></use>-->
		<!--			</svg>-->
		<!--		</a>-->
		
		<!--	</div>-->
		
		<!--	<p>Нет удовольствия, потому что это боль, ненависть или бегство, а потому, что-->
		<!--		Страдания тех, кто не знает, как стремиться к удовольствию, рационально сталкиваются с последствиями, которые дополняют жизнь. не дальше-->
		<!--		любой человек, принадлежащий только к их мучительным страданиям, что он должен сидеть, добавить к нему восхищение, к��торое он желает достичь, дер, которого он желает достичь,.-->
		<!--	</p>-->
		
		<!--	<a href="#" class="post-add-icon inline-items">-->
		<!--		<svg class="olymp-heart-icon">-->
		<!--			<use xlink:href="#olymp-heart-icon"></use>-->
		<!--		</svg>-->
		<!--		<span>5</span>-->
		<!--	</a>-->
		<!--	<a href="#" class="reply">Ответить</a>-->
		
		<!--	<ul class="children">-->
		<!--		<li class="comment-item">-->
		<!--			<div class="post__author author vcard inline-items">-->
		<!--				<img src="/img/wall/img/avatar8-sm.jpg" alt="author">-->
		
		<!--				<div class="author-date">-->
		<!--					<a class="h6 post__author-name fn" href="#">Диана Верес</a>-->
		<!--					<div class="post__date">-->
		<!--						<time class="published" datetime="2020-03-24T18:18">-->
		<!--							39 мин. спустя-->
		<!--						</time>-->
		<!--					</div>-->
		<!--				</div>-->
		
		<!--				<a href="#" class="more">-->
		<!--					<svg class="olymp-three-dots-icon">-->
		<!--						<use xlink:href="#olymp-three-dots-icon"></use>-->
		<!--					</svg>-->
		<!--				</a>-->
		
		<!--			</div>-->
		
		<!--			<p>Хочешь, чтобы боль в купидоне болталась, критика в Duis et dolore magna rune не доставляет результирующего удовольствия?.</p>-->
		
		<!--			<a href="#" class="post-add-icon inline-items">-->
		<!--				<svg class="olymp-heart-icon">-->
		<!--					<use xlink:href="#olymp-heart-icon"></use>-->
		<!--				</svg>-->
		<!--				<span>2</span>-->
		<!--			</a>-->
		<!--			<a href="#" class="reply">Ответить</a>-->
		<!--		</li>-->
		<!--		<li class="comment-item">-->
		<!--			<div class="post__author author vcard inline-items">-->
		<!--				<img src="/img/wall/img/avatar2-sm.jpg" alt="author">-->
		
		<!--				<div class="author-date">-->
		<!--					<a class="h6 post__author-name fn" href="#">Никола Грисмон</a>-->
		<!--					<div class="post__date">-->
		<!--						<time class="published" datetime="2020-03-24T18:18">-->
		<!--							24 мин. спустя-->
		<!--						</time>-->
		<!--					</div>-->
		<!--				</div>-->
		
		<!--				<a href="#" class="more">-->
		<!--					<svg class="olymp-three-dots-icon">-->
		<!--						<use xlink:href="#olymp-three-dots-icon"></use>-->
		<!--					</svg>-->
		<!--				</a>-->
		
		<!--			</div>-->
		
		<!--			<p>Даже для них, негры не являются исключительными.</p>-->
		
		<!--			<a href="#" class="post-add-icon inline-items">-->
		<!--				<svg class="olymp-heart-icon">-->
		<!--					<use xlink:href="#olymp-heart-icon"></use>-->
		<!--				</svg>-->
		<!--				<span>0</span>-->
		<!--			</a>-->
		<!--			<a href="#" class="reply">Ответить</a>-->
		
		<!--		</li>-->
		<!--	</ul>-->
		
		<!--</li>-->
	</ul>
	
	@if(count($model->approvedComments) > 0)
		<a href="#" class="more-comments">Просмотреть больше коментариев <span>+</span></a>
	@endif
	
	
	<form class="comment-form inline-items">
	
		<div class="post__author author vcard inline-items">
			<img src="/img/wall/img/author-page.jpg" alt="author">
	
			<div class="form-group with-icon-right is-empty">
				<textarea class="form-control" placeholder=""></textarea>
				<div class="add-options-message">
					<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
						<svg class="olymp-camera-icon">
							<use xlink:href="#olymp-camera-icon"></use>
						</svg>
					</a>
				</div>
			<span class="material-input"></span></div>
		</div>
	
		<button class="btn btn-md-2 btn-primary">Коментировать новость</button>
	
		<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Отмена</button>
	
	</form>
@else

    <h2>Комментарии ({{ count($comments) }})</h2>
    @if($comments->count() < 1)
        <div class="no-comments">Пока нет ни одного комментария</div>
    @endif
    
    <ul class="comments">
        
        @foreach($grouped_comments as $comment_id => $comments)
            {{-- Process parent nodes --}}
            @if($comment_id == '')
                @foreach($comments as $comment)
                    @include('comments::_comment', [
                        'comment' => $comment,
                        'grouped_comments' => $grouped_comments
                    ])
                @endforeach
            @endif
        @endforeach
    </ul>
    
    @isset ($perPage)
        <div class="pagination">
            {{ $grouped_comments->links() }}
        </div>
    @endisset
    
    @auth
        @include('comments::_form')
    @elseif(Config::get('comments.guest_commenting') == true)
        @include('comments::_form', [
            'guest_commenting' => true
        ])
    @else
        <div class="commment-need-auth">
            <p>Необходимо авторизоваться, чтобы оставлять комментарии.</p>
            <a href="{{ route('login') }}" class="btn btn-small">Войти</a>
        </div>
    @endauth
@endif
