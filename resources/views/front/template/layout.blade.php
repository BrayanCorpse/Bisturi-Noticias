<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="qB2fJCcCuULOtk3ZcMReE6rChVGA6lgG0jun5dNsZZc" />
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{asset('css/uikit.css')}}">
    {{-- content --}}
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    {{-- navbar --}}
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">


    <title>@yield('title', 'Default')</title>
    @yield('css')
</head>
<body>  

    <section>
        @include('front.partials.navbar')
    </section>

    @yield('content')
    

      <!-- Site footer -->
    <footer class="uk-margin-medium-top">
        @include('front.partials.footer')
    </footer>
    

    <!-- UIkit JS -->
    <script src="{{asset('js/uikit.min.js')}}"></script>
    <script src="{{asset('js/uikit-icons.min.js')}}"></script>
    @stack('js')

</body>
</html>