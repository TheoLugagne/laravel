<!-- resources/views/eleves/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier l\'Élève')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Modifier l'Élève</h1>
        <form action="{{ route('eleves.update', $eleve->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $eleve->nom) }}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $eleve->prenom) }}" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $eleve->date_naissance) }}" required>
            </div>
            <div class="form-group">
                <label for="numero_etudiant">Numéro Étudiant</label>
                <input type="text" class="form-control" id="numero_etudiant" name="numero_etudiant" value="{{ old('numero_etudiant', $eleve->numero_etudiant) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $eleve->email) }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
