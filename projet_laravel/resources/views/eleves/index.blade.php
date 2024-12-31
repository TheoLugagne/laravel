<!-- resources/views/eleves/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Élèves')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des Élèves</h1>
        <a href="{{ route('eleves.create') }}" class="btn btn-primary mb-3">Ajouter un élève</a>
        @if($eleves->isEmpty())
            <div class="alert alert-warning">Aucun élève n'a été trouvé.</div>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Numéro Étudiant</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($eleves as $eleve)
                    <tr onclick="window.location='{{ route('eleves.show', $eleve->id) }}'" style="cursor: pointer;">
                        <td>{{ $eleve->id }}</td>
                        <td>{{ $eleve->nom }}</td>
                        <td>{{ $eleve->prenom }}</td>
                        <td>{{ $eleve->date_naissance }}</td>
                        <td>{{ $eleve->numero_etudiant }}</td>
                        <td>{{ $eleve->email }}</td>
                        <td>
                            <a href="{{ route('eleves.notes', $eleve->id) }}" class="btn btn-info">Notes</a>
                            <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $eleves->links('pagination::bootstrap-4') }}
            </div>

        @endif
    </div>
@endsection
