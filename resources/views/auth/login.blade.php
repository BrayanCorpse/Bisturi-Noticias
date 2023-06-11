@extends('layouts.app')
{{-- {{ dd("hola") }} --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{ route('welcome') }}">
            <img class="image-content-title" src="{{ asset('img/logorm.png') }}" alt="boogle" width="650" height="80">
        </a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="card-body">
                    <h3>{{ __('Login') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left">
                                {{ __('E-Mail Address') }}
                            </label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordInput" class="col-md-12 col-form-label text-md-left">
                                {{ __('Password') }}
                            </label>

                            <div class="input-group col-md-12 mb-3">

                                <input id="passwordInput" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>  
                                <div class="input-group-append" onclick="togglePasswordVisibility()" 
                                        style="cursor:pointer;">
                                    <span class="input-group-text" id="basic-addon2">
                                    <i class="fa fa-eye-slash" id="lockIcon" aria-hidden="true"></i>
                                    </span>
                                </div>    

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    
                                @endif
                                
                            </div>
                            
                        </div>
                        
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
<br>
    <br>
    <hr>
    <h5 class="text-center mt-lg-4">
        Powered By: 
        <a href="https://bydsolutions.com/">
           ByDSOLUTION.COM
        </a>
    </h5>

</div>
@endsection

@push('js')
    <script src="{{ asset('js/unlock.js') }}"></script>
@endpush


