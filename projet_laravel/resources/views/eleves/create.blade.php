<!-- resources/views/eleves/create.blade.php -->
@extends('layouts.app')

@section('title', 'Ajouter un Élève')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Ajouter un Élève</h1>
        <form action="{{ route('eleves.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="numero_etudiant">Numéro Étudiant</label>
                <input type="text" name="numero_etudiant" id="numero_etudiant" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
        </form>
    </div>
@endsection
