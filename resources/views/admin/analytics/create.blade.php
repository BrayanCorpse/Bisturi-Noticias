@extends('admin.template.main')

@section('title', 'Sube tus reportes de Google Analytics aquí.')

@section('content')

<div class="row">
    <div class="form-group article-group col-md-12">
        <form action="{{ route('analytics.store')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf

            <div class="mt-5">
                <input class="form-control" type="file" name="name" id="name" accept=".pdf,.doc,.docx,text/csv,application/csv*"  required>
        
                <h6 class="text-danger text-danger"> {{ $errors->first('name') }}</h6>
            </div>

            <div class="mt-3">
                <input type="input" class="form-control" placeholder="título del archivo" name="title" id='title' value="{{ old('title') }}" />
                <h6 class="text-danger"> {{ $errors->first('title') }}</h6>
            </div>

            <div class="mt-3">
                <input type="date" class="form-control" name="date" id='date' value="{{ old('date') }}" />
                <h6 class="text-danger"> {{ $errors->first('title') }}</h6>
            </div>

            <div class=" text-center mt-5 mb-5">
                <img src="{{asset('img/pdf.png')}}" alt="pdf" width="150" height="150">
                <img src="{{asset('img/csv.png')}}" alt="pdf" width="150" height="150">
            </div>

            <div class="form-group mt-5">
                <input class="btn btn-dark buttomSend btn-block" type="submit" value="Guardar archivo">
            </div>

        </form>
    </div>
</div>

@endsection