<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Post;
use App\Product_Order;
use App\Sim;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $sims = Sim::all();
        $categorys = Category::all();
        $orders = Order::all();
        $users = User::all();
        $product_order = Product_Order::all();
        $total = 0;
        foreach ($orders as $order) {
            if ($order->status == 0) {
                $a = $order->totals;
                $number = join(explode(',', $a));
                $total += (float)($number);
            }
        }
        foreach ($orders as $order) {
//            dd(Carbon::now()->month);
            if ($order->created_at->month == Carbon::now()->month) {
                $time = $order->count();
            }else {$time = 0;}
        }
        return view('index', compact('sims', 'categorys', 'orders', 'users', 'total', 'product_order','time'));
    }

    public function table()
    {
        $sims = Sim::whereNull('deleted_at')->paginate(5);
        $categories = Category::all();

        return view('dashboard.table1', compact('sims', 'categories'));

    }

    public function table2()
    {
        $users = User::where('level', '<', '2')->paginate(5);

        return view('dashboard.table2', compact('users'));

    }

    public function table3()
    {
        $orders = Order::all();
        $product_orders = Product_Order::all();

        return view('dashboard.table3', compact('orders', 'product_orders'));

    }

    public function table4()
    {
        $post = Post::all();

        return view('dashboard.crudPOST', compact('post'));

    }

    public function table3Edit(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        $product_orders = Product_Order::all();

        foreach ($product_orders as $product_order){
            if($product_order->order_id == $order->order_id){
                $product_order1[] = $product_order;
            }
        }
        return view('dashboard.table3Edit', compact('order', 'product_order1'));
    }


    public function table3Update(Request $request)
    {
        $id = \request('order_id');
        $order = Order::findOrFail($id);

        $order->user_name = $request->input('user_name');
        $order->totals = $request->input('totals');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        if ($request->hasFile('order_image')) {
            $image = base64_encode(file_get_contents($request->file('order_image')));
            $order->order_image = $image;
        }
        $order->status = $request->input('status');
        $order->user_id = $request->input('user_id');

        $product_orders = Product_Order::all();
        foreach ($product_orders as $product_order) {
            if ($product_order->user_id == $order->order_id) {
                $product_order->prices = $request->input('prices');
                $product_order->product = $request->input('product');
                $product_order->quantity = $request->input('quantity');
                if ($request->hasFile('image_product')) {
                    $image = base64_encode(file_get_contents($request->file('image_product')));
                    $product_order->image = $image;
                }
            }
        }
        $product_order->save();
        $order->save();
        Session::flash('success', '新しい成功を生み出す');
        return redirect()->route('dashboard.table3');
    }


    public function confirm($id)
    {
        $oder = Order::find($id);
        $oder->status = 0;
        $oder->save();
        return redirect()->route('dashboard');
    }
}
