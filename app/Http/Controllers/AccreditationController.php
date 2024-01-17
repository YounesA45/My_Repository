<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use Illuminate\Http\Request;

class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accreditation = Accreditation::latest()->paginate(5);
        return view('Accreditation.index',compact('accreditation'))
                        ->with('i', (request()-> input('page',1)-2) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Accreditation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'NumeroDenvoi'=>'required',
            'DateDenvoi'=>'required',
            'Sender'=>'required',
            'FamilyName'=>'required',
            'Name'=>'required',
            'Poste'=>'required',
            'Wilaya'=>'required',
            'NumeroDecision'=>'required',
            'DateDecision'=>'required',
            'fileDemande'=>'required|mimes:jpeg,png,jpg,pdf|max:4096',
            'fileDecision'=>'required|mimes:jpeg,png,jpg,pdf|max:4096'
        ]);
        $input =$request->all();
        if($fileDemande = $request->file('fileDemande')){
            $originalFileDemandeName = pathinfo($fileDemande->getClientOriginalName(), PATHINFO_FILENAME);
            $profileFileDemande = date('YmdHis').".".$originalFileDemandeName.".".$fileDemande->getClientOriginalExtension();
            $fileDemande->storeAs('uploads/FileDemande/',$profileFileDemande,'public');
            $input['fileDemande'] = $profileFileDemande;
        }
        if($fileDecision = $request->file('fileDecision')){ 
            $originalfileDecisionName = pathinfo($fileDecision->getClientOriginalName(), PATHINFO_FILENAME);
            $profileFileDecision = date('YmdHis').".".$originalfileDecisionName.".".$fileDecision->getClientOriginalExtension();
            $fileDecision->storeAs('uploads/FileDecision/',$profileFileDecision,'public');
            $input['fileDecision'] = $profileFileDecision;
        }
        Accreditation::create($input);
        return redirect()->route('accreditation.index')
               ->with('success','Accreditation added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Accreditation $accreditation)
    {
        return view('Accreditation.show',compact['accreditation']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accreditation $accreditation)
    {
        return view('Accreditation.edit',compact['accreditation']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accreditation $accreditation)
    {
        $request->validate([
            'NumeroDenvoi'=>'required',
            'DateDenvoi'=>'required',
            'Sender'=>'required',
            'FamilyName'=>'required',
            'Name'=>'required',
            'Poste'=>'required',
            'Wilaya'=>'required',
            'NumeroDecision'=>'required',
            'DateDecision'=>'required',
            'fileDemande'=>'required|mimes:jpeg,png,jpg,pdf|max:4096',
            'fileDecision'=>'required|mimes:jpeg,png,jpg,pdf|max:4096'
        ]);
        $input =$request->all();
        if($fileDemande = $request->file('fileDemande')){
            $destinationPath = '/FileDemande/'; 
            $profileFile = date('YmdHis').".".$fileDemande->getClientOriginalExtension();
            $fileDemande->move($destinationPath,$profileFile);
            $input['fileDemande'] = $fileDemande;
        }else{
            unset( $input['fileDemande']);
        }
        if($fileDecision = $request->file('fileDecision')){
            $destinationPath = '/FileDecision/'; 
            $profileFile = date('YmdHis').".".$fileDecision->getClientOriginalExtension();
            $fileDecision->move($destinationPath,$profileFile);
            $input['fileDecision'] = $fileDecision;
        }else{
            unset( $input['fileDecision']);
        }
        $accreditation->update($input);
        return redirect()->route('Accreditation.index')
               ->with('sussess','Accreditation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accreditation $accreditation)
    {
        $accreditation->delete();
        return redirect()->route('Accreditation.index')
        ->with('sussess','Accreditation deleted successfully');
    }
}
