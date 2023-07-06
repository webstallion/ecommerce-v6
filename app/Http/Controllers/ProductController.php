<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;

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
    
    function cartList(){
        $userId=Session::get('user')['id'];
        $this->data['products']=DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*', 'cart.id as cart_id')
        ->get();
        return view('cartlist', $this->data);
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(){
        $userId=Session::get('user')['id'];
        $this->data['sum_total_products']=DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $userId)
        ->sum('products.price');
        return view('ordernow', $this->data);
    }
}
