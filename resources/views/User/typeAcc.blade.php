@extends('layouts.app')

@section('content')
<style>
    .txtCard {

        font-weight: bold;
        color: #FFD700;

    }

    .txtCard:hover {
        color: white;
        text-decoration: solid;
        font-weight: bold;

    }

    .text-c:hover {

        background: rgba(0, 0, 0, 0.9);
    }

    .txtCard {


        text-align: center;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .text-c {
        border-radius: 20px;
        padding: 5%;
        background: rgba(0, 0, 0, 0.7);
    }
</style>
<div class="container">

    <div class="row justify-content-center  p-4 ">

        <h3 class="text-center">Type D'Accreditation</h3>


            <form method="POST" class="border bg-white mt-3 p-3 w-50" action="{{ route('accreditations.create') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Ministère :</label>
                    <select class="form-control custom-select" id="exampleFormControlSelect1">
                        <option disabled selected>--------</option>
                        @foreach($ministeres as $ministere)
                        <option>{{ $ministere->titre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlselect1">Type d'Accréditation :</label>
                    <select class="form-control custom-select" id="exampleFormControlselect1">
                        <option disabled selected>-------</option>
                        <option>Directeur</option>
                        <option>Agent comptable</option>
                       
                    </select>
                </div>
               
                <div class="row justify-content-center">
                    <button class="btn btn-primary w-25" type="submit">Envoyer</button>
                </div>

            </form>




        
    </div>
</div>
@endsection