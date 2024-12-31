@extends('layouts.app')

@section('title', 'Add note')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add note</h1>
        <form action="{{ route('evaluation_eleves.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="evaluation_id">Evaluation</label>
                <select class="form-control" id="evaluation_id" name="evaluation_id" required>
                    @foreach($evaluations as $evaluation)
                        <option value="{{ $evaluation->id }}">{{ $evaluation->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="eleve_id">Eleve</label>
                <select class="form-control" id="eleve_id" name="eleve_id" required>
                    @foreach($eleves as $eleve)
                        <option value="{{ $eleve->id }}">{{ $eleve->nom . " "  . $eleve->prenom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="note">Note</label>
                <input type="number" class="form-control" id="note" name="note" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
