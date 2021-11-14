<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffeDisciplineTimeOnWeekdays extends Model
{
  protected $table = 'offe_discipline_time_on_weekdays';
  protected $fillable = [
    'offer_discipline_id',
    'position',
    'active',
  ];
}
