@extends('layouts.app')
@section('content')
<style>
table th{
    text-align: center;
}

</style>
<div class="container-fluid">

    <a class="btn btn-primary mb-3" href="{{ route('Ordonnateur.create') }}"><i class="fa-regular fa-square-plus"></i> {{ __('index.Add') }}</a>

    <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <!-- <th></th> -->
                <th>{{ __('Code Ordonnateur') }}</th>
                <th>{{__('Intitule Ordonnateur')}}</th>
                <th>{{__('Poste Comptable assignataire')}}</th>

                <th>{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @if($ordonnateurs->isEmpty())
            <h1>Aucune donnée disponible.</h1>
            @else
            @foreach ($ordonnateurs as $key => $ordonnateur)
            <tr>


                <td>{{ $ordonnateur->code_ordonnateur }}</td>
                <td>{{ $ordonnateur->intitule_ordonnateur }}</td>
                <td>{{ $ordonnateur->posteComptable ? $ordonnateur->posteComptable->intitule_poste_comptable : 'Non défini' }}</td>
                <td class="text-center">
                    <a href="{{ route('Ordonnateur.edit', $ordonnateur->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('Ordonnateur.destroy', $ordonnateur->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette Ordonnateur?');">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($ordonnateurs->isNotEmpty())

    {{ $ordonnateurs->links() }}
    @endif
    @endif
    @endsection


