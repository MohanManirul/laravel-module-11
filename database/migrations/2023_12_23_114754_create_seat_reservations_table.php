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
        Schema::create('seat_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained('bus_seats');
            $table->foreignId('seat_id')->constrained('bus_seats');
            $table->enum('reserved_user_type', ['super_admin','user']);
            $table->foreignId('reserved_by_id');
            $table->date("reserved_date");
            $table->enum('payment_status', ['paid','unpaid','cancel']);
            $table->boolean('is_booked')->nullable()->default(false);
            $table->boolean('is_sold')->nullable()->default(false);
            $table->enum('seat_status', ['blocked','available','selected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_reservations');
    }
};
