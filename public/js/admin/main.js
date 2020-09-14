function rus_to_latin ( str ) {

    var ru = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 
        'е': 'e', 'ё': 'e', 'ж': 'j', 'з': 'z', 'и': 'i', 
        'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 
        'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 
        'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh', 
        'щ': 'shch', 'ы': 'y', 'э': 'e', 'ю': 'u', 'я': 'ya',
        ' ': "_",":":"",",":"","?":"","!":"",".":"",'"':""
    }, n_str = [];
    
    str = str.replace(/[ъь]+/g, '').replace(/й/g, 'i');
    
    for ( var i = 0; i < str.length; ++i ) {
       n_str.push(
              ru[ str[i] ]
           || ru[ str[i].toLowerCase() ] == undefined && str[i]
           || ru[ str[i].toLowerCase() ].replace(/^(.)/, function ( match ) { return match.toUpperCase() })
       );
    }
    
    return n_str.join('');
}


document.querySelectorAll(".transliterate").forEach(function(input){
    input.addEventListener("keyup", function(){
        var name = input.getAttribute("data-to");
        document.querySelector("[name="+name+"]").value = rus_to_latin(input.value.toLowerCase());
    });
});


var cropper, labelVal;
var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling;
	labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 ){
		    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		}
		else{
		    fileName = e.target.value.split( '\\' ).pop();
		}
		
		
		
		if(input.name == "avatar"){
		    var tmppath = URL.createObjectURL(this.files[0]);
    		var cropImage = document.querySelector("#cropImage");
    		var avatarForm = document.querySelector("#avatarForm");
    		cropImage.src = tmppath;
    		cropper = new Cropper(cropImage, {
              aspectRatio: 4 / 4,
              crop(event) {
                  avatarForm.querySelector("[name=x]").value = parseInt(event.detail.x);
                  avatarForm.querySelector("[name=y]").value = parseInt(event.detail.y);
                  avatarForm.querySelector("[name=width]").value = parseInt(event.detail.width);
                  avatarForm.querySelector("[name=height]").value = parseInt(event.detail.height);
              },
            });
    		window.openPopup("#cropImagePopup");
		}
		


		if( fileName )
			label.innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});



var cropClose = document.querySelector(".crop-close");

if(cropClose){
    cropClose.addEventListener("click", function(){
        inputs.forEach(function(input){
            input.value = "";
            input.nextElementSibling.innerHTML = labelVal;
        });
        cropper.destroy();
    });
}




var uploadAvatar = document.querySelector("#uploadAvatar");
if(uploadAvatar){
    document.querySelector("#uploadAvatar").addEventListener("click", function(e){
        e.preventDefault();
        var btn = this;
        btn.classList.add("btn-loading");
        var form = document.getElementById('avatarForm');
        var formData = new FormData(form);
        
        var xhr = new XMLHttpRequest();
        // Add any event handlers here...
        xhr.open('POST', '/profile/avatar', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                
                document.querySelector(".current-avatar img").src = xhr.responseText;
                document.querySelector(".mt-user img").src = xhr.responseText;
                document.querySelector(".crop-close").click();
                btn.classList.remove("btn-loading");
            }
            else {
                alert('Request failed.  Returned status of ' + xhr.status);
            }
        };
        xhr.send(formData);
    });
}
