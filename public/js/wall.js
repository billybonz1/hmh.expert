import TimeAgo from 'javascript-time-ago';
 
// Load locale-specific relative date/time formatting rules.
// import en from 'javascript-time-ago/locale/en';
import ru from 'javascript-time-ago/locale/ru';


TimeAgo.addLocale(ru);
const timeAgo = new TimeAgo('ru-RU');


document.querySelectorAll("time.published").forEach(function(el){
    el.innerHTML = timeAgo.format(new Date(el.getAttribute("datetime")));
});



var wallPostAddPhoto = document.querySelector(".wall-post-add-photo");
if(wallPostAddPhoto){
	wallPostAddPhoto.addEventListener("click", function(e){
		e.preventDefault();
		this.previousElementSibling.click();
	});
}


document.addEventListener("click", function(e){
	e.path.forEach(function(el){
		if(el.classList && el.classList.contains('like-wall-post')){
			e.preventDefault();
		    if(document.querySelector('[data-user-id]')){
    		    let span = el.querySelector("span");
    		    if(!el.classList.contains('liked')){
        			if(span.innerHTML == ""){
        			    span.innerHTML = 1;
        			}else{
        			    let likes = parseInt(span.innerHTML);
        			    likes++;
        			    span.innerHTML = likes;
        			}
        			el.classList.add("liked");
    		    }else{
    		        let likes = parseInt(span.innerHTML);
        			likes--;
        			if(likes == 0){
        			    span.innerHTML = "";
        			}else{
        			    span.innerHTML = likes;
        			}
    		        el.classList.remove("liked");
    		    }
        		
                var xhr = new XMLHttpRequest();
                xhr.open('POST', el.getAttribute("href") + "?_token="+document.querySelector("[name='_token']").value);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                    }
                }
        		xhr.send();
    		}else{
    		    window.openPopup("#notLoggedInPopup");
    		}
		}
	});
});


document.addEventListener("submit", function(e){
	e.path.forEach(function(el){
		if(el.id && el.getAttribute("id") == "newsfeed-items-grid-form"){
			e.preventDefault();
			var formData = new FormData(el);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', el.getAttribute("action"));
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    console.log(data); 
                    let newsfeedItemsGreed = document.querySelector("#newsfeed-items-grid");
                    let post = document.createElement("div");
                    post.classList.add("ui-block");
                    post.innerHTML = `<article class="hentry post">
    					<div class="post__author author vcard inline-items">
    						<img src="`+document.querySelector(".author-thumb img").getAttribute("src")+`" alt="author">
    				
    						<div class="author-date">
    							<a class="h6 post__author-name fn" href="`+document.querySelector(".author-name").getAttribute("href")+`">`+document.querySelector(".author-name").innerHTML+`</a>
    							<div class="post__date">
    								<time class="published" datetime="2020-03-24T18:18">
    									Только что
    								</time>
    							</div>
    						</div>
    				
    						<div class="more">
    							<svg class="olymp-three-dots-icon">
    								<use xlink:href="#olymp-three-dots-icon"></use>
    							</svg>
    							<ul class="more-dropdown">
    								<li>
    									<a href="#">Редактировать сообщение</a>
    								</li>
    								<li>
    									<a href="#">Удалить сообщение</a>
    								</li>
    							</ul>
    						</div>
    				
    					</div>
    				
    					<p>`+data.text+`</p>
    				
    					<div class="post-additional-info inline-items">
    				
    						<a href="#" class="post-add-icon inline-items like-wall-post">
    							<svg class="olymp-heart-icon">
    								<use xlink:href="#olymp-heart-icon"></use>
    							</svg>
    							<span>0</span>
    						</a>
    						<div class="comments-shared">
    							<a href="#" class="post-add-icon inline-items">
    								<svg class="olymp-speech-balloon-icon">
    									<use xlink:href="#olymp-speech-balloon-icon"></use>
    								</svg>
    								<span>0</span>
    							</a>
    				
    							<a href="#" class="post-add-icon inline-items">
    								<svg class="olymp-share-icon">
    									<use xlink:href="#olymp-share-icon"></use>
    								</svg>
    								<span>0</span>
    							</a>
    						</div>
    					</div>
    				</article>`;
                    document.querySelector("#newsfeed-items-grid>div:first-child").after(post);
                    
                    var noWallPosts = document.querySelector(".no-wall-posts");
                    if(noWallPosts){
                        noWallPosts.remove();
                    }
                }
                else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                }
            }
            xhr.send(formData); 
		}
	});
});


