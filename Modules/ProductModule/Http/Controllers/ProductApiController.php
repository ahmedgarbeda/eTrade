<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Transformers\ProductResource;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() : ProductResource
    {
        $products = Product::where('is_active' ,1)->with('photo')->get();
        return new ProductResource($products);
        //http://127.0.0.1:8000/api/productmodule/product
    }


}
