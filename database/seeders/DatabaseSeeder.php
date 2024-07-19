<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            VehicleSeeder::class,
            ShipSeeder::class,
            // Agregar otros seeders si es necesario
        ]);
    }

    /**
     * Run the database seeds after running migrations.
     *
     * @return void
     */
    public function afterMigrations()
    {
        $this->run();
    }
}
