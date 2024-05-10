<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.DiscountIndex');
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.DiscountCreate');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        Discount::query()->create($request->all());

        return redirect()->route('admin.DiscountIndex');
    }

    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $discount = Discount::query()->findOrFail($id);
        return view('admin.DiscountEdit');
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $discount = Discount::query()->findOrFail($id);
        $discount->update($request->all());

        return redirect()->route('admin.DiscountIndex');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $discount= Discount::query()->findOrFail($id);
        $discount->delete();

        return redirect()->route('admin.DiscountIndex');
    }

}
