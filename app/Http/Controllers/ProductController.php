<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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

    public function cartItemsList(){
        $clientId = Session::get("client")['id'];
        $products = DB::table("cart")
        ->join("products", "cart.product_id","=","products.id")
        ->where("cart.client_id",$clientId)
        ->select("products.*", "cart.id as cart_id")
        ->get();

        return view("cartItemsList", ["products"=>$products]);
    }

    public function removeCartListItem($cart_id){
        $path = "/shop/cartItemsList";
        Cart::destroy($cart_id);
        return redirect($path);
    }

    public function makeOrder(){
        $clientId = Session::get("client")['id'];
        $sumOfCartProducts = DB::table("cart")
        ->join("products", "cart.product_id","=","products.id")
        ->where("cart.client_id",$clientId)
        ->sum("products.price");
        
        return view("makeOrder", ["sumOfCartProducts" => $sumOfCartProducts]);
    }
}
