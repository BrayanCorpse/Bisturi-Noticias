{{-- <div class="uk-flex uk-flex-center b-gap">
    @foreach ($lastgeneralNews as $lastgeneralNew)
        <div class="uk-card b-card-body">
            @foreach ($lastgeneralNew->images as $key => $image)
                @if ($key == 0)
                <a href="{{ route('showArticle', ['category' => $lastgeneralNew->category->slug, 'slug' => $lastgeneralNew->slug]) }}" title="{{ $lastgeneralNew->title }}">

                    <img class="b-card-img" src="{{ asset('storage' . '/' . $lastgeneralNew->user->name . '/'. $image->name ) }}" alt="{{ $lastgeneralNew->title }}" width="500">

                </a>
                @endif
            @endforeach
            <div class="b-lastgN-center uk-h5">
               {{$lastgeneralNew->title}}
            </div> 
        </div>
        
    @endforeach
</div> --}}

<div class="uk-text-center" uk-grid>
    <div class="uk-width-1-3@m">
        <div class="uk-card b-card-body">
            @foreach ($lastNewPhoto as $lastNp)
                @foreach ($lastNp->images as $key => $image)
                    @if ($key == 0)
                    <a href="{{ route('showArticle', ['category' => $lastNp->category->slug, 'slug' => $lastNp->slug]) }}" title="{{ $lastNp->title }}">

                        <img class="b-card-img2" src="{{ asset('storage' . '/' . $lastNp->user->name . '/'. $image->name ) }}" alt="{{ $lastNp->title }}" width="400" height="400">

                    </a>
                    @endif
                @endforeach
                {{-- <div class="b-lastgN-center uk-h6">
                    {{ Str::limit($lastNp->title, 50) }}
                </div>  --}}
                <div class="uk-card-footer uk-card-default b-click-footer b-noti-foto">
                    {{ Str::limit($lastNp->title, 50) }}
                    <div class="b-author-ntf">
                        @if (empty($lastNp->author))
                            <sub>
                                Foto: Cortesía | Bisturí Noticias
                            </sub>
                        @else
                            <sub>
                                Foto: {{$lastNp->author}} | Bisturí Noticias
                            </sub>
                        @endif  
                    </div>   
                </div>
            @endforeach
        </div>
    </div>
    <div class="uk-width-expand@m uk-padding-remove-left uk-margin-remove-top">
        <div class="uk-card b-card-body">
            @foreach ($lastNewText as $lastNt)
                <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s b-border-duo" uk-grid>
                    <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                        @foreach ($lastNt->images as $key => $image)
                            @if ($key == 0)
                            <a href="{{ route('showArticle', ['category' => $lastNt->category->slug, 'slug' => $lastNt->slug]) }}" title="{{ $lastNt->title }}">

                                <img class="b-card-img" src="{{ asset('storage' . '/' . $lastNt->user->name . '/'. $image->name ) }}" alt="{{ $lastNt->title }}" width="400" height="400">

                            </a>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <div class="b-card-body b-body-content">
                            <h4 class="b-card-title">  {{ Str::limit($lastNt->title, 50) }}</h4>
                            <h6 class="b-sumario">
                                {{ Str::limit($lastNt->summary, 150) }}
                            </h6>
                            <h6 class="b-creditos">{{ $lastNt->user->name}}</h6>
                            <p class="b-content-duo">
                                {{ Str::limit($lastNt->excerpt, 325) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>