<?php

namespace App\Http\Controllers;

use App\Category;
use App\Sim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SearchController extends Controller
{

    public function search(Request $request)
    {
        $key = $request->key;
        if(is_numeric($key)){
            $search_sim = Sim::where('sim_price', '>',  $key)->get();
        }else{
            $search_sim = Sim::where('sim_name', 'like', '%' . $key . '%')->get();
        }
        return view('BanSim.catalog.search', compact('search_sim', 'key'));
    }
    public function search_name($key)
    {

        if ($key == 'docomo') {
            $search_sim = Sim::where('sim_category_id', '=',1)->get();
        }else if( $key == 'softbank'){
            $search_sim = Sim::where('sim_category_id', '=',2)->get();
        }else {
            $search_sim = Sim::where('sim_category_id', '=',3)->get();
        }
        return view('BanSim.catalog.search', compact('search_sim', 'key'));
    }

    public function search_price(Request $request)
    {
        if ($request->value1 > $request->value2){
             Session::flash('danger', '間違った価格');
            return redirect()->back();
        }else {
            $search_sim = Sim::whereBetween('sim_price', [$request->value1, $request->value2])->get();;
        }
        return view('BanSim.catalog.search', compact('search_sim'));
    }


}
