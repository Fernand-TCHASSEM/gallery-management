<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="url-home" content="{{ url('/admin') }}">

    <meta name="url-dashboard" content="{{ url('/admin') }}">

    <!-- Bootstrap CSS -->
    {!! Html::style('css/base/plugins.css') !!}

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
    <!--- End google font-->

    {!! Html::style('css/base/style.css') !!}
    {!! Html::style('css/base/custom.css') !!}

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    {!! Html::style('css/admin/login.css') !!}
    {!! Html::style('css/plugins/loading/loading.css') !!}
    {!! Html::style('css/plugins/loading/loading-btn.css') !!}
    <!--End ALL STYLESHEET -->

    <title>Login</title>
</head>

<body>
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-md-4 border p-5 mx-5">
                <form id="form-login" method="POST" action="{{ url('/api/login') }}">
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password"  name="password"  placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block ld-ext-right" id="btn-submit">
                      Log In
                      <div class="ld ld-ring ld-spin"></div>
                    </button>
                    <div class="alert alert-danger mt-4 d-none" role="alert" id="login-alert"></div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js" crossorigin="anonymous"></script>

    {!! Html::script('js/admin/login.js') !!}
</body>

</html>
