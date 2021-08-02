@extends('admin.template.main')

@section('title', 'Crear Usuario')

@section('content')


{{-- @if (session('mensaje')) mensaje para indicar que se creó usuario correctamente --}}

    {{-- <div class="alert alert-primary mt-4" role="alert">
    {{ session('mensaje') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button> --}}
        {{-- This is a primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like. --}}
    {{-- </div> --}}

{{-- @endif --}}

    {!! Form::open(['route' => 'users.store']) !!}

        <div class="form-group">

            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo']) !!}
           <h6 class=" text-danger"> {{ $errors->first('name') }}</h6>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo electronico') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
           <h6 class=" text-danger"> {{ $errors->first('email') }}</h6>
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '*************', 'required']) !!}
           <h6 class=" text-danger"> {{ $errors->first('password') }}</h6>
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Tipo') !!}
            {!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione..', 'required']) !!}
           <h6 class=" text-danger"> {{ $errors->first('type') }}</h6>
        </div>
        <div class="form-group">
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        </div>


    {!! Form::close() !!}



@endsection
