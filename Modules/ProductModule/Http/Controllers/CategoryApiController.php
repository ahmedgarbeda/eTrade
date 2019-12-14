<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Transformers\CategoryResource;
class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() : CategoryResource
    {
        $categories = Category::all();
        return new CategoryResource($categories);
        //http://127.0.0.1:8000/api/productmodule/category
    }


}
