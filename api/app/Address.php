<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    public $timestamps = false;

    protected $fillable = [
    		'name', 
    		'address_line_1', 
    		'address_line_2', 
    		'city',
            'province',
            'country',
            'postal_code' 
    	];
}