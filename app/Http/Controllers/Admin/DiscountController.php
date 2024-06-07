<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddDiscountRequest;
use App\Http\Requests\Admin\DeleteDiscountRequest;
use App\Models\Admin\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $discounts = Discount::all();
        return view('admin.DiscountIndex', compact('discounts'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.DiscountCreate');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
       $discount =  Discount::query()->create($request->all());
//        dd($discount);
        return redirect()->route('AdminDiscount.index')->with('discount', $discount);
    }

    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $discount = Discount::query()->findOrFail($id);
        return view('admin.DiscountEdit', compact('discount'));
    }

    public function update(AddDiscountRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $discount= Discount::query()->findOrFail($id);
        $discount->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'date'=>$request->date,
        ]);

        return redirect()->route('AdminDiscount.index', $id);
    }

    public function destroy(DeleteDiscountRequest $request): \Illuminate\Http\RedirectResponse
    {
//        $discount= Discount::query()->findOrFail($id);
//        $discount->delete();
        $discount = Discount::query()->findOrFail($request->id);
        $discount->delete();

        return redirect()->route('AdminDiscount.index');
    }

}
