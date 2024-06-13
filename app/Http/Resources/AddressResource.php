<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);

        $address = $this->resource;

        return[
            'id' => $address->id,
            'title' => $address->title,
            'address' => $address->address,
            'latitude' => $address->latitude,
            'longitude' => $address->longitude,
        ];
    }


}
