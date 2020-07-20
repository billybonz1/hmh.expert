var socket1 = io.connect('https://still-escarpment-05954.herokuapp.com/', {
    'sync disconnect on unload': true
});

var currentUser = document.querySelector("[data-user-id]");
var userOnlineData = {};
var broadcastUsers = document.querySelector(".broadcast-users-online");
var broadcastSimpleBar;

if(currentUser){
    userOnlineData = {
        id: currentUser.getAttribute("data-user-id"),
        url: window.location.href,
        userprettyname: currentUser.getAttribute("data-userprettyname"),
        avatar: currentUser.getAttribute("data-avatar"),
        messageURL: "/profile/messages/user" + currentUser.getAttribute("data-user-id")
    }
} else {
    userOnlineData = {
        url: window.location.href,
        userprettyname: "Неизвестный пользователь",
        avatar: "/public/img/male.jpg",
        messageURL: "#"
    }
}
socket1.emit('userOnline', userOnlineData);


socket1.on("userOnline", function (data) {
    var expertOnline = document.querySelector(".top-expert-" + data.id);
    if(expertOnline){
        expertOnline.querySelectorAll(".top-expert-live,.user-status").forEach(function(el){
            el.classList.remove("active");
        });
        expertOnline.querySelector(".now-online").classList.add("active");
    }
    
    if(broadcastUsers){
        if(data.url.indexOf("/experts/" + currentUser.getAttribute("data-user-id")) > -1 && data.id != currentUser.getAttribute("data-user-id") && !broadcastUsers.querySelector("[data-id='"+data.id+"']")){
            var broadcastUser = "<a data-id='"+data.id+"' href='"+data.messageURL+"' target='_blank'>";
            broadcastUser += '<img src="'+data.avatar+'" alt=""><span>'+data.userprettyname+'</span>';
            broadcastUser += "</a>";
            broadcastUsers.querySelector("h3 span").innerHTML = parseInt(broadcastUsers.querySelector("h3 span").innerHTML) + 1;
            if(broadcastSimpleBar){
                broadcastSimpleBar.getContentElement().innerHTML += broadcastUser;
            }
        }
    }
    
});

socket1.on("userDisconnected", function (userID) {

    var expertOnline = document.querySelector(".top-expert-" + userID);
    if(expertOnline){
        expertOnline.querySelectorAll(".top-expert-live,.user-status").forEach(function(el){
            el.classList.remove("active");
        });
        if(document.querySelector(".user-status.st-grey")){
            document.querySelector(".user-status.st-grey").classList.add("active");
        }
    }
    
    if(broadcastUsers){
        var userToRemove = document.querySelector("a[data-id='"+userID+"']");
        if(userToRemove){
            userToRemove.remove();
            broadcastUsers.querySelector("h3 span").innerHTML = parseInt(broadcastUsers.querySelector("h3 span").innerHTML) - 1;
        }
    }
    
});

socket1.on("usersOnline", function (users) {
    console.log(users);
    users.forEach(function(user, i){
        if(user !== null && user.length > 0){
            var expertOnline = document.querySelector(".top-expert-" + user[0].id);
            if(expertOnline){
                expertOnline.querySelectorAll(".top-expert-live,.user-status").forEach(function(el){
                    el.classList.remove("active");
                });
                expertOnline.querySelector(".now-online").classList.add("active");
            }
        }
    });
    
    
    if(broadcastUsers){
        var usersCount = 0;
        users.forEach(function(pages, i){
            if(pages !== null){
                pages.forEach(function(user){
                    if(user.url.indexOf("/experts/" + currentUser.getAttribute("data-user-id")) > -1 && user.id != currentUser.getAttribute("data-user-id") && !broadcastUsers.querySelector("[data-id='"+user.id+"']")){
                        usersCount++;
                        var broadcastUser = "<a data-id='"+user.id+"' href='"+user.messageURL+"' target='_blank'>";
                        broadcastUser += '<img src="'+user.avatar+'" alt=""><span>'+user.userprettyname+'</span>';
                        broadcastUser += "</a>";
                        broadcastUsers.querySelector("div").innerHTML += broadcastUser;
                    }
                });
            }
        });
        broadcastSimpleBar = new SimpleBar(broadcastUsers.querySelector("div"));
        broadcastUsers.querySelector("h3 span").innerHTML = usersCount;
    }
});




