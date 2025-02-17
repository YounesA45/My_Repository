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
    <form method="POST" class="border p-3" action="{{ route('accreditations.update', $accreditation->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="NumeroDenvoi">Numéro de l'envoi :</label>
                <input type="number" class="form-control" id="NumeroDenvoi" name="NumeroDenvoi" value="{{$accreditation->NumeroDenvoi}}" disabled>
            </div>

            <div class="form-group col-md-6">
                <label for="DateDenvoi">Date de l'envoi :</label>
                <input type="date" class="form-control" id="DateDenvoi" name="DateDenvoi" value="{{$accreditation->DateDenvoi}}" disabled>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="Sender">Expéditeur :</label>
                <input type="text" class="form-control" id="Sender" name="Sender" value="{{$accreditation->Sender}}" disabled>
            </div>
        </div>

        <label>Informations sur le bénéficiaire :</label>
        <div class="border p-3">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="FamilyName">Nom :</label>
                    <input type="text" class="form-control" id="FamilyName" name="FamilyName" value="{{$accreditation->FamilyName}}" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="Name">Prénom :</label>
                    <input type="text" class="form-control" id="Name" name="Name" value="{{$accreditation->Name}}" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Poste">Poste :</label>
                    <input type="text" class="form-control" id="Poste" name="Poste" placeholder="EX: Sous directeur du commerce" value="{{$accreditation->Poste}}" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="Wilaya">Wilaya :</label>
                    <input type="text" class="form-control" id="Wilaya" name="Wilaya" value="{{$accreditation->Wilaya}}" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="NumeroDecision">Numéro de la décision de nomination :</label>
                    <input type="number" class="form-control" id="NumeroDecision" name="NumeroDecision" value="{{$accreditation->NumeroDecision}}" disabled>
                </div>

                <div class="form-group col-md-6">
                    <label for="DateDecision">Date de la décision de nomination :</label>
                    <input type="date" class="form-control" id="DateDecision" name="DateDecision" value="{{$accreditation->DateDecision}}" disabled>
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
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="Information">Information :</label>

                    <textarea class="form-control" id="Information" name="Information" rows="3"></textarea>

                </div>
                <button id="generate-telex" type="button" class="btn btn-primary">Générate</button>


            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <p id="selectedfileAccreditation">Pièce joindre copie de la TELEX :</p>
                    <input type="file" id="fileAccreditation" name="fileAccreditation" style="display: none;" />
                    <label class="pl-3 pr-3 pt-2 pb-2" for="fileAccreditation" style="cursor: pointer; border: 1px solid #ccc; border-radius: 5px;">
                        <i class="fa-solid fa-file-arrow-up fa-xl"></i>
                    </label>

                </div>

            </div>

            <div class="form-row">
                <select id="statut" name="statut" class="custom-select mb-3">
                    <option value="{{ $accreditation->Statut }}" selected>{{ $accreditation->Statut }}</option>
                    <option value="Validé">Validé</option>
                    <option value="Rejeté">Rejeté</option>
                </select>
            </div>
            <div id="divMotif" class="form-row hide">
                <div class="form-group col-md-12">
                    <label for="Motif">Motif de rejet :</label>

                    <textarea class="form-control" id="Motif" name="Motif" rows="3"></textarea>

                </div>


            </div>

        </div>

        <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>







    </form>
    <style>
        .test {
            position: absolute;
        }
    </style>

</div>
@endauth

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script>
    $(document).ready(function() {

        $('#generate-telex').click(function() {
            var data = {};
            data['inputData'] = $('#Information').val();
            data['NumeroDenvoi'] = $('#NumeroDenvoi').val();
            data['DateDenvoi'] = $('#DateDenvoi').val();
            data['Sender'] = $('#Sender').val();
            data['FamilyName'] = $('#FamilyName').val();
            data['Name'] = $('#Name').val();
            data['Poste'] = $('#Poste').val();
            data['Wilaya'] = $('#Wilaya').val();
            data['NumeroDecision'] = $('#NumeroDecision').val();
            data['DateDecision'] = $('#DateDecision').val();
            //var token = $('meta[name="csrf-token"]').attr('content'); // Retrieve the CSRF token from the meta tag

            // Do something with the data
            // console.log("Input data:", data['inputData'],data['NumeroDenvoi']);


            createWordFile(data);


        });

        function createWordFile(data) {
            // Create a Blob with the text data
            var wordContent = '<!DOCTYPE html>' +
                '<html lang="en"><head>' +
                '  <meta charset="UTF-8">' +
                '   <meta name="viewport" content="width=device-width, initial-scale=1.0">' +
                '   <title>TELEX</title>' +
                '</head>' +
                '<body>' +
                '   <h1 style=" text-align: center">الجمهورية الجزائرية الديمقراطية الشعبية</h1>' +
                '   <hr style=" width: 20%;">' +
                '    <h2 style=" text-align: center">وزارة المالية</h2>' +
                '<table style="width: 100%; text-align: center">' +
                '<tr>' +
                '<td style="width: 40%;vertical-align:top;">' +
                '<p>Direction Générale du Trésor <br> et de la Gestion Comptable <br> des Opérations Financières de l\'Etat</p>' +
                '<p>Direction de la Réglementation <br> et de l\'Exécution Comptable des Budgets</p>' +
                '</td>' +
                '<td style="width: 20%;"></td>' +
                '<td style="width: 40%;">' +
                '<p>المديرية العامة للخزينة والتسيير المحاسبي للعمليات المالية للدولة</p>' +
                '<hr style="width: 20%;">' +
                '<p>قسم التسيير المحاسبي للعمليات المالية للخزينة العمومية</p>' +
                '<p>مديرية التنظيم والتنفيذ المحاسبي للميزانيات</p>' +
                '<div class="border" style="border: 1px solid black;">' +
                '<p class="text-center">N° &emsp;&emsp; DRECB/ &emsp;&emsp; SDRE</p>' +
                '</div>' +
                '</td>' +
                '</tr>' +
                '</table>' +
                '    <h2 style="text-align: center;text-decoration: underline;">TELEX</h2>' +
                '    <table>' +
                '        <tr>' +
                '           <th style="vertical-align:top;text-decoration: underline;">EXPEDITEUR:</th>' +
                '            <td>MINISTERE DES FINANCES DIRECTION GENERALE DU TRESOR ET DE LA GESTION COMPTABLE DES OPERATIONS' +
                '                FINANCIERES DE L\'ETAT DIVISION DE LA GESTION COMPTABLE DES OPERATIONS DU TRESOR PUBLIC</td>' +
                '        </tr>' +
                '        <tr>' +
                '           <th  style="vertical-align:top;text-decoration: underline;">DESTINATAIRE:</th>' +
                '           <td>MONSIEUR LE TRESORIER DE LA WILAYA DE <b>' + data['Wilaya'].toUpperCase() + '</b></td>' +
                '        </tr>' +
                '        <tr>' +
                '            <th style="vertical-align:top;text-decoration: underline;">COPIE POUR INFORMATION:</th>' +
                '           <td><b>' + data['inputData'].toUpperCase() + '</b></td>' +
                '        </tr>' +
                '        <tr>' +
                '           <th style="vertical-align:top;text-decoration: underline;">REFERENCE :</th>' +
                '            <td>DECRET EXECUTIF N 13-95 DU 26/02/2013 COMPLETANT LE DECRET EXECUTIF N°97-268 DU 21/07/1997 FIXANT LES' +
                '               PROCEDURES RELATIVES A L\'ENGAGEMENT ET A L\'EXECUTION DES DEPENSES PUBLIQUES ET DELIMITANT LES' +
                '               ATTRIBUTIONS ET LES RESPONSABILITES DES ORDONNATEURS</td>' +
                '       </tr>' +
                '    </table>' +
                '<p>A LA DEMANDE DE MONSIEUR <b>' + data['Sender'].toUpperCase() +
                ' </b>   (ENVOI N°<b>' + data['NumeroDenvoi'].toUpperCase() + '</b> DU <b>' + data['DateDenvoi'].toUpperCase() + '</b>) STOP ET EN ATTENDANT ABOUTISSEMENT PROCEDURE REGLEMENTAIRE NOMINATION <b>' + data['Poste'].toUpperCase() +
                '  </b>   DE LA WILAYA DE <b>' + data['Wilaya'].toUpperCase() + '</b> STOP ET CONFORMEMENT DISPOSITIONS ARTICLE 02 DU DECRET EXECUTIF VISE EN REFERENCE' +
                '    STOP HONNEUR VOUS MARQUER ACCORD ADMINISTRATION CENTRALE STOP QUANT A ACCREDITATION DE <b> MONSIEUR (' + data['FamilyName'].toUpperCase() + ' ' + data['Name'].toUpperCase() + ' ) </b> STOP' +
                ' <b>EN QUALITE ORDONNATEUR SECONDAIRE SUR BUDGET DE STRUCTURE PRECITEE</b> STOP <b>POUR UNE DUREE D`\'UNE (01) ANNEE A COMPTER DE CE JOUR</b>' +
                '    STOP ET FIN SIGNE A.MOUSSA DIRECTEUR DE LA REGLEMENTATION ET DE L\'EXECUTION COMPTABLE DES BUDGETS.</p>    ' +
                '</body>' +
                '</html>';



            var blob = new Blob([wordContent], {
                type: 'application/msword'
            });

            // Use FileSaver.js to save the Blob as a Word file
            saveAs(blob, 'document.doc');
        }

        $('#fileAccreditation').change(function() {
            var fileName = $(this).val().split('\\').pop(); // Extract file name
            $('#selectedfileAccreditation').text('Fichier sélectionné: ' + fileName);
        });
        $("#statut").change(function() {

            if ($(this).val() == "Rejeté") {
                $("#divMotif").show();


            } else {
                $("#divMotif").hide();

            }

        });
        $("#fileAccreditation").change(function() {
           
            $('#statut option[value=Validé]').attr('selected', 'selected');
        });
    });


    // $.ajax({
    //     url: "{{ route('fileWord') }}", // Using the named route
    //     method: 'POST',
    //     headers: {
    //     'X-CSRF-TOKEN': token // Include the CSRF token in the request headers
    // },
    //     data: { inputData: inputData },
    //     success: function(response) {
    //         // Handle the response
    //         console.log(response);
    //     },
    //     error: function(xhr, status, error) {
    //         // Handle errors
    //         console.error("Failed to send data.");
    //     }
    // }); 
</script>

<!-- Optional JavaScript -->




@endsection