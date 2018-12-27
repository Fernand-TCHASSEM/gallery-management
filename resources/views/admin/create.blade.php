<!doctype html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <title>Radix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="url-admin-dashboard" content="{{ url('/admin/dashboard') }}">

    <meta name="url-admin-logout" content="{{ url('/admin/logout') }}">

    <meta name="url-admin-login" content="{{ url('/admin') }}">

    <meta name="url-api-post-gallery" content="{{ url('/api/gallery') }}">

    <meta name="url-loader-gallery" content="{{URL::asset('/img/rolling.svg')}}">

    <!-- Bootstrap CSS -->
    {!! Html::style('css/base/plugins.css') !!}

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
    <!--- End google font-->

    {!! Html::style('css/base/style.css') !!} {!! Html::style('css/base/custom.css') !!}

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=fqunup53aqd7n9bnfccuh2q7gb9gdmrznk7qfi9975x7g0en"></script>

    {!! Html::style('css/plugins/loading/loading.css') !!}
    {!! Html::style('css/plugins/loading/loading-btn.css') !!}
    {!! Html::style('js/plugins/uploadHBR/css/style.min.css') !!}
    {!! Html::style('js/plugins/sweetAlert/sweetalert.css') !!}
    {!! Html::style('css/admin/dashboard.css') !!}
    {!! Html::style('css/admin/create.css') !!}
</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="http://www.mobparts.nl/test/assets/images/logo.png" class="d-inline-block align-top">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-custom-menu" id="navbarNavDropdown">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown user user-menu pull-right w-100">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <img src="{{URL::asset('/img/user_male-512.png')}}" class="user-image" alt="User Image">
                                <span class="username text-secondary"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{URL::asset('/img/user_male-512.png')}}" class="img-circle" alt="User Image">
                                    <p class="username text-secondary">
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <a href="#" class="btn btn-default btn-flat" id="btn-logout">
                                        Sign out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
    <!--End radix_header_area -->

    <div class="radix_section_title_area">
        <div class="container">
            <div class="radix_section_title">
                <h2>Create Cat</h2>
                <p>Create cat add pictures etc </p>
            </div>
        </div>
        <!--End container -->
    </div>
    <!--End radix_section_title_area -->

    <div class="radix_section_title_area">
        <div class="container">
            <form role="form" id="form-gallery" enctype="multipart/form-data" class="col">
                {{--
                <form role="form" id="form_addSlide" enctype="multipart/form-data"></form> --}}

                <div class="row">
                    <div class="col-4" id="mainPicture">
                        <img class="to-load" alt="">
                    </div>
                    <div class="col" id="uploads">
                        <!-- Upload Content -->
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="radix_viewer_comment">
                            <div class="radix_comment_box">
                                <div>
                                    <div class="radix_comment_form form-group">
                                        <div class="radix_input_item">
                                            <input type="text" placeholder="Name" name="title" id="title">
                                        </div>
                                        <div class="radix_input_submit">
                                            <button class="ld-ext-right" type="submit" id="btn-submit">
                                                Create Cat
                                                <div class="ld ld-ring ld-spin"></div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="radix_input_item">
                                        Font Bold Underline Text Color Options
                                    </div>

                                    <div class="radix_input_item form-group">
                                        <textarea placeholder="Your message" name="tinyArea" id="tinyArea"></textarea>
                                        <label class="error" for="tinyArea" style="display: none;" id="areaErrorLabel"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <!--End container -->
    </div>
    <!--End radix_section_title_area -->

    <footer class="radix_footer_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-9">
                    <div class="radix_copy_right">
                        <p>COPYRIGHT &copy; 2018. All right reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-3 d-flex justify-content-end">
                    <div class="radix_social_icon">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </footer>
    <!--End radix_footer_area -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    {!! Html::script('js/plugins/unveil/jquery.unveil.js') !!}
    {!! Html::script('js/plugins/sweetAlert/sweetalert.min.js') !!}
    {!! Html::script('js/plugins/uploadHBR/js/uploadHBR.min.js') !!}
    {!! Html::script('js/admin/create.js') !!}
    <!--End ALL JS -->
</body>

</html>