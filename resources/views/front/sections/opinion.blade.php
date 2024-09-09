@extends('front.template.layout')

@section('title', 'BN Noticias | Opinión')

@section('content')

    {{-- <div class="b-header-l uk-margin-top uk-text-center uk-padding-remove-bottom">
        <h3 class="b-title-latest uk-h3" id="title-seccion">
           Opinión
        </h3>
    </div> 

    <div class="uk-grid-collapse uk-child-width-1-4@m uk-text-center" uk-grid>
         @each('front.components.latestNews',$latest, 'late')
    </div>
    
    {{ $latest->links('vendor.pagination.bootstrap-4') }} --}}

    <div class="uk-padding uk-width-1-1@m">
        @each('front.components.mainNews',$latest, 'article')
    </div>
   
@endsection

@push('ogf')
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="article"> 
    <meta property="og:url" content="{{ Request::fullUrl() }}">
    <meta property="og:site_name" content="Bisturí Noticias | Opinión ">
@endpush 



