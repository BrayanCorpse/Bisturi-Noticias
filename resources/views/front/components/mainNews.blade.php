<div class="uk-card uk-margin-small-bottom">
    <div class="uk-card b-card-body ">
        <div class="uk-position-relative" uk-slideshow="animation: fade">
            <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}" title="{{ $article->title }}">
                <ul class="uk-slideshow-items">
                    @foreach ($article->images as $key =>  $image)
                        @if ($key == 0)
                            <li>
                                <img src="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}" alt="{{ $article->title }}" uk-cover>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </a>
            <div class="b-center uk-h4">{{$article->title}}</div>
        </div>
    </div>
</div>