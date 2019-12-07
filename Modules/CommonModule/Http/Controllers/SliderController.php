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
        return view('commonmodule::layouts.slider', ['sliders' => $slider]);
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
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => ['required', 'image']
        ]);
        $imagePath = request('image')->store('uploads/slider', 'public');
        \Modules\CommonModule\Entities\Slider::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath
        ]);

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
        return view('commonmodule::layouts.edit', ['sliders' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => ['required', 'image']
        ]);
        var_dump($data);
        $imagePath = request('image')->store('uploads/slider', 'public');
        \Modules\CommonModule\Entities\Slider::where('id', $id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath
        ]);

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
