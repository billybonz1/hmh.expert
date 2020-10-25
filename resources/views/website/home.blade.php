@extends('website.website')

@section('content')

    @include('layouts._topChat')
    
        <div class="second-screen">
            <div class="inner">
                <div class="ss-adv-block">
                    <img src="/img/zdes.jpg" alt="">
                </div>
                <div class="top-experts">
                    <div class="top-experts-child top-experts-title">
                        <h3>Топ эксперты</h3>
                        <a href="/experts">Все эксперты</a>
                    </div>
                    
                    @foreach($experts as $expert)
                        @include('inc.expert')
                    @endforeach
            </div>
        </div>
        
        <div class="reviews-screen">
            <div class="inner">
                <div class="reviews-glide glide">
                    <div class="reviews-text">Отзывы</div>
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                          <li class="glide__slide">
                              <div>
                                  <div class="reviews-img">
                                      <img src="/img/review.png" alt="">
                                  </div>
                                  <div>
                                      <h4>Екатерина</h4>
                                      <p>
                                         Радмира очень позитивный человек и сильный эксперт! За короткий срок помогла мне выйти из состояния напряжения и стресса, дала позитивные установки и сейчас моя сложная ситуация начала разрешаться! Я очень довольна и буду продолжать следовать ее советам! Спасибо) 
                                     </p>
                                  </div>
                              </div>
                          </li>
                          <li class="glide__slide">
                              <div>
                                  <div class="reviews-img">
                                      <img src="/img/review.png" alt="">
                                  </div>
                                  <div>
                                      <h4>Елена</h4>
                                      <p>
                                         Я очень благодарна HMH.EXPERT, специалистам! Все четко и правдиво! Лучше горькая правда, чтобы жить стало легче!)
                                                 </p>
                                  </div>
                              </div>
                          </li>
                          <li class="glide__slide">
                              <div>
                                  <div class="reviews-img">
                                      <img src="/img/review.png" alt="">
                                  </div>
                                  <div>
                                      <h4>Наталья</h4>
                                      <p>
                                           Благодарю Зинаиду за благоприятный прогноз. Буду ждать результат. 
                                     </p>
                                  </div>
                              </div>
                          </li>
                        </ul>
                      </div>
                    
                    <div class="glide__arrows" data-glide-el="controls">
                      <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                      <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
                    </div>
                    
                    <div class="glide__bullets" data-glide-el="controls[nav]">
                      <button class="glide__bullet" data-glide-dir="=0"></button>
                      <button class="glide__bullet" data-glide-dir="=1"></button>
                      <button class="glide__bullet" data-glide-dir="=2"></button>
                    </div>
                </div>
            </div>
        </div>
        
        @if(Route::current()->getName() != "login" && Route::current()->getName() != "register" && Route::current()->getName() != "password.request")

        <div class="fourth-screen">
                <div class="inner">
                    <div class="fs-news-block">
                        <div class="fs-article">
           <!-- Style for Lacky number --><style>
                            #txt{
                                color:#eaeaea;	
                            }
                            /*WHEEL*/
                            #wheel{
                                width:250px;
                                height:250px;
                                border-radius:50%;	
                                position:relative;
                                overflow:hidden;
                                border:8px solid #fff;
                                box-shadow:rgba(0,0,0,0.2) 0px 0px 10px, rgba(0,0,0,0.05) 0px 3px 0px;
                                transform: rotate(0deg);
                            }
                            #wheel:before{
                                content:'';
                                position:absolute;
                                border:4px solid rgba(0,0,0,0.1);
                                width:242px;
                                height:242px;
                                border-radius:50%;
                                z-index:1000;	
                            }

                            #inner-wheel{
                                width:100%;
                                height:100%;
                                -webkit-transition: all 6s cubic-bezier(0,.99,.44,.99);
                                -moz-transition:    all 6 cubic-bezier(0,.99,.44,.99);
                                -o-transition:      all 6s cubic-bezier(0,.99,.44,.99);
                                -ms-transition:     all 6s cubic-bezier(0,.99,.44,.99);
                                transition:         all 6s cubic-bezier(0,.99,.44,.99);	
                            }

                            #wheel div.sec{
                                Position: absolute;
                                width: 0;
                                height: 0;
                                border-style: solid;
                                border-width: 130px 50px 0;
                                border-color: #19c transparent;
                                transform-origin: 50px 130px;
                                left: 64px;
                                top: -14px;
                                opacity: 1;
                            }

                            #wheel div.sec:nth-child(1){
                                transform: rotate(0deg);
                                border-color: #16a085 transparent;	
                            }
                            #wheel div.sec:nth-child(2){
                                transform: rotate(40deg);
                                border-color: #2980b9 transparent;	
                            }
                            #wheel div.sec:nth-child(3){
                                transform: rotate(80deg);
                                border-color: #13415f transparent;	
                            }
                            #wheel div.sec:nth-child(4){
                                transform: rotate(120deg);
                                border-color: #14c95e transparent;	
                            }
                            #wheel div.sec:nth-child(5){
                                transform: rotate(160deg);
                                border-color: #f39c12 transparent;	
                            }
                            #wheel div.sec:nth-child(6){
                                transform: rotate(200deg);
                                border-color: #3c3c51 transparent;	
                            }
                            #wheel div.sec:nth-child(7){
                                transform: rotate(240deg);
                                border-color: #d35400 transparent;	
                            }
                            #wheel div.sec:nth-child(8){
                                transform: rotate(280deg);
                                border-color: #14c4c transparent;	
                            }
                            #wheel div.sec:nth-child(9){
                                transform: rotate(320deg);
                                border-color: #ff4c4c transparent;	
                            }

                            #wheel div.sec .fa{
                                margin-top: -100px;
                                color: #fff;
                                position: relative;
                                z-index: 10000000;
                                display: block;
                                text-align: center;
                                font-size: 22px;
                                display: block;
                            width: 43px;
                            margin-left: -21px;
                                text-shadow: rgba(255, 255, 255, 0.1) 0px -1px 0px, rgba(0, 0, 0, 0.2) 0px 1px 0px;
                            }
                            #wheel div.sec .fa span{
                            font-size: 14px;
                            text-align: center;
                            }
                            #spin{
                                width:68px;
                                height:68px;
                                position:absolute;
                                top:50%;
                                left:50%;
                                margin:-34px 0 0 -34px;
                                border-radius:50%;
                                box-shadow:rgba(0,0,0,0.1) 0px 3px 0px;
                                z-index:1000;
                                background:#fff;
                                cursor:pointer;
                                font-family: 'Exo 2', sans-serif;
                            -webkit-user-select: none; 
                            -moz-user-select: none;    
                            -ms-user-select: none;     
                            -o-user-select: none;
                            user-select: none;   
                            }

                            #spin:after{
                                content:"SPIN";	
                                text-align:center;
                                line-height:68px;
                                color:#CCC;
                                text-shadow: 0 2px 0 #fff, 0 -2px 0 rgba(0,0,0,0.3) ;
                                position: relative;
                                z-index: 100000;
                                width:68px;
                                height:68px;
                                display:block;
                            }
                            #spin:before{
                                content:"";
                                position:absolute;
                                width: 0;
                                height: 0;
                                border-style: solid;
                                border-width: 0 20px 28px 20px;
                                border-color: transparent transparent #ffffff transparent;
                                top:-12px;
                                left:14px;
                            }
                            #inner-spin{
                                width:54px;
                                height:54px;
                                position:absolute;
                                top:50%;
                                left:50%;
                                margin:-27px 0 0 -27px;
                                border-radius:50%;
                                background:red;
                                z-index:999;
                                box-shadow:rgba(255,255,255,1) 0px -2px 0px inset, rgba(255,255,255,1) 0px 2px 0px inset,  rgba(0,0,0,0.4) 0px 0px 5px ;
                                background: rgb(255,255,255); /* Old browsers */
                                background: -moz-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%, rgba(234,234,234,1) 100%); /* FF3.6+ */
                                background: -webkit-gradient (radial, center center, 0px, center center, 100%, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(234,234,234,1))); /* Chrome,Safari4+ */
                                background: -webkit-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(234,234,234,1) 100%); /* Chrome10+,Safari5.1+ */
                                background: -o-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(234,234,234,1) 100%); /* Opera 12+ */
                                background: -ms-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(234,234,234,1) 100%); /* IE10+ */
                                background: radial-gradient(ellipse at center,  rgba(255,255,255,1) 0%,rgba(234,234,234,1) 100%); /* W3C */
                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#eaeaea',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */	
                            }
                            #spin:active #inner-spin{
                                box-shadow:rgba(0,0,0,0.4) 0px 0px 5px inset;
                            }
                            #spin:active:after{
                                font-size:15px;	
                            }
                            #shine{
                                width:250px;
                                height:250px;
                                position:absolute;
                                top:0;
                                left:0;
                                background: -moz-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%, rgba(255,255,255,0.99) 1%, rgba(255,255,255,0.91) 9%, rgba(255,255,255,0) 100%); /* FF3.6+ */
                                background: -webkit-gradient (radial, center center, 0px, center center, 100%, color-stop(0%,rgba(255,255,255,1)), color-stop(1%,rgba(255,255,255,0.99)), color-stop(9%,rgba(255,255,255,0.91)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
                                background: -webkit-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(255,255,255,0.99) 1%,rgba(255,255,255,0.91) 9%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
                                background: -o-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(255,255,255,0.99) 1%,rgba(255,255,255,0.91) 9%,rgba(255,255,255,0) 100%); /* Opera 12+ */
                                background: -ms-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(255,255,255,0.99) 1%,rgba(255,255,255,0.91) 9%,rgba(255,255,255,0) 100%); /* IE10+ */
                                background: radial-gradient(ellipse at center,  rgba(255,255,255,1) 0%,rgba(255,255,255,0.99) 1%,rgba(255,255,255,0.91) 9%,rgba(255,255,255,0) 100%); /* W3C */
                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
                                opacity:0.1;

                            }

                            /*ANIMATION*/
                            @-webkit-keyframes hh {
                            0%, 100%{
                                transform: rotate(0deg);
                                -webkit-transform: rotate(0deg);
                            }

                            50%{
                                transform: rotate(7deg);
                                -webkit-transform: rotate(7deg);
                            }
                            }

                            @keyframes hh {
                            0%, 100%{
                                transform: rotate(0deg);
                                -webkit-transform: rotate(0deg);
                            }

                            50%{
                                transform: rotate(7deg);
                                -webkit-transform: rotate(7deg);
                            }
                            }
                            .spin {
                            -webkit-animation: hh 0.1s; /* Chrome, Safari, Opera */
                                animation: hh 0.1s;
                            }
                       </style>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <div id="wrapper">
                    <div id="wheel">
                        <div id="inner-wheel">
                            <div class="sec"><span class="fa">1<span></span></span></div>
                            <div class="sec"><span class="fa">2<span></span></span></div>
                            <div class="sec"><span class="fa">3<span></span></span></div>
                            <div class="sec"><span class="fa">4<span></span></span></div>
                            <div class="sec"><span class="fa">5<span></span></span></div>
                            <div class="sec"><span class="fa">6<span></span></span></div>
                            <div class="sec"><span class="fa">7<span></span></span></div>
                            <div class="sec"><span class="fa">8<span></span></span></div>
                            <div class="sec"><span class="fa">9<span></span></span></div>
                        </div>       
                        <div id="spin"><div id="inner-spin"></div></div><div id="shine"></div></div><div id="txt"></div></div>
                                        <div>
                                            <h4> Счастливые числа </h4>
                                            <p>  Цифра гармонии, которую стоит ценить Весам и Тельцам.  </p>
                                            <p>  Именно это число приносит удачу этим знакам, если они занимаются тем, 
                                                 что им нравится. Кроме того, шестерка приносит удачу в любовных отношения. </p> 
                                            <a href="#">Подробнее</a>
                                        </div>
                                   </div>
                        <!-- JS for Lucky number -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                        <script>
                            //set default degree (360*5)
                            var degree = 1800;
                                    //number of clicks = 0
                            var clicks = 0;

                            $(document).ready(function(){
                                        
                                        /*WHEEL SPIN FUNCTION*/
                                        $('#spin').click(function(){
                                            
                                            clicks ++;
                                            
                                            var newDegree = degree*clicks;
                                            var extraDegree = Math.random()*2167;
                                            totalDegree = newDegree+extraDegree;
                                            
                                            $('#wheel .sec').each(function(){
                                                var t = $(this);
                                                var noY = 0;
                                                
                                                var c = 0;
                                                var n = 700;	
                                                var interval = setInterval(function () {
                                                    c++;				
                                                    if (c === n) { 
                                                        clearInterval(interval);				
                                                    }	
                                                        
                                                    var aoY = t.offset().top;
                                                    $("#txt").html(aoY);
                                                    console.log(aoY);
                                                    
                                                    if(aoY < 23.89){
                                                        console.log('<<<<<<<<');
                                                        $('#spin').addClass('spin');
                                                        setTimeout(function () { 
                                                            $('#spin').removeClass('spin');
                                                        }, 100);	
                                                    }
                                                }, 10);
                                                
                                                $('#inner-wheel').css({
                                                    'transform' : 'rotate(' + totalDegree + 'deg)'			
                                                });
                                            
                                                noY = t.offset().top;
                                                
                                            });
                                        });
                                        
                                    });
                        </script>
                        <div class="fs-article">
                        <div class="cards">
                        <!-- style for card day --->
                        <style>
                                .cards{
                                    display: flex;
                                    flex-wrap: wrap;
                                }
                                .card {
                                    transform: perspective(1000px);
                                    transform-style: preserve-3d;
                                    position: relative;
                                    margin: 70px;
                                    width:  100px;
                                    height: 200px;
                                }

                                .frontside,
                                .backside {
                                    width: 100%;
                                    height: 100%;
                                    border-radius: 15px;
                                    box-shadow: 0 0 10px 2px #000;
                                }
                                .frontside {
                                    transition: transform 0.6s cubic-bezier(0.5, 0.3, 0.3, 1);
                                    overflow: hidden;
                                    position: absolute;
                                    top: 0;
                                    backface-visibility: hidden;
                                }
                                .card .frontside {
                                    transform: rotateY(0deg);
                                    transform-style: preserve-3d;
                                    z-index: 1;
                                }
                                .card:hover .frontside {
                                    transform: rotateY(-180deg);
                                    transform-style: preserve-3d;
                                }

                                .backside {
                                    transition: transform 0.6s cubic-bezier(0.5, 0.3, 0.3, 1);
                                    overflow: hidden;
                                    position: absolute;
                                    top: 0;
                                    backface-visibility: hidden;
                                }
                                .card .backside {
                                    transform: rotateY(180deg);
                                    transform-style: preserve-3d;
                                    z-index: 1;
                                }
                                .card:hover .backside {
                                    transform: rotateY(0deg);
                                    transform-style: preserve-3d;
                                }


                                .square-container3 {
                                    text-align: center;
                                    position: relative;
                                    top: 50%;
                                    transition: transform 0.6s cubic-bezier(0.5, 0.3, 0.3, 1);
                                    transform: translateY(-50%) translateX(0px) scale(1);
                                    transform-style: preserve-3d;
                                    z-index: 2;
                                }
                                .card:hover .square-container3 {

                                }

                                .square-container2 {
                                    padding: 20px; 
                                    text-align: center;
                                    position: relative;
                                    top: 50%;
                                    transition: transform 0.6s cubic-bezier(0.5, 0.3, 0.3, 1);
                                    transform: translateY(-50%) translateX(0px) translateZ(0px) scale(1);
                                    transform-style: preserve-3d;
                                    z-index: 2;
                                    *{
                                        color: lighten(red, 14);
                                        text-shadow: 0 0 3px 0 #fff;
                                    }
                                    h1{
                                        font-size: 50px;
                                    }
                                    h3{
                                        font-size: 35px;
                                        font-weight: bold;
                                    }
                                    p{
                                        font-size: 24px;
                                    }
                                }
                                .card:hover .square-container2 {

                                }

                                .flip-overlay {
                                    display: block;
                                    background: #1d1e22;
                                    width: 100%;
                                    height: 100%;
                                    position: absolute;
                                    top: 0;
                                }
                             </style>

                            <div class="card">
                                <div class='frontside'>
                                    <div class="square-container3">
                                        <img src="https://zeland.me/wp-content/uploads/posts/2018-09/1536660396_taro-uayta-dyavol.jpg"/>
                                    </div>
                                    <div class="flip-overlay"></div>
                                </div>
                                <div class='backside'>
                                    <div class="square-container2">
                                        <h1>666</h1>
                                        <h3>Карта дьявола</h3>
                                        <p>
                                            В ближайшее время будет все плохо
                                        </p>
                                        <p>Единственный способ избавиться от проклятия</p>
                                        <h1>666</h1>
                                    </div>
                                    <div class="flip-overlay">
                                    </div>
                                </div>
                            </div>
                        </div>	
                            <div>
                                <h4>Карта дня гадание </h4>
                                <p> Каким будет твой день?
                                    Для начала онлайн-гадания нажмите кнопку или сделайте двойной клик по колоде.</p>
                                <p> Что принесет наступающий день? Романтическую встречу, удачу, переживания? А может быть, сюрприз? Узнай, каким будет твой день!</p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>

                        <div class="fs-article">
                
                    <style>
                        .goroskop{display:flex;flex-wrap:wrap}
                        .goroskop h4{width:100%;flex:0 0 100%;margin-bottom:15px;text-align:right;padding-right:14px}
                        .goroskop-container{display:flex;flex-wrap:wrap;width:57%;padding-right:20px}
                        .goroskop p{flex:1}
                        .goroskop-container>div{width:33.333333333333333333333333%;font-size: x-small;text-align:center;font-weight:500; transition:1s; border-radius:12px}
                        .goroskop-container br{padding-top:2px}
                        .oven .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/aries.png)}
                        .goroskop-img {background-color:white !important; border-radius:30px;background-size:contain !important;max-width: 22px;height: 22px;margin: 0 auto;margin-bottom:5px}
                        .telec .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/taurus.png)}
                        .bliznec .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/gemini.png)}
                        .rak .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/cancer.png)}
                        .lev .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/leo.png)}
                        .deva .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/virgo.png)}
                        .vesi .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/libra.png)}
                        .scorpion .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/scorpio.png)}
                        .strelec .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/sagittarius.png)}
                        .vodo .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/aquarius.png)}
                        .ruba .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/pisces.png)}
                        .kozerog .goroskop-img{background:url(https://1001goroskop.ru/img/zodiak/mini/capricorn.png)}
                        .goroskop-container>div:hover {background-color:#ff4c4c; color:white}
                        .fourth-screen .inner{
                            align-items: stretch;
                        }

                        .top-expert{
                            height: 100%;   
                        }
                        .second-screen .inner{
                            align-items: stretch;
                        }
                        .ss-adv-block img{
                            height: 100%;
                        }
                        
                  </style>
                            <div class="goroskop">
                                <h4> Гороскоп-2021 </h4>
                                <div class="goroskop-container">
                                            <div class="oven">
                                            <div class="goroskop-img"></div>
                                            Овен<br>
                                            21.03 - 20.04</div>
                                            <div class="telec">
                                            <div class="goroskop-img"></div>
                                            Телец<br>
                                            21.04 - 21.05</div>
                                            <div class="bliznec">
                                            <div class="goroskop-img"></div>
                                            Близнецы<br>
                                            22.05 - 21.06</div>
                                            <div class="rak">
                                            <div class="goroskop-img"></div>
                                            Рак<br>
                                            22.06 - 22.07</div>
                                            <div class="lev">
                                            <div class="goroskop-img"></div>
                                            Лев<br>
                                            23.07 - 23.08</div>
                                            <div class="deva">
                                            <div class="goroskop-img"></div>
                                            Дева<br>
                                            24.08 - 22.09</div>
                                            <div class="vesi">
                                            <div class="goroskop-img"></div>
                                            Весы<br>
                                            23.09 - 22.10</div>
                                            <div class="scorpion">
                                            <div class="goroskop-img"></div>
                                            Скорпион<br>
                                            23.10 - 21.11</div>
                                            <div class="strelec">
                                            <div class="goroskop-img"></div>
                                            Стрелец<br>
                                            22.11 - 21.12</div>
                                            <div class="kozerog">
                                            <div class="goroskop-img"></div>
                                            Козерог<br>
                                            22.12 - 20.01</div>
                                            <div class="vodo">
                                            <div class="goroskop-img"></div>
                                            Водолей<br>
                                            21.01 - 19.02</div>
                                            <div class="ruba">
                                            <div class="goroskop-img"></div>
                                            Рыбы<br>
                                            20.02 - 20.03</div>
                                </div>
                                <p>Год чудес и невиданных перемен. Библии исполняется 3333 года.
                                   Думаю, все уже успели понять, что мы живем в очень необычное время. 
                                   2020-й оставил неизгладимый след во всех сферах: пандемия, стихийные бедствия, 
                                   бунты в Америке. Хочется надеяться, что в наступающем 2021-м году все это останется в прошлом. Что говорят об этом звезды?<a href="#">Подробнее</a></p>
                            </div>
                        </div>
                    </div>
                  















                    <div class="fs-events">
                        <div class="fs-events-calendar">
                            <h3>Календарь мероприятий</h3>
                            <div>
                                <a href="#" class="fs-calendar-event">
                                    <div class="fs-ce-text">
                                        <img src="/img/lesson1.png" alt="">
                                        <div>
                                            <h4>Ирина</h4>
                                            <p>Уроки макияжа</p>
                                        </div>
                                    </div>
                                    <div class="fs-ce-date">
                                        15.04
                                    </div>
                                </a>
                                <a href="#" class="fs-calendar-event">
                                    <div class="fs-ce-text">
                                        <img src="/img/lesson1.png" alt="">
                                        <div>
                                            <h4>Кристина</h4>
                                            <p>Уроки макияжа</p>
                                        </div>
                                    </div>
                                    <div class="fs-ce-date">
                                        15.04
                                    </div>
                                </a>
                                <a href="#" class="fs-calendar-event">
                                    <div class="fs-ce-text">
                                        <img src="/img/lesson1.png" alt="">
                                        <div>
                                            <h4>Кристина</h4>
                                            <p>Уроки макияжа</p>
                                        </div>
                                    </div>
                                    <div class="fs-ce-date">
                                        15.04
                                    </div>
                                </a>
                                <a href="#" class="fs-calendar-event">
                                    <div class="fs-ce-text">
                                        <img src="/img/lesson1.png" alt="">
                                        <div>
                                            <h4>Кристина</h4>
                                            <p>Уроки макияжа</p>
                                        </div>
                                    </div>
                                    <div class="fs-ce-date">
                                        15.04
                                    </div>
                                </a>
                                <a href="#" class="fs-calendar-event">
                                    <div class="fs-ce-text">
                                        <img src="/img/lesson1.png" alt="">
                                        <div>
                                            <h4>Кристина</h4>
                                            <p>Уроки макияжа</p>
                                        </div>
                                    </div>
                                    <div class="fs-ce-date">
                                        15.04
                                    </div>
                                </a>
                                <a href="#" class="fs-calendar-event">
                                    <div class="fs-ce-text">
                                        <img src="/img/lesson1.png" alt="">
                                        <div>
                                            <h4>Кристина</h4>
                                            <p>Уроки макияжа</p>
                                        </div>
                                    </div>
                                    <div class="fs-ce-date">
                                        15.04
                                    </div>
                                </a>
                                <a href="#" class="fs-calendar-event">
                                    <div class="fs-ce-text">
                                        <img src="/img/lesson1.png" alt="">
                                        <div>
                                            <h4>Кристина</h4>
                                            <p>Уроки макияжа</p>
                                        </div>
                                    </div>
                                    <div class="fs-ce-date">
                                        15.04
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fs-events-second">
                            <div class="fs-best-expert">
                                <h3>Лучший эксперт</h3>
                                <div class="fs-best-expert-content">
                                    <a href="#">
                                        <img src="/img/expert-photo-mini.png" alt="">
                                        <i class="fs-icon-like"></i>
                                    </a>
                                    <div class="fs-best-expert-info">
                                        <h4>Елизавета</h4>
                                        <p>Косметолог</p>
                                        
                                        <div class="fs-be-prop">
                                            <div>Клиентов</div>
                                            <div>231</div>
                                        </div>
                                        <div class="fs-be-prop">
                                            <div>Опыт</div>
                                            <div>4 года</div>
                                        </div>
                                        <div class="fs-be-prop">
                                            <div>Рейтинг</div>
                                            <div><i class="fs-icon-star"></i>4.9</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-big-event">
                                <h4>Заголовок мероприятия</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. 
        
                                    Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                                </p>
                                <img src="/img/news2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="big-bottoms-buttons">
                <div class="inner">
                    <a href="/news" class="bbb">
                        <i class="bbb-news"></i>
                        Новостной портал
                    </a>
                    <a href="#" class="bbb">
                        <i class="bbb-forum"></i>
                        Активный форум
                    </a>
                    <a href="{{ route('blogs') }}" class="bbb">
                        <i class="bbb-blogs"></i>
                        Популярные блоги
                    </a>
                </div>
            </div>
        @endif
@endsection
