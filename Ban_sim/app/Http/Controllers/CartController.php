<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Category;
use App\Sim;
use Gloudemans\Shoppingcart\Facades\Cart;


use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $sim;
    protected $category;


    public function __construct(Sim $sim, Category $category)
    {
        $this->sim = $sim;
        $this->category = $category;


    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function save(Request $request,$id)
    {
        $sim = Sim::findOrFail($id);
        $sims = Cart::content();
        foreach ($sims as $pro)
            if($sim->sim_id == $pro->id ){
                return redirect()->back()->with('alert','Lỗi: "Sản phẩm đã tồn tại trong giỏ hàng!"');
                //Err không hiện alert.
            }
        Cart::add(['id' => $sim->sim_id, 'name' => $sim->sim_name, 'qty' => 1,
            'weight' => 2, 'price' => $sim->sim_price,
            'options' => ['image' => $sim->sim_image]]);
        return redirect()->back();
    }

    public function show()
    {
        $sim = Cart::content();

//        if ($sim->sim_category_id === $this->category->category_id) {
//            $categories = Category::findOrFail($sim->sim_category_id);
//        }
        return view('BanSim.catalog.cart', compact('sim', 'id'));
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
    public function update(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::update($rowId,0);
        return redirect()->back();
    }
}
