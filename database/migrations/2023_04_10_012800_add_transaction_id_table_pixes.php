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
        Schema::table('pixs', function (Blueprint $table) {
            //
            $table->string('transaction_id')->after('id')->default('UTIL-PIX-0000000');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pixs', function (Blueprint $table) {
            //
            $table->dropColumn('transaction_id');
        });
    }
};
