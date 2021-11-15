<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferDiscipline extends Model
{
  protected $table = 'offer_disciplines';
  protected $fillable = [
    'semester_id',
    'weekday_id',
    'shift_id',
    'professor_id',
    'classroom_id',
    'period',
    'discipline',
  ];
}
