<div class="uk-card uk-margin-small-bottom">
    <div class="uk-card b-card-body">
        <div class="uk-position-relative" uk-slideshow="animation: fade; autoplay: true">
            <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}" title="{{ $article->title }}">
                <ul class="uk-slideshow-items">
                    @foreach ($article->images as $key =>  $image)
                        @if ($key >= 0)
                            <li>
                                <img src="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}" alt="{{ $article->title }}" uk-cover>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @foreach ($article->images as $key =>  $image)
                    @if ($key >= 0)
                        <a  class="uk-position-center-left uk-position-small uk-hidden-hover" 
                            href="{{$key}}" 
                            uk-slidenav-previous uk-slideshow-item="previous">
                        </a>
                        <a  class="uk-position-center-right uk-position-small uk-hidden-hover" 
                            href="{{$key}}" 
                            uk-slidenav-next uk-slideshow-item="next">
                        </a>
                    @endif
                @endforeach

            </a>
            {{-- <div class="b-center uk-h4">{{$article->title}}</div>   --}}
            @include('front.partials.sharelinks', ['article' => $article])
        </div>
        <div class="uk-card-footer uk-card-default b-click-footer">
            <h5 class="b-h5-title-mn">
                <strong>{{ Str::limit($article->title, 105) }} </strong>
                |
                <small>{{ Str::limit($article->summary, 150) }}</small>
            </h5>
            <div class="b-author-ft">
                @if (empty($article->author))
                    <sub>
                        Foto: Cortesía | Bisturí Noticias
                    </sub>
                @else
                    <sub>
                        Foto: {{$article->author}} | Bisturí Noticias
                    </sub>
                @endif  
            </div>   
        </div>
        
    </div>
</div>

@push('js')
<script>
    let mytags = document.getElementsByClassName('tags');
    let twitter = document.querySelector('.twitter');
    let newtags = [];
    let url = ';'
    function newTags(){
        for (var i = 0; i < mytags.length; i++) {
            newtags.push(mytags[i].value);
        }
        newtags = newtags.toString();
        url = `https://twitter.com/intent/tweet?url={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&text={{ $article->title }}&via=BisturiNoticias&hashtags=${newtags}`
        
        twitter.setAttribute('href',url);

        // console.log(twitter);

    }

    window.onload = newTags;
</script>  
@endpush
