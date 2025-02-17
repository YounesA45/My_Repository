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
                    <a class="btn btn-primary" href="{{ route('Ordonnateur.index') }}">Tous les Ordonnateurs</a>
                </div>
            </div>
            <h1 class="text-center">Modifier l'Ordonnateur</h1>
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
            <form method="POST" class="border p-3" action="{{ route('Ordonnateur.update', $ordonnateur->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="code_ordonnateur">code_ordonnateur :</label>
                        <input type="number" class="form-control" id="code_ordonnateur" name="code_ordonnateur"
                            value="{{ $ordonnateur->code_ordonnateur }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="intitule_ordonnateur">intitule_ordonnateur :</label>
                        <input type="text" class="form-control" id="intitule_ordonnateur" name="intitule_ordonnateur"
                            value="{{ $ordonnateur->intitule_ordonnateur }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="poste_comptable_id">{{__('Poste Comptable assignataire')}} :</label>

                            <select class="form-control" id="poste_comptable_id" name="poste_comptable_id" required>
                                <option value="">Sélectionnez un poste comptable</option>
                                @foreach($postesComptables as $poste)
                                    <option value="{{ $poste->id }}" {{ $ordonnateur->poste_comptable_id == $poste->id ? 'selected' : '' }}>
                                        {{ $poste->intitule_poste_comptable }}
                                    </option>
                                @endforeach
                            </select>





                        </div>
                    </div>

                </div>




                <br>
                <button type="submit" class="btn btn-primary">Enregistrer</button>







            </form>

        </div>
    @endauth
    <!-- Optional JavaScript -->
@endsection
