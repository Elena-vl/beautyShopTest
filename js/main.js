// JavaScript Document

jQuery(document).ready(function($) {
    "use strict";

    $(function() {
        //Keep track of last scroll
        var lastScroll = 0;
        var header = $("#header");
        var headerfixed = $("#header-main-fixed");
        var headerfixedbg = $(".header-bg");
        var headerfixedtopbg = $(".top-header-bg");
        $(window).scroll(function() {
            //Sets the current scroll position
            var st = $(this).scrollTop();
            //Determines up-or-down scrolling
            if (st > lastScroll) {

                //Replace this with your function call for downward-scrolling
                if (st > 50) {
                    header.addClass("header-top-fixed");
                    header.find(".header-top-row").addClass("dis-n");
                    headerfixedbg.addClass("header-bg-fixed");
                    headerfixed.addClass("header-main-fixed");
                    headerfixedtopbg.addClass("top-header-bg-fix");
                }
            }
            else {
                //Replace this with your function call for upward-scrolling
                if (st < 50) {
                    header.removeClass("header-top-fixed");
                    header.find(".header-top-row").removeClass("dis-n");
                    headerfixed.removeClass("header-main-fixed");
                    headerfixedbg.removeClass("header-bg-fixed");
                    headerfixedtopbg.removeClass("top-header-bg-fix");
                    //headerfixed.addClass("header-main-fixed")
                }
            }
            //Updates scroll position
            lastScroll = st;
        });
    });

    // Bestseller owl slider script
    $("#nav-bestseller .next").click(function() {
        $("#owl-bestseller").trigger('owl.next');
    });
    $("#nav-bestseller .prev").click(function() {
        $("#owl-bestseller").trigger('owl.prev');
    });

    $("#owl-bestseller").owlCarousel({
        // Most important owl features
        items: 4,
        itemsCustom: false,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: false,
        stopOnHover: false,
        navigation: false
    });

    // Summer sale owl slider script
    $("#nav-summer-sale .next").click(function() {
        $("#owl-summer-sale").trigger('owl.next');
    });
    $("#nav-summer-sale .prev").click(function() {
        $("#owl-summer-sale").trigger('owl.prev');
    });

    $("#owl-summer-sale").owlCarousel({
        // Most important owl features
        items: 3,
        itemsCustom: false,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: false,
        stopOnHover: false,
        navigation: false
    });

    // iphone(ios) owl slider script
    $("#nav-child .next").click(function() {
        $("#owl-child").trigger('owl.next');
    });
    $("#nav-child .prev").click(function() {
        $("#owl-child").trigger('owl.prev');
    });

    $("#owl-child").owlCarousel({
        // Most important owl features
        items: 3,
        itemsCustom: false,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: false,
        stopOnHover: false,
        navigation: false
    });

    // owl slider script
    $("#nav-tabs .next").click(function() {
        $("#owl-new").trigger('owl.next');
        $("#owl-featured").trigger('owl.next');
    });
    $("#nav-tabs .prev").click(function() {
        $("#owl-new").trigger('owl.prev');
        $("#owl-featured").trigger('owl.prev');
    });

    $("#owl-new").owlCarousel({
        // Most important owl features
        items: 4,
        itemsCustom: false,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: false,
        stopOnHover: false,
        navigation: false
    });
    $("#owl-featured").owlCarousel({
        // Most important owl features
        items: 4,
        itemsCustom: false,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: false,
        stopOnHover: false,
        navigation: false
    });

    // owl slider script
    $("#nav-tabs2 .next").click(function() {
        $("#owl-new2").trigger('owl.next');
        $("#owl-featured2").trigger('owl.next');
    });
    $("#nav-tabs2 .prev").click(function() {
        $("#owl-new2").trigger('owl.prev');
        $("#owl-featured2").trigger('owl.prev');
    });

    $("#owl-new2").owlCarousel({
        // Most important owl features
        items: 3,
        itemsCustom: false,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: false,
        stopOnHover: false,
        navigation: false
    });
    $("#owl-featured2").owlCarousel({
        // Most important owl features
        items: 3,
        itemsCustom: false,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: false,
        stopOnHover: false,
        navigation: false
    });




    $("#owl-partners").owlCarousel({
        // Most important owl features
        items: 5,
        itemsCustom: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: true,
        stopOnHover: false,
        navigation: false
    });
    $("#owl-home-slider").owlCarousel({
        // Most important owl features
        items: 1,
        itemsCustom: false,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [630, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        autoPlay: true,
        stopOnHover: false,
        navigation: false
    });

    $(function() {
        $('.dropdown').hover(function() {
            $(this).addClass('open');
        }, function() {
            $(this).removeClass('open');
        });
    });

    // jPages paginated blocks
    var $holder = $("body").find(".holder");
    if (!$holder.length) {
        $("body").append("<div class='holder'></div>");
    }
    $("div.holder").jPages({
        containerID: "products",
        previous: ".feature-block a[data-role='prev']",
        next: ".feature-block a[data-role='next']",
        animation: "fadeInRight",
        perPage: 4
    });


    $('.revolution').revolution({
        delay: 9000,
        startwidth: 1170,
        startheight: 500,
        hideThumbs: 10,
        fullWidth: "on",
        fullScreen: "on",
        navigationType: "none",
        navigationArrows: "solo",
        navigationStyle: "round",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 30,
        navigationVOffset: 30,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        touchenabled: "on"

    });

    $('.tool_tip').tooltip();




    // Color Filter
    $(".colors li a").each(function() {
        $(this).css("background-color", "#" + $(this).attr("rel")).attr("href", "#" + $(this).attr("rel"));
    });

    // Product zoom
    $('#product-zoom').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750
    });

    var gallery = $('#gal1');
    gallery.find('a').hover(function() {

        var smallImage = $(this).attr("data-image");
        var largeImage = $(this).attr("data-zoom-image");
        var ez = $('#product-zoom').data('elevateZoom');

        ez.swaptheimage(smallImage, largeImage);
    });


    // Daily Deal CountDown Clock Settings
    var date = new Date().getTime();			// This example is just to show how this function works.
    var new_date = new Date(date + 86400000);	// You can set your own time whenever you want.
//    var n = new_date.toUTCString();				// 'date' value is given in milliseconds.
    //alert(new_date)
    $(".time").countdown({
        date: new_date,
        yearsAndMonths: true,
        leadingZero: true
    });


    // Categories Menu Manipulations
    $(".ul-side-category li a").click(function() {

        var sm = $(this).next();
        if (sm.hasClass("sub-category")) {
            if (sm.css("display") === "none") {
                $(this).next().slideDown();
            }
            else {

                $(this).next().slideUp();

                $(this).next().find(".sub-category").slideUp();


                /*$(this).next().find(".categories-submenu").slideUp("normal", function() {
                 $(this).parent().find(".icon-angle-down").removeClass("icon-angle-down").addClass("icon-angle-right");
                 });*/
            }

            return false;
        }
        else {
            return true;
        }
    });





});

new WOW().init();

