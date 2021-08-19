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
                          <input class="form-check-input" type="radio" name="category_id" value="{{$article->category->id}}" checked
                          onchange="selectSubcategory()">
                          <label class="form-check-label mb-2" for="category_id">
                            {{$article->category->name}}
                          </label>
                        </div>  
                        @foreach ($distinctcategory as $discat)
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="category_id" value="{{$discat->id}}"
                            onchange="selectSubcategory()">
                            <label class="form-check-label mb-2" for="category_id">
                              {{$discat->name}}
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
                        @foreach ($selectedTag as $seltag)
                            <option value="{{ $seltag->id }}" selected>{{ $seltag->name }}</option>
                        @endforeach
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
        
                <input type="file" name="image[]" id="image"  multiple="multiple" accept="image/*" placeholder="Upload File">
        
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
                        <a href="javascript:void(0)" id="delete" data-id="{{ $image->id }}" class="btn btn-danger btn-sm " onclick="deleteImage({{ $image->id }})">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a> 
                    </div>                      
                    @endif
            </div>
            @endforeach

            <div class="form-group">
                <br>
                <label for="tipo">Tipo de Artículo</label>
                <select class="form-control" id="tipo" name="tipo_id" required>
                    @foreach ($tipos->where('id',$article->tipo_id) as $tipo)
                        <option value="{{ $tipo->id }}" selected>{{ $tipo->name }}</option>
                    @endforeach
                    @foreach ($distinctipos as $distipo)
                    <option value="{{$distipo->id}}">{{ $distipo->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <div class="value">Relevancia de la Noticia</div>
                <input type="range" min="0" max="10" step="1" value="{{ $article->relevancia }}" name="relevancia" oninput="rangeValue()">
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
    function deleteImage(id){

        if (window.confirm("Estas seguro de eliminar esta Imagen!")) {
            fetch("{{ url('ajax-posts')}}"+'/'+id , {
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            method:'DELETE',
            })
            .then(response => response.json())
            .then(function(result){
            window.location.reload();
            })
            .catch(function (error) {
            console.log('Error:', data);
            });

        }
        
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

<script>

    var elem = document.querySelector('input[type="range"]');
    function rangeValue() {
        var newValue = elem.value;
        var target = document.querySelector(".value");
        if(newValue > 5){
            target.innerHTML = "Relevancia Alta";
            target.style.color = "#EC7063";
            elem.style.backgroundColor = "#EC7063";
        }
        else{
            target.innerHTML = "Relevancia Baja";
            target.style.color = "#7386D5";
            elem.style.backgroundColor = "#7386D5";
        }
    };

    window.onload = rangeValue;

</script>
    
@endpush
