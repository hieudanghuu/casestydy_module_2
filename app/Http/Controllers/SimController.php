<?php

namespace App\Http\Controllers;

use App\Category;
use App\Sim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SimController extends Controller
{

    protected $sim;
    protected $category;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function  __construct(Sim $sim, Category $category)
    {
        $this->sim = $sim;
        $this->category = $category;
        $this->middleware('auth');
    }

    public function index()
    {
        $sims = $this->sim::whereNull('deleted_at')->paginate(5);
        $categories = Category::all();
        return view('BanSim.crud.list', compact('sims', 'categories'));
//        return view('BanSim.crud.list', ['sims' => $this->sim::paginate(5), 'categories' => $this->category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('BanSim.crud.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sim = new Sim();
        $sim->sim_name = $request->input('name');
        $sim->sim_price = $request->input('price');
        $sim->sim_category_id = \request('sim_category_id');

        if ($request->hasFile('sim_image')) {
            $image = base64_encode(file_get_contents($request->file('sim_image')));
            $sim->sim_image = $image;
        }
        $sim->save();

        Session::flash('success', '新しい成功を生み出す');

        return redirect()->route('sim.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Sim $sim
     * @return \Illuminate\Http\Response
     */
    public function show(Sim $sim)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Sim $sim
     * @return \Illuminate\Http\Response
     */
    public function edit(Sim $sim)
    {
        $categories = Category::all();

        return view('BanSim.crud.edit', compact('sim', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Sim $sim
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sim $sim)
    {

        $sim->sim_name = $request->input('name');
        $sim->sim_price = $request->input('price');
        $sim->sim_category_id = $request->input('sim_category_id');
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $sim->sim_image = $image;
        }
        $sim->save();
        Session::flash('success', '新しい成功を生み出す');
        return redirect()->route('sim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Sim $sim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sim = Sim::findOrFail($id);
        $sim->update(['deleted_at' => date("Y-m-d H:i:s")]);
        Session::flash('success', '削除成功');
        return redirect()->back();
    }

    public function validateTask()
    {
        return request()->validate([
            'sim_name' => ['required','string','max:255'],
            'sim_price' => ['required','number'],
            'sim_category_id' => ['required','number','max:10'],
            'sim_image' => ['required','string'],
        ]);
    }


}
