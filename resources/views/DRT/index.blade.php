@extends('layouts.app')
@section('content')
<style>
table th{
    text-align: center;
}

</style>
<div class="container">

    <a class="btn btn-primary mb-3" href="{{ route('DRT.create') }}"><i class="fa-regular fa-square-plus"></i> {{ __('index.Add') }}</a>

    <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif -->
    <table class="table table-bordered">
        <thead class="table-dark ">
            <tr >
                <!-- <th></th> -->
                <th>{{ __('code_drt') }}</th>
                <th>{{__('intitule_drt')}}</th>


                <th >{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @if($drts->isEmpty())
            <h1>Aucune donnée disponible.</h1>
            @else
            @foreach ($drts as $key => $drt)
            <tr>


                <td>{{ $drt->code_drt }}</td>
                <td>{{ $drt->intitule_drt }}</td>

                <td class="text-center">
                    <a href="{{ route('DRT.edit', $drt->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('DRT.destroy', $drt->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette Poste Comptable?');">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($drts->isNotEmpty())

    {{ $drts->links() }}
    @endif
    @endif
    @endsection


