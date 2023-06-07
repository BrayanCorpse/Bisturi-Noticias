@extends('admin.template.main')

@section('title', 'Editar usuario ' . $user->name)

@section('content')

    <form action="{{ route('users.update', ['user' => $user ]) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" 
                    placeholder="Nombre Completo"
                    value="{{  $user->name }}"
                    required>
        </div>
        <div class="form-group">
            <label for="email">Correo electronico</label>
            <input type="email" name="email" id="email" class="form-control" 
                    placeholder="example@gmail.com" 
                    value="{{ $user->email }}"
                    required>
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select name="type" id="type" class="form-control" aria-placeholder="Seleccione.." required>
                <option value="{{ $user->type }}">{{ $user->type }}</option>
                @foreach ($types as $type)
                    @unless($type == $user->type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endunless
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>

    </form>

@endsection
