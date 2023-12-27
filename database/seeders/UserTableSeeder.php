<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{
    public function run(): void{
        User::create([
            'name' => 'Admin',
            'role_id' => 1,
            'phone' => '01745303650',
            'email' => 'admin@gmail.com',
            'password'=>bcrypt(12345678),
            'address'=>'Dhaka',
        ]);
    }
}
