<?php

namespace App\Models;

use App\Models\Food;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table='orders_item';
    protected $fillable=[
        'order_id',
            'food_id',
            'food_qty',
            'price',
        ];

    /**
     * 
     * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function food(){
        return $this->belongsTo(Food::class,'food_id','id');
    }

}
