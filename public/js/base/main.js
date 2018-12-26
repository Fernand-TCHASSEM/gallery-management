(function ($) {
    "use strict";

    /*------------------------------------------------------------------
    [Table of contents]

    0. CUSTOM PRE DEFINE FUNCTION
    1. RADIX GALLERY POPUP JS
    2. RADIX RESPONSIVE MENU
    3. RADIX MENU CLICK TO SCROLLDOWN
    4. RADIX GALLERY THREE COLUMN JS
    5. RADIX GALLERY TWO COLUMN JS

    -------------------------------------------------------------------*/

    /*--------------------------------------------------------------
    CUSTOM PRE DEFINE FUNCTION
    ------------------------------------------------------------*/
    /* is_exist() */
    jQuery.fn.is_exist = function () {
        return this.length;
    }


    $(function () {

        /*--------------------------------------------------------------
        radix GALLERY POPUP JS
        ------------------------------------------------------------*/
        var radix_img_popup = $('.radix_zoom_gallery.lightbox');
        if (radix_img_popup.is_exist()) {
            $(radix_img_popup).magnificPopup({
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300, // don't foget to change the duration also in CSS
                    opener: function (element) {
                        return element.find('img');
                    }
                }
            });
        }

        /*--------------------------------------------------------------
        RADIX RESPONSIVE MENU
        ------------------------------------------------------------*/
        var header_menu = $('.radix_menu');
        if (header_menu.is_exist()) {
            header_menu.meanmenu({
                meanScreenWidth: "767",
                meanMenuContainer: '.radix-responsive-menu-panel',
            });
        }

        /*--------------------------------------------------------------
        RADIX MENU CLICK TO SCROLLDOWN
        ------------------------------------------------------------*/
        var $header_menu_link = $('.appmax-header-menu ul li a');
        if ($header_menu_link.is_exist()) {

            $header_menu_link.on("click", function (e) {
                var url = $(this).attr("href");
                var href = url.substring(url.indexOf('#') + 1),
                    href = '#' + href;
                if (/#/.test(this.href)) {
                    if ($(href).length) {
                        var offsetTop = href === "#" ? 0 : $(href).offset().top;
                        $('body , html').stop().animate({
                            scrollTop: offsetTop - 100,
                        }, 500);
                        e.preventDefault();
                        return false;
                    }
                }
            });
        }

    });


    $(window).on("load", function () {
        
        /*--------------------------------------------------------------
        RADIX GALLERY THREE COLUMN JS
        ------------------------------------------------------------*/
        var radix_filter_gallery = $('#radix_gallery_three_column');
        if (radix_filter_gallery.is_exist()) {
            var $container = radix_filter_gallery,
                colWidth = function () {
                    var w = $container.width(),
                        columnNum = 1,
                        columnWidth = 0;
                    if (w > 1200) {
                        columnNum = 3;
                    } else if (w > 900) {
                        columnNum = 3;
                    } else if (w > 600) {
                        columnNum = 2;
                    } else if (w > 450) {
                        columnNum = 2;
                    } else if (w > 385) {
                        columnNum = 1;
                    }
                    columnWidth = Math.floor(w / columnNum);
                    $container.find('.collection-grid-item').each(function () {
                        var $item = $(this),
                            multiplier_w = $item.attr('class').match(/collection-grid-item-w(\d)/),
                            multiplier_h = $item.attr('class').match(/collection-grid-item-h(\d)/),
                            width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth,
                            height = multiplier_h ? columnWidth * multiplier_h[1] * 0.4 - 12 : columnWidth * 0.5;
                        $item.css({
                            width: width,
                            //height: height
                        });
                    });
                    return columnWidth;
                },
                isotope = function () {
                    $container.isotope({
                        resizable: false,
                        itemSelector: '.collection-grid-item',
                        masonry: {
                            columnWidth: colWidth(),
                            gutterWidth: 0
                        }
                    });
                };
            isotope();
            $(window).on("resize", isotope);

            // filter items on button click
            $container.prev('.radix_gallery_menu').find('.watch-gallery-nav').on("click", 'a', function (e) {
                e.preventDefault();
                var filter_init = $(this).parent(),
                    filterValue = filter_init.attr('data-option-value');
                $container.isotope({
                    filter: filterValue
                });
                $(this).addClass('active').parent().siblings().find('a').removeClass('active');
                return false;
            });

        }

        /*--------------------------------------------------------------
        RADIX GALLERY TWO COLUMN JS
        ------------------------------------------------------------*/
        var radix_filter_gallery_2 = $('#radix_gallery_two_column');
        if (radix_filter_gallery_2.is_exist()) {
            var $container = $(radix_filter_gallery_2),
                colWidth = function () {
                    var w = $container.width(),
                        columnNum = 1,
                        columnWidth = 0;
                    if (w > 1200) {
                        columnNum = 2;
                    } else if (w > 900) {
                        columnNum = 2;
                    } else if (w > 600) {
                        columnNum = 2;
                    } else if (w > 450) {
                        columnNum = 2;
                    } else if (w > 385) {
                        columnNum = 1;
                    }
                    columnWidth = Math.floor(w / columnNum);
                    $container.find('.collection-grid-item').each(function () {
                        var $item = $(this),
                            multiplier_w = $item.attr('class').match(/collection-grid-item-w(\d)/),
                            multiplier_h = $item.attr('class').match(/collection-grid-item-h(\d)/),
                            width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth,
                            height = multiplier_h ? columnWidth * multiplier_h[1] * 0.4 - 12 : columnWidth * 0.5;
                        $item.css({
                            width: width,
                            //height: height
                        });
                    });
                    return columnWidth;
                },
                isotope = function () {
                    $container.isotope({
                        resizable: false,
                        itemSelector: '.collection-grid-item',
                        masonry: {
                            columnWidth: colWidth(),
                            gutterWidth: 0
                        }
                    });
                };
            isotope();
            $(window).on("resize", isotope);

            // filter items on button click
            $container.prev('.radix_gallery_menu').find('.watch-gallery-nav').on("click", 'a', function (e) {
                e.preventDefault();
                var filter_init = $(this).parent(),
                    filterValue = filter_init.attr('data-option-value');
                $container.isotope({
                    filter: filterValue
                });
                $(this).addClass('active').parent().siblings().find('a').removeClass('active');
                return false;
            });
        }
    });


})(jQuery);