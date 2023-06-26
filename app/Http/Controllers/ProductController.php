<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

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

    function addToCart(Request $req){
        if($req->session()->has('user')){
            $cart= new Cart;
            $cart->user_id= $req->session()->get('user')['id'];
            $cart->product_id= $req->product_id;
            $cart->save();
            return redirect('/');

        }else{
            return redirect('/login_page');
        }
    }

    static function cartItem(){
        $userId=Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
}
