        
        
</div>
<footer>
    <div class="inner">
        <div class="mt-social-block">
            <a href="#">
                <span>ПС</span>
                <div><div>Пользовательское соглашение</div></div>
            </a>
            <a href="#">
                <span>ПК</span>
                <div><div>
                    Политика конфиденциальности
                </div></div>
            </a>
            <a href="#">
                <span>СП</span>
                <div><div>
                    Стать партнером
                </div></div>
            </a>
            <a href="#">
                <span>ГК</span>
                <div><div>
                    Гарантия качества
                </div></div>
            </a>
        </div>
        <div class="footer-first">
            <div class="footer-logo">
                <a href="#" class="logo">
                    <img src="/public/img/logo.png" alt="">
                </a>
            </div>
            <p>Все права защищены © 2020</p>
        </div>
        <div class="mt-social-block">
            <a href="#" class="vk"></a>
            <a href="#" class="od"></a>
            <a href="#" class="insta"></a>
            <a href="#" class="fb"></a>
            <a href="#" class="yt"></a>
        </div>
    </div>
</footer>

<div id="videocall" class="videocall-popup">
    <div class="top-chat-block">
        <div class="tcp-video-live">
            <div id="peerDiv" class="embed-responsive embed-responsive-16by9"></div>
            <div class="tcp-title">
                <i class="tcp-video-icon"></i>
                <span>Виктория</span>
            </div>
            <video id="fromMe" muted></video>
            <div class="tcp-live"></div>
        </div>
        <div class="tcp-chat">
            <div class="tcp-chat-title">Чат</div>
            <div class="tcp-chat-messages" data-simplebar>
                <div class="tcp-chat-message">
                    <div class="tcp-chat-message-top">
                        <a href="#">
                            <img src="/public/img/user1.png" alt="">
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
                            <img src="/public/img/user2.png" alt="">
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
                            <img src="/public/img/user1.png" alt="">
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
                            <img src="/public/img/user2.png" alt="">
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
        
        <div class="videocall-popup-close">X</div>
    </div>
    
</div>


<div id="videocallAccept" class="videocall-popup">
    <div class="videocall-popup-inner">
        <h2>Вам звонит клиент !</h2>
        <button id="acceptCall">Принять звонок</button>
        <button id="cancelCall">Отклонить звонок</button>
        
        <div class="videocall-popup-close">X</div>
    </div>
</div>

<div id="notLoggedInPopup" class="total-popup videocall-popup">
    <div class="videocall-popup-inner" style="min-height: unset;max-width: 500px;">
        <form action="{{ route('login') }}" class="main-form" method="post">
            @csrf
            <h1>Авторизация</h1>
            <label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Введите e-mail" />
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Введите пароль" />
                
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Запомнить меня
                </label>
            </div>
            <div class="main-form-urls">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Забыли пароль?</a>
                @endif
                <a href="{{ route('register') }}">Регистрация</a>
            </div>
            <div style="text-align: center;">
                <button>Войти</button>
            </div>
        </form>
        <div class="total-popup-close">X</div>
    </div>
</div>

<a href="" id="newMessage">
    Пришло новое сообщение <br>
    Отправитель: <span></span>
</a>



<div id="payForPrivateChat" class="total-popup videocall-popup">
    <div class="videocall-popup-inner" style="min-height: unset;max-width: 500px;">
        <form action="/profile/pay" class="main-form" method="post" style="margin-bottom: 0;">
            @csrf
            @isset($currentUser)
                @if($currentUser->balance < 100)
                    <h1 style="padding: 0 15px; font-size: 30px;">
                        Чтобы открыть привытный чат с экспертом необходимо оплатить 100 клеверов с Вашего баланса. <br>  
                        К сожалению на Вашем счету не хватает средств. Перейдите на страницу пополнения.
                    </h1>
                    <div style="text-align: center;">
                        <a href="/profile/balance" class="popup-btn">Пополнить баланс</a>
                    </div>
                @else
                    <h1 style="padding: 0 15px; font-size: 30px;">Чтобы открыть привытный чат с экспертом необходимо оплатить 100 клеверов с Вашего баланса</h1>
                    <div style="text-align: center;">
                        <button>Оплатить</button>
                    </div>
                @endif
            @else
                <h1 style="padding: 0 15px; font-size: 30px;">
                    Необходимо авторизоваться, чтобы открыть приватный чат.
                </h1>
                <div style="text-align: center;">
                    <a href="/login" class="popup-btn">Авторизоваться</a>
                </div>
            @endisset
            <input type="hidden" name="expert_id" />
            <input type="hidden" name="price" value="100" />
        </form>
        <div class="total-popup-close">X</div>
    </div>
</div>


@isset($currentUser)
<div id="payForMessage" class="total-popup videocall-popup">
    <div class="videocall-popup-inner" style="min-height: unset;max-width: 500px;">
        <form action="/profile/pay" class="main-form" method="post" style="margin-bottom: 0;">
            @csrf
                <h1 style="padding: 0 15px; font-size: 22px;">
                    Чтобы продолжить писать в публичном чате купите еще 3 сообщения всего за <strong>299</strong> клеверов <br>  
                </h1>
                @if($currentUser->balance < 299)
                    <p>
                        К сожалению на Вашем счету не хватает средств. Перейдите на страницу пополнения.
                    </p>
                    <div style="text-align: center;">
                        <a href="/profile/balance" class="popup-btn">Пополнить баланс</a>
                    </div>
                @else
                    <div style="text-align: center;">
                        <button>Купить</button>
                    </div>
                @endif
            
            <input type="hidden" name="action" value="buy3messages" />
        </form>
        <div class="total-popup-close">X</div>
    </div>
</div>

<div id="userNotOnline" class="total-popup videocall-popup">
    <div class="videocall-popup-inner" style="min-height: unset;max-width: 500px;">
        <div class="main-form">
            <h1 style="padding: 0 15px; font-size: 30px;">
                К сожалению эксперт не онлайн, Вы можете узнать его расписание <a>здесь</a>
            </h1>
        </div>
        <div class="total-popup-close">X</div>
    </div>
</div>

@endisset


<!--<script src="/js/socket.js"></script>-->
<!--<script src="https://secret-savannah-83467.herokuapp.com/bundle.js"></script>-->
<script src="https://vast-plateau-40039.herokuapp.com/dist/RTCMultiConnection.js"></script>

<script src="https://vast-plateau-40039.herokuapp.com/node_modules/webrtc-adapter/out/adapter.js"></script>
<script src="https://vast-plateau-40039.herokuapp.com/socket.io/socket.io.js"></script>
<link rel="stylesheet" href="https://vast-plateau-40039.herokuapp.com/dev/getHTMLMediaElement.css">
<script src="https://vast-plateau-40039.herokuapp.com/dev/getHTMLMediaElement.js"></script>
<script>
    var socket1 = io.connect('https://vast-plateau-40039.herokuapp.com/', {
        'sync disconnect on unload': true
    });
    if(document.querySelector(".broadcast-video")){
        var connection = new RTCMultiConnection();
            connection.socketURL = 'https://vast-plateau-40039.herokuapp.com:443/';
            connection.session = {
            audio: true,
            video: true,
            oneway: true
        };
        
        connection.sdpConstraints.mandatory = {
            OfferToReceiveAudio: false,
            OfferToReceiveVideo: false
        };
        
        // https://www.rtcmulticonnection.org/docs/iceServers/
        // use your own TURN-server here!
        connection.iceServers = [{
            'urls': [
                'stun:stun.l.google.com:19302',
                'stun:stun1.l.google.com:19302',
                'stun:stun2.l.google.com:19302',
                'stun:stun.l.google.com:19302?transport=udp',
            ]
        }];
        
        connection.videosContainer = document.getElementById('videos-container');
        connection.onstream = function(event) {
            var existing = document.getElementById(event.streamid);
            if(existing && existing.parentNode) {
              existing.parentNode.removeChild(existing);
            }
        
            event.mediaElement.removeAttribute('src');
            event.mediaElement.removeAttribute('srcObject');
            event.mediaElement.muted = true;
            event.mediaElement.volume = 0;
        
            var video = document.createElement('video');
        
            try {
                video.setAttributeNode(document.createAttribute('autoplay'));
                video.setAttributeNode(document.createAttribute('playsinline'));
            } catch (e) {
                video.setAttribute('autoplay', true);
                video.setAttribute('playsinline', true);
            }
        
            if(event.type === 'local') {
              video.volume = 0;
              try {
                  video.setAttributeNode(document.createAttribute('muted'));
              } catch (e) {
                  video.setAttribute('muted', true);
              }
            }
            video.srcObject = event.stream;
        
            var width = parseInt(connection.videosContainer.clientWidth);
            var mediaElement = getHTMLMediaElement(video, {
                title: event.userid,
                buttons: ['full-screen'],
                width: width,
                showOnMouseEnter: false
            });
        
            connection.videosContainer.appendChild(mediaElement);
        
            setTimeout(function() {
                mediaElement.media.play();
            }, 5000);
        
            mediaElement.id = event.streamid;
        };
        
        connection.onstreamended = function(event) {
            var mediaElement = document.getElementById(event.streamid);
            if (mediaElement) {
                mediaElement.parentNode.removeChild(mediaElement);
        
                if(event.userid === connection.sessionid && !connection.isInitiator) {
                  alert('Broadcast is ended. We will reload this page to clear the cache.');
                  location.reload();
                }
            }
        };
        
        connection.onMediaError = function(e) {
            if (e.message === 'Concurrent mic process limit.') {
                if (DetectRTC.audioInputDevices.length <= 1) {
                    alert('Please select external microphone. Check github issue number 483.');
                    return;
                }
        
                var secondaryMic = DetectRTC.audioInputDevices[1].deviceId;
                connection.mediaConstraints.audio = {
                    deviceId: secondaryMic
                };
        
                connection.join(connection.sessionid);
            }
        };
        
        
        var startBroadcast = document.querySelector(".start-broadcast");
        var stopBroadcast = document.querySelector(".stop-broadcast");
        
        if(startBroadcast){
            startBroadcast.addEventListener("click", function(e){
                e.preventDefault();
                startBroadcast.classList.remove("active");
                stopBroadcast.classList.add("active");
        
                connection.open(startBroadcast.getAttribute("data-room-name"));
            });
        }
        
        
        
        
        
        if(stopBroadcast){
            stopBroadcast.addEventListener("click", function(e){
                e.preventDefault();
                stopBroadcast.classList.remove("active");
                startBroadcast.classList.add("active");
                connection.closeSocket();
                connection.attachStreams.forEach(function(stream) {
                    stream.stop();
                });
            });
        }
        
        
        var expert = document.querySelector("[data-expert-id]");
        if(expert){
            var playBroadcast = document.querySelector(".play-broadcast");
            if(playBroadcast){
                playBroadcast.addEventListener("click", function(){
                    connection.sdpConstraints.mandatory = {
                        OfferToReceiveAudio: true,
                        OfferToReceiveVideo: true
                    };
                    connection.join("expertRoom" + expert.getAttribute("data-expert-id"));
                    
                    document.querySelector(".play-broadcast").remove();
                });
            }
            
            function checkRoom(){
                var noBroadcast = document.querySelector(".no-broadcast");
                var playBroadcast = document.querySelector(".play-broadcast");
                connection.checkPresence("expertRoom" + expert.getAttribute("data-expert-id"), function(isRoomExist, roomid, error) {
                    if (isRoomExist === true) {
                        if(noBroadcast) noBroadcast.classList.remove("active");
                        if(playBroadcast) playBroadcast.classList.add("active");
                    }else{
                        if(noBroadcast) noBroadcast.classList.add("active");
                        if(playBroadcast) playBroadcast.classList.remove("active");
                    }
            
                    setTimeout(checkRoom, 1000); // recheck after every 3 seconds
                });
            }
            checkRoom();
            
        }
        
        
        
    }else if(document.querySelectorAll("[data-id-to-call]").length > 0){
        // ......................................................
        // ..................RTCMultiConnection Code.............
        // ......................................................
        
        var connection = new RTCMultiConnection();
        
        // by default, socket.io server is assumed to be deployed on your own URL
        connection.socketURL = 'https://vast-plateau-40039.herokuapp.com:443/';
        
        // comment-out below line if you do not have your own socket.io server
        // connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';
        
        connection.socketMessageEvent = 'video-conference';
        
        connection.session = {
            audio: true,
            video: true
        };
        
        connection.sdpConstraints.mandatory = {
            OfferToReceiveAudio: true,
            OfferToReceiveVideo: true
        };
        // STAR_FIX_VIDEO_AUTO_PAUSE_ISSUES
        // via: https://github.com/muaz-khan/RTCMultiConnection/issues/778#issuecomment-524853468
        var bitrates = 512;
        var resolutions = 'Ultra-HD';
        var videoConstraints = {};
        
        if (resolutions == 'HD') {
            videoConstraints = {
                width: {
                    ideal: 1280
                },
                height: {
                    ideal: 720
                },
                frameRate: 30
            };
        }
        
        if (resolutions == 'Ultra-HD') {
            videoConstraints = {
                width: {
                    ideal: 1920
                },
                height: {
                    ideal: 1080
                },
                frameRate: 30
            };
        }
        
        connection.mediaConstraints = {
            video: videoConstraints,
            audio: true
        };
        
        var CodecsHandler = connection.CodecsHandler;
        
        connection.processSdp = function(sdp) {
            var codecs = 'vp8';
            
            if (codecs.length) {
                sdp = CodecsHandler.preferCodec(sdp, codecs.toLowerCase());
            }
        
            if (resolutions == 'HD') {
                sdp = CodecsHandler.setApplicationSpecificBandwidth(sdp, {
                    audio: 128,
                    video: bitrates,
                    screen: bitrates
                });
        
                sdp = CodecsHandler.setVideoBitrates(sdp, {
                    min: bitrates * 8 * 1024,
                    max: bitrates * 8 * 1024,
                });
            }
        
            if (resolutions == 'Ultra-HD') {
                sdp = CodecsHandler.setApplicationSpecificBandwidth(sdp, {
                    audio: 128,
                    video: bitrates,
                    screen: bitrates
                });
        
                sdp = CodecsHandler.setVideoBitrates(sdp, {
                    min: bitrates * 8 * 1024,
                    max: bitrates * 8 * 1024,
                });
            }
        
            return sdp;
        };
        // END_FIX_VIDEO_AUTO_PAUSE_ISSUES
        
        // https://www.rtcmulticonnection.org/docs/iceServers/
        // use your own TURN-server here!
        connection.iceServers = [{
            'urls': [
                'stun:stun.l.google.com:19302',
                'stun:stun1.l.google.com:19302',
                'stun:stun2.l.google.com:19302',
                'stun:stun.l.google.com:19302?transport=udp',
            ]
        }];
        
        
        connection.videosContainer = document.querySelector('.second-screen');
        console.log(connection.videosContainer);
        connection.onstream = function(event) {
            var existing = document.getElementById(event.streamid);
            if(existing && existing.parentNode) {
              existing.parentNode.removeChild(existing);
            }
        
            event.mediaElement.removeAttribute('src');
            event.mediaElement.removeAttribute('srcObject');
            event.mediaElement.muted = true;
            event.mediaElement.volume = 0;
        
            var video = document.createElement('video');
        
            try {
                video.setAttributeNode(document.createAttribute('autoplay'));
                video.setAttributeNode(document.createAttribute('playsinline'));
            } catch (e) {
                video.setAttribute('autoplay', true);
                video.setAttribute('playsinline', true);
            }
        
            if(event.type === 'local') {
              video.volume = 0;
              try {
                  video.setAttributeNode(document.createAttribute('muted'));
              } catch (e) {
                  video.setAttribute('muted', true);
              }
            }
            video.srcObject = event.stream;
        
            var width = parseInt(connection.videosContainer.clientWidth / 3) - 20;
            var mediaElement = getHTMLMediaElement(video, {
                title: event.userid,
                buttons: ['full-screen'],
                width: width,
                showOnMouseEnter: false
            });
        
            connection.videosContainer.appendChild(mediaElement);
        
            setTimeout(function() {
                mediaElement.media.play();
            }, 5000);
        
            mediaElement.id = event.streamid;
        
            // to keep room-id in cache
            localStorage.setItem(connection.socketMessageEvent, connection.sessionid);
        
            chkRecordConference.parentNode.style.display = 'none';
        
            if(chkRecordConference.checked === true) {
              btnStopRecording.style.display = 'inline-block';
              recordingStatus.style.display = 'inline-block';
        
              var recorder = connection.recorder;
              if(!recorder) {
                recorder = RecordRTC([event.stream], {
                  type: 'video'
                });
                recorder.startRecording();
                connection.recorder = recorder;
              }
              else {
                recorder.getInternalRecorder().addStreams([event.stream]);
              }
        
              if(!connection.recorder.streams) {
                connection.recorder.streams = [];
              }
        
              connection.recorder.streams.push(event.stream);
              recordingStatus.innerHTML = 'Recording ' + connection.recorder.streams.length + ' streams';
            }
        
            if(event.type === 'local') {
              connection.socket.on('disconnect', function() {
                if(!connection.getAllParticipants().length) {
                  location.reload();
                }
              });
            }
        };
        connection.onMediaError = function(e) {
            console.log(e.message);
            if (e.message === 'Concurrent mic process limit.') {
                if (DetectRTC.audioInputDevices.length <= 1) {
                    alert('Please select external microphone. Check github issue number 483.');
                    return;
                }
        
                var secondaryMic = DetectRTC.audioInputDevices[1].deviceId;
                connection.mediaConstraints.audio = {
                    deviceId: secondaryMic
                };
        
                connection.join(connection.sessionid);
            }
        };
        
        var userIDel = document.querySelector("[data-user-id]");
        
        if(userIDel){
            var roomID = "roomUser" + userIDel.getAttribute("data-user-id");
            document.querySelectorAll('[data-id-to-call]').forEach(function(el){
                el.addEventListener("click", function(e){
                    e.preventDefault();
                    var idToCall = el.getAttribute("data-id-to-call");
                    var service = el.getAttribute("data-service");
                    var data = {
                        id: idToCall,
                        service: service
                    };
                    socket1.emit('checkUserOnline', data);
                    
                    // connection.open(roomID, function(isRoomOpened, roomid, error) {
              
                    //     if(isRoomOpened === true) {
                    //     //   showRoomURL(connection.sessionid);
                    //         console.log("room opened");
                    //     }
                    //     else {
                    //     //   disableInputButtons(true);
                    //       if(error === 'Room not available') {
                    //         alert('Someone already created this room. Please either join or create a separate room.');
                    //         return;
                    //       }
                    //       alert(error);
                    //     }
                    // });
                });
            });
            
            socket1.on("checkedUserOnline", function(data){
                if(data.result == 0){
                    document.querySelector("#userNotOnline h1 a").setAttribute("href", "/experts/"+data.id);
                    openPopup("#userNotOnline");
                }else{
                    if(data.service == "videoCall"){
                        console.log(data);
                    }
                }
            });
        }else{
            document.querySelectorAll('[data-id-to-call]').forEach(function(el){
                el.addEventListener("click", function(e){
                    e.preventDefault();
                    openPopup("#notLoggedInPopup");
                });
            });
        }
        
    }
</script>

<script type="text/javascript" src="/js/glide.min.js" defer></script>
<script type="text/javascript" src="/js/simplebar.min.js" defer></script>
<script type="text/javascript" src="/js/common.js" defer></script>
@if(Route::currentRouteName() == 'home')
    <script type="text/javascript" src="/js/home.js" defer></script>
@else
    <script type="text/javascript" src="/js/home.js" defer></script>
@endif

<script type="text/javascript" src="/js/phone-mask.js" defer></script>
<script type="text/javascript" src="/js/usersOnline.js" defer></script>

<script src="/js/messages.js" defer></script>

<script src="/js/expert.js" defer></script>
@if(strpos(url()->current(), 'profile/messages') !== false)
    
@endif