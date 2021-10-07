<div class="uk-flex uk-flex-center b-gap">
    @foreach ($lastgeneralNews as $lastgeneralNew)
        <div class="uk-card b-card-body">
            @foreach ($lastgeneralNew->images as $key => $image)
                @if ($key == 0)
                <a href="{{ route('showArticle', ['category' => $lastgeneralNew->category->slug, 'slug' => $lastgeneralNew->slug]) }}" title="{{ $lastgeneralNew->title }}">

                    <img class="b-cart-img" src="{{ asset('storage' . '/' . $lastgeneralNew->user->name . '/'. $image->name ) }}" alt="{{ $lastgeneralNew->title }}" width="500">

                </a>
                @endif
            @endforeach
            <div class="b-lastgN-center uk-h5">
               {{$lastgeneralNew->title}}
            </div> 
        </div>
        
    @endforeach
</div>

