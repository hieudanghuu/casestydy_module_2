<?php

namespace App\Http\Controllers;

use App\Category;
use App\Sim;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level', '<', '2')->paginate(5);
        return view('dashboard.table2', compact('users'));
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.view.userView', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.editForm.userEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $atribute = $request->all();
        if ($request->hasFile('images')) {
            $image = base64_encode(file_get_contents($request->file("images")));
            $atribute['avatar'] = "data:image/jpg;base64," . $image;
        }
        if ($atribute['password'] == '******') {
            $atribute['password'] = $atribute['password1'];

        } else {
            $atribute['password'] = Hash::make($atribute['password']);
        }

        $user->update($atribute);
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('dashboard.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->back();
    }

    public function show_deletad_at()
    {
        $users = User::onlyTrashed()->paginate(10);
        return view('dashboard.deleteForm.users', compact('users'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        Session::flash('success', 'Khôi phục thành công');
        return redirect()->route('dashboard.users');
    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete();
        Session::flash('success', 'Xóa vĩnh viễn thành công');
        return redirect()->back();
    }
}
