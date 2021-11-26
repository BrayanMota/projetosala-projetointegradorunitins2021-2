<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
  protected $table = 'shifts';
  protected $fillable = [
    'name',
  ];

  public function offer_subjects() {
    return $this->hasOne(OfferSubject::class);
  }
}
