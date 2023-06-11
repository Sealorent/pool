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
        Schema::create('vehicle_reservation', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id')->foreignId('vehicle_id')->constrained('vehicle');
            $table->integer('operator_id')->foreignId('user_id')->constrained('users');
            $table->integer('officer_id')->foreignId('officer_id')->constrained('users');
            $table->enum('officer_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('officer_description')->nullable();
            $table->integer('manager_id')->foreignId('manager_id')->constrained('users');
            $table->enum('manager_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('manager_description')->nullable();
            $table->integer('admin_id')->foreignId('admin_id')->constrained('users');
            $table->enum('reservation_status', ['onprocess', 'done', 'rejected'])->default('onprocess');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_reservation');
    }
};
