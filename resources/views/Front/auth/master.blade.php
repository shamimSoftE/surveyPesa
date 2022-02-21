<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('all-source') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('all-source') }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('all-source') }}/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('all-source') }}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('all-source') }}/assets/css/forms/switches.css">
</head>
<body class="form" style="font-family:'Times New Roman', Times, serif;">


    <div class="form-container outer" >
        <a class="btn btn-dark" style="margin: 15px 0 0 35px;" href="{{ url('/') }}" >Back To Home</a>
        <div class="form-form">
            <div class="form-form-wrap">

                @if(Session::has('error'))
                    <div class="alert alert-warning alert-dismissible fade show" style="margin-top: 3rem" role="alert">
                        <strong style="font-size: 1rem;font-family: emoji;color: #d32323;">
                            {{ Session::get('error') }}
                        </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="form-container">

                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('all-source') }}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('all-source') }}/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('all-source') }}/bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('all-source') }}/assets/js/authentication/form-2.js"></script>

</body>
</html>
