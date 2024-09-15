{{-- <div class="uk-card b-margin-bt-category">
    @foreach ($category->images as $key =>  $image)
        @if ($key == 0)
            <div class="b-card-category">
                <a href="{{ route('showArticle', ['category' => $category->category->slug, 'slug' => $category->slug]) }}" title="{{ $category->title }}">
                    <img loading="lazy" class="b-image" src="{{ asset('storage' . '/' . $category->user->name . '/'. $image->name ) }}" alt="{{ $category->title }}" width="400">
                </a>
                <div class="uk-card-footer uk-card-default b-click-footer">
                    <h6 class="b-h5-title">
                        <strong>{{ Str::limit($category->title, 70) }}</strong> 
                        |
                        <small>{{ Str::limit($category->summary, 80) }}</small>  
                    </h6>  
                </div>
            </div>
            <br>
        @endif
    @endforeach  
</div>

 --}}

 <style>
    .article-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .article-card h3 {
        margin: 10px 0;
        font-size: 1.2rem;
    }

    .article-card .author {
        display: flex;
        align-items: center;
    }

    .article-card .author img {
        border-radius: 50%;
        width: 30px;
        height: 30px;
        object-fit: cover;
        margin-right: 10px;
    }

    .badge {
        background-color: rgba(81, 79, 79, 0.7);
        color: #fff;
        font-weight: 400;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.8rem;
        text-transform: capitalize;
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .article-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .article-content {
        flex-grow: 1;
    }
</style>

<div class="uk-container uk-margin-large-bottom">
    <div class="uk-grid-small uk-child-width-1-3@s" uk-grid>
        <!-- Tarjeta 1 -->
        @foreach ($lastArticles as $lastArticle)
        <div>
            <div class="article-card uk-card-body uk-padding-small">
                <div class="uk-position-relative">
                    <a href="{{ route('showArticle', ['category' => $lastArticle->category->slug, 'slug' => $lastArticle->slug]) }}" title="{{ $lastArticle->title }}">
                        <img src="{{ asset('storage/' . $lastArticle->user->name . '/' . $lastArticle->images[0]->name ) }}" alt="{{ $lastArticle->title }}" class="uk-border-rounded">
                    </a>
                    <span class="badge">{{ $lastArticle->tags[0]->name }}</span>
                </div>
                <div class="article-content">
                    <section class="uk-margin-small-top">
                        <span class="uk-text-capitalize new-subtitle">
                            {{ $lastArticle->created_at->translatedFormat('F d, Y') }}
                        </span>
                        <strong class="uk-margin-small-left uk-margin-small-right">·</strong>
                        @php
                            $wordsPerMinute = 200;
                            $wordCount = str_word_count(strip_tags($lastArticle->content));
                            $readingTime = ceil($wordCount / $wordsPerMinute);
                        @endphp
                        <span class="uk-text-capitalize new-subtitle">
                            {{ $readingTime  }}  Min. de lectura
                        </span>
                    </section>
                    <div class="author uk-margin-small-top">
                        <img class="uk-comment-avatar uk-border-circle" src="{{ asset('img/avatar-1.png') }}" width="30" height="30" alt="Avatar del Autor">
                        <span>{{ $lastArticle->user->name }}</span>
                    </div>
                    <h3>
                        <a href="{{ route('showArticle', ['category' => $lastArticle->category->slug, 'slug' => $lastArticle->slug]) }}" title="{{ $lastArticle->title }}" class="blue-links">
                            {{ $lastArticle->title }}
                        </a>
                    </h3>
                    <p class="uk-text-emphasis new-desc">
                        {{ Str::limit($lastArticle->summary, 150) }}
                    </p>
                </div>
                <hr style="border-top: 2px solid #1b9a8b;">
            </div>
        </div>
        @endforeach
    </div>
</div>
