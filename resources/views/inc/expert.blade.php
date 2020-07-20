<div class="top-experts-child">
    <div class="top-expert top-expert-{{ $expert->id }}">
        <div class="top-expert-img" style="background-image: url(/public/img/expert-photo.jpg);">
            <div class="top-expert-post">Эксперт</div>
            <div class="top-expert-live now-live">
                <div>Live</div>
            </div>
            <div class="top-expert-live now-online">
                <div>Online</div>
            </div>
        </div>
        <div class="top-expert-content">
            <h4>{{ $expert->namef() }}</h4>
            <div class="tec-post">Косметолог</div>
            <div class="tec-exp">Опыт работы: 4 года</div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et . gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
            </p>
            <div class="tec-rating-block">
                <div class="tec-rating">
                    <div></div>
                </div>
                
                <span>4.7</span>
            </div>
            
            <div class="tec-hover">
                <div class="tec-hover-title"></div>
                <div class="tec-hover-icons">
                    <a href="/experts/{{$expert->id}}" class="tec-hover-icon-more" data-title="Читать подробнее"></a>
                    <a href="#payForPrivateChat" data-id="{{$expert->id}}" class="tec-hover-icon-message open-popup" data-title="Написать сообщение"></a>
                    <a href="#" class="tec-hover-icon-call" data-title="Позвонить"></a>
                    <a href="#" class="tec-hover-icon-video" data-id-to-call="{{ $expert->id }}" data-title="Видео-чат"></a>
                </div>
            </div>
        </div>
    </div>
</div>