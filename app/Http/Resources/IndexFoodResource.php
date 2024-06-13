<?php

namespace App\Http\Resources;

use App\Models\Admin\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexFoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      //  return parent::toArray($request);

        $foodCategories = FoodCategory::query()->where('id', $this->food_category_id)->firstOrFail();
        $sale = null;
        if($this->discounnt){
            $sale = [
                'label'=> $this->discount['name'],
                'factor'=>$this->discount['price'],
            ];
        }

        $categories = [
            'categories' => [
                'id' => $foodCategories->id,
                'title' => $foodCategories->name,
                'foods' => [
                    'id' => $this->id,
                    'title' => $this->name,
                    'price' => $this->price,
                    'recipe' => $this->recipe,
                    'image' => $this->photo,
                ]
            ]
        ];

        if (!is_null($sale)) {
            $categories['showSale'] = $sale;
        }
        return $categories;
    }


}
