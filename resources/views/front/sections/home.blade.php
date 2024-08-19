@extends('front.template.layout')

@section('title', 'Bisturí Noticias')

@section('content')

        <div class="uk-text-center uk-grid-collapse uk" uk-grid>
            <div class=" uk-width-1-1@m">
                @each('front.components.mainNews',$articles, 'article')
            </div>
            <div class="uk-width-1-3@m">
                @each('front.components.click', $clicks, 'click')
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



{{-- @push('js')

<script>
    function load() {
        element =document.getElementsByName('body').innerHTML = 
        `@include('front.partials.bienvenida')`;
        UIkit.modal(element).show();
    }
    window.onload = load;
</script>
     
@endpush --}}

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

