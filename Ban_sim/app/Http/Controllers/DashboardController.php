<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Post;
use App\Sim;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {

        $sims = Sim::all();
        $categorys = Category::all();
        $orders = Order::all();
        $users = User::all();

        $total = $orders->sum('order_prices');

        return view('index', compact('sims', 'categorys', 'orders', 'users', 'total'));
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

        return view('dashboard.table3', compact('orders'));

    }
    public function table4()
    {
        $post = Post::all();

        return view('dashboard.crudPOST', compact('post'));

    }

    public function table3Edit(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        return view('dashboard.table3Edit', compact('order'));
    }


    public function table3Update(Request $request)
    {
        $id = \request('order_id');
        $order = Order::findOrFail($id);

        $order->user_name = $request->input('user_name');
        $order->order_prices = $request->input('order_prices');
        $order->order_product = $request->input('order_product');
        $order->quantity = $request->input('quantity');
        $order->totals = $request->input('totals');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        if ($request->hasFile('order_image')) {
            $image = base64_encode(file_get_contents($request->file('order_image')));
            $order->order_image = $image;
        }
        $order->status = $request->input('status');
        $order->user_id = $request->input('user_id');;
        $order->save();
        Session::flash('success', '新しい成功を生み出す');
        return redirect()->route('dashboard.table3');
    }


    public function table3Delete()
    {

    }
}
