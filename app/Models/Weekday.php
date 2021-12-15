<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weekday extends Model
{
  protected $table = 'weekdays';
  protected $fillable = [
    'name',
  ];

  public function offer_subjects()
  {
    return $this->hasOne(OfferSubject::class);
  }
}
