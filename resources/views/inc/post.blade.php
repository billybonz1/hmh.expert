<div class="blogs-post">
     <div>
         <a href="{{ $post->url() }}">
             <div class="blogs-post-img" style="background-image: url({{ $post->img }})"></div>
         </a>   
         <div class="blogs-post-content">
             <h4><a href="{{ $post->url() }}">{{ $post->title }}</a></h4>
             <p>
                 {{ $post->short_desc() }}
             </p>
             <div class="blogs-props">
                 <div>
                     Автор: <a href="/users/{{ $post->author()->id }}">{{ $post->author()->name }} {{ $post->author()->lastname }}</a>
                 </div>
                 
                 <div>
                     Комментариев: {{ count($post->approvedComments) }}
                 </div>
             </div>
             
             <div class="blogs-post-bottom">
                 <span class="blogs-post-date">{{ $post->created_at->format('d.m.Y H:i') }}</span>
                 <a href="{{ $post->url() }}">Подробнее</a>
             </div>
             
         </div>
     </div>
 </div>