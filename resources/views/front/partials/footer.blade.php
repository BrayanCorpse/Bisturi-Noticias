<div class="uk-section uk-section-secondary uk-light">
    <div class="uk-container">
        <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-text-center" uk-grid>
                    <div class="uk-width-auto@m">
                        <h2 class="uk-h2 uk-heading-medium uk-margin-remove-bottom">
                            BISTURI NOTICIAS
                        </h2>
                    </div>
                    
                    <div class="uk-width-auto@m uk-position-right b-links">
                        <a  href="https://www.facebook.com/bisturinoticias" 
                            rel="noopener noreferrer" 
                            target="_blank" 
                            class="uk-icon-button b-links-button uk-margin-small-right" 
                            uk-icon="icon: facebook; ratio: 1.3">
                        </a>
                        <a  href="https://twitter.com/BisturiNoticias"
                            rel="noopener noreferrer"
                            target="_blank"  
                            class="uk-icon-button b-links-button uk-margin-small-right" 
                            uk-icon="icon: twitter; ratio: 1.3">
                        </a>
                        <a  href="https://www.instagram.com/bisturi_noticias/" 
                            rel="noopener noreferrer"
                            target="_blank" 
                            class="uk-icon-button b-links-button uk-margin-small-right" 
                            uk-icon="icon: instagram; ratio: 1.3">
                        </a>
                        <a  href="https://wa.me/+527225061527?text=Me%20gustaria%20anunciarme%20en%20su%20sitio" 
                            rel="noopener noreferrer" 
                            target="_blank" 
                            class="uk-icon-button b-links-button uk-margin-small-right" 
                            uk-icon="icon: whatsapp; ratio: 1.3">
                        </a>
                        <a href="https://www.youtube.com/channel/UCmFMfAhTgGjLSclxH-tw7BA"
                            rel="noopener noreferrer" 
                            target="_blank" 
                            class="uk-icon-button b-links-button uk-margin-small-right" 
                            uk-icon="icon: youtube; ratio: 1.3">
                        </a>
                        <a href="mailto:tuopinion@bisturinoticias.com"
                            rel="noopener noreferrer" 
                            target="_blank" 
                            class="uk-icon-button b-links-button" 
                            uk-icon="icon: mail; ratio: 1.3">
                        </a>
                    </div>
                  
                    
                </div>
               
        </nav>
              
        <hr>

        <ul class="uk-subnav uk-flex-center links uk-margin-medium-top">
            
            <li class="uk-active"><a href="{{ route('index')}}">Inicio</a></li>
            <li class="uk-active">
                <a href="{{ route('categories', [ 'categorySlug' => 'informacion-general' ]) }}"        class="item -link" id="info">
                    Información General
                </a>
            </li>
            <li class="uk-active">
                <a href="{{ route('categories', [ 'categorySlug' => 'salud' ]) }}" class="item -link" id="salud">Salud</a>
            </li>
            <li class="uk-active">
                <a href="{{ route('categories', [ 'categorySlug' => 'emergencias' ]) }}" class="item -link" id="emergencias">Emergencias</a>
            </li>
            <li class="uk-active">
                <a href="{{ route('categories', [ 'categorySlug' => 'deportes' ]) }}" class="item -link" id="deportes">Deportes</a>
            </li>
            <li class="uk-active">
                <a href="{{ route('categories', [ 'categorySlug' => 'telon-y-espectaculos' ]) }}"       class="item -link" id="telon">
                    Telón,Espectáculos y Letras
                </a>
            </li>
            <li class="uk-active">
                <a href="{{ route('categories', [ 'categorySlug' => 'opinion' ]) }}" class="item -link" id="opinion">Opinión</a>
            </li>
            <li class="uk-active">
                <a href="{{ route('categories', [ 'categorySlug' => 'clicks' ]) }}" class="item -link" id="click">Click del Día</a>
            </li>
        </ul>

        <p class="register uk-text-center uk-margin-medium-top">Bisturi Noticias de México ® 2023</p>
        
        <ul class="uk-subnav uk-flex-center terms">
            <li class="uk-active"><a href="#privacy-full" uk-toggle>Aviso de Privacidad |</a></li>
            <li class="uk-active"><a href="#modal-full" uk-toggle>Acerca de Nosotros |</a></li>
            {{-- <li class="uk-active"><a href="#">Términos y Condiciones |</a></li> --}}
            <li class="uk-active"><a href="tel:+527225061527" uk-icon="phone">Contacto</a></li>
        </ul>

        <div class=" uk-text-center">
            <hr>
            <small>
                © 2023 
                <a class="uk-link-reset" href="https://bydsolutions.com/" target="_blank" rel="noopener noreferrer">
                    ByD Solutions 
                </a>  
                💻  
            </small>
        </div>
        @include('front.partials.bienvenida')
        @include('front.partials.privacy')
    </div>
</div>

