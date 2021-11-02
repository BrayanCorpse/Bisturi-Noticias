<!DOCTYPE html>
<html lang="es_MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="qB2fJCcCuULOtk3ZcMReE6rChVGA6lgG0jun5dNsZZc" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PC1CWWF1NP"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-PC1CWWF1NP');
    </script>
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}" type="image/x-icon">
    <title>@yield('title', 'Default')</title>
    <link rel="alternate" href="https://bisturinoticias.com" hreflang="es-mx"/>
    <meta name="author" content="ByDSolutions">
    <meta name="copyright" content="Bisturí Noticias" />
    <link rel="canonical" href="https://bisturinoticias.com/">
    <meta name="robots" content="index,follow">
    <meta name="description" content="En Bisturí Noticias estamos convencidos de que la noticia debe vivirse, respirarse y palparla para poder contarla.Somos un portal de noticias, dónde verás reportajes sobre Salud, Deportes y Espectáculos.">
    <meta name="keywords" content="Bisturí Noticias, Bisturí, Noticias, Noticias de Toluca, Noticias del Edomex, Información General, Salud, Emergencias, Deportes, Telón y Espectáculos, Opinión, Reportajes, Click del Día, La Planchada, Patrullando, La Cantina">
    <meta name="msapplication-TileColor" content="#459FC4">
    <meta name="theme-color" content="#459FC4">
    {{-- Meta OG --}}
    @stack('ogf')
    @stack('ogt')
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{asset('css/uikit.css')}}" >
    {{-- content --}}
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    {{-- navbar --}}
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    {{-- animation --}}
    <link rel="stylesheet" href="{{asset('css/animation.css')}}">
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