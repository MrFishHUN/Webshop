<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Coupon;
use App\Models\Discount;
use PhpParser\Node\Expr\FuncCall;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::with(['product'])->paginate(5);
        $coupns = Coupon::paginate(5);
        return view('admin.products.discounts.index', ['discounts' => $discounts, 'coupons' => $coupns]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.discounts.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscountRequest $request)
    {
        $validated = $request->validated();
        $discount = new Discount([
            'product_id' => $validated['product_id'],
            'percentage' => $validated['percentage'],
            'starts_at' => $validated['starts_at'],
            'ends_at' => $validated['ends_at'],
        ]);
        $discount->save();
        return redirect()->route('discounts.index')->with('success', 'Kedvezmény sikeresen létrehozva');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        return view('admin.products.discounts.discount.edit', ['discount' => $discount]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $validated = $request->validated();
        $discount->update([
            'percentage' => $validated['percentage'],
            'starts_at' => $validated['starts_at'],
            'ends_at' => $validated['ends_at'],
        ]);
        return redirect()->route('discounts.index')->with('success', 'Kedvezmény sikeresen frissítve');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Kedvezmény sikeresen törölve');
    }

    public function search()
    {
        $search = request('search');
        $discounts = Discount::with(['product'])->where('percentage', 'like', '%' . $search . '%')->orWhere('product_id', 'like', '%' . $search . '%')->orWhereHas('product', function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->paginate(5);

        $coupns = Coupon::where('code', 'like', '%' . $search . '%')->orWhere('id', 'like', '%' . $search . '%')->paginate(5);

        return view('admin.products.discounts.index', ['discounts' => $discounts, 'coupons' => $coupns])->with('success', 'Kedvezmény sikeresen törölve');
    }
}
