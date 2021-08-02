<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/article.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menulogin.css') }}">


    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600&family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet">


    {{-- <title>@yield('title', 'Default') | Panel admin</title> --}}

    <title>@yield('title', 'Default')</title>
</head>
<body>

<header>
    @include('admin.template.partials.nav')
</header>

@yield('content')



<footer id="footer">
    {{-- <div class="logoWrap">
        <div class="container">
            <h1>
                <a href="index.html" title="#">
                    <img src="img/logo.png" alt="#" width="208" height="108" class="img-responsive">
                    <strong>Blogee</strong>
                </a>
            </h1>
        </div>
    </div> --}}

    <div class="box copyright">
        <div class="container">
            Copyright. All Rights Reserved.
        </div>
    </div>
</footer>



    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Import jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>



    <script src="{{ asset('js/app2.js') }}"></script>

</body>
</html>
