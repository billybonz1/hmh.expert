var uploadPhotos = document.querySelector("#uploadPhotos");
var uploadPhotosFile = uploadPhotos.querySelector("input[type='file']");

uploadPhotosFile.addEventListener("change", function(e){
    uploadPhotosFile.files.forEach(function(file, i){
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector("#create-photo-album .photo-album-wrapper").innerHTML += `
            	<div class="photo-album-item-wrap col-3-width" >
        			<div class="photo-album-item">
        				<div class="form-group">
        					<img loading="lazy" src="${e.target.result}" alt="photo">
        					<textarea class="form-control" name="desc[]" placeholder="Напишите что-нибудь об этом фото..."></textarea>
        					<input type="hidden" name="index[]" value="${i}" />
        					<a href="#" data-index="${i}" class="close icon-close remove-album-photo">
                				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
                			</a>
        				</div>
        			</div>
        		</div>
            `;
        }
        reader.readAsDataURL(file);
    });
});



document.addEventListener("click", function(e){
	e.path.forEach(function(el){
	    if(el.classList && el.classList.contains("photo-album-add-photos")){
	        e.preventDefault();
		    uploadPhotosFile.click();
	    } else if(el.classList && el.classList.contains("remove-album-photo")){
	        e.preventDefault();
	        
	        el.parentElement.parentElement.parentElement.remove();
	        let i = el.getAttribute("data-index");
	        let files = Array.from(uploadPhotosFile.files);
	        files.splice(i, 1);
	       
	    }
	});
});

document.querySelector(".cancel-upload-album").addEventListener("click", function(e){
    e.preventDefault();
    uploadPhotos.reset();
    document.querySelector(".create-photo-album .close").click();
    document.querySelectorAll("#create-photo-album .photo-album-item-wrap:not(a)").forEach(function(el){
        el.remove();
    });
});


uploadPhotos.addEventListener("submit", function(e){
    e.preventDefault();
    var formData = new FormData(uploadPhotos);
    
    var xhr = new XMLHttpRequest();
    // Add any event handlers here...
    xhr.open('POST', uploadPhotos.action, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            uploadPhotos.reset();
            document.querySelector(".create-photo-album .close").click();
            document.querySelectorAll("#create-photo-album .photo-album-item-wrap:not(a)").forEach(function(el){
                el.remove();
            });
            
            window.location.reload();
        }
        else {
            alert('Request failed.  Returned status of ' + xhr.status);
        }
    };
    xhr.send(formData);
});