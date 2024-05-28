<?php

namespace App\Http\Resources;

use App\Models\Admin\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowRestaurantResource extends JsonResource
{
    private mixed $restaurant_category_id;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $type = RestaurantCategory::query()->where('id' , $this->restaurant_category_id)->firstOrFail();

        return [
            'id'=> $this->id,
            'title'=>$this->name,
            'type'=>$type->name,
            'address'=>[
                'addreess'=>$this->address,
                'latitude'=>$this->latitude,
                'longitude'=>$this->longitude,
            ],
            'is_open'=>$this->is_open,
            'score'=>4.5,
            'comments_count'=>23,
            'agenda' =>$this->agenda,
        ];


//        return parent::toArray($request);
    }
}
