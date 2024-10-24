<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Primary Key
            $table->string('username')->unique();  // username ไม่ซ้ำกัน
            $table->string('password');  // password
            $table->string('name');  // name
            $table->string('seat')->unique();  // seat ไม่ซ้ำกัน
            $table->boolean('reserved')->default(false);  // reserved
            $table->string('pin')->unique();  // pin ไม่ซ้ำกัน
            $table->boolean ('arrived')->default(false); 
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
