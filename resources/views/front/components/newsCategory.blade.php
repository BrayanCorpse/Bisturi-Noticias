<div class="uk-card uk-margin-small-bottom">
    @if($category->tipo_id == 1)
        @foreach ($category->images as $key =>  $image)
            @if ($key == 0)
                <div class="uk-card b-card-body b-card-category">
                    <a href="{{ route('showArticle', ['category' => $category->category->slug, 'slug' => $category->slug]) }}" title="{{ $category->title }}">

                        <img class="b-image" src="{{ asset('storage' . '/' . $category->user->name . '/'. $image->name ) }}" alt="{{ $category->title }}" width="400">
                    </a>
                    <div class="b-category-center uk-h5">{{$category->title}}</div>
                    @include('front.partials.smallSharelinks', ['article' => $category])
                </div>
            @endif         
        @endforeach  
    @endif

    @if($category->tipo_id == 3)
        @foreach ($category->images as $key =>  $image)
            @if ($key == 0)
                <div class="uk-card b-card-body b-card-category">
                    <a href="{{ route('showArticle', ['category' => $category->category->slug, 'slug' => $category->slug]) }}" title="{{ $category->title }}">

                        <img class="b-image" src="{{ asset('storage' . '/' . $category->user->name . '/'. $image->name ) }}" alt="{{ $category->title }}" width="400">
                    </a>
                </div>
                @include('front.partials.smallSharelinks', ['article' => $category])
            @endif         
        @endforeach  
    @endif

</div>



