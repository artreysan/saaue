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
        $users    = User::all();
        $projects = Project::all();
        return view('projects/index', compact('projects','users'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $project = Project::find($id);
        $databases = Database::all();
        $databasesid = Database::where('project_id', $id)->get(['id', 'name', 'dbms', 'so','criticality', 'enviroment','ip','port','project_id']);
        return view('projects/show', compact('project','user','databases','databasesid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $collaborators = Collaborator::all();
        $enterprises = Enterprise::all();
        $databases = Database::all();
        $databasesid = Database::where('project_id', $id)->get(['id', 'name', 'dbms', 'so','criticality', 'enviroment','ip','port','project_id']);
        $users = User::all();
        $project = Project::find($id);

        return view('projects/edit', compact('collaborators', 'enterprises', 'users', 'databases','project','databasesid'));
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
