<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
  private $buildings = [
    ['name' => 'Bloco A', 'campus' => 'Campus Palmas'],
    ['name' => 'Bloco B', 'campus' => 'Campus Palmas'],
    ['name' => 'Bloco C', 'campus' => 'Campus Palmas'],
  ];

  public function run()
  {
    foreach ($this->buildings as $building) {
      Building::create([
        'name' => $building['name'],
        'campus' => $building['campus'],
      ]);
    }

  }
}
