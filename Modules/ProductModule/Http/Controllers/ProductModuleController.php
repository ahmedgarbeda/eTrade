<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Entities\Admin;
use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\ProductPhotos;
use Modules\ProductModule\Transformers\ProductResource;
use Modules\ProductModule\Http\Requests\CreateProductRequest;
use Modules\ProductModule\Http\Requests\UpdateProductRequest;

use Symfony\Component\Process\Process;

class ProductModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $products = Product::all();
        return view('productmodule::product.index' , ['products' => $products] );

//        $product = Product::all();
//        //http://127.0.0.1:8000/productmodule/product
//        return ProductResource::collection($product);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $categoryArr = array();
        foreach ($categories as $category){
            $categoryArr[$category->id] = $category->name ;
        }
        $admins = Admin::all();
        $adminsArr = array();
        foreach ($admins as $admin){
            $adminsArr[$admin->id] = $admin->name ;
        }
        return view('productmodule::product.create' , ['categories' => $categoryArr , 'admins' => $adminsArr]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->admin_id = $request->input('admin_id');
        $currentCategory = $request->input('category_id') ;
        $product->is_active = Product::has('admin') ? 1 : 0 ;
        $category = Category::find($currentCategory);
        $category->products()->save($product);

        if ($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName() ;
            $file->move('productImages' , $name);
            $photo = new ProductPhotos();
            $photo->path = $name;
        }
        $product->photo()->save($photo);

        return  redirect('productmodule/product')->with('message' ,"Product Added Successfully");

//
//        if($product->save()){
//            return new ProductResource($product);
//        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        //http://127.0.0.1:8000/productmodule/product/1
        $product = Product::findOrFail($id);
        return new ProductResource($product);

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $categoryArr = array();
        foreach ($categories as $category){
            $categoryArr[$category->id] = $category->name ;
        }
        $admins = Admin::all();
        $adminsArr = array();
        foreach ($admins as $admin){
            $adminsArr[$admin->id] = $admin->name ;
        }
        $product = Product::find($id);
        return view('productmodule::product.edit',
        ['product' => $product , 'categories' => $categoryArr , 'admins' => $adminsArr]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->admin_id = $request->input('admin_id');
        $currentCategory = $request->input('category_id') ;
        $category = Category::find($currentCategory);
        $category->products()->save($product);

        if ($file = $request->file('photo')){
            $name = time().  $file->getClientOriginalName() ;
            $file->move('productImages' , $name);
            $photo = ProductPhotos::where('product_id' , $product->id )->first();
            unlink(  public_path() . $product->photo->path);
            $photo->path = $name;
            $product->photo()->save($photo);
        }
        return  redirect('productmodule/product')->with('message' ,"Product Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        if($product->photo){
            unlink(  public_path() . $product->photo->path);
        }
        $product->delete();
        return  redirect('productmodule/product')->with('message' ,"Product Deleted Successfully");

//        if ($product->delete()){
//            return new ProductResource($product);
//        }
    }


    public  function  approvment($id){
        $product = Product::find($id);
        if ($product->is_active == 0)
            $product->is_active = 1 ;
        else if ($product->is_active == 1){
            $product->is_active = 0 ;
        }
        $product->save();
        return  redirect('productmodule/product');
    }
}
