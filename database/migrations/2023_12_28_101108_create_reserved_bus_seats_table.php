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
        Schema::create('reserved_bus_seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained('bus_seats');
            $table->foreignId('seat_id')->constrained('bus_seats');
            $table->enum('reserved_user_type', ['super_admin','user'])->nullable();
            $table->date("reserved_date")->nullable();
            $table->foreignId('reserved_by')->nullable();
            $table->enum('payment_status', ['paid','unpaid','cancel'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserved_bus_seats');
    }
};
