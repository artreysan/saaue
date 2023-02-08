<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $petitions = Petition::all();
        return view('dashboard', compact('petitions'));
    }

}
