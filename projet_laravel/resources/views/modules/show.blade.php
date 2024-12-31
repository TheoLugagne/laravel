@extends('layouts.app')

@section('title', 'Détails du Module')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Détails du Module</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $module->nom }}</h5>
                <p class="card-text"><strong>Code:</strong> {{ $module->code }}</p>
                <p class="card-text"><strong>Coefficient:</strong> {{ $module->coefficient }}</p>
                <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-primary mt-3">Modifier</a>
            </div>
        </div>
    </div>
@endsection
