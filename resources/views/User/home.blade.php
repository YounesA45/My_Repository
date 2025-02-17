@extends('layouts.app')

@section('content')
<style>
  
    .card1 {
        margin-left: auto;
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
        color :#FFD700;
      
    }
   
    .txtCard:hover{
      color: white;
      text-decoration: solid;
      font-weight: bold;
 
    }
    .text-c:hover{
      
        background: rgba(0,0,0,0.9);
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
<div class="container">
<h1 class="text-center">{{__('Welcome to the Accountants Accreditation Platform')}}</h1>
<!-- <h1 class="text-center">Bonjour Mr {{ Auth::user()->name }}</h1> -->
    <div class="row justify-content-center">

        <div class="row mt-5 justify-content-center align-items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            


                   

            <div class="card card1">
                <div class="card-body">
                    <a class="txtCard" href="{{ route('accreditation.index')}}"><h2 class="card-text text-c">{{__('Consultation')}}</h2>
                    </a>
                </div>
            </div>
            <div class="card card2">
                <div class="card-body">
                <a class="txtCard" href="{{ route('accreditation.create')}}"><h2 class="card-text text-c">{{__('Add')}}</h2>
                <!-- <h6>SelectType</h6> -->
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection