@extends('admin.template.main')

@section('header')

<meta name="csrf-token" content="{{ csrf_token() }}">
    
@endsection

@section('title', 'Agregar categoría')

@section('content')

    
    <form action="{{ route('categories.store')}} " method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="name">Nombre de la Categoía</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la categoría">
            <h6 class="text-danger"> {{ $errors->first('name') }}</h6>
        </div>

        <div class="form-group">
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
    </form>




@endsection
