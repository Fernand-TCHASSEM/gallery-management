jQuery(document).ready(function () {
    var $loginForm = $('#form-login'),
        $btnSubmit = $('#btn-submit'),
        $alert = $('#login-alert');

    $loginForm.validate({
        rules: {
            'username': {
                required: true,
                minlength: 3
            },
            'password': {
                required: true,
                minlength: 5
            }
        }
    });

    $loginForm.submit(function (e) {
        e.preventDefault();

        if ($(this).valid()) {
            var $txtUsername = $('#username'),
                $txtPassword = $('#password'),
                authenticateUser = $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    dataType: 'json',
                    data: JSON.stringify({
                        'username': $txtUsername.val(),
                        'password': $txtPassword.val()
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    beforeSend: function () {
                        $btnSubmit.attr('disabled', true).addClass('running');
                        $alert.addClass('d-none');
                    }
                }),
                redirectToDashboard = authenticateUser.then(
                    function (result) {
                        if (result.code === 200) {
                            var userData = {
                                    username: result.username,
                                    token: 'Bearer '+result.token
                                },
                                homePageUrl = $('meta[name="url-home"]').attr('content'),
                                userDataFormatted = JSON.stringify(userData);

                            localStorage.setItem('user', userDataFormatted);

                            return $.ajax({
                                url: homePageUrl,
                                type: 'POST',
                                data: userDataFormatted,
                                dataType: 'json',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                        } else {
                            $alert.text('An error occured.');
                            $btnSubmit.removeAttr('disabled').removeClass('running');
                            $alert.removeClass('d-none');

                            return new $.Deferred().reject(result).promise();
                        }
                    },
                    function (resultat, statut, erreur) {
                        var resultatFormatted = resultat.responseJSON;
                        if (resultatFormatted.code === 4000) {
                            $alert.text(resultatFormatted.description);
                        } else if (resultatFormatted.code === 4001) {
                            $alert.text('Invalid username or password.');
                        } else {
                            $alert.text('An error occured.');
                        }
                        $btnSubmit.removeAttr('disabled').removeClass('running');
                        $alert.removeClass('d-none');

                        return new $.Deferred().reject(resultat).promise();
                    }
                );

            redirectToDashboard.then(
                function (result) {
                    $alert.addClass('d-none');
                    window.location.href = $('meta[name="url-dashboard"]').attr('content');
                },
                function (result, statut, erreur) {
                    console.log(result);
                }
            );
        } else {
            $alert.text('Invalid inputs.');
            $alert.removeClass('d-none');
        }
    });
});
