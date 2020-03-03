<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product_Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function all_show(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        $product_orders = Product_Order::all();
        $users = User::all();
        foreach ($users as $user){
            if ($user->id == $order->user_id){}
        }
        foreach ($product_orders as $product_order){
            if($product_order->order_id == $order->order_id){}
        }
        return view('dashboard.show_all', compact('order', 'product_order', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $product_order = Product_Order::findOrFail($order->order_id);
        $order->delete();
        $product_order->delete();
        Session::flash('success', '削除成功');
        return redirect()->back();
    }
}
