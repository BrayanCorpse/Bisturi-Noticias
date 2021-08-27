
    <h3 class="b-h3">
        CLICK DEL DÍA
    </h3>

    <hr class="b-hr uk-margin-remove-top uk-align-center">
    <div class="uk-card uk-margin-small-bottom">
        <div class="uk-card b-card-body ">

            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="min-height: 325; max-height: 650; animation: fade; autoplay: true;">
                
                <ul class="uk-slideshow-items">
                    @foreach ($click->images   as $key => $image)
                        @if ($key >= 0)
                        <a href="{{ route('showArticle', ['category' => $click->category->slug, 'slug' => $click->slug]) }}" title="{{ $click->title }}">
                            <li>
                                <img  href="{{ route('showArticle', ['category' => $click->category->slug, 'slug' => $click->slug]) }}" title="{{ $click->title }}">
                                <img src="{{ asset('storage' . '/' . $click->user->name . '/'. $image->name ) }}" alt="{{ $click->title }}" uk-cover>
                            </li> 
                        </a>
                        @endif
                    @endforeach        
                </ul>
                
                <div class="b-click-center uk-h5 uk-text-truncate">{{$click->title}}</div>
                        
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                        
            </div>  
            
        </div>
    </div>