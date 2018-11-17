<?php

namespace App\Http\Controllers;

use App\TransactionItem;
use Illuminate\Support\Facades\Input;

class TransactionItemController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return TransactionItem::all();
    }

    public function store()
    {     
        return $this->createTransactionItem();
    }

    public function show($id)
    {
        return TransactionItem::where('transaction_history_id', $id)->get();
    }

    public function destroy($id)
    {
        if (TransactionItem::find($id) === null)
        {
            return $this->respondAccepted('Unsuccessfully deleted TransactionItem or null!');
        }

        TransactionItem::find($id)->delete(); 

        return $this->respondOk('Successfully deleted TransactionItem!');
    }

    public function createTransactionItem()
    {   
        $TransactionItem  = Input::all();

        TransactionItem::insert($TransactionItem);

        return $this->respondCreated('Successfully created an TransactionItem!');
    }
}