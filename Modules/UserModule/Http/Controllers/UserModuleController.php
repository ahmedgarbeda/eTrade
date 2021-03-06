<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\CommonModule\Entities\Governrate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('usermodule::index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('usermodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('usermodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $govs= Governrate::all();
        return view('usermodule::edit',compact('user','govs'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'governrate_id' => 'required|numeric',
            'address' => 'required|string|min:15',
            'phone' => 'required'
        ]);
        if(!$request->password)
        $data=$request->except(['password','_method','_token']);
        else 
        $data=$request->except(['_method','_token']);
        $user = User::find($id);
        
        $user->update($data);

        return redirect('/dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect('/dashboard/users');
    }

    public function approve($id)
    {
        $user=User::find($id);
        $user->status=1;
        $user->update();
        return redirect('/dashboard/users');
    }

    

    public function getAuthUser()
    {
        return $user = JWTAuth::parseToken()->authenticate();
    }
}


