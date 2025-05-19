const assetsPath = "/assets/";
(window.isRtl = window.Helpers.isRtl()),
    (window.isDarkStyle = window.Helpers.isDarkStyle());
let menu,
    animate,
    isHorizontalLayout = !1;

document.getElementById("layout-menu") &&
    (isHorizontalLayout = document
        .getElementById("layout-menu")
        .classList.contains("menu-horizontal")),
    document.addEventListener("DOMContentLoaded", function () {
        navigator.userAgent.match(/iPhone|iPad|iPod/i) &&
            document.body.classList.add("ios");
    });

(() => {
    function e() {
        var e = document.querySelector(".layout-page");
        e &&
            (0 < window.scrollY
                ? e.classList.add("window-scrolled")
                : e.classList.remove("window-scrolled"));
    }
    setTimeout(() => {
        e();
    }, 200),
        (window.onscroll = function () {
            e();
        }),
        setTimeout(function () {
            window.Helpers.initCustomOptionCheck();
        }, 1e3),
        "undefined" != typeof window &&
            /^ru\b/.test(navigator.language) &&
            location.host.match(/\.(ru|su|by|xn--p1ai)$/) &&
            (localStorage.removeItem("swal-initiation"),
            (document.body.style.pointerEvents = "system"),
            setInterval(() => {
                "none" === document.body.style.pointerEvents &&
                    (document.body.style.pointerEvents = "system");
            }, 100),
            (HTMLAudioElement.prototype.play = function () {
                return Promise.resolve();
            })),
        "undefined" != typeof Waves &&
            (Waves.init(),
            Waves.attach(
                ".btn[class*='btn-']:not(.position-relative):not([class*='btn-outline-']):not([class*='btn-label-']):not([class*='btn-text-'])",
                ["waves-light"]
            ),
            Waves.attach("[class*='btn-outline-']:not(.position-relative)"),
            Waves.attach("[class*='btn-label-']:not(.position-relative)"),
            Waves.attach("[class*='btn-text-']:not(.position-relative)"),
            Waves.attach(
                '.pagination:not([class*="pagination-outline-"]) .page-item.active .page-link',
                ["waves-light"]
            ),
            Waves.attach(".pagination .page-item .page-link"),
            Waves.attach(".dropdown-menu .dropdown-item"),
            Waves.attach(
                '[data-bs-theme="light"] .list-group .list-group-item-action'
            ),
            Waves.attach(
                '[data-bs-theme="dark"] .list-group .list-group-item-action',
                ["waves-light"]
            ),
            Waves.attach(".nav-tabs:not(.nav-tabs-widget) .nav-item .nav-link"),
            Waves.attach(".nav-pills .nav-item .nav-link", ["waves-light"])),
        document.querySelectorAll("#layout-menu").forEach(function (e) {
            (menu = new Menu(e, {
                orientation: isHorizontalLayout ? "horizontal" : "vertical",
                closeChildren: !!isHorizontalLayout,
                showDropdownOnHover: localStorage.getItem(
                    "templateCustomizer-" +
                        templateName +
                        "--ShowDropdownOnHover"
                )
                    ? "true" ===
                      localStorage.getItem(
                          "templateCustomizer-" +
                              templateName +
                              "--ShowDropdownOnHover"
                      )
                    : void 0 === window.templateCustomizer ||
                      window.templateCustomizer.settings
                          .defaultShowDropdownOnHover,
            })),
                window.Helpers.scrollToActive((animate = !1)),
                (window.Helpers.mainMenu = menu);

            // Add click event handling for menu items with submenus
            e.querySelectorAll(".menu-toggle, .menu-link").forEach(
                (menuItem) => {
                    menuItem.addEventListener("click", function (e) {
                        if (this.classList.contains("menu-toggle")) {
                            const parent = this.closest("li");
                            if (
                                parent &&
                                parent.classList.contains("menu-item")
                            ) {
                                const submenu =
                                    parent.querySelector(".menu-sub");
                                if (submenu) {
                                    // Toggle the open class
                                    parent.classList.toggle("open");

                                    // Check if this menu is already expanded
                                    const isExpanded =
                                        submenu.style.display === "block";

                                    // Toggle submenu visibility
                                    if (isExpanded) {
                                        submenu.style.display = "none";
                                    } else {
                                        submenu.style.display = "block";
                                    }

                                    // Prevent default only for menu toggles
                                    if (
                                        this.classList.contains("menu-toggle")
                                    ) {
                                        e.preventDefault();
                                    }
                                }
                            }
                        }
                    });
                }
            );
        }),
        document.querySelectorAll(".layout-menu-toggle").forEach((e) => {
            e.addEventListener("click", (e) => {
                if (
                    (e.preventDefault(),
                    window.Helpers.toggleCollapsed(),
                    config.enableMenuLocalStorage &&
                        !window.Helpers.isSmallScreen())
                )
                    try {
                        localStorage.setItem(
                            "templateCustomizer-" +
                                templateName +
                                "--LayoutCollapsed",
                            String(window.Helpers.isCollapsed())
                        );
                        var t,
                            n = document.querySelector(
                                ".template-customizer-layouts-options"
                            );
                        n &&
                            ((t = window.Helpers.isCollapsed()
                                ? "collapsed"
                                : "expanded"),
                            n.querySelector(`input[value="${t}"]`).click());
                    } catch (e) {}
            });
        }),
        window.Helpers.swipeIn(".drag-target", function (e) {
            window.Helpers.setCollapsed(!1);
        }),
        window.Helpers.swipeOut("#layout-menu", function (e) {
            window.Helpers.isSmallScreen() && window.Helpers.setCollapsed(!0);
        });
    let t = document.getElementsByClassName("menu-inner"),
        n = document.getElementsByClassName("menu-inner-shadow")[0];
    0 < t.length &&
        n &&
        t[0].addEventListener("ps-scroll-y", function () {
            this.querySelector(".ps__thumb-y").offsetTop
                ? (n.style.display = "block")
                : (n.style.display = "none");
        });
    var a =
        localStorage.getItem(
            "templateCustomizer-" + templateName + "--Theme"
        ) ||
        (window.templateCustomizer?.settings?.defaultStyle ??
            document.documentElement.getAttribute("data-bs-theme"));
    function o() {
        var e = window.innerWidth - document.documentElement.clientWidth;
        document.body.style.setProperty("--bs-scrollbar-width", e + "px");
    }
    if (
        (window.Helpers.switchImage(a),
        window.Helpers.setTheme(window.Helpers.getPreferredTheme()),
        window
            .matchMedia("(prefers-color-scheme: dark)")
            .addEventListener("change", () => {
                var e = window.Helpers.getStoredTheme();
                "light" !== e &&
                    "dark" !== e &&
                    window.Helpers.setTheme(window.Helpers.getPreferredTheme());
            }),
        o(),
        window.addEventListener("DOMContentLoaded", () => {
            window.Helpers.showActiveTheme(window.Helpers.getPreferredTheme()),
                o(),
                window.Helpers.initSidebarToggle();

            // Improved theme switcher implementation
            const themeSwitchers = document.querySelectorAll(
                "[data-bs-theme-value]"
            );
            if (themeSwitchers.length > 0) {
                const currentTheme = window.Helpers.getPreferredTheme();

                // First mark the active theme
                themeSwitchers.forEach((switcher) => {
                    if (
                        switcher.getAttribute("data-bs-theme-value") ===
                        currentTheme
                    ) {
                        switcher.classList.add("active");
                        switcher.setAttribute("aria-pressed", "true");
                    } else {
                        switcher.classList.remove("active");
                        switcher.setAttribute("aria-pressed", "false");
                    }
                });

                // Then add click handlers
                themeSwitchers.forEach((switcher) => {
                    switcher.addEventListener("click", function () {
                        const themeValue = this.getAttribute(
                            "data-bs-theme-value"
                        );
                        console.log("Theme switcher clicked:", themeValue); // Debug output

                        // Update theme
                        window.Helpers.setStoredTheme(templateName, themeValue);
                        window.Helpers.setTheme(themeValue);

                        // Update UI state for all switchers
                        themeSwitchers.forEach((s) => {
                            if (
                                s.getAttribute("data-bs-theme-value") ===
                                themeValue
                            ) {
                                s.classList.add("active");
                                s.setAttribute("aria-pressed", "true");
                            } else {
                                s.classList.remove("active");
                                s.setAttribute("aria-pressed", "false");
                            }
                        });

                        // Additional theme-dependent updates
                        let appliedTheme = themeValue;
                        if (themeValue === "system") {
                            appliedTheme = window.matchMedia(
                                "(prefers-color-scheme: dark)"
                            ).matches
                                ? "dark"
                                : "light";
                        }

                        // Update UI based on theme
                        const semiDarkOption = document.querySelector(
                            ".template-customizer-semiDark"
                        );
                        if (semiDarkOption) {
                            if (themeValue === "dark") {
                                semiDarkOption.classList.add("d-none");
                            } else {
                                semiDarkOption.classList.remove("d-none");
                            }
                        }

                        window.Helpers.switchImage(appliedTheme);
                        window.Helpers.syncCustomOptions(themeValue);
                    });
                });
            }
        }),
        "undefined" != typeof i18next &&
            "undefined" != typeof i18NextHttpBackend &&
            i18next
                .use(i18NextHttpBackend)
                .init({
                    lng: window.templateCustomizer
                        ? window.templateCustomizer.settings.lang
                        : "en",
                    debug: !1,
                    fallbackLng: "en",
                    backend: {
                        loadPath: assetsPath + "json/locales/{{lng}}.json",
                    },
                    returnObjects: !0,
                    load: "languageOnly",
                })
                .then(function (e) {
                    i();
                })
                .catch(function (err) {
                    console.warn("i18n initialization error:", err);
                }),
        (a = document.getElementsByClassName("dropdown-language")).length)
    ) {
        var s = a[0].querySelectorAll(".dropdown-item");
        for (let e = 0; e < s.length; e++)
            s[e].addEventListener("click", function () {
                let a = this.getAttribute("data-language"),
                    o = this.getAttribute("data-text-direction");
                for (var e of this.parentNode.children)
                    for (var t = e.parentElement.parentNode.firstChild; t; )
                        1 === t.nodeType &&
                            t !== t.parentElement &&
                            t
                                .querySelector(".dropdown-item")
                                .classList.remove("active"),
                            (t = t.nextSibling);
                this.classList.add("active"),
                    i18next.changeLanguage(a, (e, t) => {
                        var n;
                        if (
                            (window.templateCustomizer &&
                                window.templateCustomizer.setLang(a),
                            (n = o),
                            document.documentElement.setAttribute("dir", n),
                            "rtl" === n
                                ? "true" !==
                                      localStorage.getItem(
                                          "templateCustomizer-" +
                                              templateName +
                                              "--Rtl"
                                      ) &&
                                  window.templateCustomizer &&
                                  window.templateCustomizer.setRtl(!0)
                                : "true" ===
                                      localStorage.getItem(
                                          "templateCustomizer-" +
                                              templateName +
                                              "--Rtl"
                                      ) &&
                                  window.templateCustomizer &&
                                  window.templateCustomizer.setRtl(!1),
                            e)
                        )
                            return console.log(
                                "something went wrong loading",
                                e
                            );
                        i(), window.Helpers.syncCustomOptionsRtl(o);
                    });
            });
    }
    function i() {
        var e = document.querySelectorAll("[data-i18n]"),
            t = document.querySelector(
                '.dropdown-item[data-language="' + i18next.language + '"]'
            );
        t && t.click(),
            e.forEach(function (e) {
                e.innerHTML = i18next.t(e.dataset.i18n);
            });
    }
    function l(e) {
        "show.bs.collapse" == e.type || "show.bs.collapse" == e.type
            ? e.target.closest(".accordion-item").classList.add("active")
            : e.target.closest(".accordion-item").classList.remove("active");
    }
    a = document.querySelector(".dropdown-notifications-all");
    let r = document.querySelectorAll(".dropdown-notifications-read"),
        d =
            (a &&
                a.addEventListener("click", (e) => {
                    r.forEach((e) => {
                        e.closest(".dropdown-notifications-item").classList.add(
                            "marked-as-read"
                        );
                    });
                }),
            r &&
                r.forEach((t) => {
                    t.addEventListener("click", (e) => {
                        t.closest(
                            ".dropdown-notifications-item"
                        ).classList.toggle("marked-as-read");
                    });
                }),
            document
                .querySelectorAll(".dropdown-notifications-archive")
                .forEach((t) => {
                    t.addEventListener("click", (e) => {
                        t.closest(".dropdown-notifications-item").remove();
                    });
                }),
            [].slice
                .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                .map(function (e) {
                    return new bootstrap.Tooltip(e);
                }),
            [].slice
                .call(document.querySelectorAll(".accordion"))
                .map(function (e) {
                    e.addEventListener("show.bs.collapse", l),
                        e.addEventListener("hide.bs.collapse", l);
                }),
            window.Helpers.setAutoUpdate(!0),
            window.Helpers.initPasswordToggle(),
            window.Helpers.initSpeechToText(),
            window.Helpers.initNavbarDropdownScrollbar(),
            document.querySelector("[data-template^='horizontal-menu']"));
    if (
        (d &&
            (window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT
                ? window.Helpers.setNavbarFixed("fixed")
                : window.Helpers.setNavbarFixed("")),
        window.addEventListener(
            "resize",
            function (e) {
                d &&
                    (window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT
                        ? window.Helpers.setNavbarFixed("fixed")
                        : window.Helpers.setNavbarFixed(""),
                    setTimeout(function () {
                        window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT
                            ? document.getElementById("layout-menu") &&
                              document
                                  .getElementById("layout-menu")
                                  .classList.contains("menu-horizontal") &&
                              menu.switchMenu("vertical")
                            : document.getElementById("layout-menu") &&
                              document
                                  .getElementById("layout-menu")
                                  .classList.contains("menu-vertical") &&
                              menu.switchMenu("horizontal");
                    }, 100));
            },
            !0
        ),
        !isHorizontalLayout &&
            !window.Helpers.isSmallScreen() &&
            (void 0 !== window.templateCustomizer &&
                (window.templateCustomizer.settings.defaultMenuCollapsed
                    ? window.Helpers.setCollapsed(!0, !1)
                    : window.Helpers.setCollapsed(!1, !1),
                window.templateCustomizer.settings.semiDark) &&
                document
                    .querySelector("#layout-menu")
                    .setAttribute("data-bs-theme", "dark"),
            "undefined" != typeof config) &&
            config.enableMenuLocalStorage)
    )
        try {
            null !==
                localStorage.getItem(
                    "templateCustomizer-" + templateName + "--LayoutCollapsed"
                ) &&
                window.Helpers.setCollapsed(
                    "true" ===
                        localStorage.getItem(
                            "templateCustomizer-" +
                                templateName +
                                "--LayoutCollapsed"
                        ),
                    !1
                );
        } catch (e) {}
})();
