<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    public function loginPage(){
        return view("login");
    }

    public function loginResult(Request $req){
        $client =  Client::where(["email"=>$req->email])->first();
        if(!$client || !Hash::check($req->password, $client->password)){
            return ["Result"=>"Username or password is not matched"];
        }
        $req->session()->put("client",$client);
        return redirect("/shop");
    }
}
