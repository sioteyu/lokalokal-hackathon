<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\TransactionHistory;
use Illuminate\Support\Facades\Input;

class TransactionHistoryController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return TransactionHistory::all();
    }

    public function store()
    {     
        return $this->createTransactionHistory();
    }

    public function show($user_id)
    {
        return TransactionHistory::find($user_id);
    }

    public function destroy($id)
    {
        if (TransactionHistory::find($id) === null)
        {
            return $this->respondAccepted('Unsuccessfully deleted TransactionHistory or null!');
        }

        TransactionHistory::find($id)->delete(); 

        return $this->respondOk('Successfully deleted TransactionHistory!');
    }

    public function createTransactionHistory()
    {   
        $current_time = Carbon::now()->toDateTimeString();

        $TransactionHistory  =  array(
            "user_id" => Input::get('user_id'), 
            "address_id" => Input::get('address_id'),
            "credits" => Input::get('credits'),
            "date" => $current_time
        );

        TransactionHistory::create($TransactionHistory);

        return $this->respondCreated('Successfully created an TransactionHistory!');
    }
}