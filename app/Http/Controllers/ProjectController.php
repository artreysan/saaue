<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Database;
use App\Models\Enterprise;
use App\Models\Collaborator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $collaborators = Collaborator::all();
        $enterprises = Enterprise::all();
        $databases = Database::all();
        $users = User::all();

        $project = new Project();
        return view('projects/create', compact('collaborators', 'enterprises', 'users', 'databases' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return view('equipment/index', compact('equipments', 'enterprises'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
