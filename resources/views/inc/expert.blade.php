<div class="top-experts-child">
    <div class="top-expert top-expert-{{ $expert->id }}">
        <div class="top-expert-img" style="background-image: url({{ $expert->avatar('226x196') }});">
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
            <div class="tec-post">{{ $expert->post }}</div>
            @if(!empty($expert->exp))
                <div class="tec-exp">Опыт работы: {{ $expert->exp }}</div>
            @else
                <div class="tec-exp" style="background: none;"></div>
            @endif
            <p>
               {{ $expert->about }}
            </p>
            <div class="tec-rating-block">
                <div class="tec-rating">
                    <div style="width: {{ $expert->ratingProcent() }}"></div>
                </div>
                @if($expert->rating() == 0)
                    <span>Нет оценок</span>
                @else
                    <span>{{ $expert->rating() }}</span>
                @endif
                
            </div>
            
            <div class="tec-hover">
                <div class="tec-hover-title"></div>
                <div class="tec-hover-icons">
                    <a href="/experts/{{$expert->id}}" class="tec-hover-icon-more" data-title="Читать подробнее"></a>
                    <a href="#payForPrivateChat" data-id="{{$expert->id}}" class="tec-hover-icon-message open-popup" data-title="Написать сообщение"></a>
                    <a href="#" class="tec-hover-icon-call" data-id-to-call="{{ $expert->id }}" data-service="audioCall" data-title="Позвонить"></a>
                    <a href="#" class="tec-hover-icon-video" data-id-to-call="{{ $expert->id }}" data-service="videoCall" data-title="Видео-чат"></a>
                </div>
            </div>
        </div>
        @if(Route::currentRouteName() == "favourite")
        <div class="remove-favourite" data-id="{{ $expert->id }}" data-tooltip="Убрать из избранного">
            <svg xmlns="http://www.w3.org/2000/svg" height="512px" viewBox="0 0 58 60" width="512px"><g><g id="Page-1" fill="none" fill-rule="evenodd"><g id="047---Delete" fill="rgb(0,0,0)" fill-rule="nonzero"><path id="Shape" d="m7.4531 57.2139c.24593878 1.6630605 1.7134602 2.868231 3.3926 2.7861h36.3086c1.6794712.0820715 3.147124-1.1236395 3.3926-2.7871l3.3841-42.307c2.5346757-.4790042 4.2880513-2.8088022 4.0466785-5.37702435-.2413728-2.56822213-2.3981392-4.5305278-4.9776785-4.52887565h-10.5195l-.6973-.8721c-2.0826643-2.61550816-5.246402-4.13586872-8.5898-4.1279h-8.3868c-3.3431613-.00816548-6.506675 1.5122644-8.5888 4.1279l-.6978.8721h-10.52c-2.5795393-.00165215-4.73630566 1.96065352-4.97767846 4.52887565-.2413728 2.56822215 1.51200281 4.89802015 4.04667846 5.37702435zm41.1-.1621c-.042.5234-.6689.9482-1.3984.9482h-36.309c-.73 0-1.3564-.4248-1.3984-.9473l-3.3643-42.0527h45.834zm-23.7465-55.0518h8.3868c2.556267-.00207043 4.9912341 1.08984308 6.69 3h-21.7655c1.6982162-1.91015689 4.1327983-3.00210992 6.6887-3zm-22.8066 8c.00181871-1.65610033 1.34389967-2.99818129 3-3h48c1.6568542 0 3 1.34314575 3 3 0 1.6568542-1.3431458 3-3 3h-48c-1.65610033-.0018187-2.99818129-1.3438997-3-3z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path id="Shape" d="m26 51c.5522847 0 1-.4477153 1-1v-27c0-1.1045695.8954305-2 2-2s2 .8954305 2 2c0 .5522847.4477153 1 1 1s1-.4477153 1-1c0-2.209139-1.790861-4-4-4s-4 1.790861-4 4v27c0 .5522847.4477153 1 1 1z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path id="Shape" d="m14 51c.5522847 0 1-.4477153 1-1v-27c0-1.1045695.8954305-2 2-2s2 .8954305 2 2c0 .5522847.4477153 1 1 1s1-.4477153 1-1c0-2.209139-1.790861-4-4-4s-4 1.790861-4 4v27c0 .5522847.4477153 1 1 1z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path id="Shape" d="m38 51c.5522847 0 1-.4477153 1-1v-27c0-1.1045695.8954305-2 2-2s2 .8954305 2 2c0 .5522847.4477153 1 1 1s1-.4477153 1-1c0-2.209139-1.790861-4-4-4s-4 1.790861-4 4v27c0 .5522847.4477153 1 1 1z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/></g></g></g> </svg>
        </div>
        @endif
    </div>
</div>