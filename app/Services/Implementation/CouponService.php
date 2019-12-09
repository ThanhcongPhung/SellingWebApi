<?php

namespace App\Services\Implementation;
use App\Model\Coupon;
use App\Services\CouponServiceInterface;
use League\Flysystem\FileExistsException;
use Illuminate\Http\Request;
class CouponService implements CouponServiceInterface
{
    const PAGE_SIZE = 8;

    function index(Request $request) {
        $query = Coupon::query();
        if($request->has('coupon_code')){
            $query = $query->where('coupons.coupon_code', 'LIKE', '%'.$request->query('coupon_code').'%');
        }
        if($request->has('amount')){
            $query = $query->where('coupons.amount', $request->query('amount'));
        }
        if($request->has('amount_type')){
            $query = $query->where('coupons.amount_type', 'LIKE', '%'.$request->query('amount_type').'%');
        }
        if($request->has('expiry_date')){
            $query = $query->where('coupons.expiry_date','LIKE', '%'. $request->query('expiry_date').'%');
        }
        if($request->has('status')){
            $query = $query->where('banners.link',$request->query('status'));
        }

        $coupons = $query->paginate(self::PAGE_SIZE);
        return $coupons;
    }
    /**
     * @param $request
     * @return mixed
     */
    function store(Request $request)
    {

        $coupon = Coupon::create([
            'coupon_code' => $request->get('coupon_code'),
            'amount' => $request->get('amount'),
            'amount_type' => $request->get('amount_type'),
            'expiry_date' => $request->get('expiry_date'),
            'status' => $request->get('status')

        ]);
        return $coupon;
    }
    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);

        $coupon = $coupon->update([
            'coupon_code' => $request->get('coupon_code'),
            'amount' => $request->get('amount'),
            'amount_type' => $request->get('amount_type'),
            'expiry_date' => $request->get('expiry_date'),
            'status' => $request->get('status')
        ]);
        return $coupon;
    }

    /**
     * @param $id
     * @return mixed
     */
    function delete($id)
    {
        $coupon = Coupon::find($id);
        if(!is_null($coupon))
            $coupon->delete();
    }

    function find($id)
    {
        return Coupon::find($id);
    }

    /**
     * Count product
     * @return number
     */
    public function count(){
        return Coupon::count();
    }
}
