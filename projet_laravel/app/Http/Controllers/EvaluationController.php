<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Module;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluations = Evaluation::with('module')->paginate(10);
        return view('evaluations.index', ['evaluations' => $evaluations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::all();
        return view('evaluations.create', ['modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'coefficient' => 'required|integer',
            'date' => 'required|date',
            'module_id' => 'required|exists:modules,id',
        ]);

        Evaluation::create($validatedData);

        return redirect()->route('evaluations.index')->with('success', 'Evaluation added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        return view('evaluations.show', ['evaluation' => $evaluation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        $modules = Module::all();
        return view('evaluations.edit', ['evaluation' => $evaluation, 'modules' => $modules]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'coefficient' => 'required|integer',
            'date' => 'required|date',
            'module_id' => 'required|exists:modules,id',
        ]);

        $evaluation->update($validatedData);

        return redirect()->route('evaluations.index')->with('success', 'Evaluation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return redirect()->route('evaluations.index')->with('success', 'Evaluation deleted successfully');
    }
}
