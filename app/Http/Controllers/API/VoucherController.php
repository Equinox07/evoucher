<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoucherResource;
use App\Jobs\SendAdminEmail;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public $voucher;
    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = $this->voucher->notSold()->get();
        return VoucherResource::collection($vouchers);
    }
}
