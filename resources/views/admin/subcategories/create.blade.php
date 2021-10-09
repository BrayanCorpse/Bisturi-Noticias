@extends('admin.template.main')

@section('header')

<meta name="csrf-token" content="{{ csrf_token() }}">
    
@endsection

@section('title', 'Agregar Subcategoría')

@section('content')

    
    <form action="{{ route('subcategories.store')}} " method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="name">Nombre de la Subcategoría</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la Subcategoría">
        </div>

        <div class="form-group">
            <label for="category">Categoría</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id}}" selected>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
    </form>




@endsection
