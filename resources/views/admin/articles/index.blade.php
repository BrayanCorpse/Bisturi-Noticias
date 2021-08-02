@extends('admin.template.main')

@section('title', 'Borradores')
@section('count',$count)

@section('content')

<div class="mt-3">

    <a href="{{ route('articles.create') }}" class="btn btn-info mb-3">Nuevo Articulo</a>
    {{-- BUSCADOR DE TAGS --}}
    <form action="{{route('articles.index')}}" class="navbar-form float-right" method="POST">
        @method('GET')
        @csrf
        <div class="form-group d-flex">
            <input type="text" name="title" class="form-control mr-lg-3" placeholder="Buscar articulo">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
    </form>
    
    {{-- FIN BUSCADOR DE TAGS --}}

</div>

<div class="table-responsive">
    <table class="table table-hover">
        <tbody>
             
            @foreach ( $articles as $article)
                {{-- @if ($article->status == 'borrador') --}}
                    <tr>
                        <td>
                            @foreach ($article->images as $key =>  $image)
                                @if ($key == 0)
                                    <img src="{{ asset('storage/'.$user.'/'.$image->name)}}" class="rounded img-responsive" width="125" height="100" alt="{{ $article->title }}" >
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <p class="font-weight-normal m-0">{{ $article->title }}</p>
                            <p class="font-weight-light m-0">
                                <i class="fa fa-bookmark" aria-hidden="true"></i> {{ $article->category->name }}
                            </p>
                            <p class="m-0">
                                @foreach ($article->tags as $tag)
                                    #<small>{{$tag->name}}</small>
                                @endforeach
                            </p>
                            <small>
                                {{ $article->updated_at->diffForHumans()}}
                                <strong>|</strong> 
                                {{ $article->user->name }} 
                                <strong>|</strong> 
                            </small>
                            <span class="badge badge-light">{{$article->status}}</span>
                        </td>
                        <td>
                            <a href="{{ route('articles.changeStatus', $article->id) }}" class="btn btn-success btn-sm mt-4">
                                Publicar
                            </a>
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
