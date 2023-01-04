<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table="posts";
    
    public $timestamps = false;
    
    protected $primaryKey='id';
    public function getUsers()
    {
        return $this ->belongsTo(user::class, 'user_id' ,'id');
    }

    
}
