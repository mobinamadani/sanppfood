<?php

namespace App\Http\Resources;

use App\Models\Seller\Food;
use App\Models\Shopper\Shopper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $foodName = Food::query()->where('id' , $this->food_id)->pluck('name');
        $userName = Shopper::query()->where('id' , $this->shopper_id)->pluck('name')->first();
        $respnse = $this->response;
        $result = [];
        $result[] = [
            'author' => ['name'=>$userName],
            'foods' => $foodName,
            'created_at' => $this->created_at->format('y-m-d'),
            'score'=>$this->score,
            'content'=>$this->message,
        ];
        if (!is_null($respnse)){
            $result['response'] = $respnse;
        }
        return $result;
//        return parent::toArray($request);
    }
}
