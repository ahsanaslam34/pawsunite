<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class breed extends Model
{
    use HasFactory;

    protected $table="breeds";
    
    public $timestamps = false;
    
    protected $primaryKey='id';
}
