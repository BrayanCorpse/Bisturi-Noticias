@extends('front.template.layout')

@section('title', 'Bisturi Noticias | Telón y Espectáculos')

@section('content')

    <div class="uk-text-center uk-grid-collapse uk-margin-medium-top" uk-grid>

        <div class="uk-width-expand@m">
            @each('front.components.mainNews',$articles, 'article')
        </div>

        <div class="uk-width-1-3@m">   
            <div class="b-header">
                <h6 class="b-title uk-h6" id="title-seccion">{{Route::current()->getName()}}</h6>
            </div> 
            @each('front.components.newsCategory',$categories, 'category')
        </div>
        
    </div>

    <div class="b-header-l uk-margin-top uk-margin-remove-bottom uk-text-center">
        <h3 class="b-title-latest uk-h3" id="title-seccion">
            Viñetas 
            {{-- {{Route::current()->getName()}}  --}}
        </h3>
    </div> 

    <div class="uk-grid-collapse uk-child-width-1-4@m uk-text-center" uk-grid>
        @each('front.components.latestNews',$latest, 'late')
    </div>
    
    {{ $latest->links() }}

   
@endsection