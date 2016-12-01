<?php

namespace App\Http\Controllers;

use App\PartType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PartTypesController extends Controller
{


    public function __construct() {
       $this->middleware('auth');
    }

    //
    public function index(){

         $partTypes = PartType::orderBy('name', 'asc')->get();

         return view('backoffice.parttypes.index', compact('partTypes'));
    }

    public function show($id){
        $partType = PartType::findorFail($id);

        return view('backoffice.parttypes.show', compact('partType'));
    }

    public function create(){

        return view('backoffice.parttypes.create');
    }

    public function store(Requests\PartTypeRequest $request){

        $partType = new PartType($request->all());

        // this automatically applies the user id for
        //the relations ship
        //TODO: rever isto para associar a peça à loja de que o user é dono;
        $partType->save();

        alert()->success('Tipo de peça "'. $partType->name.'" criada com sucesso!');

        return redirect('part_types');
    }

    public function edit($id){

        $partType = PartType::findorFail($id);

        return view('backoffice.parttypes.edit', compact('partType'));
    }

    public function update($id,Requests\PartTypeRequest $request){

        $partType = PartType::findOrFail($id);

        $partType->update($request->all());

        alert()->success('Tipo de peça "'. $partType->name.'" actualizada com sucesso!');

         return redirect('part_types');
    }
}
