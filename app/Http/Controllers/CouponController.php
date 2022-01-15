<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coupons = Coupon::paginate(8);
        return view('admin.pages.showcoupon',compact('coupons'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.addcoupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $validate=$req->validate([
            'code'=>'required|unique:coupons',
            'amount'=>'required|numeric',
            'total_quantity'=>'required',
            'available_quantity'=>'required',
            'start_at'=>'required',
            'expire_at'=>'required',
            'status'=>'required',
        ]);
        if($validate){
            // Coupon::create([
            //     'code'=>$req->code,
            //     'amount'=>$req->amount,
            //     'total_quantity'=>$req->total_quantity,
            //     'available_quantity'=>$req->available_quantity,
            //     'start_at'=>$req->start_at,
            //     'expire_at'=>$req->expire_at,
            // ]);
            Coupon::create($validate);
            return redirect('coupons');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coupon=Coupon::where('id',$id)->first();
        return view('admin.pages.updatecoupon',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id)
    {
        //
        $validate=$req->validate([
            'code'=>'required',
            'amount'=>'required|numeric',
            'total_quantity'=>'required',
            'available_quantity'=>'required',
            'start_at'=>'required',
            'expire_at'=>'required',
            'status'=>'required',
        ]);
        if($validate){
            Coupon::where('id',$id)->update($validate);
            return redirect('coupons');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coupondata=Coupon::find($id);
        if($coupondata->delete()){
            return response()->json(['msg'=>"coupon deleted"]);
        }
        else{
            return response()->json(['msg'=>"coupon could not be deleted"]);
        }
    }
}