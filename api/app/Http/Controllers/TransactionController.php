<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use App\Transaction;
use Illuminate\Support\Facades\Input;

class TransactionController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return Transaction::all();
    }

    public function store()
    {     
        return $this->createTransaction();
    }

    public function show($user_id)
    {
        return Transaction::where('user_id', $user_id)->get();
    }

    public function destroy($id)
    {
        if (Transaction::find($id) === null)
        {
            return $this->respondAccepted('Unsuccessfully deleted Transaction or null!');
        }

        Transaction::find($id)->delete(); 

        return $this->respondOk('Successfully deleted Transaction!');
    }

    public function createTransaction()
    {   
        $current_time = Carbon::now()->toDateTimeString();

        $Transaction  =  array(
            "user_id" => Input::get('user_id'), 
            "address_id" => Input::get('address_id'),
            "credits" => Input::get('credits')
        );

        Transaction::create($Transaction);

        return $this->respondCreated('Successfully created an Transaction!');
    }
}