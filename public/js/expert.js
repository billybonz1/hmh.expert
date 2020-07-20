var stars = document.querySelectorAll(".popup-rating-star");

stars.forEach(function(star){
    star.addEventListener("click", function(e){
        e.preventDefault();
        var yes = 0;
        stars.forEach(function(star1){
            star1.classList.remove("current");
            if(star == star1 || yes == 0){
                star1.classList.add("active");
                if(star == star1){
                    yes = 1;
                    star1.classList.add("current");
                    document.querySelector("#sendReview [name='rating']").value = star1.getAttribute("data-number"); 
                } 
            }else{
                star1.classList.remove("active");
            }
        });
    });
});


var reviewForm = document.querySelector("#sendReview .main-form");
if(reviewForm){
    reviewForm.addEventListener("submit", function(e){
        e.preventDefault();
        var error = reviewForm.querySelector(".invalid-feedback");
        if(error){
            error.remove();
        }
        var text = reviewForm.querySelector("[name='text']");
        text.classList.remove("is-invalid");
        
        var formData = new FormData(reviewForm);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', reviewForm.action);
        xhr.onload = function() {
            if (xhr.status === 200) {
                if(xhr.responseText == "0"){
                    text.classList.add("is-invalid");
                    error = document.createElement("span");
                    error.classList.add("invalid-feedback");
                    error.setAttribute("role", "alert");
                    error.innerHTML = '<strong>Это поле обязательно для заполнения.</strong>';
                    text.after(error);
                }else{
                    openPopup("#sendReviewSuccess");
                }
            }
            else {
                console.log('Request failed.  Returned status of ' + xhr.status);
            }
        };
        xhr.send(formData);
    });
}

var moreServices = document.querySelector(".show-more-services");
if(moreServices){
    moreServices.addEventListener("click", function(e){
        e.preventDefault();
        var services = moreServices.getAttribute("data-services");
        var servicesCount = moreServices.getAttribute("data-services-count");
        var user_id = moreServices.getAttribute("data-user-id");
        var xhr = new XMLHttpRequest();
        xhr.open('GET', "/get-services?services="+services+"&servicesCount="+servicesCount+"&expert_id="+user_id);
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            }
            else {
                console.log('Request failed.  Returned status of ' + xhr.status);
            }
        };
        xhr.send();
        console.log(services, servicesCount);
    });
}