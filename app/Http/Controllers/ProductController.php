<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        $allProducts = Product::all();
        return view("products", ["allProducts"=>$allProducts]);
    }

    public function detailPage($id){
        $foundProduct = Product::find($id);
        return view("detailPage",["foundProduct"=>$foundProduct]);
    }

    public function addToCart(Request $req){
        if ($req->session()->has("client")) {
            $cart = new Cart();
            $cart->client_id = $req->session()->get("client")['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect("/shop");
        }
        return redirect("/shop/login");
    }

    static public function cartItemCountForClient(){
        $client_id = Session::get("client")['id'];
        return Cart::where("client_id",$client_id)->count();
    }
}
