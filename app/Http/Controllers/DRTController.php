<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DRT;
use App\Models\PosteComptable;

class DRTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drts = DRT::latest()->paginate(5);
        return view('DRT.index',compact('drts'))->with('i', (request()-> input('page',1)-2) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drts = DRT::all();

        return view('DRT.create', compact('drts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
       $request->validate([
        'code_drt' => 'required',
        'intitule_drt' => 'required'  // Assure-toi qu'il est bien obligatoire
    ]);

    Drt::create($request->all());

    return redirect()->route('DRT.index')
                     ->with('success', 'DRT ajouté avec succès');
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
        $drt = DRT::find($id);

        if (!$drt) {
            return redirect()->route('DRT.index')->with('error', "DRT non trouvé.");
        }
        return view('DRT.edit',compact('drt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $drt = DRT::find($id);

        $drt->update($request->all());
        return redirect()->route('DRT.index')->with('success', 'DRT a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drt = DRT::find($id);

    if (!$drt) {
        return redirect()->route('DRT.index')->with('error', "DRT non trouvé.");
    }

    $drt->delete();

    return redirect()->route('DRT.index')->with('success', "DRT supprimé avec succès !");
    }
}
