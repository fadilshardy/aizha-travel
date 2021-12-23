(() => {
    "use strict";
    function e(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t);
    }
    function t(e) {
        return e[e.length - 1];
    }
    function i(e, ...t) {
        return (
            t.forEach((t) => {
                e.includes(t) || e.push(t);
            }),
            e
        );
    }
    function a(e, t) {
        return e ? e.split(t) : [];
    }
    function r(e, t, i) {
        return (void 0 === t || e >= t) && (void 0 === i || e <= i);
    }
    function s(e, t, i) {
        return e < t ? t : e > i ? i : e;
    }
    function n(e, t, i = {}, a = 0, r = "") {
        r += `<${Object.keys(i).reduce((e, t) => {
            let r = i[t];
            return "function" == typeof r && (r = r(a)), `${e} ${t}="${r}"`;
        }, e)}></${e}>`;
        const s = a + 1;
        return s < t ? n(e, t, i, s, r) : r;
    }
    function d(e) {
        return e.replace(/>\s+/g, ">").replace(/\s+</, "<");
    }
    function o(e) {
        return new Date(e).setHours(0, 0, 0, 0);
    }
    function c() {
        return new Date().setHours(0, 0, 0, 0);
    }
    function l(...e) {
        switch (e.length) {
            case 0:
                return c();
            case 1:
                return o(e[0]);
        }
        const t = new Date(0);
        return t.setFullYear(...e), t.setHours(0, 0, 0, 0);
    }
    function h(e, t) {
        const i = new Date(e);
        return i.setDate(i.getDate() + t);
    }
    function u(e, t) {
        const i = new Date(e),
            a = i.getMonth() + t;
        let r = a % 12;
        r < 0 && (r += 12);
        const s = i.setMonth(a);
        return i.getMonth() !== r ? i.setDate(0) : s;
    }
    function g(e, t) {
        const i = new Date(e),
            a = i.getMonth(),
            r = i.setFullYear(i.getFullYear() + t);
        return 1 === a && 2 === i.getMonth() ? i.setDate(0) : r;
    }
    function f(e, t) {
        return (e - t + 7) % 7;
    }
    function p(e, t, i = 0) {
        const a = new Date(e).getDay();
        return h(e, f(t, i) - f(a, i));
    }
    function b(e, t) {
        const i = new Date(e).getFullYear();
        return Math.floor(i / t) * t;
    }
    const m = /dd?|DD?|mm?|MM?|yy?(?:yy)?/,
        y = /[\s!-/:-@[-`{-~年月日]+/;
    let w = {};
    const k = {
            y: (e, t) => new Date(e).setFullYear(parseInt(t, 10)),
            m(e, t, i) {
                const a = new Date(e);
                let r = parseInt(t, 10) - 1;
                if (isNaN(r)) {
                    if (!t) return NaN;
                    const e = t.toLowerCase(),
                        a = (t) => t.toLowerCase().startsWith(e);
                    if (
                        ((r = i.monthsShort.findIndex(a)) < 0 &&
                            (r = i.months.findIndex(a)),
                        r < 0)
                    )
                        return NaN;
                }
                return (
                    a.setMonth(r),
                    a.getMonth() !==
                    (function e(t) {
                        return t > -1 ? t % 12 : e(t + 12);
                    })(r)
                        ? a.setDate(0)
                        : a.getTime()
                );
            },
            d: (e, t) => new Date(e).setDate(parseInt(t, 10)),
        },
        v = {
            d: (e) => e.getDate(),
            dd: (e) => D(e.getDate(), 2),
            D: (e, t) => t.daysShort[e.getDay()],
            DD: (e, t) => t.days[e.getDay()],
            m: (e) => e.getMonth() + 1,
            mm: (e) => D(e.getMonth() + 1, 2),
            M: (e, t) => t.monthsShort[e.getMonth()],
            MM: (e, t) => t.months[e.getMonth()],
            y: (e) => e.getFullYear(),
            yy: (e) => D(e.getFullYear(), 2).slice(-2),
            yyyy: (e) => D(e.getFullYear(), 4),
        };
    function D(e, t) {
        return e.toString().padStart(t, "0");
    }
    function x(e) {
        if ("string" != typeof e) throw new Error("Invalid date format.");
        if (e in w) return w[e];
        const i = e.split(m),
            a = e.match(new RegExp(m, "g"));
        if (0 === i.length || !a) throw new Error("Invalid date format.");
        const r = a.map((e) => v[e]),
            s = Object.keys(k).reduce((e, t) => {
                return (
                    a.find((e) => "D" !== e[0] && e[0].toLowerCase() === t) &&
                        e.push(t),
                    e
                );
            }, []);
        return (w[e] = {
            parser(e, t) {
                const i = e.split(y).reduce((e, t, i) => {
                    if (t.length > 0 && a[i]) {
                        const r = a[i][0];
                        "M" === r ? (e.m = t) : "D" !== r && (e[r] = t);
                    }
                    return e;
                }, {});
                return s.reduce((e, a) => {
                    const r = k[a](e, i[a], t);
                    return isNaN(r) ? e : r;
                }, c());
            },
            formatter: (e, a) =>
                r.reduce((t, r, s) => t + `${i[s]}${r(e, a)}`, "") + t(i),
        });
    }
    function M(e, t, i) {
        if (e instanceof Date || "number" == typeof e) {
            const t = o(e);
            return isNaN(t) ? void 0 : t;
        }
        if (e) {
            if ("today" === e) return c();
            if (t && t.toValue) {
                const a = t.toValue(e, t, i);
                return isNaN(a) ? void 0 : o(a);
            }
            return x(t).parser(e, i);
        }
    }
    function S(e, t, i) {
        if (isNaN(e) || (!e && 0 !== e)) return "";
        const a = "number" == typeof e ? new Date(e) : e;
        return t.toDisplay ? t.toDisplay(a, t, i) : x(t).formatter(a, i);
    }
    const O = new WeakMap(),
        { addEventListener: C, removeEventListener: E } = EventTarget.prototype;
    function F(e, t) {
        let i = O.get(e);
        i || ((i = []), O.set(e, i)),
            t.forEach((e) => {
                C.call(...e), i.push(e);
            });
    }
    function V(e) {
        let t = O.get(e);
        t &&
            (t.forEach((e) => {
                E.call(...e);
            }),
            O.delete(e));
    }
    if (!Event.prototype.composedPath) {
        const e = (t, i = []) => {
            let a;
            return (
                i.push(t),
                t.parentNode
                    ? (a = t.parentNode)
                    : t.host
                    ? (a = t.host)
                    : t.defaultView && (a = t.defaultView),
                a ? e(a, i) : i
            );
        };
        Event.prototype.composedPath = function () {
            return e(this.target);
        };
    }
    function A(e, t) {
        const i = "function" == typeof t ? t : (e) => e.matches(t);
        return (function e(t, i, a, r = 0) {
            const s = t[r];
            return i(s)
                ? s
                : s !== a && s.parentElement
                ? e(t, i, a, r + 1)
                : void 0;
        })(e.composedPath(), i, e.currentTarget);
    }
    const L = {
            en: {
                days: [
                    "Sunday",
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                ],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                months: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ],
                monthsShort: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                today: "Today",
                clear: "Clear",
                titleFormat: "MM y",
            },
        },
        N = {
            autohide: !1,
            beforeShowDay: null,
            beforeShowDecade: null,
            beforeShowMonth: null,
            beforeShowYear: null,
            calendarWeeks: !1,
            clearBtn: !1,
            dateDelimiter: ",",
            datesDisabled: [],
            daysOfWeekDisabled: [],
            daysOfWeekHighlighted: [],
            defaultViewDate: void 0,
            disableTouchKeyboard: !1,
            format: "mm/dd/yyyy",
            language: "en",
            maxDate: null,
            maxNumberOfDates: 1,
            maxView: 3,
            minDate: null,
            nextArrow:
                '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
            orientation: "auto",
            pickLevel: 0,
            prevArrow:
                '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>',
            showDaysOfWeek: !0,
            showOnClick: !0,
            showOnFocus: !0,
            startView: 0,
            title: "",
            todayBtn: !1,
            todayBtnMode: 0,
            todayHighlight: !1,
            updateOnBlur: !0,
            weekStart: 0,
        },
        B = document.createRange();
    function Y(e) {
        return B.createContextualFragment(e);
    }
    function W(e) {
        "none" !== e.style.display &&
            (e.style.display && (e.dataset.styleDisplay = e.style.display),
            (e.style.display = "none"));
    }
    function H(e) {
        "none" === e.style.display &&
            (e.dataset.styleDisplay
                ? ((e.style.display = e.dataset.styleDisplay),
                  delete e.dataset.styleDisplay)
                : (e.style.display = ""));
    }
    function _(e) {
        e.firstChild && (e.removeChild(e.firstChild), _(e));
    }
    const { language: K, format: j, weekStart: T } = N;
    function $(e, t) {
        return e.length < 6 && t >= 0 && t < 7 ? i(e, t) : e;
    }
    function I(e) {
        return (e + 6) % 7;
    }
    function P(e, t, i, a) {
        const r = M(e, t, i);
        return void 0 !== r ? r : a;
    }
    function R(e, t, i = 3) {
        const a = parseInt(e, 10);
        return a >= 0 && a <= i ? a : t;
    }
    function q(t, a) {
        const r = Object.assign({}, t),
            s = {},
            n = a.constructor.locales;
        let {
            format: d,
            language: o,
            locale: c,
            maxDate: h,
            maxView: u,
            minDate: g,
            pickLevel: f,
            startView: p,
            weekStart: b,
        } = a.config || {};
        if (r.language) {
            let e;
            if (
                (r.language !== o &&
                    (n[r.language]
                        ? (e = r.language)
                        : void 0 === n[(e = r.language.split("-")[0])] &&
                          (e = !1)),
                delete r.language,
                e)
            ) {
                o = s.language = e;
                const t = c || n[K];
                (c = Object.assign({ format: j, weekStart: T }, n[K])),
                    o !== K && Object.assign(c, n[o]),
                    (s.locale = c),
                    d === t.format && (d = s.format = c.format),
                    b === t.weekStart &&
                        ((b = s.weekStart = c.weekStart),
                        (s.weekEnd = I(c.weekStart)));
            }
        }
        if (r.format) {
            const e = "function" == typeof r.format.toDisplay,
                t = "function" == typeof r.format.toValue,
                i = m.test(r.format);
            ((e && t) || i) && (d = s.format = r.format), delete r.format;
        }
        let y = g,
            w = h;
        if (
            (void 0 !== r.minDate &&
                ((y = null === r.minDate ? l(0, 0, 1) : P(r.minDate, d, c, y)),
                delete r.minDate),
            void 0 !== r.maxDate &&
                ((w = null === r.maxDate ? void 0 : P(r.maxDate, d, c, w)),
                delete r.maxDate),
            w < y
                ? ((g = s.minDate = w), (h = s.maxDate = y))
                : (g !== y && (g = s.minDate = y),
                  h !== w && (h = s.maxDate = w)),
            r.datesDisabled &&
                ((s.datesDisabled = r.datesDisabled.reduce((e, t) => {
                    const a = M(t, d, c);
                    return void 0 !== a ? i(e, a) : e;
                }, [])),
                delete r.datesDisabled),
            void 0 !== r.defaultViewDate)
        ) {
            const e = M(r.defaultViewDate, d, c);
            void 0 !== e && (s.defaultViewDate = e), delete r.defaultViewDate;
        }
        if (void 0 !== r.weekStart) {
            const e = Number(r.weekStart) % 7;
            isNaN(e) || ((b = s.weekStart = e), (s.weekEnd = I(e))),
                delete r.weekStart;
        }
        if (
            (r.daysOfWeekDisabled &&
                ((s.daysOfWeekDisabled = r.daysOfWeekDisabled.reduce($, [])),
                delete r.daysOfWeekDisabled),
            r.daysOfWeekHighlighted &&
                ((s.daysOfWeekHighlighted = r.daysOfWeekHighlighted.reduce(
                    $,
                    []
                )),
                delete r.daysOfWeekHighlighted),
            void 0 !== r.maxNumberOfDates)
        ) {
            const e = parseInt(r.maxNumberOfDates, 10);
            e >= 0 && ((s.maxNumberOfDates = e), (s.multidate = 1 !== e)),
                delete r.maxNumberOfDates;
        }
        r.dateDelimiter &&
            ((s.dateDelimiter = String(r.dateDelimiter)),
            delete r.dateDelimiter);
        let k = f;
        void 0 !== r.pickLevel && ((k = R(r.pickLevel, 2)), delete r.pickLevel),
            k !== f && (f = s.pickLevel = k);
        let v = u;
        void 0 !== r.maxView && ((v = R(r.maxView, u)), delete r.maxView),
            (v = f > v ? f : v) !== u && (u = s.maxView = v);
        let D = p;
        if (
            (void 0 !== r.startView &&
                ((D = R(r.startView, D)), delete r.startView),
            D < f ? (D = f) : D > u && (D = u),
            D !== p && (s.startView = D),
            r.prevArrow)
        ) {
            const e = Y(r.prevArrow);
            e.childNodes.length > 0 && (s.prevArrow = e.childNodes),
                delete r.prevArrow;
        }
        if (r.nextArrow) {
            const e = Y(r.nextArrow);
            e.childNodes.length > 0 && (s.nextArrow = e.childNodes),
                delete r.nextArrow;
        }
        if (
            (void 0 !== r.disableTouchKeyboard &&
                ((s.disableTouchKeyboard =
                    "ontouchstart" in document && !!r.disableTouchKeyboard),
                delete r.disableTouchKeyboard),
            r.orientation)
        ) {
            const e = r.orientation.toLowerCase().split(/\s+/g);
            (s.orientation = {
                x: e.find((e) => "left" === e || "right" === e) || "auto",
                y: e.find((e) => "top" === e || "bottom" === e) || "auto",
            }),
                delete r.orientation;
        }
        if (void 0 !== r.todayBtnMode) {
            switch (r.todayBtnMode) {
                case 0:
                case 1:
                    s.todayBtnMode = r.todayBtnMode;
            }
            delete r.todayBtnMode;
        }
        return (
            Object.keys(r).forEach((t) => {
                void 0 !== r[t] && e(N, t) && (s[t] = r[t]);
            }),
            s
        );
    }
    const J = d(
            '<div class="datepicker hidden">\n  <div class="datepicker-picker inline-block rounded-lg bg-white dark:bg-gray-700 shadow-lg p-4">\n    <div class="datepicker-header">\n      <div class="datepicker-title bg-white dark:bg-gray-700 dark:text-white px-2 py-3 text-center font-semibold"></div>\n      <div class="datepicker-controls flex justify-between mb-2">\n        <button type="button" class="bg-white dark:bg-gray-700 rounded-lg text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200 prev-btn"></button>\n        <button type="button" class="text-sm rounded-lg text-gray-900 dark:text-white bg-white dark:bg-gray-700 font-semibold py-2.5 px-5 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200 view-switch"></button>\n        <button type="button" class="bg-white dark:bg-gray-700 rounded-lg text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200 next-btn"></button>\n      </div>\n    </div>\n    <div class="datepicker-main p-1"></div>\n    <div class="datepicker-footer">\n      <div class="datepicker-controls flex space-x-2 mt-2">\n        <button type="button" class="%buttonClass% today-btn text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-1/2"></button>\n        <button type="button" class="%buttonClass% clear-btn text-gray-900 dark:text-white bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-1/2"></button>\n      </div>\n    </div>\n  </div>\n</div>'
        ),
        z = d(
            `<div class="days">\n  <div class="days-of-week grid grid-cols-7 mb-1">${n(
                "span",
                7,
                {
                    class: "dow block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm",
                }
            )}</div>\n  <div class="datepicker-grid w-64 grid grid-cols-7">${n(
                "span",
                42,
                {
                    class: "block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400",
                }
            )}</div>\n</div>`
        ),
        U = d(
            `<div class="calendar-weeks">\n  <div class="days-of-week flex"><span class="dow h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400"></span></div>\n  <div class="weeks">${n(
                "span",
                6,
                {
                    class: "week block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm",
                }
            )}</div>\n</div>`
        );
    class X {
        constructor(e, t) {
            Object.assign(this, t, {
                picker: e,
                element: Y('<div class="datepicker-view flex"></div>')
                    .firstChild,
                selected: [],
            }),
                this.init(this.picker.datepicker.config);
        }
        init(e) {
            void 0 !== e.pickLevel &&
                (this.isMinView = this.id === e.pickLevel),
                this.setOptions(e),
                this.updateFocus(),
                this.updateSelection();
        }
        performBeforeHook(e, t, a) {
            let r = this.beforeShow(new Date(a));
            switch (typeof r) {
                case "boolean":
                    r = { enabled: r };
                    break;
                case "string":
                    r = { classes: r };
            }
            if (r) {
                if (
                    (!1 === r.enabled &&
                        (e.classList.add("disabled"), i(this.disabled, t)),
                    r.classes)
                ) {
                    const a = r.classes.split(/\s+/);
                    e.classList.add(...a),
                        a.includes("disabled") && i(this.disabled, t);
                }
                r.content &&
                    (function (e, t) {
                        _(e),
                            t instanceof DocumentFragment
                                ? e.appendChild(t)
                                : "string" == typeof t
                                ? e.appendChild(Y(t))
                                : "function" == typeof t.forEach &&
                                  t.forEach((t) => {
                                      e.appendChild(t);
                                  });
                    })(e, r.content);
            }
        }
    }
    class G extends X {
        constructor(e) {
            super(e, { id: 0, name: "days", cellClass: "day" });
        }
        init(e, t = !0) {
            if (t) {
                const e = Y(z).firstChild;
                (this.dow = e.firstChild),
                    (this.grid = e.lastChild),
                    this.element.appendChild(e);
            }
            super.init(e);
        }
        setOptions(t) {
            let i;
            if (
                (e(t, "minDate") && (this.minDate = t.minDate),
                e(t, "maxDate") && (this.maxDate = t.maxDate),
                t.datesDisabled && (this.datesDisabled = t.datesDisabled),
                t.daysOfWeekDisabled &&
                    ((this.daysOfWeekDisabled = t.daysOfWeekDisabled),
                    (i = !0)),
                t.daysOfWeekHighlighted &&
                    (this.daysOfWeekHighlighted = t.daysOfWeekHighlighted),
                void 0 !== t.todayHighlight &&
                    (this.todayHighlight = t.todayHighlight),
                void 0 !== t.weekStart &&
                    ((this.weekStart = t.weekStart),
                    (this.weekEnd = t.weekEnd),
                    (i = !0)),
                t.locale)
            ) {
                const e = (this.locale = t.locale);
                (this.dayNames = e.daysMin),
                    (this.switchLabelFormat = e.titleFormat),
                    (i = !0);
            }
            if (
                (void 0 !== t.beforeShowDay &&
                    (this.beforeShow =
                        "function" == typeof t.beforeShowDay
                            ? t.beforeShowDay
                            : void 0),
                void 0 !== t.calendarWeeks)
            )
                if (t.calendarWeeks && !this.calendarWeeks) {
                    const e = Y(U).firstChild;
                    (this.calendarWeeks = {
                        element: e,
                        dow: e.firstChild,
                        weeks: e.lastChild,
                    }),
                        this.element.insertBefore(e, this.element.firstChild);
                } else
                    this.calendarWeeks &&
                        !t.calendarWeeks &&
                        (this.element.removeChild(this.calendarWeeks.element),
                        (this.calendarWeeks = null));
            void 0 !== t.showDaysOfWeek &&
                (t.showDaysOfWeek
                    ? (H(this.dow),
                      this.calendarWeeks && H(this.calendarWeeks.dow))
                    : (W(this.dow),
                      this.calendarWeeks && W(this.calendarWeeks.dow))),
                i &&
                    Array.from(this.dow.children).forEach((e, t) => {
                        const i = (this.weekStart + t) % 7;
                        (e.textContent = this.dayNames[i]),
                            (e.className = this.daysOfWeekDisabled.includes(i)
                                ? "dow disabled text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400 cursor-not-allowed"
                                : "dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400");
                    });
        }
        updateFocus() {
            const e = new Date(this.picker.viewDate),
                t = e.getFullYear(),
                i = e.getMonth(),
                a = l(t, i, 1),
                r = p(a, this.weekStart, this.weekStart);
            (this.first = a),
                (this.last = l(t, i + 1, 0)),
                (this.start = r),
                (this.focused = this.picker.viewDate);
        }
        updateSelection() {
            const { dates: e, rangepicker: t } = this.picker.datepicker;
            (this.selected = e), t && (this.range = t.dates);
        }
        render() {
            (this.today = this.todayHighlight ? c() : void 0),
                (this.disabled = [...this.datesDisabled]);
            const e = S(this.focused, this.switchLabelFormat, this.locale);
            if (
                (this.picker.setViewSwitchLabel(e),
                this.picker.setPrevBtnDisabled(this.first <= this.minDate),
                this.picker.setNextBtnDisabled(this.last >= this.maxDate),
                this.calendarWeeks)
            ) {
                const e = p(this.first, 1, 1);
                Array.from(this.calendarWeeks.weeks.children).forEach(
                    (t, i) => {
                        t.textContent = (function (e) {
                            const t = p(e, 4, 1),
                                i = p(new Date(t).setMonth(0, 4), 4, 1);
                            return Math.round((t - i) / 6048e5) + 1;
                        })(
                            (function (e, t) {
                                return h(e, 7 * t);
                            })(e, i)
                        );
                    }
                );
            }
            Array.from(this.grid.children).forEach((e, t) => {
                const a = e.classList,
                    r = h(this.start, t),
                    s = new Date(r),
                    n = s.getDay();
                if (
                    ((e.className = `datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm ${this.cellClass}`),
                    (e.dataset.date = r),
                    (e.textContent = s.getDate()),
                    r < this.first
                        ? a.add("prev", "text-gray-500", "dark:text-white")
                        : r > this.last &&
                          a.add("next", "text-gray-500", "dark:text-white"),
                    this.today === r &&
                        a.add(
                            "today",
                            "bg-gray-100",
                            "dark:bg-gray-600",
                            "dark:bg-gray-600"
                        ),
                    (r < this.minDate ||
                        r > this.maxDate ||
                        this.disabled.includes(r)) &&
                        a.add("disabled", "cursor-not-allowed"),
                    this.daysOfWeekDisabled.includes(n) &&
                        (a.add("disabled", "cursor-not-allowed"),
                        i(this.disabled, r)),
                    this.daysOfWeekHighlighted.includes(n) &&
                        a.add("highlighted"),
                    this.range)
                ) {
                    const [e, t] = this.range;
                    r > e &&
                        r < t &&
                        (a.add("range", "bg-gray-200", "dark:bg-gray-600"),
                        a.remove("rounded-lg", "rounded-l-lg", "rounded-r-lg")),
                        r === e &&
                            (a.add(
                                "range-start",
                                "bg-gray-100",
                                "dark:bg-gray-600",
                                "rounded-l-lg"
                            ),
                            a.remove("rounded-lg", "rounded-r-lg")),
                        r === t &&
                            (a.add(
                                "range-end",
                                "bg-gray-100",
                                "dark:bg-gray-600",
                                "rounded-r-lg"
                            ),
                            a.remove("rounded-lg", "rounded-l-lg"));
                }
                this.selected.includes(r) &&
                    (a.add(
                        "selected",
                        "bg-blue-700",
                        "text-white",
                        "dark:bg-blue-600",
                        "dark:text-white"
                    ),
                    a.remove(
                        "text-gray-900",
                        "text-gray-500",
                        "hover:bg-gray-100",
                        "dark:text-white",
                        "dark:hover:bg-gray-600"
                    )),
                    r === this.focused && a.add("focused"),
                    this.beforeShow && this.performBeforeHook(e, r, r);
            });
        }
        refresh() {
            const [e, t] = this.range || [];
            this.grid
                .querySelectorAll(
                    ".range, .range-start, .range-end, .selected, .focused"
                )
                .forEach((e) => {
                    e.classList.remove(
                        "range",
                        "range-start",
                        "range-end",
                        "selected",
                        "bg-blue-700",
                        "text-white",
                        "dark:bg-blue-600",
                        "dark:text-white",
                        "focused",
                        "bg-gray-100",
                        "dark:bg-gray-600"
                    ),
                        e.classList.add(
                            "text-gray-900",
                            "rounded-lg",
                            "dark:text-white"
                        );
                }),
                Array.from(this.grid.children).forEach((i) => {
                    const a = Number(i.dataset.date),
                        r = i.classList;
                    a > e &&
                        a < t &&
                        (r.add("range", "bg-gray-200", "dark:bg-gray-600"),
                        r.remove("rounded-lg")),
                        a === e &&
                            (r.add(
                                "range-start",
                                "bg-gray-200",
                                "dark:bg-gray-600",
                                "rounded-l-lg"
                            ),
                            r.remove("rounded-lg", "rounded-r-lg")),
                        a === t &&
                            (r.add(
                                "range-end",
                                "bg-gray-200",
                                "dark:bg-gray-600",
                                "rounded-r-lg"
                            ),
                            r.remove("rounded-lg", "rounded-l-lg")),
                        this.selected.includes(a) &&
                            (r.add(
                                "selected",
                                "bg-blue-700",
                                "text-white",
                                "dark:bg-blue-600",
                                "dark:text-white"
                            ),
                            r.remove(
                                "text-gray-900",
                                "hover:bg-gray-100",
                                "dark:text-white",
                                "dark:hover:bg-gray-600"
                            )),
                        a === this.focused &&
                            r.add("focused", "bg-gray-100", "dark:bg-gray-600");
                });
        }
        refreshFocus() {
            const e = Math.round((this.focused - this.start) / 864e5);
            this.grid.querySelectorAll(".focused").forEach((e) => {
                e.classList.remove(
                    "focused",
                    "bg-gray-100",
                    "dark:bg-gray-600"
                );
            }),
                this.grid.children[e].classList.add(
                    "focused",
                    "bg-gray-100",
                    "dark:bg-gray-600"
                );
        }
    }
    function Q(e, t) {
        if (!e || !e[0] || !e[1]) return;
        const [[i, a], [r, s]] = e;
        return i > t || r < t ? void 0 : [i === t ? a : -1, r === t ? s : 12];
    }
    class Z extends X {
        constructor(e) {
            super(e, { id: 1, name: "months", cellClass: "month" });
        }
        init(e, t = !0) {
            t &&
                ((this.grid = this.element),
                this.element.classList.add(
                    "months",
                    "datepicker-grid",
                    "w-64",
                    "grid",
                    "grid-cols-4"
                ),
                this.grid.appendChild(
                    Y(n("span", 12, { "data-month": (e) => e }))
                )),
                super.init(e);
        }
        setOptions(t) {
            if (
                (t.locale && (this.monthNames = t.locale.monthsShort),
                e(t, "minDate"))
            )
                if (void 0 === t.minDate)
                    this.minYear = this.minMonth = this.minDate = void 0;
                else {
                    const e = new Date(t.minDate);
                    (this.minYear = e.getFullYear()),
                        (this.minMonth = e.getMonth()),
                        (this.minDate = e.setDate(1));
                }
            if (e(t, "maxDate"))
                if (void 0 === t.maxDate)
                    this.maxYear = this.maxMonth = this.maxDate = void 0;
                else {
                    const e = new Date(t.maxDate);
                    (this.maxYear = e.getFullYear()),
                        (this.maxMonth = e.getMonth()),
                        (this.maxDate = l(this.maxYear, this.maxMonth + 1, 0));
                }
            void 0 !== t.beforeShowMonth &&
                (this.beforeShow =
                    "function" == typeof t.beforeShowMonth
                        ? t.beforeShowMonth
                        : void 0);
        }
        updateFocus() {
            const e = new Date(this.picker.viewDate);
            (this.year = e.getFullYear()), (this.focused = e.getMonth());
        }
        updateSelection() {
            const { dates: e, rangepicker: t } = this.picker.datepicker;
            (this.selected = e.reduce((e, t) => {
                const a = new Date(t),
                    r = a.getFullYear(),
                    s = a.getMonth();
                return void 0 === e[r] ? (e[r] = [s]) : i(e[r], s), e;
            }, {})),
                t &&
                    t.dates &&
                    (this.range = t.dates.map((e) => {
                        const t = new Date(e);
                        return isNaN(t)
                            ? void 0
                            : [t.getFullYear(), t.getMonth()];
                    }));
        }
        render() {
            (this.disabled = []),
                this.picker.setViewSwitchLabel(this.year),
                this.picker.setPrevBtnDisabled(this.year <= this.minYear),
                this.picker.setNextBtnDisabled(this.year >= this.maxYear);
            const e = this.selected[this.year] || [],
                t = this.year < this.minYear || this.year > this.maxYear,
                i = this.year === this.minYear,
                a = this.year === this.maxYear,
                r = Q(this.range, this.year);
            Array.from(this.grid.children).forEach((s, n) => {
                const d = s.classList,
                    o = l(this.year, n, 1);
                if (
                    ((s.className = `datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm ${this.cellClass}`),
                    this.isMinView && (s.dataset.date = o),
                    (s.textContent = this.monthNames[n]),
                    (t ||
                        (i && n < this.minMonth) ||
                        (a && n > this.maxMonth)) &&
                        d.add("disabled"),
                    r)
                ) {
                    const [e, t] = r;
                    n > e && n < t && d.add("range"),
                        n === e && d.add("range-start"),
                        n === t && d.add("range-end");
                }
                e.includes(n) &&
                    (d.add(
                        "selected",
                        "bg-blue-700",
                        "text-white",
                        "dark:bg-blue-600",
                        "dark:text-white"
                    ),
                    d.remove(
                        "text-gray-900",
                        "hover:bg-gray-100",
                        "dark:text-white",
                        "dark:hover:bg-gray-600"
                    )),
                    n === this.focused &&
                        d.add("focused", "bg-gray-100", "dark:bg-gray-600"),
                    this.beforeShow && this.performBeforeHook(s, n, o);
            });
        }
        refresh() {
            const e = this.selected[this.year] || [],
                [t, i] = Q(this.range, this.year) || [];
            this.grid
                .querySelectorAll(
                    ".range, .range-start, .range-end, .selected, .focused"
                )
                .forEach((e) => {
                    e.classList.remove(
                        "range",
                        "range-start",
                        "range-end",
                        "selected",
                        "bg-blue-700",
                        "dark:bg-blue-600",
                        "dark:text-white",
                        "text-white",
                        "focused",
                        "bg-gray-100",
                        "dark:bg-gray-600"
                    ),
                        e.classList.add(
                            "text-gray-900",
                            "hover:bg-gray-100",
                            "dark:text-white",
                            "dark:hover:bg-gray-600"
                        );
                }),
                Array.from(this.grid.children).forEach((a, r) => {
                    const s = a.classList;
                    r > t && r < i && s.add("range"),
                        r === t && s.add("range-start"),
                        r === i && s.add("range-end"),
                        e.includes(r) &&
                            (s.add(
                                "selected",
                                "bg-blue-700",
                                "text-white",
                                "dark:bg-blue-600",
                                "dark:text-white"
                            ),
                            s.remove(
                                "text-gray-900",
                                "hover:bg-gray-100",
                                "dark:text-white",
                                "dark:hover:bg-gray-600"
                            )),
                        r === this.focused &&
                            s.add("focused", "bg-gray-100", "dark:bg-gray-600");
                });
        }
        refreshFocus() {
            this.grid.querySelectorAll(".focused").forEach((e) => {
                e.classList.remove("focused", "bg-gray-100");
            }),
                this.grid.children[this.focused].classList.add(
                    "focused",
                    "bg-gray-100",
                    "dark:bg-gray-600"
                );
        }
    }
    class ee extends X {
        constructor(e, t) {
            super(e, t);
        }
        init(e, t = !0) {
            var i;
            t &&
                ((this.navStep = 10 * this.step),
                (this.beforeShowOption = `beforeShow${
                    ((i = this.cellClass),
                    [...i].reduce(
                        (e, t, i) => (e += i ? t : t.toUpperCase()),
                        ""
                    ))
                }`),
                (this.grid = this.element),
                this.element.classList.add(
                    this.name,
                    "datepicker-grid",
                    "w-64",
                    "grid",
                    "grid-cols-4"
                ),
                this.grid.appendChild(Y(n("span", 12)))),
                super.init(e);
        }
        setOptions(t) {
            if (
                (e(t, "minDate") &&
                    (void 0 === t.minDate
                        ? (this.minYear = this.minDate = void 0)
                        : ((this.minYear = b(t.minDate, this.step)),
                          (this.minDate = l(this.minYear, 0, 1)))),
                e(t, "maxDate") &&
                    (void 0 === t.maxDate
                        ? (this.maxYear = this.maxDate = void 0)
                        : ((this.maxYear = b(t.maxDate, this.step)),
                          (this.maxDate = l(this.maxYear, 11, 31)))),
                void 0 !== t[this.beforeShowOption])
            ) {
                const e = t[this.beforeShowOption];
                this.beforeShow = "function" == typeof e ? e : void 0;
            }
        }
        updateFocus() {
            const e = new Date(this.picker.viewDate),
                t = b(e, this.navStep),
                i = t + 9 * this.step;
            (this.first = t),
                (this.last = i),
                (this.start = t - this.step),
                (this.focused = b(e, this.step));
        }
        updateSelection() {
            const { dates: e, rangepicker: t } = this.picker.datepicker;
            (this.selected = e.reduce((e, t) => i(e, b(t, this.step)), [])),
                t &&
                    t.dates &&
                    (this.range = t.dates.map((e) => {
                        if (void 0 !== e) return b(e, this.step);
                    }));
        }
        render() {
            (this.disabled = []),
                this.picker.setViewSwitchLabel(`${this.first}-${this.last}`),
                this.picker.setPrevBtnDisabled(this.first <= this.minYear),
                this.picker.setNextBtnDisabled(this.last >= this.maxYear),
                Array.from(this.grid.children).forEach((e, t) => {
                    const i = e.classList,
                        a = this.start + t * this.step,
                        r = l(a, 0, 1);
                    if (
                        ((e.className = `datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm ${this.cellClass}`),
                        this.isMinView && (e.dataset.date = r),
                        (e.textContent = e.dataset.year = a),
                        0 === t ? i.add("prev") : 11 === t && i.add("next"),
                        (a < this.minYear || a > this.maxYear) &&
                            i.add("disabled"),
                        this.range)
                    ) {
                        const [e, t] = this.range;
                        a > e && a < t && i.add("range"),
                            a === e && i.add("range-start"),
                            a === t && i.add("range-end");
                    }
                    this.selected.includes(a) &&
                        (i.add(
                            "selected",
                            "bg-blue-700",
                            "text-white",
                            "dark:bg-blue-600",
                            "dark:text-white"
                        ),
                        i.remove(
                            "text-gray-900",
                            "hover:bg-gray-100",
                            "dark:text-white",
                            "dark:hover:bg-gray-600"
                        )),
                        a === this.focused &&
                            i.add("focused", "bg-gray-100", "dark:bg-gray-600"),
                        this.beforeShow && this.performBeforeHook(e, a, r);
                });
        }
        refresh() {
            const [e, t] = this.range || [];
            this.grid
                .querySelectorAll(
                    ".range, .range-start, .range-end, .selected, .focused"
                )
                .forEach((e) => {
                    e.classList.remove(
                        "range",
                        "range-start",
                        "range-end",
                        "selected",
                        "bg-blue-700",
                        "text-white",
                        "dark:bg-blue-600",
                        "dark:text-white",
                        "focused",
                        "bg-gray-100",
                        "dark:bg-gray-600"
                    );
                }),
                Array.from(this.grid.children).forEach((i) => {
                    const a = Number(i.textContent),
                        r = i.classList;
                    a > e && a < t && r.add("range"),
                        a === e && r.add("range-start"),
                        a === t && r.add("range-end"),
                        this.selected.includes(a) &&
                            (r.add(
                                "selected",
                                "bg-blue-700",
                                "text-white",
                                "dark:bg-blue-600",
                                "dark:text-white"
                            ),
                            r.remove(
                                "text-gray-900",
                                "hover:bg-gray-100",
                                "dark:text-white",
                                "dark:hover:bg-gray-600"
                            )),
                        a === this.focused &&
                            r.add("focused", "bg-gray-100", "dark:bg-gray-600");
                });
        }
        refreshFocus() {
            const e = Math.round((this.focused - this.start) / this.step);
            this.grid.querySelectorAll(".focused").forEach((e) => {
                e.classList.remove(
                    "focused",
                    "bg-gray-100",
                    "dark:bg-gray-600"
                );
            }),
                this.grid.children[e].classList.add(
                    "focused",
                    "bg-gray-100",
                    "dark:bg-gray-600"
                );
        }
    }
    function te(e, t) {
        const i = {
            date: e.getDate(),
            viewDate: new Date(e.picker.viewDate),
            viewId: e.picker.currentView.id,
            datepicker: e,
        };
        e.element.dispatchEvent(new CustomEvent(t, { detail: i }));
    }
    function ie(e, t) {
        const { minDate: i, maxDate: a } = e.config,
            { currentView: r, viewDate: n } = e.picker;
        let d;
        switch (r.id) {
            case 0:
                d = u(n, t);
                break;
            case 1:
                d = g(n, t);
                break;
            default:
                d = g(n, t * r.navStep);
        }
        (d = s(d, i, a)), e.picker.changeFocus(d).render();
    }
    function ae(e) {
        const t = e.picker.currentView.id;
        t !== e.config.maxView && e.picker.changeView(t + 1).render();
    }
    function re(e) {
        e.config.updateOnBlur
            ? e.update({ autohide: !0 })
            : (e.refresh("input"), e.hide());
    }
    function se(e, t) {
        const i = e.picker,
            a = new Date(i.viewDate),
            r = i.currentView.id,
            s = 1 === r ? u(a, t - a.getMonth()) : g(a, t - a.getFullYear());
        i.changeFocus(s)
            .changeView(r - 1)
            .render();
    }
    function ne(e) {
        const t = e.picker,
            i = c();
        if (1 === e.config.todayBtnMode) {
            if (e.config.autohide) return void e.setDate(i);
            e.setDate(i, { render: !1 }), t.update();
        }
        t.viewDate !== i && t.changeFocus(i), t.changeView(0).render();
    }
    function de(e) {
        e.setDate({ clear: !0 });
    }
    function oe(e) {
        ae(e);
    }
    function ce(e) {
        ie(e, -1);
    }
    function le(e) {
        ie(e, 1);
    }
    function he(e, t) {
        const i = A(t, ".datepicker-cell");
        if (!i || i.classList.contains("disabled")) return;
        const { id: a, isMinView: r } = e.picker.currentView;
        r
            ? e.setDate(Number(i.dataset.date))
            : se(e, 1 === a ? Number(i.dataset.month) : Number(i.dataset.year));
    }
    function ue(e) {
        e.inline || e.config.disableTouchKeyboard || e.inputField.focus();
    }
    function ge(t, i) {
        if (
            (void 0 !== i.title &&
                (i.title
                    ? ((t.controls.title.textContent = i.title),
                      H(t.controls.title))
                    : ((t.controls.title.textContent = ""),
                      W(t.controls.title))),
            i.prevArrow)
        ) {
            const e = t.controls.prevBtn;
            _(e),
                i.prevArrow.forEach((t) => {
                    e.appendChild(t.cloneNode(!0));
                });
        }
        if (i.nextArrow) {
            const e = t.controls.nextBtn;
            _(e),
                i.nextArrow.forEach((t) => {
                    e.appendChild(t.cloneNode(!0));
                });
        }
        if (
            (i.locale &&
                ((t.controls.todayBtn.textContent = i.locale.today),
                (t.controls.clearBtn.textContent = i.locale.clear)),
            void 0 !== i.todayBtn &&
                (i.todayBtn ? H(t.controls.todayBtn) : W(t.controls.todayBtn)),
            e(i, "minDate") || e(i, "maxDate"))
        ) {
            const { minDate: e, maxDate: i } = t.datepicker.config;
            t.controls.todayBtn.disabled = !r(c(), e, i);
        }
        void 0 !== i.clearBtn &&
            (i.clearBtn ? H(t.controls.clearBtn) : W(t.controls.clearBtn));
    }
    function fe(e) {
        const { dates: i, config: a } = e;
        return s(i.length > 0 ? t(i) : a.defaultViewDate, a.minDate, a.maxDate);
    }
    function pe(e, t) {
        const i = new Date(e.viewDate),
            a = new Date(t),
            { id: r, year: s, first: n, last: d } = e.currentView,
            o = a.getFullYear();
        switch (
            ((e.viewDate = t),
            o !== i.getFullYear() && te(e.datepicker, "changeYear"),
            a.getMonth() !== i.getMonth() && te(e.datepicker, "changeMonth"),
            r)
        ) {
            case 0:
                return t < n || t > d;
            case 1:
                return o !== s;
            default:
                return o < n || o > d;
        }
    }
    function be(e) {
        return window.getComputedStyle(e).direction;
    }
    class me {
        constructor(e) {
            this.datepicker = e;
            const t = J.replace(/%buttonClass%/g, e.config.buttonClass),
                i = (this.element = Y(t).firstChild),
                [a, r, s] = i.firstChild.children,
                n = a.firstElementChild,
                [d, o, c] = a.lastElementChild.children,
                [l, h] = s.firstChild.children,
                u = {
                    title: n,
                    prevBtn: d,
                    viewSwitch: o,
                    nextBtn: c,
                    todayBtn: l,
                    clearBtn: h,
                };
            (this.main = r), (this.controls = u);
            const g = e.inline ? "inline" : "dropdown";
            i.classList.add(`datepicker-${g}`),
                "dropdown" === g &&
                    i.classList.add(
                        "dropdown",
                        "absolute",
                        "top-0",
                        "left-0",
                        "z-20",
                        "pt-2"
                    ),
                ge(this, e.config),
                (this.viewDate = fe(e)),
                F(e, [
                    [i, "click", ue.bind(null, e), { capture: !0 }],
                    [r, "click", he.bind(null, e)],
                    [u.viewSwitch, "click", oe.bind(null, e)],
                    [u.prevBtn, "click", ce.bind(null, e)],
                    [u.nextBtn, "click", le.bind(null, e)],
                    [u.todayBtn, "click", ne.bind(null, e)],
                    [u.clearBtn, "click", de.bind(null, e)],
                ]),
                (this.views = [
                    new G(this),
                    new Z(this),
                    new ee(this, {
                        id: 2,
                        name: "years",
                        cellClass: "year",
                        step: 1,
                    }),
                    new ee(this, {
                        id: 3,
                        name: "decades",
                        cellClass: "decade",
                        step: 10,
                    }),
                ]),
                (this.currentView = this.views[e.config.startView]),
                this.currentView.render(),
                this.main.appendChild(this.currentView.element),
                e.config.container.appendChild(this.element);
        }
        setOptions(e) {
            ge(this, e),
                this.views.forEach((t) => {
                    t.init(e, !1);
                }),
                this.currentView.render();
        }
        detach() {
            this.datepicker.config.container.removeChild(this.element);
        }
        show() {
            if (this.active) return;
            this.element.classList.add("active", "block"),
                this.element.classList.remove("hidden"),
                (this.active = !0);
            const e = this.datepicker;
            if (!e.inline) {
                const t = be(e.inputField);
                t !== be(e.config.container)
                    ? (this.element.dir = t)
                    : this.element.dir && this.element.removeAttribute("dir"),
                    this.place(),
                    e.config.disableTouchKeyboard && e.inputField.blur();
            }
            te(e, "show");
        }
        hide() {
            this.active &&
                (this.datepicker.exitEditMode(),
                this.element.classList.remove("active", "block"),
                this.element.classList.add("active", "block", "hidden"),
                (this.active = !1),
                te(this.datepicker, "hide"));
        }
        place() {
            const { classList: e, style: t } = this.element,
                { config: i, inputField: a } = this.datepicker,
                r = i.container,
                { width: s, height: n } = this.element.getBoundingClientRect(),
                { left: d, top: o, width: c } = r.getBoundingClientRect(),
                {
                    left: l,
                    top: h,
                    width: u,
                    height: g,
                } = a.getBoundingClientRect();
            let f,
                p,
                b,
                { x: m, y: y } = i.orientation;
            r === document.body
                ? ((f = window.scrollY), (p = l + window.scrollX), (b = h + f))
                : ((p = l - d), (b = h - o + (f = r.scrollTop))),
                "auto" === m &&
                    (p < 0
                        ? ((m = "left"), (p = 10))
                        : (m =
                              p + s > c
                                  ? "right"
                                  : "rtl" === be(a)
                                  ? "right"
                                  : "left")),
                "right" === m && (p -= s - u),
                "auto" === y && (y = b - n < f ? "bottom" : "top"),
                "top" === y ? (b -= n) : (b += g),
                e.remove(
                    "datepicker-orient-top",
                    "datepicker-orient-bottom",
                    "datepicker-orient-right",
                    "datepicker-orient-left"
                ),
                e.add(`datepicker-orient-${y}`, `datepicker-orient-${m}`),
                (t.top = b ? `${b}px` : b),
                (t.left = p ? `${p}px` : p);
        }
        setViewSwitchLabel(e) {
            this.controls.viewSwitch.textContent = e;
        }
        setPrevBtnDisabled(e) {
            this.controls.prevBtn.disabled = e;
        }
        setNextBtnDisabled(e) {
            this.controls.nextBtn.disabled = e;
        }
        changeView(e) {
            const t = this.currentView,
                i = this.views[e];
            return (
                i.id !== t.id &&
                    ((this.currentView = i),
                    (this._renderMethod = "render"),
                    te(this.datepicker, "changeView"),
                    this.main.replaceChild(i.element, t.element)),
                this
            );
        }
        changeFocus(e) {
            return (
                (this._renderMethod = pe(this, e) ? "render" : "refreshFocus"),
                this.views.forEach((e) => {
                    e.updateFocus();
                }),
                this
            );
        }
        update() {
            const e = fe(this.datepicker);
            return (
                (this._renderMethod = pe(this, e) ? "render" : "refresh"),
                this.views.forEach((e) => {
                    e.updateFocus(), e.updateSelection();
                }),
                this
            );
        }
        render(e = !0) {
            const t = (e && this._renderMethod) || "render";
            delete this._renderMethod, this.currentView[t]();
        }
    }
    function ye(e, t, i, a) {
        const s = e.picker,
            n = s.currentView,
            d = n.step || 1;
        let o,
            c,
            l = s.viewDate;
        switch (n.id) {
            case 0:
                (l = a
                    ? h(l, 7 * i)
                    : t.ctrlKey || t.metaKey
                    ? g(l, i)
                    : h(l, i)),
                    (o = h),
                    (c = (e) => n.disabled.includes(e));
                break;
            case 1:
                (l = u(l, a ? 4 * i : i)),
                    (o = u),
                    (c = (e) => {
                        const t = new Date(e),
                            { year: i, disabled: a } = n;
                        return (
                            t.getFullYear() === i && a.includes(t.getMonth())
                        );
                    });
                break;
            default:
                (l = g(l, i * (a ? 4 : 1) * d)),
                    (o = g),
                    (c = (e) => n.disabled.includes(b(e, d)));
        }
        void 0 !==
            (l = (function e(t, i, a, s, n, d) {
                if (r(t, n, d)) return s(t) ? e(i(t, a), i, a, s, n, d) : t;
            })(l, o, i < 0 ? -d : d, c, n.minDate, n.maxDate)) &&
            s.changeFocus(l).render();
    }
    function we(e, t) {
        if ("Tab" === t.key) return void re(e);
        const i = e.picker,
            { id: a, isMinView: r } = i.currentView;
        if (i.active)
            if (e.editMode)
                switch (t.key) {
                    case "Escape":
                        i.hide();
                        break;
                    case "Enter":
                        e.exitEditMode({
                            update: !0,
                            autohide: e.config.autohide,
                        });
                        break;
                    default:
                        return;
                }
            else
                switch (t.key) {
                    case "Escape":
                        i.hide();
                        break;
                    case "ArrowLeft":
                        if (t.ctrlKey || t.metaKey) ie(e, -1);
                        else {
                            if (t.shiftKey) return void e.enterEditMode();
                            ye(e, t, -1, !1);
                        }
                        break;
                    case "ArrowRight":
                        if (t.ctrlKey || t.metaKey) ie(e, 1);
                        else {
                            if (t.shiftKey) return void e.enterEditMode();
                            ye(e, t, 1, !1);
                        }
                        break;
                    case "ArrowUp":
                        if (t.ctrlKey || t.metaKey) ae(e);
                        else {
                            if (t.shiftKey) return void e.enterEditMode();
                            ye(e, t, -1, !0);
                        }
                        break;
                    case "ArrowDown":
                        if (t.shiftKey && !t.ctrlKey && !t.metaKey)
                            return void e.enterEditMode();
                        ye(e, t, 1, !0);
                        break;
                    case "Enter":
                        r
                            ? e.setDate(i.viewDate)
                            : i.changeView(a - 1).render();
                        break;
                    case "Backspace":
                    case "Delete":
                        return void e.enterEditMode();
                    default:
                        return void (
                            1 !== t.key.length ||
                            t.ctrlKey ||
                            t.metaKey ||
                            e.enterEditMode()
                        );
                }
        else
            switch (t.key) {
                case "ArrowDown":
                case "Escape":
                    i.show();
                    break;
                case "Enter":
                    e.update();
                    break;
                default:
                    return;
            }
        t.preventDefault(), t.stopPropagation();
    }
    function ke(e) {
        e.config.showOnFocus && !e._showing && e.show();
    }
    function ve(e, t) {
        const i = t.target;
        (e.picker.active || e.config.showOnClick) &&
            ((i._active = i === document.activeElement),
            (i._clicking = setTimeout(() => {
                delete i._active, delete i._clicking;
            }, 2e3)));
    }
    function De(e, t) {
        const i = t.target;
        i._clicking &&
            (clearTimeout(i._clicking),
            delete i._clicking,
            i._active && e.enterEditMode(),
            delete i._active,
            e.config.showOnClick && e.show());
    }
    function xe(e, t) {
        t.clipboardData.types.includes("text/plain") && e.enterEditMode();
    }
    function Me(e, t) {
        return e.map((e) => S(e, t.format, t.locale)).join(t.dateDelimiter);
    }
    function Se(e, t, i = !1) {
        const { config: a, dates: s, rangepicker: n } = e;
        if (0 === t.length) return i ? [] : void 0;
        const d = n && e === n.datepickers[1];
        let o = t.reduce((e, t) => {
            let i = M(t, a.format, a.locale);
            if (void 0 === i) return e;
            if (a.pickLevel > 0) {
                const e = new Date(i);
                i =
                    1 === a.pickLevel
                        ? d
                            ? e.setMonth(e.getMonth() + 1, 0)
                            : e.setDate(1)
                        : d
                        ? e.setFullYear(e.getFullYear() + 1, 0, 0)
                        : e.setMonth(0, 1);
            }
            return (
                !r(i, a.minDate, a.maxDate) ||
                    e.includes(i) ||
                    a.datesDisabled.includes(i) ||
                    a.daysOfWeekDisabled.includes(new Date(i).getDay()) ||
                    e.push(i),
                e
            );
        }, []);
        return 0 !== o.length
            ? (a.multidate &&
                  !i &&
                  (o = o.reduce(
                      (e, t) => (s.includes(t) || e.push(t), e),
                      s.filter((e) => !o.includes(e))
                  )),
              a.maxNumberOfDates && o.length > a.maxNumberOfDates
                  ? o.slice(-1 * a.maxNumberOfDates)
                  : o)
            : void 0;
    }
    function Oe(e, t = 3, i = !0) {
        const { config: a, picker: r, inputField: s } = e;
        if (2 & t) {
            const e = r.active ? a.pickLevel : a.startView;
            r.update().changeView(e).render(i);
        }
        1 & t && s && (s.value = Me(e.dates, a));
    }
    function Ce(e, t, i) {
        let { clear: a, render: r, autohide: s } = i;
        void 0 === r && (r = !0),
            r ? void 0 === s && (s = e.config.autohide) : (s = !1);
        const n = Se(e, t, a);
        n &&
            (n.toString() !== e.dates.toString()
                ? ((e.dates = n), Oe(e, r ? 3 : 1), te(e, "changeDate"))
                : Oe(e, 1),
            s && e.hide());
    }
    class Ee {
        constructor(e, t = {}, i) {
            (e.datepicker = this), (this.element = e);
            const r = (this.config = Object.assign(
                {
                    buttonClass:
                        (t.buttonClass && String(t.buttonClass)) || "button",
                    container: document.body,
                    defaultViewDate: c(),
                    maxDate: void 0,
                    minDate: void 0,
                },
                q(N, this)
            ));
            (this._options = t), Object.assign(r, q(t, this));
            const s = (this.inline = "INPUT" !== e.tagName);
            let n, d;
            if (s)
                (r.container = e),
                    (d = a(e.dataset.date, r.dateDelimiter)),
                    delete e.dataset.date;
            else {
                const i = t.container
                    ? document.querySelector(t.container)
                    : null;
                i && (r.container = i),
                    (n = this.inputField = e).classList.add("datepicker-input"),
                    (d = a(n.value, r.dateDelimiter));
            }
            if (i) {
                const e = i.inputs.indexOf(n),
                    t = i.datepickers;
                if (e < 0 || e > 1 || !Array.isArray(t))
                    throw Error("Invalid rangepicker object.");
                (t[e] = this),
                    Object.defineProperty(this, "rangepicker", {
                        get: () => i,
                    });
            }
            this.dates = [];
            const o = Se(this, d);
            o && o.length > 0 && (this.dates = o),
                n && (n.value = Me(this.dates, r));
            const l = (this.picker = new me(this));
            if (s) this.show();
            else {
                const e = function (e, t) {
                    const i = e.element;
                    if (i !== document.activeElement) return;
                    const a = e.picker.element;
                    A(t, (e) => e === i || e === a) || re(e);
                }.bind(null, this);
                F(this, [
                    [n, "keydown", we.bind(null, this)],
                    [n, "focus", ke.bind(null, this)],
                    [n, "mousedown", ve.bind(null, this)],
                    [n, "click", De.bind(null, this)],
                    [n, "paste", xe.bind(null, this)],
                    [document, "mousedown", e],
                    [document, "touchstart", e],
                    [window, "resize", l.place.bind(l)],
                ]);
            }
        }
        static formatDate(e, t, i) {
            return S(e, t, (i && L[i]) || L.en);
        }
        static parseDate(e, t, i) {
            return M(e, t, (i && L[i]) || L.en);
        }
        static get locales() {
            return L;
        }
        get active() {
            return !(!this.picker || !this.picker.active);
        }
        get pickerElement() {
            return this.picker ? this.picker.element : void 0;
        }
        setOptions(e) {
            const t = this.picker,
                i = q(e, this);
            Object.assign(this._options, e),
                Object.assign(this.config, i),
                t.setOptions(i),
                Oe(this, 3);
        }
        show() {
            if (this.inputField) {
                if (this.inputField.disabled) return;
                this.inputField !== document.activeElement &&
                    ((this._showing = !0),
                    this.inputField.focus(),
                    delete this._showing);
            }
            this.picker.show();
        }
        hide() {
            this.inline ||
                (this.picker.hide(),
                this.picker
                    .update()
                    .changeView(this.config.startView)
                    .render());
        }
        destroy() {
            return (
                this.hide(),
                V(this),
                this.picker.detach(),
                this.inline ||
                    this.inputField.classList.remove("datepicker-input"),
                delete this.element.datepicker,
                this
            );
        }
        getDate(e) {
            const t = e
                ? (t) => S(t, e, this.config.locale)
                : (e) => new Date(e);
            return this.config.multidate
                ? this.dates.map(t)
                : this.dates.length > 0
                ? t(this.dates[0])
                : void 0;
        }
        setDate(...e) {
            const i = [...e],
                a = {},
                r = t(e);
            "object" != typeof r ||
                Array.isArray(r) ||
                r instanceof Date ||
                !r ||
                Object.assign(a, i.pop()),
                Ce(this, Array.isArray(i[0]) ? i[0] : i, a);
        }
        update(e) {
            if (this.inline) return;
            const t = { clear: !0, autohide: !(!e || !e.autohide) };
            Ce(this, a(this.inputField.value, this.config.dateDelimiter), t);
        }
        refresh(e, t = !1) {
            let i;
            e && "string" != typeof e && ((t = e), (e = void 0)),
                Oe(this, (i = "picker" === e ? 2 : "input" === e ? 1 : 3), !t);
        }
        enterEditMode() {
            this.inline ||
                !this.picker.active ||
                this.editMode ||
                ((this.editMode = !0),
                this.inputField.classList.add("in-edit", "border-blue-700"));
        }
        exitEditMode(e) {
            if (this.inline || !this.editMode) return;
            const t = Object.assign({ update: !1 }, e);
            delete this.editMode,
                this.inputField.classList.remove("in-edit", "border-blue-700"),
                t.update && this.update(t);
        }
    }
    function Fe(e) {
        const t = Object.assign({}, e);
        return (
            delete t.inputs,
            delete t.allowOneSidedRange,
            delete t.maxNumberOfDates,
            t
        );
    }
    function Ve(e, t, i, a) {
        F(e, [[i, "changeDate", t]]), new Ee(i, a, e);
    }
    function Ae(e, t) {
        if (e._updating) return;
        e._updating = !0;
        const i = t.target;
        if (void 0 === i.datepicker) return;
        const a = e.datepickers,
            r = { render: !1 },
            s = e.inputs.indexOf(i),
            n = 0 === s ? 1 : 0,
            d = a[s].dates[0],
            o = a[n].dates[0];
        void 0 !== d && void 0 !== o
            ? 0 === s && d > o
                ? (a[0].setDate(o, r), a[1].setDate(d, r))
                : 1 === s && d < o && (a[0].setDate(d, r), a[1].setDate(o, r))
            : e.allowOneSidedRange ||
              (void 0 === d && void 0 === o) ||
              ((r.clear = !0), a[n].setDate(a[s].dates, r)),
            a[0].picker.update().render(),
            a[1].picker.update().render(),
            delete e._updating;
    }
    class Le {
        constructor(e, t = {}) {
            const i = Array.isArray(t.inputs)
                ? t.inputs
                : Array.from(e.querySelectorAll("input"));
            if (i.length < 2) return;
            (e.rangepicker = this),
                (this.element = e),
                (this.inputs = i.slice(0, 2)),
                (this.allowOneSidedRange = !!t.allowOneSidedRange);
            const a = Ae.bind(null, this),
                r = Fe(t),
                s = [];
            Object.defineProperty(this, "datepickers", { get: () => s }),
                Ve(this, a, this.inputs[0], r),
                Ve(this, a, this.inputs[1], r),
                Object.freeze(s),
                s[0].dates.length > 0
                    ? Ae(this, { target: this.inputs[0] })
                    : s[1].dates.length > 0 &&
                      Ae(this, { target: this.inputs[1] });
        }
        get dates() {
            return 2 === this.datepickers.length
                ? [this.datepickers[0].dates[0], this.datepickers[1].dates[0]]
                : void 0;
        }
        setOptions(e) {
            this.allowOneSidedRange = !!e.allowOneSidedRange;
            const t = Fe(e);
            this.datepickers[0].setOptions(t),
                this.datepickers[1].setOptions(t);
        }
        destroy() {
            this.datepickers[0].destroy(),
                this.datepickers[1].destroy(),
                V(this),
                delete this.element.rangepicker;
        }
        getDates(e) {
            const t = e
                ? (t) => S(t, e, this.datepickers[0].config.locale)
                : (e) => new Date(e);
            return this.dates.map((e) => (void 0 === e ? e : t(e)));
        }
        setDates(e, t) {
            const [i, a] = this.datepickers,
                r = this.dates;
            (this._updating = !0),
                i.setDate(e),
                a.setDate(t),
                delete this._updating,
                a.dates[0] !== r[1]
                    ? Ae(this, { target: this.inputs[1] })
                    : i.dates[0] !== r[0] &&
                      Ae(this, { target: this.inputs[0] });
        }
    }
    const Ne = (e) => {
        const t = e.hasAttribute("datepicker-buttons"),
            i = e.hasAttribute("datepicker-autohide"),
            a = e.hasAttribute("datepicker-format"),
            r = e.hasAttribute("datepicker-orientation"),
            s = e.hasAttribute("datepicker-title");
        let n = {};
        return (
            t && ((n.todayBtn = !0), (n.clearBtn = !0)),
            i && (n.autohide = !0),
            a && (n.format = e.getAttribute("datepicker-format")),
            r && (n.orientation = e.getAttribute("datepicker-orientation")),
            s && (n.title = e.getAttribute("datepicker-title")),
            n
        );
    };
    document.querySelectorAll("[datepicker]").forEach(function (e) {
        new Ee(e, Ne(e));
    }),
        document.querySelectorAll("[inline-datepicker]").forEach(function (e) {
            new Ee(e, Ne(e));
        }),
        document.querySelectorAll("[date-rangepicker]").forEach(function (e) {
            new Le(e, Ne(e));
        });
})();
