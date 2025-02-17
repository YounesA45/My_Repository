@extends('layouts.app')
@section('content')
    <style>
        .hide {
            display: none;
        }
    </style>
    @auth
        <div class="container bg-light">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('DRT.index') }}">Tous les DRTs</a>
                </div>
            </div>
            <h1 class="text-center">Ajouter un DRT</h1>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" class="border p-3" action="{{ route('DRT.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="code_drt">{{ __('code_drt') }} :</label>
                        <input type="number" class="form-control" id="code_drt" name="code_drt" placeholder="1234" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="intitule_drt">Intitulé DRT :</label>
                        <input type="text" class="form-control" id="intitule_drt" name="intitule_drt" required>
                    </div>

                </div>
        


                <br>
                <button type="submit" class="btn btn-primary">Créer Ordonnateur</button>







            </form>

        </div>
    @endauth
    <!-- Optional JavaScript -->



@endsection
