<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\Resource;

class productCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return 
        [
            'name' =>$this->name,
            'Total Price' =>round($this->price - ($this->price * ($this->discount /100)),2),
             'Rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : '_No Ratingyet_',
             'Discount' =>$this->discount,
             'href' => 
             [
                'link' => route('products.show',$this->id)
             ]
        ];
    }
}
