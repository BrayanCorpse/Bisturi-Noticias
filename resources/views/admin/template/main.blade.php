<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    {{-- CSS BOOTSTRAP --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    {{-- END CSS BOOTSTRAP --}}

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <link rel="stylesheet" href="{{ asset('icons/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
    

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600&family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    {{-- Sidebar --}}
    
    <link rel="stylesheet" href={{asset('css/sidebar.css')}}>

    @yield('header')
 
    <title>@yield('title', 'Información General') | Panel admin</title>
</head>
<body>

<div class="wrapper">
  {{-- @include('admin.template.partials.nav') --}}
  @include('admin.template.partials.sidebar')
      {{-- BODY --}}
    <div id="contenido">
  
        @yield('top-nav')

        @section('det')
          <div class="card-head">
              <h3> @yield('title', 'Información General') <b style="color: #ABB2B9">@yield('count')</b> </h3>
          </div>
          @include('flash::message')
          @show
        @yield('content')

    </div>

</div>

<footer id="footer">
    <div class="box copyright">
        <div class="container">
            Copyright. All Rights Reserved.
            <a href="https://bydsolutions.com/" 
            style="text-decoration: none !important; 
            color: #D1F2EB;">B&D Solutions</a>
        </div>
    </div>
</footer>


<!-- Import jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>

    {{-- BOOTSTRAP --}}
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <script src="{{ asset('js/prueba.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('js/summernote-es-ES.js') }}"></script>
    <script>
        $('#content').summernote({
          lang: 'es-ES', // default: 'en-US'
          placeholder: 'Comienza a Escribir ',
          tabsize: 2,
          height: 700
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            // inicializamos el plugin
            $('#tags').select2({
                // Activamos la opcion "Tags" del plugin
                tags: true,
                tokenSeparators: [','],
                ajax: {
                    dataType: 'json',
                    url: '{{ route("tags.search") }}',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term
                        }
                    },
                    processResults: function (data, page) {
                      return {
                        results: data
                      };
                    },
                }
            });
        });
    </script>




    @yield('js')    
    @stack('javascript')


</body>
</html>
