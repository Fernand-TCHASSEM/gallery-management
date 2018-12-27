jQuery(document).ready(function () {

    var $formGallery = $('#form-gallery'),
        $btnSubmit = $('#btn-submit'),
        $mainPicture = $('#mainPicture').children('img').first(),
        userData = JSON.parse(localStorage.getItem('user')),
        loaderURL = $('meta[name="url-loader-gallery"]').attr('content'),
        galleryId = $('#id-gallery').val(),
        getBase64ImageFromUrl = async function (imageUrl) {
            var res = await fetch(imageUrl);
            var blob = await res.blob();

            return new Promise((resolve, reject) => {
                var reader = new FileReader();
                reader.addEventListener("load", function () {
                    resolve(reader.result);
                }, false);

                reader.onerror = () => {
                    return reject(this);
                };
                reader.readAsDataURL(blob);
            });
        },
        initForm = $.ajax({
            url: $('meta[name="url-api-post-gallery"]').attr('content') + '/' + galleryId,
            type: 'GET',
            dataType: 'json',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': userData.token
            }
        }).then(
            async function (result) {
                if (result.code === 200) {


                    await (function () {

                        async function initPictures() {
                            await (function () {
                                uploadHBR.init({
                                    "target": "#uploads",
                                    "max": 10
                                });

                                async function globalFunc1 () {

                                    pictures = JSON.parse(result.item.pictures);
        
                                    lenPictures = pictures.length
        
                                    var fileReader = new FileReader();
        
                                    var pictureKeys = [...pictures.keys()];

                                    for (const i of pictureKeys) {
                                        await(
                                            (function () {
                                                getBase64ImageFromUrl(pictures[i])
                                                .then(
                                                    function (result) {
                
                                                            var pictureEncoded = result;
                                                            if (i === 0) {
                                                                $mainPicture.attr('src', loaderURL).attr('data-src', pictureEncoded);
                                                                $mainPicture.unveil();
                                                            }
                                
                                                            $('#prev_' + i).removeClass('hidden').children().last().attr('src', pictureEncoded);
                                                            $('#new_' + i).addClass('hidden');
                                                            $('#base64_'+i).attr('value', pictureEncoded);
                                                    }
                                                )
                                                .catch(err => console.error(err))
                                            })()
                                        )
                                    }
                                }

                                globalFunc1();

                            })();
                        };

                        initPictures();

                        $('#title').val(result.item.name);

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
                            ],
                            setup: function (editor) {
                                editor.on('init', function () {
                                    this.setContent(result.item.description);
                                });
                            }
                        });
                    })();
                }
            },
            function (response) {
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
                } else if (response.code === 4002) {
                    swal({
                        type: 'error',
                        title: 'Non-existent gallery',
                        text: response.description
                    });
                } else {
                    console.log(response)
                }
            }
        );

    $formGallery.validate({
        rules: {
            'title': {
                required: true,
                minlength: 3
            }
        }
    });

    $btnSubmit.on('click', function (e) {
        e.preventDefault();
        if ($formGallery.valid() && tinyMCE.get('tinyArea').getContent()) {
            var $bases = $("input[name='bases[]']"),
                basesFill = $.map($bases, function (base, index) {
                    var $inputBase = $(base);
                    if ($inputBase.attr('value') || $inputBase.attr('data-value')) {
                        return $inputBase.attr('value') ? $inputBase.attr('value') : $inputBase.attr('data-value');
                    }
                });

            if (basesFill.length) {
                $.ajax({
                    url: $('meta[name="url-api-post-gallery"]').attr('content') + '/' + galleryId,
                    type: 'PUT',
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
                        $('#areaErrorLabel').hide();
                    },
                    success: function (result) {
                        if (result.code === 200) {
                            $btnSubmit.removeAttr('disabled').removeClass('running');
                            window.location.href = $('meta[name="url-admin-dashboard"]').attr('content');
                            $('#areaErrorLabel').hide();
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
            if (!tinyMCE.get('tinyArea').getContent()) {
                $('#areaErrorLabel').text('This field is required.').show();
            }
        }
    });

    $('.username').text(userData.username);

    $('#secondary-pictures').on('click', '#containerPic img', function (event) {
        if (event.target && event.target.nodeName === "IMG") {
            $mainPicture.attr('src', loaderURL).attr('data-src', $(event.target).attr('src')).unveil();
        }
    });

    $('#btn-logout').on('click', function (e) {
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
            error: function (xhr, status, error) {
                console.log(JSON.parse(xhr.responseText));
            }
        });
    });


});
