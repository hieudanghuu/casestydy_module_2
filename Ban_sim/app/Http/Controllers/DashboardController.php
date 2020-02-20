<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Sim;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $sims = Sim::all();
        $categorys = Category::all();
        $orders = Order::all();
        $users = User::all();

        $total = $orders->sum('order_prices');
//        foreach ($order as $prices){
//           $total =  $prices->order_prices;
//           $total += $total;
//        }
        return view('index',compact('sims','categorys','orders','users','total'));
    }
}
