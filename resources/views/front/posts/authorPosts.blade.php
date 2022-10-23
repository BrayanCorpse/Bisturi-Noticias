@extends('front.template.layout')

@section('title', 'Bisturí Noticias | '.$userName  )

@section('content')

@php
    $words = explode(" ", $userName );
    $initials = null;

    foreach ($words as $w) {
        $initials .= $w[0];
    }

@endphp

<div class="uk-margin-large-top uk-text-center b-ath">
    <div class="ath-circle uk-align-center">
        <span class="ath-initials">{{ $initials }}</span>
    </div>
    <h1 class="b-ath">{{ $userName }}</h1>
</div>


<div class="uk-align-center uk-width-3-4">
    <hr>
    <table class="uk-table uk-table-justify uk-table-divider">
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td class="uk-width-small">
                        <small>{{ $article->created_at->toFormattedDateString() }}</small>
                    </td>
                    <td>
                        <img class="ath-img" loading="lazy" src="{{ asset('img/plum.png')}}" width="150" height="100">
                    </td>
                    <td>
                        <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}" title="{{ $article->title }}" style="color:#222;">
                            <h1 class="ath-title uk-margin-left">{{ $article->title }}</h1>
                        </a>
                        <p class="ath-p uk-margin-left">{{ $article->summary }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
</div>


{{-- @foreach ($articles as $article)
    @foreach ($article->images as $key => $img)
        @if ($key < 1)
        <img  loading="lazy" src="{{ asset('storage'.'/'.$article->user->name.'/'.$img->name) }}" 
                alt="{{ $article->title }}"  width="100">
        @endif
    @endforeach

    <legend>{{ $article->subcategoria }}</legend>
    <br>
    <h1>{{ $article->title }}</h1>
    <br>
    <p>{{ $article->summary }}</p>
    <br>
    <h4>{{ $article->author }}</h4>
    <br>
    <h5>{{ $article->created_at->diffForHumans() }}</h5>
    <br>
    <ul>
        @foreach ($article->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
    <hr>   
@endforeach --}}

{{ $articles->onEachSide(2)->links() }} 

 @endsection