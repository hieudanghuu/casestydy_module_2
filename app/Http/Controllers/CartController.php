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


    public function save(Request $request, $id)
    {
        $sim = Sim::findOrFail($id);
        $sims = Cart::content();
        $qty = $request->qty;
        foreach ($sims as $pro)
            if ($sim->sim_id == $pro->id) {
                return redirect()->back()->with('alert', 'Lỗi: "Sản phẩm đã tồn tại trong giỏ hàng!"');
                //Err không hiện alert.
            }
        Cart::add(['id' => $sim->sim_id, 'name' => $sim->sim_name, 'qty' => $qty,
            'weight' => 2, 'price' => $sim->sim_price,
            'options' => ['image' => $sim->sim_image]]);
        return redirect()->back();
    }

    public function show()
    {
        $sim = Cart::content();

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
    public function update(Request $request, $id, $qty, $rowId)
    {
        if ($request->ajax()) {
            $sim = sim::findOrFail($id);
            if ($qty >= 1) {
                Cart::update($rowId, $qty);
//                return redirect()->route('checkout');
                return response()->json(
                    [
                        'success' => 'Added to cart'
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'qtyErr' => 'Quantity must greater than 1'
                    ]
                );
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::update($rowId, 0);
        return redirect()->back();
    }
}
