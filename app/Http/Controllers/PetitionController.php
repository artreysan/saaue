<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\Petition;
use App\Models\Equipment;
use App\Models\Enterprise;
use App\Models\Collaborator;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function generatePDF($petition)
    {
        $path = storage_path('pdf/');
        $user = Collaborator::find($petition->user_id);
        $collaborator = Collaborator::find($petition->collaborator_id);
        $enterprise = Enterprise::find($user->enterprise_id);
        $rol = Rol::find($collaborator->rol_id);
        $rolAut = Rol::find($petition->user->rol_id);
        $pdf_name = $petition->fileID . '_sau.pdf';

        if($petition->equipment_id != null){
            $equipment = Equipment::find( $petition->equipment_id);
            $pdf = Pdf::loadView('petitions.pdf.sau', compact('petition', 'user', 'collaborator', 'enterprise', 'rol', 'rolAut','equipment'));
        }else{
            $pdf = Pdf::loadView('petitions.pdf.sau', compact('petition', 'user', 'collaborator', 'enterprise', 'rol', 'rolAut'));
        }

        $pdf->save($path . '/' . $pdf_name);
        $pdf->setPaper('a4');
        return $pdf->stream($pdf_name);
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

        $this->generatePDF($petition);

        $petition->save();


        $petitions = Petition::all();
        return view('petitions/index', compact('petitions'));

    }

    public function show($id)
    {
        $petition = Petition::find($id);
        $collaborator = Collaborator::find($id);
        $equipments = Equipment::where('collaborator_id','=',$collaborator->id)->get();

        return view('collaborator/petition/show', compact('petition', 'collaborator','equipments'));
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
