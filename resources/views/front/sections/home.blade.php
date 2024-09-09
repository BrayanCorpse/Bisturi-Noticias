@extends('front.template.layout')

@section('title', 'BN Noticias')

@section('content')

        <div class="uk-padding uk-width-1-1@m">
            @each('front.components.mainNews',$articles, 'article')
        </div>

        <hr class="uk-margin-top new-hr">

        <h3 class="uk-h3 uk-margin-medium-left uk-text-bold">
            <i class="fas fa-grip-lines-vertical fa-lg" style="color: #1b9a8b;"></i> Últimas Noticias
        </h3>

        @include('front.components.lastNews',[$lastNewText, 'lastNewText'])
           

{{-- 
        <div class="uk-margin-small-top">
            @include('front.partials.cartuchos',
                [
                    'lastgeneralNews' => $lastNewText, 
                    'lastNewPhoto' => $lastNewPhoto
                ]
            )
        </div> --}}
          
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

