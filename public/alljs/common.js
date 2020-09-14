(function (factory) {
    typeof define === 'function' && define.amd ? define('common', factory) :
    factory();
}((function () { 'use strict';

    //Hover text on experts card
    document.querySelectorAll(".tec-hover-icons a").forEach(function (a) {
      a.addEventListener("mouseenter", function () {
        var title = a.getAttribute("data-title");
        a.parentElement.previousElementSibling.innerHTML = title;
      });
      a.addEventListener("mouseleave", function () {
        a.parentElement.previousElementSibling.innerHTML = "";
      });
    });

    window.closePopupAll = function (stopVideo = true) {
      document.querySelectorAll(".total-popup,.videocall-popup").forEach(function (popup) {
        popup.classList.remove("active");

        if (popup.id == "videoPopup" && stopVideo) {
          popup.querySelector("video").setAttribute("src", "");
        }
      });
      document.body.classList.remove("modal-open");
    };

    window.openPopup = function (id, closePopup = true) {
      if (closePopup) window.closePopupAll(false);
      document.querySelector(id).classList.add("active");
      document.body.classList.add("modal-open");
    };

    document.querySelectorAll(".total-popup-close,[data-dismiss=modal]").forEach(function (el) {
      el.addEventListener("click", function () {
        window.closePopupAll();
      });
    });
    document.querySelectorAll("a.open-popup").forEach(function (a) {
      a.addEventListener("click", function (e) {
        e.preventDefault();
        openPopup(a.getAttribute("href"));
      });
    }); //Message to expert

    document.querySelectorAll(".tec-hover-icon-message").forEach(function (item) {
      item.addEventListener("click", function () {
        var id = this.getAttribute("data-id");
        document.querySelector("[name='expert_id']").value = id;
      });
    });
    document.querySelectorAll(".logged-in .add-to-favourite").forEach(function (el) {
      el.addEventListener("click", function (e) {
        e.preventDefault();
        var likePost = el.querySelector(".like-post");
        var userID = likePost.getAttribute("data-favourite-user-id");

        if (likePost.classList.contains("liked")) {
          el.setAttribute("data-tooltip", "Добавить в избранное");
        } else {
          el.setAttribute("data-tooltip", "Убрать из избранного");
        }

        likePost.classList.toggle("liked");
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "/profile/add-to-favourite?userid=" + userID + "&_token=" + document.querySelector("[name='_token']").value);

        xhr.onload = function () {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
          } else {
            console.log('Request failed.  Returned status of ' + xhr.status);
          }
        };

        xhr.send();
      });
    });
    document.querySelectorAll(".logged-in .remove-favourite").forEach(function (el) {
      el.addEventListener("click", function (e) {
        e.preventDefault(); // el.parentElement.parentElement.remove();

        var id = el.getAttribute("data-id");
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "/profile/remove-favourite?id=" + id + "&_token=" + document.querySelector("[name='_token']").value);

        xhr.onload = function () {
          if (xhr.status === 200) {
            window.location.reload();
            console.log(xhr.responseText);
          } else {
            console.log('Request failed.  Returned status of ' + xhr.status);
          }
        };

        xhr.send();
      });
    });
    document.addEventListener("click", function (e) {
      e.path.forEach(function (el) {
        if (el.classList && el.classList.contains('model-like')) {
          e.preventDefault();

          if (document.querySelector('[data-user-id]')) {
            let span = el.querySelector("span");
            let id = el.getAttribute("data-id");
            let model = el.getAttribute("data-model");

            if (!el.classList.contains('liked')) {
              if (span.innerHTML == "") {
                span.innerHTML = 1;
              } else {
                let likes = parseInt(span.innerHTML);
                likes++;
                span.innerHTML = likes;
              }

              el.classList.add("liked");

              if (model == "WallVideo") {
                document.querySelector(".play-video[data-id='" + id + "']").setAttribute("data-liked", "1");
              }
            } else {
              let likes = parseInt(span.innerHTML);
              likes--;

              if (likes == 0) {
                span.innerHTML = "";
              } else {
                span.innerHTML = likes;
              }

              el.classList.remove("liked");

              if (model == "WallVideo") {
                document.querySelector(".play-video[data-id='" + id + "']").removeAttribute("data-liked");
              }
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', "/_social/like?_token=" + document.querySelector("[name='_token']").value + "&model=" + model + "&id=" + id);

            xhr.onload = function () {
              if (xhr.status === 200) {
                console.log(xhr.responseText);
              }
            };

            xhr.send();
          } else {
            window.openPopup("#notLoggedInPopup", false);
          }
        }
      });
    });

})));
