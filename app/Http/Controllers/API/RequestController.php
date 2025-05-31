<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShipRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            // Pickup details
            'pickupPostalCode' => 'required|string|max:20',
            'pickupLocation' => 'required|string|max:255',
            'pickupAddress' => 'required|string|max:255',
            'pickupNo' => 'required|string|max:10',

            'pickupLifterExistance' => 'nullable',
            'pickupDistanceToCar' => 'nullable|string|max:100',
            'pickupFloorNumber' => 'nullable|integer',

            'selectedPickUpType' => 'required|string|max:100',
            'spaceArea' => 'nullable|string|max:50',
            'roomsNumber' => 'nullable|integer',
            'boxesNumber' => 'nullable|integer',
            'storeArea' => 'nullable|string|max:50',

            // Dropoff details
            'dropOffPostalCode' => 'required|string|max:20',
            'dropOffLocation' => 'required|string|max:255',
            'dropOffAddress' => 'required|string|max:255',
            'dropOffNo' => 'required|string|max:10',

            'dropOffDistanceToCar' => 'nullable|string|max:100',
            'dropOffFloorNumber' => 'nullable|integer',
            'dropOfflifterExistance' => 'nullable',

            // Time preferences
            'timeType' => 'required|string',
            'specificDate' => 'nullable|date',
            'rangeDate' => 'nullable|string',

            // Services
            'packingServices' => 'nullable',
            'dismantingFurniture' => 'nullable',
            'finalCleaning' => 'nullable',
            'furnitureLifter' => 'nullable',
            'noParking' => 'nullable',

            'kitchenLong' => 'nullable',
            'movingBoxes' => 'nullable|integer',
            'furnitureStoreDays' => 'nullable|integer',
            'furnitureQuantity' => 'nullable|integer',

            'unpackingServices' => 'nullable',
            'furnitureAssembly' => 'nullable',
            'connectWashingMachine' => 'nullable',
            'furnitureLifterMoveTo' => 'nullable',
            'noParkingMoveTo' => 'nullable',
            'kitchenLongMoveOut' => 'nullable',

            // Client details
            'clientName' => 'required|string|max:255',
            'clientEmail' => 'required|email|max:255',
            'clientPhone' => 'required|string|max:20',
        ]);
        $shipRequest = ShipRequest::create(
            [
                'pickup_postal_code' => $request->pickupPostalCode,
                'pickup_location' => $request->pickupLocation,
                'pickup_address' => $request->pickupAddress,
                'pickup_no' => $request->pickupNo,

                'pickup_lifter_existance' => $request->pickupLifterExistance,
                'pickup_distance_to_car' => $request->pickupDistanceToCar,
                'pickup_floor_number' => $request->pickupFloorNumber,

                'selected_pickup_type' => $request->selectedPickUpType,
                'space_area' => $request->spaceArea,
                'rooms_number' => $request->roomsNumber,
                'boxes_number' => $request->boxesNumber,
                'store_area' => $request->storeArea,

                'dropoff_postal_code' => $request->dropOffPostalCode,
                'dropoff_location' => $request->dropOffLocation,
                'dropoff_address' => $request->dropOffAddress,
                'dropoff_no' => $request->dropOffNo,

                'dropoff_distance_to_car' => $request->dropOffDistanceToCar,
                'dropoff_floor_number' => $request->dropOffFloorNumber,
                'dropoff_lifter_existance' => $request->dropOfflifterExistance,

                'time_type' => $request->timeType,
                'specific_date' => $request->specificDate,
                'range_date' => $request->rangeDate,

                'packing_services' => $request->packingServices,
                'dismanting_furniture' => $request->dismantingFurniture,
                'final_cleaning' => $request->finalCleaning,
                'furniture_lifter' => $request->furnitureLifter,
                'no_parking' => $request->noParking,

                'kitchen_long' => $request->kitchenLong,
                'moving_boxes' => $request->movingBoxes,
                'furniture_store_days' => $request->furnitureStoreDays,
                'furniture_quantity' => $request->furnitureQuantity,

                'unpacking_services' => $request->unpackingServices,
                'furniture_assembly' => $request->furnitureAssembly,
                'connect_washing_machine' => $request->connectWashingMachine,
                'furniture_lifter_move_to' => $request->furnitureLifterMoveTo,
                'no_parking_move_to' => $request->noParkingMoveTo,

                'kitchen_long_move_out' => $request->kitchenLongMoveOut,

                'client_name' => $request->clientName,
                'client_email' => $request->clientEmail,
                'client_phone' => $request->clientPhone,
            ]
        );
        return response()->json([
            'message' => 'Request created successfully',
            'data' => $shipRequest
        ], 201);
    }
}
