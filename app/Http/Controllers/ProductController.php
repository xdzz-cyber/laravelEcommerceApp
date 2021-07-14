<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}
