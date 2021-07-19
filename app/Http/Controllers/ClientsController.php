<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientsController extends Controller
{
    public function loginPage(){
        return view("login");
    }

    public function registerPage(){
        return view("register");
    }

    public function loginResult(Request $req){
        $client =  Client::where(["email"=>$req->email])->first();
        if(!$client || !Hash::check($req->password, $client->password)){
            return ["Result"=>"Username or password is not matched"];
        }
        $req->session()->put("client",$client);
        return redirect("/shop");
    }

    public function logout(){
        Session::forget("client");
        return redirect("/shop/login");
    }

    public function registerResult(Request $req){
        $newClient = new Client();
        $newClient->name = $req->name;
        $newClient->email = $req->email;
        $newClient->password = Hash::make($req->password);
        $newClient->save();
        return redirect("/shop/login");
    }
}
