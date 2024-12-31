<!-- resources/views/modules/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Modules')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des Modules</h1>
        <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Ajouter un module</a>
        @if($modules->isEmpty())
            <div class="alert alert-warning">Aucun module n'a été trouvé.</div>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Coefficient</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($modules as $module)
                    <tr onclick="window.location='{{ route('modules.show', $module->id) }}'" style="cursor: pointer;">
                        <td>{{ $module->code }}</td>
                        <td>{{ $module->nom }}</td>
                        <td>{{ $module->coefficient }}</td>
                        <td>
                            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce module ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $modules->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
@endsection
