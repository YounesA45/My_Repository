@extends('layouts.app')
@section('content')
<div class="container-fluid">
<br>
<br>
    <table class="table table-bordered text-center ">
        <thead class="table-dark">
            <tr>
            <th>{{ __('Shipment number') }}</th>
                <th>{{__('Date of sending')}}</th>
                <th>{{__('Sender')}}</th>
                <th>{{__('Family Name')}}</th>
                <th>{{__('First Name')}}</th>
                <th>{{__('Post')}}</th>
                <th>{{__('District')}}</th>
                <th>{{__('Decision Number')}}</th>
                <th>{{__('Date of Decision')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Request Attachment')}}</th>
                <th>{{__('Nomination Attachment')}}</th>
                <th>{{__('TELEX Attachment')}}</th>
                <th>{{__('Pattern')}}</th>
                <th></th>
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
                <td style="background-color: chartreuse;font-weight:bold;">{{__($item->Statut)}}</td>
                @elseif($item->Statut == "Rejeté")
                <td style="background-color: red;font-weight:bold;">{{__($item->Statut)}}</td>
                 @elseif($item->Statut == "En cours de traitement")
                <td style="background-color:orange;font-weight:bold;">{{__($item->Statut)}}</td>
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
                <td>
                    @if($item->Statut == "Validé")
                    @isset($item->fileAccreditation)
                    <a href="{{ asset('uploads/FileAccreditation/' . $item->fileAccreditation) }}" target="_blank"><i class="fa-regular fa-file fa-xl"></i></a>
                    @endisset
                    @endif
                </td>
                <td>
                    @if($item->Statut == "Rejeté")
                    {{ $item->Motif }}
                    @endif
                </td>
                @if($item->Statut == "En cours de traitement")
                <td>
                   
                    <!-- <form action="{{route('accreditations.update',$item->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $item->id }}"> 
                    <select name="statut" class="custom-select mb-3">
                        <option value="{{ $item->Statut }}" selected>{{ $item->Statut }}</option>
                        <option value="Validé">Validé</option>
                        <option value="Rejeté">Rejeté</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form> -->
                    <a class="btn btn-warning" href="{{ route('accreditations.edit',$item->id) }}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                </td>
                @else
                <td></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>


    {!! $accreditation->links() !!}

    @endsection