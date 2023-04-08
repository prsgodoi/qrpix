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
        Schema::create('pixs', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->string('name');
            $table->longText('pix');
            $table->string('total');
            $table->string('qrcode_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pixs');
    }
};
