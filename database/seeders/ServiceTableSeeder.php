<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder{

    public function run(): void{
        Service::create([
            'name' => 'Blood Donation',
            'details' => 'Blood Donation to a patient. ',
            'status'=>1
        ]);
    }
}
