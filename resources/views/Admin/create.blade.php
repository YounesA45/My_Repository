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
            <form method="POST" class="border p-3" action="{{ route('accreditation.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="NumeroDenvoi">Numéro de l'envoi :</label>
                        <input type="number" class="form-control" id="NumeroDenvoi" name="NumeroDenvoi" placeholder="1234">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="DateDenvoi">Date de l'envoi :</label>
                        <input type="date" class="form-control" id="DateDenvoi" name="DateDenvoi">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="Sender">Expéditeur :</label>
                        <input type="text" class="form-control" id="Sender" name="Sender"
                            placeholder="EX: Directeur du commerce de la wilaya de M'sila">
                    </div>
                </div>

                <label>Informations sur le bénéficiaire :</label>
                <div class="border p-3">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="FamilyName">Nom :</label>
                            <input type="text" class="form-control" id="FamilyName" name="FamilyName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Name">Prénom :</label>
                            <input type="text" class="form-control" id="Name" name="Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Poste">Poste :</label>
                            <input type="text" class="form-control" id="Poste" name="Poste"
                                placeholder="EX: Sous directeur du commerce" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Wilaya">Wilaya :</label>
                            <input type="text" class="form-control" id="Wilaya" name="Wilaya" placeholder="Alger" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="NumeroDecision">Numéro de la décision de nomination :</label>
                            <input type="number" class="form-control" id="NumeroDecision" name="NumeroDecision" placeholder="1234" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="DateDecision">Date de la décision de nomination :</label>
                            <input type="date" class="form-control" id="DateDecision" name="DateDecision"  required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <p id="selectedFileNameDemande">Pièce joindre copie de la demande :</p>
                            <input type="file" id="fileDemande" name="fileDemande" style="display: none;" />
                            <label class="pl-3 pr-3 pt-2 pb-2" for="fileDemande"
                                style="cursor: pointer; border: 1px solid #ccc; border-radius: 5px;">
                                <i class="fa-solid fa-file-arrow-up fa-xl"></i>
                            </label>

                        </div>
                        <div class="form-group col-md-6">

                            <p id="selectedFileNameDecision">Pièce jointe copie de la décision de nomination :</p>
                            <input type="file" id="fileDecision" name="fileDecision" style="display: none;" />
                            <label class="pl-3 pr-3 pt-2 pb-2" for="fileDecision"
                                style="cursor: pointer; border: 1px solid #ccc; border-radius: 5px;">
                                <i class="fa-solid fa-file-arrow-up fa-xl"></i>
                            </label>

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
    </script>
@endsection
