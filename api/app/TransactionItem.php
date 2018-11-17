<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $table = 'transaction_items';
    public $timestamps = false;

    protected $fillable = [
    		'transaction_history_id', 
    		'product_id', 
    		'quantity'
    	];

    public function user_address()
    {
    	return $this->belongsTo(UserAddress::class, 'address_id', 'id');
    }
}