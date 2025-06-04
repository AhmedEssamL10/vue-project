<?php

namespace App\Http\Controllers\API;

use App\Models\ShipRequest;
use App\Models\ServicePrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            'pickupPostalCode' => 'required|integer',
            'pickupLocation' => 'required|string|max:255',
            'pickupAddress' => 'required|string|max:255',
            'pickupNo' => 'required|string|max:10',

            'pickupLifterExistance' => 'nullable',
            'pickupDistanceToCar' => 'nullable|integer',
            'pickupFloorNumber' => 'nullable|integer',

            'selectedPickUpType' => 'required|string|max:100',
            'spaceArea' => 'nullable|integer',
            'roomsNumber' => 'nullable|integer',
            'boxesNumber' => 'nullable|integer',
            'storeArea' => 'nullable|string|max:50',

            // Dropoff details
            'dropOffPostalCode' => 'required|integer',
            'dropOffLocation' => 'required|string|max:255',
            'dropOffAddress' => 'required|string|max:255',
            'dropOffNo' => 'required|string|max:10',

            'dropOffDistanceToCar' => 'nullable|integer',
            'dropOffFloorNumber' => 'nullable|integer',
            'dropOfflifterExistance' => 'nullable',
            // Time preferences
            'timeType' => 'required|string',
            'specificDate' => 'nullable|date',
            'rangeDateFrom' => 'nullable|string',
            'rangeDateTo' => 'nullable|string',
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

        $prices = ServicePrice::pluck('value', 'key');
        $services = [];

        if ($request->roomsNumber) {
            $services['roomPrice'] = $request->roomsNumber * ($prices['roomPrice'] ?? 0);
        }
        if ($request->boxesNumber) {
            $services['boxPrice'] = $request->boxesNumber * ($prices['boxPrice'] ?? 0);
        }
        if ($request->furnitureStoreDays) {
            $services['furnitureStoreDayPrice'] = $request->furnitureStoreDays * ($prices['furnitureStoreDayPrice'] ?? 0);
        }
        if ($request->finalCleaning) {
            $services['cleaningPrice'] = $prices['cleaningPrice'] ?? 0;
        }
        if ($request->furnitureLifter) {
            $services['furnitureLifterToolPrice'] = $prices['furnitureLifterToolPrice'] ?? 0;
        }
        if ($request->noParking) {
            $services['noParkingPrice'] = $prices['noParkingPrice'] ?? 0;
        }
        if ($request->connectWashingMachine) {
            $services['connectingWashingMachinePrice'] = $prices['connectingWashingMachinePrice'] ?? 0;
        }
        if ($request->pickUpDistanceToCar) {
            $services['meterPrice'] = $request->pickUpDistanceToCar * ($prices['meterPrice'] ?? 0);
        }
        if ($request->pickUpDistanceToCar) {
            $services['meterPrice'] = $request->pickUpDistanceToCar * ($prices['meterPrice'] ?? 0);
        }

        if ($request->pickupFloorNumber) {
            if ($request->pickupLifterExistance == 1) {
                $services['floorWithLifterPrice'] = $request->pickupFloorNumber * ($prices['floorWithLifterPrice'] ?? 0);
            } else {
                $services['floorWithoutLifterPrice'] = $request->pickupFloorNumber * ($prices['floorWithoutLifterPrice'] ?? 0);
            }
        }
        if ($request->dropOffFloorNumber) {
            if ($request->dropOfflifterExistance == 1) {
                $services['floorWithLifterPrice'] = $request->dropOffFloorNumber * ($prices['floorWithLifterPrice'] ?? 0);
            } else {
                $services['floorWithoutLifterPrice '] = $request->dropOffFloorNumber * ($prices['floorWithoutLifterPrice '] ?? 0);
            }
        }

        if ($request->storeArea) {
            $services['meterInBasementPrice'] = $request->storeArea  * ($prices['meterInBasementPrice'] ?? 0);
        }
        if ($request->spaceArea) {
            $services['squareMeterPrice'] = $request->spaceArea   * ($prices['squareMeterPrice'] ?? 0);
        }

        if ($request->packingServices) {
            $services['packingServicePrice'] = $prices['packingServicePrice'] ?? 0;
        }
        if ($request->unpackingServices) {
            $services['unpackingServicePrice'] = $prices['unpackingServicePrice'] ?? 0;
        }
        if ($request->dismantingFurniture) {
            $services['furnitureUncollectingPrice'] = $prices['furnitureUncollectingPrice'] ?? 0;
        }
        if ($request->furnitureAssembly) {
            $services['furnitureCollectingPrice'] = $prices['furnitureCollectingPrice'] ?? 0;
        }
        if ($request->kitchenLongMoveOut) {
            $services['KitchenMeterInstallingPrice'] = $request->kitchenLongMoveOut * ($prices['KitchenMeterInstallingPrice'] ?? 0);
        }
        if ($request->kitchenLong) {
            $services['KitchenMeterunInstallingPrice'] = $request->kitchenLong * ($prices['KitchenMeterunInstallingPrice'] ?? 0);
        }
        if ($request->furnitureQuantity) {
            $services['furnitureGitRedOfPrice'] = $prices['furnitureGitRedOfPrice'] ?? 0;
        }


        if ($request->movingBoxesType == 'rent') {
            $services['rentPackingBoxesPrice'] = $request->noOfBoxes * ($prices['rentPackingBoxesPrice'] ?? 0);
        } else {
            $services['buyPackingBoxesPrice'] = $request->noOfBoxes *  ($prices['buyPackingBoxesPrice'] ?? 0);
        }

        $services['movementPrice'] = $prices['movementPrice'] ?? 0;

        $total = array_sum($services);

        if ($request->whoWillBpay  == 'private') {
            $services['tax'] =  $total * 0.19; // 19% tax
            $total = $total + $services['tax'];
        }

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
                'range_date_from' => $request->rangeDateFrom,
                'range_date_to' => $request->rangeDateTo,
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
            "isSuccess" => true,
            // 'data' => $shipRequest,
            'services' => $services,
            'total_price' => $total
        ], 201);
    }
}