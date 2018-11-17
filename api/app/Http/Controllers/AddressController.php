<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;

class AddressController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return Address::all();
    }

    public function store()
    {     
        return $this->createAddress();
    }

    public function show($user_id)
    {
        return Address::find($user_id);
    }

    public function update($id)
    {
        if (Address::find($id)->update(Input::all()))
        {
            return $this->respondOk('Successfully updated address!');
        }

        return $this->respondAccepted('Unuccessfully updated address!');
    }

    public function destroy($id)
    {
        if (Address::find($id) === null)
        {
            return $this->respondAccepted('Unsuccessfully deleted address or null!');
        }

        Address::find($id)->delete(); 

        return $this->respondOk('Successfully deleted address!');
    }

    public function createAddress()
    {   
        $address  = Input::all();

        Address::create($address);

        return $this->respondCreated('Successfully created an address!');
    }
}
