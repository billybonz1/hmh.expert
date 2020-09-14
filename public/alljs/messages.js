(function (factory) {
    typeof define === 'function' && define.amd ? define('messages', factory) :
    factory();
}((function () { 'use strict';

    function messageDateGet(created_at) {
      var messageDate = new Date(created_at);
      var messageMonth = messageDate.getMonth() + 1 + "";
      messageMonth = messageMonth.length == 1 ? "0" + messageMonth : messageMonth;
      var messageDay = messageDate.getDate() + "";
      messageDay = messageDay.length == 1 ? "0" + messageDay : messageDay;
      var messageHours = messageDate.getHours() + "";
      messageHours = messageHours.length == 1 ? "0" + messageHours : messageHours;
      var messageMinutes = messageDate.getMinutes() + "";
      messageMinutes = messageMinutes.length == 1 ? "0" + messageMinutes : messageMinutes;
      messageDate = messageDay + "." + messageMonth + "." + messageDate.getFullYear() + " " + messageHours + ":" + messageMinutes;
      return messageDate;
    }

    function appendMessage(message, messagesBlock, userID) {
      var messageClass = "from";
      var messageName = message.name + ":";

      if (message.to_id == userID) {
        messageClass = "to";
        messageName = "Вы:";
      }

      if (message.readed == 1) {
        messageClass += " readed";
      }

      var messageDate = messageDateGet(message.created_at);
      var messageHTML = '<div data-id="' + message.id + '" class="profile-message ' + messageClass + '">';
      messageHTML += '<p>' + messageName + '</p>';
      messageHTML += '<div>';
      messageHTML += message.message;
      messageHTML += '<div class="profile-message-date">';
      messageHTML += messageDate;
      messageHTML += '</div>';
      messageHTML += '</div>';
      messageHTML += '</div>';
      messageHTML += '</div>';
      messagesBlock.innerHTML += messageHTML;
    }

    function appendGroupMessage(message, messagesBlock) {
      var messageDate = messageDateGet(message.created_at);
      var messageHTML = '<div class="tcp-chat-message"><div class="tcp-chat-message-top"><a href="' + message.sender.url + '"><img src="' + message.sender.avatar + '" alt=""><span>' + message.sender.namef + '</span></a><div class="tcp-chat-message-date">' + messageDateGet(message.created_at) + '</div></div><p>' + message.message + '</p></div>';
      messagesBlock.innerHTML += messageHTML;
    }

    function prependMessage(message, messagesBlock, userID) {
      var messageClass = "from";
      var messageName = message.name + ":";

      if (message.to_id == userID) {
        messageClass = "to";
        messageName = "Вы:";
      }

      if (message.readed == 1) {
        messageClass += " readed";
      }

      var messageDate = messageDateGet(message.created_at);
      var messageHTML = '<div data-id="' + message.id + '" class="profile-message ' + messageClass + '">';
      messageHTML += '<p>' + messageName + '</p>';
      messageHTML += '<div>';
      messageHTML += message.message;
      messageHTML += '<div class="profile-message-date">';
      messageHTML += messageDate;
      messageHTML += '</div>';
      messageHTML += '</div>';
      messageHTML += '</div>';
      messageHTML += '</div>';
      messagesBlock.innerHTML = messageHTML + messagesBlock.innerHTML;
    }

    function activeMessageAreaToBottom(selector) {
      if (document.querySelector(selector).SimpleBar) {
        document.querySelector(selector).SimpleBar.getScrollElement().scrollTop = 10000;
      }
    }

    function readMessages(token, userID) {
      var myID = document.querySelector("[data-user-id]").getAttribute("data-user-id");
      var messagesReadedIDs = [];
      var readedMessages = document.querySelectorAll(".profile-message.from:not(.readed)");
      readedMessages.forEach(function (message) {
        messagesReadedIDs.push(message.getAttribute("data-id"));
      });

      if (messagesReadedIDs.length > 0) {
        var xhr1 = new XMLHttpRequest();
        xhr1.open('POST', '/profile/messages/read?messagesReadedIDs=' + messagesReadedIDs.join(",") + '&_token=' + token);

        xhr1.onload = function () {
          if (xhr1.status === 200) {
            if (xhr1.responseText == 1) {
              var messageCount = 0;
              var messageCountBlock = document.querySelector(".profile-messages-user.active .profile-messages-user-count");

              if (messageCountBlock) {
                messageCount = parseInt(document.querySelector(".profile-messages-user.active .profile-messages-user-count").innerHTML);
              }

              readedMessages.forEach(function (message) {
                message.classList.add("readed");
                messageCount--;
              });

              if (messageCount == 0) {
                if (messageCountBlock) {
                  messageCountBlock.remove();
                }
              } else {
                if (messageCountBlock) {
                  messageCountBlock.innerHTML = messageCount;
                }
              }

              var data = {
                messageReadedIDs: messagesReadedIDs,
                userID: userID
              };
              var unreadChats = document.querySelectorAll(".profile-messages-user-count").length;
              var unreadChatsBlock = document.querySelector(".mtui-message div");

              if (unreadChats == 0) {
                if (unreadChatsBlock) {
                  unreadChatsBlock.remove();
                }
              } else {
                if (unreadChatsBlock) {
                  unreadChatsBlock.innerHTML = unreadChats;
                } else {
                  document.querySelector(".mtui-message").innerHTML = "<div>" + unreadChats + "</div>";
                }
              }

              socket1.emit("readMessages", data);
            }
          }
        };

        xhr1.send();
      }
    }

    function scrollChat(simpleBar, chatID, token, userID, name) {
      simpleBar.getScrollElement().addEventListener('scroll', function () {
        if (this.scrollTop <= 200 && !this.classList.contains("loading") && simpleBar.el.getAttribute("data-count") != simpleBar.el.getAttribute("data-loaded")) {
          console.log("loading messages");
          var chat = this;
          chat.classList.add("loading");
          var offset = 15;

          if (chat.getAttribute("data-offset")) {
            offset += parseInt(chat.getAttribute("data-offset"));
          }

          chat.setAttribute("data-offset", offset);
          var oldContainerHeight = simpleBar.getContentElement().clientHeight;
          var xhr = new XMLHttpRequest();
          xhr.open('POST', '/profile/messages?chatid=' + chatID + '&_token=' + token + '&offset=' + offset);

          xhr.onload = function () {
            if (xhr.status === 200) {
              var messages = JSON.parse(xhr.responseText);
              var messagesCount = parseInt(simpleBar.el.getAttribute("data-loaded")) + messages.length;
              simpleBar.el.setAttribute("data-loaded", messagesCount);
              messages.forEach(function (message) {
                message.name = name;
                prependMessage(message, simpleBar.getContentElement(), userID);
              });
              simpleBar.getScrollElement().scrollTop = simpleBar.getContentElement().clientHeight - oldContainerHeight + simpleBar.getScrollElement().scrollTop;
              chat.classList.remove("loading");
              readMessages(token, userID);
            }
          };

          xhr.send();
        }
      });
    }

    function userOnClick(user) {
      document.querySelectorAll(".profile-messages-user").forEach(function (user) {
        user.classList.remove("active");
      });
      user.classList.add("active");
      var userID = user.getAttribute("data-user");
      window.history.pushState({
        "html": "messages",
        "pageTitle": "Сообщения"
      }, "", "/profile/messages/user" + userID);
      var chatID = user.getAttribute("data-chatid");
      var name = user.getAttribute("data-name");
      document.querySelector("[name='chat_id']").value = chatID;
      document.querySelector("[name='to_id']").value = userID;
      var token = document.querySelector("#getMessagesForm [name='_token']").value;
      var messagesBlock = document.querySelector("#messages" + userID);

      if (messagesBlock.querySelector(".simplebar-content")) {
        messagesBlock = messagesBlock.querySelector(".simplebar-content");
      }

      var userMessages = document.querySelector("#messages" + userID);

      if (userMessages.classList.contains("loaded")) {
        document.querySelectorAll(".profile-messages").forEach(function (messages) {
          messages.classList.remove("active");
        });
        userMessages.classList.add("active");
        activeMessageAreaToBottom(".profile-messages.active");
        readMessages(token, userID);
      } else {
        document.querySelectorAll(".profile-messages").forEach(function (messages) {
          messages.classList.remove("active");
        });
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/profile/messages?chatid=' + chatID + '&_token=' + token);

        xhr.onload = function () {
          if (xhr.status === 200) {
            var messages = JSON.parse(xhr.responseText);
            messages.forEach(function (message) {
              message.name = name;
              appendMessage(message, messagesBlock, userID);
            });
            userMessages.classList.add("active");
            userMessages.classList.add("loaded");
            var simpleBar = new SimpleBar(document.querySelector(".profile-messages.active"));
            simpleBar.el.setAttribute("data-loaded", messages.length);
            scrollChat(simpleBar, chatID, token, userID, name);
            activeMessageAreaToBottom(".profile-messages.active");
            document.querySelector(".profile-message-send").style = "display: block;";
            readMessages(token, userID);
          } else {
            console.log('Request failed.  Returned status of ' + xhr.status);
          }
        };

        xhr.send();
      }
    }

    document.addEventListener("click", function (e) {
      var path = e.path || e.composedPath && e.composedPath();
      path.forEach(function (el, i) {
        if (el.classList && el.classList.contains("profile-messages-user")) {
          e.preventDefault();
          userOnClick(el);
        }
      });
    });

    if (window.location.href.indexOf("messages/user") > -1) {
      var userID = window.location.pathname.match(/(\d+)/)[0];
      var userBlock = document.querySelector(".profile-messages-user[data-user='" + userID + "']");

      if (userBlock) {
        userOnClick(userBlock);
      }
    } //Отправка сообщения


    var messageSendForm = document.querySelector("#messageSendForm");

    if (messageSendForm) {
      messageSendForm.addEventListener("submit", function (e) {
        e.preventDefault();

        if (messageSendForm.querySelector('[name="message"]').value != "") {
          var formData = new FormData(messageSendForm);
          var xhr = new XMLHttpRequest();
          xhr.open('POST', '/profile/messages');

          xhr.onload = function () {
            if (xhr.status === 200) {
              var message = JSON.parse(xhr.responseText);
              message.name = document.querySelector("[data-userprettyname]").getAttribute("data-userprettyname");
              var userID = document.querySelector("[name='to_id']").value;
              var messagesBlock = document.querySelector("#messages" + userID);

              if (messagesBlock.querySelector(".simplebar-content")) {
                messagesBlock = messagesBlock.querySelector(".simplebar-content");
              }

              appendMessage(message, messagesBlock, userID);
              activeMessageAreaToBottom(".profile-messages.active");
              messageSendForm.querySelector('[name="message"]').value = "";
              socket1.emit("message", message);
            } else {
              console.log('Request failed.  Returned status of ' + xhr.status);
            }
          };

          xhr.send(formData);
        }
      });
    } // User Typing


    if (messageSendForm) {
      messageSendForm.querySelector('[name="message"]').addEventListener("keyup", function () {
        var data = {
          chat_id: messageSendForm.querySelector("[name='chat_id']").value,
          to_id: messageSendForm.querySelector("[name='to_id']").value,
          from_id: messageSendForm.querySelector("[name='from_id']").value,
          typer: document.querySelector("[data-userprettyname]").getAttribute("data-userprettyname")
        };
        socket1.emit("userTyping", data);
      });
    }

    var typingTimeout;
    socket1.on("userTyping", function (data) {
      if (document.querySelector("#messages" + data.from_id) && document.querySelector("#messages" + data.from_id).classList.contains("active")) {
        document.querySelector(".user-typing span").innerHTML = data.typer;
        document.querySelector(".user-typing").classList.add("active");
        clearTimeout(typingTimeout);
        typingTimeout = setTimeout(function () {
          document.querySelector(".user-typing").classList.remove("active");
        }, 1000);
      }
    });
    var audio = document.createElement("AUDIO");
    audio.style = "margin-left: 100px;position: absolute;z-index: -1;top: 0;";
    audio.controls = true;
    document.body.appendChild(audio);
    audio.src = "/public/uploads/message.mp3";
    var messageTimeout;
    socket1.on("message", function (message) {
      console.log(message);

      if (message.to_id == 0) {
        console.log(message);
        var messagesBlock = document.querySelector(".group-chat-" + message.chat_id);

        if (messagesBlock) {
          if (messagesBlock.querySelector(".simplebar-content")) {
            messagesBlock = messagesBlock.querySelector(".simplebar-content");
          }

          appendGroupMessage(message, messagesBlock);
        }
      } else {
        if (document.querySelector("#messages" + message.from_id) && document.querySelector("#messages" + message.from_id).classList.contains("active")) {
          var messagesBlock = document.querySelector("#messages" + message.from_id);

          if (messagesBlock.querySelector(".simplebar-content")) {
            messagesBlock = messagesBlock.querySelector(".simplebar-content");
          }

          appendMessage(message, messagesBlock, message.from_id);
          activeMessageAreaToBottom(".profile-messages.active");
        }

        if (document.querySelector("#messages" + message.from_id)) {
          document.querySelector("#messages" + message.from_id).setAttribute("data-count", message.chat_count);
        }

        var userButton = document.querySelector(".profile-messages-user[data-user='" + message.from_id + "']");

        if (userButton) {
          if (userButton.querySelector(".profile-messages-user-count")) {
            var messagesCount = parseInt(userButton.querySelector(".profile-messages-user-count").innerHTML);
            messagesCount++;
            userButton.querySelector(".profile-messages-user-count").innerHTML = messagesCount;
          } else {
            userButton.innerHTML += "<span class='profile-messages-user-count'>1</span>";
          }
        } else {
          var usersBlock = document.querySelector(".profile-messages-users .simplebar-content");

          if (usersBlock) {
            usersBlock.innerHTML = '<a href="' + message.sender.url + '" data-user="' + message.sender.id + '" data-chatid="' + message.chat_id + '" data-name="' + message.sender.namef + '" class="profile-messages-user"><img src="' + message.sender.avatar + '" alt="' + message.sender.namef + '"><div>' + message.sender.namef + '</div><span class="profile-messages-user-count">1</span></a>' + usersBlock.innerHTML;
            document.querySelector(".profile-messages-wrap").innerHTML = '<div id="messages' + message.sender.id + '" class="profile-messages" data-count="' + message.chat_count + '"></div>' + document.querySelector(".profile-messages-wrap").innerHTML;
          }
        }

        var usersUnreadChats = document.querySelector(".mtui-message div");

        if (usersUnreadChats) {
          usersUnreadChats.innerHTML = message.unread_chats;
        } else {
          document.querySelector(".mtui-message").innerHTML = "<div>" + message.unread_chats + "</div>";
        }

        audio.play();
        clearTimeout(messageTimeout);
        var newMessage = document.querySelector("#newMessage");
        newMessage.href = message.sender.url;
        newMessage.querySelector("span").innerHTML = message.sender.namef;
        newMessage.classList.add("active");
        setTimeout(function () {
          newMessage.classList.remove("active");
        }, 3000);
      }
    }); // read messages

    socket1.on("readMessages", function (data) {
      console.log(data);
      data.messageReadedIDs.forEach(function (id) {
        document.querySelector(".profile-message[data-id='" + id + "']").classList.add("readed");
      });
    });

    if (messageSendForm) {
      messageSendForm.querySelector('[name="message"]').addEventListener("focus", function () {
        var token = document.querySelector("#getMessagesForm [name='_token']").value;
        var userID = document.querySelector("[name='to_id']").value;
        readMessages(token, userID);
      });
    }
    /*===============GROUP MESSAGES=================*/


    var groupMessageSendForm = document.querySelector(".tcp-input");

    if (groupMessageSendForm) {
      groupMessageSendForm.addEventListener("submit", function (e) {
        e.preventDefault();

        if (document.querySelector("[data-user-id]")) {
          if (groupMessageSendForm.querySelector('[name="message"]').value != "") {
            var formData = new FormData(groupMessageSendForm);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/profile/groupmessages');

            xhr.onload = function () {
              if (xhr.status === 200) {
                if (xhr.responseText != 0) {
                  if (!document.querySelector("is-expert")) {
                    var countMessages = groupMessageSendForm.querySelector("[name='message']").getAttribute("data-messages");
                    countMessages--;
                    groupMessageSendForm.querySelector("[name='message']").placeholder = "Доступно сообщений: " + countMessages;
                    groupMessageSendForm.querySelector("[name='message']").setAttribute("data-messages", countMessages);
                  }

                  var message = JSON.parse(xhr.responseText);
                  var messagesBlock = document.querySelector(".group-chat-" + message.chat_id);

                  if (messagesBlock.querySelector(".simplebar-content")) {
                    messagesBlock = messagesBlock.querySelector(".simplebar-content");
                  }

                  appendGroupMessage(message, messagesBlock);
                  activeMessageAreaToBottom(".group-chat-" + message.chat_id);
                  groupMessageSendForm.querySelector('[name="message"]').value = "";
                  socket1.emit("message", message);
                } else {
                  window.openPopup("#payForMessage");
                }
              } else {
                console.log('Request failed.  Returned status of ' + xhr.status);
              }
            };

            xhr.send(formData);
          }
        } else {
          window.openPopup("#notLoggedInPopup");
        }
      });
    }

    var tcpChatMsgs = document.querySelectorAll(".tcp-chat-messages");

    if (tcpChatMsgs) {
      tcpChatMsgs.forEach(function (chat) {
        var simpleBarGroup = new SimpleBar(chat);
        simpleBarGroup.getScrollElement().scrollTop = 10000;
      });
    } //SERVICES MESSGES


    document.querySelectorAll(".videocall-popup .top-chat-block form").forEach(function (el) {
      el.addEventListener("submit", function (e) {
        e.preventDefault();

        if (document.querySelector("[data-user-id]")) {
          if (groupMessageSendForm.querySelector('[name="message"]').value != "") {
            var formData = new FormData(el); // var xhr = new XMLHttpRequest();
            // xhr.open('POST', '/profile/groupmessages');
            // xhr.onload = function() {
            //     if (xhr.status === 200) {
            //         if(xhr.responseText != 0){
            //             var message = JSON.parse(xhr.responseText);
            //             var messagesBlock =  document.querySelector(".group-chat-" + message.chat_id);
            //             if(messagesBlock.querySelector(".simplebar-content")){
            //                 messagesBlock = messagesBlock.querySelector(".simplebar-content");
            //             }
            //             appendGroupMessage(message, messagesBlock);
            //             activeMessageAreaToBottom(".group-chat-" + message.chat_id);
            //             groupMessageSendForm.querySelector('[name="message"]').value = "";
            //             socket1.emit("message", message);
            //         }else{
            //             openPopup("#payForMessage");
            //         }
            //     }
            //     else {
            //         console.log('Request failed.  Returned status of ' + xhr.status);
            //     }
            // };
            // xhr.send(formData);
          }
        } else {
          window.openPopup("#notLoggedInPopup");
        }
      });
    });

})));
