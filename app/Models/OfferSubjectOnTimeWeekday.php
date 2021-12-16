<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferSubjectOnTimeWeekday extends Model
{
  protected $table = 'offer_subject_time_on_weekdays';
  protected $fillable = [
    'offer_subject_id',
    'position',
    'active',
  ];

  public function offer_subjects()
  {
    return $this->hasOne(OfferSubject::class);
  }
}
