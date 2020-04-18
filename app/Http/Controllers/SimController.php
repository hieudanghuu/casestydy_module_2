<?php

namespace App\Http\Controllers;


use App;
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
    public function __construct(Sim $sim, Category $category)
    {
        $this->sim = $sim;
        $this->category = $category;
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $sims = $this->sim::where('locale', 'vi')->paginate(10);
        return view('dashboard.table1', compact('sims', 'categories'));
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
     * @param $atribute
     * @param $atribute
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateTask();
        $atribute = $request->all();
        $image = base64_encode(file_get_contents($request->file("images")));
        $atribute['sim_image'] = "data:image/jpg;base64," . $image;
        $atribute['description'] = $request->description;
        Sim::create($atribute);

        $atribute['locale'] = 'jp';
        $atribute['description'] = $request->description1;
        Sim::create($atribute);
        Session::flash('success', ' Tạo mới thành công');

        return redirect()->route('dashboard.table');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Sim $sim
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sim = Sim::find($id);


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
     * @return \Illuminate\Http\Response,.l
     */
    public function update(Request $request, $id)
    {
        $atribute = $request->all();
        if ($request->hasFile('images')) {
            $image = base64_encode(file_get_contents($request->file("images")));
            $atribute['sim_image'] = "data:image/jpg;base64," . $image;
        }
        $sim = Sim::find($id);
        $sim1 = Sim::find($id + 1);
        $sim1->sim_image = "data:image/jpg;base64," . $image;
        $sim->update($atribute);
        $sim1->save();
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('dashboard.table');
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
        $simjp = Sim::findOrFail($id + 1);
        $sim->delete();
        $simjp->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->back();
    }

    public function validateTask()
    {
        return request()->validate([
            'sim_name' => ['required', 'string', 'max:255'],
            'sim_price' => ['required', 'number'],
            'sim_category_id' => ['required', 'number', 'max:10'],
            'sim_image' => ['required', 'string'],
        ]);
    }

    public function show_deletad_at()
    {
        $categories = Category::all();
        $sims = Sim::onlyTrashed()->where('locale', 'vi')->paginate(10);
        return view('dashboard.deleteForm.sims', compact('sims', 'categories'));
    }

    public function restore($id)
    {
        $sim = Sim::withTrashed()->find($id);
        $simjp = Sim::withTrashed()->find($id + 1);
        $sim->restore();
        $simjp->restore();
        Session::flash('success', 'Khôi phục thành công');
        return redirect()->route('dashboard.table');
    }

    public function forceDelete($id)
    {
        $sim = Sim::withTrashed()->find($id);
        $simjp = Sim::withTrashed()->find($id + 1);
        $sim->forceDelete();
        $simjp->forceDelete();
        Session::flash('success', 'Xóa vĩnh viễn thành công');
        return redirect()->back();
    }

}
