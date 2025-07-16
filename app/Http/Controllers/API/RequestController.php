<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ShipRequest;
use Illuminate\Support\Str;
use App\Models\ServicePrice;
use Illuminate\Http\Request;
use App\Models\FactorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RequestController extends Controller
{
    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            'pickupPostalCode' => 'required|string',
            'pickupLocation' => 'required|string|max:255',
            'pickupAddress' => 'required|string|max:255',
            'pickupNo' => 'required|integer',

            'pickupLifterExistance' => 'nullable',
            'pickupDistanceToCar' => 'nullable|integer',
            'pickupFloorNumber' => 'nullable|integer',

            'selectedPickUpType' => 'required|string|max:100',
            'spaceArea' => 'nullable|integer',
            'roomsNumber' => 'nullable|integer',
            'boxesNumber' => 'nullable|integer',
            'storeArea' => 'nullable|string|max:50',

            // Dropoff details
            'dropOffPostalCode' => 'required|string',
            'dropOffLocation' => 'required|string|max:255',
            'dropOffAddress' => 'required|string|max:255',
            'dropOffNo' => 'required|integer',

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
            'movingBoxes' => 'nullable|string',
            'furnitureStoreDays' => 'nullable|integer',
            'furnitureQuantity' => 'nullable|string',

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
        
        if ($request->pickupDistanceToCar) {
            $services['pickupMeterPrice'] = $request->pickupDistanceToCar * ($prices['meterPrice'] ?? 0);
        }

        if ($request->dropOffDistanceToCar) {
            $services['dropOffMeterPrice'] = $request->dropOffDistanceToCar * ($prices['meterPrice'] ?? 0);
        }

        if ($request->pickupFloorNumber) {
            if ($request->pickupLifterExistance == 1) {
                $services['pickupFloorWithoutLifterPrice'] = $request->pickupFloorNumber * ($prices['floorWithLifterPrice'] ?? 0);
            } else {
                $services['pickupFloorWithoutLifterPrice'] = $request->pickupFloorNumber * ($prices['floorWithoutLifterPrice'] ?? 0);
            }
        }
        if ($request->dropOffFloorNumber) {
            if ($request->dropOfflifterExistance == 1) {
                $services['dropOffFloorWithoutLifterPrice'] = $request->dropOffFloorNumber * ($prices['floorWithLifterPrice'] ?? 0);
            } else {
                $services['dropOffFloorWithoutLifterPrice'] = $request->dropOffFloorNumber * ($prices['floorWithoutLifterPrice'] ?? 0);
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
            $services['KitchenMeterInstallingPrice'] = (int) $request->kitchenLongMoveOut * ($prices['KitchenMeterInstallingPrice'] ?? 0);
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

        $distance = $this->haversineDistance(
            $request->firstLat,
            $request->firstLong,
            $request->secLat,
            $request->secLong
        );

        $services['distancePrice'] = round($distance * ($prices['kiloMeterPrice'] ?? 0), 2);
        // $services['distance'] = round($distance, 2);
        // $services['movementPrice'] = $prices['movementPrice'] ?? 0;

        $total = array_sum($services);

        if ($request->whoWillPay  == 'private') {
            $services['tax'] =  $total * 0.19; // 19% tax
            $total = $total + $services['tax'];
        }

        $user = null;
        $isNewUser = false;
        $generatedPassword = null;

        if ($request->saveData) {
            // Check if user already exists
            $existingUser = User::where('email', $request->clientEmail)->first();

            if (!$existingUser) {
                $generatedPassword = Str::random(8); // generate random password
                $user = User::create([
                    'name' => $request->clientName,
                    'email' => $request->clientEmail,
                    'phone' => $request->clientPhone,
                    'password' => Hash::make($generatedPassword),
                    'user_type' => 'client',
                    'client_type' => $request->userType,
                ]);
                $isNewUser = true;
            } else {
                $user = $existingUser;
            }
        }
        // dd($user->id);

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
                'user_id' => $user ? $user->id : null,
                'total' => $total,
            ]
        );



        return response()->json([
            'message' => 'Request created successfully',
            "isSuccess" => true,
            // 'data' => $shipRequest,
            'services' => $services,
            'total_price' => $total,
            'user_created' => $isNewUser,
            'credentials' => $isNewUser ? [
                'email' => $user->email,
                'password' => $generatedPassword,
            ] : null,
        ], 201);
    }



    public function storeFactorRequest(Request $request)
    {
        $validated = $request->validate([
            'count' => 'nullable|integer',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
            'clientName' => 'nullable|string|max:255',
            'clientEmail' => 'nullable|email|max:255',
            'clientPhone' => 'nullable|string|max:20',
            'saveData' => 'nullable|boolean',
        ]);

        $days = null;

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $from = Carbon::parse($request->date_from);
            $to = Carbon::parse($request->date_to);
            $days = $from->diffInDays($to);
        }
        $price = ServicePrice::where('key', 'workerPerDay')->first();
        $totalPrice = $price ? $price->value * ($days == 0 ? 1 : $days) * $request->count : 0;
        $user = null;
        $isNewUser = false;
        $generatedPassword = null;

        if ($request->saveData) {
            // Check if user already exists
            $existingUser = User::where('email', $request->clientEmail)->first();

            if (!$existingUser) {
                $generatedPassword = Str::random(8); // generate random password
                $user = User::create([
                    'name' => $request->clientName,
                    'email' => $request->clientEmail,
                    'phone' => $request->clientPhone,
                    'password' => Hash::make($generatedPassword),
                    'user_type' => 'client',
                    'client_type' => $request->userType,
                ]);
                $isNewUser = true;
            } else {
                $user = $existingUser;
            }
        }

        $factorRequest = FactorRequest::create([
            'count' => $request->count,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'client_name' => $request->clientName,
            'client_email' => $request->clientEmail,
            'client_phone' => $request->clientPhone,
            'user_id' => $user ? $user->id : null,
            'total' => $totalPrice,

        ]);

        return response()->json([
            'message' => 'Factor request submitted successfully',
            'isSuccess' => true,
            'total_price' => $totalPrice,
            'services' => [
                'workers_cost' => $totalPrice,
                'workers_form' => true,
            ],
            'user_created' => $isNewUser,
            'credentials' => $isNewUser ? [
                'email' => $user->email,
                'password' => $generatedPassword,
            ] : null,
            // 'data' => $factorRequest
        ], 201);
    }

    public function haversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // km

        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;

        $a = sin($deltaLat / 2) ** 2 +
            cos($lat1) * cos($lat2) * sin($deltaLon / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }
}
