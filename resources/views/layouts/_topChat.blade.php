<div class="top-chat">
    <div class="inner">
        <div class="top-chat-block-container">
            <div class="top-chat-block">
                <div class="tcp-video-live">
                    <img src="/img/live-video.jpg" alt="">
                    <div class="tcp-title">
                        <i class="tcp-video-icon"></i>
                        <span>Виктория</span>
                    </div>
                    <div class="tcp-live"></div>
                </div>
                <div class="tcp-chat">
                    <div class="tcp-chat-title">Чат</div>
                    <div class="tcp-chat-messages" data-simplebar>
                        <div class="tcp-chat-message">
                            <div class="tcp-chat-message-top">
                                <a href="#">
                                    <img src="/img/user1.png" alt="">
                                    <span>Кристина</span>
                                </a>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                            </p>
                        </div>
                        <div class="tcp-chat-message">
                            <div class="tcp-chat-message-top">
                                <a href="#">
                                    <img src="/img/user2.png" alt="">
                                    <span>Виктория</span>
                                </a>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                            </p>
                        </div>
                        <div class="tcp-chat-message">
                            <div class="tcp-chat-message-top">
                                <a href="#">
                                    <img src="/img/user1.png" alt="">
                                    <span>Кристина</span>
                                </a>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                            </p>
                        </div>
                        <div class="tcp-chat-message">
                            <div class="tcp-chat-message-top">
                                <a href="#">
                                    <img src="/img/user2.png" alt="">
                                    <span>Виктория</span>
                                </a>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                            </p>
                        </div>
                    </div>
                    
                    
                    <!--@if($errors->any())-->
                    <!--    <ul>-->
                    <!--        @foreach($errors->all() as $error)-->
                    <!--            <li>{{ $error }}</li>-->
                    <!--        @endforeach-->
                    <!--    </ul>-->
                    <!--@endif-->
                    
                    <form class="tcp-input" method="post" action="">
                        @csrf
                        
                        <input type="text" name="message" placeholder="Введите сообщение" />
                        <button class="tcp-send-icon"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>