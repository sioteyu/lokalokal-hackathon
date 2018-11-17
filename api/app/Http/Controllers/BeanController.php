<?php

namespace App\Http\Controllers;

use App\Bean;
use Illuminate\Support\Facades\Input;

class BeanController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return Bean::all();
    }

    public function store()
    {     
        return $this->createBean();
    }

    public function show($user_id)
    {
        return Bean::find($user_id);
    }

    public function update($id)
    {
        if (Bean::find($id)->update(Input::all()))
        {
            return $this->respondOk('Successfully updated Bean!');
        }

        return $this->respondAccepted('Unuccessfully updated Bean!');
    }

    public function destroy($id)
    {
        if (Bean::find($id) === null)
        {
            return $this->respondAccepted('Unsuccessfully deleted Bean or null!');
        }

        Bean::find($id)->delete(); 

        return $this->respondOk('Successfully deleted Bean!');
    }

    public function createBean()
    {   
        $Bean  = Input::all();

        Bean::create($Bean);

        return $this->respondCreated('Successfully created an Bean!');
    }
}