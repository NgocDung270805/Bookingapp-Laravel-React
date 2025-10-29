(function (factory) {
  typeof define === 'function' && define.amd ? define(factory) :
  factory();
})((function () { 'use strict';

  const chatInit=()=>{const{getData:e}=window.phoenix.utils,t=".chat-sidebar",a=".chat-textarea",c="[data-chat-thread]",o="[data-chat-thread-tab]",r="[data-chat-thread-tab-content]",s=document.querySelector(t),l=document.querySelector(a),n=document.querySelectorAll(c),d=document.querySelector(o),u=document.querySelector(r);if(d){const t=d.querySelectorAll("[data-bs-toggle='tab']"),a=new window.List(u,{valueNames:["read","unreadItem"]}),c=document.querySelector(".chat .card-body");c.scrollTop=c.scrollHeight,t.forEach((t=>t.addEventListener("shown.bs.tab",(()=>{const c=e(t,"chat-thread-list");a.filter((e=>"all"===c||e.elm.classList.contains(c)));}))));}n.forEach(((e,t)=>{e.addEventListener("click",(()=>{const a=document.querySelector(`.chat-content-body-${t}`);if(a.scrollTop=a.scrollHeight,s.classList.remove("show"),e.classList.contains("unread")){e.classList.remove("unread");const t=e.querySelector(".unread-badge");t&&t.remove();}}));})),l&&l.setAttribute("placeholder","Type your message...");};

  const{docReady:docReady}=window.phoenix.utils;docReady(chatInit);

}));
//# sourceMappingURL=chat.js.map
