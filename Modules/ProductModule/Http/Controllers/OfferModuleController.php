<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\Offer;
use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Http\Requests\CreateOfferRequest;

class OfferModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {


        $offers = Offer::all();
        return view('productmodule::offer.index' , ['offers' => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {   $products = Product::all();
        $productArr = array();
        foreach ($products as $product){
            $productArr[$product->id] = $product->name;
        }

        $categories = Category::all();
        $categoryArr = array();
        foreach ($categories as $category){
            $categoryArr[$category->id] = $category->name ;
        }
        return view('productmodule::offer.create',
            ['products' => $productArr , 'categories' => $categoryArr] );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateOfferRequest $request)
    {
        $offer = new Offer();
        $offer->offer_name = $request->get('offer_name');
        $offer->start_date = $request->get('start_date');
        $offer->end_date = $request->get('end_date');
        $offer->category_id = $request->get('category_id');

        $product = Product::find($request->input('product_id'));
        $product->offer()->save($offer);
        return redirect('/productmodule/offer')->with('message' ,"Offer Added Successfully");
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
        $products = Product::all();
        $productArr = array();
        foreach ($products as $product){
            $productArr[$product->id] = $product->name;
        }

        $categories = Category::all();
        $categoryArr = array();
        foreach ($categories as $category){
            $categoryArr[$category->id] = $category->name ;
        }

        $offer = Offer::find($id);
        return view('productmodule::offer.edit' ,
        ['offer' => $offer , 'categories' => $categoryArr , 'products' => $productArr]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateOfferRequest $request, $id)
    {

        $offer = Offer::find($id);
        $offer->offer_name = $request->get('offer_name');
        $offer->start_date = $request->get('start_date');
        $offer->end_date = $request->get('end_date');
        $offer->category_id = $request->get('category_id');

        $product = Product::find($request->input('product_id'));
        $product->offer()->save($offer);
        return  redirect('productmodule/offer')->with('message' ,"Offer Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return  redirect('productmodule/offer')->with('message' ,"Offer Deleted Successfully");

    }
}
