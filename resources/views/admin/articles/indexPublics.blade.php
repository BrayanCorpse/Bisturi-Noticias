@extends('admin.template.main')

@section('title', 'publicados')
@section('count',$count)
    

@section('content')

<div class="mt-3">
    <a href="{{ route('articles.create') }}" class="btn btn-info mb-3">Nuevo Articulo</a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <tbody>
            
            @foreach ( $articles as $article)
                {{-- @if ($article->status == 'publico')
                --}}
                    
                    <tr>
                        <td>
                            @foreach ($article->images as $key =>  $image)
                                @if ($key == 0)
                                    <img src="{{ asset('storage/'.$article->user->name.'/'.$image->name)}}" class="rounded img-responsive" width="125" height="100" alt="{{ $article->title }}" >
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <p class="font-weight-normal m-0">{{ $article->title }}</p>
                            <p class="font-weight-light m-0">
                                <i class="fa fa-bookmark" aria-hidden="true"></i> {{ $article->category->name }}
                            </p>
                            <small>
                                {{ $article->created_at->diffForHumans()}}
                                <strong>|</strong> 
                                {{ $article->user->name }} 
                                <strong>|</strong> 
                            </small>
                            <span class="badge badge-light">{{$article->status}}</span>
                            <strong>|</strong> 
                            <span class="badge badge-success">{{ $article->tipo->name}}</span>
                            
                            <form action="{{ route('articles.changeSection',$article->id)}}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="form-row align-items-center">
                                    <span class="badge badge-light mt-4">Cambiar Sección:</span>
                                  <div class="col-sm-3 mt-4">
                                    <select class="form-control form-control-sm" 
                                            id="tipo_id" name="tipo_id">
                                        <option value="{{ $article->tipo->id }}" selected hidden>
                                            {{ $article->tipo->name }}
                                        </option>
                                        @foreach ($distinctipos->where('id','!=',$article->tipo->id) as $distipo)
                                            <option value="{{$distipo->id}}">
                                                {{ $distipo->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                  </div>
                                 
                                  <div class="col-auto mt-4">
                                    <button type="submit" class="btn btn-sm btn-dark">
                                        Guardar Cambios
                                    </button>
                                  </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <span class="badge badge-light">Acciones del Artículo</span>
                            <br>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info btn-sm mt-4">
                                Editar
                            </a>
                            <a href="{{ route('articles.SoftDelete', $article->id) }}" class="btn btn-danger btn-sm mt-4" onclick=" return confirm('Seguro que deseas mandar el articulo: {{ $article->title }} a la papelera ?')">
                                Eliminar
                            </a>
                        </td>
                        
                    </tr>
                {{-- @endif --}}
            @endforeach
        </tbody>
    </table>
</div>

  <div class="pagination">

      {!! $articles->render() !!} {{-- para que funciones la paginación  --}}
  </div>
@endsection
