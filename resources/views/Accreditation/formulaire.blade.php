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
    <h1 class="text-center">Demande D'accréditation</h1>
    <br>
    <form class="border p-3" action="{{ route('showPost') }}">

        <div class="alert alert-success hide" id="alertSuccess" role="alert">
            This is a success alert—check it out!
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNumeroDenvoi">Numéro de l'envoi :</label>
                <input type="number" class="form-control" id="inputNumeroDenvoi" placeholder="1234">
            </div>

            <div class="form-group col-md-6">
                <label for="inputDateDenvoi">Date de l'envoi :</label>
                <input type="date" class="form-control" id="inputDateDenvoi">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputSender">Expéditeur :</label>
                <input type="text" class="form-control" id="inputSender"
                    placeholder="EX: Directeur du commerce de la wilaya de M'sila">
            </div>
        </div>


        <label>Informations sur le bénéficiaire :</label>
        <div class="border p-3">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFamilyName">Nom :</label>
                    <input type="text" class="form-control" id="inputFamilyName" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">Prénom :</label>
                    <input type="text" class="form-control" id="inputName" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPoste">Poste :</label>
                    <input type="text" class="form-control" id="inputPoste"
                        placeholder="EX: Sous directeur du commerce">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputWilaya">Wilaya :</label>
                    <input type="text" class="form-control" id="inputWilaya" placeholder="Alger">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNumeroDecision">Numéro de la décision de nomination :</label>
                    <input type="number" class="form-control" id="inputNumeroDecision" placeholder="1234">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputDateDecision">Date de la décision de nomination :</label>
                    <input type="date" class="form-control" id="inputDateDecision">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <p id="selectedFileNameDemande">Pièce joindre copie de la demande :</p>
                    <input type="file" id="fileDemande" style="display: none;" />
                    <label class="pl-3 pr-3 pt-2 pb-2" for="fileDemande"
                        style="cursor: pointer; border: 1px solid #ccc; border-radius: 5px;">
                        <i class="fa-solid fa-file-arrow-up fa-xl"></i>
                    </label>

                </div>
                <div class="form-group col-md-6">

                    <p id="selectedFileNameDecision">Pièce jointe copie de la décision de nomination :</p>
                    <input type="file" id="fileDecision" style="display: none;" />
                    <label class="pl-3 pr-3 pt-2 pb-2" for="fileDecision"
                        style="cursor: pointer; border: 1px solid #ccc; border-radius: 5px;">
                        <i class="fa-solid fa-file-arrow-up fa-xl"></i>
                    </label>

                </div>



            </div>

        </div>



        <br>
        <div class="row d-flex justify-content-center">
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Enregistrer
            </button> --}}
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>


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