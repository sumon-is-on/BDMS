<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder{
    public function run(): void{
        Role::create([
            'name' => 'Admin',
            'details' => 'Admin has all the access in the whole system',
            'status'=>1
        ]);
        Role::create([
            'name' => 'Patient',
            'details' => 'A Patient can ask for blood.',
            'status'=>1
        ]);
        Role::create([
            'name' => 'Donor',
            'details' => 'A donor can donate blood.',
            'status'=>1
        ]);
    }
}
