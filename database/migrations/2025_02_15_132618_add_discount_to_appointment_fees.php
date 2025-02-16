<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('appointment_fees', function (Blueprint $table) {
            $table->decimal('discount_percentage', 5, 2)->default(0)->after('fee_amount');
        });
    }

    public function down()
    {
        Schema::table('appointment_fees', function (Blueprint $table) {
            $table->dropColumn('discount_percentage');
        });
    }
};
