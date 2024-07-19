<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Ship;

class ShipService
{
    protected $baseUrl = 'https://swapi.dev/api/';

    public function fetchShips()
    {
        try {
            $response = Http::get($this->baseUrl . 'starships');
            return $response->json();
        } catch (\Exception $e) {
            throw new \RuntimeException('Error al conectar con la API de barcos.');
        }
    }
}