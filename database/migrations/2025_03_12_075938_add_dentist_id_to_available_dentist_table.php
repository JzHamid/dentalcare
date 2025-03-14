<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Migration file: add_dentist_id_to_available_dentist_table.php

    public function up()
    {
        // Check if the column already exists
        if (!Schema::hasColumn('available_dentist', 'dentist_id')) {
            Schema::table('available_dentist', function (Blueprint $table) {
                $table->foreignId('dentist_id')->after('user_id')->constrained('users')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        // Drop the column if it exists
        if (Schema::hasColumn('available_dentist', 'dentist_id')) {
            Schema::table('available_dentist', function (Blueprint $table) {
                $table->dropForeign(['dentist_id']);
                $table->dropColumn('dentist_id');
            });
        }
    }
};
