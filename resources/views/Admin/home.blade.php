@extends('layouts.app')

@section('content')
<style>
    .card1 {
        margin-left: auto;
        width: 18rem;
        height: 18rem;
        background-image: url({{ asset('/storage/img/completer.jpg')}});
        background-size:cover;
        background-position: center;

        background-repeat: no-repeat;
        filter: blur(1px);
    }

    .card2 {
        margin: auto;
        width: 18rem;
        height: 18rem;
        background-image: url({{ asset('/storage/img/demande.jpg')}});
        background-size:cover;
        background-position: center;

        background-repeat: no-repeat;
        filter: blur(1px);
    }

    .text-c {
        text-align: center;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="container">
    <div class="row justify-content-center">

        <div class="row border">

            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                  
                    @canany(['create-role', 'edit-role', 'delete-role'])
                        <a class="btn btn-primary" href="{{ route('roles.index') }}">
                            <i class="bi bi-person-fill-gear"></i> Manage Roles</a>
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                        <a class="btn btn-success" href="{{ route('users.index') }}">
                            <i class="bi bi-people"></i> Manage Users</a>
                    @endcanany
                    @canany(['create-accreditation', 'edit-accreditation', 'delete-accreditation'])
                        <a class="btn btn-warning" href="{{ route('accreditation.index') }}">
                            <i class="bi bi-bag"></i> Manage accreditation</a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div> -->


            
            <h1 class="text-center">Bonjour {{ Auth::user()->name }}</h1>
          
            
            <div class="card card1">
                <div class="card-body">
                    <a href="{{ route('accreditations.index')}}"><h2 class="card-text text-c">Consultations</h2>
                    </a>
                </div>
            </div>
            <div class="card card2">
                <div class="card-body">
                <a href="{{ route('accreditations.create')}}"><h2 class="card-text text-c">Nouveau</h2>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection