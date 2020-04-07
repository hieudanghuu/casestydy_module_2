<?php

namespace App\Http\Controllers;

use App\Post;
use App\Post_tran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostTranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post_tran::where('locale', 'vi')->paginate(10);
        return view('dashboard.crudPOST', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.createForm.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->save();
        $atribute = $request->all();
        $image = base64_encode(file_get_contents($request->file("images")));
        $atribute['image'] = "data:image/jpg;base64," . $image;
        $atribute['post_id'] = $post->id;
        Post_tran::create($atribute);

        $atribute['locale'] = 'jp';
        $atribute['name'] = $request->namejp;
        $atribute['title'] = $request->titlejp;
        $atribute['content'] = $request->contentjp;
        Post_tran::create($atribute);
        Session::flash('success', ' Tạo mới thành công');
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post_tran $post_tran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_tran = Post_tran::withTrashed()->find($id);
        return view('dashboard.view.postView', compact('post_tran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post_tran $post_tran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_tran = Post_tran::find($id);
        $post_tranjp = Post_tran::find($id + 1);
        return view('dashboard.editForm.postEdit', compact('post_tran', 'post_tranjp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post_tran $post_tran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post_tran = Post_tran::find($id);
        $post_tranjp = Post_tran::find($id + 1);
        $atribute = $request->all();
        if ($request->hasFile('images')) {
            $image = base64_encode(file_get_contents($request->file("images")));
            $atribute['image'] = "data:image/jpg;base64," . $image;
        }
        $post_tran->update($atribute);
        $atribute['locale'] = 'jp';
        $atribute['name'] = $atribute['namejp'];
        $atribute['title'] = $atribute['titlejp'];
        $atribute['content'] = $atribute['contentjp'];
        $post_tranjp->update($atribute);
        Session::flash('success', ' Sửa thành công');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post_tran $post_tran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post_tran::find($id)->delete();
        Post_tran::find($id + 1)->delete();
        Session::flash('success', ' Xóa thành công');
        return redirect()->back();
    }
    public function show_deletad_at()
    {
        $post_tran = Post_tran::onlyTrashed()->where('locale', 'vi')->paginate(10);
        return view('dashboard.deleteForm.posts', compact('post_tran'));
    }

    public function restore($id)
    {
        Post_tran::withTrashed()->find($id)->restore();
        Post_tran::withTrashed()->find($id+1)->restore();
        Session::flash('success', 'Khôi phục thành công');
        return redirect()->route('posts.index');
    }

    public function forceDelete($id)
    {
        Post_tran::withTrashed()->find($id)->forceDelete();
        Post_tran::withTrashed()->find($id + 1)->forceDelete();
        Session::flash('success', 'Xóa vĩnh viễn thành công');
        return redirect()->back();
    }
}
