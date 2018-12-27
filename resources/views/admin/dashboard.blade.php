<!doctype html>
<html lang="en" class="js">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="url-api-get-gallery" content="{{ url('/api/gallery') }}">

    <meta name="url-admin-logout" content="{{ url('/admin/logout') }}">

    <meta name="url-admin-dashboard" content="{{ url('/admin/dashboard') }}">

    <meta name="url-admin-login" content="{{ url('/admin') }}">

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

    {!! Html::style('css/admin/dashboard.css') !!}
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

    <div class="radix_section_title_area">
        <div class="container">
            <div class="radix_section_title">

                <h2>Gallery Management</h2>
                <p>Edit Delete Change Category or pictures </p>
            </div>


            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Panel Heading</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <a type="button" class="btn btn-sm btn-primary btn-create" href="{{ url('admin/gallery/create') }}">Create
                                New Category</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list" id="table">
                        <thead>
                            <tr>
                                <th class="action_row"><em class="fa fa-cog"></em></th>
                                <th class="id_row">ID</th>
                                <th class="name_row">Name</th>
                                <th class="picture_row">Pictures</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-xs-4" id="indicator">
                        </div>
                        <div class="col col-xs-8">
                            <ul class="pagination hidden-xs pull-right">
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>
    <!--End container -->
    </div>
    <!--End radix_section_title_area -->

    </div>
    <!--End row -->
    </div>
    <!--End container -->

    <div class="modal" id="modalDeleteGallery" tabindex="-1" role="dialog" aria-labelledby="modalDeleteGallery"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <input type="hidden" id="galleryId" />
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-header"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="btn-group pull-right">
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary ld-ext-right" id="btn-delete">Delete<div class="ld ld-ring ld-spin"></div></button>
                    </div>
                </div>
                <div class="alert alert-danger h-100 w-100 text-center mb-0 mt-1 d-none" role="alert" id="delete-alert"></div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    {!! Html::script('js/plugins/bootpag/jquery.bootpag.min.js') !!}

    {!! Html::script('js/admin/dashboard.js') !!}
    <!--End ALL JS -->
</body>

</html>
