@extends('front.template.layout')

@section('title', 'Bisturí Noticias | Error')

@section('content')

@push('css')
<style>
  #error,.e-404 p{text-align:center}#error{display:table;width:100%;height:100vh}.e-404{display:table-cell;vertical-align:middle}.e-404 h1{font-size:6rem;display:inline-block;padding-right:12px}.e-404 big{font-size:14rem;margin-left:10px}.e-404 p{font-size:4rem;font-family:Cousine,monospace;font-weight:700;line-height:4rem;letter-spacing:normal;color:#999}.e-404 small{font-weight:lighter}.m-E{background:#43a1c4;color:#fff}.e-404 a{color:#43a1c4}@media (max-width:768px){.e-404 h1{font-size:5rem}.e-404 big{font-size:10rem}.e-404 p{font-size:2rem;padding:0 10px;margin:0}}
</style>
@endpush


<div id="error">
    <div class="e-404">
            <h1> <mark class="m-E">Error </mark> <big class="uk-text-muted">404</big> </h1>
            <p>
              No hemos podido encontrar la página que buscas.
              <br>
              <small>Te sugerimos regresar al 
                <a class="uk-link-text" href="{{route('index')}}">inicio</a>.
              </small> 
            </p>
    </div>
</div>
   
@endsection