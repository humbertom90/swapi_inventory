<?php

namespace App\Repositories;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Log;

class VehicleRepository
{
    /**
     * Get all vehicles.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Vehicle[] All vehicles.
     */
    public function getAllVehicles()
    {
        return Vehicle::all();
    }
    
    /**
     * Increment the count of a vehicle.
     *
     * @param Vehicle $vehicle The vehicle object to increment its count.
     * @return void
     */
    public function incrementCount(Vehicle $vehicle)
    {
        $vehicle->count++;
        $vehicle->save();
    }

    /**
     * Decrement the count of a vehicle.
     *
     * @param Vehicle $vehicle The vehicle object to decrement its count.
     * @return void
     */
    public function decrementCount(Vehicle $vehicle)
    {
        if ($vehicle->count > 0) {
            $vehicle->count--;
            $vehicle->save();
        }
    }

    /**
     * Set the count of a vehicle to a specific quantity.
     *
     * @param Vehicle $vehicle The vehicle object to set its count.
     * @param int $quantity The quantity to set.
     * @return void
     */
    public function setCount(Vehicle $vehicle, $quantity)
    {
        $vehicle->count = $quantity;
        $vehicle->save();
    }
}