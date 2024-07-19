<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ship;
use App\Services\ShipService;
use App\Jobs\FetchAndPopulateShipsJob;

class ShipSeeder extends Seeder
{
    protected $shipService;

    public function __construct(ShipService $shipService)
    {
        $this->shipService = $shipService;
    }

    public function run()
    {
        $shipsData = $this->shipService->fetchShips()['results'];

        foreach ($shipsData as $shipData) {
            Ship::create([
                'name' => $shipData['name'],
                'model' => $shipData['model'],
                'manufacturer' => $shipData['manufacturer'],
                'cost_in_credits' => $shipData['cost_in_credits'],
                'length' => $shipData['length'],
                'max_atmosphering_speed' => $shipData['max_atmosphering_speed'],
                'crew' => $shipData['crew'],
                'passengers' => $shipData['passengers'],
                'cargo_capacity' => $shipData['cargo_capacity'],
                'consumables' => $shipData['consumables'],
                'starship_class' => $shipData['starship_class'],
                'created' => $shipData['created'],
                'edited' => $shipData['edited'],
                'url' => $shipData['url'],
            ]);
        }
    }
}