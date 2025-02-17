@extends('layouts.app')
@section('content')
<style>
table th{
    text-align: center;
}

</style>
<div class="container-fluid">

    <a class="btn btn-primary mb-3" href="{{ route('PosteComptable.create') }}"><i class="fa-regular fa-square-plus"></i> {{ __('index.Add') }}</a>

    <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif -->
    <table class="table table-bordered">
        <thead class="table-dark ">
            <tr >
                <!-- <th></th> -->
                <th>{{ __('Code Poste Comptable') }}</th>
                <th>{{__('Intitule Poste Comptable')}}</th>
                <th>{{__('DRT assignataire')}}</th>

                <th>{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @if($postesComptables->isEmpty())
            <h1>Aucune donnée disponible.</h1>
            @else
            @foreach ($postesComptables as $key => $posteComptable)
            <tr>


                <td>{{ $posteComptable->code_poste_comptable }}</td>
                <td>{{ $posteComptable->intitule_poste_comptable }}</td>
                <td>{{ $posteComptable->drt ? $posteComptable->drt->intitule_drt : 'Non défini' }}</td>
                <td class="text-center">
                    <a href="{{ route('PosteComptable.edit', $posteComptable->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('PosteComptable.destroy', $posteComptable->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette Poste Comptable?');">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($postesComptables->isNotEmpty())

    {{ $postesComptables->links() }}
    @endif
    @endif
    @endsection


