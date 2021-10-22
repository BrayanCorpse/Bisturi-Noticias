<div class="uk-flex uk-flex-column b-share-links-post-show">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&title={{ $article->title }}" 
        rel="noopener noreferrer"
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
</div>     