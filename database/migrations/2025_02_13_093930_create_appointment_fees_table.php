<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentFeesTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->string('fee_type');
            $table->decimal('fee_amount', 8, 2);
            $table->timestamps();

            $table->foreign('appointment_id')
                  ->references('id')
                  ->on('appointments')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointment_fees');
    }
}
