@push('ogf')
<meta property="og:title" content="{{ $article->title }}">
<meta property="og:description" content="{{ $article->summary }}">
<meta property="og:url" content="{{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}">
<meta property="og:site_name" content="Bisturí Noticias">
<meta property="article:publisher" content="https://www.facebook.com/bisturinoticias">
<meta property="og:image" content="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}">
@endpush
<div class="uk-flex uk-flex-column b-share-links">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&title={{ $article->title }}" 
        rel="noopener noreferrer"
        target="_blank" 
        class="uk-icon-button b-icon-button uk-margin-small-right" 
        uk-icon="icon: facebook; ratio: 1">
    </a>

    @foreach ($article->tags as $tag)
        <input type="text" class="tags" value="{{ $tag->name }}" hidden />
    @endforeach

    <a  rel="noopener noreferrer nofollow"
        target="_blank"
        class="uk-icon-button b-icon-button twitter uk-margin-small-right" 
        uk-icon="icon: twitter; ratio: 1">
    </a>
    
    <a href="https://api.whatsapp.com/send?text=Mira este articulo {{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}" 
        rel="noopener noreferrer nofollow"
        target="_blank"
        class="uk-icon-button b-icon-button" 
        uk-icon="icon: whatsapp; ratio: 1">
    </a>
</div>     