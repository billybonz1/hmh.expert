"use strict";

var wallPostAddPhoto = document.querySelector(".wall-post-add-photo");

if (wallPostAddPhoto) {
  wallPostAddPhoto.addEventListener("click", function (e) {
    e.preventDefault();
    this.previousElementSibling.click();
  });
}

document.addEventListener("click", function (e) {
  e.path.forEach(function (el) {
    if (el.classList && el.classList.contains('like-wall-post')) {
      e.preventDefault();

      if (!el.classList.contains('liked') && document.querySelector('[data-user-id]')) {
        var span = el.querySelector("span");

        if (span.innerHTML == "") {
          span.innerHTML = 1;
        } else {
          var likes = parseInt(span.innerHTML);
          likes++;
          span.innerHTML = likes;
        }

        el.classList.add("liked");
        var xhr = new XMLHttpRequest();
        xhr.open('POST', el.getAttribute("href") + "?_token=" + document.querySelector("[name='_token']").value);

        xhr.onload = function () {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
          }
        };

        xhr.send();
      }
    }
  });
});
document.addEventListener("submit", function (e) {
  e.path.forEach(function (el) {
    if (el.id && el.getAttribute("id") == "newsfeed-items-grid-form") {
      e.preventDefault();
      var formData = new FormData(el);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', el.getAttribute("action"));

      xhr.onload = function () {
        if (xhr.status === 200) {
          var data = JSON.parse(xhr.responseText);
          console.log(data);
          document.querySelector("#newsfeed-items-grid").innerHTML += "\n                    \t<div class=\"ui-block\">\n    \t\t\t\n    \t\t\t\t\t\t<article class=\"hentry post\">\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t<div class=\"post__author author vcard inline-items\">\n    \t\t\t\t\t\t\t\t\t<img src=\"" + document.querySelector(".author-thumb img").getAttribute("src") + "\" alt=\"author\">\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t\t<div class=\"author-date\">\n    \t\t\t\t\t\t\t\t\t\t<a class=\"h6 post__author-name fn\" href=\"" + document.querySelector(".author-name").getAttribute("href") + "\">" + document.querySelector(".author-name").innerHTML + "</a>\n    \t\t\t\t\t\t\t\t\t\t<div class=\"post__date\">\n    \t\t\t\t\t\t\t\t\t\t\t<time class=\"published\" datetime=\"2020-03-24T18:18\">\n    \t\t\t\t\t\t\t\t\t\t\t\t\u0422\u043E\u043B\u044C\u043A\u043E \u0447\u0442\u043E\n    \t\t\t\t\t\t\t\t\t\t\t</time>\n    \t\t\t\t\t\t\t\t\t\t</div>\n    \t\t\t\t\t\t\t\t\t</div>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t\t<div class=\"more\">\n    \t\t\t\t\t\t\t\t\t\t<svg class=\"olymp-three-dots-icon\">\n    \t\t\t\t\t\t\t\t\t\t\t<use xlink:href=\"#olymp-three-dots-icon\"></use>\n    \t\t\t\t\t\t\t\t\t\t</svg>\n    \t\t\t\t\t\t\t\t\t\t<ul class=\"more-dropdown\">\n    \t\t\t\t\t\t\t\t\t\t\t<li>\n    \t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">\u0420\u0435\u0434\u0430\u043A\u0442\u0438\u0440\u043E\u0432\u0430\u0442\u044C \u0441\u043E\u043E\u0431\u0449\u0435\u043D\u0438\u0435</a>\n    \t\t\t\t\t\t\t\t\t\t\t</li>\n    \t\t\t\t\t\t\t\t\t\t\t<li>\n    \t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">\u0423\u0434\u0430\u043B\u0438\u0442\u044C \u0441\u043E\u043E\u0431\u0449\u0435\u043D\u0438\u0435</a>\n    \t\t\t\t\t\t\t\t\t\t\t</li>\n    \t\t\t\t\t\t\t\t\t\t</ul>\n    \t\t\t\t\t\t\t\t\t</div>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t</div>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t<p>" + data.text + "</p>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t<div class=\"post-additional-info inline-items\">\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"post-add-icon inline-items like-wall-post\">\n    \t\t\t\t\t\t\t\t\t\t<svg class=\"olymp-heart-icon\">\n    \t\t\t\t\t\t\t\t\t\t\t<use xlink:href=\"#olymp-heart-icon\"></use>\n    \t\t\t\t\t\t\t\t\t\t</svg>\n    \t\t\t\t\t\t\t\t\t\t<span>0</span>\n    \t\t\t\t\t\t\t\t\t</a>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t\t<ul class=\"friends-harmonic\">\n    \t\t\t\t\t\t\t\t\t\t<li>\n    \t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">\n    \t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/img/wall/img/friend-harmonic7.jpg\" alt=\"friend\">\n    \t\t\t\t\t\t\t\t\t\t\t</a>\n    \t\t\t\t\t\t\t\t\t\t</li>\n    \t\t\t\t\t\t\t\t\t\t<li>\n    \t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">\n    \t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/img/wall/img/friend-harmonic8.jpg\" alt=\"friend\">\n    \t\t\t\t\t\t\t\t\t\t\t</a>\n    \t\t\t\t\t\t\t\t\t\t</li>\n    \t\t\t\t\t\t\t\t\t\t<li>\n    \t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">\n    \t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/img/wall/img/friend-harmonic9.jpg\" alt=\"friend\">\n    \t\t\t\t\t\t\t\t\t\t\t</a>\n    \t\t\t\t\t\t\t\t\t\t</li>\n    \t\t\t\t\t\t\t\t\t\t<li>\n    \t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">\n    \t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/img/wall/img/friend-harmonic10.jpg\" alt=\"friend\">\n    \t\t\t\t\t\t\t\t\t\t\t</a>\n    \t\t\t\t\t\t\t\t\t\t</li>\n    \t\t\t\t\t\t\t\t\t\t<li>\n    \t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">\n    \t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/img/wall/img/friend-harmonic11.jpg\" alt=\"friend\">\n    \t\t\t\t\t\t\t\t\t\t\t</a>\n    \t\t\t\t\t\t\t\t\t\t</li>\n    \t\t\t\t\t\t\t\t\t</ul>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t\t<div class=\"names-people-likes\">\n    \t\t\t\t\t\t\t\t\t\t<a href=\"#\">\u0418\u0440\u0438\u043D\u0430</a>, <a href=\"#\">\u0420\u043E\u0431\u0435\u0440\u0442</a> \u0442\u0430\u043A\u0436\u0435\n    \t\t\t\t\t\t\t\t\t\t<br>6 \u0438 \u0431\u043E\u043B\u0435\u0435, \u043F\u043E\u043D\u0440\u0430\u0432\u0438\u043B\u043E\u0441\u044C \u044D\u0442\u043E\n    \t\t\t\t\t\t\t\t\t</div>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t\t<div class=\"comments-shared\">\n    \t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"post-add-icon inline-items\">\n    \t\t\t\t\t\t\t\t\t\t\t<svg class=\"olymp-speech-balloon-icon\">\n    \t\t\t\t\t\t\t\t\t\t\t\t<use xlink:href=\"#olymp-speech-balloon-icon\"></use>\n    \t\t\t\t\t\t\t\t\t\t\t</svg>\n    \t\t\t\t\t\t\t\t\t\t\t<span>0</span>\n    \t\t\t\t\t\t\t\t\t\t</a>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"post-add-icon inline-items\">\n    \t\t\t\t\t\t\t\t\t\t\t<svg class=\"olymp-share-icon\">\n    \t\t\t\t\t\t\t\t\t\t\t\t<use xlink:href=\"#olymp-share-icon\"></use>\n    \t\t\t\t\t\t\t\t\t\t\t</svg>\n    \t\t\t\t\t\t\t\t\t\t\t<span>0</span>\n    \t\t\t\t\t\t\t\t\t\t</a>\n    \t\t\t\t\t\t\t\t\t</div>\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\n    \t\t\t\t\t\t\t\t</div>\n    \t\t\t\t\t\t\n    \t\t\t\n    \t\t\t\t\t\t\t</article>\n    \t\t\t\t\t\t\n    \t\t\t\t\t</div>\n                    ";
          var noWallPosts = document.querySelector(".no-wall-posts");

          if (noWallPosts) {
            noWallPosts.remove();
          }
        } else {
          console.log('Request failed.  Returned status of ' + xhr.status);
        }
      };

      xhr.send(formData);
    }
  });
});