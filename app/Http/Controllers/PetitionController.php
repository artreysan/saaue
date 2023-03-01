<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\Petition;
use App\Models\Equipment;
use App\Models\Enterprise;
use App\Models\Collaborator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\PetitionAcceptedMailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PetitionController extends Controller
{
    public function index(){

        if(auth()->user()->role_id == 3){
            $petitions = Petition::where('user_id','=', auth()->user()->id)->get();
        }
        else{
            $petitions = Petition::all();
        }
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

    public function updateFile(Request $request, $id)
    {
        $equipment = Equipment::all();
        $collaborator = Collaborator::find($id);
        $petition = Petition::findOrFail($id);
        $archivo = $request->file('archivo');



        if($archivo != null){
            $request->validate([
            'archivo' => 'required|file|mimes:pdf|max:4096',
             ]);
            $fileName = $petition->fileID."_sign.pdf";

            $archivo->storeAs('', $fileName,'public');

            $pdfCreated = storage_path('app/public/'.$fileName);
            $pdfContent = file_get_contents($pdfCreated);
            $pdfBase64 = base64_encode($pdfContent);
            $petition->base64_signedPetition = $pdfBase64;
            $petition->save();
        }

        return view('collaborator/petition/showPetition', compact('petition', 'collaborator'));
    }

    public function generatePDF($petition)
    {
        $path = storage_path('pdf/');
        $user = Collaborator::find($petition->user_id);
        $collaborator = Collaborator::find($petition->collaborator_id);
        $enterprise = Enterprise::find($user->enterprise_id);
        $rol = Rol::find($collaborator->rol_id);
        $rolAut = Rol::find($petition->user->rol_id);
        $pdf_name = $petition->fileID.'.pdf';

        if($petition->equipment_id != null){
            $equipment = Equipment::find( $petition->equipment_id);
            $pdf = Pdf::loadView('petitions.pdf.sau', compact('petition', 'user', 'collaborator', 'enterprise', 'rol', 'rolAut','equipment'));
        }else{
            $pdf = Pdf::loadView('petitions.pdf.sau', compact('petition', 'user', 'collaborator', 'enterprise', 'rol', 'rolAut'));
        }

        $pdf->save($path . '/' . $pdf_name);
        $pdfCreated = storage_path('pdf/'.$pdf_name);
        $pdfContent = file_get_contents($pdfCreated);
        $pdfBase64 = base64_encode($pdfContent);


        return $pdfBase64;
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

        $petition->a_nodo                     = $request->a_nodo;
        $petition->a_internet                 = $request->a_internet;
        $petition->a_ip                       = $request->a_ip;
        $petition->tk_vpn_0                   = $request->tk_vpn_0;

        $petition->a_account_gitlab           = $request->a_account_gitlab;
        $petition->a_account_glpi             = $request->a_account_glpi;
        $petition->a_account_jira             = $request->a_account_jira;
        $petition->a_account_da               = $request->a_account_da;


        $petition->status            = 0;

        $petition->startTime         = time();
        $petition->fileID            = auth()->user()->id.$petition->startTime;

        $petition->base64_petition = $this->generatePDF($petition);


        $petition->save();


        $petitions = Petition::all();
        if(auth()->user()->role_id == 1){
            $collaborators = Collaborator::all();
        }
        else{
            $collaborators     = Collaborator::where('id_user', auth()->user()->id)->get();
        }
         return view('collaborator/index', compact('collaborators'));
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
        $collaborator = Collaborator::find($id);
        $petition = Petition::findOrFail($id);
        // Validate the file
        $petition->nodo              = $request->nodo;
        $petition->vpn               = $request->vpn;
        $petition->ip                = $request->ip;
        $petition->internet          = $request->internet;

        $petition->account_gitlab    = $request->account_gitlab;
        $petition->account_glpi      = $request->account_glpi;
        $petition->account_jira      = $request->account_jira;
        $petition->account_da        = $request->account_da;

        $petition->tk_glpi_account_1          = $request->tk_glpi_account_1;
        $petition->tk_gitlab_account_1        = $request->tk_gitlab_account_1;
        $petition->tk_jira_account_1          = $request->tk_jira_account_1;
        $petition->tk_da_account_1            = $request->tk_da_account_1;

        $petition->tk_nodo_1                  = $request->tk_nodo_1;
        $petition->tk_internet_1              = $request->tk_internet_1;
        $petition->tk_ip_1                    = $request->tk_ip_1;
        $petition->tk_vpn_1                   = $request->tk_vpn_1;

        $petition->a_nodo                     = $request->a_nodo;
        $petition->a_internet                 = $request->a_internet;
        $petition->a_vpn                      = $request->a_vpn;
        $petition->a_ip                       = $request->a_ip;

        $petition->a_account_glpi             = $request->a_account_glpi;
        $petition->a_account_gitlab           = $request->a_account_gitlab;
        $petition->a_account_jira             = $request->a_account_jira;
        $petition->a_account_da               = $request->a_account_da;

        $petition->tk_glpi_account_0          = $request->tk_glpi_account_0;
        $petition->tk_gitlab_account_0        = $request->tk_gitlab_account_0;
        $petition->tk_jira_account_0          = $request->tk_jira_account_0;
        $petition->tk_da_account_0            = $request->tk_da_account_0;

        $petition->tk_nodo_0                  = $request->tk_nodo_0;
        $petition->tk_internet_0              = $request->tk_internet_0;
        $petition->tk_ip_0                    = $request->tk_ip_0;
        $petition->tk_vpn_0                   = $request->tk_vpn_0;

        $petition->status                     = 1;


        $petition->save();

        $petition = Petition::find($id);
        $collaborator = Collaborator::find($id);

        return back()->with('success', 'Archivo subido con éxito');
    }

     public function validatePetition (Request $request, $id)
    {

        $equipment = Equipment::all();
        $collaborator = Collaborator::find($id);
        $petition = Petition::findOrFail($id);

        // Validate the file
        $petition->nodo              = $request->nodo;
        $petition->vpn               = $request->vpn;
        $petition->ip                = $request->ip;
        $petition->internet          = $request->internet;

        $petition->account_gitlab    = $request->account_gitlab;
        $petition->account_glpi      = $request->account_glpi;
        $petition->account_jira      = $request->account_jira;
        $petition->account_da        = $request->account_da;

        $petition->tk_glpi_account_1          = $request->tk_glpi_account_1;
        $petition->tk_gitlab_account_1        = $request->tk_gitlab_account_1;
        $petition->tk_jira_account_1          = $request->tk_jira_account_1;
        $petition->tk_da_account_1            = $request->tk_da_account_1;

        $petition->tk_nodo_1                  = $request->tk_nodo_1;
        $petition->tk_internet_1              = $request->tk_internet_1;
        $petition->tk_ip_1                    = $request->tk_ip_1;
        $petition->tk_vpn_1                   = $request->tk_vpn_1;

        $petition->a_nodo                     = $request->a_nodo;
        $petition->a_internet                 = $request->a_internet;
        $petition->a_vpn                      = $request->a_vpn;
        $petition->a_ip                       = $request->a_ip;

        $petition->a_account_glpi             = $request->a_account_glpi;
        $petition->a_account_gitlab           = $request->a_account_gitlab;
        $petition->a_account_jira             = $request->a_account_jira;
        $petition->a_account_da               = $request->a_account_da;

        $petition->tk_glpi_account_0          = $request->tk_glpi_account_0;
        $petition->tk_gitlab_account_0        = $request->tk_gitlab_account_0;
        $petition->tk_jira_account_0          = $request->tk_jira_account_0;
        $petition->tk_da_account_0            = $request->tk_da_account_0;

        $petition->tk_nodo_0                  = $request->tk_nodo_0;
        $petition->tk_internet_0              = $request->tk_internet_0;
        $petition->tk_ip_0                    = $request->tk_ip_0;
        $petition->tk_vpn_0                   = $request->tk_vpn_0;

        $petition->status                     = 3;


        $petition->save();

        $petition = Petition::find($id);
        $collaborator = Collaborator::find($id);

        return back()->with('success', 'Archivo subido con éxito');

    }

    public function verifyStatus($petition){

        $count = $petition->account_glpi +
                $petition->account_gitlab +
                $petition->account_jira +
                $petition->account_da +
                $petition->nodo +
                $petition->internet +
                $petition->vpn +
                $petition->ip;

        ($petition->account_glpi == 1 && $petition->a_account_glpi!=null) ? $count-- : 0;
        ($petition->account_gitlab == 1 && $petition->a_account_gitlab!=null) ? $count-- : 0;
        ($petition->account_jira == 1 && $petition->a_account_jira!=null) ? $count-- : 0;
        ($petition->account_da == 1 && $petition->a_account_da!=null) ? $count-- : 0;

        ($petition->nodo == 1 && $petition->a_nodo!=null) ? $count-- : 0;
        ($petition->internet == 1 && $petition->a_internet!=null) ? $count-- : 0;
        ($petition->vpn == 1 && $petition->a_vpn!=null) ? $count-- : 0;
        ($petition->ip == 1 && $petition->a_ip!=null) ? $count-- : 0;

        if($count == 0){
            $petition->status = 2;
        }
    }

    public function sendEmail($petition_id,$collaborator_id){
        //Mail::to()->send($correo->attach(storage_path('pdf/'.$solicitud->fileID.'_sau.pdf')));

        $collaborator = Collaborator::find($collaborator_id);
        $petition     = Petition::find($petition_id);
        $equipments   = Equipment::all();


        $maildata = [
            'title' => 'Solicitud de Servicios SICT',
        ];

        Mail::to(auth()->user()->email)->send(new PetitionAcceptedMailable($maildata));
        Mail::to($collaborator->email)->send(new PetitionAcceptedMailable($maildata));

        return back()->withInput()->with('mensaje', 'Ocurrió un error al procesar el formulario');

    }


    public function showPetition($id)
    {

        $equipments   = Equipment::all();
        $petition     = Petition::find($id);
        $collaborator = Collaborator::find($id);
        $this->verifyStatus($petition);


        return view('collaborator/petition/showPetition', compact('petition', 'collaborator', 'equipments'));
    }



    public function showPDF($id, $FileID)
    {

        $petition = Petition::find($id);
        $pdfContent = base64_decode($petition->base64_petition);
        $pdf_name = $FileID.'.pdf';
        file_put_contents(storage_path('pdf/'.$pdf_name), $pdfContent);

        return response()->file(storage_path('pdf/' . $FileID . '.pdf'));
    }

    public function showPDFSign($id, $FileID)
    {

        $petition = Petition::find($id);
        $pdfContent = base64_decode($petition->base64_signedPetition);
        $pdf_name = $FileID.'.pdf';
        file_put_contents(storage_path('pdf/'.$pdf_name), $pdfContent);
        return response()->file(storage_path('pdf/' . $FileID . '.pdf'));
    }




}
