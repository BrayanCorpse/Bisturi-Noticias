

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
                            class="uk-icon-button uk-margin-small-right" 
                            uk-icon="icon: facebook; ratio: 1.5">
                        </a>
                        <a  href="https://twitter.com/BisturiNoticias"
                            rel="noopener noreferrer"
                            target="_blank"  
                            class="uk-icon-button uk-margin-small-right" 
                            uk-icon="icon: twitter; ratio: 1.5">
                        </a>
                        <a  href="https://www.instagram.com/bisturi_noticias/" 
                            rel="noopener noreferrer"
                            target="_blank" 
                            class="uk-icon-button uk-margin-small-right" 
                            uk-icon="icon: instagram; ratio: 1.5">
                        </a>
                        <a  href="https://wa.me/+527225061527?text=Me%20gustaria%20anunciarme%20en%20su%20sitio" 
                            rel="noopener noreferrer" 
                            target="_blank" 
                            class="uk-icon-button" 
                            uk-icon="icon: whatsapp; ratio: 1.5">
                        </a>
                    </div>
                  
                    
                </div>
               
        </nav>
              
        <hr>

        <ul class="uk-subnav uk-flex-center links uk-margin-medium-top">
            <li class="uk-active"><a href="{{ route('index')}}">Inicio</a></li>
            <li class="uk-active">
                <a href="{{ route('informacion General')}}">Información General</a>
            </li>
            <li class="uk-active"><a href="{{ route('salud') }}">Salud</a></li>
            <li class="uk-active"><a href="{{ route('emergencias') }}">Emergencias</a></li>
            <li class="uk-active"><a href="{{ route('deportes') }}">Deportes</a></li>
            <li class="uk-active">
                <a href="{{ route('telon y Espectaculos')}}">Telón y Espectáculos</a>
            </li>
            <li class="uk-active"><a href="{{ route('opinion')}}">Opinión</a></li>
        </ul>

        <p class="register uk-text-center uk-margin-medium-top">Bisturi Noticias de México ® 2021</p>

        <ul class="uk-subnav uk-flex-center terms">
            <li class="uk-active"><a href="#">Aviso de Privacidad |</a></li>
            <li class="uk-active"><a href="#modal-full" uk-toggle>Acerca de Nosotros |</a></li>
            <li class="uk-active"><a href="#">Términos y Condiciones</a></li>
        </ul>

        @include('front.partials.bienvenida')

    </div>
</div>

