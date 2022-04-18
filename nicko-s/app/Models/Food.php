<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_category_id',
        'Name',
        'Ingredients',
        'Description',
        'Price',
        'image',
];

    function FoodCategory(){
        return $this->belongsTo(FoodCategory::class,'food_category_id');
    }
}
