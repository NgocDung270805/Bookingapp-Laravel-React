(function (factory) {
  typeof define === 'function' && define.amd ? define(factory) :
  factory();
})((function () { 'use strict';

  const kanbanInit=()=>{const t=document.querySelector("[data-kanban-container]");if(t){t.addEventListener("click",(t=>{t.target.hasAttribute("data-kanban-collapse")&&t.target.closest(".kanban-column").classList.toggle("collapsed");}));t.querySelectorAll("[data-sortable]").forEach((t=>{window.Sortable.get(t).option("onStart",(t=>{document.body.classList.add("sortable-dragging"),window.Sortable.ghost.querySelector(".dropdown-menu")?.classList.remove("show");const e=t.item.querySelector("[data-bs-toggle='dropdown']");window.bootstrap.Dropdown.getInstance(e)?.hide();}));}));}};

  const createBoardInit=()=>{const{getData:e}=window.phoenix.utils,t="[data-create-board]",r="[data-wizard-step]",a="[data-wizard-form]",o="[data-kanban-step]",n="[data-board-prev-btn]",c="[data-custom-color-radio]",d="submit",l="show.bs.tab",s="click",u="change",i=document.querySelector(t);if(i){const m=i.querySelectorAll(r),w=Array.from(m).map((e=>window.bootstrap.Tab.getOrCreateInstance(e)));document.querySelector(n)?.addEventListener(s,(()=>{w[w.length-2].show();})),m.length&&m.forEach((t=>{t.addEventListener(l,(()=>{const r=e(t,"wizard-step"),a=document.querySelector(o);a&&(a.textContent=r);}));}));const b=i.querySelectorAll(a);b.forEach(((e,r)=>{e.addEventListener(d,(e=>{e.preventDefault();const a=new FormData(e.target);Object.fromEntries(a.entries());return r+1===b.length&&window.location.reload(),null}));}));document.querySelector("#customColorInput")?.addEventListener(u,(e=>{const t=e.target.value,r=document.querySelector(c);r.setAttribute("checked","checked"),r.value=t;}));}};

  const{docReady:docReady}=window.phoenix.utils;docReady(kanbanInit),docReady(createBoardInit);

}));
//# sourceMappingURL=kanban.js.map
