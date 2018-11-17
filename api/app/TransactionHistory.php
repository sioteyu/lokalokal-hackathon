<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $table = 'transaction_history';
    public $timestamps = false;

    protected $fillable = [
    		'user_id',
            'address_id',
            'credits',
            'date'
    	];

    public function users()
    {
    	return $this->belongsTo(User::class, 'id', 'id');
    }
}