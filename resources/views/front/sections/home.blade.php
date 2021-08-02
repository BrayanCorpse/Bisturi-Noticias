@extends('front.template.layout')

@section('title', 'Bisturi Noticias')

@section('content')
<div class="uk-text-center uk-grid-collapse uk-margin-medium-top" uk-grid>
    <div class="uk-width-expand@m">
        @each('front.components.mainNews',$articles, 'article')
    </div>
    <div class="uk-width-1-3@m">
        {{-- @foreach ($clicks as $click) --}}
            {{-- @include('front.components.click') --}}
            @each('front.components.click', $clicks, 'click')
        {{-- @endforeach    --}}
    </div>
    
</div>

            @each('front.partials.cartuchos',$articles, 'article')


{{-- <div class="uk-card uk-card-body uk-margin-medium-top">
    <iframe src="https://www.youtube.com/embed/n3Y5dHQn0UM" width="1920" height="1080" frameborder="0" allowfullscreen uk-responsive uk-video="automute: false; autoplay: false;"></iframe>
</div> --}}
{{-- 
<div class="uk-position-relative" uk-slideshow="animation: fade">

    <ul class="uk-slideshow-items">
        <li>
            <img src="https://images.unsplash.com/photo-1575507479993-7bb702d5e966?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" uk-cover>
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1559240019-158188276b42?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80" alt="" uk-cover>
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1503694978374-8a2fa686963a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" uk-cover>
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1585007600263-71228e40c8d1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" uk-cover>
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1573152143286-0c422b4d2175?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80" alt="" uk-cover>
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1585995603996-95c967a3742b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" uk-cover>
        </li>
    </ul>

    <div class="uk-position-bottom-center uk-position-small">
        <ul class="uk-thumbnav">
            <li uk-slideshow-item="0">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1575507479993-7bb702d5e966?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" width="100" alt="">
                </a>
            </li>
            <li uk-slideshow-item="1">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1559240019-158188276b42?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80" width="100" alt="">
                </a>
            </li>
            <li uk-slideshow-item="2">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1503694978374-8a2fa686963a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" width="100" alt="">
                </a>
            </li>
            <li uk-slideshow-item="3">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1585007600263-71228e40c8d1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" width="100" alt="">
                </a>
            </li>
            <li uk-slideshow-item="4">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1573152143286-0c422b4d2175?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80" width="100" alt="">
                </a>
            </li>
            <li uk-slideshow-item="5">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1585995603996-95c967a3742b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" width="100" alt="">
                </a>
            </li>
        </ul>
    </div>

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
     -
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

