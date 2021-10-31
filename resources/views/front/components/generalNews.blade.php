<div class="uk-card b-card-body uk-padding-remove-top">
    @foreach ($general->images as $key =>  $image)
        @if ($key == 0)
            <div class="uk-card uk-card-default show-card-body">
                <h5 class="uk-h5 b-h5-Cname uk-text-left">{{ $general->category->name}}</h5>

                <a href="{{ route('showArticle', ['category' => $general->category->slug, 'slug' => $general->slug]) }}" title="{{ $general->title }}">

                    <img class="b-img-general" src="{{ asset('storage' . '/' . $general->user->name . '/'. $image->name ) }}" alt="{{ $general->title }}" width="300" height="300">

                </a>

                <div class="uk-text-left">
                    <a class="uk-link-reset" href="{{ route('showArticle', ['category' => $general->category->slug, 'slug' => $general->slug]) }}" title="{{ $general->title }}">

                        <h5 class="uk-h5 b-h5-title-gn uk-margin-small-top uk-margin-remove-bottom">{{ $general->title}}</h5>  

                    </a> 
                    <br>
                    @foreach ($general->tags as $tag)
                        <span class="uk-label uk-margin-small-top" style="background: #E0E0E0; color:#222; font-weight:bold;">#{{ $tag->name }}</span>
                    @endforeach
                </div>
            
            </div>
        @endif
    @endforeach
</div>
