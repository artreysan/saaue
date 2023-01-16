<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\Location;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use App\Http\Controllers\save;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enterprises   = Enterprise::all();
        $locations     = Location::all();
        $roles         = Role::all();
        $rols          = Rol::all();

        return view('user/create', compact('enterprises','locations','roles','rols'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store (Request $request)
    {

        $user = new User();

        $user->name               = $request->name;
        $user->apellido_paterno   = $request->apellido_paterno;
        $user->apellido_materno   = $request->apellido_materno;
        $user->email              = $request->email;
        $user->role_id            = $request->role_id;
        $user->password           = Hash::make($request->password);
        $user->enterprise_id      = $request->enterprise_id;
        $user->rol_id             = $request->rol_id;
        $user->location_id        = $request->location_id;


        $user->save();

        $users = User::all();

        return view('user/index', compact('users'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
