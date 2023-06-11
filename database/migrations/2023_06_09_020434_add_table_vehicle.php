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
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_name');
            $table->enum('vehicle_type', ['angkutan_barang', 'angkutan_orang']);
            $table->enum('vehicle_owner', ['perusahaan', 'sewa']);
            $table->enum('vehicle_status', ['dipakai', 'tersedia', 'perbaikan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};
