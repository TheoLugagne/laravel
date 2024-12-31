<?php

namespace App\Http\Controllers;

use App\Mail\NewGradeNotification;
use App\Models\EvaluationEleve;
use App\Models\Evaluation;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EvaluationEleveController extends Controller
{
    public function index()
    {
        $evaluationEleves = EvaluationEleve::with(['evaluation', 'eleve'])->paginate(10);
        return view('evaluation_eleves.index', ['evaluationEleves' => $evaluationEleves]);
    }

    public function create()
    {
        $evaluations = Evaluation::all();
        $eleves = Eleve::all();
        return view('evaluation_eleves.create', ['evaluations' => $evaluations, 'eleves' => $eleves]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'evaluation_id' => 'required|exists:evaluations,id',
            'eleve_id' => 'required|exists:eleves,id',
            'note' => 'required|integer',
        ]);

        $grade = EvaluationEleve::create($validatedData);
        $eleve = Eleve::find($grade->eleve_id);
        Mail::to($eleve->email)->send(new NewGradeNotification($grade->note, $grade->created_at));


        return redirect()->route('evaluation_eleves.index')->with('success', 'EvaluationEleve added successfully');
    }

    public function show(EvaluationEleve $evaluationEleve)
    {
        return view('evaluation_eleves.show', ['evaluationEleve' => $evaluationEleve]);
    }

    public function edit(EvaluationEleve $evaluationEleve)
    {
        $evaluations = Evaluation::all();
        $eleves = Eleve::all();
        return view('evaluation_eleves.edit', ['evaluationEleve' => $evaluationEleve, 'evaluations' => $evaluations, 'eleves' => $eleves]);
    }

    public function update(Request $request, EvaluationEleve $evaluationEleve)
    {
        $validatedData = $request->validate([
            'evaluation_id' => 'required|exists:evaluations,id',
            'eleve_id' => 'required|exists:eleves,id',
            'note' => 'required|integer',
        ]);

        $evaluationEleve->update($validatedData);

        return redirect()->route('evaluation_eleves.index')->with('success', 'EvaluationEleve updated successfully');
    }

    public function destroy(EvaluationEleve $evaluationEleve)
    {
        $evaluationEleve->delete();
        return redirect()->route('evaluation_eleves.index')->with('success', 'EvaluationEleve deleted successfully');
    }
}
