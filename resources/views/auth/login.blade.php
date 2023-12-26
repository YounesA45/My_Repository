@extends('layouts.app')

@section('content')
<br>
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"
                style="  display: flex; 
        flex-direction: column;
        justify-content: center;
        align-items: center;">


                <div class="card"
                    style="
            
           /* display: flex; 
   flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;*/
  z-index: 999;
   width: 100%; 
  border: solid 1px rgba(255, 255, 255, .5);
  border-radius: 16px;
  box-shadow: 40px 40px 100px rgba(0, 0, 0, 0.795),
             -40px -40px 100px rgba(0, 0, 0, .1);
  background-color: rgba(235, 182, 8, 0.144);
  -webkit-backdrop-filter: blur(5px);
  backdrop-filter: blur(5px);
            
            ">
                    <div class="card-header text-center"><b>{{ __('Identification') }}</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Adresse mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus >

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row mb-0 ">
                                <div class="col-md-8 offset-md-4 ">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Connexion') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
