class App {
    init() {
        (this.initComponents(),
            this.initPreloader(),
            this.initPortletCard(),
            this.initMultiDropdown(),
            this.initFormValidation(),
            this.initCounter(),
            this.initCodePreview(),
            this.initToggle(),
            this.initDismissible(),
            this.initLeftSidebar(),
            this.initTopbarMenu(),
            this.initEditor());
            this.initLogout();
    }
    initComponents() {
        ("function" == typeof lucide.createIcons && lucide.createIcons(),
            document
                .querySelectorAll('[data-bs-toggle="popover"]')
                .forEach((e) => {
                    new bootstrap.Popover(e);
                }),
            document
                .querySelectorAll('[data-bs-toggle="tooltip"]')
                .forEach((e) => {
                    new bootstrap.Tooltip(e);
                }),
            document.querySelectorAll(".offcanvas").forEach((e) => {
                new bootstrap.Offcanvas(e);
            }),
            document.querySelectorAll(".toast").forEach((e) => {
                new bootstrap.Toast(e);
            }));
    }
    initPreloader() {
        window.addEventListener("load", () => {
            var e = document.getElementById("status");
            let t = document.getElementById("preloader");
            (e && (e.style.display = "none"),
                t && setTimeout(() => (t.style.display = "none"), 350));
        });
    }
    initPortletCard() {
        ($('[data-action="card-close"]').on("click", function (e) {
            e.preventDefault();
            let t = $(this).closest(".card");
            t.fadeOut(300, function () {
                t.remove();
            });
        }),
            $('[data-action="card-toggle"]').on("click", function (e) {
                e.preventDefault();
                e = $(this).closest(".card");
                var t = $(this).find("i").eq(0),
                    i = e.find(".card-body"),
                    a = e.find(".card-footer");
                (i.slideToggle(300),
                    a.slideToggle(200),
                    t.toggleClass("ti-chevron-up ti-chevron-down"),
                    e.toggleClass("card-collapse"));
            }));
        var e = document.querySelectorAll('[data-action="card-refresh"]');
        (e &&
            e.forEach(function (e) {
                e.addEventListener("click", function (e) {
                    var t;
                    e.preventDefault();
                    let i = (e = e.target.closest(".card")).querySelector(
                        ".card-overlay",
                    );
                    (i ||
                        ((i = document.createElement("div")).classList.add(
                            "card-overlay",
                        ),
                        (t = document.createElement("div")).classList.add(
                            "spinner-border",
                            "text-primary",
                        ),
                        i.appendChild(t),
                        e.appendChild(i)),
                        (i.style.display = "flex"),
                        setTimeout(function () {
                            i.style.display = "none";
                        }, 1500));
                });
            }),
            $('[data-action="code-collapse"]').on("click", function (e) {
                e.preventDefault();
                e = $(this).closest(".card");
                var t = $(this).find("i").eq(0);
                (e.find(".code-body").slideToggle(300),
                    t.toggleClass("ti-chevron-up ti-chevron-down"));
            }));
    }
    initMultiDropdown() {
        $(".dropdown-menu a.dropdown-toggle").on("click", function () {
            var e = $(this).next(".dropdown-menu");
            return (
                (e = $(this)
                    .parent()
                    .parent()
                    .find(".dropdown-menu")
                    .not(e)).removeClass("show"),
                e.parent().find(".dropdown-toggle").removeClass("show"),
                !1
            );
        });
    }
    initFormValidation() {
        document.querySelectorAll(".needs-validation").forEach((e) => {
            e.addEventListener(
                "submit",
                (t) => {
                    (e.checkValidity() ||
                        (t.preventDefault(), t.stopPropagation()),
                        e.classList.add("was-validated"));
                },
                !1,
            );
        });
    }
    initCounter() {
        var e = document.querySelectorAll("[data-target]");
        let t = new IntersectionObserver(
            (e, t) => {
                e.forEach((e) => {
                    if (e.isIntersecting) {
                        let i,
                            a = e.target,
                            s = a.getAttribute("data-target").replace(/,/g, ""),
                            o = ((s = parseFloat(s)), 0),
                            n =
                                ((i = Number.isInteger(s)
                                    ? Math.floor(s / 25)
                                    : s / 25),
                                () => {
                                    o < s
                                        ? ((o += i) > s && (o = s),
                                          (a.innerText = r(o)),
                                          requestAnimationFrame(n))
                                        : (a.innerText = r(s));
                                });
                        function r(e) {
                            return e % 1 == 0
                                ? e.toLocaleString()
                                : e.toLocaleString(void 0, {
                                      minimumFractionDigits: 2,
                                      maximumFractionDigits: 2,
                                  });
                        }
                        (n(), t.unobserve(a));
                    }
                });
            },
            { threshold: 1 },
        );
        e.forEach((e) => t.observe(e));
    }
    initCodePreview() {
        "undefined" != typeof Prism &&
            Prism.plugins &&
            Prism.plugins.NormalizeWhitespace &&
            Prism.plugins.NormalizeWhitespace.setDefaults({
                "remove-trailing": !0,
                "remove-indent": !0,
                "left-trim": !0,
                "right-trim": !0,
                "tabs-to-spaces": 4,
                "spaces-to-tabs": 4,
            });
    }
    initToggle() {
        document.querySelectorAll("[data-toggler]").forEach((e) => {
            let t = e.querySelector("[data-toggler-on]"),
                i = e.querySelector("[data-toggler-off]"),
                a = "on" === e.getAttribute("data-toggler"),
                s = () => {
                    a
                        ? (t?.classList.remove("d-none"),
                          i?.classList.add("d-none"))
                        : (t?.classList.add("d-none"),
                          i?.classList.remove("d-none"));
                };
            (t?.addEventListener("click", () => {
                ((a = !1), s());
            }),
                i?.addEventListener("click", () => {
                    ((a = !0), s());
                }),
                s());
        });
    }
    initDismissible() {
        document.querySelectorAll("[data-dismissible]").forEach((e) => {
            e.addEventListener("click", () => {
                var t = e.getAttribute("data-dismissible");
                (t = document.querySelector(t)) && t.remove();
            });
        });
    }
    initLeftSidebar() {
        let e = document.querySelector(".side-nav");
        if (e) {
            e.querySelectorAll("li [data-bs-toggle='collapse']").forEach(
                (e) => {
                    e.addEventListener("click", (e) => e.preventDefault());
                },
            );
            let t = e.querySelectorAll("li .collapse"),
                i =
                    (t.forEach((i) => {
                        i.addEventListener("show.bs.collapse", (i) => {
                            let a = i.target,
                                s = [],
                                o = a.parentElement;
                            for (; o && o !== e; )
                                (o.classList.contains("collapse") && s.push(o),
                                    (o = o.parentElement));
                            t.forEach((e) => {
                                e === a ||
                                    s.includes(e) ||
                                    new bootstrap.Collapse(e, {
                                        toggle: !1,
                                    }).hide();
                            });
                        });
                    }),
                    window.location.href.split(/[?#]/)[0]);
            (e.querySelectorAll("a").forEach((t) => {
                if (t.href === i) {
                    (e
                        .querySelectorAll("a.active, li.active, .collapse.show")
                        .forEach((e) => {
                            (e.classList.remove("active"),
                                e.classList.remove("show"));
                        }),
                        t.classList.add("active"));
                    let i = t.closest("li");
                    for (; i && i !== e; ) {
                        i.classList.add("active");
                        var a = i.closest(".collapse");
                        i = a
                            ? (new bootstrap.Collapse(a, { toggle: !1 }).show(),
                              (a = a.closest("li")) &&
                                  a.classList.add("active"),
                              a)
                            : i.parentElement;
                    }
                }
            }),
                setTimeout(() => {
                    var t = e.querySelector("li.active .active"),
                        i = document.querySelector(
                            ".sidenav-menu .simplebar-content-wrapper",
                        );
                    if (t && i && 100 < (t = t.offsetTop - 300)) {
                        var a = i;
                        i = t;
                        let e = a.scrollTop,
                            s = i - e,
                            o = 0;
                        !(function t() {
                            var i, n, r;
                            ((o += 20),
                                (a.scrollTop =
                                    ((i = o),
                                    (n = e),
                                    (r = s),
                                    (i /= 300) < 1
                                        ? (r / 2) * i * i + n
                                        : (-r / 2) * (--i * (i - 2) - 1) + n)),
                                o < 600 && setTimeout(t, 20));
                        })();
                    }
                }, 200));
        }
    }
    initTopbarMenu() {
        var e = document.querySelector(".navbar-nav");
        if (e) {
            let t = window.location.href.split(/[?#]/)[0];
            e.querySelectorAll("li a").forEach((e) => {
                if (e.href === t) {
                    e.classList.add("active");
                    let t = e.parentElement;
                    for (let e = 0; e < 6 && t && t !== document.body; e++)
                        (("LI" !== t.tagName &&
                            !t.classList.contains("dropdown")) ||
                            t.classList.add("active"),
                            (t = t.parentElement));
                }
            });
            let i = document.querySelector(".navbar-toggle"),
                a = document.getElementById("navigation");
            i &&
                a &&
                i.addEventListener("click", () => {
                    (i.classList.toggle("open"),
                        "block" === a.style.display
                            ? (a.style.display = "none")
                            : (a.style.display = "block"));
                });
        }
    }
    initEditor() {
        document.querySelector("#txtEditor") &&
            "undefined" != typeof tinymce &&
            tinymce.init({
                selector: "#txtEditor",
                license_key: "gpl",
                language: "es",
                promotion: !1,
                base_url: "/assets/js/plugins/tinymce",
                suffix: ".min",
                plugins: "lists link image table code help wordcount",
                toolbar:
                    "undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | removeformat | help",
                setup: function (e) {
                    e.on("change", function () {
                        e.save();
                    });
                },
            });
    }

    initLogout() {
        const logoutBtn = document.querySelector('#btn-logout-manual');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const form = document.getElementById('logout-form');
                if (form) form.submit();
            });
        }
    }
}
let skinPresets = {
    classic: {
        theme: "light",
        topbar: "light",
        menu: "dark",
        sidenav: { user: !0 },
    },
    modern: {
        theme: "light",
        topbar: "light",
        menu: "gradient",
        sidenav: { user: !0 },
    },
    material: {
        theme: "light",
        topbar: "dark",
        menu: "light",
        sidenav: { user: !0 },
    },
    saas: {
        theme: "light",
        topbar: "light",
        menu: "dark",
        sidenav: { user: !0 },
    },
    minimal: {
        theme: "light",
        topbar: "light",
        menu: "gray",
        sidenav: { user: !1 },
    },
    flat: {
        theme: "light",
        topbar: "light",
        menu: "dark",
        sidenav: { user: !1 },
    },
};
class LayoutCustomizer {
    constructor() {
        ((this.html = document.documentElement), (this.config = {}));
    }
    init() {
        (this.initConfig(),
            this.initSwitchListener(),
            this.initWindowSize(),
            this._adjustLayout(),
            this.setSwitchFromConfig(),
            this.openCustomizer());
    }
    initConfig() {
        ((this.defaultConfig = JSON.parse(
            JSON.stringify(window.defaultConfig),
        )),
            (this.config = JSON.parse(JSON.stringify(window.config))),
            this.setSwitchFromConfig());
    }
    isFirstVisit() {
        return (
            !localStorage.getItem("__user_has_visited__") &&
            (localStorage.setItem("__user_has_visited__", "true"), !0)
        );
    }
    openCustomizer() {
        var e = document.getElementById("theme-settings-offcanvas");
        if (e && this.isFirstVisit()) {
            let t = new bootstrap.Offcanvas(e);
            setTimeout(() => {
                t.show();
            }, 1e3);
        }
    }
    applyPreset(e) {
        ((e = skinPresets?.[e]),
            e &&
                (e.theme &&
                    ((this.config.theme = e.theme),
                    this.html.setAttribute("data-bs-theme", e.theme)),
                e.topbar &&
                    ((this.config.topbar.color = e.topbar),
                    this.html.setAttribute("data-topbar-color", e.topbar)),
                e.menu &&
                    ((this.config.menu.color = e.menu),
                    this.html.setAttribute("data-menu-color", e.menu)),
                e.sidenav?.size &&
                    ((this.config.sidenav.size = e.sidenav.size),
                    this.html.setAttribute(
                        "data-sidenav-size",
                        e.sidenav.size,
                    )),
                void 0 !== e.sidenav?.user) &&
                ((this.config.sidenav.user = e.sidenav.user),
                e.sidenav.user
                    ? this.html.setAttribute("data-sidenav-user", "true")
                    : this.html.removeAttribute("data-sidenav-user")));
    }
    changeSkin(e) {
        ((this.config.skin = e),
            this.html.setAttribute("data-skin", e),
            this.applyPreset(e),
            this.setSwitchFromConfig());
    }
    changeMenuColor(e) {
        ((this.config.menu.color = e),
            this.html.setAttribute("data-menu-color", e),
            this.setSwitchFromConfig());
    }
    changeLeftbarSize(e, t = !0) {
        (this.html.setAttribute("data-sidenav-size", e),
            t && ((this.config.sidenav.size = e), this.setSwitchFromConfig()));
    }
    changeLayoutPosition(e) {
        ((this.config.layout.position = e),
            this.html.setAttribute("data-layout-position", e),
            this.setSwitchFromConfig());
    }
    getSystemTheme() {
        return window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light";
    }
    changeTheme(e) {
        ("system" === e && this.getSystemTheme(),
            (this.config.theme = e),
            this.html.setAttribute(
                "data-bs-theme",
                "system" === e ? this.getSystemTheme() : e,
            ),
            this.setSwitchFromConfig());
    }
    changeTopbarColor(e) {
        ((this.config.topbar.color = e),
            this.html.setAttribute("data-topbar-color", e),
            this.setSwitchFromConfig());
    }
    changeSidebarUser(e) {
        ((this.config.sidenav.user = e)
            ? this.html.setAttribute("data-sidenav-user", e)
            : this.html.removeAttribute("data-sidenav-user"),
            this.setSwitchFromConfig());
    }
    resetTheme() {
        ((this.config = JSON.parse(JSON.stringify(window.defaultConfig))),
            this.changeSkin(this.config.skin),
            this.changeMenuColor(this.config.menu.color),
            this.changeLeftbarSize(this.config.sidenav.size),
            this.changeTheme(this.config.theme),
            this.changeLayoutPosition(this.config.layout.position),
            this.changeTopbarColor(this.config.topbar.color),
            this.changeSidebarUser(this.config.sidenav.user),
            this._adjustLayout());
    }
    setSwitchFromConfig() {
        var e = this.config;
        (sessionStorage.setItem("__INSPINIA_CONFIG__", JSON.stringify(e)),
            document
                .querySelectorAll("#theme-settings-offcanvas input[type=radio]")
                .forEach((e) => (e.checked = !1)),
            ((e, t) => {
                (e = document.querySelector(e)) && (e.checked = t);
            })('input[name="sidebar-user"]', !0 === e.sidenav.user),
            [
                ["data-skin", e.skin],
                ["data-bs-theme", e.theme],
                ["data-layout-position", e.layout.position],
                ["data-topbar-color", e.topbar.color],
                ["data-menu-color", e.menu.color],
                ["data-sidenav-size", e.sidenav.size],
            ].forEach(([e, t]) => {
                (e = document.querySelector(
                    `input[name="${e}"][value="${t}"]`,
                )) && (e.checked = !0);
            }));
    }
    initSwitchListener() {
        var e;
        ((e =
            ((e =
                ((e =
                    ((e =
                        ((e = (e, t) => {
                            document
                                .querySelectorAll(e)
                                .forEach((e) =>
                                    e.addEventListener("change", () => t(e)),
                                );
                        })('input[name="data-skin"]', (e) =>
                            this.changeSkin(e.value),
                        ),
                        e('input[name="data-bs-theme"]', (e) =>
                            this.changeTheme(e.value),
                        ),
                        e('input[name="data-menu-color"]', (e) =>
                            this.changeMenuColor(e.value),
                        ),
                        e('input[name="data-sidenav-size"]', (e) =>
                            this.changeLeftbarSize(e.value),
                        ),
                        e('input[name="data-layout-position"]', (e) =>
                            this.changeLayoutPosition(e.value),
                        ),
                        e('input[name="data-topbar-color"]', (e) =>
                            this.changeTopbarColor(e.value),
                        ),
                        e('input[name="sidebar-user"]', (e) =>
                            this.changeSidebarUser(e.checked),
                        ),
                        document.getElementById("light-dark-mode"))) &&
                        e.addEventListener("click", () => {
                            var e =
                                "light" === this.config.theme
                                    ? "dark"
                                    : "light";
                            this.changeTheme(e);
                        }),
                    document.querySelector("#reset-layout"))) &&
                    e.addEventListener("click", () => this.resetTheme()),
                document.querySelector(".sidenav-toggle-button"))) &&
                e.addEventListener("click", () => this._toggleSidebar()),
            document.querySelector(".button-close-offcanvas"))) &&
            e.addEventListener("click", () => {
                (this.html.classList.remove("sidebar-enable"),
                    this.hideBackdrop());
            }),
            document.querySelectorAll(".button-on-hover").forEach((e) => {
                e.addEventListener("click", () => {
                    var e = this.html.getAttribute("data-sidenav-size");
                    this.changeLeftbarSize(
                        "on-hover-active" === e
                            ? "on-hover"
                            : "on-hover-active",
                        !0,
                    );
                });
            }));
    }
    _toggleSidebar() {
        var e = this.html.getAttribute("data-sidenav-size"),
            t = this.config.sidenav.size;
        ("offcanvas" === e
            ? this.showBackdrop()
            : "compact" === t
              ? this.changeLeftbarSize(
                    "condensed" === e ? "compact" : "condensed",
                    !1,
                )
              : this.changeLeftbarSize(
                    "condensed" === e ? "default" : "condensed",
                    !0,
                ),
            this.html.classList.toggle("sidebar-enable"));
    }
    showBackdrop() {
        var e = document.createElement("div");
        ((e.id = "custom-backdrop"),
            (e.className = "offcanvas-backdrop fade show"),
            document.body.appendChild(e),
            (document.body.style.overflow = "hidden"),
            767 < window.innerWidth &&
                (document.body.style.paddingRight = "15px"),
            e.addEventListener("click", () => {
                (this.html.classList.remove("sidebar-enable"),
                    this.hideBackdrop());
            }));
    }
    hideBackdrop() {
        var e = document.getElementById("custom-backdrop");
        e &&
            (document.body.removeChild(e),
            (document.body.style.overflow = ""),
            (document.body.style.paddingRight = ""));
    }
    _adjustLayout() {
        var e = window.innerWidth,
            t = this.config.sidenav.size;
        e <= 767.98
            ? this.changeLeftbarSize("offcanvas", !1)
            : e <= 1140 && !["offcanvas"].includes(t)
              ? this.changeLeftbarSize("condensed", !1)
              : this.changeLeftbarSize(t);
    }
    initWindowSize() {
        window.addEventListener("resize", () => this._adjustLayout());
    }
}
class Plugins {
    init() {
        (this.initFlatPicker(), this.initTouchSpin());
    }
    initFlatPicker() {
        document.querySelectorAll("[data-provider]").forEach((e) => {
            var t = e.getAttribute("data-provider"),
                i = e.attributes,
                a = { disableMobile: !0, defaultDate: new Date() };
            "flatpickr" === t
                ? (i["data-date-format"] &&
                      (a.dateFormat = i["data-date-format"].value),
                  i["data-enable-time"] &&
                      ((a.enableTime = !0), (a.dateFormat += " H:i")),
                  i["data-altFormat"] &&
                      ((a.altInput = !0),
                      (a.altFormat = i["data-altFormat"].value)),
                  i["data-minDate"] && (a.minDate = i["data-minDate"].value),
                  i["data-maxDate"] && (a.maxDate = i["data-maxDate"].value),
                  i["data-default-date"] &&
                      (a.defaultDate = i["data-default-date"].value),
                  i["data-multiple-date"] && (a.mode = "multiple"),
                  i["data-range-date"] && (a.mode = "range"),
                  i["data-inline-date"] &&
                      ((a.inline = !0),
                      (a.defaultDate = i["data-default-date"].value)),
                  i["data-disable-date"] &&
                      (a.disable = i["data-disable-date"].value.split(",")),
                  i["data-week-number"] && (a.weekNumbers = !0),
                  flatpickr(e, a))
                : "timepickr" === t &&
                  ((a = {
                      enableTime: !0,
                      noCalendar: !0,
                      dateFormat: "H:i",
                      defaultDate: new Date(),
                  }),
                  i["data-time-hrs"] && (a.time_24hr = !0),
                  i["data-min-time"] && (a.minTime = i["data-min-time"].value),
                  i["data-max-time"] && (a.maxTime = i["data-max-time"].value),
                  i["data-default-time"] &&
                      (a.defaultDate = i["data-default-time"].value),
                  i["data-time-inline"] &&
                      ((a.inline = !0),
                      (a.defaultDate = i["data-time-inline"].value)),
                  flatpickr(e, a));
        });
    }
    initTouchSpin() {
        document.querySelectorAll("[data-touchspin]").forEach((e) => {
            var t = e.querySelector("[data-minus]"),
                i = e.querySelector("[data-plus]");
            let a = e.querySelector("input");
            if (a) {
                let e = Number(a.min),
                    s = Number(a.max ?? 0),
                    o = Number.isFinite(e),
                    n = Number.isFinite(s),
                    r = () => Number.parseInt(a.value) || 0;
                a.hasAttribute("readonly") ||
                    (t &&
                        t.addEventListener("click", () => {
                            var t = r() - 1;
                            (!o || t >= e) && (a.value = t.toString());
                        }),
                    i &&
                        i.addEventListener("click", () => {
                            var e = r() + 1;
                            (!n || e <= s) && (a.value = e.toString());
                        }));
            }
        });
    }
}
class I18nManager {
    constructor({
        defaultLang: e = "en",
        langPath: t = "assets/data/translations/",
        langImageSelector: i = "#selected-language-image",
        langCodeSelector: a = "#selected-language-code",
        translationKeySelector: s = "[data-lang]",
        translationKeyAttribute: o = "data-lang",
        languageSelector: n = "[data-translator-lang]",
    } = {}) {
        ((this.selectedLanguage =
            sessionStorage.getItem("__INSPINIA_LANG__") || e),
            (this.langPath = t),
            (this.langImageSelector = i),
            (this.langCodeSelector = a),
            (this.translationKeySelector = s),
            (this.translationKeyAttribute = o),
            (this.languageSelector = n),
            (this.selectedLanguageImage = document.querySelector(
                this.langImageSelector,
            )),
            (this.selectedLanguageCode = document.querySelector(
                this.langCodeSelector,
            )),
            (this.languageButtons = document.querySelectorAll(
                this.languageSelector,
            )));
    }
    async init() {
        (await this.applyTranslations(),
            this.updateSelectedImage(),
            this.updateSelectedCode(),
            this.bindLanguageSwitchers());
    }
    async loadTranslations() {
        try {
            var e = await fetch(
                "" + this.langPath + this.selectedLanguage + ".json",
            );
            if (e.ok) return await e.json();
            throw new Error(`Failed to load ${this.selectedLanguage}.json`);
        } catch (e) {
            return {};
        }
    }
    async applyTranslations() {
        let e = await this.loadTranslations();
        document.querySelectorAll(this.translationKeySelector).forEach((t) => {
            var i = t.getAttribute(this.translationKeyAttribute),
                a = ((a = e), i.split(".").reduce((e, t) => e?.[t] ?? null, a));
            a && (t.innerHTML = a);
        });
    }
    setLanguage(e) {
        ((this.selectedLanguage = e),
            localStorage.setItem("__INSPINIA_LANG__", e),
            this.applyTranslations(),
            this.updateSelectedImage(),
            this.updateSelectedCode());
    }
    updateSelectedImage() {
        var e = document.querySelector(
            `[data-translator-lang="${this.selectedLanguage}"] [data-translator-image]`,
        );
        e &&
            this.selectedLanguageImage &&
            (this.selectedLanguageImage.src = e.src);
    }
    updateSelectedCode() {
        this.selectedLanguageCode &&
            (this.selectedLanguageCode.textContent =
                this.selectedLanguage.toUpperCase());
    }
    bindLanguageSwitchers() {
        this.languageButtons.forEach((e) => {
            e.addEventListener("click", () => {
                var t = e.dataset.translatorLang;
                t && t !== this.selectedLanguage && this.setLanguage(t);
            });
        });
    }
}
document.addEventListener("DOMContentLoaded", function (e) {
    (new App().init(),
        new LayoutCustomizer().init(),
        new Plugins().init(),
        new I18nManager().init());
});
let ins = (e, t = 1) => {
    var i = getComputedStyle(document.documentElement)
        .getPropertyValue("--ins-" + e)
        .trim();
    return e.includes("-rgb") ? `rgba(${i}, ${t})` : i;
};
function debounce(e, t) {
    let i;
    return function () {
        (clearTimeout(i), (i = setTimeout(e, t)));
    };
}
class CustomApexChart {
    constructor({
        selector: e,
        series: t = [],
        options: i = {},
        colors: a = [],
    }) {
        if (e) {
            ((this.selector = e),
                (this.series = t),
                (this.getOptions = i),
                (this.colors = a),
                this.selector instanceof HTMLElement
                    ? (this.element = this.selector)
                    : (this.element = document.querySelector(this.selector)),
                (this.chart = null));
            try {
                (this.render(), CustomApexChart.instances.push(this));
            } catch (e) {}
        }
    }
    getColors() {
        var e = this.getOptions();
        return e?.colors?.length
            ? e.colors
            : this.element &&
                (e = this.element.getAttribute("data-colors")) &&
                (e = e
                    .split(",")
                    .map((e) => e.trim())
                    .map((e) =>
                        e.startsWith("#") || e.includes("rgb") ? e : ins(e),
                    )).length
              ? e
              : [ins("primary"), ins("secondary"), ins("danger")];
    }
    render() {
        if ((this.chart && this.chart.destroy(), this.element)) {
            let e = JSON.parse(JSON.stringify(this.getOptions()));
            ((e.colors = this.getColors()),
                (e = this.injectDynamicColors(e, e.colors)).series ||
                    (e.series = this.series),
                (this.chart = new ApexCharts(this.element, e)),
                this.chart.render());
        }
    }
    injectDynamicColors(e, t) {
        var i;
        return (
            "boxplot" === e.chart?.type?.toLowerCase() &&
                ((e.plotOptions = e.plotOptions || {}),
                (e.plotOptions.boxPlot = e.plotOptions.boxPlot || {}),
                (e.plotOptions.boxPlot.colors =
                    e.plotOptions.boxPlot.colors || {}),
                (e.plotOptions.boxPlot.colors.upper =
                    e.plotOptions.boxPlot.colors.upper || t[0]),
                (e.plotOptions.boxPlot.colors.lower =
                    e.plotOptions.boxPlot.colors.lower || t[1])),
            Array.isArray(e.yaxis) &&
                e.yaxis.forEach((e, i) => {
                    ((i = t[i] || this.colors[i] || "#999"),
                        (e.axisBorder = e.axisBorder || {}),
                        (e.axisBorder.color = e.axisBorder.color || i),
                        (e.labels = e.labels || {}),
                        (e.labels.style = e.labels.style || {}),
                        (e.labels.style.color = e.labels.style.color || i));
                }),
            e.markers && !e.markers.strokeColor && (e.markers.strokeColor = t),
            "gradient" === e.fill?.type &&
                e.fill.gradient &&
                (e.fill.gradient.gradientToColors =
                    e.fill.gradient.gradientToColors || t),
            e.plotOptions?.treemap?.colorScale?.ranges &&
                (0 < (i = e.plotOptions.treemap.colorScale.ranges).length &&
                    !i[0].color &&
                    (i[0].color = t[0]),
                1 < i.length) &&
                !i[1].color &&
                (i[1].color = t[1]),
            e
        );
    }
    static rerenderAll() {
        if (0 < CustomApexChart.instances.length)
            for (var e of CustomApexChart.instances) e.render();
    }
}
class CustomEChart {
    constructor({
        selector: e,
        options: t = {},
        theme: i = null,
        initOptions: a = {},
    }) {
        if (e) {
            ((this.selector = e),
                (this.element = null),
                (this.getOptions = t),
                (this.theme = i),
                (this.initOptions = a),
                (this.chart = null));
            try {
                (this.render(), CustomEChart.instances.push(this));
            } catch (e) {}
        }
    }
    render() {
        try {
            var e;
            (this.selector instanceof HTMLElement
                ? (this.element = this.selector)
                : (this.element = document.querySelector(this.selector)),
                this.chart && this.chart.dispose(),
                this.element &&
                    ((e = this.getOptions()),
                    (this.chart = echarts.init(
                        this.element,
                        this.theme,
                        this.initOptions,
                    )),
                    this.chart.setOption(e),
                    window.addEventListener(
                        "resize",
                        debounce(() => {
                            this.chart.resize();
                        }, 200),
                    )));
        } catch (e) {}
    }
    static reSizeAll() {
        if (0 < CustomEChart.instances.length)
            for (let e of CustomEChart.instances)
                e.element &&
                    null !== e.element.offsetParent &&
                    requestAnimationFrame(() => {
                        e.chart.on("finished", () => {
                            requestAnimationFrame(() => {
                                e.chart.resize();
                            });
                        });
                    });
    }
    static rerenderAll() {
        if (0 < CustomEChart.instances.length)
            for (var e of CustomEChart.instances) e.render();
    }
}
((CustomApexChart.instances = []), (CustomEChart.instances = []));
let themeObserver = new MutationObserver(() => {
        (CustomApexChart.rerenderAll(), CustomEChart.rerenderAll());
    }),
    menuObserver =
        (themeObserver.observe(document.documentElement, {
            attributes: !0,
            attributeFilter: ["data-skin", "data-bs-theme"],
        }),
        new MutationObserver(() => {
            requestAnimationFrame(() => {
                CustomEChart.reSizeAll();
            });
        }));
menuObserver.observe(document.documentElement, {
    attributes: !0,
    attributeFilter: ["data-sidenav-size"],
});
