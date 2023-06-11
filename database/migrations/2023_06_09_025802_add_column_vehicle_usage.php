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
        Schema::create('vehicle_usage', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id')->foreignId('vehicle_id')->constrained('vehicle');
            $table->integer('operator_id')->foreignId('user_id')->constrained('users');
            $table->integer('vehicle_reservation_id')->foreignId('id')->constrained('vehicle_reservation');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->decimal('bbm_consumption')->nullable();
            $table->enum('status', ['use', 'done'])->default('use');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_usage');
    }
};
