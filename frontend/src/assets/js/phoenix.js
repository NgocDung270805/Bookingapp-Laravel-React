(function(global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('bootstrap')) : typeof define === 'function' && define.amd ? define(['bootstrap'], factory) : (global = typeof globalThis !== 'undefined' ? globalThis : global || self,
    global.phoenix = factory(global.bootstrap));
}
)(this, (function(bootstrap) {
    'use strict';

    const docReady = e => {
        "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", e) : setTimeout(e, 1);
    }
    ;
    const toggleColor = (e, t) => {
        const o = getItemFromStore("phoenixTheme");
        return "light" === ("auto" === o ? getSystemTheme() : o) ? e : t
    }
    ;
    const resize = e => window.addEventListener("resize", e);
    const isIterableArray = e => Array.isArray(e) && !!e.length;
    const camelize = e => {
        const t = e.replace(/[-_\s.]+(.)?/g, ( (e, t) => t ? t.toUpperCase() : ""));
        return `${t.substr(0, 1).toLowerCase()}${t.substr(1)}`
    }
    ;
    const getData = (e, t) => {
        try {
            return JSON.parse(e.dataset[camelize(t)])
        } catch (o) {
            return e.dataset[camelize(t)]
        }
    }
    ;
    const hexToRgb = e => {
        let t;
        t = 0 === e.indexOf("#") ? e.substring(1) : e;
        const o = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(t.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i, ( (e, t, o, r) => t + t + o + o + r + r)));
        return o ? [parseInt(o[1], 16), parseInt(o[2], 16), parseInt(o[3], 16)] : null
    }
    ;
    const rgbaColor = (e="#fff", t=.5) => `rgba(${hexToRgb(e)}, ${t})`;
    const getColor = (e, t=document.documentElement) => getComputedStyle(t).getPropertyValue(`--phoenix-${e}`).trim();
    const hasClass = (e, t) => e.classList.value.includes(t);
    const addClass = (e, t) => {
        e.classList.add(t);
    }
    ;
    const getOffset = e => {
        const t = e.getBoundingClientRect()
          , o = window.pageXOffset || document.documentElement.scrollLeft
          , r = window.pageYOffset || document.documentElement.scrollTop;
        return {
            top: t.top + r,
            left: t.left + o
        }
    }
    ;
    const isScrolledIntoView = e => {
        let t = e.offsetTop
          , o = e.offsetLeft;
        const r = e.offsetWidth
          , s = e.offsetHeight;
        for (; e.offsetParent; )
            t += (e = e.offsetParent).offsetTop,
            o += e.offsetLeft;
        return {
            all: t >= window.pageYOffset && o >= window.pageXOffset && t + s <= window.pageYOffset + window.innerHeight && o + r <= window.pageXOffset + window.innerWidth,
            partial: t < window.pageYOffset + window.innerHeight && o < window.pageXOffset + window.innerWidth && t + s > window.pageYOffset && o + r > window.pageXOffset
        }
    }
    ;
    const breakpoints = {
        xs: 0,
        sm: 576,
        md: 768,
        lg: 992,
        xl: 1200,
        xxl: 1540
    };
    const getBreakpoint = e => {
        const t = e && e.classList.value;
        let o;
        return t && (o = breakpoints[t.split(" ").filter((e => e.includes("navbar-expand-"))).pop().split("-").pop()]),
        o
    }
    ;
    const setCookie = (e, t, o) => {
        const r = window.dayjs().add(o, "second").toDate();
        document.cookie = `${e}=${t};expires=${r}`;
    }
    ;
    const getCookie = e => {
        const t = document.cookie.match(`(^|;) ?${e}=([^;]*)(;|$)`);
        return t ? t[2] : t
    }
    ;
    const settings = {
        tinymce: {
            theme: "oxide"
        },
        chart: {
            borderColor: "rgba(255, 255, 255, 0.8)"
        }
    };
    const newChart = (e, t) => {
        const o = e.getContext("2d");
        return new window.Chart(o,t)
    }
    ;
    const getItemFromStore = (e, t, o=localStorage) => {
        try {
            return JSON.parse(o.getItem(e)) || t
        } catch {
            return o.getItem(e) || t
        }
    }
    ;
    const setItemToStore = (e, t, o=localStorage) => o.setItem(e, t);
    const getStoreSpace = (e=localStorage) => parseFloat((escape(encodeURIComponent(JSON.stringify(e))).length / 1048576).toFixed(2));
    const getDates = (e, t, o=864e5) => {
        const r = (t - e) / o;
        return Array.from({
            length: r + 1
        }, ( (t, r) => new Date(e.valueOf() + o * r)))
    }
    ;
    const getPastDates = e => {
        let t;
        switch (e) {
        case "week":
            t = 7;
            break;
        case "month":
            t = 30;
            break;
        case "year":
            t = 365;
            break;
        default:
            t = e;
        }
        const o = new Date
          , r = o
          , s = new Date((new Date).setDate(o.getDate() - (t - 1)));
        return getDates(s, r)
    }
    ;
    const getRandomNumber = (e, t) => Math.floor(Math.random() * (t - e) + e);
    const getSystemTheme = () => window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
    var utils = {
        docReady: docReady,
        toggleColor: toggleColor,
        resize: resize,
        isIterableArray: isIterableArray,
        camelize: camelize,
        getData: getData,
        hasClass: hasClass,
        addClass: addClass,
        hexToRgb: hexToRgb,
        rgbaColor: rgbaColor,
        getColor: getColor,
        breakpoints: breakpoints,
        getOffset: getOffset,
        isScrolledIntoView: isScrolledIntoView,
        getBreakpoint: getBreakpoint,
        setCookie: setCookie,
        getCookie: getCookie,
        newChart: newChart,
        settings: settings,
        getItemFromStore: getItemFromStore,
        setItemToStore: setItemToStore,
        getStoreSpace: getStoreSpace,
        getDates: getDates,
        getPastDates: getPastDates,
        getRandomNumber: getRandomNumber,
        getSystemTheme: getSystemTheme
    };

    const docComponentInit = () => {
        const e = document.querySelectorAll("[data-component-card]")
          , o = document.getElementById("icon-copied-toast")
          , t = new bootstrap.Toast(o);
        e.forEach((e => {
            const c = e.querySelector(".copy-code-btn")
              , n = e.querySelector(".code-to-copy")
              , d = e.querySelector(".preview-btn")
              , r = e.querySelector(".code-collapse")
              , a = bootstrap.Collapse.getOrCreateInstance(r, {
                toggle: !1
            });
            d?.addEventListener("click", ( () => {
                a.toggle();
            }
            )),
            c?.addEventListener("click", ( () => {
                const e = document.createElement("textarea");
                e.value = n.innerHTML,
                document.body.appendChild(e),
                e.select(),
                document.execCommand("copy"),
                document.body.removeChild(e),
                o.querySelector(".toast-body").innerHTML = "<code class='text-body-quaternary'>Code has been copied to clipboard.</code>",
                t.show();
            }
            ));
        }
        ));
    }
    ;

    const anchorJSInit = () => {
        new window.AnchorJS({
            icon: "#"
        }).add("[data-anchor]");
    }
    ;

    const bigPictureInit = () => {
        const {getData: e} = window.phoenix.utils;
        if (window.BigPicture) {
            document.querySelectorAll("[data-bigpicture]").forEach((i => {
                const t = e(i, "bigpicture")
                  , c = {
                    el: i,
                    noLoader: !0,
                    allowfullscreen: !0
                }
                  , n = window._.merge(c, t);
                i.addEventListener("click", ( () => {
                    window.BigPicture(n);
                }
                ));
            }
            ));
        }
    }
    ;

    class DomNode {
        constructor(s) {
            this.node = s;
        }
        addClass(s) {
            this.isValidNode() && this.node.classList.add(s);
        }
        removeClass(s) {
            this.isValidNode() && this.node.classList.remove(s);
        }
        toggleClass(s) {
            this.isValidNode() && this.node.classList.toggle(s);
        }
        hasClass(s) {
            this.isValidNode() && this.node.classList.contains(s);
        }
        data(s) {
            if (this.isValidNode())
                try {
                    return JSON.parse(this.node.dataset[this.camelize(s)])
                } catch (t) {
                    return this.node.dataset[this.camelize(s)]
                }
            return null
        }
        attr(s) {
            return this.isValidNode() && this.node[s]
        }
        setAttribute(s, t) {
            this.isValidNode() && this.node.setAttribute(s, t);
        }
        removeAttribute(s) {
            this.isValidNode() && this.node.removeAttribute(s);
        }
        setProp(s, t) {
            this.isValidNode() && (this.node[s] = t);
        }
        on(s, t) {
            this.isValidNode() && this.node.addEventListener(s, t);
        }
        isValidNode() {
            return !!this.node
        }
        camelize(s) {
            const t = s.replace(/[-_\s.]+(.)?/g, ( (s, t) => t ? t.toUpperCase() : ""));
            return `${t.substr(0, 1).toLowerCase()}${t.substr(1)}`
        }
    }

    const elementMap = new Map;
    class BulkSelect {
        constructor(e, t) {
            this.element = e,
            this.option = {
                displayNoneClassName: "d-none",
                ...t
            },
            elementMap.set(this.element, this);
        }
        static getInstance(e) {
            return elementMap.has(e) ? elementMap.get(e) : null
        }
        init() {
            this.attachNodes(),
            this.clickBulkCheckbox(),
            this.clickRowCheckbox();
        }
        getSelectedRows() {
            return Array.from(this.bulkSelectRows).filter((e => e.checked)).map((e => getData(e, "bulk-select-row")))
        }
        attachNodes() {
            const {body: e, actions: t, replacedElement: s} = getData(this.element, "bulk-select");
            this.actions = new DomNode(document.getElementById(t)),
            this.replacedElement = new DomNode(document.getElementById(s)),
            this.bulkSelectRows = document.getElementById(e).querySelectorAll("[data-bulk-select-row]");
        }
        attachRowNodes(e) {
            this.bulkSelectRows = e;
        }
        clickBulkCheckbox() {
            this.element.addEventListener("click", ( () => {
                if ("indeterminate" === this.element.indeterminate)
                    return this.actions.addClass(this.option.displayNoneClassName),
                    this.replacedElement.removeClass(this.option.displayNoneClassName),
                    this.removeBulkCheck(),
                    void this.bulkSelectRows.forEach((e => {
                        const t = new DomNode(e);
                        t.checked = !1,
                        t.setAttribute("checked", !1);
                    }
                    ));
                this.toggleDisplay(),
                this.bulkSelectRows.forEach((e => {
                    e.checked = this.element.checked;
                }
                ));
            }
            ));
        }
        clickRowCheckbox() {
            this.bulkSelectRows.forEach((e => {
                new DomNode(e).on("click", ( () => {
                    "indeterminate" !== this.element.indeterminate && (this.element.indeterminate = !0,
                    this.element.setAttribute("indeterminate", "indeterminate"),
                    this.element.checked = !0,
                    this.element.setAttribute("checked", !0),
                    this.actions.removeClass(this.option.displayNoneClassName),
                    this.replacedElement.addClass(this.option.displayNoneClassName)),
                    [...this.bulkSelectRows].every((e => e.checked)) && (this.element.indeterminate = !1,
                    this.element.setAttribute("indeterminate", !1)),
                    [...this.bulkSelectRows].every((e => !e.checked)) && (this.removeBulkCheck(),
                    this.toggleDisplay());
                }
                ));
            }
            ));
        }
        removeBulkCheck() {
            this.element.indeterminate = !1,
            this.element.removeAttribute("indeterminate"),
            this.element.checked = !1,
            this.element.setAttribute("checked", !1);
        }
        toggleDisplay(e, t) {
            (e || t) && (e.classList.toggle(this.option.displayNoneClassName),
            t.classList.toggle(this.option.displayNoneClassName)),
            this.actions.toggleClass(this.option.displayNoneClassName),
            this.replacedElement.toggleClass(this.option.displayNoneClassName);
        }
        deselectAll(e, t) {
            this.removeBulkCheck(),
            this.toggleDisplay(e, t),
            this.bulkSelectRows.forEach((e => {
                e.checked = !1,
                e.removeAttribute("checked");
            }
            ));
        }
    }
    const bulkSelectInit = () => {
        const e = document.querySelectorAll("[data-bulk-select]");
        e.length && e.forEach((e => {
            new BulkSelect(e).init();
        }
        ));
    }
    ;

    const {merge: merge$2} = window._;
    const echartSetOption = (t, e, s, n) => {
        const {breakpoints: o, resize: a} = window.phoenix.utils
          , l = e => {
            Object.keys(e).forEach((s => {
                window.innerWidth > o[s] && t.setOption(e[s]);
            }
            ));
        }
          , r = document.body;
        t.setOption(merge$2(s(), e));
        const i = document.querySelector(".navbar-vertical-toggle");
        i && i.addEventListener("navbar.vertical.toggle", ( () => {
            t.resize(),
            n && l(n);
        }
        )),
        a(( () => {
            t.resize(),
            n && l(n);
        }
        )),
        n && l(n),
        r.addEventListener("clickControl", ( ({detail: {control: o}}) => {
            "phoenixTheme" === o && t.setOption(window._.merge(s(), e)),
            n && l(n);
        }
        ));
    }
    ;
    const echartTabs = document.querySelectorAll("[data-tab-has-echarts]");
    echartTabs && echartTabs.forEach((t => {
        t.addEventListener("shown.bs.tab", (t => {
            const e = t.target
              , {hash: s} = e
              , n = s || e.dataset.bsTarget
              , o = document.getElementById(n.substring(1))?.querySelector("[data-echart-tab]");
            o && window.echarts.init(o).resize();
        }
        ));
    }
    ));

    const basicEchartsInit = () => {
        const {getColor: t, getData: o, getDates: e} = window.phoenix.utils;
        document.querySelectorAll("[data-echarts]").forEach((r => {
            const a = o(r, "echarts")
              , i = window.echarts.init(r);
            echartSetOption(i, a, ( () => ({
                color: t("primary"),
                tooltip: {
                    trigger: "item",
                    padding: [7, 10],
                    backgroundColor: t("body-highlight-bg"),
                    borderColor: t("border-color"),
                    textStyle: {
                        color: t("light-text-emphasis")
                    },
                    borderWidth: 1,
                    transitionDuration: 0,
                    extraCssText: "z-index: 1000"
                },
                xAxis: {
                    type: "category",
                    data: e(new Date("5/1/2022"), new Date("5/7/2022"), 864e5),
                    show: !0,
                    boundaryGap: !1,
                    axisLine: {
                        show: !0,
                        lineStyle: {
                            color: t("secondary-bg")
                        }
                    },
                    axisTick: {
                        show: !1
                    },
                    axisLabel: {
                        formatter: t => window.dayjs(t).format("DD MMM"),
                        interval: 6,
                        showMinLabel: !0,
                        showMaxLabel: !0,
                        color: t("secondary-color")
                    }
                },
                yAxis: {
                    show: !1,
                    type: "value",
                    boundaryGap: !1
                },
                series: [{
                    type: "bar",
                    symbol: "none"
                }],
                grid: {
                    left: 22,
                    right: 22,
                    top: 0,
                    bottom: 20
                }
            })));
        }
        ));
    }
    ;

    const choicesInit = () => {
        const {getData: e} = window.phoenix.utils;
        if (window.Choices) {
            document.querySelectorAll("[data-choices]").forEach((t => {
                const i = e(t, "options")
                  , s = new window.Choices(t,{
                    itemSelectText: "",
                    addItems: !0,
                    allowHTML: !0,
                    ...i
                });
                return document.querySelectorAll(".needs-validation").forEach((e => {
                    const i = () => {
                        e.querySelectorAll(".choices").forEach((e => {
                            const t = e.querySelector(".choices__list--single")
                              , i = e.querySelector(".choices__list--multiple");
                            e.querySelector("[required]") && (t && ("" !== t.querySelector(".choices__item--selectable")?.getAttribute("data-value") ? (e.classList.remove("invalid"),
                            e.classList.add("valid")) : (e.classList.remove("valid"),
                            e.classList.add("invalid"))),
                            i && (e.getElementsByTagName("option").length ? (e.classList.remove("invalid"),
                            e.classList.add("valid")) : (e.classList.remove("valid"),
                            e.classList.add("invalid"))));
                        }
                        ));
                    }
                    ;
                    e.addEventListener("submit", ( () => {
                        i();
                    }
                    )),
                    t.addEventListener("change", ( () => {
                        i();
                    }
                    ));
                }
                )),
                s
            }
            ));
        }
    }
    ;

    const copyLink = () => {
        const {getData: t} = window.phoenix.utils;
        document.querySelectorAll("[data-copy]").forEach((e => {
            const o = new window.bootstrap.Tooltip(e);
            e.addEventListener("mouseover", ( () => o.show())),
            e.addEventListener("mouseleave", ( () => o.hide())),
            e.addEventListener("click", ( () => {
                e.setAttribute("data-bs-original-title", "Copied"),
                o.show();
                const i = t(e, "copy")
                  , a = document.querySelector(i);
                a.select(),
                navigator.clipboard.writeText(a.value),
                e.setAttribute("data-bs-original-title", "click to copy");
            }
            ));
        }
        ));
    }
    ;

    const countupInit = () => {
        const {getData: o} = window.phoenix.utils;
        if (window.countUp) {
            document.querySelectorAll("[data-countup]").forEach((t => {
                const {endValue: n, ...u} = o(t, "countup")
                  , e = new window.countUp.CountUp(t,n,{
                    duration: 4,
                    ...u
                });
                e.error ? console.error(e.error) : e.start();
            }
            ));
        }
    }
    ;

    const detectorInit = () => {
        const {addClass: e} = window.phoenix.utils
          , {is: o} = window
          , i = document.querySelector("html");
        o.opera() && e(i, "opera"),
        o.mobile() && e(i, "mobile"),
        o.firefox() && e(i, "firefox"),
        o.safari() && e(i, "safari"),
        o.ios() && e(i, "ios"),
        o.iphone() && e(i, "iphone"),
        o.ipad() && e(i, "ipad"),
        o.ie() && e(i, "ie"),
        o.edge() && e(i, "edge"),
        o.chrome() && e(i, "chrome"),
        o.mac() && e(i, "osx"),
        o.windows() && e(i, "windows"),
        navigator.userAgent.match("CriOS") && e(i, "chrome");
    }
    ;

    const dropdownOnHover = () => {
        const e = document.querySelector("[data-dropdown-on-hover]");
        e && e.addEventListener("mouseover", (e => {
            if (e.target?.classList.contains("dropdown-toggle") && !e.target.parentNode.className.includes("dropdown-inside") && window.innerWidth > 992) {
                const o = new window.bootstrap.Dropdown(e.target);
                o._element.classList.add("show"),
                o._menu.classList.add("show"),
                o._menu.setAttribute("data-bs-popper", "none"),
                e.target.parentNode.addEventListener("mouseleave", ( () => {
                    window.innerWidth > 992 && o.hide();
                }
                ));
            }
        }
        ));
    }
    ;

    const {merge: merge$1} = window._;
    window.Dropzone && (window.Dropzone.autoDiscover = !1);
    const dropzoneInit = () => {
        const {getData: e} = window.phoenix.utils
          , o = "[data-dropzone]"
          , r = ".dz-preview"
          , t = ".dz-preview .dz-preview-cover"
          , i = "dz-file-processing"
          , l = "dz-file-complete"
          , n = "dz-processing"
          , s = "options"
          , a = "addedfile"
          , c = "removedfile"
          , d = "complete"
          , u = document.querySelectorAll(o);
        u.length && u.forEach((o => {
            let u = e(o, s);
            u = u || {};
            const m = u.data ? u.data : {}
              , p = merge$1({
                url: "/assets/php/",
                addRemoveLinks: !1,
                previewsContainer: o.querySelector(r),
                previewTemplate: o.querySelector(r).innerHTML,
                thumbnailWidth: null,
                thumbnailHeight: null,
                maxFilesize: 2,
                autoProcessQueue: !1,
                filesizeBase: 1e3,
                init: function() {
                    const e = this;
                    m.length && m.forEach((o => {
                        const r = {
                            name: o.name,
                            size: o.size
                        };
                        e.options.addedfile.call(e, r),
                        e.options.thumbnail.call(e, r, `${o.url}/${o.name}`);
                    }
                    )),
                    e.on(a, (function() {
                        "maxFiles"in u && (1 === u.maxFiles && o.querySelectorAll(t).length > 1 && o.querySelector(t).remove(),
                        1 === u.maxFiles && this.files.length > 1 && this.removeFile(this.files[0]));
                    }
                    ));
                },
                error(e, o) {
                    if (e.previewElement) {
                        e.previewElement.classList.add("dz-error"),
                        "string" != typeof o && o.error && (o = o.error);
                        for (let r of e.previewElement.querySelectorAll("[data-dz-errormessage]"))
                            r.textContent = o;
                    }
                }
            }, u);
            o.querySelector(r).innerHTML = "";
            const w = new window.Dropzone(o,p);
            w.on(a, ( () => {
                o.querySelector(t) && o.querySelector(t).classList.remove(l),
                o.classList.add(i),
                document.querySelector(".kanban-custom-bg-radio")?.setAttribute("checked", !0);
            }
            )),
            w.on(c, ( () => {
                o.querySelector(t) && o.querySelector(t).classList.remove(n),
                o.classList.add(l);
            }
            )),
            w.on(d, ( () => {
                o.querySelector(t) && o.querySelector(t).classList.remove(n),
                o.classList.add(l);
            }
            ));
        }
        ));
    }
    ;

    const featherIconsInit = () => {
        window.feather && window.feather.replace({
            width: "16px",
            height: "16px"
        });
    }
    ;

    const flatpickrInit = () => {
        const {getData: e} = window.phoenix.utils;
        document.querySelectorAll(".datetimepicker").forEach((t => {
            const o = e(t, "options");
            window.flatpickr(t, {
                nextArrow: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">\x3c!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --\x3e<path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>',
                prevArrow: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">\x3c!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --\x3e<path d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"/></svg>',
                locale: {
                    firstDayOfWeek: 1,
                    shorthand: ["S", "M", "T", "W", "T", "F", "S"]
                },
                monthSelectorType: "static",
                onDayCreate: (e, t, o, s) => {
                    6 !== s.dateObj.getDay() && 0 !== s.dateObj.getDay() || (s.className += " weekend-days");
                }
                ,
                ...o
            });
        }
        ));
    }
    ;

    const formValidationInit = () => {
        document.querySelectorAll(".needs-validation").forEach((t => {
            t.addEventListener("submit", (a => {
                t.checkValidity() || (a.preventDefault(),
                a.stopPropagation()),
                t.classList.add("was-validated");
            }
            ), !1);
        }
        ));
    }
    ;

    const renderCalendar = (e, t) => {
        const {merge: r} = window._
          , a = r({
            initialView: "dayGridMonth",
            weekNumberCalculation: "ISO",
            editable: !0,
            direction: document.querySelector("html").getAttribute("dir"),
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay"
            },
            buttonText: {
                month: "Month",
                week: "Week",
                day: "Day"
            }
        }, t)
          , n = new window.FullCalendar.Calendar(e,a);
        return n.render(),
        document.querySelector(".navbar-vertical-toggle")?.addEventListener("navbar.vertical.toggle", ( () => n.updateSize())),
        n
    }
    ;
    const fullCalendarInit = () => {
        const {getData: e} = window.phoenix.utils;
        document.querySelectorAll("[data-calendar]").forEach((t => {
            const r = e(t, "calendar");
            renderCalendar(t, r);
        }
        ));
    }
    ;

    const glightboxInit = () => {
        window.GLightbox && window.GLightbox({
            selector: "[data-gallery]"
        });
    }
    ;

    function initMap() {
        const {getData: e} = window.phoenix.utils
          , t = document.body
          , l = document.querySelectorAll("[data-googlemap]");
        if (l.length && window.google) {
            const i = (e, t) => {
                const l = document.createElement("button");
                return l.classList.add(t),
                l.innerHTML = "zoomIn" === t ? '<span class="fas fa-plus text-body-emphasis"></span>' : '<span class="fas fa-minus text-body-emphasis"></span>',
                l.addEventListener("click", ( () => {
                    const l = e.getZoom();
                    "zoomIn" === t && e.setZoom(l + 1),
                    "zoomOut" === t && e.setZoom(l - 1);
                }
                )),
                l
            }
              , s = {
                SnazzyCustomLight: [{
                    featureType: "administrative",
                    elementType: "all",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels",
                    stylers: [{
                        visibility: "on"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#525b75"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels.icon",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "administrative.country",
                    elementType: "geometry.stroke",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#ffffff"
                    }]
                }, {
                    featureType: "administrative.province",
                    elementType: "geometry.stroke",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "landscape",
                    elementType: "geometry",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#E3E6ED"
                    }]
                }, {
                    featureType: "landscape.natural",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "poi",
                    elementType: "all",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "road",
                    elementType: "all",
                    stylers: [{
                        color: "#eff2f6"
                    }]
                }, {
                    featureType: "road",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "all",
                    stylers: [{
                        visibility: "on"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "geometry",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#eff2f6"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "labels.text.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#9fa6bc"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "geometry.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#eff2f6"
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "labels.text.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#9fa6bc"
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit",
                    elementType: "labels.icon",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit.line",
                    elementType: "geometry",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit.line",
                    elementType: "labels.text",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit.station.airport",
                    elementType: "geometry",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit.station.airport",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{
                        color: "#F5F7FA"
                    }]
                }, {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }],
                SnazzyCustomDark: [{
                    featureType: "administrative",
                    elementType: "all",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels",
                    stylers: [{
                        visibility: "on"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#8a94ad"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels.icon",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "administrative.country",
                    elementType: "geometry.stroke",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#000000"
                    }]
                }, {
                    featureType: "administrative.province",
                    elementType: "geometry.stroke",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "landscape",
                    elementType: "geometry",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#222834"
                    }]
                }, {
                    featureType: "landscape.natural",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "poi",
                    elementType: "all",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "road",
                    elementType: "all",
                    stylers: [{
                        color: "#141824"
                    }]
                }, {
                    featureType: "road",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "all",
                    stylers: [{
                        visibility: "on"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "geometry",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#141824"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "labels.text.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#525b75"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "geometry.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#141824"
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "labels.text.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#67718A"
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit",
                    elementType: "labels.icon",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit.line",
                    elementType: "geometry",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit.line",
                    elementType: "labels.text",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit.station.airport",
                    elementType: "geometry",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit.station.airport",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{
                        color: "#0f111a"
                    }]
                }, {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }]
            };
            l.forEach((l => {
                const o = e(l, "latlng").split(",")
                  , r = l.innerHTML
                  , a = e(l, "zoom")
                  , y = l
                  , n = e(l, "phoenixTheme");
                if ("streetview" === e(l, "phoenixTheme")) {
                    const t = e(l, "pov")
                      , i = {
                        position: {
                            lat: Number(o[0]),
                            lng: Number(o[1])
                        },
                        pov: t,
                        zoom: a,
                        gestureHandling: "none",
                        scrollwheel: !1
                    };
                    return new window.google.maps.StreetViewPanorama(y,i)
                }
                const p = {
                    zoom: a,
                    minZoom: 1.2,
                    clickableIcons: !1,
                    zoomControl: !1,
                    zoomControlOptions: {
                        position: window.google.maps.ControlPosition.LEFT
                    },
                    scrollwheel: e(l, "scrollwheel"),
                    disableDefaultUI: !0,
                    center: new window.google.maps.LatLng(o[0],o[1]),
                    styles: "dark" === window.config.config.phoenixTheme ? s.SnazzyCustomDark : s[n || "SnazzyCustomLight"]
                }
                  , f = new window.google.maps.Map(y,p)
                  , m = new window.google.maps.InfoWindow({
                    content: r
                })
                  , T = document.createElement("div");
                T.classList.add("google-map-control-btn");
                const b = i(f, "zoomIn")
                  , u = i(f, "zoomOut");
                T.appendChild(b),
                T.appendChild(u),
                f.controls[window.google.maps.ControlPosition.LEFT].push(T);
                const c = new window.google.maps.Marker({
                    position: new window.google.maps.LatLng(o[0],o[1]),
                    map: f
                });
                c.addListener("click", ( () => {
                    m.open(f, c);
                }
                )),
                t && t.addEventListener("clickControl", ( ({detail: {control: e, value: t}}) => {
                    "phoenixTheme" === e && f.set("styles", "dark" === t ? s.SnazzyCustomDark : s.SnazzyCustomLight);
                }
                ));
            }
            ));
        }
    }

    const iconCopiedInit = () => {
        const e = document.getElementById("icon-list")
          , t = document.getElementById("icon-copied-toast")
          , o = new window.bootstrap.Toast(t);
        e && e.addEventListener("click", (e => {
            const n = e.target;
            "INPUT" === n.tagName && (n.select(),
            n.setSelectionRange(0, 99999),
            document.execCommand("copy"),
            t.querySelector(".toast-body").innerHTML = `<span class="fw-black">Copied:</span>  <code>${n.value}</code>`,
            o.show());
        }
        ));
    }
    ;

    const isotopeInit = () => {
        const {getData: e} = window.phoenix.utils
          , t = ".isotope-item"
          , o = "[data-sl-isotope]"
          , l = "[data-filter]"
          , a = "[data-filter-nav]"
          , r = "[data-gallery-column]"
          , s = "sl-isotope"
          , n = "active";
        if (window.Isotope) {
            const c = document.querySelectorAll(o)
              , i = document.querySelector(r);
            c.length && c.forEach((o => {
                window.imagesLoaded(o, ( () => {
                    document.querySelectorAll(t).forEach((e => {
                        e.style.visibility = "visible";
                    }
                    ));
                    const r = e(o, s)
                      , c = {
                        itemSelector: t,
                        layoutMode: "packery"
                    }
                      , d = window._.merge(c, r)
                      , u = new window.Isotope(o,d)
                      , m = (e=4) => {
                        for (let t = 1; t < e; t += 1) {
                            const e = document.createElement("span");
                            e.classList.add("gallery-column-separator", `gallery-column-separator-${t}`),
                            o.appendChild(e);
                        }
                    }
                    ;
                    i && m();
                    return document.querySelector(a)?.addEventListener("click", (e => {
                        const t = e.target.dataset.filter;
                        u.arrange({
                            filter: t
                        }),
                        document.querySelectorAll(l).forEach((e => {
                            e.classList.remove(n);
                        }
                        )),
                        e.target.classList.add(n);
                        const o = u.getFilteredItemElements();
                        i && document.querySelectorAll('span[class*="gallery-column-separator-"]').forEach((e => e.remove())),
                        setTimeout(( () => {
                            i && m(o.length > 4 ? 4 : o.length),
                            u.layout();
                        }
                        ), 400);
                    }
                    )),
                    u.layout(),
                    u
                }
                ));
            }
            ));
        }
    }
    ;

    const togglePaginationButtonDisable = (e, t) => {
        e.disabled = t,
        e.classList[t ? "add" : "remove"]("disabled");
    }
      , listInit = () => {
        const {getData: e} = window.phoenix.utils;
        if (window.List) {
            const t = document.querySelectorAll("[data-list]");
            t.length && t.forEach((t => {
                const a = t.querySelector("[data-bulk-select]");
                let n = e(t, "list");
                n.pagination && (n = {
                    ...n,
                    pagination: {
                        item: "<li><button class='page' type='button'></button></li>",
                        ...n.pagination
                    }
                });
                const i = t.querySelector('[data-list-pagination="next"]')
                  , s = t.querySelector('[data-list-pagination="prev"]')
                  , l = t.querySelector('[data-list-view="*"]')
                  , o = t.querySelector('[data-list-view="less"]')
                  , c = t.querySelector("[data-list-info]")
                  , r = t.querySelector("[data-list-filter]")
                  , g = new List(t,n);
                let d = g.items.length;
                const h = g.page
                  , u = g.listContainer.querySelector(".btn-close");
                let m = Math.ceil(g.size() / g.page)
                  , p = 1
                  , b = (p - 1) * Number(g.page) + g.visibleItems.length
                  , y = !1;
                u && u.addEventListener("search.close", ( () => {
                    g.fuzzySearch("");
                }
                ));
                const v = () => {
                    c && (c.innerHTML = `${g.i} to ${b} <span class='text-body-tertiary'> Items of </span>${d}`),
                    s && togglePaginationButtonDisable(s, 1 === p || 0 === p),
                    i && togglePaginationButtonDisable(i, p === m || 0 === p),
                    p > 1 && p < m && (togglePaginationButtonDisable(i, !1),
                    togglePaginationButtonDisable(s, !1));
                }
                ;
                v(),
                i && i.addEventListener("click", (e => {
                    e.preventDefault(),
                    p += 1;
                    const t = g.i + h;
                    t <= g.size() && g.show(t, h);
                }
                )),
                s && s.addEventListener("click", (e => {
                    e.preventDefault(),
                    p -= 1;
                    const t = g.i - h;
                    t > 0 && g.show(t, h);
                }
                ));
                const f = () => {
                    o.classList.toggle("d-none"),
                    l.classList.toggle("d-none");
                }
                ;
                if (l && l.addEventListener("click", ( () => {
                    g.show(1, d),
                    p = 1,
                    f();
                }
                )),
                o && o.addEventListener("click", ( () => {
                    g.show(1, h),
                    p = 1,
                    f();
                }
                )),
                n.pagination && t.querySelector(".pagination").addEventListener("click", (e => {
                    if ("page" === e.target.classList[0]) {
                        const t = Number(e.target.getAttribute("data-i"));
                        t && (g.show(h * (t - 1) + 1, g.page),
                        p = t);
                    }
                }
                )),
                n.filter) {
                    const {key: e} = n.filter;
                    r.addEventListener("change", (t => {
                        g.filter((a => "" === t.target.value || (m = Math.ceil(g.matchingItems.length / g.page),
                        p = 1,
                        v(),
                        a.values()[e].toLowerCase().includes(t.target.value.toLowerCase()))));
                    }
                    ));
                }
                if (a) {
                    window.phoenix.BulkSelect.getInstance(a).attachRowNodes(g.items.map((e => e.elm.querySelector("[data-bulk-select-row]")))),
                    a.addEventListener("change", ( () => {
                        g && (a.checked ? g.items.forEach((e => {
                            e.elm.querySelector("[data-bulk-select-row]").checked = !0;
                        }
                        )) : g.items.forEach((e => {
                            e.elm.querySelector("[data-bulk-select-row]").checked = !1;
                        }
                        )));
                    }
                    ));
                }
                g.on("searchStart", ( () => {
                    y = !0;
                }
                )),
                g.on("searchComplete", ( () => {
                    y = !1;
                }
                )),
                g.on("updated", (e => {
                    m = g.matchingItems.length ? Math.ceil(g.matchingItems.length / g.page) : Math.ceil(g.size() / g.page),
                    b = (p - 1) * Number(g.page) + g.visibleItems.length,
                    v(),
                    y && (p = 0 === g.matchingItems.length ? 0 : 1,
                    d = g.matchingItems.length,
                    b = (0 === p ? 1 : p - 1) * Number(g.page) + g.visibleItems.length,
                    v(),
                    c && (c.innerHTML = `${0 === g.matchingItems.length ? 0 : g.i} to ${0 === g.matchingItems.length ? 0 : b} <span class='text-body-tertiary'> Items of </span>${g.matchingItems.length}`));
                    const a = t.querySelector(".fallback") || document.getElementById(n.fallback);
                    a && (0 === e.matchingItems.length ? a.classList.remove("d-none") : a.classList.add("d-none"));
                }
                ));
            }
            ));
        }
    }
    ;

    const lottieInit = () => {
        const {getData: o} = window.phoenix.utils
          , t = document.querySelectorAll(".lottie");
        t.length && t.forEach((t => {
            const n = o(t, "options");
            window.bodymovin.loadAnimation({
                container: t,
                path: "../img/animated-icons/warning-light.json",
                renderer: "svg",
                loop: !0,
                autoplay: !0,
                name: "Hello World",
                ...n
            });
        }
        ));
    }
    ;

    const modalInit = () => {
        const o = document.querySelectorAll("[data-phoenix-modal]");
        if (o) {
            const {getData: e, getCookie: t, setCookie: a} = window.phoenix.utils;
            o.forEach((o => {
                const d = e(o, "phoenix-modal");
                if (window._.merge({
                    autoShow: !1
                }, d).autoShow) {
                    const e = new window.bootstrap.Modal(o);
                    o.querySelector("[data-disable-modal-auto-show]").addEventListener("click", ( () => {
                        a("disableAutoShowModal", "true", 86400);
                    }
                    ));
                    t("disableAutoShowModal") || e.show();
                } else
                    o.addEventListener("shown.bs.modal", ( () => {
                        o.querySelectorAll("[autofocus=autofocus]").forEach((o => {
                            o.focus();
                        }
                        ));
                    }
                    ));
            }
            ));
        }
    }
    ;

    const navbarComboInit = () => {
        const {getBreakpoint: e, getData: n, addClass: r, hasClass: t, resize: o} = window.phoenix.utils
          , a = ".navbar-vertical"
          , c = '[data-navbar-top="combo"]'
          , i = ".collapse"
          , l = "[data-move-container]"
          , s = ".navbar-nav"
          , d = ".navbar-vertical-divider"
          , v = "flex-column"
          , u = document.querySelector(a)
          , m = document.querySelector(c)
          , b = o => {
            const a = e(u)
              , c = e(m);
            if (o < c) {
                const e = m.querySelector(i)
                  , t = e.innerHTML;
                if (t) {
                    const o = n(m, "move-target")
                      , i = document.querySelector(o);
                    if (e.innerHTML = "",
                    i.insertAdjacentHTML("afterend", `\n            <div data-move-container class='move-container'>\n              <div class='navbar-vertical-divider'>\n                <hr class='navbar-vertical-hr' />\n              </div>\n              ${t}\n            </div>\n          `),
                    a < c) {
                        const e = document.querySelector(l).querySelector(s);
                        r(e, v);
                    }
                }
            } else {
                const e = document.querySelector(l);
                if (e) {
                    const n = e.querySelector(s);
                    t(n, v) && n.classList.remove(v),
                    e.querySelector(d).remove(),
                    m.querySelector(i).innerHTML = e.innerHTML,
                    e.remove();
                }
            }
        }
        ;
        b(window.innerWidth),
        o(( () => b(window.innerWidth)));
    }
    ;

    const navbarShadowOnScrollInit = () => {
        const a = document.querySelector("[data-navbar-shadow-on-scroll]");
        a && (window.onscroll = () => {
            window.scrollY > 300 ? a.classList.add("navbar-shadow") : a.classList.remove("navbar-shadow");
        }
        );
    }
    ;

    const navbarInit = () => {
        const n = document.querySelector("[data-navbar-soft-on-scroll]");
        if (n) {
            const t = window.innerHeight
              , e = () => {
                let e = window.pageYOffset / t * 2;
                e >= 1 && (e = 1),
                n.style.backgroundColor = `rgba(255, 255, 255, ${e})`;
            }
            ;
            e(),
            document.addEventListener("scroll", ( () => e()));
        }
    }
    ;

    const handleNavbarVerticalCollapsed = () => {
        const {getItemFromStore: e, setItemToStore: t, resize: a} = window.phoenix.utils
          , o = "body"
          , n = ".navbar-vertical"
          , l = ".navbar-vertical-toggle"
          , r = ".navbar-vertical .navbar-collapse"
          , c = ".navbar-vertical .nav-link.active"
          , s = "click"
          , i = "navbar.vertical.toggle"
          , d = "navbar-vertical-collapsed"
          , v = document.querySelector(l)
          , m = document.querySelector(r)
          , u = document.querySelector(c);
        if (v && v.addEventListener(s, (a => {
            const o = e("phoenixIsNavbarVerticalCollapsed", !1);
            v.blur(),
            document.documentElement.classList.toggle(d),
            t("phoenixIsNavbarVerticalCollapsed", !o);
            const n = new CustomEvent(i);
            a.currentTarget?.dispatchEvent(n);
        }
        )),
        m) {
            const t = e("phoenixIsNavbarVerticalCollapsed", !1);
            u && !t && u.scrollIntoView({
                behavior: "smooth"
            });
        }
        const b = () => {
            const e = document.querySelector(o).offsetHeight
              , t = document.querySelector(n)?.offsetHeight;
            document.documentElement.classList.contains(d) && e < t ? document.documentElement.style.minHeight = `${t}px` : document.documentElement.removeAttribute("style");
        }
        ;
        b(),
        a(( () => {
            b();
        }
        )),
        v && v.addEventListener("navbar.vertical.toggle", ( () => {
            b();
        }
        ));
    }
    ;

    const phoenixOffcanvasInit = () => {
        const {getData: e} = window.phoenix.utils
          , o = document.querySelectorAll("[data-phoenix-toggle='offcanvas']")
          , t = document.querySelectorAll("[data-phoenix-backdrop]")
          , n = document.querySelector("[data-phoenix-scroll]")
          , a = document.querySelectorAll(".phoenix-offcanvas")
          , c = document.querySelector(".faq")
          , s = document.querySelector(".faq-sidebar");
        if (a) {
            const e = {
                sm: 576,
                md: 768,
                lg: 992,
                xl: 1200,
                xxl: 1540
            };
            window.addEventListener("resize", ( () => {
                a.forEach((o => {
                    const t = new window.bootstrap.Offcanvas(o)
                      , n = o.getAttribute("data-breakpoint")
                      , a = e[n];
                    window.innerWidth >= a && (document.body.style.overflow = "",
                    t.hide());
                }
                ));
            }
            ));
        }
        const d = e => {
            e.classList.remove("show"),
            document.body.style.removeProperty("overflow");
        }
        ;
        o && o.forEach((o => {
            const a = e(o, "phoenix-target")
              , c = document.querySelector(a)
              , s = c.querySelectorAll("[data-phoenix-dismiss='offcanvas']");
            o.addEventListener("click", ( () => {
                c.classList.add("show"),
                n || (document.body.style.overflow = "hidden");
            }
            )),
            s && s.forEach((e => {
                e.addEventListener("click", ( () => {
                    d(c);
                }
                ));
            }
            )),
            t && t.forEach((e => {
                e.addEventListener("click", ( () => {
                    d(c);
                }
                ));
            }
            ));
        }
        )),
        c && s.classList.contains("show") && (c.classList.add = "newFaq");
    }
    ;

    const picmoInit = () => {
        const {getData: e} = window.phoenix.utils
          , t = document.querySelectorAll("[data-picmo]");
        t && Array.from(t).forEach((t => {
            const o = e(t, "picmo")
              , n = window.picmoPopup.createPopup({}, {
                referenceElement: t,
                triggerElement: t,
                position: "bottom-start",
                showCloseButton: !1
            });
            t.addEventListener("click", ( () => {
                n.toggle();
            }
            ));
            const i = document.querySelector(o.inputTarget);
            n.addEventListener("emoji:select", (e => {
                i && (i.innerHTML += e.emoji);
            }
            ));
        }
        ));
    }
    ;

    const popoverInit = () => {
        Array.from(document.querySelectorAll('[data-bs-toggle="popover"]')).map((o => new bootstrap.Popover(o)));
    }
    ;

    const getThubmnailDirection = () => window.innerWidth < 768 || window.innerWidth >= 992 && window.innerWidth < 1200 ? "horizontal" : "vertical"
      , productDetailsInit = () => {
        const {getData: e, resize: t} = window.phoenix.utils
          , i = document.querySelector("[data-product-details]");
        if (i) {
            const r = i.querySelector("[data-product-color]")
              , n = (i.querySelector("[data-product-quantity]"),
            i.querySelector('[data-quantity] input[type="number"]'))
              , a = i.querySelector("[data-product-color-variants]")
              , c = r => {
                const n = i.querySelector("[data-products-swiper]")
                  , a = e(n, "swiper")
                  , c = e(n, "thumb-target")
                  , s = document.getElementById(c);
                let o = "";
                r.forEach((e => {
                    o += `\n          <div class='swiper-slide '>\n            <img class='w-100' src=${e} alt="">\n          </div>\n        `;
                }
                )),
                n.innerHTML = `<div class='swiper-wrapper'>${o}</div>`;
                let d = "";
                r.forEach((e => {
                    d += `\n          <div class='swiper-slide '>\n            <div class="product-thumb-container p-2 p-sm-3 p-xl-2">\n              <img src=${e} alt="">\n            </div>\n          </div>\n        `;
                }
                )),
                s.innerHTML = `<div class='swiper-wrapper'>${d}</div>`;
                const l = new window.Swiper(s,{
                    slidesPerView: 5,
                    spaceBetween: 16,
                    direction: getThubmnailDirection(),
                    breakpoints: {
                        768: {
                            spaceBetween: 100
                        },
                        992: {
                            spaceBetween: 16
                        }
                    }
                })
                  , p = n.querySelector(".swiper-nav");
                t(( () => {
                    l.changeDirection(getThubmnailDirection());
                }
                )),
                new Swiper(n,{
                    ...a,
                    navigation: {
                        nextEl: p?.querySelector(".swiper-button-next"),
                        prevEl: p?.querySelector(".swiper-button-prev")
                    },
                    thumbs: {
                        swiper: l
                    }
                });
            }
              , s = a.querySelectorAll("[data-variant]");
            s.forEach((t => {
                t.classList.contains("active") && (c(e(t, "products-images")),
                r.innerHTML = e(t, "variant"));
                const i = e(t, "products-images");
                t.addEventListener("click", ( () => {
                    c(i),
                    s.forEach((e => {
                        e.classList.remove("active");
                    }
                    )),
                    t.classList.add("active"),
                    r.innerHTML = e(t, "variant");
                }
                ));
            }
            )),
            n.addEventListener("change", (e => {
                "" == e.target.value && (e.target.value = 0);
            }
            ));
        }
    }
    ;

    const quantityInit = () => {
        const {getData: t} = window.phoenix.utils
          , e = "[data-quantity] [data-type]"
          , a = "[data-quantity]"
          , n = '[data-quantity] input[type="number"]'
          , u = "click"
          , i = "min"
          , r = "type";
        document.querySelectorAll(e).forEach((e => {
            e.addEventListener(u, (e => {
                const u = e.currentTarget
                  , l = t(u, r)
                  , c = u.closest(a).querySelector(n)
                  , o = c.getAttribute(i);
                let y = parseInt(c.value, 10);
                "plus" === l ? y += 1 : y = y > o ? y -= 1 : y,
                c.value = y;
            }
            ));
        }
        ));
    }
    ;

    const randomColorInit = () => {
        const {getData: o} = window.phoenix.utils
          , t = document.querySelectorAll("[data-random-color]")
          , r = ["#85A9FF", "#60C6FF", "#90D67F", "#F48270", "#3874FF", "#0097EB", "#25B003", "#EC1F00", "#E5780B", "#004DFF", "#0080C7", "#23890B", "#CC1B00", "#D6700A", "#222834", "#3E465B", "#6E7891", "#9FA6BC"];
        t.forEach((t => {
            const e = o(t, "random-color");
            let n;
            n = Array.isArray(e) ? [...r, ...e] : [...r],
            t.addEventListener("click", (o => {
                const t = n[Math.floor(Math.random() * (n.length - 1))];
                o.target.value = t;
                const r = o.target.nextElementSibling;
                r.style.background = `${t}`,
                r.style.borderColor = `${t}`,
                r.style.color = "white";
            }
            ));
        }
        ));
    }
    ;

    const ratingInit = () => {
        const {getData: t, getItemFromStore: e} = window.phoenix.utils;
        document.querySelectorAll("[data-rater]").forEach((r => {
            const a = {
                reverse: e("phoenixIsRTL"),
                starSize: 32,
                step: .5,
                element: r,
                rateCallback(t, e) {
                    this.setRating(t),
                    e();
                },
                ...t(r, "rater")
            };
            return window.raterJs(a)
        }
        ));
    }
    ;

    const responsiveNavItemsInit = () => {
        const {resize: e} = window.phoenix.utils
          , t = "[data-nav-item]"
          , l = "[data-navbar]"
          , o = "[data-more-item]"
          , i = "[data-category-list]"
          , n = "[data-category-btn]"
          , s = document.querySelector(l)
          , a = () => {
            const e = s.clientWidth
              , l = s.querySelector(o)
              , i = l.clientWidth
              , a = e - i
              , r = s.querySelectorAll(t)
              , c = s.querySelector(n)?.clientWidth;
            let d = 0;
            l.style.display = "none",
            r.forEach((e => {
                const t = e.clientWidth;
                if (d += t,
                d + (c || 0) + i > a && !e.classList.contains("dropdown")) {
                    l.style.display = "block",
                    e.style.display = "none";
                    const t = e.firstChild.cloneNode(!0);
                    s.querySelector(".category-list").appendChild(t);
                }
            }
            ));
            s.querySelectorAll(".dropdown-menu .nav-link").forEach((e => {
                e.classList.remove("nav-link"),
                e.classList.add("dropdown-item");
            }
            ));
        }
        ;
        if (s) {
            window.addEventListener("load", ( () => {
                a();
            }
            )),
            e(( () => {
                const e = s.querySelectorAll(t)
                  , l = s.querySelectorAll(i);
                e.forEach((e => e.removeAttribute("style"))),
                l.forEach((e => e.innerHTML = "")),
                a();
            }
            ));
            const l = s.querySelectorAll(".nav-link");
            s.addEventListener("click", (function(e) {
                for (let e = 0; e < l.length; e++)
                    l[e].classList.remove("active");
                e.target.closest("li") && e.target.closest("li").classList.add("active");
            }
            ));
        }
    }
    ;

    const searchInit = () => {
        const e = '[data-bs-dismiss="search"]'
          , t = '[data-bs-toggle="dropdown"]'
          , s = ".dropdown-menu"
          , r = ".search-box"
          , c = ".search-input"
          , o = '[data-bs-toggle="search"]'
          , a = "show"
          , n = "aria-expanded"
          , d = "click"
          , l = "focus"
          , u = "show.bs.dropdown"
          , i = "search.close"
          , h = e => {
            const t = e.querySelector(o)
              , r = e.querySelector(s);
            t && r && (t.setAttribute(n, "false"),
            t.classList.remove(a),
            r.classList.remove(a));
        }
          , v = document.querySelectorAll(r)
          , E = () => {
            v.forEach(h);
        }
        ;
        v.forEach((t => {
            const r = t.querySelector(c)
              , u = t.querySelector(e)
              , v = t.querySelector(s);
            r && r.addEventListener(l, ( () => {
                E();
                const e = t.querySelector(o);
                e && v && (e.setAttribute(n, "true"),
                e.classList.add(a),
                v.classList.add(a));
            }
            )),
            document.addEventListener(d, ( ({target: e}) => {
                !t.contains(e) && h(t);
            }
            )),
            u && u.addEventListener(d, (e => {
                h(t),
                r.value = "";
                const s = new CustomEvent(i);
                e.currentTarget.dispatchEvent(s);
            }
            ));
        }
        )),
        document.querySelectorAll(t).forEach((e => {
            e.addEventListener(u, ( () => {
                E();
            }
            ));
        }
        ));
    }
    ;

    const simplebarInit = () => {
        Array.from(document.querySelectorAll(".scrollbar-overlay")).forEach((r => new window.SimpleBar(r)));
    }
    ;

    const sortableInit = () => {
        const {getData: e} = window.phoenix.utils
          , o = document.querySelectorAll("[data-sortable]")
          , t = {
            animation: 150,
            group: {
                name: "shared"
            },
            delay: 100,
            delayOnTouchOnly: !0,
            forceFallback: !0,
            onStart() {
                document.body.classList.add("sortable-dragging");
            },
            onEnd() {
                document.body.classList.remove("sortable-dragging");
            }
        };
        o.forEach((o => {
            const a = e(o, "sortable")
              , n = window._.merge(t, a);
            return window.Sortable.create(o, n)
        }
        ));
    }
    ;

    const supportChatInit = () => {
        const t = document.querySelector(".support-chat")
          , o = document.querySelectorAll(".btn-support-chat")
          , c = document.querySelector(".support-chat-container")
          , {phoenixSupportChat: s} = window.config.config;
        s && c?.classList.add("show"),
        o && o.forEach((s => {
            s.addEventListener("click", ( () => {
                t.classList.toggle("show-chat"),
                o[o.length - 1].classList.toggle("btn-chat-close"),
                c.classList.add("show");
            }
            ));
        }
        ));
    }
    ;

    const swiperInit = () => {
        const {getData: e} = window.phoenix.utils
          , t = document.querySelectorAll(".swiper-theme-container");
        t && t.forEach((t => {
            const r = t.querySelector("[data-swiper]")
              , i = e(r, "swiper")
              , n = i.thumb;
            let s;
            if (n) {
                const e = r.querySelectorAll("img");
                let t = "";
                e.forEach((e => {
                    t += `\n          <div class='swiper-slide'>\n            <img class='img-fluid rounded mt-2' src=${e.src} alt=''/>\n          </div>\n        `;
                }
                ));
                const i = document.createElement("div");
                if (i.setAttribute("class", "swiper thumb"),
                i.innerHTML = `<div class='swiper-wrapper'>${t}</div>`,
                n.parent) {
                    document.querySelector(n.parent).parentNode.appendChild(i);
                } else
                    r.parentNode.appendChild(i);
                s = new window.Swiper(i,n);
            }
            const o = t.querySelector(".swiper-nav");
            new window.Swiper(r,{
                ...i,
                navigation: {
                    nextEl: o?.querySelector(".swiper-button-next"),
                    prevEl: o?.querySelector(".swiper-button-prev")
                },
                thumbs: {
                    swiper: s
                }
            });
            document.querySelector(".swiper-slider-gallery") && window.addEventListener("resize", ( () => {
                s.update();
            }
            ));
        }
        ));
    }
    ;

    const {config: config} = window.config
      , initialDomSetup = e => {
        const {getData: t, getItemFromStore: a, getSystemTheme: o} = window.phoenix.utils;
        e && e.querySelectorAll("[data-theme-control]").forEach((e => {
            const n = t(e, "theme-control")
              , r = a(n);
            "phoenixNavbarTopShape" === n && "dual-nav" === a("phoenixNavbarPosition") && e.setAttribute("disabled", !0);
            const c = a("phoenixNavbarPosition");
            if ("phoenixNavbarVerticalStyle" === n && ("horizontal" === c || "dual-nav" === c) && e.setAttribute("disabled", !0),
            "checkbox" === e.type)
                "phoenixTheme" === n ? ("auto" === r ? "dark" === o() : "dark" === r) && e.setAttribute("checked", !0) : r && e.setAttribute("checked", !0);
            else if ("radio" === e.type && "phoenixNavbarVerticalStyle" === n)
                "darker" === r && "darker" === e.value && e.setAttribute("checked", !0),
                "default" === r && "default" === e.value && e.setAttribute("checked", !0);
            else if ("radio" === e.type && "phoenixNavbarTopShape" === n)
                "slim" === r && "slim" === e.value && e.setAttribute("checked", !0),
                "default" === r && "default" === e.value && e.setAttribute("checked", !0);
            else if ("radio" === e.type && "phoenixNavbarTopStyle" === n)
                "darker" === r && "darker" === e.value && e.setAttribute("checked", !0),
                "default" === r && "default" === e.value && e.setAttribute("checked", !0);
            else if ("radio" === e.type && "phoenixTheme" === n) {
                r === e.value && e.setAttribute("checked", !0);
            } else if ("radio" === e.type && "phoenixNavbarPosition" === n) {
                r === e.value && e.setAttribute("checked", !0);
            } else {
                r === e.value && e.classList.add("active");
            }
        }
        ));
    }
      , changeTheme = e => {
        const {getData: t, getItemFromStore: a, getSystemTheme: o} = window.phoenix.utils;
        e.querySelectorAll('[data-theme-control = "phoenixTheme"]').forEach((e => {
            const n = t(e, "theme-control")
              , r = a(n);
            "checkbox" === e.type ? "auto" === r ? "dark" === o() ? e.checked = !0 : e.checked = !1 : e.checked = "dark" === r : "radio" === e.type ? r === e.value ? e.checked = !0 : e.checked = !1 : r === e.value ? e.classList.add("active") : e.classList.remove("active");
        }
        ));
    }
      , handleThemeDropdownIcon = e => {
        document.querySelectorAll("[data-theme-dropdown-toggle-icon]").forEach((t => {
            t.classList.toggle("d-none", e !== t.getAttribute("data-theme-dropdown-toggle-icon"));
        }
        ));
    }
    ;
    handleThemeDropdownIcon(localStorage.getItem("phoenixTheme"));
    const themeControl = () => {
        const {getData: e, getItemFromStore: t, getSystemTheme: a} = window.phoenix.utils
          , o = t => {
            const a = e(t, "page-url");
            a ? window.location.replace(a) : window.location.reload();
        }
          , n = new DomNode(document.body)
          , r = document.querySelector(".navbar-vertical")
          , c = document.querySelector(".navbar-top")
          , i = document.querySelector(".support-chat-container");
        initialDomSetup(n.node),
        n.on("click", (e => {
            const d = new DomNode(e.target);
            if (d.data("theme-control")) {
                const l = d.data("theme-control");
                let h = e.target["checkbox" === e.target.type ? "checked" : "value"];
                "phoenixTheme" === l && "boolean" == typeof h && (h = h ? "dark" : "light"),
                config.hasOwnProperty(l) && window.config.set({
                    [l]: h
                });
                switch ("true" === new URLSearchParams(window.location.search).get("theme-control") && window.history.replaceState(null, null, window.location.pathname),
                l) {
                case "phoenixTheme":
                    {
                        document.documentElement.setAttribute("data-bs-theme", "auto" === h ? a() : h);
                        const t = new CustomEvent("clickControl",{
                            detail: {
                                control: l,
                                value: h
                            }
                        });
                        e.currentTarget.dispatchEvent(t),
                        changeTheme(n.node);
                        break
                    }
                case "phoenixNavbarVerticalStyle":
                    r.setAttribute("data-navbar-appearance", "default"),
                    "default" !== h && r.setAttribute("data-navbar-appearance", "darker");
                    break;
                case "phoenixNavbarTopStyle":
                    c.setAttribute("data-navbar-appearance", "default"),
                    "default" !== h && c.setAttribute("data-navbar-appearance", "darker");
                    break;
                case "phoenixNavbarTopShape":
                    "dual-nav" === t("phoenixNavbarPosition") ? el.setAttribute("disabled", !0) : o(d.node);
                    break;
                case "phoenixNavbarPosition":
                    o(d.node);
                    break;
                case "phoenixIsRTL":
                    window.config.set({
                        phoenixIsRTL: d.node.checked
                    }),
                    window.location.reload();
                    break;
                case "phoenixSupportChat":
                    i?.classList.remove("show"),
                    h && i?.classList.add("show");
                    break;
                case "reset":
                    window.config.reset(),
                    window.location.reload();
                    break;
                default:
                    window.location.reload();
                }
            }
        }
        )),
        n.on("clickControl", ( ({detail: {control: e, value: t}}) => {
            "phoenixTheme" === e && handleThemeDropdownIcon(t);
        }
        ));
    }
    ;

    const {merge: merge} = window._
      , tinymceInit = () => {
        const {getColor: e, getData: t, getItemFromStore: n} = window.phoenix.utils
          , o = document.querySelectorAll("[data-tinymce]");
        if (window.tinymce) {
            o.forEach((o => {
                const i = t(o, "tinymce")
                  , r = merge({
                    selector: ".tinymce",
                    height: "50vh",
                    skin: "oxide",
                    menubar: !1,
                    content_style: `\n        .mce-content-body { \n          color: ${e("emphasis-color")};\n          background-color: ${e("tinymce-bg")};\n        }\n        .mce-content-body[data-mce-placeholder]:not(.mce-visualblocks)::before {\n          color: ${e("quaternary-color")};\n          font-weight: 400;\n          font-size: 12.8px;\n        }\n        `,
                    statusbar: !1,
                    plugins: "link,image,lists,table,media",
                    theme_advanced_toolbar_align: "center",
                    directionality: n("phoenixIsRTL") ? "rtl" : "ltr",
                    toolbar: [{
                        name: "history",
                        items: ["undo", "redo"]
                    }, {
                        name: "formatting",
                        items: ["bold", "italic", "underline", "strikethrough"]
                    }, {
                        name: "alignment",
                        items: ["alignleft", "aligncenter", "alignright", "alignjustify"]
                    }, {
                        name: "list",
                        items: ["numlist", "bullist"]
                    }, {
                        name: "link",
                        items: ["link"]
                    }],
                    setup: e => {
                        e.on("focus", ( () => {
                            document.querySelector(".tox-sidebar-wrap").classList.add("editor-focused");
                        }
                        )),
                        e.on("blur", ( () => {
                            document.querySelector(".tox-sidebar-wrap").classList.remove("editor-focused");
                        }
                        ));
                    }
                }, i);
                window.tinymce.init(r);
            }
            ));
            const i = document.body;
            i && i.addEventListener("clickControl", ( ({detail: {control: t}}) => {
                "phoenixTheme" === t && o.forEach((t => {
                    window.tinymce.get(t.id).dom.addStyle(`.mce-content-body{\n                  color: ${e("emphasis-color")} !important;\n                  background-color: ${e("tinymce-bg")} !important;\n                }`);
                }
                ));
            }
            ));
        }
    }
    ;

    const toastInit = () => {
        [].slice.call(document.querySelectorAll(".toast")).map((t => new bootstrap.Toast(t)));
        const t = document.getElementById("liveToastBtn");
        if (t) {
            const e = new bootstrap.Toast(document.getElementById("liveToast"));
            t.addEventListener("click", ( () => {
                e && e.show();
            }
            ));
        }
    }
    ;

    const todoOffcanvasInit = () => {
        const {getData: o} = window.phoenix.utils
          , t = document.querySelectorAll("[data-event-propagation-prevent]");
        t && t.forEach((o => {
            o.addEventListener("click", (o => {
                o.stopPropagation();
            }
            ));
        }
        ));
        const e = document.querySelector(".todo-list");
        if (e) {
            e.querySelectorAll("[data-todo-offcanvas-toogle]").forEach((t => {
                const a = o(t, "todo-offcanvas-target")
                  , n = e.querySelector(`#${a}`)
                  , c = new window.bootstrap.Offcanvas(n,{
                    backdrop: !0
                });
                t.addEventListener("click", ( () => {
                    c.show();
                }
                ));
            }
            ));
        }
    }
    ;

    const tooltipInit = () => {
        [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((t => new bootstrap.Tooltip(t,{
            trigger: "hover"
        })));
    }
    ;

    const wizardInit = () => {
        const {getData: e} = window.phoenix.utils
          , t = "[data-theme-wizard]"
          , a = "[data-wizard-step]"
          , d = "[data-wizard-form]"
          , s = "[data-wizard-password]"
          , r = "[data-wizard-confirm-password]"
          , l = "[data-wizard-next-btn]"
          , o = "[data-wizard-prev-btn]"
          , n = "[data-wizard-footer]"
          , i = "submit"
          , c = "show.bs.tab"
          , u = "shown.bs.tab"
          , w = "click";
        document.querySelectorAll(t).forEach((t => {
            const b = t.querySelectorAll(a)
              , h = t.querySelectorAll(d)
              , m = t.querySelector(s)
              , v = t.querySelector(r)
              , f = t.querySelector(l)
              , p = t.querySelector(o)
              , L = t.querySelector(n)
              , y = new Event(i,{
                bubbles: !0,
                cancelable: !0
            })
              , z = t.hasAttribute("data-wizard-modal-disabled")
              , g = Array.from(b).map((e => window.bootstrap.Tab.getOrCreateInstance(e)));
            let E = 0
              , q = null;
            h.forEach((e => {
                e.addEventListener(i, (t => (t.preventDefault(),
                e.classList.contains("needs-validation") && (m && v && (m.value !== v.value ? v.setCustomValidity("Invalid field.") : v.setCustomValidity("")),
                !e.checkValidity()) ? (q.preventDefault(),
                !1) : (E += 1,
                null))));
            }
            )),
            f.addEventListener(w, ( () => {
                E + 1 < g.length && g[E + 1].show();
            }
            )),
            p && p.addEventListener(w, ( () => {
                E -= 1,
                g[E].show();
            }
            )),
            b.length && b.forEach(( (t, a) => {
                t.addEventListener(c, (a => {
                    const d = e(t, "wizard-step");
                    q = a,
                    d > E && h[E].dispatchEvent(y);
                }
                )),
                t.addEventListener(u, ( () => {
                    E = a,
                    E !== b.length - 1 || z || b.forEach((e => {
                        e.setAttribute("data-bs-toggle", "modal"),
                        e.setAttribute("data-bs-target", "#error-modal");
                    }
                    ));
                    for (let e = 0; e < E; e += 1)
                        b[e].classList.add("done"),
                        e > 0 && b[e - 1].classList.add("complete");
                    for (let e = E; e < b.length; e += 1)
                        b[e].classList.remove("done"),
                        e > 0 && b[e - 1].classList.remove("complete");
                    E > b.length - 2 ? L.classList.add("d-none") : L.classList.remove("d-none"),
                    p && (E > 0 && E !== b.length - 1 ? p.classList.remove("d-none") : p.classList.add("d-none"));
                }
                ));
            }
            ));
        }
        ));
    }
    ;

    const faqTabInit = () => {
        const t = document.querySelectorAll("[data-vertical-category-tab]")
          , a = document.querySelector("[data-vertical-category-offcanvas]")
          , e = document.querySelectorAll("[data-category-filter]")
          , c = document.querySelectorAll(".faq-subcategory-tab .nav-item");
        if (a) {
            const e = window.bootstrap.Offcanvas?.getOrCreateInstance(a);
            t.forEach((t => {
                t.addEventListener("click", ( () => {
                    e.hide();
                }
                ));
            }
            ));
        }
        e && e.forEach((t => {
            t.classList.contains("active") && c.forEach((a => {
                a.classList.contains(t.getAttribute("data-category-filter")) || "all" === t.getAttribute("data-category-filter") || a.classList.add("d-none");
            }
            )),
            t.addEventListener("click", ( () => {
                c.forEach((a => {
                    "all" === t.getAttribute("data-category-filter") ? a.classList.remove("d-none") : a.classList.contains(t.getAttribute("data-category-filter")) || a.classList.add("d-none");
                }
                ));
            }
            ));
        }
        ));
    }
    ;

    const twoFAVerificarionInit = () => {
        const e = document.querySelector("[data-2fa-form]")
          , t = e?.querySelectorAll("input[type=number]")
          , o = e?.querySelector("button[type=submit]");
        if (e) {
            window.addEventListener("load", ( () => t[0].focus()));
            const e = 6;
            t.forEach(( (r, u) => {
                r.addEventListener("keyup", (r => {
                    const {value: i} = r.target;
                    i ? [...i].slice(0, e).forEach(( (e, o) => {
                        t && t[u + o] && (t[u + o].value = e,
                        t[u + o + 1]?.focus());
                    }
                    )) : (t[u].value = "",
                    t[u - 1]?.focus());
                    const n = [...t].reduce(( (e, t) => e + (t?.value || "")), "");
                    e === n.length ? o.removeAttribute("disabled") : o.setAttribute("disabled", !0);
                }
                ));
            }
            ));
        }
    }
    ;

    const mapboxInit = () => {
        const {getData: e} = window.phoenix.utils
          , o = document.querySelectorAll(".mapbox-container")
          , t = document.querySelectorAll("[data-tab-map-container]");
        o && o.forEach((o => {
            window.mapboxgl.accessToken = "pk.eyJ1IjoidGhlbWV3YWdvbiIsImEiOiJjbGhmNW5ybzkxcmoxM2RvN2RmbW1nZW90In0.hGIvQ890TYkZ948MVrsMIQ";
            const n = o.querySelector("[data-mapbox]");
            if (n) {
                const o = e(n, "mapbox")
                  , r = document.querySelector(".zoomIn")
                  , a = document.querySelector(".zoomOut")
                  , l = document.querySelector(".fullScreen")
                  , c = {
                    default: "mapbox://styles/mapbox/light-v11",
                    light: "mapbox://styles/themewagon/clj57pads001701qo25756jtw",
                    dark: "mapbox://styles/themewagon/cljzg9juf007x01pk1bepfgew"
                }
                  , m = new window.mapboxgl.Map({
                    ...o,
                    container: "mapbox",
                    style: c[window.config.config.phoenixTheme]
                });
                o.center && new window.mapboxgl.Marker({
                    color: getColor("danger")
                }).setLngLat(o.center).addTo(m),
                r && a && (r.addEventListener("click", ( () => m.zoomIn())),
                a.addEventListener("click", ( () => m.zoomOut()))),
                l && l.addEventListener("click", ( () => m.getContainer().requestFullscreen())),
                t.forEach((e => {
                    e.addEventListener("shown.bs.tab", ( () => {
                        m.resize();
                    }
                    ));
                }
                ));
            }
        }
        ));
    }
      , themeController = document.body;
    themeController && themeController.addEventListener("clickControl", ( () => {
        mapboxInit();
    }
    ));

    const typedTextInit = () => {
        const e = document.querySelectorAll(".typed-text");
        e.length && window.Typed && e.forEach((e => new window.Typed(e,{
            strings: getData(e, "typedText"),
            typeSpeed: 70,
            backSpeed: 70,
            loop: !0,
            backDelay: 1e3
        })));
    }
    ;

    const priceTierFormInit = () => {
        const e = document.querySelectorAll("[data-form-price-tier]");
        e && e.forEach((e => {
            const t = e.querySelector("[data-price-toggle]")
              , r = e.querySelectorAll("[data-pricing]")
              , a = e.querySelector("[data-pricing-collapse]")
              , c = new window.bootstrap.Collapse(a,{
                toggle: !1
            });
            t.addEventListener("change", (t => {
                r[0].checked = !0,
                t.target.checked ? e.classList.add("active") : (e.classList.remove("active"),
                c.hide());
            }
            )),
            r.forEach((e => {
                e.addEventListener("change", (e => {
                    "paid" === e.target.value ? c.show() : c.hide();
                }
                ));
            }
            ));
        }
        ));
    }
    ;

    const nouisliderInit = () => {
        const {getData: n} = window.phoenix.utils;
        if (window.noUiSlider) {
            document.querySelectorAll("[data-nouislider]").forEach((t => {
                const e = n(t, "nouislider")
                  , o = n(t, "nouislider-values");
                let i;
                i = o && o.length ? {
                    connect: !0,
                    step: 1,
                    range: {
                        min: 0,
                        max: o.length - 1
                    },
                    tooltips: !0,
                    format: {
                        to: n => o[Math.round(n)],
                        from: n => o.indexOf(n)
                    }
                } : {
                    start: [10],
                    connect: [!0, !1],
                    step: 1,
                    range: {
                        min: [0],
                        max: [100]
                    },
                    tooltips: !0
                };
                const r = window._.merge(i, e);
                window.noUiSlider.create(t, {
                    ...r
                });
            }
            ));
        }
    }
    ;

    const collapseAllInit = () => {
        const e = document.querySelector("[data-collapse-all]")
          , l = document.querySelector("[data-btn-collapse-all]");
        if (e) {
            e.querySelectorAll(".collapse").forEach((e => {
                const t = window.bootstrap.Collapse.getOrCreateInstance(e, {
                    toggle: !1
                });
                l.addEventListener("click", ( () => {
                    t.hide();
                }
                ));
            }
            ));
        }
    }
    ;

    const playOnHoverInit = () => {
        const e = (e, t) => {
            e && t && (e.classList.add("d-block"),
            t.classList.add("d-none"),
            e.classList.remove("d-none"),
            t.classList.remove("d-block"));
        }
          , t = (e, t, o) => {
            e.play(),
            ( (e, t) => {
                e && t && (e.classList.add("d-none"),
                t.classList.add("d-block"),
                e.classList.remove("d-block"),
                t.classList.remove("d-none"));
            }
            )(t, o);
        }
          , o = (t, o, a) => {
            t.pause(),
            e(o, a);
        }
          , a = (e, a) => {
            const l = e.querySelector("[data-play-on-hover]")
              , n = e.querySelector("[data-video-controller]");
            if (n) {
                const e = n.querySelector(".play-icon")
                  , s = n.querySelector(".pause-icon");
                "play" === a ? t(l, e, s) : o(l, e, s);
            }
        }
        ;
        document.addEventListener("mouseover", (e => {
            if (e.target.closest("[data-play-on-hover]")) {
                const o = e.target.closest("[data-play-on-hover]");
                t(o, null, null);
            } else if (e.target.closest("[data-play-on-container-hover]")) {
                const t = e.target.closest("[data-play-on-container-hover]");
                a(t, "play");
            }
        }
        )),
        document.addEventListener("mouseout", (e => {
            if (e.target.closest("[data-play-on-hover]")) {
                const t = e.target.closest("[data-play-on-hover]");
                o(t, null, null);
            } else if (e.target.closest("[data-play-on-container-hover]")) {
                const t = e.target.closest("[data-play-on-container-hover]");
                a(t, "pause");
            }
        }
        )),
        document.addEventListener("touchstart", (e => {
            if (e.target.closest("[data-play-on-hover]")) {
                const o = e.target.closest("[data-play-on-hover]");
                t(o, null, null);
            } else if (e.target.closest("[data-play-on-container-hover]")) {
                const t = e.target.closest("[data-play-on-container-hover]");
                a(t, "play");
            }
        }
        )),
        document.addEventListener("touchend", (e => {
            if (e.target.closest("[data-play-on-hover]")) {
                const t = e.target.closest("[data-play-on-hover]");
                o(t, null, null);
            } else if (e.target.closest("[data-play-on-container-hover]")) {
                const t = e.target.closest("[data-play-on-container-hover]");
                a(t, "pause");
            }
        }
        )),
        document.addEventListener("click", (e => {
            if (e.target.closest("[data-video-controller]")) {
                const a = e.target.closest("[data-video-controller]")
                  , l = a.closest("[data-play-on-container-hover]").querySelector("[data-play-on-hover]")
                  , n = a.querySelector(".play-icon")
                  , s = a.querySelector(".pause-icon");
                l.paused ? t(l, n, s) : o(l, n, s);
            }
        }
        ));
        document.querySelectorAll("[data-play-on-container-hover]").forEach((t => {
            const o = t.querySelector("[data-play-on-hover]")
              , a = t.querySelector("[data-video-controller]");
            if (a) {
                const t = a.querySelector(".play-icon")
                  , l = a.querySelector(".pause-icon");
                o.paused && e(t, l);
            }
        }
        ));
    }
    ;

    const passwordToggleInit = () => {
        const t = document.querySelectorAll("[data-password]");
        t && t.forEach((t => {
            const s = t.querySelector("[data-password-input]")
              , e = t.querySelector("[data-password-toggle]");
            e.addEventListener("click", ( () => {
                "password" === s.type ? (s.setAttribute("type", "text"),
                e.classList.add("show-password")) : (s.setAttribute("type", "password"),
                e.classList.remove("show-password"));
            }
            ));
        }
        ));
    }
    ;

    const treeviewInit = () => {
        const e = "change"
          , t = "show.bs.collapse"
          , r = "hide.bs.collapse"
          , s = ".treeview > li > .treeview-row,.treeview-list.collapse-show > li > .treeview-row"
          , o = ".treeview"
          , a = ".treeview-list"
          , l = "input"
          , i = ".treeview-list-item"
          , c = ":scope > li > .collapse.collapse-show"
          , n = "treeview"
          , d = "treeview-list"
          , w = "treeview-border"
          , p = "treeview-border-transparent"
          , v = "collapse-show"
          , m = "collapse-hidden"
          , h = "treeview-row"
          , f = "treeview-row-odd"
          , u = "treeview-row-even"
          , E = document.querySelectorAll(o)
          , L = e => {
            Array.from(e.querySelectorAll(s)).filter((e => {
                let t = !0;
                for (; e.parentElement; ) {
                    if (e.parentElement.classList.contains(m)) {
                        t = !1;
                        break
                    }
                    e = e.parentElement;
                }
                return t
            }
            )).forEach(( (e, t) => {
                t % 2 == 0 ? (e.classList.add(u),
                e.classList.remove(f)) : (e.classList.add(f),
                e.classList.remove(u));
            }
            ));
        }
        ;
        E.length && E.forEach((s => {
            const o = getData(s, "options")
              , f = o?.striped
              , u = o?.select;
            f && L(s);
            const E = Array.from(s.querySelectorAll(a));
            Array.from(s.querySelectorAll(i)).forEach((e => {
                const t = document.createElement("div");
                t.setAttribute("class", h),
                e.prepend(t);
            }
            )),
            E.forEach((o => {
                const a = o.id;
                if (f || o.classList.add(w),
                o.addEventListener(t, (e => {
                    e.target.classList.remove(m),
                    e.target.classList.add(v),
                    f && L(s);
                }
                )),
                o.addEventListener(r, (e => {
                    if (e.target.classList.add(m),
                    e.target.classList.remove(v),
                    f)
                        L(s);
                    else {
                        const t = e.composedPath()[2].querySelectorAll(c);
                        e.composedPath()[2].classList.contains(n) || 0 !== t.length || e.composedPath()[2].classList.remove(p);
                    }
                }
                )),
                "true" === o.dataset.show) {
                    const e = [o];
                    for (; o.parentElement; )
                        o.parentElement.classList.contains(d) && e.unshift(o.parentElement),
                        o = o.parentElement;
                    e.forEach((e => {
                        new window.bootstrap.Collapse(e,{
                            show: !0
                        });
                    }
                    ));
                }
                if (u) {
                    s.querySelector(`input[data-target='#${a}']`).addEventListener(e, (e => {
                        Array.from(s.querySelector(`#${a}`).querySelectorAll(l)).forEach((t => {
                            t.checked = e.target.checked;
                        }
                        ));
                    }
                    ));
                }
            }
            ));
        }
        ));
    }
    ;

    window.initMap = initMap,
    docReady(detectorInit),
    docReady(simplebarInit),
    docReady(toastInit),
    docReady(tooltipInit),
    docReady(featherIconsInit),
    docReady(basicEchartsInit),
    docReady(bulkSelectInit),
    docReady(listInit),
    docReady(anchorJSInit),
    docReady(popoverInit),
    docReady(formValidationInit),
    docReady(docComponentInit),
    docReady(swiperInit),
    docReady(productDetailsInit),
    docReady(ratingInit),
    docReady(quantityInit),
    docReady(dropzoneInit),
    docReady(choicesInit),
    docReady(tinymceInit),
    docReady(responsiveNavItemsInit),
    docReady(flatpickrInit),
    docReady(iconCopiedInit),
    docReady(isotopeInit),
    docReady(bigPictureInit),
    docReady(countupInit),
    docReady(phoenixOffcanvasInit),
    docReady(todoOffcanvasInit),
    docReady(wizardInit),
    docReady(glightboxInit),
    docReady(themeControl),
    docReady(searchInit),
    docReady(handleNavbarVerticalCollapsed),
    docReady(navbarInit),
    docReady(navbarComboInit),
    docReady(fullCalendarInit),
    docReady(picmoInit),
    docReady(modalInit),
    docReady(lottieInit),
    docReady(navbarShadowOnScrollInit),
    docReady(dropdownOnHover),
    docReady(supportChatInit),
    docReady(sortableInit),
    docReady(copyLink),
    docReady(randomColorInit),
    docReady(faqTabInit),
    docReady(twoFAVerificarionInit),
    docReady(mapboxInit),
    docReady(typedTextInit),
    docReady(priceTierFormInit),
    docReady(nouisliderInit),
    docReady(collapseAllInit),
    docReady(playOnHoverInit),
    docReady(passwordToggleInit),
    docReady(treeviewInit),
    docReady(( () => {
        const t = document.querySelector("[data-selected-rows]")
          , o = document.getElementById("selectedRows");
        if (t) {
            const e = document.getElementById("bulk-select-example")
              , i = window.phoenix.BulkSelect.getInstance(e);
            t.addEventListener("click", ( () => {
                o.innerHTML = JSON.stringify(i.getSelectedRows(), void 0, 2);
            }
            ));
        }
    }
    ));
    var phoenix = {
        utils: utils,
        BulkSelect: BulkSelect
    };

    return phoenix;

}
));
//# sourceMappingURL=phoenix.js.map
