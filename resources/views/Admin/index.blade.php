@extends('layouts.app')
@section('content')
<div class="container">

    <a class="btn btn-primary mb-3" href="{{ route('accreditation.create') }}">{{ __('index.Add') }}</a>

    <table class="table table-bordered text-center">
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
                <th width="50%">Statut</th>
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
                <td>
                   
                    <form action="{{route('accreditations.update',$item->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $item->id }}"> 
                    <select name="statut" class="custom-select mb-3">
                        <option value="{{ $item->Statut }}" selected>{{ $item->Statut }}</option>
                        <option value="Validé">Validé</option>
                        <option value="Rejeté">Rejeté</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
                    
                </td>
                @else
                <td>{{ $item->Statut }}</td>
                @endif
                <td>
                    @isset($item->fileDemande)
                    <a href="{{ asset('uploads/FileDemande/' . $item->fileDemande) }}" target="_blank"><i class="fa-regular fa-file fa-xl"></i></a>
                    @endisset
                </td>
                <td>
                    @isset($item->fileDecision)
                    <a href="{{ asset('uploads/FileDecision/' . $item->fileDecision) }}" target="_blank"><i class="fa-regular fa-file fa-xl"></i></a>
                    @endisset
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {!! $accreditation->links() !!}

    @endsection