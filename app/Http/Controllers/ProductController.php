<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        $this->data['products']=Product::all();
        return view('product', $this->data);
    }

    function details($id){
        $this->data['product_details']=Product::find($id);
        return view('details', $this->data);
    }
}
