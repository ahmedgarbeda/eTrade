<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Entities\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('adminmodule::roles',compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //return view('adminmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([ 'role' => 'required|string']);
        Role::create($request->all());
        return redirect('/dashboard/roles');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //return view('adminmodule::show');
        return  Role::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //return view('adminmodule::edit');
        return Role::find($id);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([ 'role' => 'required|string']);
        $role=Role::find($id);
        $role->update($request->all());
        return redirect('/dashboard/roles');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
         Role::find($id)->delete();
         return redirect('/dashboard/roles');
    }
}
