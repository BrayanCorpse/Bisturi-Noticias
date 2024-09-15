@extends('front.template.layout')

@section('title', 'BN Noticias | Clicks')

@section('content')


<h1 class="uk-h3 uk-margin-medium-left uk-text-bold uk-margin-xlarge-top">
   <i class="fas fa-camera-retro fa-lg" style="color: #74899c"></i>
   Clicks
</h1>

<div class="cards-list">

   @foreach ($clicks as $key=> $click)
  
      <div class="card 1 uk-margin-medium-bottom">
         <div class="card_image uk-position-relative" uk-lightbox> 
         @foreach ($click->images   as $key => $image)
            <a class="uk-inline b-click-link" 
               href="{{ asset('storage'.'/'.$click->user->name.'/'.$image->name ) }}"
               data-caption="{{ Str::limit($click->excerpt, 300) }}">
               @if ($key == 0)
                  <img loading="lazy" class="b-card-image" 
                        src="{{ asset('storage'.'/'.$click->user->name.'/'.$image->name ) }}" 
                        alt="{{ $click->title }}" width="350" height="250"/> 
               @endif
            </a>
         @endforeach 
         </div>
         <div class="card_title">
            <h6 class="b-click-title">
               {{ Str::limit($click->title, 70) }}
            </h6>
            
         </div>
      </div>
      
   @endforeach
   
</div>
@endsection

@push('ogf')
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="article"> 
    <meta property="og:url" content="{{ Request::fullUrl() }}">
    <meta property="og:site_name" content="Bisturí Noticias | Clicks ">
@endpush 
