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
            'state_province_region',
            'postal_code',
            'country_code' 
    	];
}