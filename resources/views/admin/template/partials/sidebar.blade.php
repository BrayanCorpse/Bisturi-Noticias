
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3><a href="{{ route('welcome')}}">Bisturi Admin</a></h3>
      </div>
        @if (Auth::check())
          <ul class="list-unstyled components">
            <p>Panel de Administración</p>
            @if (Auth::user()->type ==="admin")
            <li>
                <a href="{{ route('users.index') }}" tabindex="-1">Usuarios</a>
            </li>
            @endif
            <li>
              <a href="{{ route('categories.index') }}" tabindex="-1" >Categorias</a>
            </li>
            <li>
              <a href="{{ route('subcategories.index') }}" tabindex="-1" >Subcategorias</a>
            </li>
            <li>
              <a href="{{ route('tags.index') }}" tabindex="-1" >Tags</a>
            </li>
            <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Articulos 
                <i class="fa fa-sort-desc fa-pull-right" aria-hidden="true"></i>
              </a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                  <a href="{{ route('articles.indexPublics') }}" tabindex="-1">Publicados</a>
                </li>
                <li>
                  <a href="{{ route('articles.index') }}" tabindex="-1">Borradores</a>
                </li>
                <li>
                  <a href="{{ route('articles.indexSoftDeletes') }}">Papelera</a>
                </li>
              </ul>  
            </li>
            <li>
              {{-- <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages 
                <i class="fa fa-sort-desc fa-pull-right" aria-hidden="true"></i>
              </a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
              </ul> --}}
            </li>
          </ul>
      @endif
      
    </nav>

    @section('top-nav')
    
    <nav class="navbar navbar-default">
      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </button>
        </div>
    
        <ul class="nav justify-content-end">
          @guest
            @if (Route::has('register'))
            <li class="nav-item">
                <div class=" dropdown-menu-right text-center">
                  <a type="button" href="{{ route('login') }}">
                    <p class="text-muted">Iniciar sesión</p>
                  </a>
                </div>
            </li>
            @endif
            @else

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <span class="text-info font-weight-bold text-uppercase">{{ Auth::user()->name }} </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                    </form>
                </div>
            </li>
            
              
          @endguest
          </ul>

      </div>
    </nav>
    @endsection

    

    
  
@section('js')
<script>
    $(document).ready(function () {
          $("#sidebarCollapse").on("click", function () {
              $("#sidebar").toggleClass("active");
              $(this).toggleClass("active");
          });
      });
</script>
@endsection
  