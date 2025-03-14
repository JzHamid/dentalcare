<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentGuestsTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->string('name');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('email');
            $table->string('contact');
            $table->tinyInteger('sex')->comment('0: Male, 1: Female');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointment_guests');
    }
}
