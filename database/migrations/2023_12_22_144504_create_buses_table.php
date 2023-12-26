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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->date('jurney_date')->require();
            $table->string('name')->unique();
            $table->foreignId('bus_route_id')->constrained('bus_routes');
            $table->string("image");
            $table->foreignId('starting_point_id')->constrained('destinations');
            $table->foreignId('end_point_id')->constrained('destinations');
            $table->integer('seats')->nullable()->default('36');
            $table->enum("bus_type",["AC","Non-Ac"]);
            $table->string('bus_number')->unique();
            $table->string('bus_registration_number')->unique();
			$table->integer('service_charge')->nullable();
            $table->longText("cancellation_policy");
            $table->string('stopage');
            $table->boolean("is_active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
