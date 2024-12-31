@extends('layouts.app')

@section('title', 'List of Evaluations')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">List of Evaluations</h1>
        <a href="{{ route('evaluations.create') }}" class="btn btn-primary mb-3">Add Evaluation</a>
        @if($evaluations->isEmpty())
            <div class="alert alert-warning">No evaluations found.</div>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Coefficient</th>
                    <th>Date</th>
                    <th>Module</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($evaluations as $evaluation)
                    <tr onclick="window.location='{{ route('evaluations.show', $evaluation->id) }}'" style="cursor: pointer;">
                        <td>{{ $evaluation->title }}</td>
                        <td>{{ $evaluation->coefficient }}</td>
                        <td>{{ $evaluation->date }}</td>
                        <td>{{ $evaluation->module->nom }}</td>
                        <td>
                            <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this evaluation?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $evaluations->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
@endsection
