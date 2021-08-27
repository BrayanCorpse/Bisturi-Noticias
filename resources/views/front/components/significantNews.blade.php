<div class="uk-position-relative b-slider" uk-slideshow="animation: fade">

    <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}" title="{{ $article->title }}">
        <ul class="uk-slideshow-items">
            @foreach ($article->images as $key =>  $image)
                @if ($key <= 8)
                <li>
                    <img src="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}" alt="{{ $article->title }}" uk-cover>
                </li>
                @endif
            @endforeach
        </ul>
    </a>
    <div class="b-SNews uk-h2">{{$article->title}}</div>
    @include('front.partials.sharelinks', ['article' => $article])

    <div class="uk-position-bottom-center uk-position-small">
        <ul class="uk-thumbnav">
            @foreach ($article->images as $key =>  $image)
                @if ($key <= 8)
                <li uk-slideshow-item="{{$key}}">
                    <a href="{{$key}}">
                        <img class="b-thumbnav" src="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}" alt="{{ $article->title }}" width="150">
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
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