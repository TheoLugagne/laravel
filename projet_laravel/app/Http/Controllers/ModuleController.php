<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::paginate(10);
        return view('modules.index', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:255|unique:modules,code',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer',
        ]);

        Module::create($validatedData);

        return redirect()->route('modules.index')->with('success', 'Module ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        return view('modules.show', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        return view('modules.edit', ['module' => $module]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:255|unique:modules,code',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer',
        ]);

        $module->update($validatedData);

        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès');
    }
}
