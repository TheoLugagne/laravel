<!-- resources/views/eleves/show.blade.php -->
@extends('layouts.app')

@section('title', 'Détails de l\'Élève')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Détails de l'Élève</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $eleve->nom }} {{ $eleve->prenom }}</h5>
                <p class="card-text"><strong>Date de Naissance:</strong> {{ $eleve->date_naissance }}</p>
                <p class="card-text"><strong>Numéro Étudiant:</strong> {{ $eleve->numero_etudiant }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $eleve->email }}</p>
                @if($eleve->image)
                    <p class="card-text"><strong>Image:</strong></p>
                    <img src="{{ asset('storage/' . $eleve->image) }}" alt="Image de l'élève" class="img-thumbnail" width="200">
                @endif
            </div>
            <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-primary mt-3">Modifier</a>
        </div>
    </div>
@endsection
