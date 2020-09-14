(function (factory) {
    typeof define === 'function' && define.amd ? define('expert', factory) :
    factory();
}((function () { 'use strict';

    var stars = document.querySelectorAll(".popup-rating-star");
    stars.forEach(function (star) {
      star.addEventListener("click", function (e) {
        e.preventDefault();
        var yes = 0;
        stars.forEach(function (star1) {
          star1.classList.remove("current");

          if (star == star1 || yes == 0) {
            star1.classList.add("active");

            if (star == star1) {
              yes = 1;
              star1.classList.add("current");
              document.querySelector("#sendReview [name='rating']").value = star1.getAttribute("data-number");
            }
          } else {
            star1.classList.remove("active");
          }
        });
      });
    });
    var reviewForm = document.querySelector("#sendReview .main-form");

    if (reviewForm) {
      reviewForm.addEventListener("submit", function (e) {
        e.preventDefault();
        var error = reviewForm.querySelector(".invalid-feedback");

        if (error) {
          error.remove();
        }

        var text = reviewForm.querySelector("[name='text']");
        text.classList.remove("is-invalid");
        var formData = new FormData(reviewForm);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', reviewForm.action);

        xhr.onload = function () {
          if (xhr.status === 200) {
            if (xhr.responseText == "0") {
              text.classList.add("is-invalid");
              error = document.createElement("span");
              error.classList.add("invalid-feedback");
              error.setAttribute("role", "alert");
              error.innerHTML = '<strong>Это поле обязательно для заполнения.</strong>';
              text.after(error);
            } else {
              window.openPopup("#sendReviewSuccess");
            }
          } else {
            console.log('Request failed.  Returned status of ' + xhr.status);
          }
        };

        xhr.send(formData);
      });
    }

    var moreServices = document.querySelector(".show-more-services");
    var countServices = document.querySelectorAll(".expert-detail-services-cont .blogs-post").length;

    if (moreServices) {
      moreServices.setAttribute("data-services-now", countServices);
      moreServices.addEventListener("click", function (e) {
        e.preventDefault();
        countServices = parseInt(moreServices.getAttribute("data-services-now"));
        var servicesAll = moreServices.getAttribute("data-services-all");
        var expert_id = moreServices.getAttribute("data-expert-id");
        var xhr = new XMLHttpRequest();
        xhr.open('GET', "/get-services?servicesCount=" + countServices + "&servicesAll=" + servicesAll + "&expert_id=" + expert_id);

        xhr.onload = function () {
          if (xhr.status === 200) {
            var services = JSON.parse(xhr.responseText);
            countServices += services.length;
            moreServices.setAttribute("data-services-now", countServices);
            var html = "";
            services.forEach(function (service) {
              console.log(service);
              html += '<div class="blogs-post"> <div> <a href="' + service.url + '"> <div class="blogs-post-img" style="background-image: url(/uploads/images/' + service.thumb + ')"></div></a> <div class="blogs-post-content"> <h4><a href="' + service.url + '">' + service.name + '</a></h4> <p>' + service.shortdesc + '</p><div class="blog-post-price-wrap"> <p class="blogs-post-price"> Цена: <strong>' + service.prettyprice + '</strong> </p><div class="blogs-post-bottom"> <a href="' + service.url + '" class="btn">Подробнее</a> </div></div></div></div></div>';
            });
            document.querySelector(".expert-detail-services-cont .blogs-posts").innerHTML += html;

            if (countServices == servicesAll) {
              moreServices.remove();
            }
          } else {
            console.log('Request failed.  Returned status of ' + xhr.status);
          }
        };

        xhr.send();
      });
    }

    var moreReviews = document.querySelector(".show-more-reviews");
    var countReviews = document.querySelectorAll(".expert-detail-review").length;

    if (moreReviews) {
      moreReviews.setAttribute("data-reviews-now", countReviews);
      moreReviews.addEventListener("click", function (e) {
        e.preventDefault();
        countReviews = parseInt(moreReviews.getAttribute("data-reviews-now"));
        var reviewsAll = moreReviews.getAttribute("data-reviews-all");
        var expert_id = moreReviews.getAttribute("data-expert-id");
        var xhr = new XMLHttpRequest();
        xhr.open('GET', "/get-reviews?reviewsCount=" + countReviews + "&reviewsAll=" + reviewsAll + "&expert_id=" + expert_id);

        xhr.onload = function () {
          if (xhr.status === 200) {
            var reviews = JSON.parse(xhr.responseText);
            countReviews += reviews.length;
            moreReviews.setAttribute("data-reviews-now", countReviews);
            var html = "";
            reviews.forEach(function (review) {
              var date = new Date(review.created_at);
              var messageMonth = date.getMonth() + 1 + "";
              messageMonth = messageMonth.length == 1 ? "0" + messageMonth : messageMonth;
              var messageDay = date.getDate() + "";
              messageDay = messageDay.length == 1 ? "0" + messageDay : messageDay;
              var stringDate = messageDay + "." + messageMonth + "." + (date.getFullYear() + "").slice(2);
              html += '<div class="expert-detail-review"><h4><div><span>' + review.username + '</span><div class="tec-rating-block"><div class="tec-rating"><div style="width: ' + review.ratingProcent + '"></div></div><span>' + review.rating + '</span></div></div><div class="expert-detail-review-date">' + stringDate + '</div></h4><p>' + review.text + '</p></div>';
            });
            document.querySelector(".expert-detail-reviews-inner").innerHTML += html;

            if (countReviews == reviewsAll) {
              moreReviews.remove();
            }
          } else {
            console.log('Request failed.  Returned status of ' + xhr.status);
          }
        };

        xhr.send();
      });
    }

})));
