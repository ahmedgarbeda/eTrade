<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Modules\AdminModule\Http\Requests\AdminRequest;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Entities\Admin;
use Modules\AdminModule\Entities\Role;

class AdminModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //return view('adminmodule::index');
        $admins = Admin::with('role')->get();
        return view('adminmodule::admin/index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $admin=new Admin;
        $roles= Role::all();
        return view('adminmodule::admin/create',compact('admin','roles'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'name'=>'required|string|unique',
        //     'email'=>'required | unique | email',
        //     'password'=>'required | string',
        //     'address'=>'required | string'
        // ]);
        // dd($request);
        // $admin=Admin::create($request['admin']);
        // //$admin->phones->create($request['phones']);
        //return ;

        //dd($request["admin"]);
        $admin=Admin::create($request->all());
//        $admin->phones->create($request['phones']);
        return redirect('/dashboard/admin');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //return view('adminmodule::show');
        $admin= Admin::where('id',$id)->with('phones','role')->first();
        return $admin;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();
        return view('adminmodule::admin/create',compact('admin','roles'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $admin= Admin::find($id);
        $admin->update($request->all());
        return redirect('/dashboard/admin');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $admin= Admin::findOrFail($id)->delete();
        return redirect('/dashboard/admin');
    }
}
