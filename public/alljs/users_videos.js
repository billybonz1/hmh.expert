(function (factory) {
    typeof define === 'function' && define.amd ? define('usersVideos', factory) :
    factory();
}((function () { 'use strict';

    (function () {
      let uploadVideo = document.querySelector("#upload-video");
      let uploadVideoFile = uploadVideo.querySelector("input[type='file']");
      var duration;
      var dataURL;
      document.addEventListener("click", function (e) {
        e.path.forEach(function (el) {
          if (el.classList && el.classList.contains("upload-video")) {
            e.preventDefault();
            uploadVideoFile.click();
          } else if (el.classList && el.classList.contains("play-video")) {
            e.preventDefault();
            var img = el.previousElementSibling,
                style = img.currentStyle || window.getComputedStyle(img, false),
                bi = style.backgroundImage.slice(4, -1).replace(/"/g, "");
            var src = el.getAttribute("href");
            let video = document.querySelector("#videoPopup video");
            video.poster = bi;
            video.setAttribute("src", src);
            let videoList = document.querySelector("#videoList");
            let name = el.getAttribute("data-name");
            let desc = el.getAttribute("data-desc");
            let time = el.getAttribute("data-time");
            let namef = videoList.getAttribute("data-user-namef");
            let avatar = videoList.getAttribute("data-user-avatar");
            let userLink = videoList.getAttribute("data-user-link");
            let likes = el.getAttribute("data-likes");
            let id = el.getAttribute("data-id");
            let videoPopup = document.querySelector("#videoPopup");
            videoPopup.querySelector(".post__author img").setAttribute("src", avatar);
            videoPopup.querySelectorAll(".post__author a").forEach(function (a) {
              a.setAttribute("href", userLink);
            });
            videoPopup.querySelector("time").innerHTML = time;
            videoPopup.querySelector(".model-like span").innerHTML = likes;
            videoPopup.querySelector(".model-like").setAttribute("data-id", id);
            videoPopup.querySelector(".post__author-name").innerHTML = namef;
            videoPopup.querySelector(".hentry.post p").innerHTML = desc;
            videoPopup.querySelector(".model-like").classList.remove("liked");
            if (likes == "1") videoPopup.querySelector(".model-like").classList.add("liked");
            window.openPopup("#videoPopup");
            video.play();
          } else if (el.tagName == "CANVAS") {
            uploadVideo.querySelectorAll(".video-frames .ka-col").forEach(function (col) {
              col.classList.remove("active");
            });
            el.parentElement.classList.add("active");
            dataURL = el.toDataURL();
            uploadVideo.querySelector("[name=img]").value = dataURL;
          }
        });
      });

      function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Byte';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
      }

      uploadVideoFile.addEventListener("change", function (e) {
        uploadVideoFile.files.forEach(function (file, i) {
          let pastedVideo = document.querySelector(".photo-album-item-wrap.col-9-width");
          if (pastedVideo) pastedVideo.remove();
          uploadVideo.querySelector(".video-frames").innerHTML = "";

          if (file.size >= 250000000) {
            uploadVideoFile.value = "";
            uploadVideo.querySelector(".photo-album-wrapper").innerHTML += `
                	<div class="photo-album-item-wrap col-9-width">
                		<div class="photo-album-item">
                			<div class="form-group video-alert">
                				Видео слишком большое <br>
                				Максимально допустимый размер - 250 MB
                			</div>
                		</div>
                	</div>
                `;
          } else {
            var reader = new FileReader();

            reader.onload = function (e) {
              let video = document.createElement("video");
              video.addEventListener('loadedmetadata', function () {
                duration = video.duration;
                let minutes = parseInt(duration / 60) + "";
                if (minutes.length == 1) minutes = "0" + minutes;
                let seconds = parseInt(duration % 60) + "";
                if (seconds.length == 1) seconds = "0" + minutes;
                console.log(minutes, seconds);
                uploadVideo.querySelector(".photo-album-wrapper").innerHTML += `
                        	<div class="photo-album-item-wrap col-9-width">
                    			<div class="photo-album-item">
                    				<div class="form-group">
                    					<video src="${e.target.result}" autoplay muted controls></video>
                    					<div class="upload-video-text upload-video-duration">
                    					    Продолжительность - ${minutes}:${seconds}
                    					</div>
                    					<div class="upload-video-text upload-video-size">
                    					    Размер - ${bytesToSize(e.loaded)}
                    					</div>
                    				</div>
                    			</div>
                    		</div>
                        `;
                video = undefined;
              });
              video.src = e.target.result;
              VideoToFrames.getFrames(video.src, 11, VideoToFramesMethod.totalFrames).then(function (frames) {
                uploadVideo.querySelector(".video-frames").innerHTML = "<h3>Выберите главную картинку:</h3>";
                frames.forEach(function (frame, i) {
                  var canvas = document.createElement('canvas');
                  canvas.width = frame.width;
                  canvas.height = frame.height;
                  canvas.getContext('2d').putImageData(frame, 0, 0);
                  var col = document.createElement("div");
                  col.classList.add("ka-col");

                  if (i == 0) {
                    col.classList.add("active");
                    dataURL = canvas.toDataURL();
                    uploadVideo.querySelector("[name=img]").value = dataURL;
                  }

                  col.appendChild(canvas);
                  uploadVideo.querySelector(".video-frames").appendChild(col);
                });
              });
            };

            reader.readAsDataURL(file);
          }
        });
      });
      uploadVideo.addEventListener("submit", function (e) {
        e.preventDefault();

        if (uploadVideoFile.value == "") {
          let pastedVideo = document.querySelector(".photo-album-item-wrap.col-9-width");
          if (pastedVideo) pastedVideo.remove();
          uploadVideo.querySelector(".photo-album-wrapper").innerHTML += `
            	<div class="photo-album-item-wrap col-9-width">
            		<div class="photo-album-item">
            			<div class="form-group video-alert">
            				Добавьте пожалуйста <br> видео
            			</div>
            		</div>
            	</div>
            `;
        } else {
          var formData = new FormData(uploadVideo.querySelector("form"));
          var xhr = new XMLHttpRequest(); // Add any event handlers here...

          xhr.open('POST', uploadVideo.querySelector("form").action, true);

          xhr.onload = function () {
            if (xhr.status === 200 || xhr.status === 201) {
              uploadVideo.querySelector("form").reset();
              let pastedVideo = document.querySelector(".photo-album-item-wrap.col-9-width");
              if (pastedVideo) pastedVideo.remove();
              uploadVideo.querySelector(".close").click();
              let noVideoCol = document.querySelector(".no-video-col");
              if (noVideoCol) noVideoCol.remove();
              uploadVideo.querySelector(".video-frames").innerHTML = "";
              let wallvideo = JSON.parse(xhr.responseText);
              console.log(wallvideo);
              document.querySelector("#videoList").innerHTML = `
                        <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        			
                			<div class="ui-block video-item">
                				<div class="video-player">
                				    <div class="video-player-img" style="background-image: url(${dataURL})"></div>
                					<a href="/uploads/videos/{{ $user->nickname }}/{{ $wallvideo->file_name }}" class="play-video">
                						<svg class="olymp-play-icon"><use xlink:href="#olymp-play-icon"></use></svg>
                					</a>
                					<div class="overlay overlay-dark"></div>
                			
                					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></div>
                				</div>
                			
                				<div class="ui-block-content video-content">
                					<a href="#" class="h6 title">${wallvideo.name}</a>
                					<time class="published">${wallvideo.duration}</time>
                				</div>
                			</div>
                			
                		</div>
                    ` + document.querySelector("#videoList").innerHTML;
            } else {
              console.log(xhr.responseText);
            }
          };

          xhr.send(formData);
        }
      });
      document.querySelector(".cancel-upload-video").addEventListener("click", function (e) {
        e.preventDefault();
        uploadVideo.querySelector("form").reset();
        let pastedVideo = document.querySelector(".photo-album-item-wrap.col-9-width");
        if (pastedVideo) pastedVideo.remove();
        uploadVideo.querySelector(".video-frames").innerHTML = "";
        uploadVideo.querySelector(".close").click();
      });
    })();

})));
