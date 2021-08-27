<div class="uk-flex uk-flex-column b-sm-share-links">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&title={{ $article->title }}" 
        rel="noopener noreferrer"
        target="_blank" 
        class="uk-icon-button b-sm-icon-button uk-margin-small-right" 
        uk-icon="icon: facebook; ratio: 1">
    </a>
        
    <a  href="https://twitter.com/intent/tweet?url={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&text={{ $article->title }}&via=BisturiNoticias&hashtags={{ $article->tags[0]->name}}"
        rel="noopener noreferrer nofollow"
        target="_blank"
        class="uk-icon-button b-sm-icon-button twitter uk-margin-small-right" 
        uk-icon="icon: twitter; ratio: 1">
    </a>


    <a href="https://api.whatsapp.com/send?text=Mira este articulo {{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}" 
        rel="noopener noreferrer nofollow"
        target="_blank"
        class="uk-icon-button b-sm-icon-button" 
        uk-icon="icon: whatsapp; ratio: 1">
    </a>
</div>     


