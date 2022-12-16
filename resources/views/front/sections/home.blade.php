@extends('front.template.layout')

@section('title', 'Bisturí Noticias')

@section('content')

        {{-- <div class="uk-text-center uk-grid-collapse uk-margin-medium-top" uk-grid>
            <div class="uk-width-expand@m">
                @each('front.components.significantNews',$articles, 'article')
            </div>
            <div class="uk-width-1-3@m">
                    @each('front.components.click', $clicks, 'click')
            </div>
           
        </div>
        
        <div class="b-header-l uk-margin-large-top uk-margin-remove-bottom uk-text-center">
            <h3 class="b-title-latest uk-h3" id="title-seccion">
            Viñetas 
            {{Route::current()->getName()}} 
            </h3>
        </div> 
        
        <div class="uk-grid-collapse uk-child-width-1-4@m uk-text-center" uk-grid>
            @each('front.components.latestNews',$latest, 'late')
        </div>
             --}}
        <div class="uk-text-center uk-grid-collapse uk-margin-medium-top" uk-grid>
            <div class="uk-width-expand@m">
                @each('front.components.mainNews',$articles, 'article')
            </div>
            <div class="uk-width-1-3@m">
                @each('front.components.click', $clicks, 'click')
                {{-- @each('front.components.vineta', $latest, 'late') --}}
            </div>
            
        </div>

        <div class="uk-margin-small-top">
            @include('front.partials.cartuchos',
                [
                    'lastgeneralNews' => $lastNewText, 
                    'lastNewPhoto' => $lastNewPhoto
                ]
            )
        </div>
          
@endsection



@push('js')

<script>
    function load() {
        element =document.getElementsByName('body').innerHTML = 
        `@include('front.partials.bienvenida')`;
        UIkit.modal(element).show();
    }
    window.onload = load;
</script>
     
@endpush

{{-- @push('js')

<script>
    function load() {
        fetch('{{ route("clicks") }}')
        .then(response => response.json())
        .then(data => console.log(data));
      }
    window.onload = load;
</script>

@endpush --}}

