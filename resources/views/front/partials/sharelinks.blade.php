
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

@push('js')
    <script>
        function metaOG(){

            let Ogtype = document.querySelector('meta[property="og:type"]');
                Ogtype.setAttribute("content", 'article');

            let Ogtitle = document.querySelector('meta[property="og:title"]');
                Ogtitle.setAttribute("content", '{{ $article->title }}');

            let Ogdesc = document.querySelector('meta[property="og:description"]');
                Ogdesc.setAttribute("content", '{{ $article->summary }}');

            let Ogurl = document.querySelector('meta[property="og:url"]');
                Ogurl.setAttribute("content", '{{ Request::fullUrl() }}');

            let Ogsitename = document.querySelector('meta[property="og:site_name"]');
                Ogsitename.setAttribute("content", '{{ Route::current()->getName() }}');
                if(Ogsitename.content == 'index'){
                    Ogsitename.setAttribute("content", 'Bisturí Noticias');
                }
                else{
                    Ogsitename.setAttribute("content", 'Bisturí Noticias | {{ Route::current()->getName() }}');
                }

            let Ogimage = document.querySelector('meta[property="og:image"]');
                Ogimage.setAttribute("content", "{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}");

            // console.log(Ogtype, Ogtitle, Ogdesc, Ogsitename, Ogimage);
        }

        window.onload = metaOG();
             
    </script>
@endpush 