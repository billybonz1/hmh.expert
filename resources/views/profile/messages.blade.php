@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')

    <div class="profile">
        <div class="inner">
            
            @include('layouts._profileMenu')
            
            <div class="profile-content">
                <h1>Сообщения</h1>
                @include('partials.alerts')
                
                <div class="profile-messages-flex">
                    <div class="profile-messages-users" data-simplebar>
                        
                        @foreach($chats as $chat)
                            <a href="/profile/messages/user{{ $chat->otherUser()->id }}" data-user="{{ $chat->otherUser()->id }}" data-chatid="{{ $chat->id }}" data-name="{{ $chat->otherUser()->name }} {{ $chat->otherUser()->lastname }}" class="profile-messages-user">
                                <img src="{{ $chat->otherUser()->avatar() }}" alt="{{ $chat->otherUser()->name }} {{ $chat->otherUser()->lastname }}">
                                <div>
                                    {{ $chat->otherUser()->name }} {{ $chat->otherUser()->lastname }}
                                </div>
                                
                                @if($chat->countUnreadMessages() > 0)
                                <span class="profile-messages-user-count">
                                    {{ $chat->countUnreadMessages() }}
                                </span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                    <div class="profile-messages-wrap">
                        <div class="profile-messages active empty">
                            Выберите пользователя, чтобы увидеть сообщения
                        </div>
                        @foreach($chats as $chat)
                            <div id="messages{{ $chat->otherUser()->id }}" class="profile-messages" data-count="{{ $chat->countMessages() }}">
                            </div>
                        @endforeach
                        
                        
                        <div class="user-typing">
                            <span></span> печатает...
                        </div>
                        
                        <form style="display: none;" id="getMessagesForm">
                            @csrf
                        </form>
                        
                        <div class="profile-message-send">
                            <form action="/profile/messages" id="messageSendForm" method="post">
                                @csrf
                                @method('PUT')
                                <input type="text" name="message" value="" />
                                <input type="hidden" name="from_id" value="{{ $currentUser->id }}">
                                <input type="hidden" name="to_id" />
                                <input type="hidden" name="chat_id" />
                                <input type="submit" />
                            </form>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    
@endsection