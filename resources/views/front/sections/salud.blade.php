@extends('front.template.layout')

@section('title', 'BN Noticias | Salud')

@section('content')

    <div class="uk-padding uk-width-1-1@m">
        @each('front.components.mainNews',$articles, 'article')
    </div>

    <hr class="uk-margin-small-top new-hr">

    <h2 class="uk-h3 uk-margin-medium-left uk-text-bold">
        <i class="fas fa-grip-lines-vertical fa-lg" style="color: #1b9a8b;"></i> Últimas Noticias
    </h2>

    <div>   
        @include('front.components.newsCategory',[$lastArticles, 'lastArticles'])
    </div>

@endsection