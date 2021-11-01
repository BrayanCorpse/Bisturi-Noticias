
<div class="uk-flex uk-flex-column b-share-links">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&title={{ $article->title }}" 
        rel="noopener noreferrer nofollow"
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
@push('ogf')
    <meta property="og:locale" content="es_MX">
        <meta property="og:type" content="article"> 
        <meta property="og:title" content="{{ $article->title }}"> 
        <meta property="og:description" content="{{ $article->summary }}"> 
        <meta property="og:url" content="{{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}">
        @if ( Route::current()->getName() == "index" )
            <meta property="og:site_name" content="Bisturí Noticias">  
        @else
            <meta property="og:site_name" 
                    content="Bisturí Noticias | {{ Route::current()->getName() }}">
        @endif
        <meta property="article:publisher" content="https://www.facebook.com/bisturinoticias">
        <meta property="og:image" 
                content="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}">
        <meta property="og:image:width" content="1920">
        <meta property="og:image:height" content="1080">
@endpush 

@push('ogt')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@BisturiNoticias">
<meta name="twitter:site" content="@BisturiNoticias">
<meta name="twitter:title" content="{{ Str::limit($article->title, 70) }}">
<meta name="twitter:description" content="{{ $article->summary }}">
<meta name="twitter:image" 
        content="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}">
<meta name="twitter:image:alt" content="{{ $article->title }}">
@endpush
