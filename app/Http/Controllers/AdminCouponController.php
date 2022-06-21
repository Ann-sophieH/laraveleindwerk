<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coupons = Coupon::withTrashed()
            ->latest()
            ->paginate(5);
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.coupons.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $coupon = new coupon();
        $coupon->description = $request->description;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;

        $coupon->save();
        return redirect('/admin/coupons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function coupon(Request $request)
    {
        if (Session::has('cart')){
            $couponDiscount = $request->coupon;
            $coupons = Coupon::all();
            $totalPrice = Session::get('cart')->totalPrice;

            foreach ($coupons as $coupon){
                if($coupon->code == $couponDiscount){                                       //vb 60 - 40% = 36 /
                    Session::put('coupon', $coupon);
                    /** edit totalprice by rule of 3 **/
                    $percentage = $totalPrice / 100;                                          // 60 / 100 = 0.6
                    $discountprice = $percentage * $coupon->discount;                               // 0.6 * 40 = 24
                    $NewTotal = $totalPrice - $discountprice;                                   // 60 - 24 = 36
                    Session::get('cart')->totalPrice = $NewTotal;                    // NewTotal = 36 eur
                    Session::flash('coupon_succes');
                    return redirect()->back();
                }else{
                    Session::flash('coupon_error');
                }
            }
            return redirect()->back();
        }else{
            Session::flash('coupon_error');
            return redirect()->back();

        }

    }
}
