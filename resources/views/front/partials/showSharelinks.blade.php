<li>
    <i class="far fa-hand-point-right"></i>
</li>
<li class="show-link">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&title={{ $article->title }}"
        rel="noopener noreferrer" 
        target="_blank"  
        class="uk-icon-link"  
        uk-icon="icon: facebook;  ratio: 0.8">
    </a>
</li>


@foreach ($article->tags as $tag)
    <input type="text" class="show-tags" value="{{ $tag->name }}" hidden />
@endforeach

<li class="show-more-link ">
    <a  rel="noopener noreferrer nofollow"
        target="_blank"
        class="uk-icon-link show-twitter"  
        uk-icon="icon: twitter; ratio: 0.8">
    </a>
</li>


<li class="show-more-link ">
    <a href="https://api.whatsapp.com/send?text=Mira este articulo {{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}" 
        rel="noopener noreferrer" 
        target="_blank"   
        class="uk-icon-link"                        
        uk-icon="icon: whatsapp;   ratio: 0.8">
      </a>
</li>

<li class="show-more-link ">
    <a rel="noopener noreferrer" 
    target="_blank"   
    class="uk-icon-link uk-margin-small-right"  
    uk-icon="icon: copy; ratio: 0.8"
    onclick="navigator.clipboard.writeText(window.location.href);
    this.insertAdjacentHTML('afterend', '<div class=tooltip>copiado</div>');
    setTimeout(() => { 
    document.querySelector('.tooltip').remove(); 
        }, 250);">
  </a>  
</li>

       

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
    @if ( empty($article->excerpt) )
        <meta property="og:description" content="{{ $article->summary }}">
    @else
        <meta property="og:description" content="{{ $article->excerpt }}">
    @endif
    <meta property="og:url" content="{{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}">
    @if ( Route::current()->getName() == "index" )
        <meta property="og:site_name" content="Bisturí Noticias">  
    @else
        <meta property="og:site_name" 
                content="Bisturí Noticias | {{ $article->category->name }}">
    @endif
    <meta property="article:publisher" content="https://www.facebook.com/bisturibnnoticias/">
    <meta property="og:image" 
            content="{{ asset('storage'.'/'.$article->user->name.'/'.$article->images[0]->name) }}">
    <meta property="og:image:height" content="600">
    <meta property="og:image:width" content="1200">
    <meta property="fb:app_id" content="1963124430785043" />
    
@endpush 

@push('ogt')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@BisturiNoticias">
<meta name="twitter:site" content="@BisturiNoticias">
<meta name="twitter:title" content="{{ Str::limit($article->title, 70) }}">
<meta name="twitter:description" content="{{ $article->summary }}">
<meta name="twitter:image" 
    content="{{ asset('storage'.'/'.$article->user->name.'/'.$article->images[0]->name) }}">
<meta name="twitter:image:alt" content="{{ $article->title }}">
@endpush


