<div class="uk-card b-card-body uk-padding-remove-top">
    @foreach ($general->images as $key =>  $image)
        @if ($key == 0)
            <div class="uk-card show-card-body uk-position-relative">
                <a class="uk-link-reset" href="{{url($general->category->slug)}}">
                    <span class="b-span-generals b-span-text">{{ $general->category->name}}</span>
                </a>
                <a href="{{ route('showArticle', ['category' => $general->category->slug, 'slug' => $general->slug]) }}" title="{{ $general->title }}">

                    <img loading="lazy" class="b-img-general" src="{{ asset('storage' . '/' . $general->user->name . '/'. $image->name ) }}" alt="{{ $general->title }}" width="225" height="225">

                </a>
                
                <div class="uk-card-footer uk-card-default b-card-body">
                    <h6 class="b-h6-title-gn">{{ $general->title}}</h6>
                    @foreach ($general->tags as $tag)
                    <span class="uk-badge b-badge">
                        <small>#{{ $tag->name }}</small> 
                    </span>
                @endforeach
                </div>
               
            </div>
        @endif
      
    @endforeach
    
</div>
