<!DOCTYPE html>

<html>

    <head>
        <title> Url Shortner </title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/slate/bootstrap.min.css">
    </head>

    <body>

        @if (Session::has('flash_message'))
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <div class="container">
            @yield('content')
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    </body>

</html>