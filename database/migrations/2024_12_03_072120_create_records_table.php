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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('chronic_illness')->nullable();
            $table->string('allergies')->nullable();
            $table->string('current_medications')->nullable();
            $table->string('past_surgeries')->nullable();
            $table->string('bleeding_disorders')->nullable();
            $table->string('heart_condition')->nullable();
            $table->boolean('smoking_status')->nullable();
            $table->string('alcohol_consumption')->nullable();
            $table->string('dietary_habits')->nullable();
            $table->string('oral_hygiene_routine')->nullable();
            $table->string('previous_treatment')->nullable();
            $table->integer('dental_pain_sensitivity')->nullable();
            $table->boolean('is_pregnant')->nullable();
            $table->boolean('is_breastfeeding')->nullable();
            $table->string('hormonal_changes')->nullable();
            $table->string('up_to_date_vaccination')->nullable();
            $table->string('communicable_diseases')->nullable();
            $table->string('recent_illness')->nullable();
            $table->string('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
