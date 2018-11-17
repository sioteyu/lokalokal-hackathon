<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoffeePartner extends Model
{
    protected $table = 'coffee_partner';
    public $timestamps = false;

    protected $fillable = [
    		'name', 
    		'product_id', 
    		'total_credits', 
    		'farmer_credits',
    	];
}