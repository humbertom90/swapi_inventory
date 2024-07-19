<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'model', 'manufacturer', 'cost_in_credits', 'length', 'max_atmosphering_speed',
        'crew', 'passengers', 'cargo_capacity', 'consumables', 'hyperdrive_rating', 'MGLT',
        'starship_class', 'created', 'edited', 'url',
    ];
}
