<!-- resources/views/modules/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier le Module')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Modifier le Module</h1>
        <form action="{{ route('modules.update', $module->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $module->code) }}" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $module->nom) }}" required>
            </div>
            <div class="form-group">
                <label for="coefficient">Coefficient</label>
                <input type="number" class="form-control" id="coefficient" name="coefficient" value="{{ old('coefficient', $module->coefficient) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
