! function (e) {
    "use strict";
    e.fn.meanmenu = function (n) {
        var a = {
            meanMenuTarget: jQuery(this),
            meanMenuContainer: ".sinmun-mobile-nav",
            meanMenuClose: "X",
            meanMenuCloseSize: "18px",
            meanMenuOpen: "<span /><span /><span />",
            meanRevealPosition: "right",
            meanRevealPositionDistance: "0",
            meanRevealColour: "",
            meanScreenWidth: "480",
            meanNavPush: "",
            meanShowChildren: !0,
            meanExpandableChildren: !0,
            meanExpand: "+",
            meanContract: "-",
            meanRemoveAttrs: !1,
            onePage: !1,
            meanDisplay: "block",
            removeElements: ""
        };
        n = e.extend(a, n);
        var t = window.innerWidth || document.documentElement.clientWidth;
        return this.each(function () {
            var e = n.meanMenuTarget,
                a = n.meanMenuContainer,
                r = n.meanMenuClose,
                i = n.meanMenuCloseSize,
                s = n.meanMenuOpen,
                u = n.meanRevealPosition,
                m = n.meanRevealPositionDistance,
                l = n.meanRevealColour,
                o = n.meanScreenWidth,
                c = n.meanNavPush,
                v = ".meanmenu-reveal",
                h = n.meanShowChildren,
                d = n.meanExpandableChildren,
                y = n.meanExpand,
                j = n.meanContract,
                Q = n.meanRemoveAttrs,
                f = n.onePage,
                g = n.meanDisplay,
                p = n.removeElements,
                C = !1;
            (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/Blackberry/i) || navigator.userAgent.match(/Windows Phone/i)) && (C = !0), (navigator.userAgent.match(/MSIE 8/i) || navigator.userAgent.match(/MSIE 7/i)) && jQuery("html").css("overflow-y", "scroll");
            var w = "",
                x = function () {
                    if ("center" === u) {
                        var e = (window.innerWidth || document.documentElement.clientWidth) / 2 - 22 + "px";
                        w = "left:" + e + ";right:auto;", C ? jQuery(".meanmenu-reveal").animate({
                            left: e
                        }) : jQuery(".meanmenu-reveal").css("left", e)
                    }
                },
                A = !1,
                E = !1;
            "right" === u && (w = "right:" + m + ";left:auto;"), "left" === u && (w = "left:" + m + ";right:auto;"), x();
            var M = "",
                P = function () {
                    M.html(jQuery(M).is(".meanmenu-reveal.meanclose") ? r : s)
                },
                W = function () {
                    jQuery(".mean-bar,.mean-push").remove(), jQuery(a).removeClass("mean-container"), jQuery(e).css("display", g), A = !1, E = !1, jQuery(p).removeClass("mean-remove")
                },
                b = function () {
                    var n = "background:" + l + ";color:" + l + ";" + w;
                    if (o >= t) {
                        jQuery(p).addClass("mean-remove"), E = !0, jQuery(a).addClass("mean-container"), jQuery(".mean-container").prepend('<div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="' + n + '">Show Navigation</a><nav class="mean-nav"></nav></div>');
                        var r = jQuery(e).html();
                        jQuery(".mean-nav").html(r), Q && jQuery("nav.mean-nav ul, nav.mean-nav ul *").each(function () {
                            jQuery(this).is(".mean-remove") ? jQuery(this).attr("class", "mean-remove") : jQuery(this).removeAttr("class"), jQuery(this).removeAttr("id")
                        }), jQuery(e).before('<div class="mean-push" />'), jQuery(".mean-push").css("margin-top", c), jQuery(e).hide(), jQuery(".meanmenu-reveal").show(), jQuery(v).html(s), M = jQuery(v), jQuery(".mean-nav ul").hide(), h ? d ? (jQuery(".mean-nav ul ul").each(function () {
                            jQuery(this).children().length && jQuery(this, "li:first").parent().append('<a class="mean-expand" href="#" style="font-size: ' + i + '">' + y + "</a>")
                        }), jQuery(".mean-expand").on("click", function (e) {
                            e.preventDefault(), jQuery(this).hasClass("mean-clicked") ? (jQuery(this).text(y), jQuery(this).prev("ul").slideUp(300, function () {})) : (jQuery(this).text(j), jQuery(this).prev("ul").slideDown(300, function () {})), jQuery(this).toggleClass("mean-clicked")
                        })) : jQuery(".mean-nav ul ul").show() : jQuery(".mean-nav ul ul").hide(), jQuery(".mean-nav ul li").last().addClass("mean-last"), M.removeClass("meanclose"), jQuery(M).click(function (e) {
                            e.preventDefault(), !1 === A ? (M.css("text-align", "center"), M.css("text-indent", "0"), M.css("font-size", i), jQuery(".mean-nav ul:first").slideDown(), A = !0) : (jQuery(".mean-nav ul:first").slideUp(), A = !1), M.toggleClass("meanclose"), P(), jQuery(p).addClass("mean-remove")
                        }), f && jQuery(".mean-nav ul > li > a:first-child").on("click", function () {
                            jQuery(".mean-nav ul:first").slideUp(), A = !1, jQuery(M).toggleClass("meanclose").html(s)
                        })
                    } else W()
                };
            C || jQuery(window).resize(function () {
                t = window.innerWidth || document.documentElement.clientWidth, W(), o >= t ? (b(), x()) : W()
            }), jQuery(window).resize(function () {
                t = window.innerWidth || document.documentElement.clientWidth, C ? (x(), o >= t ? !1 === E && b() : W()) : (W(), o >= t && (b(), x()))
            }), b()
        })
    }
}(jQuery);