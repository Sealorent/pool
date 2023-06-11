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
        Schema::create('vehicle_service', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id')->foreignId('vehicle_id')->constrained('vehicle');
            $table->date('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('service_description')->nullable();
            $table->enum('service_status', ['use', 'done'])->default('use');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_service');
    }
};
