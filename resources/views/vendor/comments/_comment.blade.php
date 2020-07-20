@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->getKey() }}" class="comment comment-reply">
@else
  <li id="comment-{{ $comment->getKey() }}" class="comment">
@endif
    <img class="comment-avatar" src="{{ $comment->commenter->avatar() }}" alt="{{ $comment->commenter->name ?? $comment->guest_name }}">
    <div class="media-body">
        <h5 class="mt-0 mb-1">
            <a href="/users/{{ $comment->commenter->id }}">{{ $comment->commenter->name }} {{ $comment->commenter->lastname }}</a> 
            <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        <div class="comment-text">{!! $markdown->line($comment->comment) !!}</div>

        <div class="comment-btns">
            @can('reply-to-comment', $comment)
                <a href="#reply-modal-{{ $comment->getKey() }}" class="btn btn-small open-popup">Ответить</a>
            @endcan
            @can('edit-comment', $comment)
                <a href="#comment-modal-{{ $comment->getKey() }}" class="btn btn-small open-popup">
                    Редактировать
                </a>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();" class="btn btn-small">Удалить</a>
                <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        @can('edit-comment', $comment)
            <div class="total-popup" id="comment-modal-{{ $comment->getKey() }}">
                <div>
                    <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Редактировать комментарий</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message">Обновите свое сообщение здесь:</label>
                                <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-small" data-dismiss="modal">Отменить</button>
                            <button type="submit" class="btn btn-small">Обновить</button>
                        </div>
                    </form>
                    <div class="total-popup-close">x</div>
                </div>
                
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="total-popup" id="reply-modal-{{ $comment->getKey() }}">
                <div>
                    <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Ответ на комментарий</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message">Введите Ваше сообщение здесь:</label>
                                <textarea required class="form-control" name="message" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-small" data-dismiss="modal">Отменить</button>
                            <button type="submit" class="btn btn-small">Ответить</button>
                        </div>
                    </form>
                    <div class="total-popup-close">x</div>    
                </div>
            </div>
        @endcan


        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->getKey()))
            @foreach($grouped_comments[$comment->getKey()] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif