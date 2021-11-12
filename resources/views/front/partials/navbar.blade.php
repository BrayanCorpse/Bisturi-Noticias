@php
     $date = Date::setLocale('es');
     $date = Date::now()->format('l j \\de F \\de  Y ');
@endphp
 <!-- Component -->
<div class="navbar-component">  {{-- uk-sticky="cls-active: uk-navbar-sticky" --}}
    <!-- Class `area` is a container -->
    <div class="navbar area">
        <div class="animation">
            @include('front.partials.animation')
        </div>
        <!-- Logo -->
        <a class="uk-align-center uk-margin-top b-mb-remove brand" href="{{ route('index')}}" >
            <img class="img-fluid " src="{{asset('img/logop.png')}}" alt="Bisturí Noticias" width="750" height="300">
        </a>
        <!-- List of links -->
        <nav role="navigation" id="navigation" class="list uk-align-center uk-margin-remove-top">
          <a href="{{ route('index')}}" class="item -link" id="inicio">Inicio</a>
          <a href="{{ route('informacion General')}}" class="item -link" id="info">
            Información General
          </a>
          <a href="{{ route('salud') }}" class="item -link" id="salud">Salud</a>
          <a href="{{ route('emergencias') }}" class="item -link" id="emergencias">Emergencias</a>
          <a href="{{ route('deportes') }}" class="item -link" id="deportes">Deportes</a>
          <a href="{{ route('telon y Espectaculos')}}" class="item -link" id="telon">
            Telón y Espectáculos
          </a>
          <a href="{{ route('opinion')}}" class="item -link" id="opinion">Opinión</a>

        </nav>

        <!-- Button to toggle the display menu  -->
        <button data-collapse data-target="#navigation" class="toggle">
          <!-- Hamburger icon -->
          <span class="icon"></span>
        </button>

    </div>
     <h6 class="b-date uk-text-center">{{$date}}</h6>

</div>



@push('js')
<script>

    if (window.location.pathname == '/') {
        document.getElementById('inicio').style.cssText = 'color: #459FC4;';
    }
    else if(window.location.pathname == '/informacion-general'){
        document.getElementById('info').style.cssText = 'color: #459FC4;';
    }
    else if(window.location.pathname == '/salud'){
        document.getElementById('salud').style.cssText = 'color: #459FC4;';
    }
    else if(window.location.pathname == '/emergencias'){
        document.getElementById('emergencias').style.cssText = 'color: #459FC4;';
    }
    else if(window.location.pathname == '/deportes'){
        document.getElementById('deportes').style.cssText = 'color: #459FC4;';
    }
    else if(window.location.pathname == '/telon-y-espectaculos'){
        document.getElementById('telon').style.cssText = 'color: #459FC4;';
    }
    else if(window.location.pathname == '/opinion'){
        document.getElementById('opinion').style.cssText = 'color: #459FC4;';
    }

</script>
<script>
    (function() {

    // Definition of caller element
    var getTriggerElement = function(el) {
    var isCollapse = el.getAttribute('data-collapse');
    if (isCollapse !== null) {
        return el;
    } else {
        var isParentCollapse = el.parentNode.getAttribute('data-collapse');
        return (isParentCollapse !== null) ? el.parentNode : undefined;
    }
    };

    // A handler for click on toggle button
    var collapseClickHandler = function(event) {
    var triggerEl = getTriggerElement(event.target);
    // If trigger element does not exist
    if (triggerEl === undefined) {
        return false;
    }

    // If the target element exists
    var targetEl = document.querySelector(triggerEl.getAttribute('data-target'));
    if (targetEl) {
        triggerEl.classList.toggle('-active');
        targetEl.classList.toggle('-on');
    }
    };

    // Delegated event
    document.addEventListener('click', collapseClickHandler, false);

    })(document, window);
</script>
@endpush

