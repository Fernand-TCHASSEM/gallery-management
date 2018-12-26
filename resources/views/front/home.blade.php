<!doctype html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <title>Radix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="url-api-get-gallery" content="{{ url('/api/gallery') }}">

    <meta name="url-get-gallery" content="{{ url('/') }}">

    <meta name="url-loader-gallery" content="{{URL::asset('/img/rolling.gif')}}">

    <!-- Bootstrap CSS -->
    {!! Html::style('css/base/plugins.css') !!}

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
    <!--- End google font-->

    {!! Html::style('css/base/style.css') !!}
    {!! Html::style('css/base/custom.css') !!}

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
        type='text/css'>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    {!! Html::style('css/front/home.css') !!}
</head>

<body>

    <header class="radix_header_area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="radix_logo">
                        <a href="index.html"><img src="http://www.mobparts.nl/test/assets/images/logo.png" alt=""></a>
                    </div>
                </div>

                <div class="col-md-8 col-sm-6 d-flex justify-content-end align-items-center">

                    <!-- radix Responsive Menu Panel -->
                    <div class="radix-responsive-menu-panel"></div>
                    <div class="radix_menu">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="portfolio.html">Portfolio</a>

                            </li>
                            <li><a href="blog.html">Blog</a>

                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </header>
    <!--End radix_header_area -->

    <div class="radix_section_title_area">
        <div class="container">
            <div class="radix_section_title">
                <h2>Viewgallery page</h2>
                <p>Example Page View Thumbs from each category posted with pictures </p>
            </div>
        </div>
        <!--End container -->
    </div>
    <!--End radix_section_title -->

    <section class="radix_gallery_area">
        <div class="container">
            <div class="radix_gallery_menu">
                <div class="watch-gallery-nav">
                    <ul id="watch-filter-gallery" class="option-set clear-both" data-option-key="filter">
                        <li data-option-value="*"><a class="active" href="#">All</a></li>
                        <li data-option-value=".design"><a href="#">Design </a></li>
                        <li data-option-value=".development"><a href="#">Development</a></li>
                        <li data-option-value=".illustration"><a href="#">illustration</a></li>
                    </ul>
                </div>
            </div>
            <div class="radix_gallery_wrap radix-even-gallery" id="radix_gallery_three_column">
            </div>
            <div class="radix_btn" id="pagination">
            </div>
        </div>
        <!--End container -->
    </section>
    <!--End radix_gallery_area -->

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




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    {!! Html::script('js/base/main.js') !!}

    {!! Html::script('js/plugins/unveil/jquery.unveil.js') !!}

    {!! Html::script('js/plugins/bootpag/jquery.bootpag.custom.js') !!}

    {!! Html::script('js/front/home.js') !!}
    <!--End ALL JS -->
</body>

</html>
