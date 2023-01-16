<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index(){
        $enterprises = Enterprise::all();
        return view('enterprise/index', compact('enterprises'));
    }

    public function create()
    {
        return view('enterprise/create');
    }

    public function store (Request $request)
    {

        $enterprise = new Enterprise();

        $enterprise->nombre    = $request->nombre;
        $enterprise->contrato  = $request->contrato;

        $enterprise->save();

        $enterprises = Enterprise::all();

        return view('enterprise/index', compact('enterprises'));
    }
}
