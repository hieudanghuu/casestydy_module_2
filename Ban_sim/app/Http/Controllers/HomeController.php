<?php

namespace App\Http\Controllers;

use App\Order;
use App\Sim;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        $sim = Sim::all();
        return view('auth.login',compact('sim'));
    }

    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->delete();
        Session::flash('success', '削除成功');

        return redirect()->back();
    }
}
