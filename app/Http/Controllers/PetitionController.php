<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\Account;
use App\Models\Service;
use App\Models\Petition;
use App\Models\Equipment;
use App\Models\Authorizer;
use App\Models\Enterprise;
use App\Models\Collaborator;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    public function index(){

        $petitions = Petition::all();
        return view('petitions/index', compact('petitions'));
    }

    public function create($id)
    {

        $collaborator = Collaborator::find($id);

        $user          = User::all();
        $enterprise    = Enterprise::all();
        $equipment     = Equipment::all();

        $petition = new Petition();

        return view('collaborator/petition/create', compact('collaborator','enterprise','equipment'));
    }

    public function store (Request $request)
    {

        $petition = new Petition();

        $petition->user_id           = $request->user_id;
        $petition->collaborator_id   = $request->collaborator_id;
        $petition->equipment_id      = $request->equipment_id;

        $petition->nodo              = $request->nodo;
        $petition->vpn               = $request->vpn;
        $petition->ip                = $request->ip;
        $petition->internet          = $request->internet;

        $petition->account_gitlab    = $request->account_gitlab;
        $petition->account_glpi      = $request->account_glpi;
        $petition->account_jira      = $request->account_jira;

        $petition->account_da        = $request->account_jira;

        $petition->access_project    = $request->access_project;

        $petition->tk_glpi_account_1          = $request->tk_glpi_account_1;
        $petition->tk_gitlab_account_1        = $request->tk_gitlab_account_1;
        $petition->tk_jira_account_1          = $request->tk_jira_account_1;
        $petition->tk_da_account_1            = $request->tk_da_account_1;

        $petition->tk_nodo_1                  = $request->tk_nodo_1;
        $petition->tk_internet_1              = $request->tk_internet_1;
        $petition->tk_ip_1                    = $request->tk_ip_1;
        $petition->tk_vpn_1                   = $request->tk_vpn_1;

        $petition->tk_glpi_account_0          = $request->tk_glpi_account_0;
        $petition->tk_gitlab_account_0        = $request->tk_gitlab_account_0;
        $petition->tk_jira_account_0          = $request->tk_jira_account_0;
        $petition->tk_da_account_0            = $request->tk_da_account_0;

        $petition->tk_nodo_0                  = $request->tk_nodo_0;
        $petition->tk_internet_0              = $request->tk_internet_0;
        $petition->tk_ip_0                    = $request->tk_ip_0;
        $petition->tk_vpn_0                   = $request->tk_vpn_0;

        $petition->status            = 0;

        $petition->startTime         = time();
        $petition->fileID            = auth()->user()->id.$petition->startTime;


        $petition->save();


        $petitions = Petition::all();
        return view('petitions/index', compact('petitions'));

    }

    public function show($id)
    {
        $petition = Petition::find($id);
        $collaborator = Collaborator::find($id);

        return view('collaborator/petition/show', compact('petition', 'collaborator'));
    }

    public function update (Request $request, $id)
    {

        $equipment = Equipment::all();
        $petition = Petition::findOrFail($id);

        $petition->nodo              = $request->nodo;
        $petition->vpn               = $request->vpn;
        $petition->ip                = $request->ip;
        $petition->internet          = $request->internet;

        $petition->account_gitlab    = $request->account_gitlab;
        $petition->account_glpi      = $request->account_glpi;
        $petition->account_jira      = $request->account_jira;
        $petition->account_da        = $request->account_da;

        $petition->access_project    = $request->access_project;

        $petition->tk_glpi_account_1          = $request->tk_glpi_account_1;
        $petition->tk_gitlab_account_1        = $request->tk_gitlab_account_1;
        $petition->tk_jira_account_1          = $request->tk_jira_account_1;
        $petition->tk_da_account_1            = $request->tk_da_account_1;

        $petition->tk_nodo_1                  = $request->tk_nodo_1;
        $petition->tk_internet_1              = $request->tk_internet_1;
        $petition->tk_ip_1                    = $request->tk_ip_1;
        $petition->tk_vpn_1                   = $request->tk_vpn_1;

        $petition->tk_glpi_account_0          = $request->tk_glpi_account_0;
        $petition->tk_gitlab_account_0        = $request->tk_gitlab_account_0;
        $petition->tk_jira_account_0          = $request->tk_jira_account_0;
        $petition->tk_da_account_0            = $request->tk_da_account_0;

        $petition->tk_nodo_0                  = $request->tk_nodo_0;
        $petition->tk_internet_0              = $request->tk_internet_0;
        $petition->tk_ip_0                    = $request->tk_ip_0;
        $petition->tk_vpn_0                   = $request->tk_vpn_0;

        $petition->status            = 1;

        $petition->save();

        $petition = Petition::find($id);
        $collaborator = Collaborator::find($id);

        return view('collaborator/petition/showPetition', compact('petition', 'collaborator'));
    }

    public function showPetition($id)
    {

        $equipments   = Equipment::all();
        $petition     = Petition::find($id);
        $collaborator = Collaborator::find($id);

        return view('collaborator/petition/showPetition', compact('petition', 'collaborator','equipments'));
    }


}
