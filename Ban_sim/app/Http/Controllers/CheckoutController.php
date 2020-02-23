<?php

namespace App\Http\Controllers;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Category;
use App\Sim;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = Cart::content();
        foreach ($cart as $item)
        {
        $user = User::find($item->id);
        }
        return view('BanSim.catalog.checkout',compact('user'));
    }
    public function  checkout_save(Request $request)
    {
        $order = new Order();
        $order->user_name = $request->input('name');
        $order->order_prices  = $request->input('price');
        $order->order_product = \request('product_name');
        $order->quantity = \request('qty');
        $order->phone = \request('phone');
        $order->address = \request('address');
        $order->totals = \request('total');
        $order->user_id = \request('user_id');


        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $order->order_image = $image;
        }
        $order->save();
        $rowId = \request('rowId');
        Cart::update($rowId,0);
        $sims = Sim::paginate(6);
//        $cart = \request('rowId');
        Session::flash('success', '成功した購入');
        return view('BanSim.catalog.shop',compact('sims'));
//        return redirect()->route('destroy.checkout',compact('cart'));
    }

}
