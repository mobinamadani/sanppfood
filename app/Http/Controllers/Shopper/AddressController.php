<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Address\CurrentAddressRequest;
use App\Http\Requests\API\Address\StoreAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Shopper\ShopperAddress;
//use Illuminate\Http\Request;
//use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $addresses = ShopperAddress::all();
        return AddressResource::collection($addresses);

    }

    public function store(StoreAddressRequest $request): \Illuminate\Http\JsonResponse
    {

        $validated = $request->validated();

        $address = ShopperAddress::query()->create();
//        dd('$request');
        $address->shoppers()->attach($validated['shopper_id']);

        return response()->json([
            'message' => __('address added successfully'),
            'data' => AddressResource::make($address)
        ], 201);


//        $request->validate([
//            'shopper_id' => 'required',
//            'title' => 'required',
//            'address' => 'required',
//            'latitude' => 'required',
//            'longitude' => 'required',
//        ]);
//
//        $address = new Address;
//        $address->shopper_id = $request->shopper_id;
//        $address->title = $request->title;
//        $address->address = $request->address;
//        $address->latitude = $request->latitude;
//        $address->latitude = $request->latitude;
//        $address->save();
//
//        {
//
//        return response()->json(['message' => 'Address added successfully', 'address' => $address]);




//        $shopper = Auth::user();
//        $address = $shopper->address()->create($request->validated());
//
//        return response()->json([
//            'msg' => __('address added successfully'),
//            'data'=> new AddressResource($address),
//        ], 201);


    }

    public function setCurrentAddress(CurrentAddressRequest $request, ShopperAddress $address): \Illuminate\Http\JsonResponse
    {
        if ($address->shopper_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized access to the address'], 403);
        }

        ShopperAddress::query()->where('shopper_id', Auth::id())->update(['is_current' => false]);


        $address->is_current = true;
        $address->save();

        return response()->json([
            'msg' => __('response.buyer.set_current_address'),
            'data'=> new AddressResource($address),
        ]);


//        $validated = $request->validated();
//        if($validated('old_current_address_id')){
//            $validated['shopper']->shopper_addresses()
//                ->updateExistingPivot($validated['old_current_address_id'], ['current_address' => false]);
//        }
//
//        $validated['shopper']->shopper_addresses()
//            ->updateExistingPivot($shopper_addresses->id, ['current_address' => true]);
//
//
//        return response()->json([
//            'message' => __('response.address_setCurrent_success'),
//            'data' => AddressResource::make($shopper_address)
//        ], Response::HTTP_OK);
    }



}
