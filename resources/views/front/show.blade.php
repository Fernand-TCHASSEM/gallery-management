<!doctype html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <title>Radix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="url-api-get-gallery" content="{{ url('/api/gallery') }}">

    <meta name="url-loader-gallery" content="{{URL::asset('/img/rolling.svg')}}">

    <meta name="url-hover-gallery" content="{{URL::asset('js/plugins/nsHover/imgs/lens.png')}}">

    <meta name="url-page" content="{{URL::current()}}">

    <meta property="og:url" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />

    <!-- Bootstrap CSS -->
    {!! Html::style('css/base/plugins.css') !!}

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
    <!--- End google font-->

    {!! Html::style('css/base/style.css') !!}
    {!! Html::style('css/base/custom.css') !!}

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    {!! Html::style('css/front/show.css') !!}
</head>

<body>

        <script>
            window.fbAsyncInit = function() {
                FB.init({
                appId            : 'your-app-id',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v3.2'
                });
            };
            
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
        </script>

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
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Portfolio</a>
                            </li>

                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </header>
    <!--End radix_header_area -->


    <div class="radix_blog_area radix_single_blog">
        <div class="container">
            <input type="hidden" id="hide-id" value="{{$id_gallerie}}">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="radix_blog_left_wrap">
                            <div class="radix_blog_single_item">
                                <div class="radix_blog_title">
                                    <a href="#">
                                        <h2 id="title"></h2>
                                    </a>
                                    <p>By: Admin<span>|</span><span id="posted-date"><span>|</span></p>
                                </div>
                                <div class="radix_blog_single_img">
                                    <img src="" alt="" id="main-picture">
                                </div>
                                <div class="radix_blog_bottom_content" id="description">
                                </div>
                                <div class="radix_share_blog">
                                    <h3>Share This</h3>
                                    <div class="radix_social_icon">
                                        <ul>
                                            <li><a href="#" id="facebook-share"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" id="twitter-share"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" id="instagram-share"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="radix_blog_sidebar">
                            <div class="radix_search">
                                <form class="radix-form">
                                    <input class="radix_subscribe_email" placeholder="Search" required="required" name="EMAIL"
                                        type="email">
                                    <button class="radix_subscribe_btn" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <div class="radix_blog_sidebar_item" id="secondary-pictures">
                                <div class="radix_blog_sidebar_title">
                                    <h3>Pictures on this side</h3>
                                </div>
                                <div id="containerPic">

                                </div>
                            </div>
                            <div class="radix_blog_sidebar_item">
                                <div class="radix_blog_sidebar_title">
                                    <h3>My Menu</h3>
                                </div>
                                <ul class="radix_category">
                                    <li><a href="#"><i class="fas fa-angle-double-right"></i>A</a></li>
                                    <li><a href="#"><i class="fas fa-angle-double-right"></i>B</a></li>
                                    <li><a href="#"><i class="fas fa-angle-double-right"></i>B</a></li>
                                    <li><a href="#"><i class="fas fa-angle-double-right"></i>B</a></li>
                                    <li><a href="#"><i class="fas fa-angle-double-right"></i>B</a></li>
                                    <li><a href="#"><i class="fas fa-angle-double-right"></i>B</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End row -->
        </div>
        <!--End container -->
    </div>
    <!--End radix_blog_area -->


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

    {!! Html::script('js/plugins/unveil/jquery.unveil.js') !!}

    {!! Html::script('js/plugins/slickHover/jquery.slickhover.js') !!}

    {!! Html::script('js/base/main.js') !!}

    {!! Html::script('js/front/show/sharing-network.js') !!}
    
    {!! Html::script('js/front/show.js') !!}
    <!--End ALL JS -->
</body>

</html>
