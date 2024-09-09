<style>                
.new-nav {
  position: fixed;
  top: 0%;
  z-index: 99;
  width: -webkit-fill-available;
  background: #f8f9f9;
  font-family: 'Codec Pro', sans-serif;                                         
}
.new-nav .wrapper {
  position: relative;
  max-width: 1300px;
  padding: 0px 30px;
  height: 70px;
  line-height: 70px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}
.wrapper .new-logo a {
  color: #74899c;
  font-size: 30px;
  font-weight: 600;
  text-decoration: none;
}
.wrapper .nav-links {
  display: inline-flex;
}
.nav-links li {
  list-style: none;
}
.nav-links li a {
  color: #74899c;
  text-decoration: none;
  font-size: 18px;
  font-weight: 500;
  padding: 9px 15px;
  border-radius: 5px;
  transition: all 0.3s ease;
}
.nav-links li a:hover {
  background: #f2f2f2;
  color: #4fa795;
}
.nav-links .mobile-item {
  display: none;
}
.nav-links .drop-menu {
  position: absolute;
  background: #f5f6f3;
  width: 200px;
  line-height: 45px;
  top: 85px;
  opacity: 0;
  visibility: hidden;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}
.nav-links li:hover .drop-menu,
.nav-links li:hover .mega-box {
  transition: all 0.3s ease;
  top: 70px;
  opacity: 1;
  visibility: visible;
}
.drop-menu li a {
  width: -webkit-fill-available;
  display: block;
  padding: 0 0 0 15px;
  font-weight: 400;
  border-radius: 0px;
}
.mega-box {
  position: absolute;
  left: 0;
  width: 100%;
  padding: 0 30px;
  top: 85px;
  opacity: 0;
  visibility: hidden;
}
.mega-box .content {
  background: #f5f6f3;
  padding: 25px 20px;
  display: flex;
  width: 100%;
  justify-content: space-between;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}
.mega-box .content .row {
  width: calc(25% - 30px);
  line-height: 45px;
}
.content .row img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.content .row header {
  color: #222222;
  font-size: 20px;
  font-weight: 500;
}
.content .row .mega-links {
  margin-left: -40px;
  border-left: 1px solid rgba(255, 255, 255, 0.09);
}
.row .mega-links li {
  padding: 0 20px;
}
.row .mega-links li a {
  padding: 0px;
  padding: 0 20px;
  color: #3a3b3c;
  font-size: 17px;
  display: block;
}
.row .mega-links li a:hover {
  color: #f2f2f2;
}
.wrapper .btn {
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  display: none;
}
.wrapper .btn.close-btn {
  position: absolute;
  right: 30px;
  top: 10px;
}

@media screen and (max-width: 970px) {
  .wrapper .btn {
    display: block;
  }
  .wrapper .nav-links {
    position: fixed;
    height: 100vh;
    width: 100%;
    max-width: 350px;
    top: 0;
    left: -100%;
    background: #f5f6f3;
    display: block;
    padding: 50px 10px;
    line-height: 50px;
    overflow-y: auto;
    box-shadow: 0px 15px 15px rgba(0, 0, 0, 0.18);
    transition: all 0.3s ease;
  }
  /* custom scroll bar */
  ::-webkit-scrollbar {
    width: 10px;
  }
  ::-webkit-scrollbar-track {
    background: #f5f6f3;
  }
  ::-webkit-scrollbar-thumb {
    background: #f5f6f3;
  }
  #menu-btn:checked ~ .nav-links {
    left: 0%;
  }
  #menu-btn:checked ~ .btn.menu-btn {
    display: none;
  }
  #close-btn:checked ~ .btn.menu-btn {
    display: block;
  }
  .nav-links li {
    margin: 15px 10px;
  }
  .nav-links li a {
    padding: 0 20px;
    display: block;
    font-size: 20px;
  }
  .nav-links .drop-menu {
    position: static;
    opacity: 1;
    top: 65px;
    visibility: visible;
    padding-left: 20px;
    width: 100%;
    max-height: 0px;
    overflow: hidden;
    box-shadow: none;
    transition: all 0.3s ease;
  }
  #showDrop:checked ~ .drop-menu,
  #showMega:checked ~ .mega-box {
    max-height: 100%;
  }
  .nav-links .desktop-item {
    display: none;
  }
  .nav-links .mobile-item {
    display: block;
    color: #3a3b3c;
    font-size: 20px;
    font-weight: 500;
    padding-left: 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: all 0.3s ease;
  }
  .nav-links .mobile-item:hover {
    background: #f2f2f2;
  }
  .drop-menu li {
    margin: 0;
  }
  .drop-menu li a {
    border-radius: 5px;
    font-size: 18px;
  }
  .mega-box {
    position: static;
    top: 65px;
    opacity: 1;
    visibility: visible;
    padding: 0 20px;
    max-height: 0px;
    overflow: hidden;
    transition: all 0.3s ease;
  }
  .mega-box .content {
    box-shadow: none;
    flex-direction: column;
    padding: 20px 20px 0 20px;
  }
  .mega-box .content .row {
    width: 100%;
    margin-bottom: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
  }
  .mega-box .content .row:nth-child(1),
  .mega-box .content .row:nth-child(2) {
    border-top: 0px;
  }
  .content .row .mega-links {
    border-left: 0px;
    padding-left: 15px;
  }
  .row .mega-links li {
    margin: 0;
  }
  .content .row header {
    font-size: 19px;
  }
}
.new-nav input {
  display: none;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times blue-links"></i></label>
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
        @include('front.components.socials', ['location' =>'navbar'])
        @include('front.components.moreSocial')
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars blue-links"></i></label>
    </div>
  </nav>
  