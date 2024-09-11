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
    {{-- <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v20.0&appId=1269972941084635" nonce="GB4lXUQJ"></script> --}}
    <link rel="shortcut icon" href="{{asset('img/bnico.ico')}}" type="image/x-icon">
    <title>@yield('title', 'Default')</title>
    <link rel="alternate" href="https://bisturinoticias.com" hreflang="es-mx"/>
    <meta name="author" content="ByDSolutions">
    <meta name="copyright" content="Bisturí Noticias" />
    <link rel="canonical" href="https://bisturinoticias.com/">
    <meta name="robots" content="index,follow">
    <meta name="description" content="En BN Noticias estamos convencidos de que la noticia debe vivirse, respirarse y palparla para poder contarla. Somos un portal de noticias, dónde verás reportajes de México y el mundo, Información General, Salud, Emergencias, Deportes, Espectáculos, Opinión, Clicks, La Planchada, Patrullando, La Cantina">
    <meta name="keywords" content="BN Noticias, Bisturí, Noticias, Noticias de Toluca, Noticias del mundo,Internacional, Noticias del Edomex, Información General, Salud, Emergencias, Deportes, Telón y Espectáculos, Opinión, Reportajes, Click del Día, La Planchada, Patrullando, La Cantina">
    <meta name="msapplication-TileColor" content="#459FC4">
    <meta name="theme-color" content="#459FC4">
    {{-- Meta OG --}}
    @stack('ogf')
    @stack('ogt')
    {{-- Styles Refresh --}}
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    {{-- Styles Refresh end --}}
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{asset('css/uikit.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/fontawesome5/css/all.min.css') }}">
    {{-- content --}}
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    {{-- navbar --}}
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    {{-- animation --}}
    <link rel="stylesheet" href="{{asset('css/animation.css')}}">
    @stack('css')
</head>
<body>  

    <section>
        @include('front.components.navbar')
    </section>

    @yield('content')
    
    <section class="uk-margin-small-bottom uk-padding-large">
        @include('front.components.subscribe')
    </section>
     
    @include('front.partials.newFooter')

    <!-- UIkit JS -->
    <script src="{{asset('js/uikit.min.js')}}" defer></script>
    <script src="{{asset('js/uikit-icons.min.js')}}" defer></script>
    @stack('js')
    @stack('time')

</body>
</html>