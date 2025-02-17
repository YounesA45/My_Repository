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
            <a class="btn btn-primary" href="{{ route('PosteComptable.index') }}">Tous les Postes Comptables</a>
        </div>
    </div>
    <h1 class="text-center">Modifier un Poste Comptable</h1>
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
    <form method="POST" class="border p-3" action="{{ route('PosteComptable.update', $postecomptable->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="code_poste_comptable">code_poste_comptable :</label>
                <input type="number" class="form-control" id="code_poste_comptable" name="code_poste_comptable" value="{{$postecomptable->code_poste_comptable}}">
            </div>

            <div class="form-group col-md-6">
                <label for="intitule_poste_comptable">intitule_poste_comptable :</label>
                <input type="text" class="form-control" id="intitule_poste_comptable" name="intitule_poste_comptable" value="{{$postecomptable->intitule_poste_comptable}}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="poste_comptable_id">{{__('Poste Comptable assignataire')}} :</label>

                    <select class="form-control" id="drt_id" name="drt_id" required>
                        <option value="">Sélectionnez un DRT</option>
                        @foreach($drts as $drt)
                            <option value="{{ $drt->id }}" {{ $postecomptable->drt_id == $drt->id ? 'selected' : '' }}>
                                {{ $drt->intitule_drt }}
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
