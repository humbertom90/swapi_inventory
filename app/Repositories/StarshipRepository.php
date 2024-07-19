<?php

namespace App\Repositories;

use App\Models\Ship;

class StarshipRepository
{
    /**
     * Get all starships.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Ship[] All starships.
     */
    public function getAllStarShip()
    {
        return Ship::all();
    }
    
    /**
     * Increment the count of a ship.
     *
     * @param Ship $ship The ship object to increment its count.
     * @return void
     */
    public function incrementCount(Ship $ship)
    {
        $ship->count++;
        $ship->save();
    }

    /**
     * Decrement the count of a ship.
     *
     * @param Ship $ship The ship object to decrement its count.
     * @return void
     */
    public function decrementCount(Ship $ship)
    {
        if ($ship->count > 0) {
            $ship->count--;
            $ship->save();
        }
    }

    /**
     * Set the count of a ship to a specific quantity.
     *
     * @param Ship $ship The ship object to set its count.
     * @param int $quantity The quantity to set.
     * @return void
     */
    public function setCount(Ship $ship, $quantity)
    {
        $ship->count = $quantity;
        $ship->save();
    }
}