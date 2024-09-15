@extends('front.template.layout')

@section('title', 'BN Noticias | Opinión')

@section('content')


    <div class="uk-padding uk-width-1-1@m">
        @each('front.components.mainNews',$latest, 'article')
        <hr class="uk-margin-large-top new-hr">
    </div>

    <h2 class="uk-h3 uk-margin-medium-left uk-text-bold">
        <i class="fas fa-grip-lines-vertical fa-lg" style="color: #1b9a8b;"></i> Últimas Noticias
    </h2>

   
@endsection

@push('ogf')
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="article"> 
    <meta property="og:url" content="{{ Request::fullUrl() }}">
    <meta property="og:site_name" content="Bisturí Noticias | Opinión ">
@endpush 



