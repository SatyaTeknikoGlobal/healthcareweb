$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').on("click", function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    $('#back-to-top').tooltip('show');


});
jQuery(function ($) {

    'use strict';

    // -------------------------------------------------------------
    //  Fun-Facts Counter
    // -------------------------------------------------------------
    function count($this) {

        var current = parseInt($this.html(), 10);

        current = current + 1; /* Where 50 is increment */

        $this.html(++current);

        if (current > $this.data('count')) {

            $this.html($this.data('count'));

        } else {
            setTimeout(function () {
                count($this)
            }, 50);
        }

    }

    $(".stat-count").each(function () {

        $(this).data('count', parseInt($(this).html(), 10));

        $(this).html('0');

        count($(this));

    });



    // -------------------------------------------------------------
    //  Tooltip
    // -------------------------------------------------------------

    (function () {

        $('[data-toggle="tooltip"]').tooltip();

    }());


    // -------------------------------------------------------------
    // Accordion
    // -------------------------------------------------------------

    (function () {
        $('.collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus"></i>');
        });

        $('.collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus"></i>');
        });
    }());


    // -------------------------------------------------------------
    //  Checkbox Icon Change
    // -------------------------------------------------------------

    (function () {

        $('input[type="checkbox"]').change(function () {
            if ($(this).is(':checked')) {
                $(this).parent("label").addClass("checked");
            } else {
                $(this).parent("label").removeClass("checked");
            }
        });

    }());


    // -------------------------------------------------------------
    //  select-category Change
    // -------------------------------------------------------------
    $('.select-category.post-option ul li a').on('click', function () {
        $('.select-category.post-option ul li.link-active').removeClass('link-active');
        $(this).closest('li').addClass('link-active');
    });

    $('.subcategory.post-option ul li a').on('click', function () {
        $('.subcategory.post-option ul li.link-active').removeClass('link-active');
        $(this).closest('li').addClass('link-active');
    });



    // script end
});


// -------------------------------------------------------------
//  Owl Carousel TRUSTED BY
// -------------------------------------------------------------


(function () {

    $("#trusted-slider").owlCarousel({
        items: 3,
        nav: true,
        autoplay: true,
        dots: false,
        autoplayHoverPause: true,
        nav: false,
        navText: [
            "<i class='fa fa-angle-left '></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 2,
                slideBy: 2


            },
            500: {
                items: 3,
                slideBy: 3
            },
            991: {
                items: 4,
                slideBy: 4
            },
            1200: {
                items: 5,
                slideBy: 1
            },
        }

    });

}());


(function () {

    $("#featured-slider-two").owlCarousel({
        items: 4,
        nav: true,
        autoplay: true,
        dots: true,
        autoplayHoverPause: true,
        nav: true,
        navText: [
            "<i class='fa fa-angle-left '></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            991: {
                items: 3,
                slideBy: 1
            },
            1000: {
                items: 4,
                slideBy: 1
            },
        }

    });



}());

(function () {

    $(".testimonial-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        autoplayHoverPause: true
    });

}());


function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function (a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function () {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function () {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function () {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function () {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});


$(document).ready(function () {

    $("#owl-demo").owlCarousel({

        navigation: true, // Show next and prev buttons

        slideSpeed: 300,
        paginationSpeed: 400,

        items: 1,
        itemsDesktop: false,
        itemsDesktopSmall: false,
        itemsTablet: false,
        itemsMobile: false

    });

});


