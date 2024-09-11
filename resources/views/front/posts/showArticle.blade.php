@extends('front.template.layout')

@section('title', 'BN Noticias |'.' '.$article[0]->category->name)

@section('content')

<div class="uk-container uk-margin-large-top uk-margin-large-bottom">

    <h1 class="article-title uk-text-baseline uk-align-center uk-width-2-3@s">
        {{$article[0]->title}}
    </h1>

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
            uk-slideshow="autoplay: true; animation: scale; autoplay-interval: 3000">
        <div class="uk-slideshow-items">
            @foreach ($article[0]->images as  $image)
                <div>
                    <img src="{{ asset('storage'.'/'.$article[0]->user->name.'/'.$image->name) }}" 
                        alt="{{ $article[0]->title }}"
                        class="uk-border-rounded" uk-cover>
                </div>
            @endforeach
        </div>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
    </div>

    <!-- Contenido Principal -->
    <div class="uk-grid-divider uk-margin-small-top uk-child-width-1-3@m uk-grid" uk-grid>
        <!-- Contenido del Artículo -->
        <div class="uk-width-expand@m">

            <p class="font-anek uk uk-margin-small-top uk-width-3-4@s">
                <i class="fas fa-quote-right fa-lg" style="font-size: 2rem;"></i> 
                &nbsp;{{ $article[0]->summary }}
            </p>

            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <img class="uk-comment-avatar uk-border-circle" 
                            src="https://picturepan2.github.io/spectre/img/avatar-1.png" 
                            width="30" height="30" 
                            alt="">
                </div>
                <div class="uk-width-expand">
                    <h4 class="uk-comment-title uk-margin-remove">
                        @if ($article[0]->user->id != 28)
                            <a href="{{ route('showAuthorPosts', ['userName' => Str::slug($article[0]->user->name, '-') ] ) }}" 
                                class="uk-link-reset blue-links uk-text-small">
                                By: &nbsp;<u>{{$article[0]->user->name}}</u> 
                            </a>
                        @endif
                    </h4>
                    <ul class="uk-subnav uk-subnav-divider uk-margin-remove-top">
                        <li>
                            <small class="uk-text-capitalize new-subtitle">
                                {{$article[0]->created_at->translatedFormat('F d, Y')}}
                            </small>
                        </li>
                        <li>
                            <small class="uk-text-capitalize new-subtitle" id="time"></small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="article-body">
                <section id="content" class="new-desc">
                    {!! $article[0]->content !!}  
                </section>  
            </div>
            <section class="uk-margin-remove-top">
                <h4 class="side-title uk-text-left">Etiquetas 
                    <i class="fas fa-tags fa-xs"></i>
                </h4>
                <div class="uk-margin-remove-top uk-text-left">
                    @include('front.components.tags')
                </div>
            </section> 
        </div>
        <!-- Sidebar -->
        <div class="uk-width-1-3@m">
            <ul class="uk-nav uk-nav-default article-side-nav">
                <li class="uk-active side-title">
                    <a href="#" >
                        <i class="fas fa-book-reader" style="color: #74899c;"></i> 
                        {{ $article[0]->title }}
                    </a>
                </li>
                @foreach ($otherArticles as $otherArticle)
                <li class="uk-margin-small-top" style="text-indent: 3%;">
                    <a  href="{{ route('showArticle', ['category' => $otherArticle->category->slug, 'slug' => $otherArticle->slug]) }}" 
                        title="{{ $otherArticle->title }}"
                        class="blue-links">
                        <i class="fas fa-caret-right" style="color: #74899c;"></i>
                        {{ $otherArticle->title }}
                    </a>
                </li>                      
                @endforeach
            </ul>
            <section class="uk-margin-medium-top uk-text-center">
                <h4 class="side-title uk-text-left">Diario Visual
                    <i class="fas fa-expand-arrows-alt fa-xs"></i>
                </h4>
            </section>    
            <section class="uk-margin">
                @include('front.components.visualDiary',[$lastNewPhoto,'lastNewPhoto',])
            </section>
            <ul class="uk-list uk-list-divider uk-margin-medium-top">
                @foreach ($catcount as $cats)
                    <li>
                        <a class="blue-links" href="{{ $cats->slug }}">{{ $cats->name }}</a>
                        <small class="uk-align-right">( {{ $cats->items }} )</small> 
                    </li>
                @endforeach
            </ul>  
        </div>
    </div>
</div>



{{-- 
    <div class="uk-text-center uk-grid-collapse " uk-grid>

        <div class="uk-width-expand@m">

            <div class="uk-card uk-margin-xlarge-top">
                <div class="uk-card uk-card-default uk-card-body">
                @foreach ($article as $art)
                    @each('front.partials.showSharelinks', $article, 'article')

                        <span class="b-h5-link uk-align-left uk-label">
                            <a class="uk-link-reset" href="{{url($art->category->slug)}}">
                                    {{ $art->category->name }}
                            </a>
                        </span> 
                    <br>

                    <h1 class=" uk-text-left b-h1-content">{{$art->title}}</h1>

                    <h4 class="uk-text-left uk-text-secondary uk-text-uppercase uk-margin-remove-top"> 
                        {{$art->created_at->diffForHumans()}} 
                    </h4>

                    
                      
                    <h5 class="uk-text-left uk-margin-remove-top uk-text-bold">
                       {{$art->summary}}
                    </h5>

                    <h6 class="uk-text-left uk-margin-remove-top uk-text-bold" style="color: #44AAD4">
                        @if ($art->user->id != 28)
                        <a href="{{ route('showAuthorPosts', ['userName' => Str::slug($art->user->name, '-') ] ) }}" style="text-decoration: none">
                            {{$art->user->name}}
                        </a>
                        @endif
                    </h6>

                    <h6 class="uk-text-left uk-margin-remove-top">
                        <small id="time"></small>
                    </h6>

                    <hr>

                    <section id="content">
                        {!! $art->content !!}  
                    </section>   
                    
                    <div class="uk-float-left">
                        @if (empty($art->author))
                            <sub>
                                Foto(s): Cortesía | Bisturí Noticias
                            </sub>
                        @else
                            <sub>
                                Foto(s): {{$art->author}} | Bisturí Noticias
                            </sub>
                        @endif  
                    </div>   
                    
                    <div class="uk-margin-xlarge-top">
                        @foreach ($art->tags as $tag)
                            <a href="{{ route('showTagPosts', ['tagName' => $tag->name, 'tagId' => $tag->id] ) }}" style="text-decoration: none">
                                <span class="uk-label"style="background: #43A1C4;">
                                    #{{ $tag->name }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                @endforeach 
                </div>               
            </div>
        </div>
        
        <div class="uk-width-1-3@m uk-margin-large-top">  
            @each('front.components.generalNews',$generals, 'general')
        </div>
        
    </div>
 --}}

@endsection

@push('js')
<script>

    const result = document.getElementById("time");
    const text = document.getElementById('content').innerText;
    const words = text.split(" ").length;

    function readingTime(words) {
        const readingSpeed = 200;
        const readingTime = words / readingSpeed;
        result.innerHTML = `${ readingTime < 0.6 
                        ? readingTime.toFixed(2)+' Seg.' 
                        : Math.round(readingTime)+' Min.' } 
                        de lectura <i class="far fa-clock fa-xs"></i>`;

    }
    window.addEventListener("load", readingTime(words));
</script> 
@endpush


    

