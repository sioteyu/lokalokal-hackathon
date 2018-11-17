<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Input;

class ProductController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return Product::all();
    }

    public function store()
    {     
        return $this->createProduct();
    }

    public function show($user_id)
    {
        return Product::find($user_id);
    }

    public function update($id)
    {
        if (Product::find($id)->update(Input::all()))
        {
            return $this->respondOk('Successfully updated Product!');
        }

        return $this->respondAccepted('Unuccessfully updated Product!');
    }

    public function destroy($id)
    {
        if (Product::find($id) === null)
        {
            return $this->respondAccepted('Unsuccessfully deleted Product or null!');
        }

        Product::find($id)->delete(); 

        return $this->respondOk('Successfully deleted Product!');
    }

    public function createProduct()
    {   
        $Product  = Input::all();

        Product::create($Product);

        return $this->respondCreated('Successfully created an Product!');
    }
}