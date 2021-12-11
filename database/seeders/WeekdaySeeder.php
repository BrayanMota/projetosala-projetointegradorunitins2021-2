<?php

namespace Database\Seeders;

use App\Models\Weekday;
use Illuminate\Database\Seeder;

class WeekdaySeeder extends Seeder
{
  private $weekdays = [
    ['name' => 'Segunda'],
    ['name' => 'Terça'],
    ['name' => 'Quarta'],
    ['name' => 'Quinta'],
    ['name' => 'Sexta'],
    ['name' => 'Sábado'],
  ];
  public function run()
  {
    foreach ($this->weekdays as $weekday) {
      Weekday::create([
        'name' => $weekday['name'],
      ]);
    }
  }
}
