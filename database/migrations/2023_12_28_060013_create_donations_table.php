<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('br_id')->nullable()->cascadeOnDelete();
            $table->foreignId('donor_id')->nullable()->cascadeOnDelete();
            $table->string('last_do_date')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('donations');
    }
};
