<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_requests_table.php
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();

            // Pickup Panel 1
            $table->string('pickup_postal_code')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('pickup_no')->nullable();

            // Pickup Panel 2
            $table->string('pickup_lifter_existance')->nullable();
            $table->string('pickup_distance_to_car')->nullable();
            $table->string('pickup_floor_number')->nullable();

            // Pickup Panel 3
            $table->string('selected_pickup_type')->nullable();
            $table->string('space_area')->nullable();
            $table->string('rooms_number')->nullable();
            $table->string('boxes_number')->nullable();
            $table->string('store_area')->nullable();

            // Dropoff Panel 1
            $table->string('dropoff_postal_code')->nullable();
            $table->string('dropoff_location')->nullable();
            $table->string('dropoff_address')->nullable();
            $table->string('dropoff_no')->nullable();

            // Dropoff Panel 2
            $table->string('dropoff_distance_to_car')->nullable();
            $table->string('dropoff_floor_number')->nullable();
            $table->string('dropoff_lifter_existance')->nullable();

            // Dropoff Panel 3
            $table->string('time_type')->nullable();
            $table->string('specific_date')->nullable();
            $table->string('range_date')->nullable();

            // Services
            $table->string('packing_services');
            $table->string('dismanting_furniture');
            $table->string('final_cleaning');
            $table->string('furniture_lifter');
            $table->string('no_parking');

            $table->string('kitchen_long')->nullable();
            $table->string('moving_boxes')->nullable();
            $table->string('furniture_store_days')->nullable();
            $table->string('furniture_quantity')->nullable();

            $table->string('unpacking_services');
            $table->string('furniture_assembly');
            $table->string('connect_washing_machine');
            $table->string('furniture_lifter_move_to');
            $table->string('no_parking_move_to');

            $table->string('kitchen_long_move_out')->nullable();

            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_phone')->nullable();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};