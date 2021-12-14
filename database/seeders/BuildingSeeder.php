<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
  private $buildings = [

    ['name' => 'Bloco A'],
    ['name' => 'Bloco B'],
    ['name' => 'Bloco C'],
  ];

  public function run()
  {
    foreach ($this->buildings as $building) {
      Building::create([
        'name' => $building['name'],
      ]);
    }

  }
}
