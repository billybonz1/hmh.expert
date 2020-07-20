@extends('website.website')

@section('content')
    <div class="top-chat detail-expert top-expert-{{ $user->id }}" @if($currentUser == null || $currentUser->id != $user->id)data-expert-id="{{ $user->id }}"@endif>
        <div class="inner">

            <div class="top-chat-block">
                <div class="tcp-detail-info">
                    <div class="tcp-detail-info-img" style="background-image: url(/public/img/expert-photo-mini.png);"></div>
                    <div>
                        <div class="pe-author">
                            <h1>
                                {{ $user->namef() }}
                            </h1>
                            <div class="user-status st-grey active">Нет в&nbsp;сети</div>
                            <div class="user-status now-online">В&nbsp;сети</div>
                        </div>
                        <ul class="pe-info">
                            <li class="pei-item"> 49 рублей/мин. </li>
                            <li class="pei-item"> 10 лет опыта </li>
                            <li class="pei-item">
                                рейтинг эксперта
                                <div class="tec-rating-block">
                                    <div class="tec-rating">
                                        <div style="width: {{ $user->ratingProcent() }}"></div>
                                    </div>
                                    <span>{{ $user->rating() }}</span>
                                </div>

                            </li>

                        </ul>
                        <a href="#" class="open-raspisanie"> Узнать расписание эксперта </a>
                    </div>
                </div>
                <div class="tcp-experts">
                    <div class="tcp-expert" style="background-image: url(/public/img/expert-photo-mini.png);"></div>
                    <div class="tcp-expert" style="background-image: url(/public/img/expert-photo-mini.png);"></div>
                    <div class="tcp-expert" style="background-image: url(/public/img/expert-photo-mini.png);"></div>
                    <div class="tcp-expert" style="background-image: url(/public/img/expert-photo-mini.png);"></div>
                    <div class="tcp-expert" style="background-image: url(/public/img/expert-photo-mini.png);"></div>
                    <div class="tcp-expert" style="background-image: url(/public/img/expert-photo-mini.png);"></div>
                    <a href="#" class="tcp-next-experts">следующий эксперт</a>
                </div>
                <div class="tcp-video-live">
                    <div id="videos-container" class="broadcast-video"></div>
                    <!--<video class="broadcast-video" poster="/public/img/live-video.jpg"></video>-->
                    <div class="tcp-title">
                        <i class="tcp-video-icon"></i>
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="tcp-live"></div>
                    @if($currentUser != null && $currentUser->hasRole('expert') && $currentUser->id == $user->id)
                        <button class="start-broadcast active" data-room-name="expertRoom{{ $currentUser->id }}">Запустить прямую трансляцию</button>
                        <button class="stop-broadcast">Остановить прямую трансляцию</button>
                    @else
                        <div class="no-broadcast active">
                            В данный момент нет прямой трансляции
                        </div>
                        <button class="play-broadcast"></button>
                    @endif
                </div>
                <div class="tcp-chat">
                    <div class="tcp-chat-title">Чат</div>
                    <div class="tcp-chat-messages group-chat-{{ $chat->id }}">
                        @foreach($messages as $message)
                            <div class="tcp-chat-message">
                                <div class="tcp-chat-message-top">
                                    <a href="/profile/messages/user1" target="_blank">
                                        <img src="{{ $message->getSenderAvatar() }}" alt="{{ $message->getSenderName() }}"><span>{{ $message->getSenderName() }}</span>
                                    </a>
                                    <div class="tcp-chat-message-date">
                                        {{ $message->created_at->format('d.m.Y H:i') }}
                                    </div>
                                </div>
                                <p>{{ $message->message }}</p>
                            </div>
                        @endforeach
                    </div>


                    <!--@if($errors->any())-->
                    <!--    <ul>-->
                    <!--        @foreach($errors->all() as $error)-->
                    <!--            <li>{{ $error }}</li>-->
                    <!--        @endforeach-->
                    <!--    </ul>-->
                    <!--@endif-->

                    <form class="tcp-input" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="chat_id" value="{{ $chat->id }}">
                        <input type="hidden" name="to_id" value="0" />
                        @isset($currentUser)
                            <input type="hidden" name="from_id" value="{{ $currentUser->id }}" />
                        @else
                            <input type="hidden" name="from_id" value="0" />
                        @endisset


                        @if($currentUser)
                            @if($currentUser->hasRole("expert"))
                                <input type="text" name="message" placeholder="Введите сообщение" />
                            @else
                                <input type="text" name="message" placeholder="Доступно сообщений: {{ $currentUser->groups_messages }}" data-messages="{{ $currentUser->groups_messages }}" />
                            @endif
                        @else
                            <input type="text" name="message" placeholder="Введите сообщение" />
                        @endif
                        <button class="tcp-send-icon"></button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!--<div class="reviews-screen">-->
    <!--    <div class="inner">-->
    <!--        <div class="reviews-glide glide">-->
    <!--            <div class="reviews-text">Отзывы</div>-->
    <!--            <div class="glide__track" data-glide-el="track">-->
    <!--                <ul class="glide__slides">-->
    <!--                  <li class="glide__slide">-->
    <!--                      <div>-->
    <!--                          <div class="reviews-img">-->
    <!--                              <img src="/public/img/review.png" alt="">-->
    <!--                          </div>-->
    <!--                          <div>-->
    <!--                              <h4>Елизавета</h4>-->
    <!--                              <p>-->
    <!--                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. -->
    <!--                              </p>-->
    <!--                          </div>-->
    <!--                      </div>-->
    <!--                  </li>-->
    <!--                  <li class="glide__slide">-->
    <!--                      <div>-->
    <!--                          <div class="reviews-img">-->
    <!--                              <img src="/public/img/review.png" alt="">-->
    <!--                          </div>-->
    <!--                          <div>-->
    <!--                              <h4>Елизавета</h4>-->
    <!--                              <p>-->
    <!--                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. -->
    <!--                              </p>-->
    <!--                          </div>-->
    <!--                      </div>-->
    <!--                  </li>-->
    <!--                  <li class="glide__slide">-->
    <!--                      <div>-->
    <!--                          <div class="reviews-img">-->
    <!--                              <img src="/public/img/review.png" alt="">-->
    <!--                          </div>-->
    <!--                          <div>-->
    <!--                              <h4>Елизавета</h4>-->
    <!--                              <p>-->
    <!--                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. -->
    <!--                              </p>-->
    <!--                          </div>-->
    <!--                      </div>-->
    <!--                  </li>-->
    <!--                </ul>-->
    <!--              </div>-->

    <!--            <div class="glide__arrows" data-glide-el="controls">-->
    <!--              <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>-->
    <!--              <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>-->
    <!--            </div>-->

    <!--            <div class="glide__bullets" data-glide-el="controls[nav]">-->
    <!--              <button class="glide__bullet" data-glide-dir="=0"></button>-->
    <!--              <button class="glide__bullet" data-glide-dir="=1"></button>-->
    <!--              <button class="glide__bullet" data-glide-dir="=2"></button>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        @if($currentUser && $currentUser->hasRole('expert'))-->
    <!--            <div class="broadcast-users-online">-->
    <!--                <h3>Пользователей онлайн: <span>0</span></h3>-->
    <!--                <div></div>-->
    <!--            </div>-->
    <!--        @endif-->
    <!--    </div>-->
    <!--</div>-->
    <div class="expert-detail-second">
        <div class="inner">
            <div class="expert-detail-services">
                <div class="expert-detail-services-cont">
                    <h3>Услуги эксперта</h3>
                    <div class="blogs-posts">
                        @foreach($services as $post)
                            <div class="blogs-post">
                                <div>
                                    <a href="{{ $post->url() }}">
                                        <div class="blogs-post-img" style="background-image: url({{ $post->getThumbUrlAttribute() }})"></div>
                                    </a>
                                    <div class="blogs-post-content">
                                        <h4><a href="{{ $post->url() }}">{{ $post->name }}</a></h4>
                                        <p>
                                            {{ $post->shortdesc }}
                                        </p>

                                        <div class="blog-post-price-wrap">
                                            <p class="blogs-post-price">
                                                Цена: <strong>{!! $post->getPrice() !!}</strong>
                                            </p>

                                            <div class="blogs-post-bottom">
                                                <a href="{{ $post->url() }}" class="btn">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="services-bottom">
                        <a href="#" class="show-more-services" data-services="{{ count($services) }}" data-services-count="{{ $user->servicesCount() }}" data-user-id="{{ $user->id }}">Загрузить ещё</a>
                    </div>
                </div>
                <div class="expert-detail-services-cont">
                    <h3>Об эксперте</h3>
                    <p>
                        {{ $user->about }}
                    </p>
                </div>
                <div class="expert-detail-services-cont">
                    <h3>Практики</h3>
                    <div>
                        @php $count = count($user->categories); @endphp
                        @foreach($user->categories as $key=>$cat)
                            @php $c = $key + 1; @endphp
                            <a href="{{ $cat->url() }}">{{ $cat->title }}</a>
                            @if($c != $count),@endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="expert-detail-reviews">
                <div>
                    <h3>{!! $user->reviewsCountText() !!} эксперта</h3>
                    <div class="tec-rating-block">
                        <div class="tec-rating">
                            <div style="width: {{ $user->ratingProcent() }}"></div>
                        </div>
                        <span>{{ $user->rating() }}</span>
                    </div>
                    <div class="expert-detail-reviews-inner">
                        @foreach($reviews as $review)
                            <div class="expert-detail-review">
                                <h4>
                                    <div>
                                        <span>{{ $review->getUserName() }}</span>
                                        <div class="tec-rating-block">
                                            <div class="tec-rating">
                                                <div style="width: {{$review->ratingProcent()}}"></div>
                                            </div>
                                            <span>{{ $review->rating }}</span>
                                        </div>
                                    </div>
                                    <div class="expert-detail-review-date">
                                        {{ $review->created_at->format('d.m.y') }}
                                    </div>
                                </h4>
                                <p>
                                    {{ $review->text }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>



                <div class="expert-detail-reviews-btns">
                    <a href="#sendReview" class="show-more-reviews">Показать еще</a>
                    @isset($currentUser)
                        <a href="#sendReview" class="send-review open-popup">Оставить отзыв</a>
                    @else
                        <a href="#notLoggedInPopup" class="send-review open-popup">Оставить отзыв</a>
                    @endif
                </div>


                @isset($currentUser)
                    <div id="sendReview" class="total-popup videocall-popup">
                        <div class="videocall-popup-inner" style="min-height: unset;max-width: 500px;">
                            <form class="main-form" method="POST" action="/experts/addreview">
                                @csrf
                                <h1 style="padding: 0 15px; font-size: 30px;">
                                    Пожалуйста, оставьте отзыв
                                </h1>
                                <label class="popup-rating-label">
                                    <span>Ваша оценка консультации:</span>
                                    <div class="popup-rating">
                                        <div class="popup-rating-star active" data-number="1"></div>
                                        <div class="popup-rating-star" data-number="2"></div>
                                        <div class="popup-rating-star" data-number="3"></div>
                                        <div class="popup-rating-star" data-number="4"></div>
                                        <div class="popup-rating-star" data-number="5"></div>
                                    </div>
                                </label>
                                <label>
                                    <div>Текст отзыва:</div>
                                    <span style="position: relative;">
                                        <textarea name="text" required></textarea>
                                    </span>
                                </label>
                                <input type="hidden" name="rating" value="1" />
                                <input type="hidden" name="expert_id" value="{{ $user->id }}" />
                                <button class="popup-btn">Оставить отзыв</button>
                            </form>

                            <div class="total-popup-close">X</div>
                        </div>
                    </div>

                    <div id="sendReviewSuccess" class="total-popup videocall-popup">
                        <div class="videocall-popup-inner" style="min-height: unset;max-width: 500px;">
                            <div class="main-form">
                                <h1 style="padding: 0 15px; font-size: 30px;">
                                    Спасибо за Ваш отзыв!
                                </h1>
                            </div>
                            <div class="total-popup-close">X</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
