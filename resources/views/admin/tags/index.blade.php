@extends('admin.template.main')

@section('title', 'Listado de tags')

@section('content')

<div class="mt-3 mb-3">
<a href="{{ route('tags.create') }}" class="ml-4 btn btn-info mb-3">Crear nuevo tag</a>


{{-- BUSCADOR DE TAGS --}}
    <form action="{{route('tags.index')}}" class="navbar-form float-right" method="POST">
        @method('GET')
        @csrf
        <div class="form-group d-flex mr-4">
            <input type="text" name="name" id="name" class="form-control mr-sm-2" placeholder="Buscar tag">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
    </form>
    
{{-- FIN BUSCADOR DE TAGS --}}

</div>

<div class="table-responsive">

<table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tag as $tags)
            <tr>
                <th scope="row">{{ $tags->id }}</th>
                <td>{{ $tags->name }}</td>
                <td>
                    <a href="{{ route('tags.edit', $tags->id) }}" class="btn btn-info btn-info btn-sm">
                        Editar
                    </a>
                    <a href="{{ route('tags.destroy', $tags->id) }}" class="btn btn-danger btn-info btn-sm" onclick="return confirm('Seguro que deseas eliminar el tag: {{ $tags->name }} ?')">
                        Eliminar
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>

</div>

  <div class="pagination">

   {!! $tag->render() !!} {{-- para que funciones la paginación --}}
  </div>
@endsection
