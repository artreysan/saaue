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

        $collaborators = Collaborator::all();

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

        $collaborator->save();

        $id = $collaborator->id;

        $collaborator  = Collaborator::find($id);
        $petitions     = Petition::where('collaborator_id', $id)->get(['id', 'fileID', 'created_at', 'status']);

        return view('collaborator/show', compact('collaborator', 'petitions'));

    }

    public function show($id)
    {
        $collaborator  = Collaborator::find($id);
        $petitions     = Petition::where('collaborator_id', $id)->get(['id','fileID', 'created_at','status']);
        $equipment     = Equipment::where('collaborator_id', $id)->get(['id', 'tipo', 'marca', 'modelo','serie', 'collaborator_id']);

        return view('collaborator/show', compact('collaborator', 'petitions','equipment'));
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

        $collaborator->equipment_id  = $request->equipment_id;

        $collaborator->save();

        $collaborator  = Collaborator::find($id);
        $petitions     = Petition::all();

        return view('collaborator/show', compact('collaborator', 'petitions'));

    }

}
