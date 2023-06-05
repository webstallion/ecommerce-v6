<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        $this->data['data']=Product::all();
        return view('product', $this->data);
    }
}
