<?php

namespace App\Http\Resources;

use App\Models\Seller\Food;
use App\Models\Seller\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        $restaurant = Restaurant::query()->where('id', $this->restuarnt_id)->firstOrFail();
        $food = Food::query()->where('id', $this->food_id)->firstOrFail();

        return [
            'carts'=> $this->id,
            'restuarant'=> [
                'name'=> $restaurant->name,
                'photo'=>$restaurant->photo
            ],
            'food'=> [
                'id' => $food->id,
                ''
            ]


        ];



    }
}
