<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'name' => $this->name,
            'Description' => $this->detail,
            'Price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out Of Stock' : $this->stock,
            'discount' => $this->discount,
            'Total Discount' =>round($this->price - ($this->price * ($this->discount /100)),2),
            'Rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : '_No Ratingyet_',
            'href' => 
            [
                'Review' => route('reviews.index',$this->id)
            ] 
        ];
    }
}
