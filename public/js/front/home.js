jQuery(document).ready(function () {

    var $container = null;

    var apiURL = $('meta[name="url-api-get-gallery"]').attr('content'),
        adminURL = $('meta[name="url-get-gallery"]').attr('content'),
        loaderURL = $('meta[name="url-loader-gallery"]').attr('content'),
        loadGallery = function (requestedURL) {
            $.ajax({
                url: requestedURL,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                success: function (result) {

                    if (result.code === 200) {


                        /*--------------------------------------------------------------
                        RADIX GALLERY THREE COLUMN JS
                        ------------------------------------------------------------*/
                        var radix_filter_gallery = $('#radix_gallery_three_column');
                        if (radix_filter_gallery.length) {
                            $container = radix_filter_gallery,
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
                        if (radix_filter_gallery_2.length) {
                            $container = $(radix_filter_gallery_2),
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

                        html = '';
                        for (var index = 0, lenItems = result.data.length; index < lenItems; index++) {
                            var element = result.data[index];
                            html += `<div class="collection-grid-item">
                                    <div class="radix_gallery_single_item">
                                        <a class="radix_zoom_gallery" href="${adminURL+'/'+element.id}">
                                            <div class="radix_gallery_img">
                                                <img class="to-load loader" src="${loaderURL}" data-src="${JSON.parse(element.pictures)[0]}">
                                                <div class="radix_galley_hover_content">
                                                    <h3>${element.name}</h3>
                                                    <p>DESIGN</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>`;
                        }

                        $content = $(html);

                        $container.empty();

                        $container.isotope('insert', $content);

                        /*--------------------------------------------------------------
                        RADIX GALLERY THREE COLUMN JS
                        ------------------------------------------------------------*/
                        var radix_filter_gallery = $('#radix_gallery_three_column');
                        if (radix_filter_gallery.length) {
                            $container = radix_filter_gallery,
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
                        if (radix_filter_gallery_2.length) {
                            $container = $(radix_filter_gallery_2),
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

                        $container.isotope('layout');

                        $('.to-load').unveil(200, function () {
                            $(this).on('load', function () {                                    
                                $(this).removeClass('loader');                                    
                            });
                        });

                        $('#pagination').empty().bootpag({
                            total: result.last_page,
                            next: 'PREV',
                            prev: 'NEXT',
                            href: "?page={{number}}",
                        });
                    }
                }
            });
        };

    loadGallery(apiURL);

    $('#pagination').on('click', 'a', function (event) {
        event.preventDefault();
    });

    $('#pagination').on("page", function (event, num) {
        loadGallery(apiURL + '?page=' + num);
    });
});
