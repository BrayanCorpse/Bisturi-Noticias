@extends('admin.template.main')

@section('header')

<meta name="csrf-token" content="{{ csrf_token() }}">
    
@endsection

@section('title', 'Agregar tag')

@section('content')

        <div class="form-group">
            <label for="name"></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del tag">
           <h6 class=" text-danger"> {{ $errors->first('name') }}</h6>
        </div>

        <div class="form-group">
             <button class="btn btn-primary" onclick='proccess();'>Guardar</button>
        </div>

        @section('js')
    
        <script>
            function proccess(){
                let data={
                    'name': document.getElementById('name').value
                }
                fetch("{{ route('tags.store') }}", {
                    headers:{
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    method:'POST',
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(function(result){
                    // alert(result.message);
                    location.href = "{{ route('tags.index') }}";
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            
        </script>
            
        @endsection
    

@endsection
