<div class="b-card-body b-mrt">
    
    @foreach ($late->images as $key =>  $image)
        @if ($key == 0)
        <article class="uk-comment b-comment-primary uk-position-relative">
            <span class="b-span-section b-span-text">Viñetas</span>
            <header class="uk-comment-header">
                <div class="uk-grid-medium uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <a href="{{ route('showArticle', ['category' => $late->category->slug, 'slug' => $late->slug]) }}" title="{{ $late->title }}">
                            <img class="b-circle-img" width="100" height="100" src="{{ asset('storage' . '/' . $late->user->name . '/'. $image->name ) }}" alt="{{ $late->title }}">
                        </a>
                    </div>
                    <div class="uk-width-expand">
                        <h5 class="uk-comment-title uk-text-left">
                            {{ $late->user->name }}
                        </h5>
                        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                            <li>{{ $late->category->name }}</li>
                            <li>{{ $late->subcategoria }}</li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="uk-comment-body">
                <a class=" uk-link-muted" href="{{ route('showArticle', ['category' => $late->category->slug, 'slug' => $late->slug]) }}" title="{{ $late->title }}">
                    <h5 class="b-h5-title">
                        {{ Str::limit($late->title, 50) }}
                    </h5>
                </a>
            </div>
        </article>
        @endif
    @endforeach
</div>