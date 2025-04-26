<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.discounts.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        $validated = $request->validated();
        $code = Str::random(10);
        while (Coupon::where('code', $code)->exists()) {
            $code = Str::random(10);
        }
        $coupon = new Coupon([
            'code' => $code,
            'percentage' => $validated['percentage'],
            'starts_at' => $validated['starts_at'],
            'ends_at' => $validated['ends_at'],
        ]);
        $coupon->save();
        return redirect()->route('discounts.index')->with('success', 'Kupon sikeresen létrehozva');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back()->with('success', 'Kupon sikeresen törölve');
    }
}
