<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Sim;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
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
        $posts = Post::paginate(3);
        $category = Category::all();

        return view('BanSim.index',compact('sims','user','posts','category'));
    }
    public function post(){
        $posts = Post::all();
        return view('BanSim.catalog.post',compact('posts'));
    }

    public function cart(){
        $carts = Cart::content();
        $cartsId = array_column(array_values($carts->toArray()), 'id');
        return view('BanSim.catalog.cart',compact('cartsId'));
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
