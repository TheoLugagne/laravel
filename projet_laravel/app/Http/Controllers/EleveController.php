<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = Eleve::paginate(10);

        return view('eleves.index', ['eleves' => $eleves]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eleves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date|before:today', // Doit être une date valide avant aujourd'hui
            'numero_etudiant' => 'required|string|unique:eleves,numero_etudiant', // Doit être unique
            'email' => 'required|email|unique:eleves,email', // Doit être un email unique
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $validatedData['image'] = $path;
        }

        Eleve::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Élève ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.show', ["eleve" => $eleve]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.edit', ["eleve" => $eleve]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date|before:today', // Doit être une date valide avant aujourd'hui
            'numero_etudiant' => 'required|string|unique:eleves,numero_etudiant' . $id, // Doit être unique
            'email' => 'required|email|unique:eleves,email' . $id, // Doit être un email unique
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192' // Pour l'instant, un simple texte
        ]);

        // Récupérer l'élève à partir de l'ID
        $eleve = Eleve::findOrFail($id);

        // Mise à jour des champs
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->date_naissance = $request->date_naissance;
        $eleve->numero_etudiant = $request->numero_etudiant;
        $eleve->email = $request->email;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $eleve->image = $path;
        }
        $eleve->save();

        return redirect()->route('eleves.index')->with('success', 'Eleve modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Eleve::destroy($id);
        return redirect()->route('eleves.index')->with('success', 'Elève supprimer avec succès !');
    }

    public function notes(string $id)
    {
        $eleve = Eleve::findOrFail($id);
        return view("eleves.notes", ["eleve" => $eleve]);
    }
}
