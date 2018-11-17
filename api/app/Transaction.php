<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    public $timestamps = false;

    protected $fillable = [
    		'customer_name', 
    		'transaction_id', 
    		'transaction_item_id', 
    		'product_name',
            'price',
            'grams_used',
            'address' 
    	];
}