jQuery(document).ready(function () {
    var apiURL = $('meta[name="url-api-get-gallery"]').attr('content'),
        $mainPicture = $('#main-picture'),
        loaderURL = $('meta[name="url-loader-gallery"]').attr('content');
    $.ajax({
        url: apiURL + '/' + $('#hide-id').val(),
        type: 'GET',
        dataType: 'json',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        success: function (result) {
            if (result.code === 200) {
                result = result.item;
                var pictures = JSON.parse(result.pictures);
                $('#title').text(result.name);
                $('#posted-date').prepend((new Date(result.posted_date)).toLocaleString('en-US', {
                    year: "numeric",
                    month: "long",
                    day: "numeric"
                }));
                $('#description').html(result.description);
                $mainPicture.attr('src', loaderURL).attr('data-src', pictures[0]).unveil();

                html = '';
                numberOfParents = Math.ceil((pictures.length - 1) / 3);
                limit = 1;
                for (var i = 1; i <= numberOfParents; i++) {
                    html +='<div class="redex_blog_recent_post">';
                    limit = i * 3;
                    var table = pictures.slice((limit - 3), limit);
                    for (let index = 0; index < table.length; index++) {
                        html+='<div class="radix_blog_content mx-1"><img src="'+loaderURL+'" data-src="'+table[index]+'" class="to-load"></div>'
                    }
                    html+='</div>';
                }

                $('#containerPic').append($(html));

                $('.to-load').unveil().each(function (index, value) {
                    $(this).slickhover({
                        icon: 'js/plugins/slickHover/imgs/lens.png',
                        animateIn: true
                    });
                });
            }
        },
        error: function () {
            
        }
    });

    $('#secondary-pictures').on('click', '#containerPic img', function (event) {
        if (event.target && event.target.nodeName === "IMG") {
            $mainPicture.attr('src', loaderURL).attr('data-src', $(event.target).attr('src')).unveil();
        }
    });
});
