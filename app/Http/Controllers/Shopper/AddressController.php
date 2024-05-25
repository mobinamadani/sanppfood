<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\Shopper\ShopperAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $addresses = ShopperAddress::all();
        return AddressResource::collection($addresses);
    }

    public function store(Request $request)
    {

    }

    public function setCurrentAddress(Request $request)
    {

    }


}
