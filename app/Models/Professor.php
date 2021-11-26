<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
  protected $table = 'professors';
  protected $fillable = [
    'name',
  ];

  public function offer_subjects() {
    return $this->hasOne(OfferSubject::class);
  }
}
