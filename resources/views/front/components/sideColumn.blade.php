<div class="uk-card uk-card-default uk-card-body uk-padding">
    <form class="uk-search uk-search-default uk-width-expand">
        <input class="uk-search-input" 
                type="search" 
                placeholder="Search..." 
                aria-label="Search">
        <span class="uk-search-icon-flip" uk-search-icon></span>
    </form>    
    <section class="uk-text-center uk-margin">
        <img class="uk-border-circle uk-box-shadow-large" src="{{ asset('img/bnsbg.png') }}" 
        width="100" 
        height="100" 
        alt="Border circle">      
    </section>
    <p class="uk-text-center font-codec">
        En BN estamos convencidos de que la noticia debe vivirse para poder contarla.
    </p>
    <section class="uk-text-center">
        @include('front.components.smallSocials')
    </section>
    <section class="uk-margin-medium-top uk-text-center">
        <h4 class="side-title uk-text-left">Diario Visual
            <i class="fas fa-expand-arrows-alt fa-xs"></i>
        </h4>
    </section>    
    <section class="uk-margin">
        @include('front.components.visualDiary',[$lastNewPhoto,'lastNewPhoto',])
    </section>
    <section class="uk-margin-medium-top uk-text-center">
        <h4 class="side-title uk-text-left">En Tendencía 
            <i class="fas fa-fire fa-xs"></i>
        </h4>
    </section>
    <section class="uk-margin">
        @include('front.components.smallNews',[$lastNewText, 'lastNewText'])
    </section>
    <section class="uk-margin-medium-top uk-text-center">
        <h4 class="side-title uk-text-left" style="color: #333333;">Videos Populares 
            <a href="">
                <small class="side-title uk-float-right" style="font-weight: 400;">Ver Más</small>
            </a>
        </h4>
        <div class="uk-child-width-1-1@s" uk-grid>
            <div class=" uk-margin-remove-bottom">
                <video src="https://cdn.pixabay.com/video/2016/09/21/5398-183786939_medium.mp4" 
                        width="1800" height="1200" loop muted playsinline uk-video="autoplay: inview" 
                style="border-radius: 10px"></video>
            </div>
            <h6 class="side-title uk-margin-small-top uk-text-left" style="color: #333333;">
                Play video when it enters the viewport and pause it again when it leaves the viewport.
            </h6>
        </div>
    </section>
    {{-- <div class="fb-page uk-margin-top" data-href="https://www.facebook.com/bisturibnnoticias" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bisturibnnoticias" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bisturibnnoticias">BN Noticias </a></blockquote></div> --}}
    <section class="uk-margin-medium-top uk-text-center">
        <h4 class="side-title uk-text-left">Categorías 
            <i class="fas fa-stream fa-xs"></i>
        </h4>
    </section>
    <ul class="uk-list uk-list-divider">
        @foreach ($catcount as $cats)
            <li>{{ $cats->name }} <small class="uk-align-right">( {{ $cats->items }} )</small> </li>
        @endforeach
    </ul>  
    <section class="uk-margin-medium-top uk-text-center">
        <h4 class="side-title uk-text-left">Etiquetas 
            <i class="fas fa-tags fa-xs"></i>
        </h4>
        <div class="uk-margin-small-top">
            @include('front.components.tags')
        </div>
    </section> 
</div>
