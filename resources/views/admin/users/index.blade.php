@extends('admin.template.main')

@section('title', 'Lista de usuarios')

@section('content')

<div class="buttom mt-3 mb-3">
    <a  href="{{ route('users.create') }}" class="btn btn-info">Registrar nuevo usuario</a>
</div>

<div class="table-responsive">
    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acción</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->type =='admin')
                            <span class="badge badge-pill badge-success">{{ $user->type }}</span>
                        @elseif($user->type =='root')  
                            <span class="badge badge-pill badge-dark">{{ $user->type }}</span>
                        @else
                            <span class="badge badge-pill badge-primary">{{ $user->type }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm" onclick="return confirm('Deseas editar al usuario: {{ $user->name }} ?')">
                            Editar
                        </a>
                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Seguro que deseas eliminar al usuario: {{ $user->name }} ?')">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <hr>
  <div class="pagination">
   {!! $users->render() !!} {{-- para que funciones la paginación --}}
  </div>
@endsection
