@extends('layouts.app')

@section('title', 'Edit Evaluation')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Evaluation</h1>
        <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $evaluation->title) }}" required>
            </div>
            <div class="form-group">
                <label for="coefficient">Coefficient</label>
                <input type="number" class="form-control" id="coefficient" name="coefficient" value="{{ old('coefficient', $evaluation->coefficient) }}" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $evaluation->date) }}" required>
            </div>
            <div class="form-group">
                <label for="module_id">Module</label>
                <select class="form-control" id="module_id" name="module_id" required>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}" {{ $module->id == old('module_id', $evaluation->module_id) ? 'selected' : '' }}>{{ $module->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
