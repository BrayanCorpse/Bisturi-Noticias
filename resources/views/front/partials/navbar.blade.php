@php
     $date = Date::setLocale('es');
     $date = Date::now()->format('l j \\de F \\de  Y ');
@endphp
 <!-- Component -->
<div class="navbar-component">  {{-- uk-sticky="cls-active: uk-navbar-sticky" --}}
    <!-- Class `area` is a container -->
    <div class="navbar area">
        {{-- <div class="animation">
            @include('front.partials.animation')
        </div> --}}
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
            Telón,Espectáculos y Letras
          </a>
          <a href="{{ route('opinion')}}" class="item -link" id="opinion">Opinión</a>
          <a href="{{ route('clicks') }}" class="item -link" id="click">Click del Día</a>

        </nav>

        <!-- Button to toggle the display menu  -->
        <button data-collapse data-target="#navigation" class="toggle">
          <!-- Hamburger icon -->
          <span class="icon"></span>
        </button>

    </div>
     <section class="uk-h6 b-date uk-text-center">
         {{$date}}
         <div class="b-time">
            <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
            <div id="icon-mode"></div>
         </div>
     </section>
     
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
    else if(window.location.pathname == '/clicks'){
        document.getElementById('click').style.cssText = 'color: #459FC4;';
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
@push('time')
<script>
 
    let datetime = new Date();
    let hr = datetime.getHours(); // 0 - 23
    let icon = document.getElementById('icon-mode');

    if(hr <= 12){
        icon.innerHTML = `<img src="{{asset('img/sun.svg')}}" alt="Buenos Días" width="20" height="20">`;
    }
    else if(hr > 12){
        icon.innerHTML = `<img src="{{asset('img/eclipse.svg')}}" alt="Buenas Noches" width="20" height="20">`;
    }

    function showTime(){
    let date = new Date();
    let h = date.getHours(); // 0 - 23
    let m = date.getMinutes(); // 0 - 59
    let s = date.getSeconds(); // 0 - 59
    let session = "AM";
    
    if(h == 0){
        h = 12;
        
    }
    else if(h > 12){
        h = h - 12;
        session = "PM";
       
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
</script>  
@endpush

