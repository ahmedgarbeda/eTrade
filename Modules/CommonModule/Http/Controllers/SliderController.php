<?php

namespace Modules\CommonModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Entities\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('commonmodule::slider', ['sliders' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        // return view('commonmodule::create');
        echo "ok c";
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $slider= $request->all();

        if ($request->file('image')){
            $photo = time().'.'.$request->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('images'), $photo);

            $slider['image']=$photo;
        }else{
            $slider['image']='';
        }

        $data = Slider::create($slider);

        return redirect('dashboard/slider');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        // return view('commonmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return $slider;
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $slider=Slider::find($id);
        $data=$request->all();
        if ($request->file('image')){
            $photo = time().'.'.$request->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('images'), $photo);

            $data['image']=$photo;
        }
        $slider->update($data);

        return redirect('dashboard/slider');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Slider::where('id', $id)->delete();
        return redirect('dashboard/slider');
    }
}
