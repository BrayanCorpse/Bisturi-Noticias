@extends('front.template.layout')

@section('title', 'Bisturí Noticias | Opinión')

@section('content')

    {{-- <div class="uk-text-center uk-grid-collapse uk-margin-medium-top b-mrb-mobile" uk-grid>

        <div class="uk-width-expand@m">
            @each('front.components.mainNews',$articles, 'article')
        </div>

        <div class="uk-width-1-3@m">   
            <div class="b-header">
                <h4 class="b-title uk-h4" id="title-seccion">{{Route::current()->getName()}} </h4>
            </div> 
            @each('front.components.newsCategory',$categories, 'category')
        </div>
        
    </div> --}}

    <div class="b-header-l uk-margin-top uk-text-center uk-padding-remove-bottom">
        <h3 class="b-title-latest uk-h3" id="title-seccion">
           Opinión
        </h3>
    </div> 

    <div class="uk-grid-collapse uk-child-width-1-4@m uk-text-center" uk-grid>
         @each('front.components.latestNews',$latest, 'late')
    </div>
    
    {{ $latest->links('vendor.pagination.bootstrap-4') }}
   
@endsection

@push('ogf')
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="article"> 
    <meta property="og:url" content="{{ Request::fullUrl() }}">
    <meta property="og:site_name" content="Bisturí Noticias | Opinión ">
@endpush 



