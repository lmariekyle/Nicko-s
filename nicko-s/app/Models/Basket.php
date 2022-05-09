<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $table = 'basket';
    protected $fillable = [
        'user_id',
        'food_id',
        'food_qty'
    ];

    public function food(){
        return $this->belongsTo(Food::class,'food_id','id');
    }

}
