<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('appointment_fees', function (Blueprint $table) {
            $table->string('service_name')->nullable()->after('appointments_id');
            $table->decimal('service_amount', 8, 2)->nullable()->after('service_name');
            $table->decimal('service_discount', 5, 2)->default(0.00)->after('service_amount');
        });
    }

    public function down()
    {
        Schema::table('appointment_fees', function (Blueprint $table) {
            $table->dropColumn(['service_name', 'service_amount', 'service_discount']);
        });
    }
};
