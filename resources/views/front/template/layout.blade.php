<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="qB2fJCcCuULOtk3ZcMReE6rChVGA6lgG0jun5dNsZZc" />
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}" type="image/x-icon">
    <link rel="alternate" href="https://bisturinoticias.com/" hreflang="es">
    <title>@yield('title', 'Default')</title>
    <meta name="description" content="En Bisturí Noticias estamos convencidos de que la noticia debe vivirse, respirarse y palparla para poder contarla.">
    <link rel="canonical" href="https://bisturinoticias.com/">
    {{-- Meta OG Facebook --}}
    <meta property="og:locale" content="es_MX">
    <!--change -->
    <meta property="og:type" content="website"> 
    <!--change -->
    <meta property="og:title" content="Somos un portal de noticias, dónde verás reportajes sobre Salud, Deportes, Espectáculos, Lugares Hermosos y Divertidos qué puedes visitar."> 
    <!--change -->
    <meta property="og:description" content="En Bisturí Noticias estamos convencidos de que la noticia debe vivirse, respirarse y palparla para poder contarla."> 
    <meta property="og:url" content="https://bisturinoticias.com/">
    <!--change -->
    <meta property="og:site_name" content="Bisturí Noticias">
    <meta property="article:publisher" content="https://www.facebook.com/bisturinoticias">
    <!--change -->
    <meta property="og:image" content="{{asset('img/icon.png')}}">
    @stack('ogf')
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{asset('css/uikit.css')}}" >
    {{-- content --}}
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    {{-- navbar --}}
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">

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
    <script src="{{asset('js/uikit.min.js')}}" defer></script>
    <script src="{{asset('js/uikit-icons.min.js')}}" defer></script>
    @stack('js')

</body>
</html>