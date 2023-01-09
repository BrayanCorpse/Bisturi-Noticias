<div class="uk-card b-card-body uk-padding-remove-top">
    @foreach ($general->images as $key =>  $image)
    <form action="{{  route('showArticle', ['category' => $general->category->slug, 
        'slug' => $general->slug]) }}" method="POST"> @csrf @method('POST')
        
        <input type="hidden" name="ida" value="{{ $general->id }}">

        @if ($key == 0)
            <div class="uk-card show-card-body uk-position-relative">
                <a class="uk-link-reset" href="{{url($general->category->slug)}}">
                    <span class="b-span-generals b-span-text">{{ $general->category->name}}</span>
                </a>
                {{-- <a href="{{ route('showArticle', ['category' => $general->category->slug, 'slug' => $general->slug]) }}" title="{{ $general->title }}"> --}}
                <button class="btn-bisturi" type="submit" title="{{ $general->title }}" style="padding: unset;">  
                    <img loading="lazy" class="b-img-general" src="{{ asset('storage' . '/' . $general->user->name . '/'. $image->name ) }}" alt="{{ $general->title }}" width="225" height="225">
                </button>
                {{-- </a> --}}
                
                <div class="uk-card-footer uk-card-default b-card-body">
                    <h6 class="b-h6-title-gn">{{ $general->title}}</h6>
                    @foreach ($general->tags as $tag)
                    <a href="{{ route('showTagPosts', ['tagName' => $tag->name, 'tagId' => $tag->id] ) }}" style="text-decoration: none">
                        <span class="uk-badge b-badge">
                            <small>#{{ $tag->name }}</small> 
                        </span>
                    </a>
                @endforeach
                </div>
            
            </div>
        @endif  
    </form>
    @endforeach  
</div>

