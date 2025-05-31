<?php

namespace App\Http\Controllers\API;

use App\Models\ServicePrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicePriceController extends Controller
{


    /**
     * Get all service price settings as key-value pairs
     */
    public function index()
    {
        $settings = ServicePrice::all()->pluck('value', 'key');
        return response()->json(["data" => $settings]);
    }

    /**
     * Create or update service price settings
     */
    public function store(Request $request)
    {
        $fillable = [
            'kiloMeterPrice',
            'movementPrice',
            'meterPrice',
            'floorWithLifterPrice',
            'floorWithoutLifterPrice',
            'boxPrice',
            'meterInBasementPrice',
            'roomPrice',
            'squareMeterPrice',
            'packingServicePrice',
            'unpackingServicePrice',
            'furnitureUncollectingPrice',
            'furnitureCollectingPrice',
            'KitchenMeterInstallingPrice',
            'KitchenMeterunInstallingPrice',
            'rentPackingBoxesPrice',
            'buyPackingBoxesPrice',
            'furnitureStoreDayPrice',
            'furnitureGitRedOfPrice',
            'cleaningPrice',
            'connectingWashingMachinePrice',
            'furnitureLifterToolPrice',
            'noParkingPrice'
        ];

        foreach ($fillable as $key) {
            if ($request->has($key)) {
                ServicePrice::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key)]
                );
            }
        }

        return response()->json(['message' => 'Service price settings saved successfully.']);
    }
}
