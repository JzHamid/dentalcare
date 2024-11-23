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
        Schema::table('service_available', function (Blueprint $table) {
            $table->renameColumn('clinic_id', 'listing_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_available', function (Blueprint $table) {
            $table->renameColumn('listing_id', 'clinic_id');
        });
    }
};
