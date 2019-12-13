<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


use Modules\ProductModule\Entities\Offer;
use Modules\ProductModule\Transformers\OfferResource;

class OfferApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $offers = Offer::all();
        return new OfferResource($offers);
        //http://127.0.0.1:8000/api/productmodule/offer
    }



}
