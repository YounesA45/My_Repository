@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <a class="btn btn-primary mb-3" href="{{ route('accreditation.create') }}"><i class="fa-regular fa-square-plus"></i> {{ __('index.Add') }}</a>

    <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <!-- <th></th> -->
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
            @if($accreditation->isEmpty())
            <h1>Aucune donnée disponible.</h1>
            @else
            @foreach ($accreditation as $item)
            <tr>
                <!-- <td><input type="checkbox" value="{{ $item->id }}"></td> -->
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
                @elseif($item->Statut == "En cours de saisie")
                <td style="background-color:orange;font-weight:bold;">{{__($item->Statut)}}</td>
                @elseif($item->Statut == "En cours de traitement")
                <td style="background-color:rgb(234, 237, 18);font-weight:bold;">{{__($item->Statut)}}</td>
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
                <td>
                @if($item->Statut == "En cours de saisie")
                <form method="POST" class="" action="{{ route('valider',$item->id) }}" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Voulez-vous valider cette accréditation?');"><i class="fa-solid fa-check"></i></button>
                </form>

                    <form action="{{ route('accreditation.destroy',$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('accreditation.edit',$item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>



                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette accréditation?');"><i class="fa-solid fa-trash"></i></button>

                    </form>
                    <!-- 
                        <a class="btn btn-success" href="{{ route('accreditation.edit',$item->id) }}">Valider</a>
                        <a class="btn btn-warning" href="{{ route('accreditation.edit',$item->id) }}">Modifier</a>
                        <a class="btn btn-danger" href="{{ route('accreditation.destroy',$item->id) }}">Supprimer</a> -->
                 @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($accreditation->isNotEmpty())

    {{ $accreditation->links() }}
    @endif
    @endif
    @endsection


    