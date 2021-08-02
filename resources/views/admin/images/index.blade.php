@extends('admin.template.main')

@section('title', 'Lista de imagenes')

@section('images')
    <div class="row pt-3 pb-2 justify-content-center">
        {{-- <div class="col-md-12 borde"> --}}
        {{-- <div class="image-container d-flex"> --}}

            @foreach ($images as $image)
            <div class="col-md-3 ">


                <div class="card card-image">
                    <img class="card-img-top size-images" src="{{ asset('/images' . '/' . $image->userImage . '/' . $image->name) }}" alt="{{ $image->article->title }}">
                    <div class="card-body p-3 text-center">
                      <p class="card-text p-3">{{ $image->article->title }}</p>
                      <div class=" border-top text-muted px-3 "> <span class="float-left byuser">by {{ $image->userImage }}</span></div>
                    </div>
                </div>
            </div>
            @endforeach
        {{-- </div> --}}

        {{-- </div> --}}
    </div>
    <div class="pagination">

        {!! $images->render() !!}{{-- para que funciones la paginación --}}
    </div>

@endsection
