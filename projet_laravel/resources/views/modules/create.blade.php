<!-- resources/views/modules/create.blade.php -->
@extends('layouts.app')

@section('title', 'Ajouter un Module')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Ajouter un Module</h1>
        <form action="{{ route('modules.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="coefficient">Coefficient</label>
                <input type="number" class="form-control" id="coefficient" name="coefficient" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
