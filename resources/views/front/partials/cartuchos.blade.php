<h5 class="b-cartucho uk-h5" id="title-seccion">{{$article->title}}</h5>
<hr class="b-hr uk-align-center">

<div class="uk-grid-collapse uk-child-width-1-3@m uk-text-center" uk-grid>
    @foreach ($article->images as $key =>  $image)
        @if ($key >= 0 && $key <= 2)
        <div class=" uk-margin-bottom">
            <div class="uk-card b-card-body">
                <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}" title="{{ $article->title }}">
                    <img class="b-news-img" 
                     src="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}" alt="{{ $article->title }}">
                </a>
            </div>
        </div>
        @endif
    @endforeach
</div>

    
    


