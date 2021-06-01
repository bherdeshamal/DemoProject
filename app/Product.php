<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Carrt;

class Product extends Model
{
    public function products()
    {
        return $this->hasMany('App\Carrt','product_id');
    }
}
