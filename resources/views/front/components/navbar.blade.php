
<nav class="new-nav">
    <div class="wrapper">
      <div class="new-logo">
        <a href="{{ route('index')}}">
            <img src="{{ asset('img/BNRB.png') }}" alt="Bisturí Noticias" width="190" height="50">
        </a>
    </div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn">
          <i class="fas fa-times" style="color: #74899c;"></i>
        </label>
        <li><a href="{{ route('index')}}">Inicio</a></li>
        <li><a href="/emergencias">Última Hora</a></li>
        <li>
          <a href="#" class="desktop-item">Categorías</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Categorías</label>
          <ul class="drop-menu">
            <li><a href="/emergencias">Emergencias</a></li>
            <li><a href="/opinion">Opinión</a></li>
            <li><a href="/salud">Salud</a></li>
            <li><a href="/telon-y-espectaculos">Espectaculos</a></li>
          </ul>
        </li>
        {{-- <li>
          <a href="#" class="desktop-item">+ Noticias</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Mega Menu</label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
                <img src="https://fadzrinmadu.github.io/hosted-assets/responsive-mega-menu-and-dropdown-menu-using-only-html-and-css/img.jpg" alt="">
              </div>
              <div class="row">
                <header>Design Services</header>
                <ul class="mega-links">
                  <li><a href="#">Graphics</a></li>
                  <li><a href="#">Vectors</a></li>
                  <li><a href="#">Business cards</a></li>
                  <li><a href="#">Custom logo</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Email Services</header>
                <ul class="mega-links">
                  <li><a href="#">Personal Email</a></li>
                  <li><a href="#">Business Email</a></li>
                  <li><a href="#">Mobile Email</a></li>
                  <li><a href="#">Web Marketing</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Security services</header>
                <ul class="mega-links">
                  <li><a href="#">Site Seal</a></li>
                  <li><a href="#">VPS Hosting</a></li>
                  <li><a href="#">Privacy Seal</a></li>
                  <li><a href="#">Website design</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li> --}}
        <li><a href="/deportes">Deportes</a></li>
        <div class="uk-flex-inline">
          @include('front.components.socials', ['location' =>'navbar'])
          @include('front.components.moreSocial')
        </div>
      </ul>
      <label for="menu-btn" class="btn menu-btn">
        <i class="fas fa-bars" style="color: #74899c;"></i>
      </label>
    </div>
  </nav>
  