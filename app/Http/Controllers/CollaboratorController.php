<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Location;
use App\Models\Petition;
use App\Models\Equipment;
use App\Models\Enterprise;
use App\Models\Collaborator;
use Illuminate\Http\Request;


class CollaboratorController extends Controller
{

    public function index(){

        if(auth()->user()->role_id == 1 || 2){
            $collaborators = Collaborator::all();
        }
        else{
            $collaborators     = Collaborator::where('id_user', auth()->user()->id)->get();
        }

        return view('collaborator/index', compact('collaborators'));
    }

    public function create(){

        $enterprises   = Enterprise::all();
        $locations     = Location::all();
        $rols          = Rol::all();

        return view('collaborator/create', compact('enterprises','locations','rols'));
    }

    public function store (Request $request)
    {

        $collaborator = new Collaborator();

        $collaborator->name               = $request->name;
        $collaborator->last_name          = $request->last_name;
        $collaborator->last_maternal      = $request->last_maternal;
        $collaborator->email              = $request->email;

        $collaborator->rol_id             = $request->rol_id;
        $collaborator->enterprise_id      = $request->enterprise_id;
        $collaborator->location_id        = $request->location_id;

        $collaborator->nodo               = $request->nodo;
        $collaborator->ip                 = $request->ip;
        $collaborator->vpn                = $request->vpn;
        $collaborator->internet           = $request->internet;

        $collaborator->account_gitlab     = $request->account_gitlab;
        $collaborator->account_glpi       = $request->account_glpi;
        $collaborator->account_jira       = $request->account_jira;
        $collaborator->account_da         = $request->account_da;
        $collaborator->id_user            = $request->id_user;

        $collaborator->save();

        $id = $collaborator->id;

        $collaborator  = Collaborator::find($id);
        $petitions     = Petition::where('collaborator_id', $id)->get(['id', 'fileID', 'created_at', 'status']);
        $equipments    = Equipment::where('collaborator_id', $id)->get(['id', 'tipo', 'marca', 'modelo', 'serie', 'mac_ethernet', 'mac_wifi', 'collaborator_id']);


        return view('collaborator/show', compact('collaborator', 'petitions', 'equipments'));

    }

    public function show($id)
    {
        $collaborator  = Collaborator::find($id);
        $petitions     = Petition::where('collaborator_id', $id)->get(['id','fileID', 'created_at','status']);
        $equipments    = Equipment::where('collaborator_id', $id)->get(['id', 'tipo', 'marca', 'modelo','serie', 'mac_ethernet', 'mac_wifi','collaborator_id']);

        return view('collaborator/show', compact('collaborator', 'petitions','equipments'));
    }

    public function update(Request $request, $id){

        $petitions     = Petition::where('collaborator_id', $id)->get(['id', 'fileID', 'created_at', 'status']);
        $collaborator  = Collaborator::findOrFail($id);

        $collaborator->nodo     = $request->nodo;
        $collaborator->ip       = $request->ip;
        $collaborator->vpn      = $request->vpn;
        $collaborator->internet = $request->internet;

        $collaborator->account_gitlab = $request->account_gitlab;
        $collaborator->account_glpi   = $request->account_glpi;
        $collaborator->account_jira   = $request->account_jira;
        $collaborator->account_da     = $request->account_da;


        $collaborator->save();

        $collaborator  = Collaborator::find($id);
        $petitions     = Petition::all();
        $equipments    = Equipment::where('collaborator_id', $id)->get(['id', 'tipo', 'marca', 'modelo', 'serie', 'mac_ethernet', 'mac_wifi', 'collaborator_id']);


        return view('collaborator/show', compact('collaborator', 'petitions', 'equipments'));

    }

    //Prueba AJAX
    public function handleAjaxRequest(Request $request)
    {
        // Procesamiento de datos en el servidor
        $data = $request->all();

        return response()->json($data);
}
    //Prueba AJAX

}
