@extends('layouts.app')
@section('content')


<style>
    .hide {
        display: none;
    }
</style>


    <div class="container">
        <br>
        <h1 class="text-center">Table des demandes</h1>
        <br>
        <table id="myTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Numéro d'envoi</th>
                    <th>Date d'envoi</th>
                    <th>Expéditeur</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Poste</th>
                    <th>Wilaya</th>
                    <th>N° Decision</th>
                    <th>Date Decision</th>
                    <th>piece jointe</th>
                    <th>piece jointe</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0001</td>
                    <td>11/12/2021</td>
                    <td>Directeur du trésore de la wilaya de boumerdes</td>
                    <td>Djelouli</td>
                    <td>Amine</td>
                    <td>Ingénieur d'état en informatique</td>
                    <td>boumerdes</td>
                    <td>0028</td>
                    <td>12/12/2022</td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                </tr>
                <tr>
                    <td>0015</td>
                    <td>11/12/2022</td>
                    <td>Directeur du trésore de la wilaya d'alger</td>
                    <td>Baaziz</td>
                    <td>Mahfoud</td>
                    <td>Ingénieur d'état en informatique</td>
                    <td>alger</td>
                    <td>0085</td>
                    <td>12/12/2023</td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                </tr>
                <tr>
                    <td>0022</td>
                    <td>11/10/2021</td>
                    <td>Directeur du trésore de la wilaya de biskra</td>
                    <td>beddiaf</td>
                    <td>mohamed</td>
                    <td>Ingénieur d'état en informatique</td>
                    <td>biskra</td>
                    <td>00012</td>
                    <td>12/12/2023</td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                </tr>
                <tr>
                    <td>0020</td>
                    <td>11/12/2023</td>
                    <td>Directeur du trésore de la wilaya de tissemsilt</td>
                    <td>rahaz</td>
                    <td>younes</td>
                    <td>Ingénieur d'état en informatique</td>
                    <td>Msila</td>
                    <td>00015</td>
                    <td>12/12/2023</td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                </tr>
                <tr>
                    <td>0033</td>
                    <td>11/12/2023</td>
                    <td>Directeur du trésore de la wilaya de blida</td>
                    <td>jarah</td>
                    <td>nacer</td>
                    <td>Ingénieur d'état en informatique</td>
                    <td>blida</td>
                    <td>0105</td>
                    <td>12/12/2023</td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                    <td><i class="fa-regular fa-file fa-xl"></i></td>
                </tr>
              
            </tbody>
        </table>
    </div>

   
   
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
@endsection
