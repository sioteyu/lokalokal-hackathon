<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;

    protected $fillable = [
    		'bean_id', 
    		'product_name', 
    		'grams_used', 
    		'price'
    	];

    public function beans()
    {
    	return $this->hasOne(Bean::class, 'id', 'bean_id');
    }
}