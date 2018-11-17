<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bean extends Model
{
	public $timestamps = false;

    protected $fillable = [
    		'name', 
    		'description'
    	];

    public function products()
    {
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}