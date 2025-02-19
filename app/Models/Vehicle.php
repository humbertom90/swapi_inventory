<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'model', 'manufacturer', 'cost_in_credits', 'length', 'max_atmosphering_speed',
        'crew', 'passengers', 'cargo_capacity', 'consumables', 'vehicle_class', 'created', 'edited', 'url',
    ];
}
