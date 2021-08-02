@extends('admin.template.main')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">INICIO</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="jumbotron">
                        <h1 class="display-4">INICIO, INICIO!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <p class="lead">
                          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        </p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
