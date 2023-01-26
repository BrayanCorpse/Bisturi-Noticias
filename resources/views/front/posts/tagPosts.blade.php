@extends('front.template.layout')

@section('title', 'Bisturí Noticias | '.$tagName  )

@section('content')

<div class="b-header-l uk-margin-large-top uk-text-center">
  <h3 class="b-title-latest uk-h3" id="title-seccion">
    <span uk-icon="icon: tag; ratio: 1.2"></span> {{ $tagName }}
  </h3>
</div> 
<section class="tgp-main">
  <div class="tgp-container">
    @foreach ($articles as $article)
    
      <div class="tgp-card">
        <div class="card__header">
          @foreach ($images->where('artid',$article->id)->take(1) as $key => $image)
          <a href="{{ route('showArticle', ['category' => $article->catslug , 'slug' => $article->slug]) }}" title="{{ $article->title }}">
            <img  loading="lazy" src="{{ asset('storage' . '/' . $article->uname . '/'. $image->imgname) }}" alt="{{ $article->title }}" class="card__image" width="600">
          </a>
          @endforeach
          <a class="uk-link-reset" href="{{url( $article->catslug )}}">
              <span class="uk-label uk-margin-left uk-margin-top">{{ $tagName }}</span>
          </a>
        </div>
        <div class="card__body">
          @foreach($tags as $tag)
              @if ( $tag->article_id == $article->article_id)
              <div class="tag-content uk-margin-top">
                @if ($tagName != $tag->name)
                <a href="{{ route('showTagPosts', ['tagName' => $tag->name, 'tagId' => $tag->id] ) }}" style="text-decoration: none">
                  <span class="uk-badge b-badge">
                    <small>  <span uk-icon="icon: tag; ratio: 0.8"></span> {{ $tag->name }}</small> 
                  </span>
              </a>
                @else
                    
                @endif
               
              </div>
              @endif    
          @endforeach
          <a class="uk-link-reset" href="{{ route('showArticle', ['category' => $article->catslug , 'slug' => $article->slug]) }}" title="{{ $article->title }}">
            <h4 class="uk-margin-top">{{ $article->title }}</h4>
          </a>
          <p class="uk-margin-remove-top">{{ Str::limit($article->summary, 250) }}</p>
        </div>
        <div class="card__footer">
          <h6 class=" uk-margin-top">
            <span uk-icon="icon: calendar; ratio: 1"></span>
            {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}
          </h6>
          @if ($article->user_id != 28)
            <a href="{{ route('showAuthorPosts', ['userName' => Str::slug($article->uname, '-') ] ) }}" style="text-decoration: none">
              <small> <span uk-icon="icon: user; ratio: 1"></span> {{ $article->uname }} </small>
            </a>
          @endif
        </div>
      </div>
    @endforeach
  </div>
</section>

{{ $articles->onEachSide(2)->links() }} 

 @endsection
