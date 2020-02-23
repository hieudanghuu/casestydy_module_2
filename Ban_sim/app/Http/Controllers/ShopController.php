<?php

namespace App\Http\Controllers;

use App\Sim;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show(){
        $sims = Sim::whereNull('deleted_at')->paginate(6);
        return view('BanSim.catalog.shop',compact('sims'));
    }

    public function index(){
        $sims = Sim::whereNull('deleted_at')->paginate(6);
        $user = User::all();
        return view('BanSim.index',compact('sims','user'));
    }

    public function cart(){
        return view('BanSim.catalog.cart');
    }

    public function checkout(){
        return view('BanSim.catalog.checkout');
    }

    public function contact(){
        return view('BanSim.catalog.contact');
    }

    public function product(){
        return view('BanSim.catalog.Product_Order');
    }
}
