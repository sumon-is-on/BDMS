<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->cascadeOnDelete();
            $table->foreignId('donor_id')->nullable()->cascadeOnDelete();
            $table->string('hospital')->nullable();
            $table->string('hospital_address')->nullable();
            $table->string('operation')->nullable();
            $table->string('qty')->nullable();
            $table->string('asking_bg')->nullable();
            $table->string('required_date')->nullable();
            $table->string('required_time')->nullable();
            $table->string('status')->default("pending");
            $table->timestamps();
        });
    }


    public function down(): void{
        Schema::dropIfExists('blood_requests');
    }
};
