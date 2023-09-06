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
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('password');
            $table->string('lihat_password')->nullable();
            $table->string('level');
            $table->string('permissions')->nullable();
            $table->string('last_login')->nullable();
            $table->string('name_user')->nullable();
            $table->string('alias')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_user')->nullable();
            $table->string('photo_user')->nullable();
            $table->string('active');
            $table->timestamps();
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
