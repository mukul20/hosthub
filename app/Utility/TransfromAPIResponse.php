<?php
namespace App\Utility;

use Arr;

/**
 * Class TransfromAPIResponse
 *
 * @package App\Utility
 */
class TransfromAPIResponse
{
    /**
     * Transforms API response
     * 
     * @param array  $availableRooms
     * @return array
     */
    public static function transfromAvailability(array $availableRooms): array
    {
        $response = [];

        // Transform API response
        foreach ($availableRooms as $date => $rooms) {
            if (!$rooms) {
                $response[$date] = [
                    'available' => false,
                    'message'   => 'No rooms available.'
                ];

                continue;
            }

            $response[$date] = [
                'available' => true,
                'message'   => ''
            ];

            foreach ($rooms as $category) {
                $response[$date]['message'] .= $category->count
                    . " $category->occupancy occupancy room available. ";
            }

            $response[$date]['message'] = trim($response[$date]['message']);
        }

        return $response;
    }
}

