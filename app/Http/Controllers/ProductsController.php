<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function addProducts(Request $request)
    {
        $item = new Products();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->quantity = $request->quantity;

        $item->save();
        return response()->json('add success');
    }

    public function editProducts(Request $request)
    {
        $item = Products::find($request->id);

        $item->name = $request->name;
        $item->price = $request->price;
        $item->quantity = $request->quantity;

        $item->update();
        return response()->json('updated success');
    }
    public function deleteProducts(Request $request)
    {
        $item = Products::find($request->id)->delete();


        return response()->json('deleted success');
    }


    public function getProducts()
    {
        return response()->json(Products::all());
    }
}
