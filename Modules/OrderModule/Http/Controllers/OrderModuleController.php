<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use JWTAuth;
use Modules\OrderModule\Entities\Order;
use Modules\OrderModule\Entities\OrderItem;
use Modules\OrderModule\Entities\Cart;
use Modules\ProductModule\Entities\Product;

class OrderModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $newOrders=Order::with('user')->where('order_status_id','0')->get();
        $confirmed = Order::with('user')->where('order_status_id','1')->get();
        $shipped = Order::with('user')->where('order_status_id','2')->get();
        return view('ordermodule::index',compact(['newOrders','confirmed','shipped']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ordermodule::create');
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
        return view('ordermodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('ordermodule::edit');
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
        $order=Order::find($id)->delete();
        return redirect('/dashboard/order/');
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required',
            'price'=>'required'
        ]);
        $user = JWTAuth::toUser(JWTAuth::getToken());
        $cart = Cart::where(['product_id'=>$request->product_id,"user_id"=>$user->id])->first();
        if(!$cart){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->price = $request->price;
            $cart->save();
        }else{
            $cart->user_id = $user->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->price = $request->price;
            $cart->update();
        }
        
        
        if($cart){
            return response()->json('added to cart success',200);
        }else{
            return response()->json('added to cart faild',400);
        }


    }

    public function deleteCart($id)
    {
        $item = Cart::find($id)->delete();
        $items = Cart::all();
        foreach($items as $item){
            $product=Product::find($item->product_id);
            $item->product = $product->name;
        }
        return $items;
    }

    public function getCart()
    {
        $items = Cart::all();
        foreach($items as $item){
            $product=Product::find($item->product_id);
            $item->product = $product->name;
        }
        return $items;
    }

    public function checkout(Request $request)
    {
        $user = JWTAuth::toUser(JWTAuth::getToken());
        $request->validate([
            'shipping_method_id'=>'required',
            'payment_method_id'=>'required',
            'governrate_id'=>'required',
            'address'=>'required|string',
            'total_price'=>'required',
            
        ]);
        $order = new Order();
        $order->shipping_method_id = $request->shipping_method_id;
        $order->payment_method_id = $request->payment_method_id;
        $order->governrate_id = $request->governrate_id;
        $order->address = $request->address;
        $order->total_price = $request->total_price;
        $order->order_status_id = 0;
        $order->user_id = $user->id;
        $order->save();
        //$order_items = Cart::where('user_id',$user->id)->get();
        $order_items = $request->order_items;
        foreach($order_items as $item){
            
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $item["product_id"];
            $order_item->quantity = $item["quantity"];
            $order_item->price = $item["price"];
            $order_item->save();
            $item->delete();
        }

        return response()->json('order added successfully',200);
    }

    public function updateStatus($order_id,$status_id)
    {
        $order=Order::find($order_id);
        $order->order_status_id = $status_id;
        $order->update();
        return redirect('/dashboard/order/');
    }
}
