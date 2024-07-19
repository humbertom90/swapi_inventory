<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Services\VehicleService;

class VehicleSeeder extends Seeder
{
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function run()
    {
        $vehiclesData = $this->vehicleService->fetchVehicles()['results'];

        foreach ($vehiclesData as $vehicleData) {
            Vehicle::create([
                'name' => $vehicleData['name'],
                'model' => $vehicleData['model'],
                'manufacturer' => $vehicleData['manufacturer'],
                'cost_in_credits' => $vehicleData['cost_in_credits'],
                'length' => $vehicleData['length'],
                'max_atmosphering_speed' => $vehicleData['max_atmosphering_speed'],
                'crew' => $vehicleData['crew'],
                'passengers' => $vehicleData['passengers'],
                'cargo_capacity' => $vehicleData['cargo_capacity'],
                'consumables' => $vehicleData['consumables'],
                'vehicle_class' => $vehicleData['vehicle_class'],
                'created' => $vehicleData['created'],
                'edited' => $vehicleData['edited'],
                'url' => $vehicleData['url'],
            ]);
        }
    }
}