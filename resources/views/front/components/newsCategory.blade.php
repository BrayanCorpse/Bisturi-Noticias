<div class="uk-card b-margin-bt-category">
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
    {{-- @if($category->tipo_id == 3)
        @foreach ($category->images as $key =>  $image)
            @if ($key == 0)
                <div class="uk-card b-card-body b-card-category">
                    <a href="{{ route('showArticle', ['category' => $category->category->slug, 'slug' => $category->slug]) }}" title="{{ $category->title }}">

                        <img class="b-image" src="{{ asset('storage' . '/' . $category->user->name . '/'. $image->name ) }}" alt="{{ $category->title }}" width="400">
                    </a>
                </div>
            @endif         
        @endforeach  
    @endif --}}
</div>



