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

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    

                    {{ __('You are logged in!') }}

                  
                   <h1>vous n'avez pas encore la permission</h1>
                    <p>&nbsp;</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection