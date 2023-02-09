<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function typeOfOrders()
    {
        return $this->belongsTo(TypeOfOrder::class, 'type_of_order_id', 'id');
    }

}
