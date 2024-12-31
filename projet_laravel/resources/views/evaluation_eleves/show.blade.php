@extends('layouts.app')

@section('title', 'Note details')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Note details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $evaluationEleve->evaluation->title }}</h5>
                <p class="card-text"><strong>Eleve:</strong> {{ $evaluationEleve->eleve->nom . " " . $evaluationEleve->eleve->prenom }}</p>
                <p class="card-text"><strong>Note:</strong> {{ $evaluationEleve->note }}</p>
                <a href="{{ route('evaluation_eleves.edit', $evaluationEleve->id) }}" class="btn btn-primary mt-3">Edit</a>
            </div>
        </div>
    </div>
@endsection
