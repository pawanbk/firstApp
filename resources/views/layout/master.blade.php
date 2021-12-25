<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- Bootstrap link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/4316ab51c5.js"></script>
        <!-- custom css link -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    <body>
        <section id="top-nav">
            <div class="brand-name">Admin</div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-circle"></i>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout <i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </section>
        <div class="wrapper">
            <section id="side-nav">
                <ul>
                    <li><a href="{{route('index')}}"><i class="fa fa-plus"></i>add customer</a></li>
                    <li><a href="{{route('list')}}"><i class="fa fa-eye"></i>view customer</a></li>
                </ul>
            </section>
            @yield('content')
        </div>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>