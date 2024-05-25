<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Address\CurrentAddressRequest;
use App\Http\Requests\API\Address\StoreAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Shopper\ShopperAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
//        dd('address');
        $addresses = ShopperAddress::all();
        return AddressResource::collection($addresses);

    }

    public function store(StoreAddressRequest $request): \Illuminate\Http\JsonResponse
    {

        /** @var ShopperAddress $address */
        $validated = $request->validated();

        $address = ShopperAddress::query()->create($validated);


        $address->shopper()->attach($validated['shopper_id']);

        return response()->json([
            'message' => __('response.address_store_success'),
            'data' => AddressResource::make($address)
        ]);


//        $validated = $request->validated();
//        $address = ShopperAddress::query()->create($validated);
//        return response()->json([
//            'message' => __('response.store_successfully'),
//        ]);
//        return AddressResource::make($address);
    }

    public function setCurrentAddress(CurrentAddressRequest $request, Address $address): \Illuminate\Http\JsonResponse
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
