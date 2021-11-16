<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferSubjectTimeOnWeekdays extends Model
{
  protected $table = 'offer_subject_time_on_weekdays';
  protected $fillable = [
    'offer_subject_id',
    'position',
    'active',
  ];
}
