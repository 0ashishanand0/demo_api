<?php

namespace App\Model;
use app\Model\Review;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }
}
