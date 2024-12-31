@extends('layouts.app')

@section('title', 'Notes of ' . $eleve->nom . ' ' . $eleve->prenom)

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Notes of {{ $eleve->nom . ' ' . $eleve->prenom }}</h1>
        @if($eleve->notes->isEmpty())
            <div class="alert alert-warning">No notes found for this student.</div>
        @else
            <p><strong>moyenne : </strong>{{ $eleve->getMoyenne() }}</p>
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Evaluation</th>
                    <th>Note</th>
                </tr>
                </thead>
                <tbody>
                @foreach($eleve->notes as $note)
                    <tr>
                        <td>{{ $note->evaluation->title }}</td>
                        <td>{{ $note->note }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
