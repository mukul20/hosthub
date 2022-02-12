<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckAvailabilityRequest;
use App\Utility\{DateHelper, TransfromAPIResponse};
use DB;

class CheckAvailabilityController extends Controller
{
    /**
     * Check availability for given dates
     * 
     * @param App\Http\Requests\CheckAvailabilityRequest
     * @return array
     */
    public function index(CheckAvailabilityRequest $request): array
    {
        $availableRooms = [];

        // Get all dates between checkin & checkout date range
        $dates = DateHelper::dateRange(
            $request->input('checkin'),
            $request->input('checkout')
        );

        foreach ($dates as $date) {
            $availableRooms[$date] = DB::select(
                "SELECT occupancy, count(*) as count from `rooms` 
                    where id not in
                    (SELECT `room_id` FROM `bookings`
                        where \"$date\" between `checkin` and `checkout`
                        and `checkout` != \"$date\")
                    group by occupancy"
            );
        }

        // Return transformed API response
        return TransfromAPIResponse::transfromAvailability($availableRooms);
    }
}
