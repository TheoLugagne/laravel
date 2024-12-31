@extends('layouts.app')

@section('title', 'Add Evaluation')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add Evaluation</h1>
        <form action="{{ route('evaluations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="coefficient">Coefficient</label>
                <input type="number" class="form-control" id="coefficient" name="coefficient" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="module_id">Module</label>
                <select class="form-control" id="module_id" name="module_id" required>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
