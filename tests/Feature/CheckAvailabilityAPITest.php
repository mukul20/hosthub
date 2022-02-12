<?php

namespace Tests\Feature;

use Tests\TestCase;

class CheckAvailabilityAPITest extends TestCase
{
    /**
     * Test to check availability.
     *
     * @return void
     */
    public function test_can_check_availability()
    {
        $date = date('Y-m-d');
        $params = [
            'checkin'  => $date,
            'checkout' => date('Y-m-d', strtotime($date. ' + 3 days'))
        ];

        $response = $this->getJson(route('availability.index', $params));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'available',
                'message'
            ]
        ]);
    }
}
