@extends('layouts.app')

@section('title', 'Evaluation Details')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Evaluation Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $evaluation->title }}</h5>
                <p class="card-text"><strong>Coefficient:</strong> {{ $evaluation->coefficient }}</p>
                <p class="card-text"><strong>Date:</strong> {{ $evaluation->date }}</p>
                <p class="card-text"><strong>Module:</strong> {{ $evaluation->module->nom }}</p>
                <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-primary mt-3">Edit</a>
            </div>
        </div>
    </div>
@endsection
