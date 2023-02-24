<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\View;
use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Redirect;

class EquipmentController extends Controller
{

    public function index(){
        if(auth()->user()->role_id== 1) {
            $equipments = Equipment::all();
        } else{
            $collaborators = Collaborator::where('id_user','=',auth()->user()->id)->get();
            foreach($collaborators as $col){
                $equipments = Equipment::where('collaborator_id','=',$col->id)->get();
            }

        }
        return view('equipment/index', compact('equipments'));
    }

    public function create(){

        auth()->user()->role_id == 3 ?  $collaborators = Collaborator::where('id_user','=',auth()->user()->id)->get() : $collaborators = Collaborator::all() ;
        $enterprises = Enterprise::all();
        $equipment = new Equipment();
        return view('equipment/create', compact('enterprises', 'collaborators'));
    }


    public function store (Request $request)
    {
        $equipment = new Equipment();

        $equipment->tipo            = $request->tipo;
        $equipment->marca           = $request->marca;
        $equipment->modelo          = $request->modelo;
        $equipment->serie           = $request->serie;
        $equipment->mac_ethernet    = $request->mac_ethernet;
        $equipment->mac_wifi        = $request->mac_wifi;
        $equipment->enterprise_id   = $request->enterprise_id;
        $equipment->collaborator_id = $request->collaborator_id;

        $equipment->save();

        $enterprises = Enterprise::all();
        $equipments = Equipment::all();

        return view('equipment/index', compact('equipments','enterprises'));
    }

    public function update(Request $request, $id)
    {

        $equipment = Equipment::findOrFail($id);

        $equipment->propietario     = $request->propietario;

        $equipment->save();

        $equipment = Equipment::all();
        return view('petitions/index', compact('petitions'));
    }

    public function show($id)
    {
        $collaborators = Collaborator::all();
        $equipment = Equipment::find($id);

        return view('equipment/show', compact('collaborators', 'equipment'));
    }

    public function showEquipment($id)
    {

        $equipment   = Equipment::find($id);
        $collaborator = Collaborator::find($id);

        return view('collaborator/equipment/show', compact('collaborator', 'equipment'));
    }

}
