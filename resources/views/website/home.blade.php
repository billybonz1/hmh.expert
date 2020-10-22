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
                            <a href="#" style="background-image: url(/img/news.png);">
                            </a>
                            <div>
                                <h4> Счастливые числа </h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                                </p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>
                        <div class="fs-article">
                            <a href="#" style="background-image: url(https://1001goroskop.ru/img/cards/koloda/_rub.png);">
                            </a>
                            <div>
                                <h4> Карта дня: гадание на картах Таро </h4>
                                <p>Каким будет твой день? </p>
                                <p> Для начала онлайн-гадания нажмите кнопку или сделайте двойной клик по колоде.</p>
                                <p>Что принесет наступающий день? Романтическую встречу, удачу, переживания? А может быть, сюрприз? Узнай, каким будет твой день!</p>
                                <p>Гадание с помощью колоды карт Таро – древнейший способ заглянуть в тайны своего будущего. Просто загадай в уме день, о котором ты хочешь узнать, и достань из колоды карту...</p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>
                        <div class="fs-article">
                            <a href="#" style="background-image: url(/img/news.png);">
                            </a>
                            <div>
                                <h4> Гороскоп-2021 </h4>
                                <div class="oven">
                                Овен
                                21.03 - 20.04</div>
                                <div class="telec">
                                Телец
                                21.04 - 21.05</div>
                                <div class="bliznec">
                                Близнецы
                                22.05 - 21.06</div>
                                <div class="rak">
                                Рак
                                22.06 - 22.07</div>
                                <div class="lev">
                                Лев
                                23.07 - 23.08</div>
                                <div class="deva">
                                Дева
                                24.08 - 22.09</div>
                                <div class="vesi">
                                Весы
                                23.09 - 22.10</div>
                                <div class="scorpion">
                                Скорпион
                                23.10 - 21.11</div>
                                <div class="strelec">
                                Стрелец
                                22.11 - 21.12</div>
                                <div class="kozerog">
                                Козерог
                                22.12 - 20.01</div>
                                <div class="vodaley">
                                Водолей
                                21.01 - 19.02</div>
                                <div class="ruba">
                                Рыбы
                                20.02 - 20.03</div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                                </p>
                                <a href="#">Подробнее</a>
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

            <style>

            </style>
            <script>
            
            </script>
            
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
