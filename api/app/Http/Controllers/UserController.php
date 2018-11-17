<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function index()
    {
        return $users = User::all();
    }

    public function store()
    {     
        return $this->createUser();
    }

    public function show($user_id)
    {
        return $user = User::find($user_id);
    }

    public function update($user_id)
    {
        $password = Input::get('password');
        $hashed = app('hash')->make($password);

        $user  = array(
            "username" => Input::get('username'), 
            "password" => $hashed,
            "first_name" => Input::get('first_name'),
            "last_name" => Input::get('last_name'),
            "type" => Input::get('type'),
            "credits" => Input::get('credits'),
            "points" => Input::get('points')
        );

        User::find($user_id)->update($user);

        return $this->respondOk('Successfully updated user!');
    }

    public function destroy($user_id)
    {
        if(User::find($user_id) === null)
        {
             return $this->respondAccepted('Unsuccessfully deleted user or null!');
        } 

        User::find($user_id)->delete();

        return $this->respondOk('Successfully deleted user!');
    }

    public function createUser()
    {   
        $password = Input::get('password');
        $hashed = app('hash')->make($password);
        
        $user  = array(
            "username" => Input::get('username'), 
            "password" => $hashed,
            "first_name" => Input::get('first_name'),
            "last_name" => Input::get('last_name'),
            "type" => Input::get('type')
        );

        if(User::where('username', '=', Input::get('username'))->exists()) {
            return $this->respondAccepted('User already exists!');
        }

        User::create($user);
        return $this->respondCreated('Successfully created a new user!');
    }
}
