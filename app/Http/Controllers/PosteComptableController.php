<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordonnateur;
use App\Models\PosteComptable;
use App\Models\DRT;

class PosteComptableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $drts = DRT::all();

        $postesComptables = PosteComptable::with('drt')->latest()->paginate(5);
        return view('PosteComptable.index',compact(['postesComptables']))
                        ->with('i', (request()-> input('page',1)-2) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drts = DRT::all();

        return view('PosteComptable.create', compact('drts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code_poste_comptable'=>'required',
            'intitule_poste_comptable'=>'required'
        ]);

        PosteComptable::create($request->all());


        return redirect()->route('PosteComptable.index')
               ->with('success','Poste Comptable a été ajoutée avec succès !');
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
        $postecomptable = PosteComptable::find($id);
        $drts = DRT::all();

        if (!$postecomptable) {
            return redirect()->route('PosteComptable.index')->with('error', "Poste Comptable non trouvé.");
        }
        return view('PosteComptable.edit',compact('postecomptable','drts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $postecomptable = PosteComptable::find($id);

        $postecomptable->update($request->all());
        return redirect()->route('PosteComptable.index')->with('success', 'Le Poste Comptable a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postecomptable = PosteComptable::find($id);

    if (!$postecomptable) {
        return redirect()->route('PosteComptable.index')->with('error', "Le Poste Comptable non trouvé.");
    }

    $postecomptable->delete();

    return redirect()->route('PosteComptable.index')->with('success', "Le Poste Comptable supprimé avec succès !");
    }
}
