<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table="category";
    protected $fillable=['des'];

    public function submenus()
    {
        return $this->hasMany(sub_category::class,'cat_id');
    }

    public function getPosts()
    {
        return $this->hasMany(post::class,'cat_id');
    }
}
