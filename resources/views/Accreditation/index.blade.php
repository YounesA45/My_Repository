@extends('layouts.app')
@section('content')
    <div class="container">

        <a class="btn btn-primary mb-3" href="{{ route('accreditation.create') }}">{{ __('index.Add') }}</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead class="table-dark">
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
                    <th>Statut</th>
                    <th>piece jointe</th>
                    <th>piece jointe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accreditation as $item)
                    <tr>
                        <td>{{ $item->NumeroDenvoi }}</td>
                        <td>{{ $item->DateDenvoi }}</td>
                        <td>{{ $item->Sender }}</td>
                        <td>{{ $item->FamilyName }}</td>
                        <td>{{ $item->Name }}</td>
                        <td>{{ $item->Poste }}</td>
                        <td>{{ $item->Wilaya }}</td>
                        <td>{{ $item->NumeroDecision }}</td>
                        <td>{{ $item->DateDecision }}</td>
                        
                            @if($item->Statut == "Validé")
                            <td style="background-color: chartreuse;">{{ $item->Statut }}</td>
                            @elseif($item->Statut == "Rejeté")
                            <td style="background-color: red">{{ $item->Statut }}</td>
                            @elseif($item->Statut == "En attente")
                            <td style="background-color:orange">{{ $item->Statut }}</td>
                            @else
                            <td>{{ $item->Statut }}</td>
                            @endif
                        <td>
                            @isset($item->fileDemande)
                                <a href="{{ asset('uploads/FileDemande/' . $item->fileDemande) }}" target="_blank"><i
                                        class="fa-regular fa-file fa-xl"></i></a>
                            @endisset
                        </td>
                        <td>
                            @isset($item->fileDecision)
                                <a href="{{ asset('uploads/FileDecision/' . $item->fileDecision) }}" target="_blank"><i
                                        class="fa-regular fa-file fa-xl"></i></a>
                            @endisset
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       
      
        {!! $accreditation->links() !!}
      
    @endsection
