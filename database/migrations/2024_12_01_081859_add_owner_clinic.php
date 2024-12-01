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
        Schema::create('available_dentist', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('clinic_id')->references('id')->on('clinic')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('available_dentist', function (Blueprint $table) {
            $table->drop();
        });
    }
};
