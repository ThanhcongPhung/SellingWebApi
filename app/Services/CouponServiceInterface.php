<?php

namespace App\Services;
use Illuminate\Http\Request;
/**
 * Interface ProductServiceInterface
 * @package App\Services\Interfaces
 */
interface CouponServiceInterface extends CRUDServiceInterface
{
    /**
     * Count product
     * @return number
     */
    public function count();


}
