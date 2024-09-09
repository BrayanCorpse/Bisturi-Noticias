@extends('front.template.layout')

@section('title', 'BN Noticias | Espectáculos')

@section('content')

    {{-- <div class="uk-text-center uk-grid-collapse uk-margin-medium-top" uk-grid>

        <div class="b-mt-espec uk-width-expand@m">
            @each('front.components.mainNews',$articles, 'article')
        </div>

        <div class="uk-width-1-3@m">   
            <div class="b-header">
                <h6 class="b-title uk-h6" id="title-seccion">Telón-Espectaculos-y-Letras</h6>
            </div> 
            @each('front.components.newsCategory',$categories, 'category')
        </div>
        
    </div> --}}

    <div class="uk-padding uk-width-1-1@m">
        @each('front.components.mainNews',$articles, 'article')
    </div>
   
@endsection