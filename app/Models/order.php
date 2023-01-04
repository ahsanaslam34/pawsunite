<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function getOrderDetails()
    {
        # code...
        return $this ->hasMany(orderDetail::class);
    }

    public function getUserDetails()
    {
        return $this ->belongsTo(user::class,'user_id');
    }
}
