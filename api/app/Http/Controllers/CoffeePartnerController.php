<?php

namespace App\Http\Controllers;

use App\CoffeePartner;
use App\TransactionHistory;
use Illuminate\Support\Facades\Input;

class CoffeePartnerController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return CoffeePartner::all();
    }

    public function store()
    {     
        return $this->createCoffeePartner();
    }

    public function show($user_id)
    {
        return CoffeePartner::find($user_id);
    }

    public function showTransactions($id)
    {
        return TransactionHistory::where('product_id', $id)->get();
    }

    public function update($id)
    {
        if (CoffeePartner::find($id)->update(Input::all()))
        {
            return $this->respondOk('Successfully updated CoffeePartner!');
        }

        return $this->respondAccepted('Unuccessfully updated CoffeePartner!');
    }

    public function destroy($id)
    {
        if (CoffeePartner::find($id) === null)
        {
            return $this->respondAccepted('Unsuccessfully deleted CoffeePartner or null!');
        }

        CoffeePartner::find($id)->delete(); 

        return $this->respondOk('Successfully deleted CoffeePartner!');
    }

    public function createCoffeePartner()
    {   
        $CoffeePartner  =  array(
            "name" => Input::get('name'), 
            "product_id" => Input::get('product_id')
        );

        CoffeePartner::create($CoffeePartner);

        return $this->respondCreated('Successfully created an CoffeePartner!');
    }
}
