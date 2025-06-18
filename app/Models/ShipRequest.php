<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipRequest extends Model
{
    use HasFactory;
    // use SoftDeletes; // Uncomment if you want soft deletion support

    protected $table = 'requests';

    /**
     * Fillable attributes to protect against mass assignment
     */
    protected $fillable = [
        'pickup_postal_code',
        'pickup_location',
        'pickup_address',
        'pickup_no',

        'pickup_lifter_existance',
        'pickup_distance_to_car',
        'pickup_floor_number',

        'selected_pickup_type',
        'space_area',
        'rooms_number',
        'boxes_number',
        'store_area',

        'dropoff_postal_code',
        'dropoff_location',
        'dropoff_address',
        'dropoff_no',

        'dropoff_distance_to_car',
        'dropoff_floor_number',
        'dropoff_lifter_existance',
        'total',
        'time_type',
        'specific_date',
        'range_date',
        'range_date_from',
        'range_date_to',

        'packing_services',
        'dismanting_furniture',
        'final_cleaning',
        'furniture_lifter',
        'no_parking',

        'kitchen_long',
        'moving_boxes',
        'furniture_store_days',
        'furniture_quantity',

        'unpacking_services',
        'furniture_assembly',
        'connect_washing_machine',
        'furniture_lifter_move_to',
        'no_parking_move_to',

        'kitchen_long_move_out',

        'client_name',
        'client_email',
        'client_phone',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
