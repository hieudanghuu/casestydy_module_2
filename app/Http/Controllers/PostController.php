<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Post_tran;
use App;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (App::getLocale() == "vi") {
            $posts = Post_tran::where('locale','vi')->paginate(10);
        }else {
            $posts = Post_tran::where('locale','jp')->paginate(10);
        }
        return view('BanSim.catalog.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.form.createProductLine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $posts = new Post();
        $posts->save();
        $post = Post::create($request->all());
        $image = explode("\\", $request->image);
        $post->image = $image[2];
        $post->id = $posts->id;

        $post->save();

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $image = explode("\\", $request->image);
        $post->image = $image[2];
        $post->save();
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return 204;
    }


    public function post(){
        $posts = Post::all();
        return view('BanSim.catalog.post',compact('posts'));
    }

    public function post_show($id){
        // dd($id);
        $posts = Post_tran::paginate(3);
        $post = Post_tran::findOrFail($id);

        return view('BanSim.catalog.post_show',compact('posts','post'));
    }
}
