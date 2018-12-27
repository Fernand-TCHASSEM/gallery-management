jQuery(document).ready(function () {

    var $formGallery = $('form-gallery'),
        $btnSubmit = $('#btn-submit'),
        userData = JSON.parse(localStorage.getItem('user'));

    $formGallery.validate({
        rules: {
            'title': {
                required: true,
                minlength: 3
            },
            'tinyArea': {
                required: true,
                minlength: 5
            }
        }
    });

    $btnSubmit.on('click', function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            var $bases = $("input[name='bases[]']"),
                basesFill = $.map($bases, function (base, index) {
                    var $inputBase = $(base);
                    if ($inputBase.attr('value')) {
                        return $inputBase.attr('value');
                    }
                });

            if (basesFill.length) {
                $.ajax({
                    url: $('meta[name="url-api-post-gallery"]').attr('content'),
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': userData.token
                    },
                    data: JSON.stringify({
                        name: $('#title').val(),
                        description: tinyMCE.get('tinyArea').getContent(),
                        pictures: basesFill
                    }),
                    beforeSend: function () {
                        $btnSubmit.attr('disabled', true).addClass('running');
                    },
                    success: function (result) {
                        if (result.code === 201) {
                            $btnSubmit.removeAttr('disabled').removeClass('running');
                            window.location.href = $('meta[name="url-admin-dashboard"]').attr('content');
                        }
                    },
                    error: function (response) {
                        response = JSON.parse(response.responseText);
                        if (response.code === 401) {
                            $.get(
                                $('meta[name="url-admin-login"]').attr('content'),
                                function (data) {
                                    if (data.code === 200) {
                                        window.location.href = $('meta[name="url-admin-login"]').attr('content');
                                    }
                                },
                                'json');
                        } else if (response.code === 4000) {
                            swal({
                                type: 'error',
                                title: 'Inavlid inputs',
                                text: response.description
                            })
                        } else {
                            console.log(response)
                        }
                    }
                });
            } else {
                swal({
                    type: 'error',
                    title: 'Inavlid inputs',
                    text: 'Please enter at least one image.'
                })
            }
        } else {

        }
    });

    tinymce.init({
        selector: '#tinyArea',
        height: 200,
        menubar: false,
        width: 495,
        plugins: [
            'advlist autolink lists link charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen textcolor ',
            'insertdatetime table contextmenu paste code wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });

    uploadHBR.init({
        "target": "#uploads",
        "max": 10
    });

    $('.username').text(userData.username);

    $('#secondary-pictures').on('click', '#containerPic img', function (event) {
        if (event.target && event.target.nodeName === "IMG") {
            $mainPicture.attr('src', loaderURL).attr('data-src', $(event.target).attr('src')).unveil();
        }
    });

    $('#btn-logout').on('click', function(e) {
        e.preventDefault();

        localStorage.removeItem('user');

        $.ajax({
            url: $('meta[name="url-admin-logout"]').attr('content'),
            type: 'GET',
            dataType: 'json',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            success: function (result) {
                if (result.code === 200) {
                    window.location.href = $('meta[name="url-admin-login"]').attr('content');
                }
            },
            error: function (xhr,status,error) {
                console.log(JSON.parse(xhr.responseText));
            }
        });
    });


});
