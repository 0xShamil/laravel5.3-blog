;
(function($) {
    $.fn.unveil = function(threshold, callback) {
        var $w = $(window),
            th = threshold || 0,
            retina = window.devicePixelRatio > 1,
            attrib = retina ? "data-src-retina" : "data-src",
            images = this,
            loaded;
        this.one("unveil", function() {
            var source = this.getAttribute(attrib);
            source = source || this.getAttribute("data-src");
            if (source) {
                this.setAttribute("src", source);
                if (typeof callback === "function") callback.call(this);
            }
        });

        function unveil() {
            var inview = images.filter(function() {
                var $e = $(this);
                if ($e.is(":hidden")) return;
                var wt = $w.scrollTop(),
                    wb = wt + $w.height(),
                    et = $e.offset().top,
                    eb = et + $e.height();
                return eb >= wt - th && et <= wb + th;
            });
            loaded = inview.trigger("unveil");
            images = images.not(loaded);
        }
        $w.on("scroll.unveil resize.unveil lookup.unveil", unveil);
        unveil();
        return this;
    };
})(window.jQuery || window.Zepto);
jQuery(function($) {
    $(document).ready(function() {
        $('figure img').unveil();
    })
    $('#offcanvas-toggler').on('click', function(event) {
        event.preventDefault();
        $('body').addClass('offcanvas');
    });
    $('.close-offcanvas, .offcanvas-overlay').on('click', function(event) {
        event.preventDefault();
        $('body').removeClass('offcanvas');
    });
    $('.sp-megamenu-wrapper').parent().parent().css('position', 'static').parent().css('position', 'relative');
    $('.sp-menu-full').each(function() {
        $(this).parent().addClass('menu-justify');
    });
    $('[data-toggle="tooltip"]').tooltip();
    $(document).ready(function() {
        $('body.skeleton #sp-right, body.view-article #sp-right').theiaStickySidebar({
            additionalMarginTop: 100
        });
    });
    if ($("#sp-header").length > 0) {
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                $("#sp-header").addClass('fixed-header animated fadeInDown');
            } else {
                $("#sp-header").removeClass('fixed-header animated fadeInDown');
            }
        });
    }
});
