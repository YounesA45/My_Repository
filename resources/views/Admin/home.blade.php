@extends('layouts.app')

@section('content')
<style>
  
    .card1 {
        margin: auto;
        width: 18rem;
        height: 18rem;
        background-image: url({{ asset('/storage/img/demande.png') }});
    background-size:cover;
    background-position: center;

    background-repeat: no-repeat;
    border-radius: 50px;
    /* filter: contrast(20%);  */
    }

    .card2 {
        margin: auto;
        width: 18rem;
        height: 18rem;
        background-image: url({{ asset('/storage/img/consultation.png')}});
    background-size:cover;
    background-position: center;

    background-repeat: no-repeat;
    border-radius: 50px;
    
    /* filter: blur(1px); */
    }
    .txtCard {
        
        font-weight: bold ; 
        color : white;
      
    }
   
    .txtCard:hover{
      color: coral;
      text-decoration: solid;
      font-weight: bold;
 
    }

    .txtCard {
    

        text-align: center;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .text-c{
        border-radius: 20px;
        padding: 5%;
        background: rgba(0,0,0,0.7);
    }
</style>
<div class="container ">

   

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



        <!-- <h1 class="text-center">Bonjour Mr {{ Auth::user()->name }}</h1> -->
        <h1 class="text-center">{{__('Hello, Mr. the Director of Regulation')}}</h1>

    <div class="row mt-5 justify-content-center align-items-center">
        <div class="card card1 ">

            <div class="card-body ">
                <a class="txtCard" href="{{ route('accreditations.index')}}">
                    <h2 class="card-text text-c">{{__('Consultation')}}</h2>
                </a>
            </div>
        </div>
        <!-- <div class="card card2">
            <div class="card-body">
                <a class="txtCard" href="{{ route('accreditations.create')}}">
                    <h2 class="card-text text-c">Nouveau</h2>
                </a>
            </div>
        </div> -->
    </div>

</div>
@endsection