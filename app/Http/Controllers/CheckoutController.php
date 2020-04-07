<?php

namespace App\Http\Controllers;

use App\Order;
use App;
use App\Product_Order;
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
        foreach ($cart as $item) {
            $user = User::find($item->id);
        }
        return view('BanSim.catalog.checkout');
    }

    public function checkout_save(Request $request)
    {
        $cart = Session::get('cart')["default"]->toArray();
        $order = new Order();

        $order->user_name = $request->input('name');
        $order->note = \request('note');
        $order->totals = \request('total');
        $order->phone = \request('phone');
        $order->address = \request('address');
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $order->order_image = $image;
        }
        $order->user_id = \request('user_id');
        $order->save();
        foreach ($cart as $key => $value) {

            $product_order = new Product_Order();
            $product_order->prices = $value['price'];
            $product_order->product = $value['name'];
            $product_order->quantity = $value['qty'];
            $product_order->image = $value['options']['image'];
            $product_order->sim_id = $value['id'];
            $product_order->order_id = $order->order_id;
            $product_order->save();
            $rowId = $value['rowId'];
            Cart::update($rowId, 0);
        }
        Session::forget('cart');
        $sims = Sim::paginate(6);
        if(App::getlocale() == 'vi'){
            Session::flash('success', "Xác Nhận Đặt Hàng Thành Công");
        }else{
            Session::flash('success', "成功した購入");
        }
        return view('BanSim.catalog.shop', compact('sims'));
    }

}
