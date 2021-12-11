<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
  private $shifts = [
    ['name' => 'Matutino'],
    ['name' => 'Vespertino'],
    ['name' => 'Noturno'],
  ];

  public function run()
  {
    foreach ($this->shifts as $shift) {
      Shift::create([
        'name' => $shift['name'],
      ]);
    }
  }
}
