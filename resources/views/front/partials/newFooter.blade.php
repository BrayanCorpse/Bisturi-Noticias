<footer class="uk-background-muted uk-padding">
  <div class="uk-container">
      <div class="uk-grid-large uk-child-width-auto uk-child-width-1-5@l uk-child-width-1-3@s" uk-grid>
          <div>
              <h3 class="uk-text-bold side-title uk-margin-remove-bottom" style="color: #74899c">BN Noticias</h3>
                <p class="uk-text-small uk-text-left uk-margin-remove-top new-desc" style="letter-spacing: 1px;">
                    Somos un medio de comunicación con las noticias más relevantes de México y del mundo.
                </p>
              <div class="uk-flex">
                @include('front.components.socials', ['location' =>'footer'])
              </div>
          </div>
          <div>
              <h4 class="side-title">Última Hora</h4>
              <ul class="uk-list">
                  <li><a class="blue-links" href="#">Startup</a></li>
                  <li><a class="blue-links" href="#">Employee</a></li>
                  <li><a class="blue-links" href="#">Success</a></li>
                  <li><a class="blue-links" href="#">Videos</a></li>
                  <li><a class="blue-links" href="#">Markets</a></li>
              </ul>
          </div>
          <div>
              <h4 class="side-title">Deportes</h4>
              <ul class="uk-list">
                  <li><a class="blue-links" href="#">Innovate</a></li>
                  <li><a class="blue-links" href="#">Gadget</a></li>
                  <li><a class="blue-links" href="#">Innovative Cities</a></li>
                  <li><a class="blue-links" href="#">Upstarts</a></li>
                  <li><a class="blue-links" href="#">Future Tech</a></li>
              </ul>
          </div>
          <div>
              <h4 class="side-title">Salud</h4>
              <ul class="uk-list">
                  <li><a class="blue-links" href="#">Destinations</a></li>
                  <li><a class="blue-links" href="#">Food & Drink</a></li>
                  <li><a class="blue-links" href="#">Stay</a></li>
                  <li><a class="blue-links" href="#">News</a></li>
                  <li><a class="blue-links" href="#">Videos</a></li>
              </ul>
          </div>
          <div>
              <h4 class="side-title">Espectaculos</h4>
              <ul class="uk-list">
                  <li><a class="blue-links" href="#">Football</a></li>
                  <li><a class="blue-links" href="#">Tennis</a></li>
                  <li><a class="blue-links" href="#">Golf</a></li>
                  <li><a class="blue-links" href="#">Motorsports</a></li>
                  <li><a class="blue-links" href="#">Esports</a></li>
              </ul>
          </div>
          <!-- Add other sections as needed following the same structure -->
      </div>
      <div class="uk-text-left uk-margin-small-top">
        © 2024 
        {{-- <a class="blue-links" href="https://www.bydsolutions.com/" 
                    target="_blank" 
                    rel="noopener noreferrer">
                    ByD Solutions
        </a>  --}}
        💻
      </div>
  </div>
</footer>
