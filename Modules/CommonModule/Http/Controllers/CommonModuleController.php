<?php

namespace Modules\CommonModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Entities\Settings;

class CommonModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('commonmodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('commonmodule::create');
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
        return view('commonmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('commonmodule::edit');
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
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function settings()
    {
        $settings = Settings::first();
        if (!$settings){
            $settings=new Settings;
        }
        
        return view('commonmodule::settings',compact('settings'));
    }

    public function setSettings(Request $request)
    {
        $request->validate([
            'address'=>'required|string|min:6',
            'email' => 'required|email',
            'phone'=> 'required|string',
            'youtube' => 'string',
            'facebook' => 'string',
            'twitter' => 'string',
            'aboutus' => 'string| min:50'
        ]);

        $settings = Settings::first();
        $data=$request->all();
        if ($settings){
            if ($request->file('aboutphoto')){
                $aboutPhoto = time().'.'.$request->file('aboutphoto')->getClientOriginalExtension();
                request()->aboutphoto->move(public_path('images'), $aboutPhoto);
                $data['aboutphoto']=$aboutPhoto;
            }
            
            if($request->file('logo')){
                $logo = 'logo.png';
                request()->logo->move(public_path('images'), $logo);
                $data['logo'] = $logo;
            } 
            
            $settings->update($data);
            return redirect('/dashboard/settings');
        }else{
            
            $settings = $request->all();
            if ($request->file('aboutphoto')){
                $aboutPhoto = time().'.'.$request->file('aboutphoto')->getClientOriginalExtension();
                request()->aboutphoto->move(public_path('images'), $aboutPhoto);

                $settings['aboutphoto']=$aboutPhoto;
            }else{
                $settings['aboutphoto']='';
            }
            
            if ($request->file('logo')){
                $logo = time().'.'.$request->file('logo')->getClientOriginalExtension();
                request()->logo->move(public_path('images'), $logo);
                $settings['logo'] = $logo;

            }else{
                $settings['logo'] = '';
            }
            
           // dd($settings);
            $data=Settings::create($settings);
            return redirect('/dashboard/settings');
        }

    }

    public function loginView()
    {
        return view('auth.login');
    }

}

