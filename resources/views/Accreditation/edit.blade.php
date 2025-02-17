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
            <a class="btn btn-primary" href="{{ route('accreditations.index') }}">Tous les accreditations</a>
        </div>
    </div>
    <h1 class="text-center">Demande D'accréditation</h1>
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
    <form method="POST" class="border p-3" action="{{ route('accreditation.update', $accreditation->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="NumeroDenvoi">Numéro de l'envoi :</label>
                <input type="number" class="form-control" id="NumeroDenvoi" name="NumeroDenvoi" value="{{$accreditation->NumeroDenvoi}}">
            </div>

            <div class="form-group col-md-6">
                <label for="DateDenvoi">Date de l'envoi :</label>
                <input type="date" class="form-control" id="DateDenvoi" name="DateDenvoi" value="{{$accreditation->DateDenvoi}}">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="Sender">Expéditeur :</label>
                <input type="text" class="form-control" id="Sender" name="Sender" value="{{$accreditation->Sender}}">
            </div>
        </div>

        <label>Informations sur le bénéficiaire :</label>
        <div class="border p-3">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="FamilyName">Nom :</label>
                    <input type="text" class="form-control" id="FamilyName" name="FamilyName" value="{{$accreditation->FamilyName}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="Name">Prénom :</label>
                    <input type="text" class="form-control" id="Name" name="Name" value="{{$accreditation->Name}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Poste">Poste :</label>
                    <input type="text" class="form-control" id="Poste" name="Poste" placeholder="EX: Sous directeur du commerce" value="{{$accreditation->Poste}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="Wilaya">Wilaya :</label>
                    <input type="text" class="form-control" id="Wilaya" name="Wilaya" value="{{$accreditation->Wilaya}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="NumeroDecision">Numéro de la décision de nomination :</label>
                    <input type="number" class="form-control" id="NumeroDecision" name="NumeroDecision" value="{{$accreditation->NumeroDecision}}">
                </div>

                <div class="form-group col-md-6">
                    <label for="DateDecision">Date de la décision de nomination :</label>
                    <input type="date" class="form-control" id="DateDecision" name="DateDecision" value="{{$accreditation->DateDecision}}">
                </div>

            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <p id="selectedFileNameDemande">Pièce joindre copie de la demande :</p>
                    @isset($accreditation->fileDemande)
                    <a href="{{ asset('uploads/FileDemande/' . $accreditation->fileDemande) }}" target="_blank"><i class="fa-regular fa-file fa-xl"></i></a>
                    @endisset
                </div>
                <div class="form-group col-md-6">

                    <p id="selectedFileNameDecision">Pièce jointe copie de la décision de nomination :</p>
                    @isset($accreditation->fileDecision)
                    <a href="{{ asset('uploads/FileDecision/' . $accreditation->fileDecision) }}" target="_blank"><i class="fa-regular fa-file fa-xl"></i></a>
                    @endisset

                </div>
            </div>
        

        </div>

        <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>







    </form>

</div>
@endauth
<!-- Optional JavaScript -->


<script>
    document.getElementById('fileDemande').addEventListener('change', function() {
        var fileName = this.value.split('\\').pop(); // Extract file name
        document.getElementById('selectedFileNameDemande').innerText = 'Fichier sélectionné: ' + fileName;
    });
    document.getElementById('fileDecision').addEventListener('change', function() {
        var fileName = this.value.split('\\').pop(); // Extract file name
        document.getElementById('selectedFileNameDecision').innerText = 'Fichier sélectionné: ' + fileName;
    });
    document.getElementById('fileAccreditation').addEventListener('change', function() {
        var fileName = this.value.split('\\').pop(); // Extract file name
        document.getElementById('selectedfileAccreditation').innerText = 'Fichier sélectionné: ' + fileName;
    });
</script>
@endsection