@extends('layouts.app')

@section('title', 'Edit note')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit note</h1>
        <form action="{{ route('evaluation_eleves.update', $evaluationEleve->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="evaluation_id">Evaluation</label>
                <select class="form-control" id="evaluation_id" name="evaluation_id" required>
                    @foreach($evaluations as $evaluation)
                        <option value="{{ $evaluation->id }}" {{ $evaluation->id == old('evaluation_id', $evaluationEleve->evaluation_id) ? 'selected' : '' }}>{{ $evaluation->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="eleve_id">Eleve</label>
                <select class="form-control" id="eleve_id" name="eleve_id" required>
                    @foreach($eleves as $eleve)
                        <option value="{{ $eleve->id }}" {{ $eleve->id == old('eleve_id', $evaluationEleve->eleve_id) ? 'selected' : '' }}>{{ $eleve->nom . " " . $eleve->prenom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="note">Note</label>
                <input type="number" class="form-control" id="note" name="note" value="{{ old('note', $evaluationEleve->note) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
