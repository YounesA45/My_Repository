<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordonnateur;
use App\Models\PosteComptable;

class OrdonnateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postesComptables = PosteComptable::all();

        $ordonnateurs = Ordonnateur::with('posteComptable')->latest()->paginate(5);
        return view('ordonnateur.index',compact(['ordonnateurs','postesComptables']))
                        ->with('i', (request()-> input('page',1)-2) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $postesComptables = PosteComptable::all();

        return view('Ordonnateur.create', compact('postesComptables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
       // dd($request->all());
      $request->validate([
        'code_ordonnateur'=>'required',
        'intitule_ordonnateur'=>'required',
        'poste_comptable_id' => 'required|exists:poste_comptables,id',
    ]);

    Ordonnateur::create($request->all());


    return redirect()->route('Ordonnateur.index')
           ->with('success','L\'ordonnateur a été ajoutée avec succès !');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $ordonnateur = Ordonnateur::find($id);
        $postesComptables = PosteComptable::all(); // Récupérer tous les postes comptables

        if (!$ordonnateur) {
            return redirect()->route('Ordonnateur.index')->with('error', 'Ordonnateur introuvable');
        }

        return view('Ordonnateur.edit', compact('ordonnateur', 'postesComptables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ordonnateur = Ordonnateur::find($id);

        $ordonnateur->update($request->all());
        return redirect()->route('Ordonnateur.index')->with('success', 'L\'ordonnateur a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $ordonnateur = Ordonnateur::find($id);

    if (!$ordonnateur) {
        return redirect()->route('Ordonnateur.index')->with('error', "Ordonnateur non trouvé.");
    }

    $ordonnateur->delete();

    return redirect()->route('Ordonnateur.index')->with('success', "Ordonnateur supprimé avec succès !");
}}

