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
        /* filter: blur(1px); */
    }

    .card2 {
        margin: auto;
        width: 18rem;
        height: 18rem;
        background-image: url({{ asset('/storage/img/demande.jpg')}});
        background-size:cover;
        background-position: center;

        background-repeat: no-repeat;
        /* filter: blur(1px); */
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            


            <h5 class="text-center">Bonjour {{ Auth::user()->name }}</h5>


            <div class="card card1">
                <div class="card-body">
                    <a href="{{ route('accreditation.index')}}"><h2 class="card-text text-c">Consultations</h2>
                    </a>
                </div>
            </div>
            <div class="card card2">
                <div class="card-body">
                <a href="{{ route('accreditation.create')}}"><h2 class="card-text text-c">Nouveau</h2>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection