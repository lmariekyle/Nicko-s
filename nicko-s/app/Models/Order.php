<?php

namespace App\Models;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable=[
        'customer_id',
        'total_price',
        'payment_method',
        'firstname',
            'middlename',
            'lastname',
            'phone',
            'email',
            'province',
            'city',
            'barangay',
            'municipality',
            'zip_code',
            'street_name',
            'house_number',
            'status',
            'message',
        ];

    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }
}
