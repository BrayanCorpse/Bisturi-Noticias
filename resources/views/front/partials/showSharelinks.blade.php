<div class="uk-flex b-share-links-post-show">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&title={{ $article->title }}" 
        rel="noopener noreferrer nofollow"
        target="_blank" 
        class="uk-icon-button b-icon-button uk-margin-small-right" 
        uk-icon="icon: facebook; ratio: 1">
    </a>

    @foreach ($article->tags as $tag)
        <input type="text" class="show-tags" value="{{ $tag->name }}" hidden />
    @endforeach

    <a  rel="noopener noreferrer nofollow"
        target="_blank"
        class="uk-icon-button b-icon-button show-twitter uk-margin-small-right" 
        uk-icon="icon: twitter; ratio: 1">
    </a>
    
    <a href="https://api.whatsapp.com/send?text=Mira este articulo {{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}" 
        rel="noopener noreferrer nofollow"
        target="_blank"
        class="uk-icon-button b-icon-button" 
        uk-icon="icon: whatsapp; ratio: 1">
    </a>

    <a  rel="noopener noreferrer nofollow"
        class="uk-icon-button b-icon-button copy uk-margin-small-right" 
        uk-icon="icon: link; ratio: 1.3"
        onclick="navigator.clipboard.writeText(window.location.href);
                this.insertAdjacentHTML('afterend', '<div class=tooltip>copiado</div>');
                setTimeout(() => { 
                document.querySelector('.tooltip').remove(); 
                    }, 250);">
    </a>

</div>    

@push('js')
<script>
    let Swmytags = document.getElementsByClassName('show-tags');
    let Swtwitter = document.querySelector('.show-twitter');
    let Swnewtags = [];
    let Swurl = ';'

    function SwnewTags(){
        for (var i = 0; i < Swmytags.length; i++) {
            Swnewtags.push(Swmytags[i].value);
        }
        Swnewtags = Swnewtags.toString();
        Swurl = `https://twitter.com/intent/tweet?url={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&text={{ $article->title }}&via=BisturiNoticias&hashtags=${Swnewtags}`
        
        Swtwitter.setAttribute('href',Swurl);


    }

    window.onload = SwnewTags;
</script>  
@endpush

@push('ogf')
    <meta property="og:locale" content="es_MX">
        <meta property="og:type" content="article"> 
        <meta property="og:title" content="{{ $article->title }}"> 
        <meta property="og:description" content="{{ $article->summary }}"> 
        <meta property="og:url" content="{{ Request::fullUrl() }}">
        @if ( Route::current()->getName() == "index" )
            <meta property="og:site_name" content="Bisturí Noticias">  
        @else
            <meta property="og:site_name" 
                    content="Bisturí Noticias | {{ $article->category->name .' | '. $article->slug }}">
        @endif
        <meta property="article:publisher" content="https://www.facebook.com/bisturinoticias">
        <meta property="og:image" 
                content="{{ asset('storage' . '/' . $article->user->name . '/'. $article->images[0]->name ) }}">
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
        content="{{ asset('storage' . '/' . $article->user->name . '/'. $article->images[0]->name ) }}">
<meta name="twitter:image:alt" content="{{ $article->title }}">
@endpush


