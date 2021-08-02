@extends('admin.template.main')

@section('title', 'Listado de Subcategorias')

@section('content')

<div class="buttom mt-3">
    <a href="{{ route('subcategories.create') }}" class="btn btn-info mb-3">Registrar nueva Subcategoria</a>
</div>

<div class="table-responsive">

    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Categoría</th>
            <th scope="col">Acción</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
                <tr>
                    <th scope="row">{{ $subcategory->id }}</th>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td>
                        <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-info btn-sm">
                            Editar
                        </a>
                        <a href="{{ route('subcategories.destroy', $subcategory->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Seguro que deseas eliminar la subcategoría: {{ $subcategory->name }} ?')">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
  <div class="pagination">

   {!! $subcategories->render() !!} {{-- para que funciones la paginación --}}
  </div>
@endsection
