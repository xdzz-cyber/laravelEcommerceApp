<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            "name"=>"firstOne",
            "email"=>"firstOne@gmail.com",
            "password"=>Hash::make("123")
        ]);
    }
}
