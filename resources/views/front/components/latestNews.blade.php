<div class="uk-margin-remove-top">  
    <div class="uk-card uk-card-body b-body b-card-body">
        @foreach ($late->images as $key =>  $image)
        <form action="{{  route('showArticle', ['category' => $late->category->slug, 'slug' => $late->slug]) }}" method="POST"> @csrf @method('POST')

            <input type="hidden" name="ida" value="{{ $late->id }}">

            @if ($key == 0)
                <div class="uk-card b-card-color">
                    <div class="uk-card-header">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <div class="uk-width-auto uk-align-center b">
                                {{-- <a href="{{ route('showArticle', ['category' => $late->category->slug, 'slug' => $late->slug]) }}" title="{{ $late->title }}"> --}}
                                <button class="btn-bisturi" type="submit" title="{{ $late->title  }}"> 
                                    <img class="b-circle-img" width="100" height="100" src="{{ asset('storage' . '/' . $late->user->name . '/'. $image->name ) }}" alt="{{ $late->title }}">
                                </button>
                                {{-- </a> --}}
                                <h5 class="uk-margin-remove-top uk-margin-remove-bottom">
                                    {{ $late->user->name }}
                                </h5>
                                <small>{{ $late->category->name }}</small>
                                <br>
                                <br>
                                <form action="{{  route('showArticle', ['category' => $late->category->slug, 'slug' => $late->slug]) }}" method="POST"> @csrf @method('POST')
                                {{-- <a class="b-title-link" href="{{ route('showArticle', ['category' => $late->category->slug, 'slug' => $late->slug]) }}" title="{{ $late->title }}"> --}}
                                <button class="btn-bisturi" type="submit" title="{{ $late->title  }}">
                                    <h5 class="uk-margin-remove-top b-h5-title">
                                        {{ Str::limit($late->title, 60) }}
                                    </h5>
                                </button>
                                {{-- </a> --}}
                                </form>
                            </div> 
                        </div>  
                    </div>
                    <div class="b-sub">
                        <h3 class="b-bottom-cat">
                            <strong>{{ $late->subcategoria }}</strong>
                        </h3>
                        <hr class="uk-divider-small b-hr-s">
                    </div>
                    <small class="b-vineta-date">{{ $late->created_at->diffForHumans() }}</small>
                </div>
            @endif
        </form>
        @endforeach
    </div>
</div>

