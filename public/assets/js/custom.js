/*jslint browser: true*/
/*global $, window, WOW*/

(function ($) {
    'use strict';
    
    
    var win = $(window),
        scrollUp = $(".scroll-up"),
        btnMenuNavbar = $('.navbar-toggle'),
        navMenu = $(".nav-menu"),
        listMenu = $("ul.nav-menu li a"),
        navbar = $('.nav-bar-two'),
        
        /* Var For Side Menu */
        btnOpenSideMenu = $(".side-menu-btn"),
        sideMenuItem = $(".side-menu"),
        closeSidebarOverLay = $(".close-menu-sidebar"),
        btnCloseSideMenu = $(".close-side-menu"),
        body = $("body"),
        
        /* Var For Search Screen */
        btnOpenSearch = $(".search-btn"),
        searchScreenItem = $(".search-screen"),
        closeSearchScreen = $(".close-search");
    
    btnMenuNavbar.on("click", function (e) {
        e.preventDefault();
        navMenu.slideToggle();
        $(this).toggleClass("navbar-toggle-active");
    });
    
    listMenu.on("click", function (e) {
        var submenu = this.parentNode.getElementsByTagName("ul").item(0);
        if (submenu !== null) {
            e.preventDefault();
            $(submenu).slideToggle();
        }
    });
    

    
    
    /*========== Start Wow Js ==========*/
    new WOW().init();
    
    /*==============================
    Loading
    ==============================*/
    $(window).on('load', function () {
        $(".loading-screen").fadeOut();
    });
    
  
    
    
    
    /* Side Menu script */
    btnOpenSideMenu.on("click", function (e) {
        e.preventDefault();
        sideMenuItem.addClass("open");
        closeSidebarOverLay.addClass("open");
        body.css('overflow', 'hidden');
    });
    
    closeSidebarOverLay.on("click", function (e) {
        e.preventDefault();
        sideMenuItem.removeClass("open");
        closeSidebarOverLay.removeClass("open");
        body.css('overflow', 'auto');
    });
    
    btnCloseSideMenu.on("click", function (e) {
        e.preventDefault();
        sideMenuItem.removeClass("open");
        closeSidebarOverLay.removeClass("open");
        body.css('overflow', 'auto');
    });


    /* Search Screen Script */
    btnOpenSearch.on("click", function (e) {
        e.preventDefault();
        searchScreenItem.addClass("open");
    });
    closeSearchScreen.on("click", function (e) {
        e.preventDefault();
        searchScreenItem.removeClass("open");
    });
    
    
     /*========== Start Navbar Auto Change  ==========*/
    win.on('scroll', function () {
        if (win.scrollTop() > 45) {
            navbar.addClass('nav-fixed').removeClass('fixed-top');
        } else {
            navbar.addClass('fixed-top').removeClass('nav-fixed');
        }
    });
    
    
    
    
    
    /*========== Start OWL Carousel Js Slider Hero   ==========*/
    if ($('.slider-hero')[0]) {
        
        $(".slider-hero").owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            smartSpeed: 1000,
            autoplay: 2000,
            loop: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            mouseDrag: false,
            touchDrag: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }
    $(".slider-hero").on("translate.owl.carousel", function () {
        $(".info-header .inner-banner").removeClass("animated fadeOut").css("opacity", "0");
        $(".info-header .top-title-header").removeClass("animated fadeInUp").css("opacity", "0");
        $(".info-header h1").removeClass("animated fadeInUp").css("opacity", "0");
        $(".info-header .text-header").removeClass("animated fadeInDown").css("opacity", "0");
        $(".info-header .banner-btn").removeClass("animated fadeInDown").css("opacity", "0");
    });

    $(".slider-hero").on("translated.owl.carousel", function () {
        $(".info-header .inner-banner").removeClass("animated fadeIn").css("opacity", "1");
        $(".info-header .top-title-header").addClass("animated fadeInUp").css("opacity", "1");
        $(".info-header h1").addClass("animated fadeInUp").css("opacity", "1");
        $(".info-header .text-header").addClass("animated fadeInDown").css("opacity", "1");
        $(".info-header .banner-btn").addClass("animated fadeInDown").css("opacity", "1");
    });
    
    
    
    
    /*========== Start Counter To Js Statistics   ==========*/
    if ($(".count")[0]) {
        win.on('scroll.statistics', function () {
            var stat = $('.statistics');
            if ($(this).scrollTop() >= stat.offset().top - win.height() + 220) {
                $('.count').countTo();
                win.off('scroll.statistics');
            }
        });
    }
    
    
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.about-carousel')[0]) {
        $('.about-carousel').owlCarousel({
            loop: true,
            margin: 100,
            smartSpeed: 1000,
            autoplay: 6000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.case-one')[0]) {
        $('.case-one').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 4
                }
            }
        });
    }

    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.case-classic')[0]) {
        $('.case-classic').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.team-classic')[0]) {
        $('.team-classic').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
    
    
    /*========== Start Portfolio Trigger Filterizr Js ==========*/
    $("#control li").on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

    // The Filterizr
    if ($("#filtr-container")[0]) {

        $('#filtr-container').filterizr({
            animationDuration: 0.4
        });
    }
    
     /*========== Start Magnigic Popup Js ==========*/
    if ($('.case-item')[0]) {

        $('.case-item').magnificPopup({
            delegate: '.zoom-case a',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }
    
  
   
    
   
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.testimonial-one')[0]) {
        $('.testimonial-one').owlCarousel({
            autoplay: 2000,
            loop: true,
            items: 1,
            margin: 30,
            nav: false,
            dots: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            mouseDrag: true,
            touchDrag: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }
    
    
    if ($('.testimonial')[0]) {
        $('.testimonial').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
    /*========== Start OWL Carousel Js sponsor   ==========*/
    if ($('.sponsor')[0]) {
        $('.sponsor').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 5
                }
            }
        });
    }
    
    if ($('.services-carousel')[0]) {
        $('.services-carousel').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
    
    if ($('.single-case-slider')[0]) {
        $('.single-case-slider').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }
    

    
    
    
    

    
      /* ------------------  Cart Slider OF Single Product ------------------ */
    $('.nav-tabs li').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        
        $('.content-revision > div').hide();
        $('.' + $(this).data('class')).fadeIn();
        
        $('.my-account > div').hide();
        $('.' + $(this).data('class')).fadeIn();
        
        
    });
    
    
    
    
    
    /*========== Start Scroll Up    ==========*/
    // Show And Hide Buttom Back To Top
    win.on('scroll', function () {
        if ($(this).scrollTop() >= 600) {
            scrollUp.show(300);
        } else {
            scrollUp.hide(300);
        }
    });
    // Back To 0 Scroll Top body
    scrollUp.on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });
    
    
  
    



}($));
