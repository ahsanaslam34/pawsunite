<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    use HasFactory;

    public function getOrders()
    {
        # code...
        return $this ->belongsTo(order::class, 'order_id');
    }
}
