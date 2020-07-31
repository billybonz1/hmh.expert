document.querySelectorAll(".tec-hover-icons a").forEach(function(a){
    a.addEventListener("mouseenter", function(){
        var title = a.getAttribute("data-title");
        a.parentElement.previousElementSibling.innerHTML = title;
    });

    a.addEventListener("mouseleave", function(){
        a.parentElement.previousElementSibling.innerHTML = "";
    });
});


function closePopup(){
    document.querySelectorAll(".total-popup,.videocall-popup").forEach(function(popup){
        popup.classList.remove("active");
    });
}

function openPopup(id){
    closePopup();
    document.querySelector(id).classList.add("active");
}




document.querySelectorAll(".total-popup-close,[data-dismiss=modal]").forEach(function(el){
    el.addEventListener("click", function(){
        closePopup();
    });
});


document.querySelectorAll("a.open-popup").forEach(function(a){
    a.addEventListener("click", function(e){
        e.preventDefault();
        openPopup(a.getAttribute("href"));
    });
});


document.querySelectorAll(".tec-hover-icon-message").forEach(function(item){
    item.addEventListener("click", function(){
        var id = this.getAttribute("data-id");
        document.querySelector("[name='expert_id']").value = id;
    });
});
