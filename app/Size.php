<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
    	'id',
    	'size_name',
    ];

    public function products() {
    	return $this->belongsToMany('App\Product', 'product_size');
    }
}
