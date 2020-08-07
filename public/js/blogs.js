document.querySelectorAll(".logged-in .like-attr").forEach(function(el){
    el.addEventListener("click", function(e){
        e.preventDefault();
        var likePost = el.querySelector(".like-post");
        
        if(!likePost.classList.contains("liked")){
            var postID = likePost.getAttribute("data-post-id");
            likePost.classList.add("liked");
            var likes = parseInt(el.querySelector("span").innerHTML);
            likes++;
            el.querySelector("span").innerHTML = likes;
            
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', "/profile/likepost?postid="+postID+"&_token="+document.querySelector("[name='_token']").value);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                }
                else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                }
            };
            xhr.send();
        }
        
        
        
    });
});