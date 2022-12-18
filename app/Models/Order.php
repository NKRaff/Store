<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'cpf',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'cep',
        'status',
        'total_price',
        'massage',
        'tracking_no',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
