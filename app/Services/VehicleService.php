<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
USE App\Models\Vehicle;

class VehicleService
{
    protected $baseUrl = 'https://swapi.dev/api/';

    public function fetchVehicles()
    {
        try {
            $response = Http::get($this->baseUrl . 'vehicles');
            return $response->json();
        } catch (\Exception $e) {
            throw new \RuntimeException('Error al conectar con la API de SWAPI.');
        }
    }
}