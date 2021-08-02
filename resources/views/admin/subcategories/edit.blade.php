@extends('admin.template.main')

@section('title', 'Editar Subcategoria ' . $subcategory->name)

@section('content')


    {!! Form::open(['route' => ['subcategories.update', $subcategory], 'method' => 'PUT']) !!}
    @csrf
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', $subcategory->name, ['class' => 'form-control', 'placeholder' => 'Nombre categoria', 'required']) !!}

        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="{{ $subcategory->category->id}}" selected>
                    {{$subcategory->category->name }}
                </option>
                @foreach ($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        </div>


    {!! Form::close() !!}



@endsection
