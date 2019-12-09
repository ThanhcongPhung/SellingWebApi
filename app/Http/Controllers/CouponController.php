<?php

namespace App\Http\Controllers;

use App\Services\CouponServiceInterface;
use App\Http\Requests\CouponRequest;
use App\Http\Resources\Coupon\CouponCollection;
use App\Http\Resources\Coupon\CouponResource;
use App\Model\Coupon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CouponController extends Controller
{



    protected $couponService;
        // public function __construct(CouponServiceInterface $couponService)
        // {
        //     $this->couponService=$couponService;
        //     // $this->middleware('auth:api')->except('index','show');

        // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CouponCollection::collection(Coupon::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $coupon = new Coupon;
        $coupon->coupon_code=$request->coupon_code;
        $coupon->amount=$request->amount;
        $coupon->amount_type=$request->amount_type;
        $coupon->expiry_date=$request->expiry_date;
        $coupon->status=$request->status;

        $coupon->save();
        return response([
            'data'=>new CouponResource($coupon)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return new CouponResource($coupon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update($request->all());
        return response([
            'data'=>new CouponResource($coupon)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
    public function addCoupon(Request $request){
        if($request->isMethod('post')){
			$data = $request->all();
			// echo "<pre>"; print_r($data); die;
			$coupon = new Coupon;
			$coupon->coupon_code = $data['coupon_code'];
			$coupon->amount_type = $data['amount_type'];
			$coupon->amount = $data['amount'];
			$coupon->expiry_date = $data['expiry_date'];
			$coupon->status = $data['status'];
			$coupon->save();
			return redirect()->action('CouponController@viewCoupons')->with('flash_message_success', 'Coupon has been added successfully');
		}
		return view('admin.coupons.add_coupon');
    }
    public function viewCoupons(){
		$coupons = Coupon::orderBy('id','DESC')->get();
		return view('admin.coupons.view_coupons')->with(compact('coupons'));
	}
}
