@extends('admin.template.main')

@section('title', 'Listado de categorias')

@section('content')

{{-- <div class="buttom mt-3">
    <a href="{{ route('categories.create') }}" class="btn btn-info mb-3">Registrar nueva categoria</a>
</div> --}}

<div class="table-responsive">

    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad de articulos</th>
            {{-- <th scope="col">Acción</th> --}}
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->numArticles }}</td>
                    {{-- <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">
                            Editar
                        </a>
                        <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Seguro que deseas eliminar la categoría: {{ $category->name }} ?')">
                            Eliminar
                        </a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
  <div class="pagination">

   {!! $categories->render() !!} {{-- para que funciones la paginación --}}
  </div>
@endsection
