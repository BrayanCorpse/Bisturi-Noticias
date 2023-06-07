@extends('admin.template.main')

@section('header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('title', 'Edición del articulo - ' . $article->title )

@section('content')

<form action="{{route('articles.update',$article)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <input type="hidden" name="status" value="borrador" readonly/>

    <div class="form__group field form-group article-group">
        <input type="input" class="form__field" placeholder="Agrega un título atractivo" name="title" id='title' value="{{ $article->title }}" />
        <label for="title" class="form__label">Agrega un título atractivo</label>
        <h6 class="text-danger errorTitle"> {{ $errors->first('title') }}</h6>
    </div>

    <div class="row">
        <div class="form-group article-group col-md-9">

            <label for="summary">Agrega el sumario</label>
            <input type="input" class="form-control" placeholder="Escribe el sumario en esta parte" name="summary" id='summary' value="{{ $article->summary }}" />
            <h6 class="text-danger"> {{ $errors->first('summary') }}</h6>

            <br>

            <label for="excerpt">Extracto de la publicación</label>
            <textarea class="form-control" name="excerpt" id='excerpt' rows="5">
                {{ $article->excerpt }}
            </textarea>
            <h6 class="text-danger"> {{ $errors->first('excerpt') }}</h6>
      
            <br>
       

            <textarea id="content" name="content" required>{{ $article->content }}</textarea>
            <h6 class="text-danger"> {{ $errors->first('content') }}</h6>
        </div>
        <div class="form-group article-group col-md-3">

            <div class="dropdown">
                <a class="btn btn-info rounded-circle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                </a>
                <sub>Categorías</sub>
                <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
                    <h4 class="text-center mt-3">Categorías</h4>
                    <div class="col">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="category_id" 
                          value="{{ $article->category->id }}" onchange="selectSubcategory()" checked>
                          <label class="form-check-label mb-2" for="category_id">
                            {{ $article->category->name }}
                          </label>
                        </div>  
                        @foreach ($distinctcategory as $discat)
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="category_id" 
                                    value="{{ $discat->id }}" onchange="selectSubcategory()">
                            <label class="form-check-label mb-2" for="category_id">
                              {{ $discat->name }}
                            </label>
                          </div>
                        @endforeach 
                    </div>    
                </div>
                <h6 class="text-danger"> {{ $errors->first('category_id') }}</h6>
            </div>

            @include('admin.template.partials.subcategoriesEdit')

            <div class="card card-body mt-5">
                <h4 class="text-center">
                    <i class="fa fa-tag" aria-hidden="true"></i> Etiquetas
                </h4>
                <div class="form-group mt-2">
                    <small>Selecciona tus Etiquetas</small>
                    <select name="tags[]" class="form-control" multiple="multiple" id="tags" required>
                        @foreach ($article->tags as $artag)
                            <option value="{{ $artag->id }}" selected>{{ $artag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <a class="rounded-circle mt-2" type="button" onclick='newTag();'>
                    <i class="fa fa-plus fa-lg" aria-hidden="true"></i> <small>Crear nueva Etiqueta</small>
                </a>
    
                <output id="newtag" class=" mt-2"></output>

            </div>


            <div class="button-wrapper mt-2">

                <span class="label">
                    Sube tus imagenes
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                </span>
        
                <input type="file" name="image[]" id="image"  multiple="multiple" accept="image/*"
                        placeholder="Upload File" required>
        
                <output id="list"></output>
        
                <h6 class="text-danger text-danger"> {{ $errors->first('image') }}</h6>
        
            </div>

            @foreach ($article->images as $key =>  $image)
            <div class="mt-2 my-container">
                    @if ($key >= 0)
                    <div class="post-image">
                        <img src="{{ asset('storage/'.$article->user->name.'/'.$image->name)}}" class="rounded mx-1 my-1" width="100" height="70" alt="{{ $article->title }}" > 
                    </div>
                    <div class="delete">
                        <a href="{{ route('imagesDelete',['id' => $image->id]) }}" id="delete" data-id="{{ $image->id }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a> 
                    </div>                      
                    @endif
            </div>
            @endforeach

            <div class="form-group">
                <br>
                <label for="author">Creditos</label>
                <input type="input" class="form-control" placeholder="Creditos de la foto(s)" 
                        name="author" id='author' value="{{ $article->author }}" />
                <h6 class="text-danger"> {{ $errors->first('author') }}</h6>
            </div>

            <div class="form-group">
                <br>
                <label for="tipo">Tipo de Artículo</label>
                <select class="form-control" id="tipo" name="tipo_id" required>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" selected>{{ $tipo->name }}</option>
                    @endforeach
                    @foreach ($distinctipos as $distipo)
                    <option value="{{$distipo->id}}">{{ $distipo->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-5">
                <input class="btn btn-primary buttomSend btn-block" type="submit" value="Guardar articulo">
            </div>
            
        </div>
    </div>


</form>



@endsection

@push('javascript')

<script>
    
    function newTag(){
            document.getElementById('newtag').innerHTML = 
            `<div class="input-group">
                <input type="text" class="form-control" name="tag" id="tag" placeholder="Etiqueta">
                <div class="input-group-append">
                    <button type="button" class="btn btn-dark" onclick='proccess();'>
                        <i class="fa fa-check-square-o fa-lg" aria-hidden="true"></i>
                    </button>
                </button>
                </div>
            </div>`
        }

</script>

<script>

function proccess(){
                let data={
                    'name': document.getElementById('tag').value
                }
                fetch("{{ route('tags.store') }}", {
                    headers:{
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    method:'POST',
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(function(result){
                    alert(result.message);
                    // location.href = "{{ route('tags.index') }}";
                    // console.log(result.message);
                    document.getElementById('newtag').innerHTML = ""
                })
                .catch(function (error) {
                    console.log(error);
                });
            }

</script>

<script>
    function handleFileSelect(evt) {
      var files = evt.target.files; // FileList object
  
      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; f = files[i]; i++) {
  
          // Only process image files.
          if (!f.type.match('image.*')) {
          continue;
          }
  
          var reader = new FileReader();
  
          // Closure to capture the file information.
          reader.onload = (function(theFile) {
          return function(e) {
              // Render thumbnail.
              var span = document.createElement('span');
              span.innerHTML = ['<img class="thumb my-1 mx-1" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>'].join('');
              document.getElementById('list').insertBefore(span, null);
          };
          })(f);
  
          // Read in the image file as a data URL.
          reader.readAsDataURL(f);
      }
      }
  
      document.getElementById('image').addEventListener('change', handleFileSelect, false);
</script>
    
@endpush
