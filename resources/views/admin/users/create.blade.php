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


    <form action="{{ route('users.store') }}" method="POST">
        @method('POST')
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre Completo">
           <h6 class=" text-danger"> {{ $errors->first('name') }}</h6>
        </div>
        <div class="form-group">
            <label for="email">Correo electronico</label>
            <input type="email" name="email" id="email" class="form-control" 
                    placeholder="example@gmail.com" required>
           <h6 class=" text-danger"> {{ $errors->first('email') }}</h6>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control"                       
                    placeholder="*************" required>
           <h6 class=" text-danger"> {{ $errors->first('password') }}</h6>
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select name="type" id="type" class="form-control" aria-placeholder="Seleccione.." required>
                <option value="member">Miembro</option>
                <option value="admin">Administrador</option>
                <option value="root">Root</option>
            </select>
           <h6 class=" text-danger"> {{ $errors->first('type') }}</h6>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>

    </form>
   
@endsection
