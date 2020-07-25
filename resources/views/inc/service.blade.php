<div class="blogs-post blogs-service">
    <div>
       <a href="{{ $post->url() }}">
           <div class="blogs-post-img" style="background-image: url({{ $post->getThumbUrlAttribute() }})"></div>
       </a>   
       <div class="blogs-post-content">
           <h4><a href="{{ $post->url() }}">{{ $post->name }}</a></h4>
           <p>
               {!! $post->shortdesc !!}
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