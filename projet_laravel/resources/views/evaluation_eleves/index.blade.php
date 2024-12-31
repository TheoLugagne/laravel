@extends('layouts.app')

@section('title', 'List of notes')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">List of notes</h1>
        <a href="{{ route('evaluation_eleves.create') }}" class="btn btn-primary mb-3">Add EvaluationEleve</a>
        @if($evaluationEleves->isEmpty())
            <div class="alert alert-warning">No evaluation eleves found.</div>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Evaluation</th>
                    <th>Eleve</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($evaluationEleves as $evaluationEleve)
                    <tr onclick="window.location='{{ route('evaluation_eleves.show', $evaluationEleve->id) }}'" style="cursor: pointer;">
                        <td>{{ $evaluationEleve->id }}</td>
                        <td>{{ $evaluationEleve->evaluation->title }}</td>
                        <td>{{ $evaluationEleve->eleve->nom . " " . $evaluationEleve->eleve->prenom }}</td>
                        <td>{{ $evaluationEleve->note }}</td>
                        <td>
                            <a href="{{ route('evaluation_eleves.edit', $evaluationEleve->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('evaluation_eleves.destroy', $evaluationEleve->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this evaluation eleve?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $evaluationEleves->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
@endsection
