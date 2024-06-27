<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Address\CurrentAddressRequest;
use App\Http\Requests\API\Address\StoreAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Shopper\Shopper;
use App\Models\Shopper\ShopperShopperAddress;
//use Illuminate\Http\Request;
//use Illuminate\Pagination\Paginator;
//use http\Client\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class AddressController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $addresses = ShopperShopperAddress::all();
        return AddressResource::collection($addresses);

    }

    public function store(StoreAddressRequest $request)
    {
//        $validated = $request->validated();
//        $address = ShopperShopperAddress::query()->create($validated);
//        dd('$request');
//        $address->shoppers()->attach($validated['shopper_id']);

        $shopper = Auth::user();
        $address = $shopper->addresses()->create($request->validated());

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

    public function setCurrentAddress(Request $request, $addressId): \Illuminate\Http\JsonResponse
    {
        // Find the address record based on the addressId and shopper_id
        $address = ShopperShopperAddress::where('id', $addressId)
            ->where('shopper_id', Auth::id())
            ->first();

        // Update other address records for the same shopper
        ShopperShopperAddress::where('shopper_id', Auth::id())
            ->where('id', '!=', $addressId)
            ->update(['is_current' => false]);

        // Disable timestamps on the model instance
        $address->timestamps = false;

        // Set the current address and manually update 'updated_at' field
        $address->update(['is_current' => true, 'updated_at' => Carbon::now()]);

        // Re-enable timestamps on the model instance
        $address->timestamps = true;

        return response()->json([
            'message' => 'Current address successfully updated',
            'data' => $address
        ]);
    }








//        if ($address->shopper_id !== Auth::id()) {
//            return response()->json(['message' => 'Unauthorized access to the address'], 403);
//        }
//
//        ShopperShopperAddress::query()->where('shopper_id', Auth::id())->update(['is_current' => false]);
//
//
//        $address->is_current = true;
//        $address->save();
//
//        return response()->json([
//            'msg' => __('response.buyer.set_current_address'),
//            'data'=> new AddressResource($address),
//        ]);


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
//    }



}
