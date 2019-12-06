<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Http\Requests\CreateCategoryRequest;


class CategoryModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('productmodule::category.index', ['categories' => $categories]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
//        return view('productmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
      return redirect('/productmodule/category');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
//        return view('productmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('productmodule::category.edit',
        ['category'=> $category]);
//        return view('productmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect('/productmodule/category');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $products =  $category->products()->where('category_id' , $category->id)->get();
            if ($products){
                foreach ($products as $product){
                    if($product->photo){
                    echo $product->photo->path;
                    unlink(public_path() . $product->photo->path);
                }
            }
        }
            $category->delete();
        return redirect('/productmodule/category');
    }
}
